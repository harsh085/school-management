<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginM extends CI_Model
{
	 function can_login($username , $password)
  	{
    
	    $this->db->where('EmpId',$username);
	    $this->db->where('Password',$password);
	    $query = $this->db->get('empl');
	    return $query->result_array();
	    // if($query->num_rows() > 0){
	    //         return $query;
	    // 	}
	    // else {
		   //      return false;
		   //  }
    
  	}

  	public function fetch_emp_data($c){
			$this->db->where('EmpId',$c);
	    	$query = $this->db->get('empl');
			// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
			return $query->result_array();
	}

}
?>