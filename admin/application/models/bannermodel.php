<?php

class Bannermodel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to add banner/slider image
	 */
	public function saveBannerData($imageData)
	{
		//echo '<pre>';
		//print_r($formData);
		//print_r($imageData);
		
		$random_digit=rand(0000,9999);
		$file_name=$random_digit.$imageData['image']['name'];
		$file_name = str_replace(" ","_",$file_name);
		
		// The file supplied is valid...Set up some variables for the location and name of the file.
		$thumb_folder = 'uploads/banner/large/'; // This is the folder to which the images will be saved
		$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
		
		// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
		move_uploaded_file($_FILES['image']['tmp_name'], $tmp_file);
	
		$data['image'] = $file_name;	
		
		//print_r($data);
	
		$this->db->insert('slider_images', $data);
		
		return $file_name;
	}
	
	
	/**
	 * This function is to get all banners
	 */
	public function banners()
	{
		$rs = array();
		$sql="SELECT * FROM slider_images";
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
			$this->db->delete('slider_images');
		}
		else
		{
			$data['is_active'] = ($action == 'Active') ? '1' : '0';
			
			$this->db->update('slider_images',$data);
		}
		
		//echo $this->db->last_query(); exit;
	
	}
	
	
	
}

?>