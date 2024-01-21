import {Command} from 'ckeditor5/src/core';

export default class StyleAttributeCommand extends Command {
  constructor(attributeName, editor ) {
    super(editor);
    this.attributeName = attributeName;
  }


  /**
   * @inheritDoc
   */
  refresh() {
    const editor = this.editor;
    const imageUtils = editor.plugins.get('ImageUtils');
    const element = imageUtils.getClosestSelectedImageElement(this.editor.model.document.selection);

    this.isEnabled = !!element;

    if (this.isEnabled && element.hasAttribute(this.attributeName)) {
      this.value = element.getAttribute(this.attributeName);
    }
    else {
      this.value = false;
    }
  }

  execute(styleName) {
    const editor = this.editor;
    const imageUtils = editor.plugins.get('ImageUtils');
    const model = editor.model;
    const imageElement = imageUtils.getClosestSelectedImageElement(model.document.selection);

    model.change(writer => writer.setAttribute(this.attributeName, styleName, imageElement));
  }
}
