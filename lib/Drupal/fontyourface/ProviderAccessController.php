<?php

/**
 * @file
 * Contains \Drupal\fontyourface\ProviderAccessController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\EntityAccessController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines an access controller for the provider entity.
 *
 * @see \Drupal\fontyourface\Entity\Provider.
 */
class ProviderAccessController extends EntityAccessController {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {
    return $account->hasPermission('administer fonts');
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return $account->hasPermission('administer fonts');
  }

} // ProviderAccessController
