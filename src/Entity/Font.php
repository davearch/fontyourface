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
 *     "edit-form" = "/admin/appearance/font/{font}/edit",
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

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
