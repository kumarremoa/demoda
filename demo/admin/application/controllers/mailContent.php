<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MailContent extends CI_Controller {

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
			$this->load->model('MailContentmodel');
			$this->load->model('Usermodel');
     }
	
			
	public function index()
	{
		$this->listContent();
	}
	
	
	/**
	 * This function is to display add mail content form
	 */
	public function addMailContent()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('mail_content/add-mail-content',$data);
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to add mail content
	 */
	public function saveContent()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->MailContentmodel->saveContent($_POST);	
		
		if(isset($_POST['id']))
		{
			$this->session->set_userdata('msg','Mail Content has been updated.');
			redirect('/mailContent/editContent/'.$_POST['id']);
		}
		else
		{
			$this->session->set_userdata('msg','mail Content has been added.');
			redirect('/mailContent/addMailContent');
		}
	}
	
	
	/**
	 * This function is to display all Contents
	 */	
	public function listContent()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get content List
		$contents['mail_list'] = $this->MailContentmodel->contents();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('mail_content/list-contents',$contents);
		$this->load->view('template/sidebar');
				
	}
	
	
	/**
	 * This function is called on ajax call
	 * Used to change banner/slider image status or  to delete slider image
	 */
	public function updateProduct()
	{
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		//echo $action.'~~~'.$id; exit;
		
		$this->Productmodel->userAction($action,$id);
		redirect('product/listProducts');
		
	}	
	
	
	/**
	 * This function is to display edit content form
	 */
	public function editContent($id)
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['mail_content'] = $this->MailContentmodel->getDetails($id);
				
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('mail_content/edit-mail-content',$data);
		$this->load->view('template/sidebar');
	}
	
	
	
}
