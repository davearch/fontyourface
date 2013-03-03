<?php

/**
 * @file
 * Provide views data and handlers for fontyourface_ui.module.
 *
 * @ingroup views_module_handlers
 */

/**
 * Implements hook_views_data().
 */
function fontyourface_ui_views_data() {

  $data = array();

  // fontyourface_font table

  $data['fontyourface_font']['table']['group']  = t('Font');
  $data['fontyourface_font']['table']['base'] = array(
    'field' => 'fid',
    'title' => t('Font'),
    'access query tag' => 'font_access',
  );
  $data['fontyourface_font']['table']['entity type'] = 'fontyourface_font';

  // fid field

  $data['fontyourface_font']['fid'] = array(
    'title' => t('Font ID'),
    'help' => t('The fid of a font.'),
    'field' => array(
      'id' => 'numeric',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'argument' => array(
      'id' => 'font',
      'name field' => 'name',
      'zero is null' => TRUE,
    ),
    'filter' => array(
      'title' => t('Font'),
      'help' => t('Font chosen from autocomplete or select widget.'),
      'id' => 'fontyourface_font_fid',
      'numeric' => TRUE,
    ),
  );

  // Font name field
  $data['fontyourface_font']['name'] = array(
    'title' => t('Name'),
    'help' => t('The font name.'),
    'field' => array(
      'id' => 'standard',
    ),
    'sort' => array(
      'id' => 'standard',
    ),
    'filter' => array(
      'id' => 'string',
      'help' => t('Font name.'),
    ),
    'argument' => array(
      'id' => 'string',
      'help' => t('Font name.'),
      'many to one' => TRUE,
      'empty field name' => t('Uncategorized'),
    ),
  );

  // Font provider

  $data['fontyourface_font']['pid'] = array(
    'title' => t('Provider'),
    'help' => t('Filter the results of font to a particular provider.'),
    'filter' => array(
      'id' => 'bundle',
    ),
  );

  return $data;

} // fontyourface_ui_views_data
