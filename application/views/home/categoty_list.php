<section class="fw-section">
<h2 class="block-title text-ceter margin-top-3x margin-bottom-2x">
  Categories
  <small>All you need</small>
</h2>

<div class="items-carousel categories-carousal " data-slick='{"arrows": true, "dots": false, }'>
  <?php foreach ($categories as $value) { 
    $file_name = explode('.',$value->file_name);
        $file_ext = array_pop($file_name);                        
        $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
        $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name;
    ?>  
  <div class="tile tile-category">
    <a href="<?= sub_category_url($value)?>" class="preview-box">
      <img src="<?= $product_image ?>" alt="<?=$value->sub_category_title ?>">
    </a>
    <div class="tile-title"><?=$value->sub_category_title ?></div>
  </div>
  <?php } ?>  
</div>
</section>