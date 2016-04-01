<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Entity\Font.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Font entities.
 */
class FontViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    return $data;
  }

}
