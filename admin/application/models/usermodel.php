<?php

class Usermodel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to check user is logged in or not
	 * if user is not logged in, show 404 error
	 */
	public function isLoggedIn()
	{
		if($this->session->userdata('admin_user_id'))
			return true;
		else
			show_404();
	}
	
	/**
	 * This function is to get admin account details
	 */
	public function getAdmin($admin_id)
	{
		$this->db->where('id',$admin_id);
		$recordSet = $this->db->get('admin');
		
		$rs = array();
		foreach ($recordSet->result() as $row)
		{			
			$rs[] = $row;
		}
		return $rs;	
	}
	
	/**
	 * This function is to update logged in admin account details
	 */
	public function updateAdminUserData($formData)
	{
		$user_id = $formData['id'];
		$data['username'] = $formData['username'];
		$data['password'] = $formData['password'];
		$data['email'] = $formData['email'];
		
		$this->db->where('id',$user_id);
		$this->db->update('admin',$data);
		
		// set new name in session
		$this->session->set_userdata('admin_user_name',$formData['username']);
	}
		
	
}

?>