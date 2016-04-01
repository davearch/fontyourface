<?php

/**
 * @file
 * Contains \Drupal\fontyourface\FontStyleInterface.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Font style entities.
 */
interface FontStyleInterface extends ConfigEntityInterface {
  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Font.
   *
   * @return Font
   *   Font from config.
   */
  public function getFont();

  /**
   * Gets the Font URL.
   *
   * @return string
   *   Font URL.
   */
  public function getFontUrl();

  /**
   * Sets the Font URL.
   *
   * @param string $font_url
   *   The Font URL.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setFontUrl($font_url);

  /**
   * Gets the Font style.
   *
   * @return string
   *   Font URL.
   */
  public function getStyle();

  /**
   * Sets the Font style.
   *
   * @param string $style
   *   The Font URL.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setStyle($style);

  /**
   * Gets the Font weight.
   *
   * @return string
   *   Font weight.
   */
  public function getWeight();

  /**
   * Sets the Font weight.
   *
   * @param string $weight
   *   The Font weight.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setWeight($weight);

  /**
   * Gets the Font fallback fonts.
   *
   * @return string
   *   Font URL.
   */
  public function getFallback();

  /**
   * Sets the Font fallback fonts.
   *
   * @param string $fallback_fonts
   *   The fallback fonts.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setFallback($fallback);

  /**
   * Gets the Font selectors.
   *
   * @return string
   *   Font selectors.
   */
  public function getSelectors();

  /**
   * Sets the Font selectors.
   *
   * @param string $selectors
   *   The Font selectors.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setSelectors($selectors);

  /**
   * Gets the site theme for display usage.
   *
   * @return string
   *   Site theme name.
   */
  public function getTheme();

  /**
   * Sets the Font theme for usage.
   *
   * @param string $style
   *   Site theme name.
   *
   * @return \Drupal\fontyourface\FontStyleInterface
   *   The called Font Style entity.
   */
  public function setTheme($theme);

  /**
   * Returns FontStyles by theme name.
   *
   * @param string $theme
   *   Name of theme.
   *
   * @return array
   *   List of font style configs for theme.
   */
  public static function loadByTheme($theme);

}
