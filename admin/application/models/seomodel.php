<?php
class Seomodel extends CI_Model {
	public function __construct()
  {
      parent::__construct();
  }

  public function getSeoData($value='', $category, $cat_value)
  {
  	if ($category == 'home') {
  			$data = [
  				'title' => 'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear',
  				'description' => 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.',
  			];
		  
		}	elseif ($category == 'category') {
			switch ($cat_value) {
				case 'nightwear':
	  			$data = [
	  				'title' => 'Demoda Secrets | Nightwear, Mothercare & Ethnic Wear',
	  				'description' => 'Get widest collection of quality nighty, mothercare & ethnic wear at Demoda. Shop online for Sleepshirts, Nighties, Kurtis, Nightgowns & more.',
	  			];
				break;
				case 'mother-care'
				default:
					# code...
					break;
			}
			
		} elseif ($category == 'subcategory') {
			
		} elseif ($category == 'product') {
			
		}
  }

