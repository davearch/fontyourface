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
    $fontyourface_font_elements = \Drupal::moduleHandler()->invokeAll('fontyourface_font_families');
    $fontyourface_font_styles = \Drupal::moduleHandler()->invokeAll('fontyourface_font_styles');
    return $elements;
  }
}
