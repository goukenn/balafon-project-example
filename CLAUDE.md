# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **BalafonProjectTutorial** - a tutorial/example project for the Balafon PHP web framework. Balafon is a modern MVC framework for building web applications with dynamic theming, multilingual support, and database migrations.

**Author**: C.A.D. BONDJE DOUE
**Version**: 1.0

## Common Commands

### Running Tests

```bash
# Run all tests
phpunit

# Run specific test
phpunit --filter test_init

# Run tests with coverage
phpunit --coverage-html coverage/
```

Tests are located in `Lib/Tests/` and use PHPUnit with the configuration in `phpunit.xml.dist`.

### PHPUnit Environment Variables

The test suite requires these environment variables (configured in `phpunit.xml.dist`):
- `IGK_BASE_DIR`: Base directory of Balafon installation
- `IGK_APP_DIR`: Application directory
- `IGK_TEST_CONTROLER`: Set to `BalafonProjectTutorialController`

## Architecture Overview

### Request Flow

```
HTTP Request → Router (Configs/routes.php) → Controller → Action Method → View Resolution
```

### View Resolution Process

1. Controller returns an action
2. Framework looks for corresponding view file in `Views/`
3. Loads `.header.pinc` (shared header with Google Fonts setup)
4. Loads `.menu.pinc` (navigation menu configuration)
5. Loads specific view (e.g., `default.phtml`)
6. Loads `.footer.pinc` (shared footer)
7. Applies styles from `Styles/default.pcss` + selected theme
8. Renders final HTML

### Dynamic Styling System

Balafon uses `.pcss` files (PHP-enhanced CSS) that support:
- PHP variables for theming (e.g., `$cl` for colors, `$def` for defaults)
- Responsive breakpoints: `$xsm_screen`, `$sm_screen`, `$lg_screen`
- Dynamic theme loading from `Styles/Themes/`

Available themes:
- `light.theme.pcss`
- `dark.theme.pcss`

### Multilingual System

The framework supports internationalization via `.presx` files in `Configs/Lang/`:
- `lang.en.presx` (English)
- `lang.fr.presx` (French)
- `lang.nl.presx` (Dutch)

Usage in code:
```php
echo $l["title.default"];  // Access translated string
```

Static content pages in `Articles/` follow the naming pattern: `{name}.{language}.phtml`

## Key Files and Their Purposes

### Controller
- `BalafonProjectTutorialController.php`: Main controller extending `ApplicationController`

### Configuration Files
- `Configs/routes.php`: HTTP routing definitions using `Route::get($actionClass, $uriPattern)`
- `Configs/views.php`: View configuration and directory entry settings
- `Configs/profiles.php`: User profiles and authentication groups
- `balafon.config.json`: Project metadata (name, author, version)

### Database
- `Lib/Classes/Database/InitDbSchemaBuilder.php`: Database migrations with `upgrade()` and `downgrade()` methods
- `Lib/Classes/Database/InitMacros.php`: Application-wide macros and global configuration via `run(AppBuilder $builder)`

### View Includes
- `Views/.header.pinc`: Shared header (initializes Google Fonts, HTML head)
- `Views/.footer.pinc`: Shared footer with copyright
- `Views/.menu.pinc`: Navigation menu (returns array configuration)
- `Views/default.phtml`: Default view template that inflates specific action views

## Important Conventions

### File Naming
- Controllers: `{Name}Controller.php` (PascalCase)
- Classes: `{Name}.php` (PascalCase)
- Views: `{name}.phtml` or `{name}.bview` (lowercase)
- Shared includes: `.{name}.pinc` (dot prefix)
- Themes: `{name}.theme.pcss`
- Multilingual content: `{name}.{lang}.phtml`

### Namespace Convention
Classes in `Lib/` use the namespace pattern:
```php
namespace com\igkdev\projects\BalafonProjectTutorial\{SubNamespace};
```

Example: `com\igkdev\projects\BalafonProjectTutorial\Database`

### Route Definitions
Routes support parameter patterns:
```php
Route::get($actionClass, "/path/{name}");        // Required parameter
Route::get($actionClass, "/path/{name?}");       // Optional parameter
```

## Development Notes

### Directory Security
Several directories have `.htaccess` files:
- `Configs/`, `Lib/`, `Contents/`: Protected (`deny from all`)
- `Scripts/`, `Data/`, `Styles/`, `Views/`: Public (`allow from all`)

### Global Functions
Define global functions and constants in `.global.php` at the project root.

### Testing Structure
Test classes extend `IGK\Tests\Controllers\ControllerBaseTestCase` and are located in `Lib/Tests/`.

### View Variables
Views have access to:
- `$t`: Current template/document object
- `$ctrl`: Controller instance
- `$doc`: Document object
- `$dir`: Current directory path
- `$fname`: Current filename
- `$l`: Language/translation array

## Reference Documentation

For detailed information about project structure, see `PROJECT.docs.md` which contains comprehensive documentation about the architecture, file organization, workflow, and troubleshooting.
