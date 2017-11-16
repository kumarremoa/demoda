<?php

class Facebookmodel extends CI_Model {

	public function __construct()

    {

        parent::__construct();

    }

	

	

	/**

	 * This function is to check if user already regestered or not

	 */	

	function checkExist($fb_id)

	{

		

		$sql="SELECT * FROM users where fb_id='".$fb_id."'";	

		

		$recordSet = $this->db->query($sql);

	  

		if($recordSet->num_rows() > 0)

		{

			

			$user_data = $recordSet->result();

						

			// set session variable

			$newdata = array(

							'user_id'  => $user_data[0]->id,

							'user_name'  => $user_data[0]->first_name.' '.$user_data[0]->last_name							

							//'logged_in' => TRUE

						);

						

			// set data in session

			$this->session->set_userdata($newdata);

			

			return true;

		}

		else

		{

			return false;

		}

		

	}

	

	

	function checkEmailExist($email)

	{

		$sql="SELECT * FROM users where email='".$email."'";	

		

		$recordSet = $this->db->query($sql);

	  

		if($recordSet->num_rows() > 0)

		{

			

			$user_data = $recordSet->result();

						

			// set session variable

			$newdata = array(

							'user_id'  => $user_data[0]->id,

							'user_name'  => $user_data[0]->first_name.' '.$user_data[0]->last_name							

							//'user_email'  => $user_data[0]->email

							//'logged_in' => TRUE

						);

						

			// set data in session

			$this->session->set_userdata($newdata);

			

			return true;

		}

		else

		{

			return false;

		}

	}

	

	

	

	function saveFacebookData($facebookUser)

	{

		// check if facebook user already registered

		//if(!$this->checkExist($facebookUser['id']))

		//{	

		

			

			$data['fb_id'] 		=  $facebookUser['id'];

			

			//$first_name	= (isset($facebookUser['first_name'])) ? $facebookUser['first_name'] : '';

			//$data['name']	= (isset($facebookUser['last_name'])) ? trim($first_name.' '.$facebookUser['last_name']) : trim($first_name);

					

			//$data['facebook_link']	= (isset($facebookUser['link'])) ? $facebookUser['link'] : '';

			

			$data['first_name'] = $facebookUser['first_name'];

			$data['last_name'] = $facebookUser['last_name'];

				

			if(isset($facebookUser['email']))

			{

				

				if($this->checkEmailExist($facebookUser['email']))

				{

					// email exist, login to account

				}

				else

				{

					// email not exist, create account

					

					$data['email'] 		=  $facebookUser['email'];

					

					$this->db->insert('users',$data);

					

					$insert_id = mysql_insert_id();

					

					// set session variable

					$newdata = array(

									'user_id'  => $insert_id,

									'user_name'  => trim($facebookUser['first_name'].' '.$facebookUser['last_name']),

									//'logged_in' => TRUE

								);

								

					// set data in session

					$this->session->set_userdata($newdata);

				}

				

				return true;

				

			}		

			else

			{

				// set session variable

				

				$newdata = array(

								'fb_id'  => $facebookUser['id'],								

								'fb_name'	=> trim($facebookUser['first_name'].' '.$facebookUser['last_name'])

								//'facebook_link'	=> $facebookUser['link']

								//'logged_in' => TRUE

							);

							

				// set data in session

				$this->session->set_userdata($newdata);

				

				return false;

				

			}

					

		//}

		//else

		//	echo 'user exist message';

	}

	

	

	

	function checkUserEmailExist($email)

	{

		$sql="SELECT * FROM users where email='".$email."'";	

		

		$recordSet = $this->db->query($sql);

	  

		if($recordSet->num_rows() > 0)

		{			

			return true;

		}

		else

		{

			return false;

		}

	}

	

	

	

	function saveFacebookEmail($formData)

	{

		if($this->checkUserEmailExist($formData['email']))

		{

			// email exist, redirect to login page

			return false;

		}

		else

		{

			// email not exist, create account

			$data['fb_id'] 		=  $formData['fb_id'];

			$data['name']	= $formData['fb_name'];

			$data['email']	= $formData['email'];

			

			$this->db->insert('users',$data);

						

			$insert_id = mysql_insert_id();

			

			// set session variable

			$newdata = array(

							'user_id'  => $insert_id,

							'user_name'  => $formData['fb_name'],

							'user_email'  => $formData['email']

							//'logged_in' => TRUE

						);

						

			// set data in session

			$this->session->set_userdata($newdata);

			

			return true;

		}

	}

	

	

}

?>