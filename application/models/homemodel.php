<?php
class Homemodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
		
	function checkLogin($email,$password)
	{
		
		$sql="SELECT * FROM users where email='".$email."' AND password='".$password."'";	
		
		$recordSet = $this->db->query($sql);
	  
		//return $recordSet->num_rows(); // total rows
		//return $fields = $recordSet->list_fields(); // array of database table field names
		//return $recordSet->result();
		
		if($recordSet->num_rows() > 0)
		{
			$n=0;
			$fields = $recordSet->list_fields();						
			foreach ($recordSet->result() as $row)
			{
				for($i=0; $i<count($fields) ; $i++)
				{
					$field_name = $fields[$i];
					$rs[$field_name]=$row->$field_name;
				}
				$n++;
			}
			//return $rs;
			
			// set user data array in session
			$newdata = array(
						'user_id'  => $rs['id'],
						'user_name'  => $rs['first_name'].' '.$rs['last_name'],
						'email'     => $rs['email']
						//'logged_in' => TRUE
               );
			   
			$this->session->set_userdata($newdata);
			
			return true;
		}
		else
		{
			return false;
		}
		
		
	}
	
	function getSliderImages()
	{
		//$sql = "select image from slider_images where is_active='1'";
		$this->db->select('*');
		$this->db->from('slider_images');
		$this->db->where('is_active','1');
		$recordSet = $this->db->get();
		
		//echo $this->db->last_query(); exit;
		return $recordSet->result();		
	}
		
	function getStaticPageContent($page_id)
	{
		$this->db->where('id',$page_id);
		$recordSet = $this->db->get('static_pages');
		
		return $recordSet->result();
		
	}
	
	
	
}
?>