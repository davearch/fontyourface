<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Plugin\Core\Entity\FontRule.
 */

namespace Drupal\fontyourface\Plugin\Core\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * Defines the font provider entity.
 *
 * @Plugin(
 *   id = "fontyourface_rule",
 *   label = @Translation("Font Rule"),
 *   module = "fontyourface",
 *   controller_class = "Drupal\fontyourface\ProviderStorageController",
 *   access_controller_class = "Drupal\fontyourface\FontRuleAccessController",
 *   form_controller_class = {
 *     "default" = "Drupal\Core\Entity\EntityFormController"
 *   },
 *   config_prefix = "fontyourface.rule",
 *   entity_keys = {
 *     "id" = "rid",
 *     "label" = "selector"
 *   }
 * )
 */

class FontRule extends ConfigEntityBase {

  /**
   * The font rule id.
   *
   * @var string
   */
  public $rid;

  /**
   * The font id.
   *
   * @var string
   */
  public $fid;

  /**
   * CSS selector.
   *
   * @var string
   */
  public $selector;

  /**
   * Implements Drupal\Core\Entity\EntityInterface::id().
   */
  public function id() {
    return $this->rid;
  } // id

} // FontRule
