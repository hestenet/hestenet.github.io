import {Plugin} from 'ckeditor5/src/core';
import StyleAttributeCommand from "./styleattributecommand";

export default class StyleEditingBase extends Plugin {


  static get requires() {
    return ['ImageUtils'];
  }

  constructor(editor) {
    super(editor);

    this._missingImageStyleViewReferences = new Set();
  }

  /**
   * @inheritdoc
   */
  init() {
    const editor = this.editor;
    this.pluginName = Object.getPrototypeOf(this).constructor.mainPluginName;
    this.viewAttributeName = editor.config.get(`${this.pluginName}.viewAttributeName`);
    this._defineSchema();
    this._defineConverters();

    // Declare our command.
    editor.commands.add(
      this.pluginName,
      new StyleAttributeCommand(this.viewAttributeName, this.editor),
    );
  }

  _defineSchema() {
    const {editor} = this;

    const {schema} = editor.model;

    // Declare our model attribute.
    if (schema.isRegistered('imageInline')) {
      schema.extend('imageInline', {
        allowAttributes: [
          this.viewAttributeName,
        ],
      });
    }
    if (schema.isRegistered('imageBlock')) {
      schema.extend('imageBlock', {
        allowAttributes: [
          this.viewAttributeName,
        ],
      });
    }
  }


  _defineConverters() {
    const {editor} = this;
    const {conversion} = this.editor;

    // Upcast Converters: determine how existing HTML is interpreted by the
    // editor. These trigger when an editor instance loads.

    conversion.for('upcast').attributeToAttribute({
      model: this.viewAttributeName,
      view: this.viewAttributeName,
    });

    // Data Downcast Converters: converts stored model data into HTML.
    // These trigger when content is saved.

    conversion.for('dataDowncast').attributeToAttribute({
      model: this.viewAttributeName,
      view: this.viewAttributeName,
    });

    // Editing Downcast Converters. These render the content to the user for
    // editing, i.e. this determines what gets seen in the editor. These trigger
    // after the Data Upcast Converters, and are re-triggered any time there
    // are changes to any of the models' properties.

    // It would be nice to be able to render the image in CKE as it will be
    // when rendered by Drupal (through our format filter), but for now, has it
    // would  be much work, it will stay the same in CKE whatever style is
    // selected.

    // However, we display a warning if no style is selected.
    conversion
      .for('editingDowncast')
      .add(this._imageEditingDowncastConverter('attribute:' + this.viewAttributeName, editor))
      // Including changes to src ensures the converter will execute for images
      // that do not yet have our style attribute, as we
      // specifically want to add the missing style text warning to images
      // without our style attribute.
      .add(this._imageEditingDowncastConverter('attribute:src', editor));


    editor.editing.view.on('render', () => {
      // eslint-disable-next-line no-restricted-syntax
      for (const view of this._missingImageStyleViewReferences) {
        // Destroy view instances that are not connected to the DOM to ensure
        // there are no memory leaks.
        // https://developer.mozilla.org/en-US/docs/Web/API/Node/isConnected
        if (!view.element.isConnected) {
          view.destroy();
          this._missingImageStyleViewReferences.delete(view);
        }
      }
    });
  }

  /**
   * Helper that generates model to editing view converters to display missing
   * image style warning.
   */
  _imageEditingDowncastConverter(eventName) {
    const converter = (evt, data, conversionApi) => {
      const editor = this.editor;
      const imageUtils = editor.plugins.get('ImageUtils');
      if (!imageUtils.isImage(data.item)) {
        return;
      }

      const viewElement = conversionApi.mapper.toViewElement(data.item);
      const existingWarning = Array.from(viewElement.getChildren()).find(
        (child) => child.getCustomProperty('drupalImageMissingStyleWarning'),
      );
      const hasStyle = data.item.hasAttribute(this.viewAttributeName);

      if (hasStyle) {
        // Remove existing warning if style is set and there's an existing
        // warning.
        if (existingWarning) {
          conversionApi.writer.remove(existingWarning);
        }
        return;
      }

      // Nothing to do if style doesn't exist and there's already an existing
      // warning.
      if (existingWarning) {
        return;
      }

      const view = editor.ui.componentFactory.create(
        'drupalImageStyleMissing',
      );
      view.listenTo(editor.ui, 'update', () => {
        const selectionRange = editor.model.document.selection.getFirstRange();
        const imageRange = editor.model.createRangeOn(data.item);
        // Set the view `isSelected` property depending on whether the model
        // element associated to the view element is in the selection.
        view.set({
          isSelected:
            selectionRange.containsRange(imageRange) ||
            selectionRange.isIntersecting(imageRange),
        });
      });
      view.render();

      // Add reference to the created view element so that it can be destroyed
      // when the view is no longer connected.
      this._missingImageStyleViewReferences.add(view);

      const html = conversionApi.writer.createUIElement(
        'span',
        {
          class: 'image-style-missing-wrapper',
        },
        function (domDocument) {
          const wrapperDomElement = this.toDomElement(domDocument);
          wrapperDomElement.appendChild(view.element);

          return wrapperDomElement;
        },
      );

      conversionApi.writer.setCustomProperty(
        'drupalImageMissingStyleWarning',
        true,
        html,
      );
      conversionApi.writer.insert(
        conversionApi.writer.createPositionAt(viewElement, 'end'),
        html,
      );
    };
    return (dispatcher) => {
      dispatcher.on(eventName, converter, {priority: 'low'});
    };
  }
}
