<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

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
		$this->load->model('Ordersmodel');
		$this->load->model('Usermodel');
	}
	
			
	public function index()
	{
		$this->listOrders();
	}
		
	/**
	 * This function is to display all orders
	 */	
	public function listOrders()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get products List
		$orders['order_details'] = $this->Ordersmodel->orders();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('orders/list-orders',$orders);
		$this->load->view('template/sidebar');
				
	}
	
	// get order details
	function details($order_id)
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get products List
		$orders['order_details'] = $this->Ordersmodel->order_details($order_id);
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('orders/order-details',$orders);
		$this->load->view('template/sidebar');
	}
	
	function updateDeliveryStatus($status,$order_id)
	{
		$this->Ordersmodel->updateDeliveryStatus($status,$order_id);
		
		echo 'Delivery Status has been updated.';
	}
	
	function traceOrder()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get products List
		$orders['order_details'] = $this->Ordersmodel->orders();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('orders/trace-orders',$orders);
		$this->load->view('template/sidebar');
	}
	
}
