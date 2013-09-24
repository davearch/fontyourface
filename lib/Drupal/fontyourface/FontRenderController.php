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

    if (empty($entities)) {
      return;
    } // if

    parent::buildContent($entities, $displays, $view_mode, $langcode);

    foreach ($entities as $key => $entity) {

      $bundle = $entity->bundle();

      $display = $displays[$bundle];

      // Add short preview field element to font render array.

      if ($display->getComponent('preview')) {

        $entity->content['preview'] = array(
          '#type' => 'item',
          // '#title' => t('Short Preview'),
          '#markup' => 'TEST',
          '#prefix' => '<div class="field-preview-display">',
          '#suffix' => '</div>'
        );

      } // if

      if ($display->getComponent('enable')) {

        if ($entity->enabled) {
          $link = l('Disable', 'admin/config/fontyourface/font/' . $entity->fid);
        } // if
        else {
          $link = l('Enable', 'admin/config/fontyourface/font/' . $entity->fid);
        } // else

        $entity->content['enable'] = array(
          '#type' => 'item',
          // '#title' => t('Enable Link'),
          '#markup' => $link,
          '#prefix' => '<div class="field-enable-display">',
          '#suffix' => '</div>'
        );

      } // if

    } // foreach

  } // buildContent

} // FontRenderController
