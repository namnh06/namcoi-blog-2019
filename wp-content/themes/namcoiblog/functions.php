<?php

function addCustomCss(){
  wp_register_style('custom', get_template_directory_uri().'/assets/css/custom.css');
}

// add_action('wp_enqueue_scripts','addCustomCss');
