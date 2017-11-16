<?php
class MailContentmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to add/edit mail content
	 */
	public function saveContent($formData)
	{
		//echo '<pre>';
		//print_r($formData);
		//if($imageData['image']['name'][0] != '')
		//	print_r($imageData);
		//exit;
		
		if(isset($formData['id']))
		{
			$content_id = array_pop($formData);
			//$shift = array_shift($formData);
		}
		else
			$content_id = '';
		
		//$shift = array_shift($formData);
		//echo '<pre>'; 
		//print_r($formData);
		$data = $formData;
		//print_r($data);
		//exit;
				
		if($content_id != '')
		{
			$this->db->where('id',$content_id);
			$this->db->update('mail_content',$data);
		}
		else
		{
			$this->db->insert('mail_content',$data);
			$product_id = $this->db->insert_id();
		}
		
	}
	
	
	/**
	 * This function is to get all contents
	 */
	public function contents()
	{
		$rs = array();
		$sql="SELECT * FROM mail_content order by id desc";
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);

		if($recordSet->num_rows()>0)
			$rs = $recordSet->result();

		return $rs;
	
	}
	
	/*
	* Get mail content
	*/
	public function getDetails($id)
	{		
		$this->db->select('*');
		$this->db->from('mail_content');
		$this->db->where('id',$id);
		$recordSet = $this->db->get()->row();		
		
		return $recordSet;	
	}
	
}
?>