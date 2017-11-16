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
			$this->load->model('Loginmodel');
			$this->load->model('Usermodel');
			$this->load->helper('form');			
     }
	
			
	public function index()
	{
		$this->dashboard();
	}
	
	
	public function dashboard()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('user/dashboard');
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to logout user
	 */
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
	
	/**
	 * This function is to display admin account
	 */
	public function account()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// get loggedin admin id from session
		$admin_id = $this->session->userdata('admin_user_id');
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		
		// Get all user list
		$adminData['admin_details'] = $this->Usermodel->getAdmin($admin_id);
		
		$this->load->view('template/header',$data);
		$this->load->view('user/admin-account',$adminData);
		$this->load->view('template/sidebar');
	}
	
	
	/**
	 * This function is to update Admin user
	 */
	public function updateAdminUser()
	{
	
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Usermodel->updateAdminUserData($_POST);
		
		$id = $_POST['id']; // Logged in admin user id
		
		$this->session->set_userdata('msg','Account Details has been updated successfully.');
		redirect('/user/account/'.$id);
	
	}
	
}
