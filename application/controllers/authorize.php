<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Example usage of Authorize.net's
 * Advanced Integration Method (AIM)
 */
class Authorize extends CI_Controller
{
	
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('Authorize_netmodel');	
	}
	
	// Example auth & capture of a credit card
	public function payment($order_id)
	{
		
		$orderDetails = $this->Authorize_netmodel->orderDetails($order_id);
		//echo '<pre>'; print_r($orderDetails); 
		
		$total_amount = 0;
		foreach($orderDetails as $order)
		{
			$price = ($order->is_discount == 1) ? $order->price-$order->discount_price : $order->price;
			$total_product_price = ($order->ordered_quantity * $price);
			$total_amount = $total_amount + $total_product_price;
		}
		
		//echo $total_amount;
		
		//exit;
		
		$orderDetails = $orderDetails[0];
		
		// Authorize.net lib
		$this->load->library('authorize_net');
		
		$auth_net = array(
			'x_card_num'			=> $orderDetails->card_num, // Visa
			'x_exp_date'			=> $orderDetails->exp_date,
			'x_card_code'			=> $orderDetails->card_code,
			//'x_description'			=> 'A test transaction',
			'x_amount'				=> $total_amount,
			'x_first_name'			=> $orderDetails->first_name,
			'x_last_name'			=> $orderDetails->last_name,
			'x_address'				=> $orderDetails->address,
			'x_city'				=> $orderDetails->city,
			'x_state'				=> $orderDetails->state,
			'x_zip'					=> $orderDetails->zip,
			'x_country'				=> $orderDetails->country,
			//'x_phone'				=> '555-123-4567',
			'x_email'				=> $orderDetails->email,
			//'x_customer_ip'			=> $this->input->ip_address(),
			);
		
		/*$auth_net = array(
			'x_card_num'			=> '4111111111111111', // Visa
			'x_exp_date'			=> '12/14',
			'x_card_code'			=> '123',
			//'x_description'			=> 'A test transaction',
			'x_amount'				=> '20',
			'x_first_name'			=> 'John',
			'x_last_name'			=> 'Doe',
			'x_address'				=> '123 Green St.',
			'x_city'				=> 'Lexington',
			'x_state'				=> 'KY',
			'x_zip'					=> '40502',
			'x_country'				=> 'US',
			//'x_phone'				=> '555-123-4567',
			'x_email'				=> 'test@example.com',
			//'x_customer_ip'			=> $this->input->ip_address(),
			);*/
		$this->authorize_net->setData($auth_net);
		// Try to AUTH_CAPTURE
		if( $this->authorize_net->authorizeAndCapture() )
		{
			//echo '<h2>Success!</h2>';
			//echo '<p>Transaction ID: ' . $this->authorize_net->getTransactionId() . '</p>';
			//echo '<p>Approval Code: ' . $this->authorize_net->getApprovalCode() . '</p>';
			
			$transaction_id = $this->authorize_net->getTransactionId();
			
			$this->Authorize_netmodel->updatePaymentStatus($order_id,$transaction_id);
			
			// reduce product's available quantity
			$this->Authorize_netmodel->reduceAvailableQuantity($order_id);
			
			
			// send invoice
			redirect('user/sendInvoice/'.$order_id);
						
			//redirect('user/thankyou');
			
		}
		else
		{
			//echo '<h2>Fail!</h2>';
			// Get error
			//echo '<p>' . $this->authorize_net->getError() . '</p>';
			// Show debug data
			//$this->authorize_net->debug();
			
			redirect('user/errorPayment');
		}
	}
	
}
/* EOF */