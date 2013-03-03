<?php

/**
 * @file
 * Definition of Drupal\fontyourface\FontFormController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityFormController;

/**
 * Base for controller for font edit forms.
 */
class FontFormController extends EntityFormController {

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::form().
   */
  public function form(array $form, array &$form_state, EntityInterface $font) {

    $provider = fontyourface_provider_load($font->bundle());
    $form_state['fontyourface']['provider'] = $provider;

    // Add any form fields that don't map to entity fields here.

    /*
$form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name'),
      '#default_value' => $term->name,
      '#maxlength' => 255,
      '#required' => TRUE,
      '#weight' => -5,
    );

    $form['description'] = array(
      '#type' => 'text_format',
      '#title' => t('Description'),
      '#default_value' => $term->description,
      '#format' => $term->format,
      '#weight' => 0,
    );
    $language_configuration = module_invoke('language', 'get_default_configuration', 'taxonomy_term', $vocabulary->id());
    $form['langcode'] = array(
      '#type' => 'language_select',
      '#title' => t('Language'),
      '#languages' => LANGUAGE_ALL,
      '#default_value' => $term->langcode,
      '#access' => !is_null($language_configuration['language_show']) && $language_configuration['language_show'],
    );

    $form['relations'] = array(
      '#type' => 'details',
      '#title' => t('Relations'),
      '#collapsed' => ($vocabulary->hierarchy != TAXONOMY_HIERARCHY_MULTIPLE),
      '#weight' => 10,
    );
*/

    $form['pid'] = array(
      '#type' => 'value',
      '#value' => $provider->id(),
    );

    $form['fid'] = array(
      '#type' => 'value',
      '#value' => $font->fid,
    );

    if (empty($font->fid)) {
      $form_state['redirect'] = current_path();
    } // if

    return parent::form($form, $form_state, $font);

  } // form

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::submit().
   */
  public function submit(array $form, array &$form_state) {

    $font = parent::submit($form, $form_state);

    // Save any form fields that don't map to entity fields here.

   /*
 // Prevent leading and trailing spaces in term names.
    $term->name = trim($term->name);

    // Convert text_format field into values expected by taxonomy_term_save().
    $description = $form_state['values']['description'];
    $term->description = $description['value'];
    $term->format = $description['format'];
*/

    return $font;

  } // submit

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::save().
   */
  public function save(array $form, array &$form_state) {
  
    $font = $this->getEntity($form_state);
    $status = fontyourface_font_save($font);
    
    // TODO: change these messages to use real paths.

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message(t('Created new font %font.', array('%font' => $font->label())));
        watchdog('taxonomy', 'Created new font %font.', array('%term' => $font->label()), WATCHDOG_NOTICE, l(t('edit'), 'fontyourface/font/' . $font->fid . '/edit'));
        break;
      case SAVED_UPDATED:
        drupal_set_message(t('Updated font %font.', array('%font' => $font->label())));
        watchdog('taxonomy', 'Updated font %font.', array('%font' => $font->label()), WATCHDOG_NOTICE, l(t('edit'), 'fontyourface/font/' . $font->fid . '/edit'));
        // Clear the page and block caches to avoid stale data.
        // cache_invalidate_tags(array('content' => TRUE));
        break;
    }

    $form_state['values']['fid'] = $font->fid;
    $form_state['fid'] = $font->fid;

  } // save

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::delete().
   */
  public function delete(array $form, array &$form_state) {

    $destination = array();

    if (isset($_GET['destination'])) {
      $destination = drupal_get_destination();
      unset($_GET['destination']);
    } // if

    $font = $this->getEntity($form_state);
    
    // TODO: update this redirect.

    $form_state['redirect'] = array('fontyourface/font/' . $font->fid . '/delete', array('query' => $destination));
  
  } // delete

} // FontFormController
