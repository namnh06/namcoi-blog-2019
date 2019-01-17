<div class="container Sticky_Post mt-5">
  <?php 
  $stickyPostsArgs = [
    'post__in' => ['sticky_posts']
  ];
  $sticky_posts = new WP_Query($stickyPostsArgs);
  ?>
  <div class="row">
    <div class="col-12 col-md-8">
      <div class="card-deck Sticky-Post__Card-Deck--flex">
        <?php 
        if ($sticky_posts->have_posts()) : ?>
        <?php while ($sticky_posts->have_posts()) : $sticky_posts->the_post(); ?>
        <div class="card d-flex flex-row flex-md-column rounded-0 mx-md-0 Sticky-Post__Card-Deck__Card--mb Sticky-Post__Card-Deck__Card--bi"
          style="background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.8)), url('<?php echo get_the_post_thumbnail_url(); ?>');">
          <div class="d-md-none card-img-top p-3">
            <a href="" class="d-block h-auto w-auto">
              <?php the_post_thumbnail('thumbnail', []); ?>
            </a>
          </div>
          <div class="d-flex flex-column">
            <div class="card-body p-3 Sticky-Post__Card-Deck__Card__Card-Body">
              <div class="mb-2">
                <a href="<?php echo get_category_link(end(get_the_category())->term_id); ?>" class="badge badge-dark rounded-0 px-4 py-2 text-uppercase text-white">
                  <?php echo end(get_the_category())->name; ?></a>
              </div>
              <h3 class="card-title text-uppercase">
                <?php the_title(); ?>
              </h3>
              <p class="card-text">
                <?php echo get_the_excerpt(); ?>
              </p>
            </div>
            <div class="card-footer Sticky-Post__Card-Deck__Card__Card-Footer">
              <p class="card-text font-italic"><small class="">
                  <?php echo date('d/m/Y', get_post_time()); ?> -
                  <?php echo get_author_name(); ?></small></p>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="d-none d-md-block col-md-4">
      <div class="card ">
        <div class="card-header ">
          Hot News
        </div>
        <ul class="list-group list-group-flush ">
          <li class="list-group-item d-flex justify-content-between align-items-center ">
            <span class="text-truncate ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate fuga
              illum
              quaerat!
            </span>
            <span class="badge badge-success __badge ">
              <i class="fab fa-node-js "></i>
            </span>

          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center ">
            <span class="text-truncate "> A expedita, fuga! Ab atque facilis, itaque laborum.
            </span>
            <span class="badge badge-danger __badge ">
              <i class="fab fa-css3-alt "></i>
            </span>

          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center ">
            <span class="text-truncate ">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </span>
            <span class="badge badge-warning __badge ">
              <i class="fab fa-js-square "></i>
            </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center ">
            <span class="text-truncate ">Cupiditate fuga illum quaerat!
            </span>
            <span class="badge badge-success __badge ">
              <i class="fab fa-node-js "></i>
            </span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center ">
            <span class="text-truncate ">magnam magni minus nihil perferendis quis recusandae reiciendis
              reprehenderit
              sunt
            </span>
            <span class="badge badge-success __badge ">
              <i class="fab fa-html5 "></i>
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>