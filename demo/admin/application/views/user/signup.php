<?php

$fb_id = $this->session->userdata('fb_id');
$fb_name = $this->session->userdata('fb_name');


//echo $this->session->userdata('fb_id').'<br /><br />';
//echo $this->session->userdata('fb_user_name').'<br /><br />';
//echo $this->session->userdata('facebook_link').'<br /><br />';


?>


 
<div style=" margin: 0px; padding: 30px 0px 40px 201px;">

<h2>Welcome <?php echo  $fb_first_name.' '.$fb_last_name; ?> ! One more step before joining MyAcademy...</h2>


<form id="facebook_signup_form" action="<?php echo base_url().'facebookLogin/saveFacebookEmail'; ?>" method="post">
	<input type="hidden" name="fb_id" value="<?php echo $fb_id; ?>" />
	<input type="hidden" name="fb_name" value="<?php echo $fb_name; ?>" />
	Email Address:<br />
	<input type="text" name="email" class="fld_input validate" /><br />
	<input type="submit" onclick="return valid_account_form('facebook_signup_form');" class="Bt01" value="Sign Up Now!" />

</form>

</div>