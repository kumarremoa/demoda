<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
			$this->load->model('Vendormodel');
			$this->load->model('Usermodel');					
     }
	
			
	public function index()
	{
		$this->listVendors();
	}	
	
	/**
	 * This function is to display add vendor form
	 */
	public function addVendor()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('vendor/add-vendor');
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to add vendor
	 */
	public function saveVendor()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Vendormodel->saveVendorData($_POST);
		
		$this->session->set_userdata('msg','Vendor has been added.');
		redirect('/vendor/addVendor');
	}
	
	
	/**
	 * This function is to display all listVendors
	 */	
	public function listVendors()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get vendors List
		$vendors['vendor_details'] = $this->Vendormodel->vendors();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('vendor/list-vendors',$vendors);
		$this->load->view('template/sidebar');
				
	}
	
	
	/**
	 * This function is to display edit vendor form
	 */
	public function editVendor($vendor_id)
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();		
		
		// Get vendor data
		$vendor_data['vendor_details'] = $this->Vendormodel->getDetails($vendor_id);
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('vendor/edit-vendor',$vendor_data);
		$this->load->view('template/sidebar');
	}
	
	
	/**
	 * This function is to update vendor
	 */
	public function updateVendor()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Vendormodel->updateVendor($_POST);
		
		$id = $_POST['id']; // vendor id		
		
		$this->session->set_userdata('msg','Vendor has been updated.');
		redirect('/vendor/editVendor/'.$id);
	}
	
	public function deleteVendor($id)
	{
		//echo $id; exit;
		$this->Vendormodel->deleteVendor($id);
		$this->session->set_userdata('msg','Vendor has been deleted.');
		redirect('/vendor/listVendors/');
	}
	
	
}
