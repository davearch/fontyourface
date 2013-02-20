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
   * Overrides Drupal\Core\Config\Entity\ConfigStorageController::postSave().
   */
  protected function postSave(EntityInterface $entity, $update) {

    /*
if (!$update) {
      field_attach_create_bundle('font', $entity->id());
    } // if
    elseif ($entity->getOriginalID() != $entity->id()) {
      // Reflect url changes in the definitions of existing 'taxonomy'
      // fields.
      $fields = field_read_fields();
      foreach ($fields as $field_name => $field) {
        $update_field = FALSE;
        if ($field['type'] == 'taxonomy_term_reference') {
          foreach ($field['settings']['allowed_values'] as $key => &$value) {
            if ($value['vocabulary'] == $entity->getOriginalID()) {
              $value['vocabulary'] = $entity->id();
              $update_field = TRUE;
            }
          }
          if ($update_field) {
            field_update_field($field);
          }
        }
      }
      // Update bundles.
      field_attach_rename_bundle('taxonomy_term', $entity->getOriginalID(), $entity->id());
    }
*/
    parent::postSave($entity, $update);
    $this->resetCache($update ? array($entity->getOriginalID()) : array());

  } // postSave

  /**
   * Overrides Drupal\Core\Config\Entity\ConfigStorageController::preDelete().
   */
  protected function preDelete($entities) {

    parent::preDelete($entities);
    
    // Delete fonts here.
    /*
// Only load terms without a parent, child terms will get deleted too.
    $tids = db_query('SELECT t.tid FROM {taxonomy_term_data} t INNER JOIN {taxonomy_term_hierarchy} th ON th.tid = t.tid WHERE t.vid IN (:vids) AND th.parent = 0', array(':vids' => array_keys($entities)))->fetchCol();
    taxonomy_term_delete_multiple($tids);
*/

  } // preDelete

  /**
   * Overrides Drupal\Core\Config\Entity\ConfigStorageController::postDelete().
   */
  protected function postDelete($entities) {

    parent::postDelete($entities);

/*
    $vocabularies = array();
    foreach ($entities as $vocabulary) {
      $vocabularies[$vocabulary->id()] = $vocabulary->id();
    }
    // Load all Taxonomy module fields and delete those which use only this
    // vocabulary.
    $taxonomy_fields = field_read_fields(array('module' => 'taxonomy'));
    foreach ($taxonomy_fields as $field_name => $taxonomy_field) {
      $modified_field = FALSE;
      // Term reference fields may reference terms from more than one
      // vocabulary.
      foreach ($taxonomy_field['settings']['allowed_values'] as $key => $allowed_value) {
        if (isset($vocabularies[$allowed_value['vocabulary']])) {
          unset($taxonomy_field['settings']['allowed_values'][$key]);
          $modified_field = TRUE;
        }
      }
      if ($modified_field) {
        if (empty($taxonomy_field['settings']['allowed_values'])) {
          field_delete_field($field_name);
        }
        else {
          // Update the field definition with the new allowed values.
          field_update_field($taxonomy_field);
        }
      }
    }
    // Reset caches.
    $this->resetCache(array_keys($vocabularies));
*/
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
