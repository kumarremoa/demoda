<?php

class Blogmodel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
		
	/**
	 * This function is to get static pages list
	 */
	public function listAllBlog()
	{
		$this->db->select('id,article_title,author_name,content');
		
		$recordSet = $this->db->get('articles');
		
		$rs = array();
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;	
	}
	
	/**
	 * This function is to save/create new static page
	 */
	public function addArticle($formData, $imageData = '')
	{
		$formData['image_path'] = $this->addImage($imageData);
		// echo"<pre>";print_r($formData);die;
		$this->db->insert('articles',$formData);
	}
	
	/**
	 * This function is to get static page content
	 */
	public function getDetails($page_id)
	{
		$this->db->where('id',$page_id);
		$recordSet = $this->db->get('articles');
		
		$rs = array();
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;	
	}
	
	/**
	 * This function is to get static page content
	 */
	public function saveBlogData($formData, $imageData)
	{
		if(isset($formData['id']))
			$page_id = array_pop($formData);
		else
			$page_id = '';

		// echo "<pre>";;print_r([$page_id, 'wibouboib',"wifuboupon", $formData]);die;
		$data = $formData;
		$formData['image_path'] = $this->addImage($imageData);
		$this->db->where('id',$page_id);
		$this->db->update('articles',$formData);
	}
	
	/**
	 * This function is to delete page
	 */
	public function delete($page_id)
	{
		$this->db->where('id',$page_id);
		$this->db->delete('articles');
	
	}

	public function addImage($imageData = [])
	{
		if($imageData['image_path']['name'][0] != ''){
			for($i=0; $i<sizeof($imageData['image_path']['name']); $i++)
			{
				$random_digit=rand(0000,9999);
				$file_name=$random_digit.$imageData['image_path']['name'][$i];
				$file_name = str_replace(" ","_",$file_name);
				// The file supplied is valid...Set up some variables for the location and name of the file.
				$thumb_folder = 'uploads/articles/large/'; // This is the folder to which the images will be saved
				$tmp_file = $thumb_folder.$file_name; // save file in tmp folder
				// Now use the move_uploaded_file function to move the file from its temporary location to its new location as defined above.
				move_uploaded_file($_FILES['image_path']['tmp_name'][$i], $tmp_file);
				// resize image
				$this->load->library('image_lib');
				$path = 'uploads/articles/';
				$source_path = $path.'large/'.$file_name;
				$medium_image_path = $path.'medium/'.$file_name;
				$thumb_path = $path.'small/'.$file_name;
				
				$config['image_library'] = 'gd2';		
				$config['source_image'] = $source_path;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				
				// generate thumbnail
				$config['new_image'] = $thumb_path;		
				$config['width'] = 120;
				$config['height'] = 90;				
				$this->image_lib->initialize($config);	
				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
				}
				// medium size image
				$config['new_image'] = $medium_image_path;
				$config['width'] = 360;
				$config['height'] = 240;
				$this->image_lib->initialize($config);	
				if ( ! $this->image_lib->resize())
				{
					echo $this->image_lib->display_errors();
				}
				// end resize
				return $file_name;				
			
			} // end for
		}

	}

	public function createBlog($formData, $imageData)
	{
		unset($formData['id']);
		$str = trim($formData['article_title']);
        $str = preg_replace("/[^a-zA-Z0-9 ]/", "", $str);
        $str = preg_replace('!\s+!', '-', $str);
        $str = trim($str, '-');
		$formData['link_rewrite'] = $str;
		$formData['image_path'] = $this->addImage($imageData);
		$this->db->insert('articles',$formData);
	}
	
}

?>