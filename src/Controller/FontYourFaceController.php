<?php

/**
 * @file
 * Contains \Drupal\fontyourface\Controller\FontYourFaceController.
 */

namespace Drupal\fontyourface\Controller;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityAccessControlHandlerInterface;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\fontyourface\Entity\Font;

/**
 * Controller routines for forum routes.
 */
class FontYourFaceController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function enableFont(Font $font) {
    $config = \Drupal::configFactory()->getEditable('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    if (!in_array($font->getUrl(), $enabled_fonts)) {
      $enabled_fonts[] = $font->getUrl();
    }
    $config->set('enabled_fonts', $enabled_fonts)
      ->save();
    drupal_set_message(t('Font @font successfully enabled', ['@font' => $font->getName()]));
    return $this->redirect('entity.font.collection');
  }

  /**
   * {@inheritdoc}
   */
  public function disableFont(Font $font) {
    $config = \Drupal::configFactory()->getEditable('fontyourface.settings');
    $enabled_fonts = $config->get('enabled_fonts');
    $enabled_fonts = array_diff($enabled_fonts, [$font->getUrl()]);
    $config->set('enabled_fonts', $enabled_fonts)
      ->save();
    drupal_set_message(t('Font @font successfully disabled', ['@font' => $font->getName()]));
    return $this->redirect('entity.font.collection');
  }
}