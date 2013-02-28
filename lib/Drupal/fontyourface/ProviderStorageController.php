<?php

/**
 * @file
 * Definition of Drupal\fontyourface\ProviderStorageController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Config\Entity\ConfigStorageController;
use Drupal\Core\Entity\EntityInterface;

/**
 * Defines a controller class for font providers.
 */
class ProviderStorageController extends ConfigStorageController {

  /**
   * Overrides Drupal\Core\Config\Entity\ConfigStorageController::postDelete().
   */
  protected function postDelete($entities) {

    parent::postDelete($entities);

    foreach ($entities as $provider) {    
      field_attach_delete_bundle('fontyourface_font', $provider->id());
    } // foreach

  } // postDelete

  /**
   * Overrides Drupal\Core\Config\Entity\ConfigStorageController::resetCache().
   */
  public function resetCache(array $ids = NULL) {

    drupal_static_reset('fontyourface_get_providers');
    parent::resetCache($ids);
    entity_info_cache_clear();

  } // resetCache

} // ProviderStorageController
