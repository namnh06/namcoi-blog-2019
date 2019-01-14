<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nam_Coi_Theme
 */

?>
<footer class="container-fluid border-top my-2 px-5">
  <div class="d-flex flex-row mt-2">
    <div class="col-10 col-md-6">
      <!-- <h5>HỆ THỐNG ĐÀO TẠO CNTT QUỐC TẾ SOFTECH APTECH</h5>
      <p>Địa chỉ: Tòa nhà VNPT, 38 Yên Bái, Quận Hải Châu, Thành Phố Đà Nẵng</p>
      <p>Điện thoại: 0236.3.779.779 - Fax: 0236.3.779.555</p>
      <p>Email: tuyensinh@softech.vn
      </p> -->
      <img class="" src="<?php echo THEME_IMG_PATH; ?>/banner-aptech.jpg" width="50%" alt="">
      <p>
        <?php bloginfo('name'); ?> &copy; 2018-
        <?php echo date('Y'); ?>
      </p>
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
</footer>

<?php wp_footer(); ?>
<!-- JQUERY -->
<script src="<?php bloginfo('template_directory'); ?>/assets/jquery/jquery.min.js"></script>
<!-- POPPER.js -->
<script src="<?php bloginfo('template_directory'); ?>/assets/popper.js/popper.min.js"></script>
</body>

</html>