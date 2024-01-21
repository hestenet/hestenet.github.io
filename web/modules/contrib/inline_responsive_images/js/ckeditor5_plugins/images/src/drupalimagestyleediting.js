import StyleEditingBase from "../../styleeditingbase";
export default class DrupalImageStyleEditing extends StyleEditingBase {

  /**
   * @inheritdoc
   */
  static get pluginName() {
    return 'DrupalImageStyleEditing';
  }

  static get mainPluginName() {
    return 'DrupalImageStyle';
  }

}
