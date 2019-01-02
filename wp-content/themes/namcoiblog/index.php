<?php get_header();?>
<header class="container Header">
    <div class="row">
      <div class="d-none d-md-flex col-md-2 align-items-center">
        <a href="#" class=" btn btn-outline-danger text-uppercase">sign up now</a>
      </div>
      <div class="col-12 px-0 col-md-8 d-flex justify-content-between justify-content-md-center align-items-center">
        <a href="# " class="btn px-0">
          <h1 class="text-center text-success ">NEWS</h1>
        </a>
        <div class="d-block d-md-none">
          <button type="button" class="btn btn-sm btn-outline-success border" id="js-navigation-button">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
      <div class="d-none d-md-flex col-md-2 align-items-center justify-content-end">
        <a href="#">
          <i class="fas fa-search mr-3 text-muted"></i>
        </a>
        <a href="#" class=" btn btn-outline-success text-uppercase">sign in</a>
      </div>
    </div>
  </header>

  <nav class="d-md-block container Navigation" id="js-navigation">
    <div class="row">
      <div class="col-12 d-flex px-0">
        <div class="d-none d-md-flex justify-content-start align-items-center mx-right ">
          <a class="text-muted " href="# ">
            <i class="fas fa-angle-left "></i>
          </a>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-around w-100">
          <div class="m-2 ">
            <a class="text-dark" href="#/home ">
              Home
            </a>
          </div>
          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              HTML
            </a>
          </div>
          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              CSS
            </a>
          </div>
          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              JavaScript
            </a>
          </div>
          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              PHP
            </a>
          </div>
          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              React JS
            </a>
          </div>

          <div class="m-2 ">
            <a class="text-muted " href="#/home ">
              Laravel
            </a>
          </div>
        </div>
        <div class="d-none d-md-flex align-items-center ml-auto ">
          <a class="text-muted float-right " href="# ">
            <i class="fas fa-angle-right "></i>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container py-3 border-top">
    <div class="row ">
      <div class="col-6 col-md-8 px-1">
        <div class="card-group h-100 ">
          <div class="card">
            <a class="h-100 " href="# ">
              <div class="News__Image News__Image--first h-100"></div>
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

  <!-- Footer of Webpage -->
  <div class="container-fluid border-top my-2 px-5">
    <div class="d-flex flex-row mt-2">
      <div class="col-10 col-md-6">
        <h5>HỆ THỐNG ĐÀO TẠO CNTT QUỐC TẾ SOFTECH APTECH</h5>
        <p>Địa chỉ: Tòa nhà VNPT, 38 Yên Bái, Quận Hải Châu, Thành Phố Đà Nẵng</p>
        <p>Điện thoại: 0236.3.779.779 - Fax: 0236.3.779.555</p>
        <p>Email: tuyensinh@softech.vn
        </p>
        <img class="" src="./assets/images/banner-aptech.jpg" width="50%" alt="">
        <p> &copy; Nam Còi Blog - 2018</p>
      </div>
      <div class="col-md-3 d-none d-md-block">
        <ul class="list-unstyled">
          <li>
            <a href="#">
              <h5 class="text-dark">Navigation</h5>
            </a>
          </li>
          <li>
            <a class="text-muted" href="#">HOME</a>
          </li>
          <li>
            <a class="text-muted" href="#">HTML</a>
          </li>
          <li>
            <a class="text-muted" href="#">CSS</a>
          </li>
          <li>
            <a class="text-muted" href="#">JavaScript</a>
          </li>
          <li>
            <a class="text-muted" href="#">PHP</a>
          </li>
          <li>
            <a class="text-muted" href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-2 col-md-3">
        <ul class="list-unstyled ">
          <li>
            <a href="#">
              <h5 class="text-dark">About</h5>
            </a>
          </li>
          <li>
            <a class="text-muted" href="#">Team</a>
          </li>
          <li>
            <a class="text-muted" href="#">Location</a>
          </li>
          <li>
            <a class="text-muted" href="#">Privacy</a>
          </li>
          <li>
            <a class="text-muted" href="#">Terms</a>
          </li>

        </ul>
      </div>
    </div>
  </div>

<?php get_footer();?>
