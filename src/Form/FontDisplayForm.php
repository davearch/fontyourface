<?php

namespace Drupal\fontyourface\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\fontyourface\Entity\Font;

/**
 * Class FontDisplayForm.
 *
 * @package Drupal\fontyourface\Form
 */
class FontDisplayForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $font_display = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $font_display->label(),
      '#description' => $this->t("Label for the Font display."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $font_display->id(),
      '#machine_name' => array(
        'exists' => '\Drupal\fontyourface\Entity\FontDisplay::load',
      ),
      '#disabled' => !$font_display->isNew(),
    );

    /* You will need additional form elements for your custom properties. */

    $fonts = Font::loadEnabledFonts();
    if (empty($fonts)) {
      drupal_set_message($this->t('Please select atleast one font before picking a font style.'));
      $form_state->setRedirect('entity.font.collection');
    }
    $available_fonts = [];
    foreach ($fonts as $font) {
      $available_fonts[$font->url->value] = $font->name->value;
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
      '#default_value' => $font_display->getFontUrl(),
      '#options' => $available_fonts,
      '#required' => TRUE,
    ];

    $form['fallback'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Fallback fonts'),
      '#description' => $this->t('Fallback fonts in case selected font fails to load.'),
      '#default_value' => $font_display->getFallback(),
    ];

    $form['selectors'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Selectors'),
      '#description' => $this->t('Selects the selected font will apply to. Note that all pages will have a "fontyourface" class on the body tag. You can use that to specify a font.'),
      '#default_value' => $font_display->getSelectors(),
      '#maxlength' => 300,
      '#required' => TRUE,
    ];

    $form['theme'] = [
      '#type' => 'select',
      '#title' => $this->t('Theme'),
      '#description' => $this->t('Select theme this display will work for.'),
      '#default_value' => $font_display->getTheme(),
      '#options' => $themes,
      '#required' => TRUE,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $font_display = $this->entity;
    $status = $font_display->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Font display.', [
          '%label' => $font_display->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Font display.', [
          '%label' => $font_display->label(),
        ]));
    }
    $form_state->setRedirectUrl($font_display->urlInfo('collection'));
  }

}
