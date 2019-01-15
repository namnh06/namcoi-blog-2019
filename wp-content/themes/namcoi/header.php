<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nam_Coi_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <title>
    <?php bloginfo('name'); ?>
  </title>
  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/favicon.ico">
  <!-- BOOTSTRAP CORE -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/styles.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content">
      <?php esc_html_e('Skip to content', 'nam-coi-theme'); ?></a>
    <header class="container-fluid Header">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-md justify-content-between">
            <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-bars"></i>
            </button>
            <div class="navbar-brand mx-0 d-flex justify-content-center align-items-center">
              <a href="# " class="btn px-0">
                <h1 href="<?php bloginfo('url'); ?>" class="text-center my-n1">
                  <?php bloginfo('name'); ?>
                </h1>
              </a>
            </div>
            <?php $categories = wp_list_categories();
            var_dump($categories);
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-0 mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
              </ul>
            </div>
            <form class="form-inline my-2 my-lg-0">
              <a class="btn btn-link" id="js-navigation-button">
                <i class="fas fa-search"></i>
              </a>
            </form>
          </nav>
        </div>
      </div>
    </header>

    <div id="content" class="site-content">