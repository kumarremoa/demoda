<!-- main content --> 
<div class="container">
  <div class="page-title">
  <div class="container">
    <div class="breadcrumbs">
      <a href="<?=base_url()?>">Home</a>
      <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
      <span>Blog</span>
    </div>
    <h1 class="title pull-right"> Fashion Blog </h1>
  </div>
  </div>

<section class="fw-section no-cover margin-bottom-2x">
  <div class="container">
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


 <?php if($links !='') {  ?>
        <nav aria-label="Page navigation" class="pull-right">
          <ul class="pagination">
            <?php if (strpos($links, '<i class="material-icons arrow_back"></i>') === false) { ?>
                 <li class="arrow disable">
                  <a onclick="javascript:void()" aria-label="Previous">
                    <i class="material-icons arrow_back"></i>
                  </a>
                </li>
              <?php }
              echo $links;
              if (strpos($links, '<i class="material-icons arrow_forward"></i>') === false) { ?>
               <li class="arrow disable">
                <a onclick="javascript:void()" aria-label="Next">
                  <i class="material-icons arrow_forward"></i>
                </a>
              </li>
            <?php } ?>
          </ul>
      </nav>'
  <?php } ?>     
</div>