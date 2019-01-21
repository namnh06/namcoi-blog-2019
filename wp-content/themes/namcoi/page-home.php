<?php

/**
 * Template Name: Home Page
 */

get_header();
?>
<?php
// get_template_part('carousel-post');
?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php get_template_part('template-parts/content-sticky-post')?>
    <?php get_template_part('template-parts/content-newest');?>

</div>
<?php
get_footer();