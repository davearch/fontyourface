<?php

/**
 * @file
 * Contains \Drupal\fontyourface\FontListBuilder.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Font entities.
 *
 * @ingroup fontyourface
 */
class FontListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Font ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\fontyourface\Entity\Font */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $entity->label(),
      $entity->urlInfo()
    );
    return $row + parent::buildRow($entity);
  }

}
