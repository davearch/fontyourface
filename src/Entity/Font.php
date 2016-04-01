<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Entity\Font.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\fontyourface\FontInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Font entity.
 *
 * @ingroup fontyourface
 *
 * @ContentEntityType(
 *   id = "font",
 *   label = @Translation("Font"),
 *   handlers = {
 *     "storage_schema" = "Drupal\fontyourface\FontStorageSchema",
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\fontyourface\FontListBuilder",
 *     "views_data" = "Drupal\fontyourface\Entity\FontViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\fontyourface\Form\FontForm",
 *       "edit" = "Drupal\fontyourface\Form\FontForm",
 *     },
 *     "access" = "Drupal\fontyourface\FontAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\fontyourface\FontHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "fontyourface_font",
 *   admin_permission = "administer font entities",
 *   entity_keys = {
 *     "id" = "fid",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "pid" = "pid",
 *     "url" = "url",
 *   },
 *   links = {
 *     "canonical" = "/admin/appearance/font/{font}",
 *     "enable" = "/admin/appearance/font/{font}/enable",
 *     "disable" = "/admin/appearance/font/{font}/disable",
 *     "collection" = "/admin/appearance/font",
 *   },
 *   field_ui_base_route = "font.settings"
 * )
 */
class Font extends ContentEntityBase implements FontInterface {
  use EntityChangedTrait;
  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
  }

  /**
   * {@inheritdoc}
   */
  public function getPid() {
    return $this->get('pid')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPid($pid) {
    $this->set('pid', $pid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getProvider() {
    return $this->get('pid')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setProvider($provider) {
    $this->set('pid', $provider);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->get('url')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setUrl($url) {
    $this->set('url', $url);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCssFamily() {
    return $this->get('css_family')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCssFamily($family) {
    $this->set('css_family', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCssStyle() {
    return $this->get('css_style')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCssStyle($style) {
    $this->set('css_style', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCssWeight() {
    return $this->get('css_weight')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCssWeight($weight) {
    $this->set('css_weight', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFoundry() {
    return $this->get('foundry')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setFoundry($foundry) {
    $this->set('foundry', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFoundryUrl() {
    return $this->get('foundry_url')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setFoundryUrl($foundry_url) {
    $this->set('foundry_url', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getLicense() {
    return $this->get('license')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setLicense($license) {
    $this->set('license', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getLicenseUrl() {
    return $this->get('license_url')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setLicenseUrl($license_url) {
    $this->set('license_url', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDesigner() {
    return $this->get('designer')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDesigner($designer) {
    $this->set('designer', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDesignerUrl() {
    return $this->get('designer_url')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setDesignerUrl($designer_url) {
    $this->set('designer_url', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getMetadata() {
    return unserialize($this->get('metadata')->value);
  }

  /**
   * {@inheritdoc}
   */
  public function setMetadata($metadata) {
    $this->set('metadata', serialize($metadata));
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getChangedTime() {
    return $this->get('changed')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setChangedTime($timestamp) {
    $this->set('changed', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isEnabled() {
    $config = \Drupal::config('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    return in_array($this->getUrl(), $enabled_fonts);
  }

  /**
   * {@inheritdoc}
   */
  public function isDisabled() {
    return !$this->isEnabled();
  }

  /**
   * {@inheritdoc}
   */
  public function enable() {
    $config = \Drupal::configFactory()->getEditable('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    $enabled_fonts = array_merge($enabled_fonts, [$this->getUrl()]);
    $config->set('enabled_fonts', $enabled_fonts)
      ->save();
    return $this->isEnabled();
  }

  /**
   * {@inheritdoc}
   */
  public function disable() {
    $config = \Drupal::configFactory()->getEditable('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    $enabled_fonts = array_diff($enabled_fonts, [$this->getUrl()]);
    $config->set('enabled_fonts', $enabled_fonts)
      ->save();
    return !$this->isDisabled();
  }

  /**
   * {@inheritdoc}
   */
  public static function loadEnabledFonts() {
    $config = \Drupal::config('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    $fonts = [];
    foreach ($enabled_fonts as $enabled_font_url) {
      $font = self::loadByUrl($enabled_font_url);
      if (!empty($font)) {
        $fonts[$font->id()] = $font;
      }
    }
    return $fonts;
  }

  /**
   * {@inheritdoc}
   */
  public static function loadByUrl($font_url) {
    $controller = \Drupal::entityManager()->getStorage('font');
    $fonts = $controller->loadByProperties(['url' => $font_url]);
    $fonts = \Drupal::entityManager()->getStorage('font')->loadByProperties(['url' => $font_url]);
    return reset($fonts);
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields['fid'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Font entity.'))
      ->setReadOnly(TRUE);
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Font entity.'))
      ->setReadOnly(TRUE);
    $fields['pid'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Provider ID'))
      ->setDescription(t('The font provider ID.'))
      ->setSettings(array(
        'max_length' => 50,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Font URL'))
      ->setDescription(t('A URL for the font.'))
      ->setSettings(array(
        'max_length' => 191,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Font entity.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['css_family'] = BaseFieldDefinition::create('string')
      ->setLabel(t('CSS Family'))
      ->setDescription(t('CSS family for the font.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['css_style'] = BaseFieldDefinition::create('string')
      ->setLabel(t('CSS Style'))
      ->setDescription(t('CSS style for the font.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['css_weight'] = BaseFieldDefinition::create('string')
      ->setLabel(t('CSS Weight'))
      ->setDescription(t('CSS weight for the font.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['foundry'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Foundry'))
      ->setDescription(t('Foundry for the font.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['foundry_url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Foundry URL'))
      ->setDescription(t('Foundry URL.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['license'] = BaseFieldDefinition::create('string')
      ->setLabel(t('License'))
      ->setDescription(t('Font License.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['license_url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('License URL'))
      ->setDescription(t('License URL.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['designer'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Designer'))
      ->setDescription(t('Font Designer'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['designer_url'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Designer URL'))
      ->setDescription(t('Designer URL.'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['metadata'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Font Metadata'))
      ->setDescription(t('Additional Font Metadata'))
      ->setSettings(array(
        'max_length' => 255,
        'text_processing' => 0,
      ))
      ->setDefaultValue('')
      ->setDisplayOptions('view', array(
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ))
      ->setDisplayOptions('form', array(
        'type' => 'string_textfield',
        'weight' => -4,
      ))
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
