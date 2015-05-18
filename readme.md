# Polygon Plugin Boilerplate

Polygon Plugin Boilerplate is a standardized, organized, object-oriented foundation for building high-quality WordPress Plugins. The curent version is based on the WordPress Plugin Boilerplate by Tom McFarlin.

## Features

- The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards), and [Documentation Standards](http://make.wordpress.org/core/handbook/inline-documentation-standards/php-documentation-standards/).
- All classes, functions, and variables are documented so that you know what you need to be changed.
- The Boilerplate uses a strict file organization scheme that correspond both to the WordPress Plugin Repository structure, and that make it easy to organize the files that compose the plugin.
- The project includes a `.pot` file as a starting point for internationalization.

## Important Notes

### Includes

If you include your own classes, or third-party libraries, there are three locations in which said files may go:

- `includes` is where functionality shared between the admin area and the public-facing parts of the site reside
- `includes/admin` is for all admin-specific functionality
- `includes/public` is for all public-facing functionality

### Assets

The `assets` directory contains four subfolders.

- `assets/fonts` is used to contain all fonts.
- `assets/images` is used to contain all images.
- `assets/javascript` is used to contain all javascript files.
- `assets/stylesheets` is used to contain all css files.