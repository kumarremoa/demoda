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
	{		die;
		// banner images
		$data['slider_images'] = $this->Homemodel->getSliderImages();
		
		// new products
		$data['productDetails'] = $this->Productmodel->getAllProducts();
		
		// featured products
		$data['featuredProductDetails'] = $this->Productmodel->getFeaturedProducts();
		
		// special products
		$data['specialProductDetails'] = $this->Productmodel->getSpecialProducts();
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		
		// load home.php
		$this->load->view('template/header',$data);
		$this->load->view('home/home',$data);
		$this->load->view('template/footer');
	}
	
	
	// show static page
	public function page($page_id)
	{		
		$data['pageData'] = $this->Homemodel->getStaticPageContent($page_id);

		// show 404 error page if id does not exist in database
		if(sizeof($data['pageData']) == 0)
			show_404();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
				
		$this->load->view('template/header',$data);
		$this->load->view('home/static-page',$data);
		$this->load->view('template/footer');
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */