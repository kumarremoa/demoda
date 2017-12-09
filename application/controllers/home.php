<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
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
			$this->load->model('Homemodel');
			
			parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
			$CI = & get_instance();
			$CI->config->load("facebook",TRUE);
			$config = $CI->config->item('facebook');
			$this->load->library('Facebook', $config);			
					
     }
	   
		
	public function index()
	{		
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
		$data['seoData']  = $this->getSeoHomeComponents();
		
		// load home.php
		// $this->load->view('home/index.html');
		$this->load->view('template/header_new',$data);
		$this->load->view('home/home',$data);
		$this->load->view('template/footer_new');
	}
	
	public function user($any , $num)
	{
		echo $any;
		echo $num;
		die('eci');
	}
	
	// show static page
	public function page($page_id)
	{		
		try{
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
			
			$this->load->view('template/header_new',$data);
			// $this->load->view('pages/size-n-fit',[]);
			$this->load->view('home/static-page',$data);
			$this->load->view('template/footer_new');
		} catch(Exception $e){
			show_404();
		}
	}

	public function getSeoHomeComponents()
	{
		$seoData = [
			'title' => 'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear',
			'description' => 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.'
			];
			return $seoData;
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */