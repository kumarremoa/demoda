<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct()
     {
            parent::__construct();
            // Your own constructor code
			$this->load->library('email');
     }
	
			
	public function index()
	{
		$this->account();
	}
	
	
	// show user cart
	public function cart()
	{
		// get cart product details
		$data['cart'] = $this->Usermodel->getCartData();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];		
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/cart',$data);
		$this->load->view('template/footer');
	}
	
	
	function updateCart()
	{
		//echo '<pre>'; print_r($_POST);		
		
		if($this->Usermodel->updateCart($_POST))
		{
			$this->session->set_userdata('msg','Cart has been updated.');
		}
		else
		{			
			$this->session->set_userdata('msg','Product is not available in required quantity.');
		}
		
		redirect('user/cart');
				
	}
	
	// remove cart item, check user ip before deleting cart item
	function removeCartItem($id)
	{
		if($this->Usermodel->removeCartItem($id))
		{
			$this->session->set_userdata('msg','Cart has been updated.');
		}
		else
		{			
			$this->session->set_userdata('msg','Can not remove item.');
		}
		
		redirect('user/cart');
	}
	
	// make user cart empty
	function emptyCart()
	{
		$this->Usermodel->emptyCart();
		$this->session->set_userdata('msg','Cart has been updated.');
		redirect('user/cart');
	}
	
	// proceed to checkout form
	public function checkout()
	{		
		
		if(isset($_POST['checkout']))
		{
			$order_id = $this->Usermodel->createOrder($_POST);
			
			if($_POST['payment_method'] == 'paypal')
				redirect('paypal/payment/'.$order_id); // redirect to paypal to make payment
			else if($_POST['payment_method'] == 'authorize_net')
				redirect('authorize/payment/'.$order_id); // redirect to authorized_net to make payment
			else
			{
				// send invoice
				$this->sendInvoice($order_id);
				
				//redirect('user/thankyou'); // redirect to thank you page if payment method is cod
			}
				
		}
		
		// get user details
		if($this->session->userdata('user_id'))
		{
			$logged_in_userid = $this->session->userdata('user_id');
			$data['user_details'] = $this->Usermodel->userDetails($logged_in_userid);
		}
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/checkout');
		$this->load->view('template/footer');
	}
	
	public function thankyou()
	{
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
				
		$this->load->view('template/header',$data);
		$this->load->view('user/thankyou');
		$this->load->view('template/footer');
	}
	
	public function errorPayment()
	{
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
				
		$this->load->view('template/header',$data);
		$this->load->view('user/errorPayment');
		$this->load->view('template/footer');
	}
	
	
	// show user signup
	public function signup()
	{	
		if(sizeof($_POST) > 0)
		{
			if($this->Usermodel->registerUser($_POST))
				redirect('user/account');
			else
			{
				$this->session->set_userdata('msg','Email already exist.');
				redirect('user/signup');	
			}
		}
			
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/signup');
		$this->load->view('template/footer');
	}
	
	function account()
	{
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();
		/*if($this->Usermodel->isLoggedIn())
			echo $this->session->userdata('user_id');
		else
		{
			echo 'not logged in';	exit;
		}*/
		
		if(sizeof($_POST) > 0)
		{
			if($this->Usermodel->updateProfile($_POST))
			{
				$this->session->set_userdata('msg','Account details has been updated.');
			}
			else
			{
				$this->session->set_userdata('msg','Email already exist.');	
			}
			
			redirect('user/account');
		}
		
		// get user details
		$logged_in_userid = $this->session->userdata('user_id');
		$data['user_details'] = $this->Usermodel->userDetails($logged_in_userid);
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/account',$data);
		$this->load->view('template/footer');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');	
	}
	
	function signin()
	{
		if(sizeof($_POST) > 0)
		{
			if($this->Usermodel->userLogin($_POST))
				redirect('user/account');
			else
			{
				$this->session->set_userdata('msg','Invalid email or password.');
				redirect('user/signin');
			}
		}
			
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/signin');
		$this->load->view('template/footer');	
	}
	
	function forgotPassword()
	{
		if(sizeof($_POST) > 0)
		{
			if($this->Usermodel->sendPassword($_POST))
			{
				$this->session->set_userdata('msg','Password has been sent to '.$_POST['email'].'.');
				redirect('user/signin');
			}
			else
			{
				$this->session->set_userdata('msg','Email does not exist.');
				redirect('user/forgotPassword');
			}
		}
			
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/forgot-password');
		$this->load->view('template/footer');
	}
	
	
	// subscribe to newsletter
	function subscribe()
	{
		if($this->Usermodel->subscribe($_POST))
			$this->session->set_userdata('msg','Thank you for subscribe with us.');
		else
			$this->session->set_userdata('msg','Already a subscriber.');
		
		redirect('home');
		
	}
	
	
	// add product to wishlist
	function addToWishlist($product_id,$request_from_page=NULL)
	{		
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();
		
		if($this->Usermodel->addToWishlist($product_id))		
			$this->session->set_userdata('msg','Item has been added to wishlist.');
		else
			$this->session->set_userdata('msg','Already in wishlist.');
			
		if(!$request_from_page)	
			redirect('product/description/'.$product_id);		
		else if($request_from_page == 'home')
			redirect('home');
		else if($request_from_page == 'search')
			redirect('product/search');	
	}
	
	// delete product from wishlist
	function deleteWishlist($product_id,$request_from_page=NULL)
	{		
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();
		
		if($this->Usermodel->deleteWishlist($product_id))		
			$this->session->set_userdata('msg','Item has been deleted from wishlist.');
		else
			$this->session->set_userdata('msg','Not in wishlist.');
		
		if(!$request_from_page)	
			redirect('product/description/'.$product_id);
		else if($request_from_page == 'wishlist')
			redirect('user/'.$request_from_page);
		else if($request_from_page == 'home')
			redirect('home');
		else if($request_from_page == 'search')
			redirect('product/search');	
	}
	
	
	function wishlist()
	{
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();		
		
		// array of wishlisted product ids to get total wishlist items
		$arr_wishlist_product_ids = $this->Usermodel->getWishlistProductIds();
		
		
		if(isset($_POST['short_by']) || isset($_POST['per_page']))
		{
			$this->session->set_userdata('short_by',$_POST['short_by']);
			$this->session->set_userdata('per_page',$_POST['per_page']);		
		}
		else if(!$this->session->userdata('per_page'))
		{
			$this->session->unset_userdata('short_by');
			$this->session->unset_userdata('per_page');
		}
		
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'user/wishlist/';
		$config['total_rows'] = sizeof($arr_wishlist_product_ids); // total records to paginate
		$config['per_page'] = ($this->session->userdata('per_page')) ? $this->session->userdata('per_page') : 12;;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		
		
		$this->pagination->initialize($config);		
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;
		
		$logged_in_userid = $this->session->userdata('user_id');
		$data['user_wishlist'] = $this->Usermodel->getWishlist($logged_in_userid,$config['per_page'],$start); // paginated records
		
        $data['links'] = $this->pagination->create_links();
		
		// end pagination		
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/wishlist');
		$this->load->view('template/footer');
		
		
	}
	
	function orders()
	{
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();
			
		$logged_in_userid = $this->session->userdata('user_id');		
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'user/orders/';
		$config['total_rows'] = $this->Usermodel->getTotalOrders($logged_in_userid); // total records to paginate
		$config['per_page'] = 12;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		
		
		$this->pagination->initialize($config);		
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;		
		
		$data['orders'] = $this->Usermodel->getOrders($logged_in_userid,$config['per_page'],$start); // paginated records
		
        $data['links'] = $this->pagination->create_links();
		
		// end pagination
		
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/orders');
		$this->load->view('template/footer');
		
	}
	
	
	function orderDetails($order_id)
	{
		// check if user is logged in (authenticated access)
		$this->Usermodel->isLoggedIn();
		
		$data['orderDetails'] = $this->Usermodel->getOrderDetails($order_id);
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/order-details');
		$this->load->view('template/footer');
	}
	
	
	// generate pdf invoice and download/mail invoice
	public function pdf($order_id = null,$action = null)
	{
		if($order_id == null)
			$order_id = $this->uri->segment(3);
			
		if($action == null)
			$action = $this->uri->segment(4);
		
		// generate pdf
		$this->load->helper(array('dompdf', 'file'));
		$this->load->library('email');
		$this->load->helper('email');
		
		$file_path  = $_SERVER['DOCUMENT_ROOT'].'/demo/invoice/';
		//$file_path  = $_SERVER['DOCUMENT_ROOT'].'/zippy/invoice/';
		
		 // page info here, db calls, etc. 		
		
		// get details to print in pdf
		$data['orderDetails'] = $this->Usermodel->getOrderDetails($order_id);
		$buyer_details = $data['orderDetails'][0];
		//echo '<pre>'; print_r($data); exit;		
		
		if($action == 'invoice_to_buyer' || $action == 'invoice_to_zpLoft' || $action == 'download')
		{
			$html = $this->load->view('pdf_template/template-buyer',$data, true);	
			$file_name = 'invoice_'.$order_id.'.pdf';
			//echo $html; exit;
			// generate invoice if not exist
			if(!file_exists($file_path.$file_name))
				exportMeAsMPDF($html, $file_name,$file_path);
			
		}
		
		if($action == 'invoice_to_vendor')
		{
			// send invoice to multiple vendors (vendor of each product sold)
			$i = 1;
			foreach($data['orderDetails'] as $product)
			{				
				//echo '<pre>'; print_r($product);
				$details['orderDetails'][0] = $product;
				
				$html = $this->load->view('pdf_template/template-vendor',$details, true);
				$file_name = 'vendor_'.$i.'_invoice_'.$order_id.'.pdf';
				
				$i++;
				
				// generate invoice if not exist
				if(!file_exists($file_path.$file_name))
					exportMeAsMPDF($html, $file_name,$file_path);
				
				
			}
			
		}			
		
		// end pdf generate		 
	
		// mail invoice
		if($action == 'invoice_to_buyer')
		{			
			// send mail to buyer
			//$to = 'abhishek_f2k2@yahoo.com';
			//$to_name = 'abhishek';
			//echo '<pre>';
			//print_r($data); exit;
			
			$mail_content = $this->Usermodel->getMailContent('invoice_mail_to_buyer');
			//print_r($mail_content); exit;
			
			$to = $buyer_details->email;
			$to_name = ucwords($buyer_details->first_name.' '.$buyer_details->last_name);
						
			//$arr_keywords = array('student_name','father_name','center_name','student_organisation','start_date','end_date','project_name','supervisor_name','technology_name','certificate_number','authorizer_name');
			//$student_data = array(ucwords($name),ucwords($father_name),$center_name,$organisation,$start_date,$end_date,$project_name,$supervisor_name,$technology,$certificate_number,ucwords($authorizer_name));
			
			
			//$from = 'support@zploft.com';
			$from = 'abhishek@gmail.com';
			$from_name = 'ZPLOFT';
			
			$subject = "Invoice";
			$message = "Dear ".$to_name."<br>";
			//$message = str_replace($arr_keywords,$student_data,$certificate_template[0]->mail_text);
			$message .= $mail_content->content;
			
			//echo $message; exit;
			//$this->email->initialize($config);
			$this->email->clear(TRUE);
			$this->email->from($from, $from_name);
			$this->email->to($to,$to_name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach($file_path.$file_name);
			$this->email->set_mailtype('html');
			//$this->email->send();
			
			if($this->email->send())
			{
				// delete invoice from server
				unlink($file_path.$file_name);
			}
			/*else
			{
				show_error($this->email->print_debugger());                
			}*/	
			
			//$this->session->set_userdata('msg','Certificates has been sent.');
			//redirect('/student/listStudents');
			
		}
		
		if($action == 'invoice_to_zpLoft')
		{
			// send mail to zploft admin
			
			$mail_content = $this->Usermodel->getMailContent('invoice_mail_to_zpLoft');
			//print_r($mail_content); exit;
			
			//$to = 'admin@zploft.com';
			//$to = 'pragat543@gmail.com';
			$to = 'varsha@sagipl.com';
			$to_name = 'Admin';
			
			//$from = 'support@zploft.com';
			$from = 'abhishek@gmail.com';
			$from_name = 'ZPLOFT';
			
			$subject = "Invoice";
			$message = "Hello ".$to_name."<br>";
			$message .= $mail_content->content;			
				
			$this->email->clear(TRUE);
			$this->email->from($from, $from_name);
			$this->email->to($to,$to_name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->attach($file_path.$file_name);
			$this->email->set_mailtype('html');
			//$this->email->send();
			
			if($this->email->send())
			{
				// delete invoice from server
				unlink($file_path.$file_name);
			}
		
		}
		
		if($action == 'invoice_to_vendor')
		{
			// send mail to vendor
			
			$mail_content = $this->Usermodel->getMailContent('invoice_mail_to_vendor');
			//print_r($mail_content); exit;
			
			
			$from = 'abhishek@gmail.com';
			$from_name = 'ZPLOFT';
			
			$subject = "Invoice";			
			
			$i = 1;
			// send mail to multiple vendors
			foreach($data['orderDetails'] as $product)
			{				
				$file_name = 'vendor_'.$i.'_invoice_'.$order_id.'.pdf';				
				$i++;
				
				$to = $product->vendor_email;
				$to_name = $product->vendor_name;	
				
				$message = "Dear ".$to_name."<br>";
				$message .= $mail_content->content;	
				
				$this->email->clear(TRUE);
				$this->email->from($from, $from_name);
				$this->email->to($to,$to_name);
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->attach($file_path.$file_name);
				$this->email->set_mailtype('html');
				//$this->email->send();
				
				if($this->email->send())
				{
					// delete invoice from server
					unlink($file_path.$file_name);
				}
				
			}
						
			
		}
		if($action == 'download')
		{
			//download invoice
			$this->load->helper('file');
	
			$mime = get_mime_by_extension($file_path.$file_name);
		
			// Build the headers to push out the file properly.
			header('Pragma: public');     // required
			header('Expires: 0');         // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_path.$file_name)).' GMT');
			header('Cache-Control: private',false);
			header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
			header('Content-Disposition: attachment; filename="'.basename($file_path.$file_name).'"');  // Add the file name
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.filesize($file_path.$file_name)); // provide file size
			header('Connection: close');
			readfile($file_path.$file_name); // push it out
			
			//unlink($file_path.$file_name);
			exit;
		}			
			
		
	}
	
	
	function sendInvoice($order_id)
	{
		$this->pdf($order_id,'invoice_to_buyer');  // send invoice to buyer
		$this->pdf($order_id,'invoice_to_zpLoft');  // send invoice to zpLoft
		$this->pdf($order_id,'invoice_to_vendor'); // send invoice to vendor
		
		redirect('user/thankyou');	
	}
	
	function trackOrder()
	{		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/track-order');
		$this->load->view('template/footer');
	}
	
	function orderStatus()
	{
		$data['status'] = $this->Usermodel->getOrderStatus($_POST['order_id']);
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		$this->load->view('template/header',$data);
		$this->load->view('user/order-status',$data);
		$this->load->view('template/footer');
			
	}
	
	
	//http://stackoverflow.com/questions/19315380/how-to-setup-codeigniter-multi-language-support
	function lang_check()
	{
		$this->load->helper('language');
		
		// Change the 'en' key to 'ml' for change the language
		$this->lang->load("site", 'egypt');
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		$this->load->view('template/header',$data);
		$this->load->view('check_lang');
		$this->load->view('template/footer');
	}
	
	
		
}
