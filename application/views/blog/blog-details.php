<div class="page-wrapper">
<?php //echo"<pre>";var_dump($newsData);die;?>    
  <div canvas="container">
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

            <h1 class="title pull-right blog-head"><?=$newsData[0]->article_title ?></h1>
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
                <?=date_format(date_create($newsData[0]->add_date), 'M d, Y')?>
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
            <div class="col-md-12">
              <?=$newsData[0]->content ?>
            </div>
          </div>

          <!-- Image Carousel -->
          <!-- <div class="image-carousel" data-slick='{"arrows": true, "dots": false}'>
            <img src="img/blog/carousel/01.jpg" data-color="#000" alt="">
            <img src="img/blog/carousel/02.jpg" data-color="#e8e8e6" alt="">
          </div> -->
          <!-- Image Carousel END -->
        </div>
      </main>
  </div>
</div>