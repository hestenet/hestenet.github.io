import {Plugin} from 'ckeditor5/src/core';
import {Model, createDropdown, addListToDropdown} from 'ckeditor5/src/ui';
import {Collection} from 'ckeditor5/src/utils';
import MissingImageStyleView from "./missingimagestyleview";

export default class StyleUIBase extends Plugin {

  /**
   * @inheritdoc
   */
  init() {
    const editor = this.editor;

    this.pluginName = Object.getPrototypeOf(this).constructor.mainPluginName;
    this.label = editor.config.get(`${this.pluginName}.label`);

    // Declare our dropdown component to the editor.
    editor.ui.componentFactory.add(this.pluginName, locale => {

      // Initialize a dropdown UI.
      const dropdownView = createDropdown(locale);
      dropdownView.buttonView.set({
        isOn: false,
        withText: true,
        tooltip: Drupal.t(this.label)
      });

      // Enable the UI if and only if the command is enabled.
      const command = editor.commands.get(this.pluginName);
      dropdownView.bind('isEnabled').to(command, 'isEnabled');

      // Get the enabled styles from Drupal config.
      const options = this.editor.config.get(this.pluginName).enabledStyles;

      // Change the dropdown label according to the selected image style.
      dropdownView.buttonView.bind('label').to(command, 'value', value => {
        return value ? options[value] : Drupal.t('Raw image');
      });

      // Add a button for each available style to the dropdown.
      const itemDefinitions = new Collection();
      for (const [machineName, label] of Object.entries(options)) {
        const def = {
          type: 'button',
          model: new Model({
            withText: true,
            label,
            machineName,
          })
        };

        itemDefinitions.add(def);
      }

      addListToDropdown(dropdownView, itemDefinitions);


      // Execute command when an item from the dropdown is selected.
      this.listenTo(dropdownView, 'execute', evt => {
        editor.execute(this.pluginName, evt.source.machineName);
        editor.editing.view.focus();
      });

      return dropdownView;
    });

    // Declare the warning component which is can be displayed when the image is
    // missing a style.
    this.editor.ui.componentFactory.add(
      'drupalImageStyleMissing',
      locale => {
        const view = new MissingImageStyleView(Drupal.t('Please select an image style.'), locale);
        view.listenTo(this.editor.ui, 'update', () => {
          view.set({isVisible: !this._isVisible || !view.isSelected});
        });
        return view;
      },
    );
  }
}
