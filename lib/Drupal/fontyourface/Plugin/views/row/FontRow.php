<?php

/**
 * @file
 * Definition of Drupal\fontyourface\Plugin\views\row\FontRow.
 */

namespace Drupal\fontyourface\Plugin\views\row;

use Drupal\views\ViewExecutable;
use Drupal\Component\Annotation\Plugin;
use Drupal\Core\Annotation\Translation;
use Drupal\system\Plugin\views\row\EntityRow;

/**
 * Plugin which performs a fontyourface_font_view on the resulting object.
 *
 * Most of the code on this object is in the theme function.
 *
 * @ingroup views_row_plugins
 *
 * @Plugin(
 *   id = "font",
 *   module = "fontyourface",
 *   title = @Translation("Font"),
 *   help = @Translation("Display the font with standard view."),
 *   base = {"fontyourface_font"},
 *   entity_type = "fontyourface_font",
 *   type = "normal"
 * )
 */
class FontRow extends EntityRow {

  /**
   * Overrides Drupal\system\Plugin\views\row\Entity::defineOptions().
   */
  protected function defineOptions() {

    $options = parent::defineOptions();

    $options['view_mode']['default'] = 'teaser';

    return $options;

  } // defineOptions

} // FontRow
