<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FacebookLogin extends CI_Controller {
	public function FacebookLogin(){
		parent::__construct();
		parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);
		
		$this->load->model('Facebookmodel');
	}
	/**
	 * This is the redirect_uri of facebook signup form
	 * save facebook user data in database
	 * logout user from facebook
	 */
	function index()
	{
		
		// Try to get the user's id on Facebook
		$userId = $this->facebook->getUser();
		// If user is not yet authenticated, the id will be zero
		if($userId == 0)
		{
		
		}
		else
		{
		
			// Get user's data and print it
			$user = $this->facebook->api('/me');
			//echo '<pre>';
			//print_r($user);
			//exit;
			
			// save data into database
			if(!$this->Facebookmodel->saveFacebookData($user))
			{
				$this->load->view('template/header');
				$this->load->view('user/signup');
				$this->load->view('template/footer');
			}
			else
			{
				// url after successfull registeration
				redirect('/'); // redirect to home page
			}
			
		}
		
		// logout user from facebook
		//$this->logout();
	}
	/**
	 * this will shows the facebook authencation form/ login form to check the user registered on fb or not
	 * If any user already login to facebook this will not show the facebook login form and redirects to redirect_uri
	 */
	function signup(){
				
			/*echo $this->facebook->getUser();
			// Generate a login url
			$data['url'] = $this->facebook->getLoginUrl(array('redirect_uri'=>'http://go4colleges.com/CodeIgniter_front/index.php/facebookLogin','scope'=>'email')); 
			$this->load->view('facebook/login', $data);
			echo '<br>';
			echo '<a href="'.$this->facebook->getLogoutUrl().'">Logout</a>';
		
			if($this->facebook->getUser() !=0)
			{
				$this->facebook->destroySession(); // set userId to 0
			}*/
			
			$param['redirect_uri'] = $this->config->item('site_url').'index.php/facebookLogin';
			$param['scope'] = 'email';
			
			// Generate a facebook login url
			// this will return facebook user detail to redirect_uri
			$login_url = $this->facebook->getLoginUrl($param);
			
			echo '<script>window.open("'.$login_url.'","_top");</script>';
		
		
	
	}
	
	/**
	 * this will shows the facebook authencation form/ login form to check the user registered on fb or not
	 * If any user already login to facebook this will not show the facebook login form and redirects to redirect_uri with logged in user data
	 */
	function login(){
		
		
			/*echo $this->facebook->getUser();
			// Generate a login url
			$data['url'] = $this->facebook->getLoginUrl(array('redirect_uri'=>'http://go4colleges.com/CodeIgniter_front/index.php/facebookLogin','scope'=>'email')); 
			$this->load->view('facebook/login', $data);
			echo '<br>';
			echo '<a href="'.$this->facebook->getLogoutUrl().'">Logout</a>';
		
			if($this->facebook->getUser() !=0)
			{
				$this->facebook->destroySession(); // set userId to 0
			}*/
			
			$param['redirect_uri'] = $this->config->item('site_url').'index.php/facebookLogin/authentication';
			$param['scope'] = 'email';
			
			// Generate a facebook login url
			// this will return facebook user detail to redirect_uri
			$login_url = $this->facebook->getLoginUrl($param);
			
			echo '<script>window.open("'.$login_url.'","_top");</script>';
		
		
	
	}
	
	
	/**
	 * This is the redirect_uri of sign in with facebook
	 * save facebook user data in database
	 * logout user from facebook
	 */
	function authentication()
	{
		
		// Try to get the user's id on Facebook
		$userId = $this->facebook->getUser();
		// If user is not yet authenticated, the id will be zero
		if($userId == 0)
		{
		
		}
		else{
		
			// Get user's data
			$user = $this->facebook->api('/me');
			
			$fb_id = $user['id'];
			
			// check data into database
			if($this->Facebookmodel->checkExist($fb_id))
			{
				//echo 'Registered';
			}
			else
			{
				//echo 'Not registered';
				$this->signup();
			}
			
		}
		
		// logout user from facebook
		$this->logout();
	}
	
	// logout user from facebook
	function logout()
	{
		//$this->session->sess_destroy();
		/*$param['next'] = 'http://go4colleges.com/CodeIgniter_front/';
		echo '<a href="'.$this->facebook->getLogoutUrl($param).'">Signout from facebook</a>';*/
		
		$param['next'] = $this->config->item('site_url');
		$logout_url = $this->facebook->getLogoutUrl($param);
		echo '<script>window.open("'.$logout_url.'","_top");</script>';
		
	}
	
	
	function saveFacebookEmail()
	{
		if($this->Facebookmodel->saveFacebookEmail($_POST))
		{
			redirect('/');
		}
		else
		{
			$this->session->set_userdata('msg','Email Already Exists. Please login');
			redirect('/');
		}
	}
}
?>