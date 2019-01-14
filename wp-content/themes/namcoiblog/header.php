<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nam Còi Blog 2019</title>
  <link rel="shortcut icon" href="<?php echo THEME_IMG_PATH; ?>/favicon.ico" type="image/x-icon">

</head>

<body>
  <?php do_action('wp_head'); ?>
  <header class="container-fluid Header">
    <div class="row">
      <div class="col-12">
        <nav class="navbar">
          <div class="col-2 d-flex align-items-center">
            <div class="d-block d-md-none">
              <a class="btn btn-link border" id="js-navigation-button">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="navbar-brand d-flex justify-content-center align-items-center">
            <a href="# " class="btn px-0">
              <h1 href="<?php bloginfo('url'); ?>" class="text-center">
                <?php bloginfo('name'); ?>
              </h1>
            </a>
          </div>
          <div class="col-2 d-flex align-items-center justify-content-end">
            <div class="d-block">
              <a class="btn btn-link" id="js-navigation-button">
                <i class="fas fa-search"></i>
              </a>
            </div>
        </nav>
      </div>
    </div>
  </header>