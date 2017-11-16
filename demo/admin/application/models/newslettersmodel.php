<?php
class Newslettersmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to get all subscribers
	 */
	public function subscribers()
	{
		$rs = array();
		$sql="SELECT * from newsletter_subscribers";
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
		return $rs;
	
	}
	
	function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('newsletter_subscribers');	
	}
		
}
?>