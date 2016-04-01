<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Entity\FontStyle.
 */

namespace Drupal\fontyourface\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\fontyourface\FontStyleInterface;
use Drupal\fontyourface\Entity\Font;

/**
 * Defines the Font style entity.
 *
 * @ConfigEntityType(
 *   id = "font_style",
 *   label = @Translation("Font Display"),
 *   handlers = {
 *     "list_builder" = "Drupal\fontyourface\FontStyleListBuilder",
 *     "form" = {
 *       "add" = "Drupal\fontyourface\Form\FontStyleForm",
 *       "edit" = "Drupal\fontyourface\Form\FontStyleForm",
 *       "delete" = "Drupal\fontyourface\Form\FontStyleDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\fontyourface\FontStyleHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "font_style",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *     "font_url" = "font_url",
 *     "style" = "style",
 *     "weight" = "weight",
 *     "fallback" = "fallback",
 *     "selectors" = "selectors",
 *     "theme" = "theme"
 *   },
 *   links = {
 *     "canonical" = "/admin/appearance/font_style/{font_style}",
 *     "add-form" = "/admin/appearance/font_style/add",
 *     "edit-form" = "/admin/appearance/font_style/{font_style}/edit",
 *     "delete-form" = "/admin/appearance/font_style/{font_style}/delete",
 *     "collection" = "/admin/appearance/font_style"
 *   },
 *   config_export = {
 *     "font_url",
 *     "style",
 *     "weight",
 *     "fallback",
 *     "selectors",
 *     "theme"
 *   }
 * )
 */
class FontStyle extends ConfigEntityBase implements FontStyleInterface {
  /**
   * The Font style ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Font style label.
   *
   * @var string
   */
  protected $label;

  /**
   * Font URL - these are unique.
   *
   * @var string
   */
  protected $font_url;

  /**
   * Font style.
   *
   * @var string
   */
  protected $style;

  /**
   * Font weight.
   *
   * @var string
   */
  protected $weight;

  /**
   * Fallback fonts when font fails to load.
   *
   * @var string
   */
  protected $fallback;

  /**
   * Selectors where font applies.
   *
   * @var string
   */
  protected $selectors;

  /**
   * Theme - where the font + selectors will be used.
   *
   * @var string
   */
  protected $theme;

  /**
   * {@inheritdoc}
   */
  public function getFont() {
    return Font::loadByUrl($this->getFontUrl());
  }

  /**
   * {@inheritdoc}
   */
  public function getFontUrl() {
    return $this->get('font_url');
  }

  /**
   * {@inheritdoc}
   */
  public function setFontUrl($font_url) {
    $this->set('font_url', $font_url);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getStyle() {
    return $this->get('style');
  }

  /**
   * {@inheritdoc}
   */
  public function setStyle($style) {
    $this->set('style', $font_url);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->get('weight');
  }

  /**
   * {@inheritdoc}
   */
  public function setWeight($weight) {
    $this->set('weight', $font_url);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFallback() {
    return $this->get('fallback');
  }

  /**
   * {@inheritdoc}
   */
  public function setFallback($fallback) {
    $this->set('fallback', $fallback);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getSelectors() {
    return $this->get('selectors');
  }

  /**
   * {@inheritdoc}
   */
  public function setSelectors($selectors) {
    $this->set('selectors', $selectors);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getTheme() {
    return $this->get('theme');
  }

  /**
   * {@inheritdoc}
   */
  public function setTheme($theme) {
    $this->set('theme', $theme);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function loadByTheme($theme) {
    return \Drupal::entityManager()->getStorage('font_style')->loadByProperties(['theme' => $theme]);
  }

}
