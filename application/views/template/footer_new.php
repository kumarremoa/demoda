<footer class="footer">
<div class="container">
<div class="row">
  <div class="col-md-3 col-sm-6">
    <!-- Categories START  -->
    <div class="widget categories-widget">
      <div class="widget-title">
        Help
      </div>

      <ul class="cat-list">
        <li>
          <a href="<?=base_url('about-us')?>" title="">About Us</a>
        </li>
        <li>
          <a href="<?=base_url('contact-us')?>" title="">Contact Us</a>
        </li>
        <li>
          <a href="#" title="">Returns &amp; Refund</a>
        </li>
        <li>
          <a href="#" title="">Customer Support</a>
        </li>
      </ul>
    </div><!-- Categories END -->
  </div>

  <div class="col-md-3 col-sm-6">
    <!-- Categories START  -->
    <div class="widget categories-widget">
      <div class="widget-title">
        INFORMATION
      </div>

      <ul class="cat-list">
        <li>
          <a href="<?=base_url('return-policy')?>" title="">Privacy Policy</a>
        </li>
        <li>
          <a href="<?=base_url('terms-conditions')?>" title="">Terms &amp; Conditions</a>
        </li>
        <li>
          <a href="<?=base_url('shipping-rates')?>" title="Shipping and Delivery" >Shipping &amp; Delivery</a>
        </li>
        <li>
          <a href="<?=base_url('return-policy')?>" title="Returns and Refunds">Returns &amp; Refunds</a>
        </li>
         <li>
          <a href="<?=base_url('size-n-fit-guide')?>" title="Size and Fit Guide">Size &amp; Fit Guide</a>
        </li>
      </ul>
    </div><!-- Categories END -->
  </div>
  <!-- <div class="col-md-3 col-sm-6">
    <div class="widget service-list">
      <div class="widget-title">
        Customer Service
      </div>

      <ul>
        <li>
          <div style="margin-bottom: 7px;">Find Store</div>
          <a href="#" class="btn btn-gray btn-iconed btn-lg"><i class="material-icons place"></i></a>
        </li>
        <li>
          <div style="margin-bottom: 7px;">Gift Cards</div>
          <a href="#" class="btn btn-gray btn-iconed btn-lg"><i class="material-icons local_activity"></i></a>
        </li>
      </ul>
    </div>
  </div> -->

  <div class="col-md-3 col-sm-6">
    <!-- Categories Filter -->
    <div class="widget">
      <div class="widget-title">
        ABOUT DEMODA
      </div>
      De’Moda – Combine style with comfort!<br><br>
      De’Moda is a luxury nightwear brand that provides some of the finest nightwear to women at an affordable price!
    </div><!-- Categories Filter END -->
  </div>

  <div class="col-md-3 col-sm-6">
    <!-- Categories Filter -->
    <div class="widget">
      <div class="widget-title">
        Stay in touch
      </div>

      <a href="https://www.instagram.com/demodasecrets/" title="instagram" target="_blank" class="btn btn-gray btn-iconed"><i class="socicon-instagram"></i></a>
      <a href="https://www.facebook.com/demodasecrets/" title="facebook" target="_blank"  class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
      <a href="https://twitter.com/demodasecrets" title="twitter" target="_blank" class="btn btn-gray btn-iconed"><i class="socicon-twitter"></i></a>
      <a href="#" target="_blank" title="spinterest" class="btn btn-gray btn-iconed"><i class="socicon-pinterest"></i></a>
    </div><!-- Categories Filter END -->
    <div class="widget">
      Need help? Reach Customer Service </br>
      or Call Us +91-959-440-8888 
    </div>
  </div>
</div>
</div>

<div class="copyright">
<div class="container">
  <div class="column">
    <p>&copy; Copyrights  | De'Moda-<?=date('Y')?> | All Rights Reserved.</p>
  </div><!-- .column -->

  <div class="column">
    <div class="cards">
      <img src="<?= $this->config->item('css_images_js_base_url').'images/footer.png'; ?>" alt="Credit Cards">
    </div>
  </div><!-- .column -->
</div>
</div><!-- .copyright -->
</footer>
  </div>
</div><!-- Page Wrapper END -->

<!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
<?php $jsAsset = [ 
  "js/vendor/modernizr.custom.js",
  "js/vendor/detectizr.min.js",
  "js/vendor/jquery-2.1.4.min.js",
  "js/vendor/preloader.min.js",
  "js/vendor/bootstrap.min.js",
  "js/vendor/nouislider.min.js",
  "js/vendor/jquery.magnific-popup.min.js",
  "js/vendor/slick.min.js",
  "js/vendor/isotope.pkgd.min.js",
  "js/vendor/wNumb.js",
  "js/vendor/velocity.min.js",
  "js/vendor/slidebars.min.js",
  "js/vendor/jquery.themepunch.revolution.min.js",
  "js/scripts.js",
];
foreach ($jsAsset as $value) { ?>
  <script src="<?= $this->config->item('css_images_js_base_url')."$value" ?>" type="text/javascript"></script>
<?php } ?> 
</body>
</html>
