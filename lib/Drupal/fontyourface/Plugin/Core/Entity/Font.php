<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Plugin\Core\Entity\Font.
 */

namespace Drupal\fontyourface\Plugin\Core\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\Entity;
use Drupal\Core\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;

/**
 * Defines the font entity.
 *
 * @Plugin(
 *   id = "fontyourface_font",
 *   label = @Translation("@font-your-face Font"),
 *   module = "fontyourface",
 *   controller_class = "Drupal\fontyourface\FontStorageController",
 *   render_controller_class = "Drupal\fontyourface\FontRenderController",
 *   form_controller_class = {
 *     "default" = "Drupal\Core\Entity\EntityFormController"
 *   },
 *   base_table = "fontyourface_font",
 *   uri_callback = "fontyourface_font_uri",
 *   fieldable = TRUE,
 *   entity_keys = {
 *     "id" = "fid",
 *     "bundle" = "provider",
 *     "label" = "name",
 *     "uuid" = "url"
 *   },
 *   bundle_keys = {
 *     "bundle" = "provider"
 *   },
 *   view_modes = {
 *     "full" = {
 *       "label" = "Full font display",
 *       "custom_settings" = FALSE
 *     },
 *     "teaser" = {
 *       "label" = "Teaser for browse lists",
 *       "custom_settings" = FALSE
 *     }
 *   },
 *   menu_base_path = "admin/config/fontyourface/font/%font"
 * )
 */

class Font extends Entity implements ContentEntityInterface {

  /**
   * The font ID.
   *
   * @var integer
   */
  public $fid;

  /**
   * Name of the font.
   *
   * @var string
   */
  public $name;

  /**
   * The status of this term.
   *
   * @var integer
   */
  public $enabled = 0;

  /**
   * The font URL.
   *
   * @var string
   */
  public $url;

  /**
   * The font provider.
   *
   * @var string
   */
  public $provider;

  /**
   * The CSS selector.
   *
   * @var string
   */
  public $css_selector;

  /**
   * The CSS family.
   *
   * @var string
   */
  public $css_family;

  /**
   * The CSS style.
   *
   * @var string
   */
  public $css_style;

  /**
   * The CSS weight.
   *
   * @var string
   */
  public $css_weight;

  /**
   * The CSS fallback fonts.
   *
   * @var string
   */
  public $css_fallbacks;

  /**
   * The font foundry.
   *
   * @var string
   */
  public $foundry;

  /**
   * The font foundry URL.
   *
   * @var string
   */
  public $foundry_url;

  /**
   * The font license.
   *
   * @var string
   */
  public $license;

  /**
   * The font license URL.
   *
   * @var string
   */
  public $license_url;

  /**
   * The font designer.
   *
   * @var string
   */
  public $designer;

  /**
   * The font designer URL.
   *
   * @var string
   */
  public $designer_url;

  /**
   * The font metadata.
   *
   * @var string
   */
  public $metadata;

  /**
   * Implements Drupal\Core\Entity\EntityInterface::id().
   */
  public function id() {
    return $this->fid;
  } // id

  /**
   * Implements Drupal\Core\Entity\EntityInterface::bundle().
   */
  public function bundle() {
    return $this->provider;
  } // bundle

} // Font
