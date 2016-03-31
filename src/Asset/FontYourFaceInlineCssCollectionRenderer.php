<?php

/**
 * @file
 * Contains Drupal\fontyourface\Asset\FontYourFaceInlineCssCollectionRenderer.
 */

namespace Drupal\fontyourface\Asset;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Asset\CssCollectionRenderer;

class FontYourFaceInlineCssCollectionRenderer extends CssCollectionRenderer {
  /**
   * {@inheritdoc}
   */
  public function render(array $css_assets) {
    // Get the parent assets first.
    $elements = parent::render($css_assets);
    $fontyourface_font_elements = drupal_alter('fontyourface_fonts');
    $fontyourface_font_styles = drupal_alter('fontyourface_styles');
    return $elements;
  }
}
