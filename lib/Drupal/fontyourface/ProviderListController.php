<?php

/**
 * @file
 * Contains \Drupal\fontyourface\ProviderListController.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Config\Entity\ConfigEntityListController;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of vocabularies.
 */
class ProviderListController extends ConfigEntityListController {

  /**
   * {@inheritdoc}
   */
  protected $entitiesKey = 'providers';

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'fontyourface_overview_providers';
  }

  /**
   * {@inheritdoc}
   */
  public function getOperations(EntityInterface $entity) {

    $operations = parent::getOperations($entity);
    $uri = $entity->uri('canonical');

    unset($operations['delete']);
    unset($operations['edit']);

    return $operations;

  } // getOperations

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = t('Provider name');
    return $header + parent::buildHeader();
  } // buildHeader

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $this->getLabel($entity);
    return $row + parent::buildRow($entity);
  } // buildRow

  /**
   * {@inheritdoc}
   */
  public function render() {
    $entities = $this->load();
    $build = parent::render();
    $build['#empty'] = t('No providers available. <a href="@link">Enable provider modules</a>.', array('@link' => url('admin/modules')));
    return $build;
  } // render

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, array &$form_state) {
    $form = parent::buildForm($form, $form_state);
    $form['providers']['#attributes'] = array('id' => 'fontyourface');
    $form['actions']['submit']['#value'] = t('Save');

    return $form;
  } // buildForm

} // ProviderListController
