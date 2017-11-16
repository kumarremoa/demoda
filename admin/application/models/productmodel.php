<?php
class Productmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to add/edit products
	 */
	public function saveProductData($formData,$imageData)
	{
		if(isset($formData['product_id']))
			$product_id = array_pop($formData);
		else
			$product_id = '';
		
		$shift = array_shift($formData);
		$data = $formData;
	
		$data['available_size'] = implode(',',$formData['available_size']);
		
		if($product_id != '')
		{
			$this->db->where('id',$product_id);
			$this->db->update('products',$data);
			$user_action = 'update';
		}
		else
		{
			$this->db->insert('products',$data);
			$product_id = $this->db->insert_id();	
			$user_action = 'add';
		}
		
		$data = '';		
		$data['product_id'] = $product_id;
		
		
		if($imageData['image']['name'][0] != '')
		{
			$j = 0;
			for($i=0; $i<sizeof($imageData['image']['name']); $i++)
			{
				$random_digit=rand(0000,9999);
				$file_name=$random_digit.$imageData['image']['name'][$i];
				$file_name = str_replace(" ","_",$file_name);
				// The file supplied is valid...Set up some variables for the location and name of the file.
				$thumb_folder = 'uploads/products/large/'; // This is the folder to which the images will be saved
				$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
				// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
				move_uploaded_file($_FILES['image']['tmp_name'][$i], $tmp_file);
				// resize image
				$this->load->library('image_lib');
				$path = 'uploads/products/';
				$source_path = $path.'large/'.$file_name;
				$medium_image_path = $path.'medium/'.$file_name;
				$thumb_path = $path.'small/'.$file_name;
				
				$config['image_library'] = 'gd2';		
				$config['source_image'] = $source_path;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				
				// generate thumbnail
				$config['new_image'] = $thumb_path;		
				$config['width'] = 65;
				$config['height'] = 90;				
				$this->image_lib->initialize($config);	
				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
				}
				// medium size image
				$config['new_image'] = $medium_image_path;
				$config['width'] = 269;
				$config['height'] = 340;
				$this->image_lib->initialize($config);	
				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
				}
				// end resize
				
				$data['file_name'] = $file_name;
				
				// call when add new product
				if($user_action == 'add')
				{
					if($i == 0)
						$data['is_featured'] = 1;
					else
						$data['is_featured'] = 0;				
				}
				
				$this->db->insert('product_images',$data);				
			
			} // end for
		} // end if			
			
	}
	
	
	/**
	 * This function is to get all products
	 */
	public function products()
	{
		$rs = array();
		$sql="SELECT * FROM products order by id desc";
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			foreach ($recordSet->result() as $row)
			{			
				$rs[] = $row;
			}	
		}
		return $rs;
	
	}
	
	/**
	 * This function is to change banner/slider image status or delete
	 */
	public function userAction($action,$id)
	{
		$this->db->where('id',$id);
		
		if($action == 'Delete')
		{	
			$this->db->delete('products');
			
			// delete images
			$this->db->where('product_id',$id);
			$this->db->delete('product_images');
			
		}
		else
		{
			$data['is_active'] = ($action == 'Publish') ? '1' : '0';
			
			$this->db->update('products',$data);
		}
		
		//echo $this->db->last_query(); exit;
	
	}
	
	/*
	* Get product details
	*/
	public function getDetails($product_id)
	{
		$rs = array();
		//$sql="SELECT p.*,i.id as image_id,i.* FROM (products p left join product_images i ON p.id=i.product_id) where p.id=".$product_id;
		$sql = "SELECT p.*,p.is_featured as is_featured_product,i.id as image_id,i.is_featured as is_featured_image,i.*,s.category_id as main_category_id,s.title as category_title FROM ((products p left join product_images i ON p.id=i.product_id) left join subcategories s ON s.id=p.category_id) where p.id=".$product_id;
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			foreach ($recordSet->result() as $row)
			{			
				$rs[] = $row;
			}	
		}
		return $rs;	
	}
	
	
	public function deleteProductImage($image_id)
	{
		$this->db->where('id',$image_id);
		$this->db->delete('product_images');	
	}
	
	public function setFeaturedImage($product_id,$image_id)
	{
		$data['is_featured'] = 0;
		$this->db->where('product_id',$product_id);
		$this->db->update('product_images',$data);
		
		$data = '';
		$data['is_featured'] = 1;
		$this->db->where('id',$image_id);
		$this->db->update('product_images',$data);
	}
	
	
	/**
	 *	add Color attributes
	 */
	function addColor($color_code)
	{
		$data['color_code']	= $color_code;
		$this->db->insert('attributes_color',$data);		
	}
	
	function getColors()
	{
		$recordSet = $this->db->get('attributes_color');
		return $recordSet->result();
	}
	
	function deleteColor($color_ids)
	{
		//echo '<pre>';
		$color_ids = explode('~',$color_ids);
		//print_r($color_ids); //exit;
		$last_element = array_pop($color_ids);
		//print_r($color_ids); exit;
		
		//$data['id'] = $color_ids;
		$this->db->where_in('id',$color_ids);
		$this->db->delete('attributes_color');
	}
	
	
	
	/**
	 *	Size attributes
	 */
	function addSize($size)
	{
		$data['name']	= strtoupper($size);
		$this->db->insert('attributes_size',$data);	
	}
	
	function getSizes()
	{
		$recordSet = $this->db->get('attributes_size');
		return $recordSet->result();
	}
	
	function deleteSize($size_ids)
	{		
		$size_ids = explode('~',$size_ids);		
		$last_element = array_pop($size_ids);
		//print_r($color_ids); exit;
		
		$this->db->where_in('id',$size_ids);
		$this->db->delete('attributes_size');
	}
	
	
	/**
	 *	add Brand name
	 */
	function addBrand($name)
	{
		$data['name']	= ucwords($name);
		$this->db->insert('attributes_brand',$data);	
	}
	
	function getBrands()
	{
		$recordSet = $this->db->get('attributes_brand');
		return $recordSet->result();
	}
	
	function updateBrand($brand_id,$new_brand_name)
	{
		$data['name'] = urldecode($new_brand_name);
		$this->db->where('id',$brand_id);
		$this->db->update('attributes_brand',$data);
	}
	
	function deleteBrand($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('attributes_brand');
	}
	
	
}
?>