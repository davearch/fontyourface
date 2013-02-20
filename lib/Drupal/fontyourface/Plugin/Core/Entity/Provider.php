<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Plugin\Core\Entity\Provider.
 */

namespace Drupal\fontyourface\Plugin\Core\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * Defines the font provider entity.
 *
 * @Plugin(
 *   id = "fontyourface_provider",
 *   label = @Translation("Font Provider"),
 *   module = "fontyourface",
 *   controller_class = "Drupal\fontyourface\ProviderStorageController",
 *   access_controller_class = "Drupal\fontyourface\ProviderAccessController",
 *   form_controller_class = {
 *     "default" = "Drupal\Core\Entity\EntityFormController"
 *   },
 *   config_prefix = "fontyourface.provider",
 *   entity_keys = {
 *     "id" = "pid",
 *     "label" = "name"
 *   }
 * )
 */

class Provider extends ConfigEntityBase {

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
