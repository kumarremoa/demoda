<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller {
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
			//$this->load->model('Usermodel');		
			$this->load->model('Paypalmodel');
     }
	
	/**
	 * This function is to proceed to checkout
	 * get products from temporary cart (cart table) on the basis of user's ip
	 * make entry of products in orders table
	 * take user to paypal to make payment
	 */
	/*public function checkout($ip)
	{
		
		//echo '<pre>';
		//print_r($_POST); exit;
		
		// get course details
		$data['orderDetails'] = $this->Paypalmodel->orderDetails($ip);
				
		// save course as taking
		$this->Paypalmodel->saveTaking($_POST);
		
		// save course as taking
		$transaction_id = $this->Paypalmodel->saveTransaction($data);
				
		// redirect to paypal to make payment
		$this->payment($course_id,$transaction_id);
	}
	*/
	
	// this function is to redirect to paypal with product details
	public function payment($order_id)
	{
		
		// check user is loggedin or not
		//$this->Usermodel->isLoggedIn();
		
		//$data['user_name'] = $this->session->userdata('admin_user_name');
		//$this->load->view('template/header',$data);
		
		// get order details
		$data['orderDetails'] = $this->Paypalmodel->orderDetails($order_id);
		//$data['order_id'] = $order_id;
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		$this->load->view('template/header',$data);
		//$this->load->view('course/course-sidebar',$data);
		$this->load->view('paypal/payment',$data);
		//$this->load->view('template/footer');
		$this->load->view('template/sidebar');
	
	}
	
	public function paypalResponse()
	{
		//echo '<pre>';
		//print_r($_POST);
		
		if(isset($_POST['payment_status']) && $_POST['payment_status'] == 'Completed')
		{
			$this->Paypalmodel->updatePaymentStatus($_POST);
			
			$order_id = $_POST['custom'];
			
			// reduce product's available quantity
			$this->Paypalmodel->reduceAvailableQuantity($order_id);
			
			// send invoice
			redirect('user/sendInvoice/'.$order_id);
			
			//redirect('user/thankyou');	
			
		}
		else
		{
			redirect('user/errorPayment');
		}
		
		
		
	}
	
	
	
	function checkRedirect($order_id)
	{
		redirect('user/sendInvoice/'.$order_id);
			//redirect('user/thankyou');	
	}
	
	/*public function reduceAvailableQuantity($order_id)
	{
		$this->Paypalmodel->reduceAvailableQuantity($order_id);	
	}*/
	
		
}
