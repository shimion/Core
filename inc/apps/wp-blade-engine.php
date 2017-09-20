<?php

require __DIR__ . '/vendor/autoload.php';

$template_directory =  CORE_INC ;
//echo $template_directory;
//echo CORE .'/views';
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