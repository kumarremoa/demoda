<?php
function product_url($product){
  return base_url().'product/description/'.$product->link_rewrite;
}
function sub_category_url($category)
{
	return base_url()."product/category/".$category->sub_cat_link_rewrite;
}
function category_url($category)
{
	return base_url()."product/category/".$category->cat_link_rewrite;
}
function blog_url($value)
{
	return base_url()."blog/".$value->link_rewrite;
}
?>