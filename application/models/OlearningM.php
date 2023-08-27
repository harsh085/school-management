<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OlearningM extends CI_Model
{
	 /*function can_login($username , $password)
  	{
    
	    $this->db->where('EmpId',$username);
	    $this->db->where('Password',$password);
	    $query = $this->db->get('logint');
	    
	    if($query->num_rows() > 0){
	            return true;
	    	}
	    else {
		        return false;
		    }
    
  	}*/

  	function get_sub_from_class($c){
  		$query = $this->db->query("SELECT name,sub_id FROM subject where 'class_id' = $c");
			return $query->result_array();
  	}
  	function get_chap_from_class_sub($s){
  		$query = $this->db->query("SELECT chap FROM chapSub where 'sub_id'=$s ");
			return $query->result_array();
  	}
}
?>