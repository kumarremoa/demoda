<?php
class Productmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	
	//get header menu Categories
	function getAllCategories()
	{
		$this->db->select('c.id as category_id, c.title as category_title,c.cat_link_rewrite, s.id as sub_category_id,s.title as subcategory_title,s.sub_cat_link_rewrite');
		$this->db->from('categories c');
		$this->db->join('subcategories s','s.category_id=c.id','left');		
		$this->db->where('c.active', '1');
		$this->db->order_by('c.id', 'asc');
		//$this->db->group_by('c.id');
	
		$recordSet = $this->db->get();
	   //echo $this->db->last_query(); exit;
		return $recordSet->result();
	}
		
	// new arrivals
	function getAllProducts($limit= 8)
	{
		$this->db->select('p.id as product_id, p.*,i.file_name');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');		
		$this->db->where('i.is_featured', '1');
		$this->db->where('p.quantity >', '0');
		$this->db->where('p.is_active', '1');
		$this->db->order_by('p.id', 'desc');
		$this->db->group_by('p.id');
		$this->db->limit($limit);
	
		$recordSet = $this->db->get();
	  // echo $this->db->last_query(); exit;
		return $recordSet->result();
	}
	
	
	function getFeaturedProducts($limit = 8)
	{
		$this->db->select('p.id as product_id, p.*,i.file_name,s.title as sub_category_title, s.sub_cat_link_rewrite');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->join('subcategories s', 'p.category_id = s.id','left');		
		$this->db->where('i.is_featured', '1');
		$this->db->where('p.quantity >', '0');
		$this->db->where('p.is_active', '1');
		$this->db->where('p.is_featured', '1');
		$this->db->order_by('p.id', 'desc');
		$this->db->group_by('p.id');
		$this->db->limit($limit);
	
		$recordSet = $this->db->get();
	   //echo $this->db->last_query(); exit;
		 
		return $recordSet->result();
	}
	
	function getSpecialProducts()
	{
		$this->db->select('p.id as product_id, p.*,i.file_name');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');		
		$this->db->where('i.is_featured', '1');
		$this->db->where('p.is_active', '1');
		$this->db->where('p.is_special', '1');
		$this->db->order_by('p.id', 'desc');
		$this->db->group_by('p.id');
	
		$recordSet = $this->db->get();
	   
		return $recordSet->result();
	}
	
	
	function addToCart($formData)
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
		$quantity = $formData['quantity'];
		$product_id = $formData['product_id'];
		$color = $formData['color'];
		$size = $formData['size'];
		
		// check if product is already in cart
		$this->db->select('c.id,c.quantity,p.quantity as available_quantity');
		$this->db->from('cart c');
		$this->db->join('products p','c.product_id=p.id','left');;	
		$this->db->where('c.product_id', $product_id);
		$this->db->where('c.color', $color);
		$this->db->where('c.size', $size);
		$this->db->where('c.ip', $user_ip);
	
		$recordSet = $this->db->get();
		
		if($recordSet->num_rows() > 0)
		{
			$result = $recordSet->result();
			//print_r($result); exit;
			$result = $result[0];
			
			// check whether (already ordered quantity+new ordered quantity) is less than total available quantity or not
			$data['quantity'] = ($quantity+$result->quantity > $result->available_quantity) ? $result->available_quantity : $quantity+$result->quantity;
			
			// product already in cart so increase quantity				
			//$data['quantity'] = $result->quantity+1;
			$this->db->where('c.id', $result->id);
			$this->db->update('cart c',$data);			
			
			//echo $this->db->last_query();
			
		}
		else
		{
			// add new product in cart	
			$data['ip'] = $user_ip;
			$data['product_id'] = $product_id;
			$data['color'] = $color;
			$data['size'] = $size;
			$data['quantity'] = $quantity;
			$this->db->insert('cart',$data);
		}
				
	}
	
	
	/*
	* Get product details
	*/
	public function getDetails($link_rewrite)
	{
		$rs = array();
		//$sql="SELECT p.*,i.id as image_id,i.* FROM (products p left join product_images i ON p.id=i.product_id) where p.id=".$product_id;
		$sql="SELECT p.*,i.id as image_id,i.*,c.id as parent_category_id, c.title as parent_category_title,s.id as sub_category_id,s.title as sub_category_title FROM (((products p left join product_images i ON p.id=i.product_id) left join subcategories s ON s.id=p.category_id) left join categories c ON c.id=s.category_id) where p.link_rewrite='".$link_rewrite."'";
		//echo $sql;
		//$this->db->limit($limit, $start);
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			foreach ($recordSet->result() as $row)
			{			
				$rs[] = $row;
			}	
		}
		//echo $this->db->last_query(); exit;
		return $rs;	
	}
	
	
	/**
	 * Get related products based on product id
	 */
	function getRelatedProducts($link_rewrite)
	{
		$rs = array();
		//$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.category_id IN (select category_id from products p1 where p1.id=".$product_id.") AND p.id<>".$product_id." GROUP BY `p`.`id` ORDER BY `p`.`id` desc";
		$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name`,`s`.title as sub_category_title, `s`.sub_cat_link_rewrite, `s`.id as sub_id FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id` INNER JOIN `subcategories` s ON `p`.category_id = `s`.id) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.category_id IN (select category_id from products p1 where p1.link_rewrite='".$link_rewrite."') AND p.link_rewrite<>'".$link_rewrite."' AND p.quantity>0 GROUP BY `p`.`id` ORDER BY RAND() LIMIT 4";
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			$rs = $recordSet->result();
		}
		
		return $rs;	
		
	}
	
	function total_results($keyword)
	{
		$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.title like '%".$keyword."%' AND p.quantity>0 GROUP BY `p`.`id` ORDER BY `p`.`id` desc";
		$recordSet = $this->db->query($sql);
		
		return $recordSet->num_rows();
	}
	
	function search($keyword,$limit,$start)
	{
		$order_by = ($this->session->userdata('short_by') && $this->session->userdata('short_by') == 'price') ? '`p`.`price`' : '`p`.`id`' ;
		
		$rs = array();
		$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.title like '%".$keyword."%' AND p.quantity>0 GROUP BY `p`.`id` ORDER BY ".$order_by." desc LIMIT ".$start.",".$limit;
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			$rs = $recordSet->result();
		}
		
		//return $sql;
		//echo $this->db->last_query(); exit;
		return $rs;	
	}
	
	
	function total_category_products($category_id)
	{
		$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.category_id = '".$category_id."' AND p.quantity>0 GROUP BY `p`.`id` ORDER BY `p`.`id` desc";
		$recordSet = $this->db->query($sql);
		
		//echo $this->db->last_query(); exit;
		return $recordSet->num_rows();
	}
	
	function product_by_category($category_id,$limit,$start,$params = [])
	{
		if (!empty($params['price_range'])) {
			$params['price_range']['min'];
		}
		$order_by = ($this->session->userdata('short_by') && $this->session->userdata('short_by') == 'price') ? '`p`.`price`' : '`p`.`id`' ;
		$rs = array();
		$this->db->select('`p`.`id` as product_id, `p`.*, `i`.`file_name`');
		$this->db->from('products p');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->where("`i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.category_id = '".$category_id."' AND p.quantity>0");
		$this->db->order_by("$order_by", 'desc');
		$this->db->group_by('p.id');
		$this->db->limit($limit, $start);
		$recordSet = $this->db->get();
		if ($recordSet->num_rows>0) {
			$rs = $recordSet->result();
		}
		// ->result();
		//echo"<pre>";print_r($recordSet);die;

		return $rs;
		/*$sql = "SELECT `p`.`id` as product_id, `p`.*, `i`.`file_name` FROM (`products` p LEFT JOIN `product_images` i ON `i`.`product_id`=`p`.`id`) WHERE `i`.`is_featured` = '1' AND `p`.`is_active` = '1' AND p.category_id = '".$category_id."' AND p.quantity>0 GROUP BY `p`.`id` ORDER BY ".$order_by." desc LIMIT ".$start.",".$limit;
		$recordSet = $this->db->query($sql);
		if($recordSet->num_rows()>0)
		{
			$rs = $recordSet->result();
		}*/
		
		//return $sql;
		//echo $this->db->last_query(); exit;
		return $rs;	
	}
	
	public function getCategoryName($category_id)
	{
		$this->db->select('c.id as parent_category_id,c.title as parent_category_title,s.id as sub_category_id,s.title as sub_category_title');
		$this->db->from('subcategories s');
		$this->db->join('categories c','c.id=s.category_id','left');;	
		$this->db->where('s.id', $category_id);
			
		$recordSet = $this->db->get()->row();
		return $recordSet;
	}

	public function getSubCatData($cat_link_rewrite)
	{
		$this->db->select('s.*');
		$this->db->from('subcategories s');
		$this->db->where('s.sub_cat_link_rewrite', $cat_link_rewrite);
		$recordSet = $this->db->get()->row();
		return $recordSet;
	}

	public function getLinkById($id)
	{
		$this->db->select('p.link_rewrite');
		$this->db->from('products p');
		$this->db->where('p.id', $id);
		$recordSet = $this->db->get()->row();
		return $recordSet->link_rewrite;
	}

	function getCategoriesWithImages($limit = 20)
	{
		$this->db->select('p.id as product_id, p.*,i.file_name, c.title as cat_name, c.cat_link_rewrite, s.title as sub_category_title, s.sub_cat_link_rewrite');
		$this->db->from('products p');
		$this->db->join('subcategories s', 's.id = p.category_id');
		$this->db->join('categories c', 'c.id = s.category_id');
		$this->db->join('product_images i','i.product_id=p.id','left');
		$this->db->where('p.quantity >', '0');
		$this->db->order_by('p.id', 'desc');
		$this->db->group_by('p.category_id');
			
		$recordSet = $this->db->get();
	  // echo $this->db->last_query(); exit;
		return $recordSet->result();
	}
	
}
?>