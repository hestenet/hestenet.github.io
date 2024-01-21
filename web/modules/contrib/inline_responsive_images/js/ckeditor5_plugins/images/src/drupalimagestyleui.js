import StyleUIBase from "../../styleuibase";

export default class DrupalImageStyleUi extends StyleUIBase {

  /**
   * @inheritdoc
   */
  static get pluginName() {
    return 'DrupalImageStyleUI';
  }

  static get mainPluginName() {
    return 'DrupalImageStyle';
  }
}
