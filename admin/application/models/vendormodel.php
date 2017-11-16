<?php
class Vendormodel extends CI_Model {
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * This function is to add vendor
	 */
	public function saveVendorData($formData)
	{
		
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		
		$this->db->insert('vendors', $data);
	}
		
	/**
	 * This function is to get all vendors
	 */
	public function vendors()
	{
		$recordSet = $this->db->get('vendors');		
		return $recordSet->result();	
	}
	
	/**
	 * This function is to get vendor details
	 */
	public function getDetails($vendor_id)
	{
		$sql="SELECT * FROM vendors where id=".$vendor_id;
		$recordSet = $this->db->query($sql);
		return $recordSet->result();
		
	}
	
	/**
	 * This function is to update vendor details
	 */
	public function updateVendor($formData)
	{		
		$id = $formData['id'];
		$data['name'] = $formData['name'];
		$data['email'] = $formData['email'];
		
		$this->db->where('id', $id);
		$this->db->update('vendors',$data);
	}
	
	function deleteVendor($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('vendors');	
	}
	
	
}
?>