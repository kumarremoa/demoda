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
          <a href="<?=base_url()?>" title="">Payment</a>
        </li>
        <li>
          <a href="#" title="">Delivery</a>
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
    <!-- Latest Product List -->
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
    </div><!-- Latest Product List END -->
  </div>

  <div class="col-md-3 col-sm-6">
    <!-- Categories Filter -->
    <div class="widget">
      <div class="widget-title">
        Get more with B-Shop
      </div>

      <a href="#" class="market-btn btn-appstore" style="background-image: url(img/market-btns/appstore.png);"><span>Download on the</span>App Store</a>

      <a href="#" class="market-btn btn-playstore" style="background-image: url(img/market-btns/playstore.png);"><span>Download it from</span>Play Store</a>
    </div><!-- Categories Filter END -->
  </div>

  <div class="col-md-3 col-sm-6">
    <!-- Categories Filter -->
    <div class="widget">
      <div class="widget-title">
        Stay in touch
      </div>

      <a href="https://www.instagram.com/demodasecrets/" class="btn btn-gray btn-iconed"><i class="socicon-instagram"></i></a>
      <a href="https://www.facebook.com/demodasecrets/" class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
      <a href="https://twitter.com/demodasecrets" class="btn btn-gray btn-iconed"><i class="socicon-twitter"></i></a>
      <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-youtube"></i></a>
    </div><!-- Categories Filter END -->
  </div>
</div>
</div>

<div class="copyright">
<div class="container">
  <div class="column">
    <p>&copy; Demodasecrets <?=date('Y')?>.</p>
  </div><!-- .column -->

  <div class="column">
    <div class="cards">
      <img src="img/cards.png" alt="Credit Cards">
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
