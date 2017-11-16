<?php

class Pagemodel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
		
	/**
	 * This function is to get static pages list
	 */
	public function listStaticPages()
	{
		$this->db->select('id,page_title,page_name,content');
		
		$recordSet = $this->db->get('static_pages');
		
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
	public function createPage($formData)
	{
		$data['page_name'] = $formData['page_name'];
		$data['page_title'] = $formData['page_title'];
		$data['content'] = $formData['content'];
				
		$this->db->insert('static_pages',$data);
	}
	
	/**
	 * This function is to get static page content
	 */
	public function getDetails($page_id)
	{
		$this->db->where('id',$page_id);
		$recordSet = $this->db->get('static_pages');
		
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
	public function savePageData($formData)
	{
		$page_id = $formData['id'];
		$data['page_name'] = $formData['page_name'];
		$data['page_title'] = $formData['page_title'];
		$data['content'] = $formData['content'];		
		
		$this->db->where('id',$page_id);
		$this->db->update('static_pages',$data);
	}
	
	/**
	 * This function is to delete page
	 */
	public function delete($page_id)
	{
		$this->db->where('id',$page_id);
		$this->db->delete('static_pages');
	
	}
	
}

?>