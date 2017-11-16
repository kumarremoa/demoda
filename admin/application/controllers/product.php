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
			$this->load->model('Productmodel');
			$this->load->model('Usermodel');
			$this->load->model('Categorymodel');
			$this->load->model('Vendormodel');
     }
	
			
	public function index()
	{
		$this->listProducts();
	}
	
	
	/**
	 * This function is to display add products form
	 */
	public function addProduct()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// get category list
		$data['category_list'] = $this->Categorymodel->getActiveCategories();
		
		// get vendors
		$data['vendors_list'] = $this->Vendormodel->vendors();
		
		// get brands
		$data['brands_list'] = $this->Productmodel->getBrands();
		
		// get colors available
		$data['colors_list'] = $this->Productmodel->getColors();
		
		// get size available
		$data['size_list'] = $this->Productmodel->getSizes();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/add-product',$data);
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to add products
	 */
	public function saveProductDetails()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Productmodel->saveProductData($_POST,$_FILES);	
		
		if(isset($_POST['product_id']))
		{
			$this->session->set_userdata('msg','Product has been updated.');
			redirect('/product/editProduct/'.$_POST['product_id']);
		}
		else
		{
			$this->session->set_userdata('msg','Product has been added.');
			redirect('/product/addProduct');
		}
	}
	
	
	/**
	 * This function is to display all products
	 */	
	public function listProducts()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get products List
		$products['product_details'] = $this->Productmodel->products();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/list-products',$products);
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
	 * This function is to display edit category form
	 */
	public function editProduct()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$product_id = $this->uri->segment(3);
		
		// get category list
		$data['category_list'] = $this->Categorymodel->getActiveCategories();
		
		// get vendors
		$data['vendors_list'] = $this->Vendormodel->vendors();
		
		// get brands
		$data['brands_list'] = $this->Productmodel->getBrands();
		
		// get colors available
		$data['colors_list'] = $this->Productmodel->getColors();
		
		// get size available
		$data['size_list'] = $this->Productmodel->getSizes();
		
		$data['product_details'] = $this->Productmodel->getDetails($product_id);
				
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/edit-product',$data);
		$this->load->view('template/sidebar');
	}
	
	public function deleteProductImage($product_id,$image_id)
	{
		$this->Productmodel->deleteProductImage($image_id);
		redirect('/product/editProduct/'.$product_id);		
	}
	
	public function setFeaturedImage($product_id,$image_id)
	{
		$this->Productmodel->setFeaturedImage($product_id,$image_id);
		redirect('/product/editProduct/'.$product_id);		
	}
	
	
	function addColor()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		
		if(isset($_POST['color_code']))
		{
			if($_POST['color_code'] != '')
			{
				$this->Productmodel->addColor($_POST['color_code']);
				$this->session->set_userdata('msg','Color has been added.');
			}
			else
			{
				$this->session->set_userdata('msg','Color must be selected.');
			}
			redirect('/product/addColor/');	
		}
		
		// get available colors
		$data['color_list'] = $this->Productmodel->getColors();
								
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/add-color',$data);
		$this->load->view('template/sidebar');
	}
	
	// delete color attributes
	function deleteColor()
	{
		if($_POST['color_ids'] == '')
		{
			$this->session->set_userdata('msg','Color must be selected.');	
		}
		else
		{
			$this->Productmodel->deleteColor($_POST['color_ids']);
			$this->session->set_userdata('msg','Color has been deleted.');	
		}
		redirect('/product/addColor/');	
	}
	
	function addSize()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		
		if(isset($_POST['size']))
		{
			$this->Productmodel->addSize($_POST['size']);
			$this->session->set_userdata('msg','Size has been added.');
			
			redirect('/product/addSize/');	
		}
		
		// get available colors
		$data['size_list'] = $this->Productmodel->getSizes();
								
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/add-size',$data);
		$this->load->view('template/sidebar');
	}
	
	// delete size attributes
	function deleteSize()
	{
		if($_POST['size_ids'] == '')
		{
			$this->session->set_userdata('msg','Size must be selected.');	
		}
		else
		{
			$this->Productmodel->deleteSize($_POST['size_ids']);
			$this->session->set_userdata('msg','Size has been deleted.');	
		}
		redirect('/product/addSize/');	
	}
	
	
	function addBrand()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		
		if(isset($_POST['name']))
		{
			$this->Productmodel->addBrand($_POST['name']);
			$this->session->set_userdata('msg','Brand has been added.');
			
			redirect('/product/addBrand/');	
		}
		
		// get available colors
		$data['brands'] = $this->Productmodel->getBrands();
								
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('product/add-brand',$data);
		$this->load->view('template/sidebar');
	}
	
	// ajax call
	function updateBrand($brand_id,$new_brand_name=null)
	{
		if($new_brand_name != '')
		{
			$this->Productmodel->updateBrand($brand_id,$new_brand_name);
			echo 'updated';
		}
		else
		{
			echo 'error';
		}
	}
	
	function deleteBrand($id)
	{
		$this->Productmodel->deleteBrand($id);
		$this->session->set_userdata('msg','Brand has been deleted.');	
		
		redirect('/product/addBrand/');
	}
	
}
