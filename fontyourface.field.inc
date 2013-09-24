<?php

/**
 * @file
 * Field definitions for the @font-your-face module.
 */

/**
 * Adds CSS style field.
 */
function fontyourface_provider_add_css_style_field($pid) {

  $field = field_info_field('font_css_style');
  $instance = field_info_instance('fontyourface_font', 'font_css_style', $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => 'font_css_style',
      'type' => 'list_text',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('allowed_values' => array(
        'normal' => t('Normal'),
        'italic' => t('Italic'),
        'oblique' => t('Oblique'),
      )),
    );
    $field = field_create_field($field);
  } // if

  if (empty($instance)) {
    $instance = array(
      'field_name' => 'font_css_style',
      'entity_type' => 'fontyourface_font',
      'bundle' => $pid,
      'label' => 'CSS Style',
      'widget' => array('type' => 'options_select'),
    );
    $instance = field_create_instance($instance);
  } // if

  return $instance;

} // fontyourface_provider_add_css_style_field

/**
 * Adds CSS weight field.
 */
function fontyourface_provider_add_css_weight_field($pid) {

  $field = field_info_field('font_css_weight');
  $instance = field_info_instance('fontyourface_font', 'font_css_weight', $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => 'font_css_weight',
      'type' => 'list_text',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('allowed_values' => array(
        'normal' => t('Normal'),
        'bold' => t('Bold'),
        'bolder' => t('Bolder'),
        'lighter' => t('Lighter'),
        '100' => '100',
        '200' => '200',
        '300' => '300',
        '400' => '400',
        '500' => '500',
        '600' => '600',
        '700' => '700',
        '800' => '800',
        '900' => '900',
      )),
    );
    $field = field_create_field($field);
  } // if

  if (empty($instance)) {
    $instance = array(
      'field_name' => 'font_css_weight',
      'entity_type' => 'fontyourface_font',
      'bundle' => $pid,
      'label' => 'CSS Weight',
      'widget' => array('type' => 'options_select'),
    );
    $instance = field_create_instance($instance);
  } // if

  return $instance;

} // fontyourface_provider_add_css_weight_field

/**
 * Adds foundry URL field.
 */
function fontyourface_provider_add_foundry_url_field($pid) {

  return fontyourface_provider_add_url_field($pid, 'font_foundry_url', 'Foundry URL');
  
} // fontyourface_provider_add_foundry_url_field

/**
 * Adds foundry name field.
 */
function fontyourface_provider_add_foundry_name_field($pid) {

  return fontyourface_provider_add_text_field($pid, 'font_foundry_name', 'Foundry Name');

} // fontyourface_provider_add_foundry_name_field


/**
 * Adds license URL field.
 */
function fontyourface_provider_add_license_url_field($pid) {

  return fontyourface_provider_add_url_field($pid, 'font_license_url', 'License URL');

} // fontyourface_provider_add_license_url_field

/**
 * Adds license name field.
 */
function fontyourface_provider_add_license_name_field($pid) {

  return fontyourface_provider_add_text_field($pid, 'font_licsense_name', 'License Name');

} // fontyourface_provider_add_license_name_field

/**
 * Adds designer URL field.
 */
function fontyourface_provider_add_designer_url_field($pid) {

  return fontyourface_provider_add_url_field($pid, 'font_designer_url', 'Designer URL');

} // fontyourface_provider_add_designer_url_field

/**
 * Adds designer name field.
 */
function fontyourface_provider_add_designer_name_field($pid) {

  return fontyourface_provider_add_text_field($pid, 'font_designer_name', 'Designer Name');

} // fontyourface_provider_add_designer_name_field

/**
 * Adds URL field.
 */
function fontyourface_provider_add_url_field($pid, $field_name, $field_label) {

  $field = field_info_field($field_name);
  $instance = field_info_instance('fontyourface_font', $field_name, $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => $field_name,
      'type' => 'link',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
    );
    $field = field_create_field($field);
  } // if

  if (empty($instance)) {
    $instance = array(
      'field_name' => $field_name,
      'entity_type' => 'fontyourface_font',
      'bundle' => $pid,
      'label' => $field_label,
      'widget' => array('type' => 'link_default'),
      'settings' => array('title' => 0),
    );
    $instance = field_create_instance($instance);
  } // if

  return $instance;

} // fontyourface_provider_add_url_field

/**
 * Adds text field.
 */
function fontyourface_provider_add_text_field($pid, $field_name, $field_label) {

  $field = field_info_field($field_name);
  $instance = field_info_instance('fontyourface_font', $field_name, $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => $field_name,
      'type' => 'text',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('max_length' => 255),
    );
    $field = field_create_field($field);
  } // if

  if (empty($instance)) {
    $instance = array(
      'field_name' => $field_name,
      'entity_type' => 'fontyourface_font',
      'bundle' => $pid,
      'label' => $field_label,
      'widget' => array('settings' => array('size' => 60)),
      'settings' => array('text_processing' => 0),
    );
    $instance = field_create_instance($instance);
  } // if

  return $instance;

} // fontyourface_provider_add_text_field
