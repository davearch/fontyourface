<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Entity\FontStyle.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\fontyourface\FontStyleInterface;

/**
 * Defines the Font style entity.
 *
 * @ConfigEntityType(
 *   id = "font_style",
 *   label = @Translation("Font style"),
 *   handlers = {
 *     "list_builder" = "Drupal\fontyourface\FontStyleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\fontyourface\Form\FontStyleForm",
 *       "edit" = "Drupal\fontyourface\Form\FontStyleForm",
 *       "delete" = "Drupal\fontyourface\Form\FontStyleDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\fontyourface\FontStyleHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "font_style",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/appearance/font_style/{font_style}",
 *     "add-form" = "/admin/appearance/font_style/add",
 *     "edit-form" = "/admin/appearance/font_style/{font_style}/edit",
 *     "delete-form" = "/admin/appearance/font_style/{font_style}/delete",
 *     "collection" = "/admin/appearance/font_style"
 *   }
 * )
 */
class FontStyle extends ConfigEntityBase implements FontStyleInterface {
  /**
   * The Font style ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Font style label.
   *
   * @var string
   */
  protected $label;

}
