<?php

/**
 * Template Name: Home Page
 */

get_header();
?>
<div class="container py-3 border-top">
  <div class="row ">
    <div class="col-6 col-md-8 px-1">
      <div class="card-group h-100 ">
        <div class="card">
          <a class="h-100 " href="# ">
            <div class="News__Image h-100" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/assets/images/1.jpg')"></div>
            <div class="card-img-overlay text-white d-flex flex-column justify-content-end ">
              <h5 class="card-title ">Card title</h5>
              <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to
                additional
                content. This content is a little bit longer.</p>
            </div>
          </a>
        </div>
        <div class="card d-none d-md-block">
          <div class="News__Image News__Image--second h-100"></div>
          <div class="card-img-overlay text-white d-flex flex-column justify-content-end ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional
              content.
              This content is a little bit longer.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6 col-md-4 px-1">
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

<div class="container border-top mt-3">
  <div class="row justify-content-between mt-2 ">
    <div class="col-2">
      <a href="# " class="badge badge-success text-capitalize ">Feature</a>
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
    <div class="col-12 col-md-8 News__Col">
      <div class="card-deck mb-auto pb-1 ">
        <div class="card">
          <div class="card-img-top News__Image News__Image--third">
          </div>
          <div class="card-body ">
            <h5 class="card-title ">Card title</h5>
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
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
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
              to
              additional content. This card has even longer content than the first to show that equal height action.</p>

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
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
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
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
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
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
              to
              additional content. This card has even longer content than the first to show that equal height action.</p>

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
            <p class="card-text text-truncate ">This is a wider card with supporting text below as a natural lead-in
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
<?php
get_footer();