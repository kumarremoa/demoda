
        <footer class="futr-bg">
        	<div class="row">
            	<div class="col-sm-4">
                	<h2>Account Management</h2>
                    <ul class="futrlink">
                    	<li><a href="<?php echo base_url(); ?>user/signin" <?php if($this->router->fetch_method() == 'signin'){ echo 'class="active"'; } ?>>Account Login</a></li>
                        <li><a href="<?php echo base_url() ?>user/trackOrder">Order Tracking</a></li>  
                    </ul>
                </div>
                <div class="col-sm-4">
                	<h2>Shipping &amp; Returns</h2>
                    <ul class="futrlink">
                    	<li><a href="<?= base_url('return-policy') ?>" <?php if($this->uri->segment(1) == 'return-policy'){ echo 'class="active"'; } ?>>Return Policy</a></li>
                        <li><a href="<?php echo base_url() ?>shipping-rates" <?php if($this->uri->segment(1) == 'shipping-rates'){ echo 'class="active"'; } ?>>Shipping Rates</a></li>
                        <li><a href="<?php echo base_url() ?>international-shipping-and-payment" <?php if($this->uri->segment(1) == 'international-shipping-and-payment'){ echo 'class="active"'; } ?>>International Shipping and Payment</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                	<h2>Customer Service</h2>
                    <ul class="futrlink">
                    	<li><a href="<?php echo base_url() ?>faq" <?php if($this->uri->segment(1) == 'faq'){ echo 'class="active"'; } ?>>FAQ's</a></li>
                        <!--<li><a href="#">Forgot Password</a></li>
                        <li><a href="#">Email Us</a></li>-->
                        <li><a href="<?php echo base_url() ?>press-room" <?php if($this->uri->segment(1) == 'press-room'){ echo 'class="active"'; } ?>>Press Room</a></li>
                        <li><a href="#">Toll Free 877-877-7804</a></li>
                    </ul>
                </div>
            </div>
            <ul class="futrnav">
            	<li><a href="<?php echo $this->config->item('site_url'); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>about-us" <?php if($this->uri->segment(1) == 'about-us'){ echo 'class="active"'; } ?>>About Us</a></li>
                <li><a href="<?php echo base_url(); ?>terms-conditions" <?php if($this->uri->segment(1) == 'terms-conditions'){ echo 'class="active"'; } ?>>Terms & Conditions</a></li>
                <!--  <li><a href="#">Caftan</a></li>
                <li><a href="#">Tunics</a></li>
                <li><a href="#">Skirts</a></li>
                <li><a href="#">Scarfs</a></li> -->
               <li><a href="#">Blog</a></li>
                <li><a href="<?php echo base_url() ?>help" <?php if($this->uri->segment(1) == 'help'){ echo 'class="active"'; } ?>>Help</a></li>
                <li><a href="<?php echo base_url() ?>contact-us" <?php if($this->uri->segment(1) == 'contact-us'){ echo 'class="active"'; } ?>>Contact Us</a></li>
            </ul>
            <div class="row">
            	<div class="col-sm-8">
                	<div class="client-logo">
                    	<img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/client-logo.png" alt="">
                    </div>
                </div>
                <div class="col-sm-4"><img src="<?php echo $this->config->item('css_images_js_base_url'); ?>images/payment.png" alt="" class="payment"></div>
            </div>
        </footer>
    </div>
</div>

<!--<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo $this->config->item('css_images_js_base_url'); ?>js/bootstrap.js"></script>

<!-- sidebar Accordion js -->
<script src="<?php echo $this->config->item('css_images_js_base_url'); ?>assets/js/responsive-accordion.min.js" type="text/javascript"></script>
<!-- end sidebar Accordion js -->

</body>
</html>