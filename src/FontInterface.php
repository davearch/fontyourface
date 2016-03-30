<?php

/**
 * @file
 * Contains \Drupal\fontyourface\FontInterface.
 */

namespace Drupal\fontyourface;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Font entities.
 *
 * @ingroup fontyourface
 */
interface FontInterface extends ContentEntityInterface, EntityChangedInterface {
  // Add get/set methods for your configuration properties here.
  /**
   * Gets the Font name.
   *
   * @return string
   *   Name of the Font.
   */
  public function getName();

  /**
   * Sets the Font name.
   *
   * @param string $name
   *   The Font name.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setName($name);

  /**
   * Gets the Font creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Font.
   */
  public function getCreatedTime();

  /**
   * Sets the Font creation timestamp.
   *
   * @param int $timestamp
   *   The Font creation timestamp.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Gets the Font provider ID.
   *
   * @return string
   *   Font provider ID.
   */
  public function getPid();

  /**
   * Sets the Font provider ID.
   *
   * @param string $pid
   *   The Font provider ID.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setPid($pid);

  /**
   * Gets the Font URL.
   *
   * @return string
   *   Creation timestamp of the Font.
   */
  public function getUrl();

  /**
   * Sets the URL
   *
   * @param string $url
   *   The Font url.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setUrl($url);

}
