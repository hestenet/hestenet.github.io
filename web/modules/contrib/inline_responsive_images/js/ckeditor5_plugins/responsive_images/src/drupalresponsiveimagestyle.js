import DrupalResponsiveImageStyleEditing from './drupalresponsiveimagestyleediting';
import DrupalResponsiveImageStyleUI from './drupalresponsiveimagestyleui';
import { Plugin } from 'ckeditor5/src/core';

/**
 * Inspired from :
 * - DrupalImageAlternativeText
 * - Heading
 * - DrupalImage
 */
export default class DrupalResponsiveImageStyle extends Plugin {

  static get requires() {
    return [DrupalResponsiveImageStyleEditing, DrupalResponsiveImageStyleUI];
  }
}
