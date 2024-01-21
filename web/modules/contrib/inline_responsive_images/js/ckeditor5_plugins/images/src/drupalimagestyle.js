import DrupalImageStyleEditing from './drupalimagestyleediting';
import DrupalImageStyleUI from './drupalimagestyleui';
import { Plugin } from 'ckeditor5/src/core';

/**
 * Inspired from :
 * - DrupalImageAlternativeText
 * - Heading
 * - DrupalImage
 */
export default class DrupalImageStyle extends Plugin {

  static get requires() {
    return [DrupalImageStyleEditing, DrupalImageStyleUI];
  }
}
