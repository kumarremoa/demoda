<?php
class Authorize_netmodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	
	
	/**
	 * Get order details
	 */
	 
	function orderDetails($order_id)
	{	
	
		$where = array('o.order_id'=> $order_id);
		$this->db->select('p.*,o.*,o.quantity as ordered_quantity,o.order_id');
		$this->db->from('products p');
		$this->db->join('orders o','o.product_id=p.id','left');
		$this->db->where($where);
		
		$recordSet = $this->db->get();	
		
		return $recordSet->result();
	}
		
	function updatePaymentStatus($order_id,$transaction_id)
	{		
		$data['transaction_id'] = $transaction_id;
		$data['payment_status'] = 'Completed';
		
		$this->db->where('order_id',$order_id);
		$this->db->update('orders',$data);
		
	}
	
	/** 
	 * get product and ordered quantity from orders table
	 * reduce available quantity in products table
	 */
	function reduceAvailableQuantity($order_id)
	{
		// get ordered quantity
		$orderDetails = $this->orderDetails($order_id);
		
		//echo '<pre>'; print_r($orderDetails);
		
		foreach($orderDetails as $order)
		{
			$ordered_quantity = $order->ordered_quantity;			
			$this->db->set('quantity', 'quantity-'.$ordered_quantity, FALSE);
			$this->db->where('id', $order->product_id);
			$this->db->update('products');	
		}
		//echo $this->db->last_query(); exit;
	}
	
}
?>