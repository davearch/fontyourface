<?php

/**
 * @file
 * Field definitions for the @font-your-face Local module.
 */

/**
 * Adds EOT field.
 */
function fontyourface_local_add_eot_field($pid) {

  $description = 'Embedded Open Type. This format is supported by IE 5-8.';
  return fontyourface_local_add_file_field($pid, 'font_eot_file', 'EOT File', 'eot', $description);

} // fontyourface_local_add_eot_field

/**
 * Adds TTF field.
 */
function fontyourface_local_add_ttf_field($pid) {

  $description = 'Raw TrueType file, designed to look good on-screen. This format is supported by Webkit/Safari 3.1+, Safari Mobile iOS 4.2+, Opera 10+, Mozilla/Firefox 3.5+, and Chrome 4+.';
  return fontyourface_local_add_file_field($pid, 'font_ttf_file', 'TTF File', 'ttf', $description);

} // fontyourface_local_add_ttf_field

/**
 * Adds WOFF field.
 */
function fontyourface_local_add_woff_field($pid) {

  $description = 'Web-only font format that uses gzip compression. This format is supported by IE9+, FF3.6+, Chrome 5+.';
  return fontyourface_local_add_file_field($pid, 'font_woff_file', 'WOFF File', 'woff', $description);

} // fontyourface_local_add_woff_field

/**
 * Adds SVG field.
 */
function fontyourface_local_add_svg_field($pid) {

  $description = 'An XML format. This format is supported by iOS 4.1 and below, and Opera 10+.';
  return fontyourface_local_add_file_field($pid, 'font_svg_file', 'SVG File', 'svg', $description);

} // fontyourface_local_add_svg_field

/**
 * Adds File field.
 */
function fontyourface_local_add_file_field($pid, $field_name, $field_label, $file_extensions, $field_description) {

  $t = get_t();

  $field = field_info_field($field_name);
  $instance = field_info_instance('fontyourface_font', $field_name, $pid);

  if (empty($field)) {
    $field = array(
      'field_name' => $field_name,
      'type' => 'file',
      'locked' => TRUE,
      'entity_types' => array('fontyourface_font'),
      'settings' => array('uri_scheme' => 'public'),
    );
    $field = field_create_field($field);
  } // if

  if (empty($instance)) {
    $instance = array(
      'field_name' => $field_name,
      'entity_type' => 'fontyourface_font',
      'bundle' => $pid,
      'label' => $field_label,
      'description' => $field_description,
      'widget' => array('type' => 'file_generic'),
      'settings' => array(
        'file_extensions' => $file_extensions,
        'file_directory' => 'fontyourface/local',
      ),
    );
    $instance = field_create_instance($instance);
  } // if

  return $instance;

} // fontyourface_local_add_woff_field
