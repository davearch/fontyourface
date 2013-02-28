<?php

/**
 * @file
 * Field definitions for the @font-your-face module.
 */

/**
 * Adds CSS style field.
 */
function fontyourface_provider_add_css_style_field($pid) {

  $t = get_t();

  $field = field_info_field('font_css_style');
  $instance = field_info_instance('fontyourface_font', 'font_css_style', $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => 'font_css_style',
      'type' => 'list_text',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('allowed_values' => array(
        'normal' => $t('Normal'),
        'italic' => $t('Italic'),
        'oblique' => $t('Oblique'),
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

  $t = get_t();

  $field = field_info_field('font_css_weight');
  $instance = field_info_instance('fontyourface_font', 'font_css_weight', $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => 'font_css_weight',
      'type' => 'list_text',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('allowed_values' => array(
        'normal' => $t('Normal'),
        'bold' => $t('Bold'),
        'bolder' => $t('Bolder'),
        'lighter' => $t('Lighter'),
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

