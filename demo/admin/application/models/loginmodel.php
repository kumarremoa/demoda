<?php

class Loginmodel extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }
	
		
	function checkLogin($username,$password)
	{
		$where = array('username' => $username, 'password' => $password, 'is_active' => 1);
		$this->db->where($where);
		$recordSet = $this->db->get('admin');
		
		/*
		// custom query
		$sql="SELECT * FROM users where email='".$email."' AND password='".$password."'";	
		$recordSet = $this->db->query($sql);*/
	  
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
						'admin_user_id'  => $rs['id'],
						'admin_user_name'  => $rs['username']						
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
	
	function sendPassword($email)
	{
	
	 	//$email = $formData['email'];
	 	//print_r($formData); exit;
		// check email exist
		$where = array('email'=> $email);
		$this->db->where($where);
		$recordSet = $this->db->get('admin');
		
		if($recordSet->num_rows() == 0)
		{
			$response = 'Email does not exist.';
		}
		else
		{
			// Get user details
			$userData = $this->userDetails($email);
			//print_r($userData);
			$userData = $userData[0];
			
			// send mail			
			$to = $email;
			$to_name = $userData->username;
			
			$from = 'no-reply@grras.com';
			$from_name = 'Customer Support Team';
			
			$subject = "Password Recovery Email";
			$message = "Hello ".$userData->username."<br>Your Password is ".$userData->password;
			
			$this->email->clear();
			$this->email->from($from, $from_name);
			$this->email->to($to,$to_name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->set_mailtype('html');
			$this->email->send();

		
			$response = 'Password has been sent to '.$email;
		}

		return $response;
		
	 }
	
	
	/**
	 * Get User details
	 */
	function userDetails($email)
	{	
		$where = array('email '=> $email);
		$this->db->where($where);
		$recordSet = $this->db->get('admin');
		
		/*$fields = $recordSet->list_fields();	
		foreach ($recordSet->result() as $row)
		{
			for($i=0; $i<count($fields); $i++)
			{
				$field_name = $fields[$i];
				$rs[$field_name]=$row->$field_name;
			}
		}*/
		
		//return $rs;
		return $recordSet->result();
	}
	/*
	function loginInfo($id)
	{
		$date = date('Y-m-d h:i:s');
		$sessionId = session_id();
		
		$sql = "update mh_users_master set logintime = '".$date."', islogin = 'Y', userSessionId = '".$sessionId."',lastactivityTime = '".date('Y-m-d h:i:s')."' where id = $id";
		if($this->db->simple_query($sql)){}

	}
	
	function logoutInfo($id)
	{
		$sql = "update mh_users_master set islogin = 'N',lastactivityTime = '".date('Y-m-d h:i:s')."' where id = $id";
		if($this->db->simple_query($sql)){}

	}
	
	function getTestimonialDetails($languageId)
	{
		$sql="SELECT  TM.*,TD.* FROM mh_testimonial_master AS TM, mh_testimonial_details AS TD where  TD.id= TM.id and TD.languageId = '".$languageId."' order by rand() desc limit 0,1 ";	
		
		$rs = false;
		if($this->db->simple_query($sql))
		{
			$recordSet = $this->db->query($sql);
           	$rs = array();
			$isEscapeArr = array();
			if($recordSet->num_rows() > 0)
			{
				$n=0;
				$fields = $recordSet->list_fields();						
				foreach ($recordSet->result() as $row)
				{
					$lang_id = $row->languageId;
 					for($i=0; $i<count($fields) ; $i++)
					{
						$field_name = $fields[$i];
						$rs[$field_name]=$row->$field_name;
					}
					$n++;
				}
				return $rs;
			}
        }
		else
		{
			log_message('error',": ".$this->db->_error_message() );
			return false;
		}
		return $rs;		
	}
	
	function homepageTitle($keyId,$languageId)
	{
		$sql="SELECT * from mh_admin_language_values where languageKeyId = '".$keyId."' and languageId = '".$languageId."'";	
		
		$rs = false;
		if($this->db->simple_query($sql))
		{
			$recordSet = $this->db->query($sql);
           	$rs = array();
			$isEscapeArr = array();
			if($recordSet->num_rows() > 0)
			{
				$n=0;
				$fields = $recordSet->list_fields();						
				foreach ($recordSet->result() as $row)
				{
					$lang_id = $row->languageId;
 					for($i=0; $i<count($fields) ; $i++)
					{
						$field_name = $fields[$i];
						$rs[$field_name]=$row->$field_name;
					}
					$n++;
				}
				return $rs['value'];
			}
        }
		else
		{
			log_message('error',": ".$this->db->_error_message() );
			return false;
		}
		return $rs;		
	}
	
	function getFaqList($languageId)
	{
		$sql="SELECT * FROM  mh_faq  where languageId ='".$languageId."' ";	
		
		$rs = false;
		if($this->db->simple_query($sql))
		{
			$recordSet = $this->db->query($sql);
           	$rs = array();
			$isEscapeArr = array();
			if($recordSet->num_rows() > 0)
			{
				$n=0;
				$fields = $recordSet->list_fields();						
				foreach ($recordSet->result() as $row)
				{
					$lang_id = $row->languageId;
 					for($i=0; $i<count($fields) ; $i++)
					{
						$field_name = $fields[$i];
						$rs[$n][$field_name]=$row->$field_name;
					}
					$n++;
				}
				return $rs;
			}
        }
		else
		{
			log_message('error',": ".$this->db->_error_message() );
			return false;
		}
		return $rs;		
	}*/

	
}

?>