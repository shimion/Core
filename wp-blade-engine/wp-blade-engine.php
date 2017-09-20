<?php
/*
Plugin Name: Blade Engine
Description: Adds a Blade render engine to use in your theme
Version:     1.0.1
Author:      Lars-
Author URI:  https://www.ljpc.nl
License:     GPL-v3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
*/
require __DIR__ . '/vendor/autoload.php';

$template_directory = get_template_directory();
if (!is_dir($template_directory . '/views')) {
    mkdir($template_directory . '/views', 0755, true);
}
$wp_content_dir = WP_CONTENT_DIR;
if (!is_dir($wp_content_dir . '/cache/blade')) {
    mkdir($wp_content_dir . '/cache/blade', 0755, true);
}

$views = $template_directory . '/views';
$cache = $wp_content_dir . '/cache/blade';
$GLOBALS['blade_engine'] = new \Philo\Blade\Blade($views, $cache);

/**
 * @param string $view
 * @param array $attributes
 */
function render_blade_view($view, array $attributes = [])
{
    echo $GLOBALS['blade_engine']->view()->make($view, $attributes);
}

/**
 * @param string $view
 * @param array $attributes
 *
 * @return string
 */
function get_rendered_blade_view($view, array $attributes = [])
{
    return $GLOBALS['blade_engine']->view()->make($view, $attributes);
}