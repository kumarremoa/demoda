<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
			$this->load->model('Categorymodel');
			$this->load->model('Usermodel');					
     }
	
			
	public function index()
	{
		$this->listCategory();
	}
	
	
	/**
	 * This function is to display add category form
	 */
	public function addCategory()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('category/add-category');
		$this->load->view('template/sidebar');
	}
	
	/**
	 * This function is to add category
	 */
	public function saveCategory()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Categorymodel->saveCategoryData($_POST,$_FILES);
		
		$this->session->set_userdata('msg','Category has been added.');
		redirect('/category/addCategory');
	}
	
	
	/**
	 * This function is to display all categories
	 */	
	public function listCategory()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		// Get Category List
		$categories['category_detail'] = $this->Categorymodel->categories();
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('category/list-category',$categories);
		$this->load->view('template/sidebar');
				
	}
	
	
	/**
	 * This function is to display edit category form
	 */
	public function editCategory()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$category_id = $this->uri->segment(3);
		
		// Get category data
		$category_data['category_details'] = $this->Categorymodel->getDetails($category_id);
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('category/edit-category',$category_data);
		$this->load->view('template/sidebar');
	}
	
	
	/**
	 * This function is to add category
	 */
	public function updateCategory()
	{
		// check user is loggedin or not
		$this->Usermodel->isLoggedIn();
		
		$this->Categorymodel->updateCategoryData($_POST,$_FILES);
		
		$id = $_POST['id']; // category id		
		
		$this->session->set_userdata('msg','Category has been updated.');
		redirect('/category/editCategory/'.$id);
	}
	
	public function deleteCategory($id)
	{
		//echo $id; exit;
		$this->Categorymodel->deleteCategory($id);
		$this->session->set_userdata('msg','Category has been deleted.');
		redirect('/category/listCategory/');
	}
	
	
	function manageSubCategory($category_id)
	{
		// get subcategories
		$category_data['subCategories'] = $this->Categorymodel->getSubCategories($category_id);
		$category_data['category_id'] = $category_id;
		
		$data['user_name'] = $this->session->userdata('admin_user_name');
		$this->load->view('template/header',$data);
		$this->load->view('category/sub-categories',$category_data);
		$this->load->view('template/sidebar');
	}
	
	function saveSubCategory()
	{
		$this->Categorymodel->saveSubCategory($_POST);
		
		$this->session->set_userdata('msg','Sub Category has been added.');
		redirect('/category/manageSubCategory/'.$_POST['category_id']);
	}
	
	// ajax call
	function updateSubCategory($sub_category_id,$sub_category_title=null)
	{
		if($sub_category_title != '')
		{
			$this->Categorymodel->updateSubCategory($sub_category_id,$sub_category_title);
			echo 'updated';
		}
		else
		{
			echo 'error';	
		}
	}
	
	function deleteSubCategory($category_id,$sub_category_id)
	{
		$this->Categorymodel->deleteSubCategory($sub_category_id);
		
		$this->session->set_userdata('msg','Sub Category has been deleted.');
		redirect('/category/manageSubCategory/'.$category_id);
	}
	
	function listSubcategories($category_id)
	{
		$subcategories = $this->Categorymodel->listSubcategories($category_id);
		
		$options = '';
		foreach($subcategories as $subcategory)
		{
			$options .= '<option value="'.$subcategory->id.'">'.$subcategory->title.'</option>';	
		}
		
		echo $options;
	}
	
	
}
