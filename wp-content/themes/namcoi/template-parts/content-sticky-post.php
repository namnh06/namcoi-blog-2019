<div class="container Sticky_Post mt-5">
  <?php 
  $stickyPostsArgs = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 2,
    'post__in' => get_option('sticky_posts'),
    'ignore_sticky_posts' => 1
  ];
  $sticky_posts = new WP_Query($stickyPostsArgs);
  ?>
  <div class="row">
    <div class="col-12 col-md-8">
      <div class="card-deck flex-column flex-md-row ">
        <?php 
        if ($sticky_posts->have_posts()) : ?>
        <?php while ($sticky_posts->have_posts()) : $sticky_posts->the_post() ?>

        <div class="card rounded-0 mx-md-0 Sticky-Post__Card-Deck__Card--mb Sticky-Post__Card-Deck__Card--bi" style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.8)), url('<?php echo get_the_post_thumbnail_url(); ?>');">
          <div class="d-md-none d-flex justify-content-center card-img-top p-3 float-left">
            <a href="" class="d-block h-auto w-auto">
              <?php the_post_thumbnail('thumbnail', []); ?>
            </a>
          </div>
          <div class="card-body p-3 Sticky-Post__Card-Deck__Card__Card-Body">
            <div class="mb-2">
              <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>" class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                <?php echo end(get_the_category())->name; ?></a>
            </div>
            <div class="h4 card-title text-uppercase">
              <?php the_title(); ?>
            </div>
            <p class="card-text">
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>
          <div class="card-footer Sticky-Post__Card-Deck__Card__Card-Footer">
            <small class="">
              <?php echo date('d/m/Y', get_post_time()); ?> -
              <?php echo get_author_name(); ?></small>
          </div>
        </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

      </div>
    </div>
    <div class="d-none d-md-block col-md-4">
      <?php 
      $stickyPostsOffsetArgs = [

        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'offset' => 2,
        'post__in' => get_option('sticky_posts'),
        'ignore_sticky_posts' => 1

      ];
      $sticky_posts_offset = new WP_Query($stickyPostsOffsetArgs);
      ?>
      <div class="card h-100 border-0">
        <div class="h5 font-weight-bold card-header text-white bg-dark text-uppercase border-0">
          Bài Hay
        </div>
        <ul class="list-group ml-0 h-100 border-0 justify-content-between">
          <?php 
          if ($sticky_posts_offset->have_posts()) : ?>
          <?php while ($sticky_posts_offset->have_posts()) : $sticky_posts_offset->the_post(); ?>
          <li class="Sticky-Post__Hot-News__List list-group-item d-flex align-items-center border-0 h-100" style="background-image:linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8)), url('<?php echo get_the_post_thumbnail_url(); ?>');"
          data-toggle="tooltip" data-placement="bottom"
          title="<?php the_title(); ?>">
            <span class="text-truncate text-white">
              <?php the_title(); ?>
            </span>
          </li>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>