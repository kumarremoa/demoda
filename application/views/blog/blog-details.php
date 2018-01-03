<div class="page-wrapper">

<?php //echo"<pre>";var_dump($newsData);die;?>    <div canvas="container">
      <!-- Backdrop for Canvas -->
      <div class="backdrop offcanvas-toggle"></div>

      <main>
        <!-- Page Title -->
        <div class="page-title">
          <div class="container">
            <div class="breadcrumbs">
              <a href="<?=base_url()?>">Home</a>
              <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
              <a href="<?=base_url().'/blog'?>">Blog</a>
              <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
              <span><?=$newsData[0]->article_title?></span>
            </div>

            <h1 class="title pull-right"><?=$newsData[0]->article_title ?></h1>
          </div>
        </div><!-- Page Title END -->

        <div class="single-image">
          <!-- Single Blog Featured Image -->
          <?php  $file_name = explode('.',$newsData[0]->image_path);
            // $file_ext = array_pop($file_name);                        
            // $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
            $news_image = $this->config->item('site_url').'admin/uploads/articles/large/'.$newsData[0]->image_path;
            ?>
          <img src="<?=$news_image?>" alt="<?=$newsData[0]->article_title?>">

          <div class="container">
            <!-- Meta for Single Blog Featured Image -->
            <div class="blog-single-meta">
              <div class="meta-left">
                July 21, 2016
                <i class="material-icons lens"></i>
                New York City
                <i class="material-icons lens"></i>
                by <?=$newsData[0]->author_name ?>
                <i class="material-icons lens"></i>
                36 Comments
              </div>

              <div class="meta-right pull-right">
                <span class="likes-qty">
                  <i class="material-icons remove_red_eye"></i>
                  <?=$newsData[0]->viewed_count?>
                </span>
              </div>
            </div><!-- Meta for Single Blog Featured Image END -->
          </div>
        </div>

        <div class="container margin-bottom-2x">
          <!-- Block Title -->
          <h2 class="text-right margin-top-2x margin-bottom-2x">
            <?=$newsData[0]->article_title ?>
          </h2><!-- Block Title END -->

          <div class="row">
            <div class="col-md-4 text-center">
              <img src="img/blog/single-text.jpg" class="auto-width" alt="">
            </div>
            <div class="col-md-8">
              <?=$newsData[0]->content ?>
            </div>
          </div>

          <!-- Image Carousel -->
          <div class="image-carousel" data-slick='{"arrows": true, "dots": false}'>
            <img src="img/blog/carousel/01.jpg" data-color="#000" alt="">
            <img src="img/blog/carousel/02.jpg" data-color="#e8e8e6" alt="">
          </div>
          <!-- Image Carousel END -->
          <div class="image-carousel-caption">How To Become Top Fashion Designer</div>

          <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-4 col-md-offset-2">
              <h2 class="margin-top-2x margin-bottom-2x">Night Creams Will Help Your Skin To Relax</h2>

              <p>Have you ever wondered if what you know about herbal breast enlargement is accurate? Consider the following paragraphs and compare what you know to the latest info on herbal breast enlargement. Women are often not happy with their breast size. Usually they would like larger breasts. Women are increasingly turning to breast implant surgery and other alternatives, such as herbal breast enlargement.</p>

              <p>Herbal breast enlargement uses a variety of herbs to stimulate breast growth. Though all are different, there are several commonly used herbs. Herbal breast enlargement can utilize pills, creams, or liquids. Some companies even offer a spray. The herbs used in the different forms of herbal breast enlargement vary, but generally include Saw Palmetto, Damiana, Dong Quai, Blessed Thistle, Wild Yam, and Fennel Seed. Once you begin to move beyond basic background information, you begin to realize that there’s more to herbal breast enlargement than you may have first thought. </p>

              <blockquote>
                <p>One of the great benefits of sauna and steam baths are the toning effects on the skin. They leave the skin soft, supple and glowing – in short, beautiful.</p>
                <cite>By Bedismo</cite>
              </blockquote>

              <p>Skin ages for both chronological and environmental reasons. Increased age and exposure to pollution and other environmental factors causes lines and wrinkles to become more visible. Major contributing factors to deeper lines and wrinkles include skin that is thinner and less firm, reduced collagen and elastin, and reduced cell renewal.</p>

              <p>One way to reduce the appearance of lines and wrinkles is to use products that deliver powerful antioxidants like vitamin C to your skin. The best vitamin C skin care products will neutralize free radicals, boost the skin’s ability to produce collagen, reduce discoloration, and improve skin texture.</p>

              <div class="blog-single-bottom-meta padding-top-2x">
                <!-- Popular Tags -->
                <div class="widget tags-list-widget">
                  <div class="tags-list">
                    <a href="#">Clothes</a>
                    <a href="#">Boots</a>
                    <a href="#">Skirts</a>
                  </div>
                </div><!-- Popular Tags END -->

                <!-- Categories Filter -->
                <div class="widget margin-top-1x">
                  <div class="widget-title">
                    Share post
                  </div>

                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-instagram"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-pinterest"></i></a>
                  <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-youtube"></i></a>
                </div><!-- Categories Filter END -->
              </div>
            </div>
          </div>
        </div>

        <section class="fw-section bg-gray padding-top-4x">
          <div class="container">
            <!-- Comments -->
            <div class="comments-area">
              <h2 class="block-title text-left margin-bottom-3x">
                Comments
                <small>Read more</small>
              </h2>

              <!-- Comment -->
              <div class="comment">
                <div class="author-ava">
                  <img src="img/comments-ava/01.png" alt="">
                </div>

                <div class="comment-meta-top">
                  <span class="comment-autor"><a href="#">Bedisma</a></span>
                  <span class="comment-date pull-right">2 days ago</span>
                </div><!-- .comment-meta -->

                <div class="comment-body">
                  <p>Paragraph-Normal. Developed by the Intel Corporation, Bold for high-bandwidth digital content protection. As the Link name implies, HDCP is all about Semibold the integrity of various audio and video content as it travels over a Italic of different types of interfaces.</p>
                </div><!-- .comment-body -->

                <div class="comment-meta-bottom">
                  <span class="comment-reply">
                    <a href="#" rel="nofollow">Reply</a>
                  </span>
                </div><!-- .comment-meta-bottom -->
              </div><!-- .comment -->

              <!-- Comment Reply -->
              <div class="comment depth-2">
                <div class="author-ava">
                  <img src="img/comments-ava/02.png" alt="">
                </div>

                <div class="comment-meta-top">
                  <span class="comment-autor"><a href="#">Jean Fox</a></span>
                  <span class="comment-date pull-right">2 days ago</span>
                </div><!-- .comment-meta -->

                <div class="comment-body">
                  <p>You have just invested in a new vehicle, the one of your dreams, and you take it on a trip across Canada. You only put gas in it and drive sightseeing and following your nose. Filters and oil changes are ignored. The car breaks down in the middle of that long stretch of road between Manitoba and Alberta.</p>
                </div><!-- .comment-body -->

                <div class="comment-meta-bottom">
                  <span class="comment-reply">
                    <a href="#" rel="nofollow">Reply</a>
                  </span>
                </div><!-- .comment-meta-bottom -->
              </div><!-- .comment -->

              <!-- Comment Form -->
              <div class="comment-respond bg-white margin-top-2x margin-bottom-3x padding-left-1x padding-right-1x padding-top-1x padding-bottom-2x">
                <h4 class="comment-reply-title">Add Comment</h4>
                <form method="post" id="comment-form" class="comment-form">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control input-alt" name="author" id="cf_name" placeholder="Name">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="email" class="form-control input-alt" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <input type="text" class="form-control input-alt" name="email" placeholder="Enter your website">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="cf_comment" class="sr-only">Comment</label>
                    <textarea name="comment" id="cf_comment" class="form-control input-alt" rows="7" placeholder="Enter your comment"></textarea>
                  </div>
                  <p class="form-submit text-center">
                    <button name="submit" type="submit" id="submit" class="btn btn-default">Send Comment</button>
                  </p>
                </form>
              </div><!-- .comment-respond -->
            </div><!-- .comments-area -->
          </div>
        </section>
      </main>

      <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <!-- Widget Categories -->
              <div class="widget categories-widget">
                <div class="widget-title">
                  Help
                </div>

                <ul class="cat-list">
                  <li>
                    <a href="#" title="">Payment</a>
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
              </div><!-- Widget Categories END -->
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

                <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-instagram"></i></a>
                <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-facebook"></i></a>
                <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-pinterest"></i></a>
                <a href="#" class="btn btn-gray btn-iconed"><i class="socicon-youtube"></i></a>
              </div><!-- Categories Filter END -->
            </div>
          </div>
        </div>

        <div class="copyright">
          <div class="container">
            <div class="column">
              <p>&copy; B-Shop 2015 - 2017. Made by <a href="http://8guild.com/" target="_blank">8Guild</a> with <i class="fa fa-heart text-danger"></i> love.</p>
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
  </div>