<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route = [
	'home' => 'home/index',
	//'user/(:any)/(:num)' => 'home/user/$1/$2',//for routing url
	'product/category/find-(:any)-(:any)-to-(:any)' => "product/category/$1/$2/$3",
	'default_controller' => "home",
	'404_override' => 'error/index',
	'about-us' => "home/page/1",
	'shipping-rates' => "home/page/2",
	'return-policy' => "home/page/13",
	'international-shipping-and-payment' => "home/page/4",
	'faq' => "home/page/5",
	'contact-us' => "home/page/6",
	'press-room' => "home/page/7",
	'help' => "home/page/8",
	'terms-conditions' => "home/page/9",
	'size-n-fit-guide' =>"home/page/12",
	'blog' => "blog/index",
	'blog/(:num)' => "blog/index/$1",
	'blog/(:any)' => "blog/detail/$1",


];

/* End of file routes.php */
/* Location: ./application/config/routes.php */