<?php
class Blogmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function getallBlogs($limit = null,$start = null)
	{
		$this->db->select('a.*');
		$this->db->from('articles a');
		//$this->db->join('subcategories s','s.category_id=c.id','left');		
		$this->db->where('a.status', '1');
		$this->db->order_by('a.id', 'desc');
		if (!is_null($limit)) {
			$this->db->limit($limit, $start);
		}
		$recordSet = $this->db->get();
	   //echo $this->db->last_query(); exit;
		return $recordSet->result();
	}
	
	function getBlogContent($link_rewrite)
	{
		$this->db->where('link_rewrite',$link_rewrite);
		$recordSet = $this->db->get('articles');
		
		return $recordSet->result();
		
	}
	
	public function increaseViewCount($link_rewrite)
	{
		$this->db->set('viewed_count', '`viewed_count`+1', FALSE);
		$this->db->where('link_rewrite', $link_rewrite);
		$this->db->update('articles');
		// echo $this->db->last_query(); exit;
	}

	function total_articles()
	{
		$this->db->select('a.id');
		$this->db->from('articles a');
		$this->db->where('a.status', '1');
		$recordSet = $this->db->get();
	   //echo $this->db->last_query(); exit;
		$recordSet->result();
		// print_r($recordSet);die;
		return $recordSet->num_rows;

	}
}
?>