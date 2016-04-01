<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Form\FontStyleForm.
 */

namespace Drupal\fontyourface\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

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
