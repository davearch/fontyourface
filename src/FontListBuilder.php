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

  /**
   * Gets this list's default operations.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity the operations are for.
   *
   * @return array
   *   The array structure is identical to the return value of
   *   self::getOperations().
   */
  protected function getDefaultOperations(EntityInterface $entity) {
    $operations = [];
    if ($entity->access('update') && $entity->hasLinkTemplate('edit-form')) {
      $operations['edit'] = [
        'title' => $this->t('Edit'),
        'weight' => 10,
        'url' => $entity->urlInfo('edit-form'),
      ];
    }
    if ($entity->isEnabled()) {
      $operations['disable'] = [
        'title' => $this->t('Disable'),
        'weight' => 100,
        'url' => $entity->urlInfo('disable')
      ];
    }
    if ($entity->isDisabled()) {
      $operations['enable'] = [
        'title' => $this->t('enable'),
        'weight' => 100,
        'url' => $entity->urlInfo('enable')
      ];
    }

    return $operations;
  }

}
