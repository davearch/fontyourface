<?php

namespace Drupal\local_fonts;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Custom Font entities.
 */
class LocalFontConfigEntityListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Custom Font');
    $header['id'] = $this->t('Machine name');
    $header['font_family'] = $this->t('Font Family');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['font_family'] = $entity->font_family;
    return $row + parent::buildRow($entity);
  }

}
