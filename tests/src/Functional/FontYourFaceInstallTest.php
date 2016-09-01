<?php

namespace Drupal\Tests\fontyourface\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests that installing @font-your-face provides access to the necessary sections.
 *
 * @group fontyourface
 */
class FontYourFaceInstallTest extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = array('fontyourface');

  /**
   * Tests @font-your-face install.
   */
  public function testFontYourFaceInstall() {
    $admin_user = $this->drupalCreateUser(array('administer font entities'));
    $this->drupalLogin($admin_user);

    $this->drupalGet('admin/appearance/font');
  }
}