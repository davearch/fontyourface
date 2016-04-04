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
    $font->enable();
    drupal_set_message(t('Font @font successfully enabled', ['@font' => $font->name->value]));
    return $this->redirect('entity.font.collection');
  }

  /**
   * {@inheritdoc}
   */
  public function disableFont(Font $font) {
    $font->disable();
    drupal_set_message(t('Font @font successfully disabled', ['@font' => $font->name->value]));
    return $this->redirect('entity.font.collection');
  }
}