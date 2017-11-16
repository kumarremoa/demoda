<?php
class Categorymodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to add category
	 */
	public function saveCategoryData($formData,$imageData)
	{
		//echo '<pre>';
		//print_r($formData);
		//print_r($imageData);
		
		$data['title'] = $_POST['title'];
		
		/*
		for($i=0; $i<sizeof($imageData['image']['name']); $i++)
		{
			$random_digit=rand(0000,9999);
			$file_name=$random_digit.$imageData['image']['name'][$i];
			$file_name = str_replace(" ","_",$file_name);
			
			// The file supplied is valid...Set up some variables for the location and name of the file.
			$thumb_folder = 'uploads/categories/'; // This is the folder to which the images will be saved
			$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
			
			// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
			move_uploaded_file($_FILES['image']['tmp_name'][$i], $tmp_file);
			
			
			$field_name = ($i==0) ? 'thumb_image' : 'banner_image';
			
			$data[$field_name] = $file_name;	
			
			
		}*/
			
		//print_r($data);
	
		$this->db->insert('categories', $data);
	}
	
	
	/**
	 * This function is to get all categories
	 */
	/*public function categories()
	{
		$sql="SELECT * FROM featured_categories where type='user-defined'";
		$recordSet = $this->db->query($sql);
		
		$n=0;
		$fields = $recordSet->list_fields();						
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;
	
	}*/
	
		
	
	/**
	 * This function is to get all categories
	 */
	public function categories()
	{
		$sql="SELECT * FROM categories";
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);
		
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;
	
	}
	
	/**
	 * This function is to get category details
	 */
	public function getDetails($category_id)
	{
		$sql="SELECT * FROM categories where id=".$category_id;
		$recordSet = $this->db->query($sql);
		return $recordSet->result();
		
	}
	
	/**
	 * This function is to update category details
	 */
	public function updateCategoryData($formData,$imageData)
	{
		/*echo '<pre>';
		print_r($formData);
		print_r($imageData);
		*/
		$id = $formData['id'];
		$data['title'] = $formData['title'];
		$data['active'] = $formData['active'];
		/*
		for($i=0; $i<sizeof($imageData['image']['name']); $i++)
		{
			if($imageData['image']['name'][$i] != '')
			{
				$random_digit=rand(0000,9999);
				$file_name=$random_digit.$imageData['image']['name'][$i];
				$file_name = str_replace(" ","_",$file_name);
				
				// The file supplied is valid...Set up some variables for the location and name of the file.
				$thumb_folder = 'uploads/categories/'; // This is the folder to which the images will be saved
				$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
				
				// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
				move_uploaded_file($_FILES['image']['tmp_name'][$i], $tmp_file);
				
				$field_name = ($i==0) ? 'thumb_image' : 'banner_image';
				
				$data[$field_name] = $file_name;	
			}
							
		} // end for
		
		*/
		//print_r($data);
		$this->db->where('id', $id);
		$this->db->update('categories',$data);
		
		//exit;
	}
	
	function deleteCategory($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('categories');	
	}
	
	
	/**
	 * This function is to get all categories
	 * shows only those categories which have any sub category
	 */
	public function getActiveCategories()
	{
		//$sql="SELECT * FROM categories where active=1";
		$sql = "SELECT c.* FROM (categories c right join subcategories s ON s.category_id=c.id) where c.active=1 group by c.id";
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);
		
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;
	
	}
	
	
	public function getSubCategories($category_id)
	{
		$sql="SELECT * FROM subcategories where category_id=".$category_id;		
		$recordSet = $this->db->query($sql);
		
		return $recordSet->result();	
	}
	
	function saveSubCategory($formData)
	{
		//print_r($formData); exit;
		$this->db->set($formData);
		$this->db->insert('subcategories');
	}
	
	function updateSubCategory($sub_category_id,$sub_category_title)
	{
		$data['title'] = urldecode($sub_category_title);
		$this->db->where('id',$sub_category_id);
		$this->db->update('subcategories',$data);	
	}
	
	function deleteSubCategory($sub_category_id)
	{
		$this->db->where('id',$sub_category_id);
		$this->db->delete('subcategories');
	}
	
	function listSubcategories($category_id)
	{
		$this->db->select('id,title');
		$this->db->from('subcategories');
		$this->db->where('category_id',$category_id);
		
		$recordSet = $this->db->get();
		
		return $recordSet->result();
			
	}
	
}
?>