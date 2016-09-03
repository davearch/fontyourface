<?php

namespace Drupal\Tests\fontyourface\Functional;

use Drupal\Core\Url;
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
   * A test user with permission to access the @font-your-face sections.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create and log in an administrative user.
    $this->adminUser = $this->drupalCreateUser([
      'administer font entities',
    ]);
    $this->drupalLogin($this->adminUser);
  }

  /**
   * Tests @font-your-face install and admin page shows up.
   */
  public function testFontYourFaceSections() {
    // Main font selection page.
    $this->drupalGet(Url::fromRoute('entity.font.collection'));
    $this->assertSession()->pageTextContains(t('Font Selector'));
    // Font settings page.
    $this->drupalGet(Url::fromRoute('font.settings'));
    $this->assertSession()->pageTextContains(t('Settings form for @font-your-face. Support modules can use this form for settings or to import fonts.'));
    // Font display page.
    $this->drupalGet(Url::fromRoute('entity.font_display.collection'));
    $this->assertSession()->pageTextContains(t('There is no Font display yet.'));
    // Font display add page.
    $this->drupalGet(Url::fromRoute('entity.font_display.add_form'));
    $this->assertSession()->pageTextContains(t('Please select atleast one font before picking a font style.'));
  }
}
