<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Entity\Font.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\Core\Entity\EntityNG;
use Drupal\Core\Entity\Annotation\EntityType;
use Drupal\Core\Entity\EntityStorageControllerInterface;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the font entity.
 *
 * @EntityType(
 *   id = "fontyourface_font",
 *   label = @Translation("@font-your-face Font"),
 *   bundle_label = @Translation("Provider"),
 *   module = "fontyourface",
 *   controllers = {
 *     "storage" = "Drupal\fontyourface\FontStorageController",
 *     "render" = "Drupal\fontyourface\FontRenderController",
 *     "access" = "Drupal\fontyourface\FontAccessController",
 *     "form" = {
 *       "default" = "Drupal\fontyourface\FontFormController",
 *       "delete" = "Drupal\fontyourface\Form\FontDeleteForm"
 *     },
*     "translation" = "Drupal\content_translation\ContentTranslationControllerNG"
 *   },
 *   base_table = "fontyourface_font",
 *   uri_callback = "fontyourface_font_uri",
 *   fieldable = TRUE,
 *   translatable = FALSE,
 *   entity_keys = {
 *     "id" = "fid",
 *     "bundle" = "pid",
 *     "label" = "name",
 *     "uuid" = "url"
 *   },
 *   bundle_keys = {
 *     "bundle" = "pid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/fontyourface/font/{fontyourface_font}",
 *     "edit-form" = "/admin/config/fontyourface/font/{fontyourface_font}/edit"
 *   },
 *   menu_base_path = "admin/config/fontyourface/font/%fontyourface_font",
 *   route_base_path = "admin/config/fontyourface/provider/{bundle}",
 *   permission_granularity = "bundle"
 * )
 */

class Font extends EntityNG implements ContentEntityInterface {

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
   * The font povider id.
   *
   * @var string
   */
  public $pid;

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
    return $this->get('fid')->value;
  } // id

  /**
   * Implements Drupal\Core\Entity\EntityInterface::bundle().
   */
  public function bundle() {
    return $this->get('pid')->value;
  } // bundle
  
  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions($entity_type) {

    $properties['fid'] = array(
      'label' => t('Font ID'),
      'description' => t('The font ID.'),
      'type' => 'integer_field',
      'read-only' => TRUE,
    );
    $properties['name'] = array(
      'label' => t('Name'),
      'description' => t('The font name.'),
      'type' => 'string_field',
      'read-only' => TRUE,
    );

    return $properties;

  } // baseFieldDefinitions

} // Font
