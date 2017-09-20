=== Blade Engine ===
Contributors: Lars-
Tags: blade, render, engine, blade render engine, laravel
Requires at least: 4.8
Tested up to: 4.8.1
Stable tag: 1.0.1
License: GPL-v3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

Adds Blade functionality to your theme

== Description ==

This plugin adds and loads philo/laravel-blade to your Wordpress installation.
It loads two functions, which enable you to use the Blade render engine in your templates which make your themes better readable.

== Installation ==

* Upload plugin files to your plugins folder, or install using WordPress built-in Add New Plugin installer;
* Activate the plugin;

== Usage ==

The plugin adds two functions:
- render_blade_view (void, echoes the content)
- get_rendered_blade_view (string)

Both functions take the same parameters:
1. view (required, string)
2. attributes (optional, array)

When installed, the plugin creates a "views" folder in your theme directory. This is where you put your blade templates (with the .blade.php extension).
The "views" folder may contain subfolders.

== Example ==

wp-contents/themes/your-theme/views/components/article.blade.php:
```blade
@if($show_text)
{{ $text }}
@endif
```

wp-contents/themes/your-theme/functions.php:
```php
<?php
render_blade_view('components.article', [
    'show_text' => true,
    'text' => 'Hello World!',
]);
```

When ran on any page, it will output "Hello World!"

== Blade ==
Blade is a template engine which is mainly used by Laravel. More information here: https://laravel.com/docs/5.1/blade
This plugin supports all the directives which are available in Laravel 5.1.

== Changelog ==

= 1.0.0 =
* Initial version

== License ==

This file is part of Blade Engine.

Blade Engine is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published
by the Free Software Foundation.

Blade Engine is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

Get a copy of the GNU General Public License in <http://www.gnu.org/licenses/>.