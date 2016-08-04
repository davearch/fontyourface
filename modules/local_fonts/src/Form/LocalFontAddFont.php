<?php

namespace Drupal\local_fonts\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LocalFontAddFont.
 *
 * @package Drupal\local_fonts\Form
 */
class LocalFontAddFont extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'local_font_add_font';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

// Font name
// Font family
// Font style (normal vs. italic)
// Font classifcation (serif, sans-serif,handwriting, etc)
// Font weight (thin, bold, normal)
// Upload font file
    $form['font_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font name'),
      '#default_value' => '',
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
    ];

    $form['font_family'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font family'),
      '#default_value' => '',
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
    ];

    $form['font_style'] = [
      '#type' => 'select',
      '#title' => $this->t('Font Style'),
      '#options' => [
        'normal' => $this->t('Normal'),
        'italic' => $this->t('Italic'),
      ],
    ];

    $form['font_weight'] = [
      '#type' => 'select',
      '#title' => $this->t('Font Weight'),
      '#options' => [
        '100' => '100',
        '200' => '200',
        '300' => '300',
        '400' => $this->t('400 (normal)'),
        '500' => '500',
        '600' => '600',
        '700' => $this->t('700 (bold)'),
        '800' => '800',
        '900' => '900',
      ],
    ];

    $form['font_classification'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Font Classification'),
      '#options' => [
        'serif' => $this->t('Serif'),
        'sans-serif' => $this->t('Sans Serif'),
        'slab-serif' => $this->t('Slab Serif'),
        'handwriting' => $this->t('Handwriting'),
        'decorative' => $this->t('Decorative'),
        'monospace' => $this->t('Monospace'),
      ],
    ];

    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Submit'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    $values = $form_state->getValues();
    $font = new \stdClass();
    $font->name = $values['font_name'];
    $font->url = 'local_fonts://' . $font->name;
    $font->provider = 'local_fonts';
    $font->css_family = $values['font_family'];
    // Font Squirrel fonts have no concept of normal/bold/light/italics fonts.
    $font->css_weight = $values['font_weight'];
    $font->css_style = $values['font_style'];
    $font->foundry = '';
    $font->foundry_url = '';
    $font->license = '';
    $font->license_url = '';
    $font->license = 'See Font Squirrel license page';
    $font->classification = [
      str_replace(' ', '-', strtolower($font_import->classification)),
    ];
    $font->language = [
      'English',
    ];
    drupal_set_message(print_r($values['font_classification'], TRUE));
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
