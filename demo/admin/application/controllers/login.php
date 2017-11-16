<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->library('email');
		$this->load->helper('email');		
	}
	
	
	public function index()
	{
		$this->load->view('login');
	}
	
	/**
	 * This function is to authenticate user
	 */
	public function authincate()
	{
		//$this->load->view('welcome_message');
		//echo $this->Loginmodel->checkLogin(); // checklogin is defined in model
		//print_r($this->Loginmodel->checkLogin());
		
		// get Session value
		//print_r($this->session->userdata('user_name'));
		
		// form values
		//print_r($_POST);
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($this->Loginmodel->checkLogin($username,$password))
			//echo 'true';
			redirect('/user/dashboard', 'refresh');
		else
		{
			//echo 'false';
			$this->session->set_userdata('msg','Invalid Email or Password');
			//$this->load->view('login');
			redirect('/login', 'refresh');
		}
	}
		
	
	/**
	 * This function is to send forgot password
	 */
	public function forgotPassword()
	{
		$email = $_POST['email'];
		//echo $email; exit;
		$response = $this->Loginmodel->sendPassword($email);
		
		$this->session->set_userdata('msg', $response);
		$this->load->view('login');
		//redirect('/login/forgotPassword', 'refresh');
		//echo $response;
		
	}
	
}
