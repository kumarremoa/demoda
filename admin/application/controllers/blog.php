<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

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
			$this->load->model('Blogmodel');
			$this->load->model('Usermodel');
			$this->load->helper('form');			
     }
	
			
	public function index()
	{
		$this->bloglist();
	}
		
	
	/**
	 * This function is to display add static page form
	 */
	public function add()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		
		$this->load->view('template/header',$data);
		$this->load->view('blog/add-page');
		$this->load->view('template/sidebar');
		
	}
	
	/**
	 * This function is to update static page
	 */
	public function saveBlog()
	{
	
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Blogmodel->createBlog($_POST, $_FILES);
		
		$this->session->set_userdata('msg','Page has been added successfully.');
		redirect('/blog/add');
	
	}
	
	/**
	 * This function is to list Static Pages
	 */
	public function blogList()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$static_pages['blog'] = $this->Blogmodel->listAllBlog();
		
		$this->load->view('template/header',$data);
		$this->load->view('blog/list-pages',$static_pages);
		$this->load->view('template/sidebar');		
	}
	
	
	/**
	 * This function is to display edit static page form
	 */
	public function edit()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$page_id = $this->uri->segment(3);
		
		// Get page data
		$page_data['blog_details'] = $this->Blogmodel->getDetails($page_id);
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		
		
		$this->load->view('template/header',$data);
		$this->load->view('blog/edit-page',$page_data);
		$this->load->view('template/sidebar');
		
	}
	
	/**
	 * This function is to update static page
	 */
	public function updateBlog()
	{
	
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Blogmodel->saveBlogData($_POST, $_FILES);
		
		$id = $_POST['id']; // category id
		
		$this->session->set_userdata('msg','Page has been updated successfully.');
		redirect('/blog/edit/'.$id);
	
	}
	
	
	/**
	 * This function is to delete page
	 */
	public function deletePage()
	{
	
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$page_id = $this->uri->segment(3);
		
		$this->Blogmodel->delete($page_id);
		
		$this->session->set_userdata('msg','Page has been deleted successfully.');
		redirect('/blog/blogList');
	
	}
	
	
}
