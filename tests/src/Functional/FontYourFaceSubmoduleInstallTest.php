<?php

namespace Drupal\Tests\fontyourface\Functional;

use Drupal\Core\Url;
use Drupal\simpletest\WebTestBase;

/**
 * Tests that installing @font-your-face submodules is not broken.
 *
 * @group fontyourface
 */
class FontYourFaceSubmoduleInstallTest extends WebTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['views', 'fontyourface', 'websafe_fonts_test'];

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
    $this->assertText(t('Font Selector'));

    // Font display page.
    $this->drupalGet(Url::fromRoute('entity.font_display.collection'));
    $this->assertText(t('There is no Font display yet.'));

    // Font display add page.
    $this->drupalGet(Url::fromRoute('entity.font_display.add_form'));
    $this->assertText(t('Please select atleast one font before picking a font style.'));

    // Font settings page.
    $this->drupalGet(Url::fromRoute('font.settings'));
    $this->assertText(t('Settings form for @font-your-face. Support modules can use this form for settings or to import fonts.'));
    $this->assertRaw(t('Import all fonts'));
    $this->assertRaw(t('Import from websafe_fonts_test'));
  }

  /**
   * Tests importing fonts from websafe_fonts_test.
   */
  public function testImportWebSafeFonts() {
    // Assert no fonts exist to start
    $this->drupalGet(Url::fromRoute('entity.font.collection'));
    $this->assertNoText('Arial');

    $this->drupalPostForm(Url::fromRoute('font.settings'), [], t('Import from websafe_fonts_test'));
    $this->assertResponse(200);
    $this->assertUrl(Url::fromRoute('font.settings'));
    $this->assertRaw(t('Finished importing fonts.'));

    // Assert all fonts were imported.
    $this->drupalGet(Url::fromRoute('entity.font.collection'));
    $this->assertRaw('Arial');
    $this->assertRaw('Verdana');
    $this->assertRaw('Courier New');
    $this->assertRaw('Georgia');
  }

}
