<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Entity\Provider.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Entity\EntityStorageControllerInterface;
use Drupal\Core\Entity\Annotation\EntityType;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Defines the font provider entity.
 *
 * @EntityType(
 *   id = "fontyourface_provider",
 *   label = @Translation("Font provider"),
 *   module = "fontyourface",
 *   controllers = {
 *     "storage" = "Drupal\fontyourface\ProviderStorageController",
 *     "access" = "Drupal\fontyourface\ProviderAccessController",
 *     "list" = "Drupal\fontyourface\ProviderListController",
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\EntityFormController",
 *     }
 *   },
 *   config_prefix = "fontyourface.provider",
 *   bundle_of = "fontyourface_font",
 *   entity_keys = {
 *     "id" = "pid",
 *     "label" = "name",
 *   },
 *   links = {
 *     "edit-form" = "admin/config/fontyourface/provider/{fontyourface_provider}",
 *   }
 * )
 */

class Provider extends ConfigEntityBase implements ConfigEntityInterface {

  /**
   * The font provider id.
   *
   * @var string
   */
  public $pid;

  /**
   * The font provider URL.
   *
   * @var string
   */
  public $url;

  /**
   * Name of the provider.
   *
   * @var string
   */
  public $name;

  /**
   * Base path of the provider.
   *
   * @var string
   */
  public $base_path;

  /**
   * Implements Drupal\Core\Entity\EntityInterface::id().
   */
  public function id() {
    return $this->pid;
  } // id

} // Provider
