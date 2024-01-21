<?php

namespace Drupal\lunr\EventSubscriber;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\tome_static\Event\CollectPathsEvent;
use Drupal\tome_static\Event\TomeStaticEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Adds index filenames for Tome exports.
 */
class TomePathSubscriber implements EventSubscriberInterface {

  /**
   * The Lunr search entity storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $lunrSearchStorage;

  /**
   * The file system.
   *
   * @var \Drupal\Core\File\FileSystemInterface
   */
  protected $fileSystem;

  /**
   * Constructs the EntityPathSubscriber object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\File\FileSystemInterface $file_system
   *   The file system.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, FileSystemInterface $file_system) {
    $this->lunrSearchStorage = $entity_type_manager->getStorage('lunr_search');
    $this->fileSystem = $file_system;
  }

  /**
   * Reacts to a collect paths event.
   *
   * @param \Drupal\tome_static\Event\CollectPathsEvent $event
   *   The collect paths event.
   */
  public function collectPaths(CollectPathsEvent $event) {
    /** @var \Drupal\lunr\LunrSearchInterface $search */
    foreach ($this->lunrSearchStorage->loadMultiple() as $search) {
      $directory = dirname($search->getBaseIndexPath());
      if (!file_exists($directory)) {
        continue;
      }
      foreach (array_keys($this->fileSystem->scanDirectory($directory, '/.*/')) as $filename) {
        $event->addPath(file_create_url($filename), ['language_processed' => 'language_processed']);
      }
    }
    $event->addPath(\Drupal::service('extension.list.module')->getPath('lunr') . '/js/search.worker.js', ['language_processed' => 'language_processed']);
    $event->addPath(\Drupal::service('extension.list.module')->getPath('lunr') . '/js/vendor/lunr/lunr.min.js', ['language_processed' => 'language_processed']);
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[TomeStaticEvents::COLLECT_PATHS][] = ['collectPaths'];
    return $events;
  }

}
