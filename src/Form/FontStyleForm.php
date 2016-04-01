<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Form\FontStyleForm.
 */

namespace Drupal\fontyourface\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\fontyourface\Entity\Font;

/**
 * Class FontStyleForm.
 *
 * @package Drupal\fontyourface\Form
 */
class FontStyleForm extends EntityForm {
  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $font_style = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $font_style->label(),
      '#description' => $this->t("Label for the Font style."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $font_style->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\fontyourface\Entity\FontStyle::load',
      ),
      '#disabled' => !$font_style->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    $fonts = Font::loadEnabledFonts();
    if (empty($fonts)) {
      drupal_set_message($this->t('Please select atleast one font before picking a font style.'));
      $form_state->setRedirect('entity.font.collection');
    }
    $available_fonts = [];
    foreach ($fonts as $font) {
      $available_fonts[$font->getUrl()] = $font->getName();
    }

    $drupal_themes = \Drupal::service('theme_handler')->listInfo();
    $themes = [];
    foreach ($drupal_themes as $key => $theme) {
      if (!empty($theme->info['hidden'])) {
        continue;
      }
      $themes[$key] = $theme->info['name'];
    }

    $form['font_url'] = [
      '#type' => 'select',
      '#title' => $this->t('Font'),
      '#description' => $this->t('Select the font to use as part of the font style'),
      '#default_value' => $font_style->getFontUrl(),
      '#options' => $available_fonts,
      '#required' => TRUE,
    ];

    $form['style'] = [
      '#type' => 'select',
      '#title' => $this->t('Font Style'),
      '#description' => $this->t('The font style you wish to use'),
      '#default_value' => $font_style->getStyle(),
      '#options' => [
        'normal' => 'Normal',
        'italic' => 'Italic',
        'oblique' => 'Oblique',
      ],
      '#required' => TRUE,
    ];

    $form['weight'] = [
      '#type' => 'select',
      '#title' => $this->t('Font Weight'),
      '#description' => $this->t('The font weight you wish to use'),
      '#default_value' => $font_style->getWeight(),
      '#options' => [
        'normal' => 'Normal',
        'bold' => 'Bold',
        'bolder' => 'Bolder',
        'lighter' => 'Lighter',
        '100' => '100',
        '200' => '200',
        '300' => '300',
        '400' => '400',
        '500' => '500',
        '600' => '600',
        '700' => '700',
        '800' => '800',
        '900' => '900',
      ],
      '#required' => TRUE,
    ];

    $form['fallback'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Fallback fonts'),
      '#description' => $this->t('Fallback fonts in case selected font fails to load.'),
      '#default_value' => $font_style->getFallback(),
    ];

    $form['selectors'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Selectors'),
      '#description' => $this->t('Selects the selected font will apply to.'),
      '#maxlength' => 300,
      '#required' => TRUE,
    ];

    $form['theme'] = [
      '#type' => 'select',
      '#title' => $this->t('Theme'),
      '#description' => $this->t('Select theme this display will work for.'),
      '#options' => $themes,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $font_style = $this->entity;
    $status = $font_style->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Font style.', [
          '%label' => $font_style->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Font style.', [
          '%label' => $font_style->label(),
        ]));
    }
    $form_state->setRedirectUrl($font_style->urlInfo('collection'));
  }

}
