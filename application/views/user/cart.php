 <!-- main content -->
 <?php
	/**
	 * get current controller and method name
	 * $this->uri->segment(n); // n=1 for controller, n=2 for method, etc
	 *
	 * OR
	 *
	 * $this->router->fetch_class(); // return current controller name
	 * $this->router->fetch_method(); // return current action/method name
	 */
	 
	//$params = $this->uri->segment(1);
	//print_r($params);
	//echo $this->router->fetch_class();
	
	
?><?php /*
    <!-- inner page content -->
    <div class="mid"> 
        <div class="content">
            <div class="heading-sec">
                <div class="headng">
                    <h4>Cart</h4>
                </div>
                <div class="clr"></div>
            </div>
            
            <div class="inner_page">
            <div class="tabl-responsive">
            <?php if(sizeof($cart) > 0){ ?>
                <form name="cart" action="<?php echo base_url(); ?>user/updateCart" method="post">
                <table class="table_cart" cellspacing="0" cellpadding="0">
                            <tr>
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Action</th>
                             </tr>
                            <?php
                            $gross_amount = 0;
                            foreach($cart as $product)
                            {
								$price = ($product->is_discount == 1) ? $product->price-$product->discount_price : $product->price;
								$total_amount = $price*$product->ordered_quantity;
								$gross_amount = $gross_amount+$total_amount;



                                echo '<tr>
                                        <td>'.$product->title.'</td>
										<td><span class="color_box" style="background:#'.$product->ordered_color.';">&nbsp;</span></td>
										<td>'.$product->ordered_product_size.'</td>
                                        <td>'.$price.'</td>
                                        <td>';
											echo '<input type="hidden" name="id[]" value="'.$product->cart_id.'">';
											echo '<select name="quantity[]" onchange="change_total_amount('.$product->cart_id.','.$price.',this.value)">';
											for($i=1; $i<= $product->quantity; $i++)
											{
												$selected = ($i == $product->ordered_quantity) ? 'selected="selected"' : '';
												echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';	
											}
											
											echo '</select>';
											
									echo '</td>								
										<td><span id="total_amount_'.$product->cart_id.'" class="span_total_amount">'.$total_amount.'</span></td>
										<td><a href="'.base_url().'user/removeCartItem/'.$product->cart_id.'">Remove</a></td>
                                </tr>';
                            }
                            
                            ?>	
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Gross Amount</strong></td>
                                <td><strong><span id="gross_amount"><?php echo $gross_amount; ?></span></strong></td>
                               	<td><input type="submit" name="update_cart" value="Update Cart" class="update-btn frt" /></td>
                             </tr>
                            </table>
                  </form>
                
                <?php 
                    echo '<a href="checkout" class="cartbtn">Proceed to checkout</a>';
					echo '<a href="emptyCart" class="cartbtn">Empty Cart</a>';
                }
                ?>
                <a href="<?php echo $this->config->item('site_url'); ?>" class="cartbtn">Continue Shopping</a>	
                <div class="clearfix"></div>
            </div>
            </div>
        </div>
   
    <!-- end inner page content -->
    <?php */?>
<main>
        <!-- Page Title -->
        <div class="page-title">
          <div class="container">
            <div class="breadcrumbs">
              <a href="<?=base_url()?>">Home</a>
              <span class="delimiter"><i class="material-icons keyboard_arrow_right"></i></span>
              <span>Cart</span>
            </div>

            <div class="title pull-right"><h1>Shopping Cart</h1></div>
          </div>
        </div><!-- Page Title END -->

        <!-- Content -->
        <div class="container">
          <div class="row">
            <div class="col-md-9">
              <div class="table-responsive">
              <?php if(sizeof($cart) > 0){ ?>
                <!-- <form name="cart" action="<?php echo base_url(); ?>user/updateCart" method="post"> -->
                <table class="items-table">
                  <tr>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                  </tr>
                  <?php
                    $gross_amount = 0;
                    foreach($cart as $product)
                    {
                        $price = ($product->is_discount == 1) ? $product->price-$product->discount_price : $product->price;
                        $total_amount = $price*$product->ordered_quantity;
                        $gross_amount += $total_amount;

                        $file_name = explode('.',$product->file_name);
                        $file_ext = array_pop($file_name);                        
                        $thumb_name = implode('.',$file_name).'_thumb.'.$file_ext;

                        $product_image = $this->config->item('site_url').'admin/uploads/products/medium/'.$thumb_name; ?>
                  <tr>
                    <td class="cart-img">
                      <img src="<?=$product_image ?>" class="item-thumb" alt="<?=$product->title?>">
                    </td>
                    <td class="item-info">
                      <a href="<?=product_url($product)?>" class="<?=$product->title?>"><?=ucwords($product->title) ?></a>
                      <span><?='₹ '.$price?></span>
                      <span class="color">Color <span style="background-color: <?='#'.$product->ordered_color?>;"></span></span>
                      <span class="size">Size <span><?=$product->ordered_product_size?></span></span>
                    </td>
                    <td>
                      <div class="select-xl inline">
                      <input type="hidden" name="id[]" value="<?=$product->cart_id ?>">
                      <span class="select-span"><?=$product->ordered_quantity?></span>
                      </div>
                    </td>
                    <td>
                      <span id="<?='total_amount_'.$product->cart_id?>" class="span_total_amount" ><?='₹ '.$total_amount ?></span>

                      <div class="remove">
                        <a onclick="findTarget('<?=base_url().'user/removeCartItem/'.$product->cart_id?>')" class="btn btn-gray btn-iconed"><i class="material-icons delete_forever"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
              <div class="cart-bottom-tools">
                <a href="emptyCart" class="btn btn-default empty">Empty Cart</a>
                <a href="<?php echo $this->config->item('site_url'); ?>" class="btn btn-default">Continue Shopping</a>  
                <!-- <input type="submit" name="update_cart" value="Update Cart" class="btn btn-default update" /> -->
              </div>
            </div>
            <div class="col-md-3">
              <!-- Sidebar -->
              <aside class="sidebar">
                <!-- Cart Total Widget -->
                <div class="widget cart-total bg-gray">
                  <div class="total-title">Cart Total</div>

                  <div class="list margin-bottom-1x">
                    <div class="item">
                      <span>Total products</span>
                      <span id="gross_amount"><?=$gross_amount ?></span>
                    </div>
                    <?php 
                    $shipping_fee = 100;
                    if($gross_amount > 750){
                        $shipping_fee = 0;
                    } $gross_amount +=$shipping_fee;  ?>

                    <div class="item">
                      <span>Shipping</span>
                      <input type="hidden" name="shipping_fee" id="shipping_fee" value="<?=$shipping_fee?>">
                      <span><?= $shipping_fee ? $shipping_fee :'Free Shipping' ?></span>
                    </div>

                    <div class="item">
                      <span>Total</span>
                      <span id="total_amount_cart"> <?=$gross_amount ?></span>
                    </div>
                  </div>

                  <a href="checkout" class="btn btn-default btn-block">
                    Proceed to checkout
                  </a>
                </div>
                <!-- </form> -->
                <?php if(!empty($featuredProductDetails)){
                    $this->load->view('//product/_side_product_lising',[
                        'featuredProductDetails' => $featuredProductDetails,
                        'h2title' => 'Featured Products',
                      ]);
                  }?>
              </aside>
            </div>
          </div>
        </div>
      </main>
      <?php }?>