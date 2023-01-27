<?php

namespace Drupal\sfc_dev\Controller;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Asset\AssetResolverInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\sfc_dev\Ajax\RefreshComponentAssetsCommand;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Component\Serialization\Json;

/**
 * Contains routes for the sfc_dev module.
 */
class ComponentDevController extends ControllerBase {

  /**
   * The component plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $manager;

  /**
   * The asset resolver.
   *
   * @var \Drupal\Core\Asset\AssetResolverInterface
   */
  protected $assetResolver;

  /**
   * ComponentDevController constructor.
   *
   * @param \Drupal\Component\Plugin\PluginManagerInterface $manager
   *   The component plugin manager.
   * @param \Drupal\Core\Asset\AssetResolverInterface $asset_resolver
   *   The asset resolver.
   */
  public function __construct(PluginManagerInterface $manager, AssetResolverInterface $asset_resolver) {
    $this->manager = $manager;
    $this->assetResolver = $asset_resolver;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.single_file_component'),
      $container->get('asset.resolver')
    );
  }

  /**
   * Displays the component library.
   *
   * @return array
   *   A render array.
   */
  public function library() {
    $grouped_definitions = [];
    foreach ($this->manager->getDefinitions() as $plugin_id => $definition) {
      $id = isset($definition['alt_id']) ? $definition['alt_id'] : $plugin_id;
      if (isset($definition['group'])) {
        $grouped_definitions[$definition['group']][$id] = $definition;
      }
      else {
        $grouped_definitions['Other'][$id] = $definition;
      }
    }
    foreach ($grouped_definitions as &$definitions) {
      ksort($definitions, SORT_STRING | SORT_FLAG_CASE);
    }
    ksort($grouped_definitions, SORT_STRING | SORT_FLAG_CASE);
    return [
      '#type' => 'inline_template',
      '#template' => '{% include "sfc--sfc-dev-component-library.html.twig" %}',
      '#context' => [
        'grouped_definitions' => $grouped_definitions,
      ],
    ];
  }

  /**
   * AJAX callback for refreshing the library preview.
   *
   * @param string $plugin_id
   *   The plugin ID.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The response.
   */
  public function libraryPreview($plugin_id) {
    $component = $this->manager->createInstance($plugin_id);
    $context = [
      'component' => $component,
    ];
    $response = new AjaxResponse();
    $content = [
      '#type' => 'inline_template',
      '#template' => '{% include "sfc--sfc-dev-component-preview.html.twig" %}',
      '#context' => $context,
      '#attached' => [
        'library' => [
          'sfc_dev/main',
        ],
      ],
    ];
    $command = new ReplaceCommand('.js-component-preview', $content);
    $response->addCommand($command);
    $command = new InvokeCommand('.js-component-preview :tabbable:first', 'focus');
    $response->addCommand($command);
    $command = new InvokeCommand('[data-component-picker-id]', 'removeClass', ['active']);
    $response->addCommand($command);
    $command = new InvokeCommand('[data-component-picker-id="' . $plugin_id . '"]', 'addClass', ['active']);
    $response->addCommand($command);
    $command = new RefreshComponentAssetsCommand($component, $this->assetResolver);
    $response->addCommand($command);
    return $response;
  }

  /**
   * AJAX callback for checking if a component is outdated.
   *
   * @param string $plugin_id
   *   The plugin ID.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   The response.
   */
  public function shouldWriteAssets($plugin_id) {
    $response = new JsonResponse();
    $response->setContent(Json::encode($this->manager->createInstance($plugin_id)->shouldWriteAssets()));
    return $response;
  }

  /**
   * AJAX callback for viewing a component template.
   *
   * @param string $plugin_id
   *   The plugin ID.
   *
   * @return array
   *   The render array.
   */
  public function viewTemplate($plugin_id) {
    $build = [
      '#type' => 'inline_template',
      '#template' => '{% include "sfc--sfc-dev-component-template.html.twig" %}',
      '#context' => [
        'component' => $this->manager->createInstance($plugin_id),
      ],
    ];
    return $build;
  }

  /**
   * Title callback for the ::viewTemplate route.
   *
   * @param string $plugin_id
   *   The plugin ID.
   *
   * @return string
   *   The title.
   */
  public function viewTemplateTitle($plugin_id) {
    return $this->t('Template for @plugin_id', [
      '@plugin_id' => $plugin_id,
    ]);
  }

}
