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
		$this->Productmodel->addToCart($_POST);
	
		
		redirect('user/cart');
		
	}
	
	public function description($link_rewrite)
	{
		//echo $product_id;
		
		$data['product_details'] = $this->Productmodel->getDetails($link_rewrite);
		// echo "<pre>";print_r($data['product_details']);die;
		//$params = ['title' => $data['product_details']->title]
		$data['seoData'] = $this->getSeoComponents($data['product_details'][0]);
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// related products
		$data['related_products'] = $this->Productmodel->getRelatedProducts($link_rewrite);
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		// echo "<pre>";print_r($data);die;
		$this->load->view('template/header_new',$data);
		$this->load->view('product/description',$data);
		$this->load->view('template/footer_new');		
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
	function category($cat_link_rewrite, $min = null ,$max = null)
	{	
		// print_r($this);die;
		
		$data['currentProduct'] = $subCatData = $this->Productmodel->getSubCatData($cat_link_rewrite);
		$data['seoData'] = $this->getSeoComponents($subCatData, 'category');
		if (isset($_POST['s'])) {
			$this->session->set_userdata('s',$_POST['s']);
		}
		if (isset($_POST['m'])) {
			$this->session->set_userdata('m',$_POST['m']);
		}
		if (isset($_POST['l'])) {
			$this->session->set_userdata('l',$_POST['l']);
		}
		if (isset($_POST['xl'])) {
			$this->session->set_userdata('xl',$_POST['xl']);
		}
		if (isset($_POST['xxl'])) {
			$this->session->set_userdata('xxl',$_POST['xxl']);
		}
		if (isset($_POST['xxxl'])) {
			$this->session->set_userdata('xxxl',$_POST['xxxl']);
		}
		if (isset($_POST['category_name'])) {
			//print_r($_POST);die;
				$this->session->set_userdata('category_name',$_POST['category_name']);
		} else {
			$this->session->unset_userdata('category_name');
		}
		// print_r($data['currentProduct']);die;
		if(isset($_POST['short_by']) || isset($_POST['per_page']))
		{ $_POST['per_page'] = isset($_POST['per_page']) ? $_POST['per_page'] : 9;
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
		$page = ($this->uri->segment(4) != '') ? $this->uri->segment(4) : 0;	// current page	
		$start = ($page > 0) ? (($page-1)*$config['per_page']) : 0;
		$params = [];
		if (!empty($min) && !empty($max)) {
			$params = [
			'price_range' => [
					'min' => $min,
					'max' => $max,
			]
		];	
		}
		$config['per_page'] = ($this->session->userdata('per_page')) ? $this->session->userdata('per_page') : 9;
		$data['results'] = $this->Productmodel->product_by_category($subCatData->id,$config['per_page'],$start, $params);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'product/category/'.$cat_link_rewrite;
		$config['total_rows'] = count($data['results']); // total records to paginate
		
		$config['uri_segment'] = 4;
		//$config['num_links'] = 1;
		$config['use_page_numbers'] = TRUE;
		$config['first_tag_open'] = '<span class="page_nav_first">';
		$config['first_tag_close'] = '</span>';
		$config['last_tag_open'] = '<span class="page_nav_last">';
		$config['last_tag_close'] = '</span>';
		
		
		$this->pagination->initialize($config);		
		
		
		
		 // paginated records
		//print_r($data['results']);die;
    $data['links'] = $this->pagination->create_links();
		
		// end pagination
			
		$data['total_results_found'] = $config['total_rows'];
		
		// get category name
		$data['category_bread_crumb'] = $this->Productmodel->getCategoryName($subCatData->id);
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		$priceRange = $this->minPriceByResult($data['results']);
		$data['featuredProductDetails'] = $this->Productmodel->getFeaturedProducts(5);
		$params = [
		'priceRange' => $priceRange,
		'results' => $data['results'],
		];
		$this->load->model('Seomodel');

		$data['seoData'] = $this->Seomodel->getSeoData($params,'category','nightware');

								
		$this->load->view('template/header_new',$data);
		$this->load->view('product/category-products',$data);
		$this->load->view('template/footer_new');
	}

		// list products by category
	function sale($cat_link_rewrite, $min = null ,$max = null)
	{	
		// print_r($this);die;
		
		$data['currentProduct'] = $subCatData = $this->Productmodel->getSubCatData($cat_link_rewrite);
		// print_r($data['currentProduct']);die;
		if(isset($_POST['short_by']) || isset($_POST['per_page']))
		{ $_POST['per_page'] = isset($_POST['per_page']) ? $_POST['per_page'] : 30;
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
		$config['base_url'] = base_url().'sale';
		$config['total_rows'] = $this->Productmodel->total_category_products($subCatData->id); // total records to paginate
		$config['per_page'] = ($this->session->userdata('per_page')) ? $this->session->userdata('per_page') : 9;
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
		$params = [];
		if (!empty($min) && !empty($max)) {
			$params = [
			'price_range' => [
					'min' => $min,
					'max' => $max,
			]
		];	
		}
		
		$data['results'] = $this->Productmodel->product_by_category($subCatData->id,$config['per_page'],$start, $params); // paginated records
		//print_r($data['results']);die;
    $data['links'] = $this->pagination->create_links();
		
		// end pagination
			
		$data['total_results_found'] = $config['total_rows'];
		
		// get category name
		$data['category_bread_crumb'] = $this->Productmodel->getCategoryName($subCatData->id);
		
		// user wishlist product ids
		$data['wishlist_product_ids'] = $this->Usermodel->getWishlistProductIds();
		
		// total ordered amount
		$cart_details = $this->Usermodel->total_order_amount();		
		$data['total_cart_items'] = $cart_details['total_cart_items'];
		$data['total_amount'] = $cart_details['total_amount'];
		
		// categories & subcategories
		$data['header_categories'] = $this->Productmodel->getAllCategories();
		$priceRange = $this->minPriceByResult($data['results']);
		$data['featuredProductDetails'] = $this->Productmodel->getFeaturedProducts(5);
		$params = [
		'priceRange' => $priceRange,
		'results' => $data['results'],
		];
		$this->load->model('Seomodel');

		$data['seoData'] = $this->Seomodel->getSeoData($params,'category','nightware');

								
		$this->load->view('template/header_new',$data);
		$this->load->view('product/category-products',$data);
		$this->load->view('template/footer_new');
	}

	
	public function listType()
	{
		$this->session->set_userdata('list_type',$_POST['list_type']);
		redirect($_POST['redirect_uri']);
	}

	public function minPriceByResult($value)
	{
		$priceArray = [] ;
		foreach ($value as $key => $value) {
			$priceArray[] = $value->price;
		}

		return [
			'min' => min($priceArray),
			'max' => max($priceArray),
		];
	}

	public function getSeoComponents($category, $type = 'product')
	{ 
		$seoData = [
			'title' => 'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear',
			'description' => 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.'
			];

		if ($type == 'product') {
			$seoData = [
				'title' => ucwords($category->title)." | ".$category->sub_category_title,
				'description' => 'Buy '.ucwords($category->title).' at '.$category->price.' only at Demodasecrets. Buy '.$category->sub_category_title.' at discounted prices and browse more '.$category->sub_category_title.' products.'
			];
		} elseif ($type == 'category') {
			$min_price = $this->Productmodel->getLowestPriceOfCategory($category->category_id);
			$min_price->price;
			switch (strtolower($category->sub_cat_link_rewrite)) {
				case 'babydoll':
					$seoData = [
						'title' => 'Buy Babydoll Lingerie at Best Price',
						'description' => 'Look sexy in the latest collection of Babydolls. Buy lingerie with premium fabric and great prices. Sleep in style with Demoda nightwears.',
					];
					break;
				case 'Night Dress':
					$seoData = [
						'title' => 'Buy Women Night Dress - Best Prices & Offers',
						'description' => 'Starting at '.$min_price->price.', shop online for women night dresses. Wide range of women sleepwear to choose from. Long Night Dresses for your comfortable sleep.',
					];
					break;
				case 'variable':
					$seoData = [
						'title' => 'Buy Babydoll Lingerie at Best Price',
						'description' => 'Shop online for women nightwear sets. Wide range of women sleepwear to choose from. Two and Three piece nightwear sets for your comfortable sleep.',
					];
					break;
					
				
				default:
					# code...
					break;
			}
				
		}
		
			return $seoData;
	}
	
}
