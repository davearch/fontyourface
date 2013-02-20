<?php

/**
 * @file
 * Contains \Drupal\fontyourface\ProviderAccessController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\EntityAccessController;
use Drupal\Core\Entity\EntityInterface;
use Drupal\user\Plugin\Core\Entity\User;

/**
 * Defines an access controller for the provider entity.
 *
 * @see \Drupal\fontyourface\Plugin\Core\Entity\Provider.
 */
class ProviderAccessController extends EntityAccessController {

  /**
   * Implements \Drupal\Core\Entity\EntityAccessControllerInterface::viewAccess().
   */
  public function viewAccess(EntityInterface $entity, $langcode = LANGUAGE_DEFAULT, User $account = NULL) {
    return user_access('administer fonts', $account);
  } // viewAccess

  /**
   * Implements \Drupal\Core\Entity\EntityAccessControllerInterface::createAccess().
   */
  public function createAccess(EntityInterface $entity, $langcode = LANGUAGE_DEFAULT, User $account = NULL) {
    return user_access('administer fonts', $account);
  } // createAccess

  /**
   * Implements \Drupal\Core\Entity\EntityAccessControllerInterface::updateAccess().
   */
  public function updateAccess(EntityInterface $entity, $langcode = LANGUAGE_DEFAULT, User $account = NULL) {
    return user_access('administer fonts', $account);
  } // updateAccess

  /**
   * Implements \Drupal\Core\Entity\EntityAccessControllerInterface::deleteAccess().
   */
  public function deleteAccess(EntityInterface $entity, $langcode = LANGUAGE_DEFAULT, User $account = NULL) {
    return user_access('administer fonts', $account);
  } // deleteAccess

} // ProviderAccessController
