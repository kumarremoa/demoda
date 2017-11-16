<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletters extends CI_Controller {

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
		$this->load->model('Newslettersmodel');
		$this->load->model('Usermodel');
	}
	
			
	public function index()
	{
		$this->listOrders();
	}
		
	/**
	 * This function is to display all subscribers
	 */	
	public function subscribers()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get subscribers List
		$subscribers['subscribers'] = $this->Newslettersmodel->subscribers();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('newsletter/list-subscribers',$subscribers);
		$this->load->view('template/sidebar');
				
	}
	
	function delete($id)
	{
		$this->Newslettersmodel->delete($id);
		
		$this->session->set_userdata('msg','Subscriber has been deleted.');
		redirect('/newsletters/subscribers/');
	}
		
	
}
