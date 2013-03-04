<?php

/**
 * @file
 * Definition of Drupal\node\FontRenderController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityRenderController;
use Drupal\entity\Plugin\Core\Entity\EntityDisplay;

/**
 * Render controller for nodes.
 */
class FontRenderController extends EntityRenderController {

  /**
   * Overrides Drupal\Core\Entity\EntityRenderController::buildContent().
   */
  public function buildContent(array $entities, array $displays, $view_mode, $langcode = NULL) {

    $return = array();

    if (empty($entities)) {
      return $return;
    }

    parent::buildContent($entities, $displays, $view_mode, $langcode);

    foreach ($entities as $key => $entity) {

      $bundle = $entity->bundle();

      $display = $displays[$bundle];

      // Add short preview field element to font render array.
      
      if ($display->getComponent('preview')) {
  
        $entity->content['preview'] = array(
          '#type' => 'item',
          '#title' => t('Short Preview'),
          '#markup' => 'TEST',
          '#prefix' => '<div class="field-preview-display">',
          '#suffix' => '</div>'
        );
      }
    }

  } // buildContent

} // FontRenderController
