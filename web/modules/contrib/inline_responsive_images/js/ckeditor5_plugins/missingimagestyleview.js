import {View} from 'ckeditor5/src/ui';

export default class MissingImageStyleView extends View {

  /**
   * @inheritdoc
   */
  constructor(text, locale) {
    super(locale);
    this.set('isVisible');
    this.set('isSelected');
    this.setTemplate({
      tag: 'div',
      attributes: {
        class: [
          'drupal-image-style-missing',
          this.bindTemplate.to('isVisible', value => value ? '' : 'ck-hidden'),
        ],
      },
      children: [text]
    });
  }
}
