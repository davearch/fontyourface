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
   * Gets the Font provider ID.
   *
   * @return string
   *   Font provider ID.
   */
  public function getProvider();

  /**
   * Sets the Font provider ID.
   *
   * @param string $provider
   *   The Font provider ID.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setProvider($provider);

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
   * Gets the Font family.
   *
   * @return string
   *   Name of the Font family.
   */
  public function getCssFamily();

  /**
   * Sets the Font family.
   *
   * @param string $family
   *   The Font family.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setCssFamily($family);

  /**
   * Gets the Font style.
   *
   * @return string
   *   Name of the Font style.
   */
  public function getCssStyle();

  /**
   * Sets the Font style.
   *
   * @param string $style
   *   The Font style.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setCssStyle($style);

  /**
   * Gets the Font weight.
   *
   * @return string
   *   Font Weight.
   */
  public function getCssWeight();

  /**
   * Sets the Font weight.
   *
   * @param string $weight
   *   The Font weight.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setCssWeight($weight);

  /**
   * Gets the Font Foundry.
   *
   * @return string
   *   Font Foundry.
   */
  public function getFoundry();

  /**
   * Sets the Font Foundry.
   *
   * @param string $foundry
   *   The Font Foundry.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setFoundry($foundry);

  /**
   * Gets the Font Foundry URL.
   *
   * @return string
   *   Font Foundry URL.
   */
  public function getFoundryUrl();

  /**
   * Sets the Font Foundry URL.
   *
   * @param string $foundry_url
   *   The Font Foundry URL.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setFoundryUrl($foundry_url);

  /**
   * Gets the Font License.
   *
   * @return string
   *   Font Foundry.
   */
  public function getLicense();

  /**
   * Sets the Font License.
   *
   * @param string $license
   *   The Font License.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setLicense($license);

  /**
   * Gets the Font License URL.
   *
   * @return string
   *   Font License URL.
   */
  public function getLicenseUrl();

  /**
   * Sets the Font License URL.
   *
   * @param string $license_url
   *   The Font License URL.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setLicenseUrl($license_url);

  /**
   * Gets the Font Designer.
   *
   * @return string
   *   Font Designer.
   */
  public function getDesigner();

  /**
   * Sets the Font Designer.
   *
   * @param string $designer
   *   The Font Designer.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setDesigner($designer);

  /**
   * Gets the Font Designer URL.
   *
   * @return string
   *   Font Designer URL.
   */
  public function getDesignerUrl();

  /**
   * Sets the Font Designer URL.
   *
   * @param string $designer_url
   *   The Font Designer URL.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setDesignerUrl($designer_url);

  /**
   * Gets the Font metadata.
   *
   * @return mixed
   *   Mixed type of metadata.
   */
  public function getMetadata();

  /**
   * Sets the Font metadata.
   *
   * @param mixed $metadata
   *   The Font metadata.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setMetadata($metadata);

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
   * Gets the Font changed timestamp.
   *
   * @return int
   *   Creation timestamp of the Font.
   */
  public function getChangedTime();

  /**
   * Sets the Font changed timestamp.
   *
   * @param int $timestamp
   *   The Font creation timestamp.
   *
   * @return \Drupal\fontyourface\FontInterface
   *   The called Font entity.
   */
  public function setChangedTime($timestamp);

  /**
   * Checks if the font is enabled.
   *
   * @return boolean
   *   TRUE is font is enabled. FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Checks if the font is disabled.
   *
   * @return boolean
   *   TRUE is font is disabled. FALSE otherwise.
   */
  public function isDisabled();

  /**
   * Enable a font.
   *
   * @return boolean
   *   TRUE is font is enabled. FALSE otherwise.
   */
  public function enable();

  /**
   * Disable a font.
   *
   * @return boolean
   *   TRUE is font is disabled. FALSE otherwise.
   */
  public function disable();

  /**
   * Returns list of enabled fonts.
   *
   * @return array
   *   Array of fonts.
   */
  public static function loadEnabledFonts();

  /**
   * Returns font by url.
   *
   * @param string $url
   *   $The unique font url.
   *
   * @return array
   *   Array of fonts.
   */
  public static function loadByUrl($font_url);
}
