<div class="widget cart-widget">
  <div class="widget-title">
    <?=$h2title?>
  </div>

  <ul class="cart-list">
    <?php foreach ($featuredProductDetails as $key => $productDetail){ 
    $price = ($productDetail->is_discount == 1) ? '₹'.number_format($productDetail->price - $productDetail->discount_price , 2) : '₹'.$productDetail->price;
        $file_name = explode('.',$productDetail->file_name);
        $file_ext = array_pop($file_name);                        
        $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;
        
        $product_image = $this->config->item('site_url').'admin/uploads/products/small/'.$thumb_name;

    ?>
    <li>
      <a href="<?=product_url($productDetail)?>" class="cart-thumb">
        <img src="<?=$product_image ?>" alt="<?=$productDetail->title ?>">
      </a>

      <div class="info-cont">
        <a href="<?=product_url($productDetail)?>" class="item-title"><?=ucwords($productDetail->title)?></a>

        <div class="category">
          <?= $productDetail->sub_category_title?>

          <span class="cost"><?=$price ?></span>
        </div>
      </div>
    </li>
    <?php } ?>
  </ul>
</div>