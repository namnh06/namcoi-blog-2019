<?php


function bootstrap_init()
{
  wp_enqueue_style('bootstrap-4-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');
  wp_enqueue_script('jquery-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('jquery'), '', true);
  wp_enqueue_script('popper-js-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js', array('jquery'), '', true);
  wp_enqueue_script('bootstrap-4-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'bootstrap_init');

function font_awesome_init()
{
  wp_enqueue_style('font-awesome-5', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
}

add_action('wp_enqueue_scripts', 'font_awesome_init');

function custom_css()
{
  wp_enqueue_style('custom-css', get_template_directory_uri() . '/assets/css/styles.css');
}

add_action('wp_enqueue_scripts', 'custom_css');

function custom_js()
{
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'custom_js');

if (!defined('THEME_IMG_PATH')) {
  define('THEME_IMG_PATH', get_stylesheet_directory_uri() . '/assets/images');
}

