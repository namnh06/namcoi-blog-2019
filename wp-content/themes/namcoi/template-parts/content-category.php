<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card-deck flex-column">
        <?php 
        if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
        <div class="card rounded-0">
          <div class="d-flex justify-content-center card-img-top p-3 float-left">
            <a href="" class="d-block h-auto w-auto">
              <?php the_post_thumbnail('thumbnail', []); ?>
            </a>
          </div>
          <div class="card-body p-3">
            <div class="mb-2">
              <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>" class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                <?php echo end(get_the_category())->name; ?></a>
            </div>
            <div class="h4 card-title text-uppercase text-dark">
              <?php the_title(); ?>
            </div>
            <p class="card-text text-dark">
              <?php echo get_the_excerpt(); ?>
            </p>
          </div>
          <div class="card-footer">
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
  </div>
</div>