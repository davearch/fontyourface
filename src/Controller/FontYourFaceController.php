<?php

namespace Drupal\fontyourface\Controller;

use Drupal\Core\Url;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\fontyourface\Entity\Font;

/**
 * Controller routines for forum routes.
 */
class FontYourFaceController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function enableFont(Font $font, $js) {
    try {
      $font->enable();
      if ($js == 'ajax') {
        $url = Url::fromRoute('entity.font.disable', ['js' => 'nojs', 'font' => $font->id()], ['query' => \Drupal::destination()->getAsArray()]);
        $url->setOptions(['attributes' => ['id' => 'font-status-' . $font->id(), 'class' => ['font-status', 'enabled', 'use-ajax']]]);
        $text = $this->t('Enable');
        $link = \Drupal::l($text, $url);

        $response = new AjaxResponse();
        return $response->addCommand(new ReplaceCommand('#font-status-' . $font->id(), $link));
      }
      else {
        drupal_set_message($this->t('Font @font successfully enabled', ['@font' => $font->name->value]));
        return $this->redirect('entity.font.collection');
      }
    }
    catch (Exception $e) {
      $error = $e->getMessage();
      if ($js == 'ajax') {
        return new AjaxResponse([
          'response' => TRUE,
          'message' => $error,
        ], 503);
      }
      else {
        drupal_set_message($error, 'error');
        return $this->redirect('entity.font.collection');
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function disableFont(Font $font, $js) {
    try {
      $font->disable();
      if ($js == 'ajax') {
        $url = Url::fromRoute('entity.font.enable', ['js' => 'nojs', 'font' => $font->id()], ['query' => \Drupal::destination()->getAsArray()]);
        $url->setOptions(['attributes' => ['id' => 'font-status-' . $font->id(), 'class' => ['font-status', 'disabled', 'use-ajax']]]);
        $text = $this->t('Enable');
        $link = \Drupal::l($text, $url);

        $response = new AjaxResponse();
        return $response->addCommand(new ReplaceCommand('#font-status-' . $font->id(), $link));
      }
      else {
        drupal_set_message($this->t('Font @font successfully disabled', ['@font' => $font->name->value]));
        return $this->redirect('entity.font.collection');
      }
    }
    catch (Exception $e) {
      $error = $e->getMessage();
      if ($js == 'ajax') {
        return new AjaxResponse([
          'response' => TRUE,
          'message' => $error,
        ], 503);
      }
      else {
        drupal_set_message($error, 'error');
        return $this->redirect('entity.font.collection');
      }
    }
  }

}
