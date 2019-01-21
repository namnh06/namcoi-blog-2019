<div class="container">
  <?php
$newestPostsArgs = [
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 5,
    'post__not_in' => get_option('sticky_posts'),
    'category__not_in' => [2],
];
$newest_posts = new WP_Query($newestPostsArgs);
?>
  <!-- <div class="row justify-content-between mt-2 ">
    <div class="col-2">
      <a href="# " class="badge badge-danger text-capitalize">hot</a>
    </div>
    <div class="col-2 d-flex justify-content-end">
      <small class="ml-auto ">
        <a href="# " class="text-muted text-uppercase">more
          <i class="fas fa-chevron-right "></i>
        </a>
      </small>
    </div>
  </div> -->

  <div class="row News">
    <!-- <div class="d-none d-md-block col-md-4 News__Col ">
      <div class="card h-100">
        <div class="card-img-top News__Image News__Image--eighth h-50"></div>
        <div class="card-body ">
          <h5 class="card-title ">Card title</h5>
          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi incidunt minus
            dolorem
            totam? Explicabo commodi consectetur, totam deleniti, rerum sunt obcaecati, provident quam aspernatur
            suscipit
            qui pariatur nisi nihil soluta.</p>

        </div>
        <div class="card-footer ">
          <small class="text-muted ">Last updated 15 mins ago</small>
        </div>
      </div>
    </div> -->
    <div class="col-12 col-md-8 News__Col ">
      <div class="card-deck mb-auto pb-1 ">
        <?php if ($newest_posts->have_posts()): ?>
        <?php while ($newest_posts->have_posts()): $newest_posts->the_post()?>
        <div class="card flex-row flex-md-column rounded-0 mx-md-0 Sticky-Post__Card-Deck__Card--mb Sticky-Post__Card-Deck__Card--bi"
          style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.8)), url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_site_icon_url(); ?>');">
          <div class="d-md-none py-3 pl-3 w-25">
            <a href="<?php echo get_post_permalink(); ?>" class="Category-Section__Card-Deck__Card__Card-Image-Top__Image__Background d-block h-100 w-100"
              style="background-image:url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_site_icon_url(); ?>');">
            </a>
          </div>
          <div class="d-flex flex-column w-75 Sticky-Post__Card-Deck__Card__Second-Part h-100">
            <div class="card-body p-3 Sticky-Post__Card-Deck__Card__Card-Body">
              <div class="mb-2">
                <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>" class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                  <?php echo end(get_the_category())->name; ?></a>
              </div>
              <?php get_template_part('template-parts/post/title');?>
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
        </div>
        <?php endwhile;?>
        <?php wp_reset_postdata();?>
        <?php endif;?>
        <!-- <div class="card ">
          <div class="card-img-top News__Image News__Image--tenth">
          </div>
          <div class="card-body ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text text-truncate ">This card has supporting text below as a natural lead-in to
              additional
              content.
            </p>

          </div>
          <div class="card-footer ">
            <small class="text-muted ">Last updated 3 mins ago</small>

          </div>
        </div> -->
      </div>
      <!-- <div class="d-none d-md-flex card-deck pt-1 ">
        <div class="card ">

          <div class="card-img-top News__Image News__Image--eleventh">
          </div>
          <div class="card-body ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural
              lead-in
              to
              additional content. This card has even longer content than the first to show that equal height
              action.</p>

          </div>
          <div class="card-footer ">
            <small class="text-muted ">Last updated 3 mins ago</small>
          </div>
        </div>
        <div class="card ">
          <div class="card-img-top News__Image News__Image--twelveth">
          </div>
          <div class="card-body ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural
              lead-in
              to
              additional content. This content is a little bit longer.</p>

          </div>
          <div class="card-footer ">
            <small class="text-muted ">Last updated 3 mins ago</small>
          </div>
        </div>
      </div> -->
    </div>
  </div>

</div>