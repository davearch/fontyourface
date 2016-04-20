<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Plugin\views\filter\FontYourFaceStyleFilter.
 */

namespace Drupal\fontyourface\Plugin\views\filter;

use Drupal\views\Plugin\views\filter\StringFilter;
use Drupal\Core\Form\FormStateInterface;

/**
 * Filter handler which allows to search based on font providers.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsFilter("fontyourface_font_style")
 */
class FontYourFaceStyleFilter extends StringFilter {

  // exposed filter options
  protected $alwaysMultiple = TRUE;

  /**
   * Provide simple equality operator
   */
  public function operatorOptions() {
    return [
      '=' => $this->t('Is equal to'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function valueForm(&$form, FormStateInterface $form_state) {
    $options = [
      'normal' => $this->t('Normal'),
      'italic' => $this->t('Italics'),
    ];

    $form['value'] = array(
      '#type' => 'select',
      '#title' => $this->t('Font Style'),
      '#options' => $options,
      '#default_value' => $this->value,
    );

    if ($exposed = $form_state->get('exposed')) {
      $identifier = $this->options['expose']['identifier'];
      $user_input = $form_state->getUserInput();
      if (!isset($user_input[$identifier])) {
        $user_input[$identifier] = $this->value;
        $form_state->setUserInput($user_input);
      }
    }
  }

}