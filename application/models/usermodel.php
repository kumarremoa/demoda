<?php
class Usermodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	function getCartData()
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$where = array('c.ip'=> $user_ip,'i.is_featured' =>1);
		$this->db->select('p.*,p.id as product_id,i.file_name,c.id as cart_id,c.size as ordered_product_size,c.quantity as ordered_quantity,c.color as ordered_color');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->join('cart c','c.product_id=p.id','left');
		$this->db->where($where);
		//$this->db->group_by('c.product_id');
		
		$recordSet = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		
		return $recordSet->result();
	}
	
	// this function is to delete products from cart
	function emptyCart()
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$this->db->where('ip',$user_ip);
		$this->db->delete('cart');
	}
	
	// copy products from cart table to order table
	function createOrder($formData)
	{
		$cartData = $this->getCartData();
		//echo '<pre>'; print_r($cartData); exit;
				
		$order_id = rand(11111111,99999999);
		
		$data['order_coming_from'] = 'Zippy Loft';
		$data['order_id'] = $order_id;
		$data['user_id'] = $formData['user_id'];
		$data['first_name'] = $formData['first_name'];
		$data['last_name'] = $formData['last_name'];
		$data['email'] = $formData['email'];
		$data['address'] = $formData['address'];
		$data['city'] = $formData['city'];
		$data['state'] = $formData['state'];
		$data['zip'] = $formData['zip'];
		$data['country'] = $formData['country'];
		
		if($formData['payment_method'] == 'authorize_net')
		{
			$data['card_num'] = $formData['card_num'];
			$data['exp_date'] = $formData['exp_date'];
			$data['card_code'] = $formData['card_code'];
		}
		
		
		/*if($formData['payment_method'] == 'cod')
			$data['is_cod'] = '1';
		else
			$data['is_cod'] = '0';*/
		$data['payment_method'] = $formData['payment_method'];
		
			
		foreach($cartData as $product)
		{
			$data['product_id'] = $product->product_id;
			$data['quantity'] = $product->ordered_quantity;	
			$data['color'] = $product->ordered_color;	
			$data['size'] = $product->ordered_product_size;	
			
			$this->db->insert('orders',$data);
			
			// reduce product's available quantity if payment method is cod
			if($formData['payment_method'] == 'cod')
			{
				$remaining_quantity = $product->ordered_quantity;			
				$this->db->set('quantity', 'quantity-'.$remaining_quantity, FALSE);
				$this->db->where('id', $product->product_id);
				$this->db->update('products');	
			}
			
			
			//echo $this->db->last_query(); exit;
			
		}
		
		// empty cart
		$this->emptyCart();
		
		return $order_id;
	}
	
	
	/**
	 * Get order details
	 */
	 
	function orderDetails($order_id)
	{	
	
		$where = array('o.order_id'=> $order_id);
		$this->db->select('p.*,o.*,o.quantity as ordered_quantity,o.order_id');
		$this->db->from('products p');
		$this->db->join('orders o','o.product_id=p.id','left');
		$this->db->where($where);
		
		$recordSet = $this->db->get();	
		
		return $recordSet->result();
	}
	
	/**
	 * Get total order amount
	 */
	 
	function total_order_amount()
	{	
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$where = array('c.ip'=> $user_ip,'i.is_featured' =>1);
		$this->db->select('p.*,p.id as product_id,i.file_name,c.id as cart_id,c.quantity as ordered_quantity');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->join('cart c','c.product_id=p.id','left');
		$this->db->where($where);
		//$this->db->group_by('c.product_id');
		
		$recordSet = $this->db->get();	
		
		$orderDetails = $recordSet->result();
		
		$total_amount = 0;
		foreach($orderDetails as $order)
		{
			$price = ($order->is_discount == 1) ? $order->price-$order->discount_price : $order->price;
			$total_product_price = ($order->ordered_quantity * $price);
			$total_amount = $total_amount + $total_product_price;
		}
		
		$cart_details['total_amount'] = $total_amount;
		$cart_details['total_cart_items'] = $recordSet->num_rows();
		
		//echo $total_amount; exit;		
		//return $total_amount;
		return $cart_details;
		
	}
	
	
	function checkEmailExist($email)
	{
		$sql="SELECT * FROM users where email='".$email."'";	
		
		$recordSet = $this->db->query($sql);
	  
		if($recordSet->num_rows() > 0)
			return true;
		else
			return false;
	}
	
		
	function registerUser($formData)
	{	
		if($this->checkEmailExist($formData['email']))	
		{
			// exail exists
			return false;
		}
		else
		{
			$data['first_name'] = $formData['first_name'];
			$data['last_name'] = $formData['last_name'];
			$data['email'] = $formData['email'];
			$data['password'] = $formData['password'];
			
			$this->db->insert('users',$data);
			
			$insert_id = mysql_insert_id();
			
			// set session variable
			$newdata = array(
							'user_id'  => $insert_id,
							'user_name'  => $formData['first_name'].' '.$formData['last_name'],
							//'user_email'  => $formData['email'],
							//'user_image'  => 'default.jpg'
							//'logged_in' => TRUE
						);
						
			// set data in session
			$this->session->set_userdata($newdata);
			
			
			// send mail to user
			/*$to = $formData['email'];
			$to_name = $formData['fullName'];
			
			$from = 'no-reply@go4college.com';
			$from_name = 'Customer Support Team';
			
			$subject = "Registration Email";
			$message = "Hello ".$formData['fullName']."<br>Thanks for using My Academy.";
			
			$this->email->clear();
			$this->email->from($from, $from_name);
			$this->email->to($to,$to_name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			$this->email->send();*/
			
			return true;
		}
		
	}
	
	/**
	 * Get User details
	 */
	function userDetails($user_id)
	{	
		$where = array('id '=> $user_id);
					
		$this->db->where($where);
		$recordSet = $this->db->get('users');
		
		/*$fields = $recordSet->list_fields();	
		foreach ($recordSet->result() as $row)
		{
			for($i=0; $i<count($fields); $i++)
			{
				$field_name = $fields[$i];
				$rs[$field_name]=$row->$field_name;
			}
		}*/
		
		//return $rs;
		return $recordSet->result();
	}
	
	/**
	 * Get User details by email address
	 */
	function userDetailsByEmail($email)
	{	
		$where = array('email '=> $email);
					
		$this->db->where($where);
		$recordSet = $this->db->get('users');
		
		/*$fields = $recordSet->list_fields();	
		foreach ($recordSet->result() as $row)
		{
			for($i=0; $i<count($fields); $i++)
			{
				$field_name = $fields[$i];
				$rs[$field_name]=$row->$field_name;
			}
		}*/
		
		//return $rs;
		return $recordSet->result();
	}
	
	
	
	
	/**
	 * This function is to check valid access
	 * if user is logged in than its return true
	 * else returns 404 error
	 */
	function isLoggedIn()
	{
	
		//echo $this->session->userdata('user_id'); exit;
		if($this->session->userdata('user_id'))
			return true;
		else
			show_404();
	}
		
	function userLogin($formData)
	{
		$where = array(
						'email' => $formData['email'],
						'password' => $formData['password'],
						'is_active' => '1'
					);
					
		$this->db->where($where);
		$recordSet = $this->db->get('users');
		
		if($recordSet->num_rows() > 0)
		{
			$n=0;
			$fields = $recordSet->list_fields();						
			foreach ($recordSet->result() as $row)
			{
				for($i=0; $i<count($fields) ; $i++)
				{
					$field_name = $fields[$i];
					$rs[$field_name]=$row->$field_name;
				}
				$n++;
			}
			
			// set user data array in session
			$newdata = array(
						'user_id'  => $rs['id'],
						'user_name'  => $rs['first_name'].' '.$rs['last_name']
						//'user_email'  => $rs['email'],
						//'user_image'  => $rs['image']
						//'logged_in' => TRUE
               );
			   
			$this->session->set_userdata($newdata);
			
			return true;
		}
		else
		{
			return false;
		}
			
	}
	
	/**
	 * This function is to update user profile
	 */
	function updateProfile($formData)
	{
		//print_r($formData); exit;
		$data['first_name'] = $formData['first_name'];
		$data['last_name'] = $formData['last_name'];
		$data['email'] = $formData['email'];
		$data['password'] = $formData['password'];		
		
		// check email exist
		if($this->userDetailsByEmail($formData['email']))
		{
			$userData = $this->userDetailsByEmail($formData['email']);
			$userdetails = $userData[0];
			//echo '<pre>'; sizeof($userData); print_r($userdetails);
			
			if($userdetails->id != $this->session->userdata('user_id'))
			{
				//echo 'Email already exist';	
				return false;				
			}
			
		}/*
		else
		{
			//echo 'email not exist';
			$data['email'] = $formData['email'];
		}*/
		
		$user_id = $this->session->userdata('user_id');
		// set user data array in session
		$newdata = array(
					'user_id'  => $user_id,
					'user_name'  => $formData['first_name'].' '.$formData['last_name']					
		   );
		   
		$this->session->set_userdata($newdata);		
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
		
		return true;
		
	}
	
	// track order	
	function getOrderStatus($order_id)
	{
		$this->db->select('delivery_status');
		$this->db->where('order_id',$order_id);
		$recordSet = $this->db->get('orders');
		
		return $recordSet->row();		
		
	}
	
	
	/**
	 * check email exist or not
	 * if exist than send password to user email address
	 */
	 function sendPassword($formData)
	 {
	 	$email = $formData['email'];
	 	
		// check email exist
		$where = array('email '=> $email);
		$this->db->where($where);
		$recordSet = $this->db->get('users');
		
		if($this->checkEmailExist($email))
		{
			// Get user details
			$userData = $this->userDetailsByEmail($email);
			//print_r($userData); exit;
			$userData = $userData[0];
			
			// send mail			
			$to = $email;
			$to_name = $userData->first_name.' '.$userData->last_name;
			
			$from = 'customercare@demodasecrets.com';
			$from_name = 'Customer Support Team';
			
			$subject = "Password Recovery Email";
			$message = "Hello ".$userData->first_name." ".$userData->last_name."<br>Your Password is ".$userData->password;
			
			$this->email->clear();
			$this->email->from($from, $from_name);
			$this->email->to($to,$to_name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			$this->email->send();	
			
			return true;
		}
		else
		{
			return false;
		}
		
	 }
	
	
	
	function updateCart($formData)
	{		
		$falg = 0;
		for($i=0; $i<sizeof($formData['id']); $i++)
		{
			// check quantity available wether available or not
			$sql = "select p.quantity as available_quantity,p.title from products p left join cart c ON p.id=c.product_id where c.id=".$formData['id'][$i];
			$recordSet = $this->db->query($sql);
			
			$result = $recordSet->result();
			
			$product_details = $result[0];
			//print_r($product_details);
			
			if($product_details->available_quantity >= $formData['quantity'][$i])
			{
				$data['quantity'] = $formData['quantity'][$i];		// set quantity in cart as per user requirement	
			}
			else
			{
				$data['quantity'] = $product_details->available_quantity;	// set quantity in cart to max stock availability
				$falg = 1;
			}
			
			$this->db->where('id',$formData['id'][$i]);
			$this->db->update('cart',$data);
			
		}
		
		if($falg == 0)
			return true;
		else
			return false;
		
	}
	
	
	// remove cart item, check user ip before deleting cart item
	function removeCartItem($id)
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$sql = "select ip from cart where id=".$id;
		$recordSet = $this->db->query($sql);
		
		$result = $recordSet->result();
		
		if($result[0]->ip == $user_ip)
		{
			$this->db->where('id',$id);
			$this->db->delete('cart');
			
			return true;
		}
		else
			return false;
		
	}
	
	/**
	 * Add Newsletter subscriber
	 */ 
	function subscribe($formData)
	{
		$sql = "select * from newsletter_subscribers where email='".$formData['email']."'";
		$recordSet = $this->db->query($sql);
		
		$result = $recordSet->result();
		
		if($recordSet->num_rows() == 0)
		{
			$this->db->set('email',$formData['email']);
			$this->db->insert('newsletter_subscribers');
			
			return true;
		}
		else
			return false;
			
		//echo $recordSet->num_rows(); exit;
	}
	
	// add product to wishlist
	function addToWishlist($product_id)
	{
		$user_id = $this->session->userdata('user_id');
		//check if already wishlisted
		$where = array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('id');
		$this->db->where($where);
		$recordSet = $this->db->get('wishlist');
		
		if($recordSet->num_rows() > 0)
		{
			return false;	
		}
		else
		{
			$data['user_id'] = $user_id;
			$data['product_id'] = $product_id;
			$this->db->insert('wishlist',$data);
			return true;	
		}
	}
	
	
	// get array of wishlisted product id
	function getWishlistProductIds()
	{
		$wishlist_product_ids = array();
		
		$userid = $this->session->userdata('user_id');
		
		$this->db->select('id,product_id');
		$this->db->where('user_id',$userid);
		$recordSet = $this->db->get('wishlist');
		
		if($recordSet->num_rows() > 0)
		{
			$result = $recordSet->result();
			foreach($result as $wishlist)
			{
				$wishlist_product_ids[] = $wishlist->product_id;
			}
			
			return $wishlist_product_ids;
		}
		else
			return $wishlist_product_ids;
			
	}
	
	
	// add product to wishlist
	function deleteWishlist($product_id)
	{
		$user_id = $this->session->userdata('user_id');
		//check if already wishlisted
		$where = array('user_id'=>$user_id,'product_id'=>$product_id);
		$this->db->select('id');
		$this->db->where($where);
		$recordSet = $this->db->get('wishlist');
		
		if($recordSet->num_rows() == 0)
		{
			return false;	
		}
		else
		{
			$this->db->where($where);
			$this->db->delete('wishlist');
			return true;	
		}
	}
	
	function getWishlist($user_id,$limit,$start)
	{
		
		$order_by = ($this->session->userdata('short_by') && $this->session->userdata('short_by') == 'price') ? '`p`.`price`' : '`p`.`id`' ;
					
		$rs = array();
		$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.id IN (select w.product_id from wishlist w where w.user_id=".$user_id.") GROUP BY `p`.`id` ORDER BY ".$order_by." desc LIMIT ".$start.",".$limit;
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			$rs = $recordSet->result();
		}
		
		//return $sql;
		//echo $this->db->last_query(); exit;
		return $rs;	
	}
	
	function getTotalOrders($user_id)
	{
		$this->db->select('id');
		$this->db->where('user_id',$user_id);
		$this->db->group_by('order_id');
		$recordSet = $this->db->get('orders');		
		
		return $recordSet->num_rows();
	}
	
	function getOrders($user_id,$limit,$start)
	{
		$this->db->select('order_id,transaction_id,payment_method,payment_status,created');
		$this->db->where('user_id',$user_id);
		$this->db->group_by('order_id');
		$this->db->limit($limit,$start);
		$recordSet = $this->db->get('orders');
		
		//echo $this->db->last_query(); exit;	
		
		return $recordSet->result();
	}
	
	
	/**
	* Get order details
	*/
	function getOrderDetails($order_id)
	{	
		$where = array('o.order_id'=> $order_id,'i.is_featured' => 1 );
		$this->db->select('p.*,o.*,o.quantity as ordered_quantity,o.color as ordered_color,o.size as ordered_size,o.order_id,i.file_name,v.name as vendor_name,v.email as vendor_email');
		$this->db->from('products p');
		$this->db->join('orders o','o.product_id=p.id','left');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->join('vendors v','p.vendor_id=v.id','left');
		$this->db->where($where);

		$recordSet = $this->db->get();	

		return $recordSet->result();
	}
	
	
	function getMailContent($mail_type)
	{
		$this->db->select('*');

		if($mail_type == 'invoice_mail_to_buyer')
			$this->db->where('id',1);
		else if($mail_type == 'invoice_mail_to_demoda')
			$this->db->where('id',2);
		else if($mail_type == 'invoice_mail_to_vendor')
			$this->db->where('id',3);
		
		return $this->db->get('mail_content')->row();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * This function is to save user photo
	 */
	function pageDetails()
	{
		$this->db->where('page_name','edit user profile');
		$recordSet = $this->db->get('pages');
		return $recordSet->result();
	}
	
	
	
	
	
	/**
	 * This function is to save user photo
	 */
	function savePhoto($formData,$imageData)
	{
		if($imageData['image']['name'] != '')
		{
			$random_digit=rand(0000,9999);
			$file_name=$random_digit.$imageData['image']['name'];
			$file_name = str_replace(" ","_",$file_name);
			
			// The file supplied is valid...Set up some variables for the location and name of the file.
			$thumb_folder = 'uploads/users/'; // This is the folder to which the images will be saved
			$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
			
			// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
			move_uploaded_file($_FILES['image']['tmp_name'], $tmp_file);
		
			$data['image'] = $file_name;
			$user_id = $this->session->userdata('user_id');
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			
			$this->session->set_userdata('user_image',$file_name);
		}
		
		
		if(isset($formData['premiumInstructor']))
		{
			$data['premium_instructor_steps'] = $formData['premiumInstructor'];	
			
			$user_id = $this->session->userdata('user_id');
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
		}		
	}
	
	
	/**
	 * This function is to update user account details
	 */
	/*function updateAccountDetails($formData)
	{
		$current_email = $formData['current_email'];
		$current_password = $formData['password'];
		
		$where = array('email' => $current_email, 'password' => $current_password);
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where($where);
		$recordSet = $this->db->get();
		
		//echo $this->db->last_query();
		//echo $recordSet->num_rows(); exit;
		
		// valid current password entered
		if($recordSet->num_rows() > 0)
		{
			$where = array('email' => $formData['email']);
			$this->db->select('id');
			$this->db->from('users');
			$this->db->where($where);
			$checkExist = $this->db->get();
			
			$result = $checkExist->result();
			$result = $result[0];
			
			//print_r($result); exit;
						
			if($checkExist->num_rows() == 0 || $result->id == $this->session->userdata('user_id'))
			{
				$data['email'] = $formData['email'];
				$data['password'] = $formData['new_password'];
				
				// get user id
				$user_id = $this->session->userdata('user_id');
				$this->db->where('id', $user_id);
				$this->db->update('users', $data);
			
				$this->session->set_userdata('user_email',$formData['email']);
				$error = '';				
				$status = 'true';
			}
			else
			{
				// email already exist
				$error = 'email exist';
				$status = 'false';
			}
		}
		else
		{
			// invalid current password entered
			$error = 'invalid password';
			$status = 'false';
		}
		
		$status = array('status' => $status, 'error' => $error);
		return $status;
		
			
	}*/
	
	/**
	 * This function is to update user account privacy
	 */
	function updateAccountPrivacy($formData)
	{
		$data['show_profile'] = (isset($formData['profileVisibility']) && $formData['profileVisibility'] == 'on') ? '1' : '0';
		$data['show_courses'] = (isset($formData['subscribedCourses']) && $formData['subscribedCourses'] == 'on') ? '1' : '0';
		
		// get user id
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
		
	}
	
	/**
	 * This function is to update user notification settings
	 */
	function updateUserNotificationSettings($formData)
	{
		$data['announcement_notification'] = (isset($formData['announcement_notification']) && $formData['announcement_notification'] == 'on') ? '1' : '0';
		$data['course_of_week_notification'] = (isset($formData['course_of_week_notification']) && $formData['course_of_week_notification'] == 'on') ? '1' : '0';
		$data['course_review_notification'] = (isset($formData['course_review_notification']) && $formData['course_review_notification'] == 'on') ? '1' : '0';
		$data['recommend_course_notification'] = (isset($formData['recommend_course_notification']) && $formData['recommend_course_notification'] == 'on') ? '1' : '0';
		$data['coupon_expire_notification'] = (isset($formData['coupon_expire_notification']) && $formData['coupon_expire_notification'] == 'on') ? '1' : '0';
		$data['message_recieved_notification'] = (isset($formData['message_recieved_notification']) && $formData['message_recieved_notification'] == 'on') ? '1' : '0';
		$data['follower_notification'] = (isset($formData['follower_notification']) && $formData['follower_notification'] == 'on') ? '1' : '0';
		$data['no_notification'] = (isset($formData['no_notification']) && $formData['no_notification'] == 'on') ? '1' : '0';
		
		// get user id
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
		
	}
	
	function deleteUserAccount()
	{
		$user_id = $this->session->userdata('user_id');
		// delete user courses, lectures and sections
		
		// delete from followers
		
		// delete account
		
		$this->db->where('id',$user_id);
		$this->db->delete('users');
		
		// destroy session
		$this->session->sess_destroy();
	}
	
	function getTaking()
	{
		// taking
		$user_id = $this->session->userdata('user_id');
		//$query = "select u.id as user_id,u.first_name,u.last_name,c.id as course_id,c.title,c.image from (courses c LEFT JOIN users u ON c.user_id=u.id) where c.id IN (select course_id from taking where user_id=".$user_id.") AND c.is_approved='1' AND c.publish='1' group by c.id";
		
		//$query = "select u.id as user_id,u.first_name,u.last_name,c.id as course_id,c.title,c.image,rs.total_read,count(l.id) as total_lecture from ((((courses c LEFT JOIN users u ON c.user_id=u.id) left join course_read_status rs ON rs.course_id=c.id AND u.id=rs.user_id) left join sections s ON s.course_id=c.id) left join lecture_content l ON l.section_id=s.id) where c.id IN (select course_id from taking where user_id=".$user_id.") AND c.is_approved='1' AND c.publish='1'  group by c.id";
		
		//select * from (select u.id as user_id,u.first_name,u.last_name,c.id as course_id,c.title,c.image,rs.total_read,rs.recently_read_lecture,count(l.id) as total_lecture from ((((courses c LEFT JOIN users u ON c.user_id=u.id) left join course_read_status rs ON rs.course_id=c.id AND u.id=rs.user_id) left join sections s ON s.course_id=c.id) left join lecture_content l ON l.section_id=s.id) where c.id IN (select course_id from taking where user_id=4) AND c.is_approved='1' AND c.publish='1'  group by c.id ) as base_query left join lecture_content lc on lc.id=(select l.id as lecture_id from sections s left join lecture_content l ON l.section_id=s.id where s.course_id=base_query.course_id AND l.id > (select recently_read_lecture from course_read_status rs where rs.course_id=base_query.course_id AND rs.user_id=4) LIMIT 1)
		
		//$query = "select * from (select u.id as user_id,u.first_name,u.last_name,c.id as course_id,c.title,c.image,rs.total_read,rs.recently_read_lecture,count(l.id) as total_lecture from ((((courses c LEFT JOIN users u ON c.user_id=u.id) left join course_read_status rs ON rs.course_id=c.id AND rs.user_id=".$user_id.") left join sections s ON s.course_id=c.id) left join lecture_content l ON l.section_id=s.id) where c.id IN (select course_id from taking where user_id=".$user_id.") AND c.is_approved='1' AND c.publish='1'  group by c.id ) as base_query left join lecture_content lc on lc.id=(select l.id as lecture_id from sections s left join lecture_content l ON l.section_id=s.id where s.course_id=base_query.course_id AND l.id > (select recently_read_lecture from course_read_status rs where rs.course_id=base_query.course_id AND rs.user_id=".$user_id.") LIMIT 1)";
$query = "select base_query.*,lc.id as next_lecture_id,lc.lecture_title from (select u.id as user_id,u.first_name,u.last_name,c.id as course_id,c.title,c.image,rs.total_read,rs.read_lecture,rs.recently_read_lecture,count(l.id) as total_lecture from ((((courses c LEFT JOIN users u ON c.user_id=u.id) left join course_read_status rs ON rs.course_id=c.id AND rs.user_id=".$user_id.") left join sections s ON s.course_id=c.id) left join lecture_content l ON l.section_id=s.id) where c.id IN (select course_id from taking where user_id=".$user_id.") AND c.is_approved='1' AND c.publish='1'  group by c.id ) as base_query left join lecture_content lc on lc.id=(select l.id as lecture_id from sections s left join lecture_content l ON l.section_id=s.id where s.course_id=base_query.course_id AND l.id > (select recently_read_lecture from course_read_status rs where rs.course_id=base_query.course_id AND rs.user_id=".$user_id.") LIMIT 1)";
		
		$recordSet = $this->db->query($query);
       
        return $recordSet->result();
		//echo $this->db->last_query(); exit;
		
		
	}
	
	function getTeaching()
	{
		
		//teaching		
		// select c.id,c.title,c.image from courses c where c.user_id=4 and c.is_active='1' and c.publish='1'
		
		$user_id = $this->session->userdata('user_id');
		$where = array('c.user_id'=>$user_id);
		
		$this->db->select('c.id,c.title,c.image');
		$this->db->from('courses c');
		$this->db->where($where);
		
		$recordSet = $this->db->get();
       
        return $recordSet->result();
		//echo $this->db->last_query(); exit;
	
	}
	
	/*function getWishlist()
	{
		
		//teaching		
		// select c.id,c.title,c.image from courses c where c.user_id=4 and c.is_active='1' and c.publish='1'
		//select w.id as wishlist,count(t.id) as total_taking,c.id as course_id,c.*,u.first_name,u.last_name,u.image as user_image from (((courses c LEFT JOIN taking t ON t.course_id=c.id) LEFT JOIN users u ON c.user_id=u.id) LEFT JOIN wishlist w ON w.course_id=c.id)  where w.user_id=4 and c.is_active='1' and c.publish='1' group by c.id
		
		$user_id = $this->session->userdata('user_id');
		$where = array('w.user_id'=>$user_id,'c.is_approved'=>'1','c.publish'=>'1');
		
		$this->db->select('c.id as course_id,c.*,u.first_name,u.last_name,u.image as user_image,w.id as wishlist,count(t.id) as total_taking');
		$this->db->from('courses c');
		$this->db->join('taking t','t.course_id=c.id','left');
		$this->db->join('users u','c.user_id=u.id','left');
		$this->db->join('wishlist w','w.course_id=c.id','left');
		$this->db->where($where);
		$this->db->group_by('c.id');
		
		$recordSet = $this->db->get();
       
        return $recordSet->result();
		//echo $this->db->last_query(); exit;
			
	}*/
	
	
	function getFollowing($user_id)
	{
		// select count(id) as following from followers where follower_id=4		
		$query = "(select count(id) as total from followers where follower_id=".$user_id.") UNION (select count(id) from followers where following_id=".$user_id.")";
		$recordSet = $this->db->query($query);
       
        return $recordSet->result();
	}
	
	function courseDetails()
	{
		$user_id = $this->session->userdata('user_id');
		$query = "select c.id, c.title from courses c where c.is_private='0' AND c.is_approved='1' AND c.id not in (select interested_in from interest where user_id=".$user_id.")";
		$recordSet = $this->db->query($query);
		return $recordSet->result();
		/*$where = array('c.is_private'=>'0','c.publish'=>'1','c.is_approved' => '1');
		
		$this->db->select('id,title');
		$this->db->from('courses c');
		$this->db->where($where);
		
		$recordSet = $this->db->query($query);
       
        return $recordSet->result();*/
		
		//select c.id, c.title from courses c where c.is_private='0' AND c.is_approved='1' AND c.id not in (select interested_in from interest where user_id=4)
		
	}
	
	/**
	 * This function is to add User Interests
	 */
	function addUserInterests($formData)
	{
		
		$data['user_id'] = $this->session->userdata('user_id');
		
		foreach($formData['interests'] as $interests)
		{
			$data['interested_in'] =  $interests;
			$this->db->insert('interest', $data);
		}
		
	}
	
	/**
	 * This function is to add User Interests
	 */
	function interestList()
	{
		$user_id = $this->session->userdata('user_id');
		$where = array('i.user_id'=>$user_id,'c.is_private'=>'0','c.publish'=>'1','c.is_approved' => '1');
		
		$this->db->select('i.id as interest_id,c.id as course_id,c.title,c.image');
		$this->db->from('courses c');
		$this->db->join('interest i','i.interested_in=c.id','left');
		$this->db->where($where);
		
		$recordSet = $this->db->get();
       
        return $recordSet->result();
	}
	
	
	function removeUserInterests($interest_id)
	{
		$this->db->where('id',$interest_id);
		$this->db->delete('interest');
	
	}
	
	function upgradeUser()
	{
		$user_id = $this->session->userdata('user_id');
		$query = "update users set premium_instructor_steps=premium_instructor_steps+1 where id=".$user_id;
		$this->db->query($query);
		
	}
	
	function upgradeUserPaypalInfo($formData)
	{
	
		$data['paypal_email'] = $formData['paypal_email'];
		$data['address'] = $formData['address'];
		$data['city'] = $formData['city'];
		$data['zip'] = $formData['zip'];
		$data['paypalStateId'] = $formData['paypalStateId'];
		$data['paypalCountryId'] = $formData['paypalCountryId'];
		$data['premium_instructor_steps'] = $formData['premiumInstructor'];
		
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id',$user_id);
		$this->db->update('users',$data);
	
	}
	
	
	function checkUserExist($data)
	{
		$email = $data['email'];
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$email);
		$recordSet = $this->db->get();
       
	   //echo $this->db->last_query();
       echo $recordSet->num_rows();
	}
	
	function checkUserExistLogin($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$recordSet = $this->db->get();
       
	   //echo $this->db->last_query();
       echo $recordSet->num_rows();
	}
	
	
	function getMessageList()
	{
		$user_id = $this->session->userdata('user_id');
		//$query = "select * from message where message_from=".$user_id." OR message_to=".$user_id." group by message_from";
		
		$query = "select m1.*,u1.id as user_id, u1.first_name,u1.last_name,u1.image from message m1 left join users u1 on m1.message_from=u1.id where m1.id in (select max(message_id) as  message_id from ((select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_to=u.id where message_from=".$user_id." group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_from=u.id where message_to=".$user_id." group by message_from)) as messages group by user_id)";		
		
		$recordSet = $this->db->query($query);
		
		return $recordSet->result();
	
	
	//select * from message where message_from=4 OR message_to=4 group by message_from
	//(select * from message where message_from=4 group by message_from) union (select * from message where message_to=4 group by message_to) order by id asc
	
	//(select * from message where message_from=4 group by message_to) union (select * from message where message_to=4 group by message_from) order by id asc
	
	//(select * from message where message_from=4 group by message_to) union (select * from message where message_to=4 AND message_from not in(select message_to from message where message_from=4 group by message_to) group by message_from)
	
	//(select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from) order by id
	
	//select * from ((select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages order by id
	
	// select max(message_id) as  m, messages.* from ((select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id order by created
	
	// select max(message_id) as  message_id,first_name,last_name from ((select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id order by created
	
	//select * from message where id in (select max(message_id) as  message_id from ((select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id)
	
	//select * from message where id in (select max(message_id) as  message_id from ((select max(m.id) as message_id,m.*,u.id as user_id,u.first_name,u.last_name from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id ,u.first_name,u.last_name from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id)
	
	//select * from message where id in (select max(message_id) as  message_id from ((select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id)
	
	// select m1.*,u1.id as user_id, u1.first_name,u1.last_name from message m1 left join users u1 on m1.message_from=u1.id where m1.id in (select max(message_id) as  message_id from ((select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_to=u.id where message_from=4 group by message_to) union (select max(m.id) as message_id,m.*,u.id as user_id from message m left join users u on m.message_from=u.id where message_to=4 group by message_from)) as messages group by user_id)
	
	}
	
	function getAllMessages($id)
	{
	
		$user_id = $this->session->userdata('user_id');
		
		$query = "(select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name,u.image from message m left join users u ON m.message_from=u.id where message_from=".$id." AND message_to=".$user_id.") UNION (select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name,u.image from message m left join users u ON m.message_to=u.id where message_from=".$user_id." AND message_to=".$id.") order by message_id desc";
		
		
		$recordSet = $this->db->query($query);
		
		return $recordSet->result();
		
		//(select m.* from message m where message_from=2 AND message_to=4) UNION (select m.* from message m where message_from=4 AND message_to=2)
		
		//(select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name,u.image from message m left join users u ON m.message_from=u.id where message_from=2 AND message_to=4) UNION (select m.id as message_id,m.*,u.id as user_id,u.first_name,u.last_name,u.image from message m left join users u ON m.message_to=u.id where message_from=4 AND message_to=2) order by message_id
		
		
	}
	
	function getUsersListMessage()
	{
		$query = "select id,first_name,last_name,email from users where is_active='1'";
		$recordSet = $this->db->query($query);
		
		$results = $recordSet->result();
		
		//print_r($results); exit;
		
		$response = '';
		foreach($results as $responseData)
		{
			$response .= '<option value="'.$responseData->id.'">'.$responseData->first_name.' '.$responseData->last_name.'</option>';
		}
		//$response .= '</select>';
		
		echo $response;
		
		//echo 'asda';
	
	}
	
	
	function deleteMessage($message_id)
	{
		$this->db->where('id',$message_id);
		$this->db->delete('message');
	}
	
	function sendMessage($formData)
	{
		$user_id = $this->session->userdata('user_id');
		
		$data['message_from'] = $user_id;
		$data['message_to'] = $formData['message_to_box'];
		$data['message'] = $formData['instructor_message_box'];
		
		$this->db->insert('message',$data);
	}
	
	function saveMessage($formData)
	{
		$user_id = $this->session->userdata('user_id');
		
		$data['message_from'] = $user_id;
		$data['message_to'] = $formData['message_to'];
		$data['message'] = $formData['text_message'];
		
		$this->db->insert('message',$data);
		
	}
	
	
	function courseInstructorDetails($instructor_id)
	{
		//$query = "select u.id,u.first_name,u.last_name,u.email,u.image as user_image,u.designation,u.show_courses,c.id as course_id,c.title,c.image,c.price,count(t.id) as total_taking,r.counter as total_review,r.value as total_rating from users u left join courses c ON u.id=c.user_id LEFT JOIN taking t on t.course_id=c.id left join rating r on r.course_id=c.id where u.id=".$user_id." AND c.is_private='0' AND c.publish='1' AND c.is_approved='1' group by c.id";
		
		// logged in user id
		$user_id = $this->session->userdata('user_id');
		
		$query = "select u.id,u.first_name,u.last_name,u.email,u.image as user_image,u.designation,u.show_courses,c.id as course_id,c.title,c.image,c.price,count(t.id) as total_taking,r.counter as total_review,r.value as total_rating,f.id as follow_id from ((((users u left join courses c ON u.id=c.user_id AND c.is_private='0' AND c.publish='1' AND c.is_approved='1') LEFT JOIN taking t on t.course_id=c.id) left join rating r on r.course_id=c.id) left join followers f on f.following_id=u.id AND follower_id=".$user_id.") where u.id=".$instructor_id." group by c.id";
		
		
		$recordSet = $this->db->query($query);
		
		return $recordSet->result();
	
	}
	
	function courseTaking($instructor_id)
	{
		
		$query = "select u.id as user_id,u.first_name,u.last_name,u.email,u.image as user_image,u.designation,c.id as course_id,c.title,c.image,c.price,count(t.id) as total_taking,r.counter as total_review,r.value as total_rating from (((users u left join courses c ON u.id=c.user_id AND c.is_private='0' AND c.publish='1' AND c.is_approved='1') LEFT JOIN taking t on t.course_id=c.id) left join rating r on r.course_id=c.id) where c.id in (select course_id from taking where user_id=".$instructor_id.") group by c.id";
		
		$recordSet = $this->db->query($query);
		
		return $recordSet->result();
		
	}
	
	
	
	function follow($action,$follower_id,$following_id)
	{
		if($action == 'add')
		{
			$data['follower_id'] = $follower_id;
			$data['following_id'] = $following_id;
			
			$this->db->insert('followers',$data);
		}
		else
		{
			$this->db->where('follower_id',$follower_id);
			$this->db->where('following_id',$following_id);
			$this->db->delete('followers');
		}
	}
	
	function saveInstructorMessage($formData)
	{
		$user_id = $this->session->userdata('user_id');
		
		$data['message_from'] = $user_id;
		$data['message_to'] = $formData['message_to_instructor'];
		$data['message'] = $formData['text_message_instructor'];
		
		$this->db->insert('message',$data);
		
	}
	
	// course purchased
	function transactionDetailsPurchased($user_id)
	{
		$query = "select t.*,c.title from courses c left join transactions t ON c.id=t.course_id where t.user_id=".$user_id;
		$recordSet = $this->db->query($query);
		return $recordSet->result();
		//select t.*,c.title from courses c left join transactions t ON c.id=t.course_id where t.user_id=4
		
	}
	
	// course sold
	function transactionDetailsSold($user_id)
	{
		$query = "select t.*,c.title,u.first_name,u.last_name from ((courses c right join transactions t ON c.id=t.course_id) left join users u ON u.id=t.user_id) where c.user_id=".$user_id;
		$recordSet = $this->db->query($query);
		return $recordSet->result();
		//select t.*,c.title,u.first_name,u.last_name from ((courses c right join transactions t ON c.id=t.course_id) left join users u ON u.id=t.user_id) where c.user_id=4
	}
	
}
?>