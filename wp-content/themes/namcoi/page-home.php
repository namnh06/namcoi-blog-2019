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
    <div class="container mt-5">
      <!-- <div class="row justify-content-between mt-2 "> -->
      <!-- <div class="col-2">
          <a href="# " class="badge badge-success text-capitalize ">Feature</a>
        </div> -->
      <!-- <div class="col-2 d-flex justify-content-end">
          <small class="ml-auto ">
            <a href="# " class="text-muted text-uppercase">more
              <i class="fas fa-chevron-right "></i>
            </a>
          </small>
        </div> -->
      <!-- </div> -->
      <?php 
      $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5
      ];
      $recent_posts = new WP_Query($args);
      ?>
      <div class="row">
        <div class="d-md-none col-12">
          <div class="card-deck Recent-Posts">
            <?php 
            if ($recent_posts->have_posts()) : ?>
            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
            <div class="card d-flex flex-row">
              <!-- <div class="card-img-top d-flex justify-content-center align-items-center mx-2"> -->
              <?php the_post_thumbnail('thumbnail', ['class' => 'img-thumbnail', 'style' => 'float:left;']); ?>
              <!-- </div> -->
              <div class="card-body">
                <h3 class="card-title">
                  <?php the_title(); ?>
                </h3>
                <?php the_excerpt(); ?>
                <p class="card-text">

                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row mt-2 News">
        <div class="col-12 col-md-8 News__Col">
          <div class="card-deck mb-auto pb-1 ">
            <div class="card">
              <div class="card-img-top News__Image News__Image--third">
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
            <div class="card ">
              <div class="card-img-top News__Image News__Image--fourth">
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
            </div>
          </div>
          <div class="d-none d-md-flex card-deck pt-1 ">
            <div class="card ">
              <div class="card-img-top News__Image News__Image--fifth">
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
              <div class="card-img-top News__Image News__Image--sixth">
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
          </div>
        </div>
        <div class="d-none d-md-block col-md-4 News__Col ">
          <div class="card h-100">
            <div class="card-img-top News__Image News__Image--seventh h-50"></div>
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
        </div>
      </div>
    </div>

    <div class="container border-top mt-3">
      <div class="row justify-content-between mt-2 ">
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
      </div>
      <div class="row mt-2 News">
        <div class="d-none d-md-block col-md-4 News__Col ">
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
        </div>
        <div class="col-12 col-md-8 News__Col ">
          <div class="card-deck mb-auto pb-1 ">
            <div class="card">
              <div class="card-img-top News__Image News__Image--ninth">
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
            <div class="card ">
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
            </div>
          </div>
          <div class="d-none d-md-flex card-deck pt-1 ">
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
          </div>
        </div>
      </div>
    </div>
</div>
<?php
get_footer();