<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentM extends CI_Model
{

	public function insert_std($i)
	{
		// if($i['$img_url'] == '') {
		// 	$img_url = 'assets/images/default/default_avatar.png';
		// }
		$this->db->where('schNo',$i[0]["schNo"]);
	    $query = $this->db->get('student');

	    if($query->num_rows() > 0){
	            return "FAILED !!!<br>Scholar Number already exists.";
	    	}
		// print_r($i);

		if ($this->db->insert('student', $i[0]) && $this->db->insert('marks2023', $i[1]))
		{
			return "Success!";
		}
		else
		{
			return "Failed!";
		}
	}
	public function insert_cls($i)
	{
		// if($i['$img_url'] == '') {
		// 	$img_url = 'assets/images/default/default_avatar.png';
		// }
		$this->db->where('class_id',$i["class_id"]);
	    $query = $this->db->get('class');

	    if($query->num_rows() > 0){
	            return "Class Already exists... <br>Try Different class... ";
	    	}


		if ($this->db->insert('class', $i))
		{
			return "Success!";
		}
		else
		{
			return "Failed!";
		}
	}


	public function insert_b_std($i){

		$s = array();

		for($x = 0; $x < count($i["schNo"]); $x++) {

			$userDob = $i["dob"][$x];
			$dob = new DateTime($userDob);
			$now = new DateTime();
			$difference = $now->diff($dob);
			$age = $difference->y;

			$insert_data = array(
				'schNo'	=> $i["schNo"][$x] ,
				'rollNo'	=> $i["rollNo"][$x] ,
				'fullname'		=> $i["fullName"][$x] ,
				'class_id' 		=> $i["class_id"][$x] ,
				'contact' 		=> $i["contact"][$x] ,
				'dob' 		=> $userDob,
				'age'	=> $age
			);

			$this->db->where('schNo',$insert_data["schNo"]);
	    	$query = $this->db->get('student');

	    	if($query->num_rows() > 0){
	            return $insert_data['schNo']." sch Num Already exists... <br>Try Different sch num... ";
	    		}

			$status = $this->db->insert('student', $insert_data);
			array_push($s,$status);
		}

		return $s;

	}



		public function check_roll_already($i){

			$this->db->where('schNo',$i);
	    	$query = $this->db->get('student');
	    	return $query->num_rows();
	}

	public function fetch_class(){

			$query = $this->db->query("SELECT * FROM class");
			return $query->result_array();
	}

	public function fetch_marks23($sch){

			$query = $this->db->query("SELECT * FROM marks2023 CROSS JOIN class WHERE schNo = '$sch' and marks2023.class_id = class.class_id");
			return $query->row();

	}

	public function fetch_marks22($sch){

			$query = $this->db->query("SELECT * FROM marks2022 CROSS JOIN class WHERE schNo = '$sch' and marks2022.class_id = class.class_id");
			return $query->row();

	}

	public function fetch_marks21($sch){

			$query = $this->db->query("SELECT * FROM marks2021 CROSS JOIN class WHERE schNo = '$sch' and marks2021.class_id = class.class_id");
			if($query->num_rows() > 0){
	            return $query->row();
	    	}
	    	else{
	    		return 0;
	    	}
	}

	public function fetch_marksheet($sch){

			$query = $this->db->query("SELECT student.fullName, student.Mname, student.Fname,student.dob,student.caste,student.adhar,student.schNo, student.sssmid, class.class_name, class.class_id FROM student CROSS JOIN marks2023 CROSS JOIN class WHERE student.schNo='$sch' and marks2023.schNo = student.schNo and marks2023.class_id = class.class_id;");
			return $query->row();
	}

	public function fetch_class_name($i){

			$query = $this->db->query("SELECT * FROM class where class_id = '$i'");
			return $query->row();
	}


public function fetch_students($c){
			// $this->db->where('class_id',$c);
	    	$query = $this->db->query("SELECT student.fullName,student.fname,student.schNo FROM student CROSS JOIN marks2023 WHERE marks2023.schNo = student.schNo and marks2023.class_id = '$c' and student.active=1 ORDER BY student.fullName");
			// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
			return $query->result_array();
	}

	public function fetch_alumni_students(){
				// $this->db->where('class_id',$c);
		    	$query = $this->db->query("SELECT student.fullName,student.fname,student.schNo FROM student WHERE student.active=0");
				// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
				return $query->result_array();
		}

	public function fetch_students_marks($c){
			// $this->db->where('class_id',$c);
	    	$query = $this->db->query("SELECT student.fullName,student.fname,student.schNo FROM student CROSS JOIN marks2023 WHERE marks2023.schNo = student.schNo and marks2023.class_id = '$c' ORDER BY student.fullName");
			// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
			return $query->result_array();
	}

	public function fetch_subjects($c){
			$this->db->where('class_id',$c);
	    	$query = $this->db->get('subject');
			// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
			return $query->result_array();
	}

public function delete_student($r){
			$this->db->where('schNo',$r);
	    	return ($this->db->delete('student')==true ? "Success" : "Failed");

	}

public function disable_student($r){
			 $query = $this->db->query("UPDATE student SET active=0 WHERE schNo=$r ");
			return ($query == true ? "Success" : "Failed");
	}
	public function enable_student($r){
				 $query = $this->db->query("UPDATE student SET active=1 WHERE schNo=$r ");
				 $sess=fetch_current_session();
				 echo $sess;
				// return ($query == true ? "Success" : "Failed");
		}
		public function fetch_current_session(){
					$query = $this->db->query("SELECT MAX(session_id) from session");
					return $query;
			}

public function fetch_student($roll){
			// $this->db->where('schNo',$roll);
	    	// $query = $this->db->get('student');
			$query = $this->db->query("SELECT * FROM student CROSS JOIN marks2023 WHERE student.schNo=marks2023.schNo and student.schNo = $roll");
			return $query->row();
	}

public function update_std($arr)
	{
		// if($i['$img_url'] == '') {
		// 	$img_url = 'assets/images/default/default_avatar.png';
		// }
		// $this->db->set($arr);
		// $this->db->where('schNo', $id);
		// $q = $this->db->update('student');
		// return $q;
		$sch = $arr[1]["schNo"] ;
		$c = $arr[1]["class_id"] ;
		return $this->db->replace('student', $arr[0]) && $this->db->query("UPDATE marks2023 SET class_id = $c WHERE schNo = $sch");
		//$this->db->replace('marks2022', $arr[1]) ;
	}
	public function update_std_marksheet($arr)
		{
			$sch = $arr["schNo"];
			$fullName = $arr["fullName"];
			$mname = $arr["Mname"];
			$fname = $arr["Fname"];
			$dob = $arr["dob"];
			$caste = $arr["caste"];
			$adhar = $arr["adhar"];
			$sssm = $arr["sssmid"];
			return $this->db->query("UPDATE student SET fullName='$fullName', Mname='$mname', Fname='$fname', dob='$dob', caste='$caste', adhar='$adhar', sssmid='$sssm' WHERE schNo = '$sch'");
		}

public function update_std_sch($arr)
		{
			$oldsch =  $arr[1]["schNo"] ;
			$newsch =  $arr[0]["schNo"] ;
			$cls = $arr[1]["class_id"];

			$this->db->where('schNo',$newsch);
		  $query = $this->db->get('student');
		  if($query->num_rows() > 0){
		           echo "<h1>Scholar Number already exists. <br>Try different scholar number.</h1> ";
							 return false;
		    	}
					// echo "sdf";
			$this->db->where('schNo',$oldsch);
		  $query = $this->db->get('marks2022');
			if($query->num_rows() > 0){
				       $this->db->query("UPDATE marks2022 SET schNo=$newsch WHERE schNo = $oldsch");
				    	}

			$this->db->where('schNo',$oldsch);
			$query = $this->db->get('marks2021');
			if($query->num_rows() > 0){
						$this->db->query("UPDATE marks2021 SET schNo=$newsch WHERE schNo = $oldsch");
						}

			return $this->db->replace('student', $arr[0]) && $this->db->query("DELETE FROM student WHERE schNo = $oldsch") && $this->db->query("UPDATE marks2023 SET class_id =$cls ,schNo=$newsch WHERE schNo = $oldsch" );
		}

	public function fetch_marks($c){
			// $this->db->where('class_id',$c);
	    	$query = $this->db->query("SELECT student.fullName,student.schNo, marks2023.eng, marks2023.evs,marks2023.maths ,marks2023.hin ,marks2023.sst ,marks2023.scie ,marks2023.sansk ,marks2023.attd FROM student CROSS JOIN marks2023 WHERE marks2023.schNo = student.schNo and marks2023.class_id = '$c' and student.active=1 ORDER BY student.fullName");
			// $query = $this->db->query("SELECT * FROM student where 'class_id'=$c ");
			return $query->result_array();
	}


}
?>
