<?php

/**
 * @file
 * Contains Drupal\fontyourface\Asset\FontYourFaceInlineCssCollectionRenderer.
 */

namespace Drupal\fontyourface\Asset;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Asset\CssCollectionRenderer;
use Drupal\fontyourface\Entity\Font;

class FontYourFaceInlineCssCollectionRenderer extends CssCollectionRenderer {
  /**
   * {@inheritdoc}
   */
  public function render(array $css_assets) {
    // Get the parent assets first.
    $elements = parent::render($css_assets);
    $preview_fonts = &drupal_static('fontyourface_dynamic_preview_fonts');
    foreach ($preview_fonts as $preview_font) {
      $element = \Drupal::moduleHandler()->invoke($preview_font->getProvider(), 'fontyourface_generate_font_family_css', [$preview_font]);
      if (!empty($element)) {
        $elements[] = $element;
        $elements[] = [
          '#type' => 'html_tag',
          '#tag' => 'style',
          '#value' => '.fontyourface-preview { font-family: "'. $preview_font->getCssFamily() . '";}',
        ];
      }
    }
    return $elements;
  }
}
