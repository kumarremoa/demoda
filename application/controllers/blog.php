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
     }
	   
		
	public function index()
	{	
		$data['newsData'] = $this->Blogmodel->getallBlogs();		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'blog';
		$config['total_rows'] = $this->Blogmodel->total_articles(); // total records to paginate
		$config['per_page'] = 1;
		$config['uri_segment'] = 2;
		//$config['num_links'] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		$page = ($this->uri->segment(2) != '') ? $this->uri->segment(2) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;
		
		$data['results'] = $data['newsData'] = $this->Blogmodel->getallBlogs($config['per_page'],$start);
		$this->pagination->initialize($config);
		//echo"<pre>";print_r($this->pagination->create_links());die;
		$data['links'] = $this->pagination->create_links();
		
		// load home.php
		$this->load->view('template/header_new',$data);
		$this->load->view('blog/list-blogs',$data);
		$this->load->view('template/footer_new');
	}
	
	
	// show static page
	public function detail($link_rewrite)
	{		
		$data['newsData'] = $this->Blogmodel->getBlogContent($link_rewrite);

		// show 404 error page if id does not exist in database
		if(sizeof($data['newsData']) == 0)
			show_404();
		$this->Blogmodel->increaseViewCount($link_rewrite);
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
				
		$this->load->view('template/header_new',$data);
		$this->load->view('blog/blog-details',$data);
		$this->load->view('template/footer_new');
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */