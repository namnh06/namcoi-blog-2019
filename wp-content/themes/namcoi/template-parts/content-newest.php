<div class="container mt-5 mt-md-2">
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $newestPostsArgs = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'paged' => $paged,
    'post__not_in' => get_option('sticky_posts')
  ];
  $newest_posts = new WP_Query($newestPostsArgs);
  ?>
  <div class="row News">
    <div class="col-12 col-md-8 News__Col ">
      <div class="card-deck flex-column mb-auto pb-1 ">
        <?php if ($newest_posts->have_posts()) : ?>
        <?php while ($newest_posts->have_posts()) : $newest_posts->the_post() ?>
        <div class="card flex-row rounded-0 mx-md-0 mb-2">
          <div class="py-3 pl-3 w-25">
            <a href="<?php echo get_post_permalink(); ?>"
              class="Category-Section__Card-Deck__Card__Card-Image-Top__Image__Background d-block h-100 w-100"
              style="background-image:url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_site_icon_url(); ?>');">
            </a>
          </div>
          <div class="d-flex flex-column w-75 Sticky-Post__Card-Deck__Card__Second-Part h-100">
            <div class="card-body p-3 Sticky-Post__Card-Deck__Card__Card-Body">
              <div class="mb-2">
                <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>"
                  class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                  <?php echo end(get_the_category())->name; ?></a>
              </div>
              <div class="card-title">
                <a href="<?php echo get_post_permalink(); ?>" class="h4 font-weight-bold text-uppercase text-dark">
                  <?php the_title(); ?>
                </a>
              </div>
              <p class="card-text text-dark">
                <?php echo get_the_excerpt(); ?>
              </p>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <!-- <?php next_posts_link('next', $newest_posts->max_num_pages); ?>
        <?php previous_posts_link('prev') ?> -->

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      <?php 
      $GLOBALS['wp_query']->max_num_pages = $newest_posts->max_num_pages;
      get_template_part('template-parts/pagination'); ?>
    </div>
  </div>
</div>