<?php

declare(strict_types=1);

namespace Drupal\inline_responsive_images\Plugin\CKEditor5Plugin;

use Drupal\ckeditor5\Plugin\CKEditor5PluginConfigurableTrait;
use Drupal\ckeditor5\Plugin\CKEditor5PluginDefault;
use Drupal\editor\EditorInterface;
use Drupal\responsive_image\Entity\ResponsiveImageStyle as Style;

/**
 * This class transmits the enabled styles to the javascript plugin.
 */
class ResponsiveImageStyle extends CKEditor5PluginDefault {

  use CKEditor5PluginConfigurableTrait;

  /**
   * @param mixed[] $static_plugin_config
   * @param \Drupal\editor\EditorInterface $editor
   *
   * @return mixed[]
   */
  public function getDynamicPluginConfig(array $static_plugin_config, EditorInterface $editor): array {
    $format = $editor->getFilterFormat();
    /** @var \Drupal\filter\Plugin\FilterInterface $filter */
    $filter = $format->filters('filter_responsive_image_style');
    $filter_config = $filter->getConfiguration();
    $enabledStyles = [];
    foreach (array_keys(array_filter($filter_config['settings'])) as $style_name) {
      $style_name = str_replace('responsive_style_', '', $style_name);
      if ($style = Style::load($style_name)) {
        $enabledStyles[$style_name] = $style->label();
      }
    }
    $parent_config = parent::getDynamicPluginConfig($static_plugin_config, $editor);
    return array_merge_recursive($parent_config,
      [
        'DrupalResponsiveImageStyle' =>
          [
            'enabledStyles' => $enabledStyles,
          ],
      ]);
  }

}
