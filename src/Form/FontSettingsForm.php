<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Form\FontSettingsForm.
 */

namespace Drupal\fontyourface\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class FontSettingsForm.
 *
 * @package Drupal\fontyourface\Form
 *
 * @ingroup fontyourface
 */
class FontSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['fontyourface.settings'];
  }

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
    $config = $this->config('fontyourface.settings');
    $form['Font_settings']['#markup'] = 'Settings form for @font-your-face. Support modules can use this form for settings or to import fonts.';
    $form['load_all_enabled_fonts'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Load all enabled fonts'),
      '#default_value' => (int) $config->get('load_all_enabled_fonts'),
      '#description' => $this->t('This will load all fonts that have been enabled regardless of theme. Warning: this may add considerable download weight to your pages depending on the number of enabled fonts'),
    ];
    $form['import'] = [
      '#type' => 'submit',
      '#value' => $this->t('Import all fonts'),
      '#weight' => 10,
    ];
    return parent::buildForm($form, $form_state);;
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
    $op = (string) $values['op'];
    if ($op == $this->t('Import all fonts')) {
      $module_handler = \Drupal::moduleHandler();
      $module_handler->invokeAll('fontyourface_import');
    }
    if ($op == $this->t('Save configuration')) {
      $config = $this->config('fontyourface.settings')
        ->set('load_all_enabled_fonts', $values['load_all_enabled_fonts'])
        ->save();
      parent::submitForm($form, $form_state);
    }
  }

}
