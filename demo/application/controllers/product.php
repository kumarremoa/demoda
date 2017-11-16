<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller {
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
			
     }
	
			
	public function index()
	{
		//$this->listProducts();
	}
	
	
	public function addToCart()
	{
		//print_r($_POST); exit;
		// add product to cart		
		$this->Productmodel->addToCart($_POST);
	
		
		redirect('user/cart');
		
	}
	
	public function description($product_id)
	{
		//echo $product_id;
		
		$data['product_details'] = $this->Productmodel->getDetails($product_id);
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// related products
		$data['related_products'] = $this->Productmodel->getRelatedProducts($product_id);
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
								
		$this->load->view('template/header',$data);
		$this->load->view('product/description',$data);
		$this->load->view('template/footer');		
	}
	
	
	/*function search()
	{
		//echo $_POST['keyword'].'~~~'; exit;
		//if(!$this->session->userdata('keyword'))
		if(isset($_POST['keyword']))
		{
			$keyword = $_POST['keyword'];
			$this->session->set_userdata('keyword',$keyword);
		}
		else
			$keyword = $this->session->userdata('keyword');
			
		$data['search_results'] = $this->Productmodel->search($keyword);
		
		// total ordered amount
		$total_amount = $this->Usermodel->total_order_amount();				
		$data['total_amount'] = $total_amount;
						
		$this->load->view('template/header',$data);
		$this->load->view('product/search-results',$data);
		$this->load->view('template/footer');
	}*/
	
	
	function search()
	{
		
		//echo $_POST['keyword'].'~~~'; exit;
		//if(!$this->session->userdata('keyword'))
		if(isset($_POST['keyword']))
		{
			$keyword = $_POST['keyword'];
			$this->session->set_userdata('keyword',$keyword);
		}
		else
			$keyword = $this->session->userdata('keyword');
			
		
		if(isset($_POST['short_by']) || isset($_POST['per_page']))
		{
			$this->session->set_userdata('short_by',$_POST['short_by']);
			$this->session->set_userdata('per_page',$_POST['per_page']);		
		}
		else if(!$this->session->userdata('per_page'))
		{
			$this->session->unset_userdata('short_by');
			$this->session->unset_userdata('per_page');
		}
		
		// pagination
		// http://ellislab.com/codeigniter/user-guide/libraries/pagination.html
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'product/search/';
		$config['total_rows'] = $this->Productmodel->total_results($keyword); // total records to paginate
		$config['per_page'] = ($this->session->userdata('per_page')) ? $this->session->userdata('per_page') : 12;
		$config['uri_segment'] = 3;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		
		
		$this->pagination->initialize($config);		
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;
		
		$data['search_results'] = $this->Productmodel->search($keyword,$config['per_page'],$start); // paginated records
		
        $data['links'] = $this->pagination->create_links();
		
		// end pagination
			
		$data['total_results_found'] = $config['total_rows'];
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
						
		$this->load->view('template/header',$data);
		$this->load->view('product/search-results',$data);
		$this->load->view('template/footer');
	}
	
	
	// list products by category
	function category($category_id)
	{	
	
		if(isset($_POST['short_by']) || isset($_POST['per_page']))
		{
			$this->session->set_userdata('short_by',$_POST['short_by']);
			$this->session->set_userdata('per_page',$_POST['per_page']);		
		}
		else if(!$this->session->userdata('per_page'))
		{
			$this->session->unset_userdata('short_by');
			$this->session->unset_userdata('per_page');
		}
		
		// pagination
		// http://ellislab.com/codeigniter/user-guide/libraries/pagination.html
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'product/category/'.$category_id;
		$config['total_rows'] = $this->Productmodel->total_category_products($category_id); // total records to paginate
		$config['per_page'] = ($this->session->userdata('per_page')) ? $this->session->userdata('per_page') : 12;
		$config['uri_segment'] = 4;
		//$config['num_links'] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		
		
		$this->pagination->initialize($config);		
		
		$page = ($this->uri->segment(4) != '') ? $this->uri->segment(4) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;
		
		$data['results'] = $this->Productmodel->product_by_category($category_id,$config['per_page'],$start); // paginated records
		
        $data['links'] = $this->pagination->create_links();
		
		// end pagination
			
		$data['total_results_found'] = $config['total_rows'];
		
		// get category name
		$data['category_bread_crumb'] = $this->Productmodel->getCategoryName($category_id);
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
								
		$this->load->view('template/header',$data);
		$this->load->view('product/category-products',$data);
		$this->load->view('template/footer');
	}
	
	public function listType()
	{
		$this->session->set_userdata('list_type',$_POST['list_type']);
		redirect($_POST['redirect_uri']);
	}
	
}
