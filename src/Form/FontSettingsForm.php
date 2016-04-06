<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Form\FontSettingsForm.
 */

namespace Drupal\fontyourface\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FontSettingsForm.
 *
 * @package Drupal\fontyourface\Form
 *
 * @ingroup fontyourface
 */
class FontSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'Font_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $op = $values['op'];
    if ($op == 'Import all fonts') {
      $module_handler = \Drupal::moduleHandler();
      $module_handler->invokeAll('fontyourface_import');
    }
  }


  /**
   * Defines the settings form for Font entities.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   Form definition array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['Font_settings']['#markup'] = 'Settings form for Font entities. Manage field settings here.';
    $form['import'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import all fonts'),
    ];
    return $form;
  }

}
