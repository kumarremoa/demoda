<?php
class Ordersmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to get all orders from zippy loft
	 */
	public function orders()
	{
		$rs = array();
		$sql="SELECT o.*,o.quantity as ordered_quantity,p.title,p.price FROM (orders o left join products p ON o.product_id = p.id ) where o.order_coming_from='Zippy Loft' order by o.id desc";
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
	
	
	/*
	* Get order details
	*/
	public function order_details($order_id)
	{
		$rs = array();
		$sql="SELECT o.*,o.quantity as ordered_quantity,p.* FROM (orders o left join products p ON o.product_id = p.id ) where o.order_id=".$order_id;
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
	
	function updateDeliveryStatus($status,$order_id)
	{
		$data['delivery_status'] = ($status != 'NULL') ? $status : '';
		$this->db->where('order_id',$order_id);
		$this->db->update('orders',$data);	
	}
	

}
?>