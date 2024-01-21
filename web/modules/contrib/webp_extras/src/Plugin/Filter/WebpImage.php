<?php

namespace Drupal\webp_extras\Plugin\Filter;

use Drupal\webp\Webp;
use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Webp Image filter.
 *
 * @Filter(
 * id = "webp_image",
 * title = @Translation("WebP Image Filter"),
 * description = @Translation("Converts images to WebP images."),
 * type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * weight = 101,
 * )
 */
class WebpImage extends FilterBase implements ContainerFactoryPluginInterface {

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The webp service.
   *
   * @var \Drupal\webp\Webp
   */
  protected $webp;

  /**
   * Constructs WebpImage.
   *
   * @param array $configuration
   * @param string $plugin_id
   * @param array $plugin_definition
   * @param ModuleHandlerInterface $module_handler
   * @param Webp $webp
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, ModuleHandlerInterface $module_handler, Webp $webp) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->moduleHandler = $module_handler;
    $this->webp = $webp;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('module_handler'),
      $container->get('webp.webp')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function tips($long = FALSE) {
    $message = $this->t('Converts images to WebP images. You can set the filter to be after the "Embed Media" filter.');
    return $message;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $doc = new \DOMDocument();
    $doc->encoding = 'UTF-8';
    libxml_use_internal_errors(TRUE);
    if(!empty($text)){
    @$doc->loadHTML(mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8'));
    $query = new \DOMXPath($doc);
    $results = $query->query("//img");
    if ($results->length > 0) {
      foreach ($results as $result) {
        // If the src is already webp, ignore.

        /** @var \DOMElement $result */
        $rel_path = str_replace('/sites/default/files/', '', $result->getAttribute('src'));
        $file_uri = \Drupal::service('stream_wrapper_manager')->normalizeUri(\Drupal::config('system.file')->get('default_scheme') . ('://' . $rel_path));
        // Remove query arguments.
        $uri = preg_match('/^.*(?:\.)[a-zA-Z]+/m', $file_uri, $matches) ? $matches[0] : $file_uri;
        $uri = urldecode($uri);

        // If the src is already webp, ignore.
        if (preg_match('/\.webp$/', $uri)) {
          continue;
        }

        $image = $this->webp->createWebpCopy($uri);
        if ($image) {
          // Create a picture element to provide a fallback for the
          // webp if the browser does not support webp.
          $parent = $result->parentNode;

          // Create a picture element.
          $picture = $doc->createElement('picture');

          // Clone the result so we can use it later.
          $cloned_result = $result->cloneNode(TRUE);
          $image_src = $result->getAttribute('src');
          $webp_src = $this->webp->getWebpSrcset($image_src);
          $result->setAttribute('src', $webp_src);

          // Create a webp source element.
          $source_webp = $doc->createElement('source');
          $source_webp->setAttribute('srcset', $webp_src);
          $source_webp->setAttribute('type', 'image/webp');

          // Append source and the clone of the original img element.
          $picture->appendChild($source_webp);
          $picture->appendChild($cloned_result);

          // Replace the old img element with the picture elemnt.
          $parent->appendChild($picture);
          $parent->removeChild($result);
        }

      }
      $text = $doc->saveHTML();
     }
   }
    return new FilterProcessResult($text);
  }

}
