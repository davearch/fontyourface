<?php

namespace Drupal\fontyourface;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\fontyourface\Entity\Font;

/**
 * Provides a listing of Font display entities.
 */
class FontDisplayListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Font display');
    $header['id'] = $this->t('Machine name');
    $header['name'] = $this->t('Font');
    $header['theme'] = $this->t('Theme');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    // if font is NULL this throws a massive error
    // Query condition cannot be empty in
    // Drupal\Core\Database\Query\Condition->condition() line 105
    $font = $entity->getFont();
    if (empty($font)) {
      $font = Font::create(['name' => 'Font not supported!']);
    }

    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['name'] = $font->name->value;
    $row['theme'] = $entity->getTheme();
    return $row + parent::buildRow($entity);
  }

}
