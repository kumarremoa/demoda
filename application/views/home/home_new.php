<section class="container margin-top-3x margin-bottom-3x">
  <h2 class="block-title text-left margin-bottom-2x">
    Featured Products
  </h2>
  <div class="row">
  <?php foreach ($featuredProductDetails as $key => $productDetail){ 
    $price = ($productDetail->is_discount == 1) ? '<span>₹'.$productDetail->price.'</span> ₹'.number_format($productDetail->price - $productDetail->discount_price , 2) : '₹'.$productDetail->price;
        $file_name = explode('.',$productDetail->file_name);
        $file_ext = array_pop($file_name);                        
        $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
        
        $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;

    ?>
  
    <div class="col-md-3">
      <div class="row">
        <div class="col-sm-12">
          <div class="tile">
            <div class="preview-box">
              <div class="preview-carousel" data-slick='{arrows": true, "dots": false}'>
                <img src="<?=$product_image?>" alt="<?=$productDetail->title?>">
              </div>
            </div>

            <div class="tile-title">
              <a href="<?= product_url($productDetail)?>" ><?=$productDetail->title ?></a>
            </div>

            <div class="tile-meta">
              <div class="meta-top">
                <a title="<?=ucwords($productDetail->title)?>" href="<?php echo base_url().'product/category/'.$productDetail->sub_cat_link_rewrite; ?>" class="category"><?=$productDetail->sub_category_title ?> </a>
                      <span class="cost"><?= $price ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php } ?>
  </div>
</section>

<section class="fw-section no-cover padding-top-4x margin-bottom-2x">
  <div class="container">
    <h2 class="block-title text-left margin-bottom-2x">
      Latest Updates
    </h2>
    <div>
      <section class="fw-section">
        <div class="grid masonry-grid col-3">
          <div class="grid-sizer"></div>
          <div class="gutter-sizer"></div>
          <?php //echo "<pre>";print_r($newsData);die;
          foreach ($newsData as $key => $value) { 
            $file_name = explode('.',$value->image_path);
            $file_ext = array_pop($file_name);                        
            $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
            $news_image = $this->config->item('site_url').'admin/uploads/articles/medium/'.$thumb_name;

            $description = substr(strip_tags($value->content), 0, 250); 

            ?>
          <div class="grid-item">
            <div class="tile tile-blog">
              <div class="preview-box">
                <img src="<?=$news_image?>" alt="<?=$value->article_title?>">
              </div>

              <div class="tile-title">
                <a href="<?=blog_url($value)?>" title="<?=$value->article_title?>"><?=$value->article_title?></a>
              </div>

              <div class="tile-meta">
                <div class="meta-top">
                  <span class="date"><?=date('d F, Y')// date_format($value->add_date ,'M D ,Y') ?></span>
                  <?php if(isset($value->place)){ ?>
                  <span class="place"><?=$value->place?></span>
                  <?php } ?>
                  <span class="name">by <?=$value->author_name ?></span>
                </div>

                <p class="tile-text"><?=$description?> ...</p>

                <div class="meta-bottom">
                  <a href="#" class="comments-qty">36 Comments </a>
                  <span class="likes-qty"><i class="material-icons remove_red_eye"></i><?=$value->viewed_count ?></span>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </section>
    </div>
  </div>
</section>