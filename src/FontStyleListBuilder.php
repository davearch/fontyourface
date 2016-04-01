<?php

/**
 * @file
 * Contains \Drupal\fontyourface\FontStyleListBuilder.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Font style entities.
 */
class FontStyleListBuilder extends ConfigEntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Font style');
    $header['id'] = $this->t('Machine name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    // You probably want a few more properties here...
    return $row + parent::buildRow($entity);
  }

}
