import StyleEditingBase from "../../styleeditingbase";


export default class DrupalResponsiveImageStyleEditing extends StyleEditingBase {

  /**
   * @inheritdoc
   */
  static get pluginName() {
    return 'DrupalResponsiveImageStyleEditing';
  }

  static get mainPluginName() {
    return 'DrupalResponsiveImageStyle';
  }

}
