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
      '#description' => $this->t('The CSS Font label. This is mostly for filtering. Note that checking for duplicates will be based on the text entered here.'),
      '#default_value' => '',
      '#size' => 60,
      '#maxlength' => 128,
      '#required' => TRUE,
    ];

    $form['font_family'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font family'),
      '#description' => $this->t('The CSS Font Family. The @font-face name will be based on this.'),
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
        'italic' => $this->t('Italics'),
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

    $form['font_override'] = [
      '#type' => 'radios',
      '#title' => $this->t('Override?'),
      '#description' => $this->t('Select yes if you wish to override an existing font'),
      '#default_value' => 0,
      '#options' => [0 => $this->t('No'), 1 => $this->t('Yes')],
    ];

    $form['font_file'] = [
      '#type' => 'file',
      '#title' => $this->t('Font File'),
      '#description' => $this->t('The font file must be in WOFF format since that is accepted by all modern browsers.'),
      '#size' => 50,
      '#upload_validators' => [
        'file_validate_extensions' => ['woff'],
        'file_validate_size' => [file_upload_max_size()],
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
    $font_data = new \stdClass();
    $font_data->name = $values['font_name'];
    $font_data->url = 'local_fonts://' . $values['font_family'];
    $font_data->provider = 'local_fonts';
    $font_data->css_family = $values['font_family'];
    $font_data->css_weight = $values['font_weight'];
    $font_data->css_style = $values['font_style'];
    $font_data->classification = array_filter($values['font_classification']);
    $font_data->language = [
      'English',
    ];
    $font_data->metadata = [];
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }
    $font = fontyourface_save_font($font_data);

  }

}
