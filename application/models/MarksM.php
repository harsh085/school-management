<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarksM extends CI_Model
{
	function bulkMarks($i,$c)
	{
		$s = array();
		// return($i[0]);

		if($c>5 && $c<10){
			for($x = 0; $x < count($i["schNo"]); $x++) {
				$insert_data = array(
					'schNo'	=> $i["schNo"][$x] ,
					'class_id'	=> $c ,
					'hin'	=> $i["hin"][$x] ,
					'eng'	=> $i["eng"][$x] ,
					'maths' => $i["maths"][$x] ,
					'scie' 	=> $i["scie"][$x] ,
					'sst' 	=> $i["sst"][$x],
					'sansk'	=> $i["sansk"][$x],
					'attd'	=> $i["attd"][$x]
				);
				$status = $this->db->replace('marks2023', $insert_data);
				array_push($s,$status);
			// print_r($insert_data);
			}
		}
		else{
			for($x = 0; $x < count($i["schNo"]); $x++) {
				$insert_data = array(
					'schNo'	=> $i["schNo"][$x] ,
					'class_id'	=> $c ,
					'hin'	=> $i["hin"][$x] ,
					'eng'	=> $i["eng"][$x] ,
					'maths' => $i["maths"][$x] ,
					'evs'	=> $i["evs"][$x],
					'attd'	=> $i["attd"][$x]
				);
				$status = $this->db->replace('marks2023', $insert_data);
				array_push($s,$status);
			// print_r($insert_data);
			// echo "\n";
			}
		}
		// if(isset($i["sansk"][4])){
		// 	echo "n";
		// }
		// if(isset($i["hin"][4])){
		// 	echo $c;
		// }

		return $s;
	}

	 function marksheet_logs($arr)
  	{
			$sch = $arr['schNo'];
			$sess =$arr['session'];
			$t = $arr["time"];
			$emp=$arr["emplName"] ;
 			$query = $this->db->query("SELECT * FROM logs WHERE schNo=$sch and session=$sess");

 			if($query->num_rows() > 0){
 							return $this->db->query("UPDATE logs SET count=count+1 ,time='$t', emplName='$emp' WHERE schNo=$sch and session=$sess");
 				}

 			else{
 				return $this->db->insert('logs', $arr);
 			}

  	}


	 function fetch_logs($sch)
  	{
	   $query = $this->db->query("SELECT * FROM logs WHERE schNo='$sch'; ");

			// echo $query;
			return $query->result();
  	}




  	public function fetch_marks_session($sch){
  			$sess = substr($sch,-2);
			$sch = substr($sch,0,-2);
			// echo $sess." ".$sch;

			$query = $this->db->query("SELECT * FROM student CROSS JOIN marks20$sess CROSS JOIN class WHERE student.schNo='$sch' and marks20$sess.schNo = student.schNo and marks20$sess.class_id = class.class_id;");

			// echo $query;
			return $query->result_array();
	}

	function insertMarks23($i)
	{
		// print_r($i["schNo"]);
		$this->db->where('schNo',$i["schNo"]);
			$query = $this->db->get('marks2023');

			if($query->num_rows() > 0){
							return $this->db->replace('marks2023', $i);
				}

			else{
				return $this->db->insert('marks2023', $i);
			}

	}
	function insertMarks22($i)
	{
		// print_r($i["schNo"]);
		$this->db->where('schNo',$i["schNo"]);
	    $query = $this->db->get('marks2022');

	    if($query->num_rows() > 0){
	            return $this->db->replace('marks2022', $i);
	    	}

	    else{
	    	return $this->db->insert('marks2022', $i);
	    }

	}

	function insertMarks21($i)
	{
		// print_r($i["schNo"]);
		$this->db->where('schNo',$i["schNo"]);
	    $query = $this->db->get('marks2021');

	    if($query->num_rows() > 0){
	            return $this->db->replace('marks2021', $i);
	    	}

	    else{
	    	return $this->db->insert('marks2021', $i);
	    }

	}



}
?>
