<?php

namespace Drupal\Tests\fontyourface\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Tests that font displays show css.
 *
 * @group fontyourface
 */
class FontYourFaceFontDisplayTest extends BrowserTestBase {

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
  protected $defaultTheme = 'bartik';

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

    // Set up default themes.
    \Drupal::service('theme_installer')->install([$this->defaultTheme, 'seven']);
    $this->config('system.theme')
      ->set('default', $this->defaultTheme)
      ->set('admin', 'seven')
      ->save();

    // Enable Arial font.
    $this->drupalPostForm(Url::fromRoute('font.settings')->toString(), ['load_all_enabled_fonts' => FALSE], 'Save configuration');
    $this->drupalPostForm(Url::fromRoute('font.settings')->toString(), [], 'Import from websafe_fonts_test');
  }

  /**
   * Tests font not displayed even when Arial is loaded.
   */
  public function testFontNotDisplayed() {
    $this->drupalGet(Url::fromRoute('entity.font.activate', ['font' => 1, 'js' => 'nojs'])->toString());
    $this->resetAll();
    // Assert no fonts load to start.
    $this->drupalGet('/node');
    //$this->assertNoRaw('<meta name="Websafe Font" content="Arial" />');
    $this->assertSession()->responseNotContains('<meta name="Websafe Font" content="Arial" />');
  }

  /**
   * Tests font displayed once added in FontDisplay.
   */
  public function testFontDisplayedViaFontDisplayRule() {
    $this->drupalGet(Url::fromRoute('entity.font.activate', ['font' => 1, 'js' => 'nojs'])->toString());

    $edit = [
      'label' => 'Headers',
      'id' => 'headers',
      'font_url' => 'https://en.wikipedia.org/wiki/Arial',
      'fallback' => '',
      'preset_selectors' => '.fontyourface h1, .fontyourface h2, .fontyourface h3, .fontyourface h4, .fontyourface h5, .fontyourface h6',
      'selectors' => '.fontyourface h1, .fontyourface h2, .fontyourface h3, .fontyourface h4, .fontyourface h5, .fontyourface h6',
      'theme' => $this->defaultTheme,
    ];
    // on save: entityTypeManager->getStorage(id) returns error (schema missing)
    $this->drupalPostForm(Url::fromRoute('entity.font_display.add_form')->toString(), $edit, 'Save');
    // throws database error (query condition cannot be empty) when building collection list page
    $this->drupalGet(Url::fromRoute('entity.font_display.collection')->toString());
    $this->resetAll();

    // Assert Arial loads in general bartik section.
    $this->drupalGet('/node');

    $this->assertSession()->responseContains('<meta name="Websafe Font" content="Arial" />');
    $this->assertSession()->responseContains('fontyourface/font_display/headers.css');
    //$this->assertRaw('<meta name="Websafe Font" content="Arial" />');
    //$this->assertRaw("fontyourface/font_display/headers.css");
  }

}
