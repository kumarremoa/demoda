<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

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
			$this->load->model('Bannermodel');
			$this->load->model('Usermodel');
     }
	
			
	public function index()
	{
		$this->listBanner();
	}
	
	
	/**
	 * This function is to display add category form
	 */
	public function addBanner()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('banner/add-banner');
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to add category
	 */
	public function saveBanner()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$file_name = $this->Bannermodel->saveBannerData($_FILES);
		
		
		// resize image
		$this->load->library('image_lib');
		$path = 'uploads/banner/';
		$source_path = $path.'large/'.$file_name;
		$medium_image_path = $path.'medium/'.$file_name;
		$thumb_path = $path.'small/'.$file_name;
		
		$config['image_library'] = 'gd2';		
		$config['source_image'] = $source_path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		
		// generate thumbnail
		$config['new_image'] = $thumb_path;		
		$config['width'] = 75;
		$config['height'] = 50;
		
		$this->image_lib->initialize($config);	
		if ( ! $this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
		
		// medium size image
		$config['new_image'] = $medium_image_path;
		$config['width'] = 250;
		$config['height'] = 250;
		
		$this->image_lib->initialize($config);	
		if ( ! $this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
		
		$this->session->set_userdata('msg','Banner has been added successfully.');
		redirect('/banner/addBanner');
	}
	
	
	/**
	 * This function is to display all banners
	 */	
	public function listBanner()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get Category List
		$banners['banner_details'] = $this->Bannermodel->banners();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('banner/list-banner',$banners);
		$this->load->view('template/sidebar');
				
	}
	
	
	/**
	 * This function is called on ajax call
	 * Used to change banner/slider image status or  to delete slider image
	 */
	public function updateBanner()
	{
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		
		//echo $action.'~~~'.$id; exit;
		
		$this->Bannermodel->userAction($action,$id);
		redirect('banner/listBanner');
		
	}	
	
}
