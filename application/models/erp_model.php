<?php
/**
* 
*/
class Erp_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
		$this->load->dbforge();
		$this->load->dbutil();
	}

	public function get_privileges($username,$password){
		$query = $this->db->get_where('users', array('username' => $username));
		if($query->num_rows<=0){
			
			return (-1);
		}
		$result = $query->row();

		if ($password!=($result->password))
			return(-1);
		else
			return($result->privilege);

	}
}

?>