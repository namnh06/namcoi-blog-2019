<section class="container mt-5 Category-Section">
  <div class="row mb-2">
    <div class="col-12">
      <div class="h3 text-uppercase font-weight-bold">
        <?php single_cat_title();?>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <div class="card-deck flex-column">
        <?php
if (have_posts()): ?>
        <?php while (have_posts()): the_post()?>
        <div class="card rounded-0 flex-row mb-2">
          <div class="py-3 pl-3 w-25">
            <a href="<?php echo get_post_permalink(); ?>" class="Category-Section__Card-Deck__Card__Card-Image-Top__Image__Background d-block h-100 w-100"
              style="background-image:url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_site_icon_url(); ?>');">
            </a>
          </div>
          <div class="d-flex flex-column w-75">
            <div class="card-body py-3">
              <div class="mb-2">
                <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>" class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                  <?php echo end(get_the_category())->name; ?></a>
              </div>
              <?php get_template_part('template-parts/post/title');?>
              <p class="card-text text-dark">
                <?php echo get_the_excerpt(); ?>
              </p>
            </div>
            <div class="card-footer border-0 bg-white pt-0">
              <small class="text-muted">
                <?php echo date('d/m/Y', get_post_time()); ?> -
                <?php echo get_author_name(); ?></small>
            </div>
          </div>
        </div>
        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        <?php endif;?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
      <?php get_template_part('template-parts/pagination');?>
    </div>
  </div>
</section>