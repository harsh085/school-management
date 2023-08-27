<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// loading the users model

		$this->load->model('StudentM');
		// $this->load->model('ClassM');
		// $this->load->model('SubjectM');
		// $this->load->model('TeachersM');

		// loading the form validation library
		$this->load->library('form_validation');

	}
	function index(){
		 $this->master("index");
	}
	function details(){
		// $this->load->model('LoginM');
		// $data["EmpData"]=$this->LoginM->fetch_emp_data($this->session->userdata('id'));
		// $data["logs"]=$this->MarksM->fetch_all_logs($sch);
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			// $data["something"] = $s;
		//}

		// print_r($data);
		$this->load->view("dashboard/header");
		// $this->load->view("dashboard/details", $data);
		$this->load->view("dashboard/footer");
	}
	function classes(){
		// $this->master("");
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			// $data["something"] = $s;
		//}

		// print_r($data);
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/classes", $data);
		$this->load->view("dashboard/footer");
	}
	function addClas(){
		$dat=array(
          "class_id"=>$this->input->post("numericName"),
          "class_name"=>$this->input->post("className")
          );
		$result = $this->StudentM->insert_cls($dat);
	}
	function subject(){
		// $this->master("");
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			// $data["something"] = $s;
		//}

		// print_r($data);
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/subject", $data);
		$this->load->view("dashboard/footer");
	}
	// ----------------------------------------------------------------------
	function addSt(){
		$this->addStd('0');
	}
	function addBSt(){
		$this->addBulkStd('0');
	}
	//------------------------------------------------------------------------
	function addStd($s){
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			$data["something"] = $s;
		//}

		// print_r($data);
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/addStd", $data);
		$this->load->view("dashboard/footer");
	}
	function addBulkStd($bs){
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			$data["something"] = $bs;
		//}

		// print_r($data);
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/addBukStd", $data);
		$this->load->view("dashboard/footer");

	}
	function manageStd(){
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/manageStd", $data);
		$this->load->view("dashboard/footer");
	}

	function master($page){
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/$page");
		$this->load->view("dashboard/footer");

	}


	//-------------------------------------------vvvvvvv----------------------------------------
	function add_b_std(){
		$dat=array(
			"schNo"=>$this->input->post("sch"),
          "rollNo"=>$this->input->post("roll"),
          "fullName"=>$this->input->post("name"),
          "class_id"=>$this->input->post("clas"),
          "contact"=>$this->input->post("phone"),
          "dob"=>$this->input->post("dob")
      );

		// print_r($dat);
		for($x = 0; $x < count($dat["schNo"]); $x++) {

		$checkRollExist = $this->StudentM->check_roll_already($dat["schNo"][$x]);
		if($checkRollExist > 0){
			echo  "<h4><b>".$dat["schNo"][$x]."</b><span style='color:red;'> Scholar Num Already exists...<br>Try Different Scholar num... </span></h4>";
			die();
		}
		}

		$result = $this->StudentM->insert_b_std($dat);

		echo " <h3 style='color:green;'> Success! </h3>";
		// if($result=="Success"){

		// }
		// echo(count($dat["rollNo"]));

	}

	function add_std(){

		$validate_data = array(

			array(
				'field' => 'fullname',
				'label' => 'Full Name',
				'rules' => 'required'
			),
			array(
				'field' => 'fname',
				'label' => "Father's Name",
				'rules' => 'required'
			),
			array(
				'field' => 'mname',
				'label' => "Mother's Name",
				'rules' => 'required'
			),
			array(
				'field' => 'clas',
				'label' => 'Class',
				'rules' => 'required'
			),
			array(
				'field' => 'contact',
				'label' => 'Contact',
				'rules' => 'required'
			),
			array(
				'field' => 'block',
				'label' => 'Block',
				'rules' => 'required'
			),
			array(
				'field' => 'city',
				'label' => 'City',
				'rules' => 'required'
			),
			array(
				'field' => 'dob',
				'label' => 'Date of Birth',
				'rules' => 'required'
			)
			);

			$userDob = $this->input->post("dob");
			$dob = new DateTime($userDob);
			$now = new DateTime();
			$difference = $now->diff($dob);
			$age = $difference->y;
			// if($age>20){
	  //       	echo "<h2><center>Date is not appropriate...</center></h2>";
	  //       	die();
	  //       	}
			$this->form_validation->set_rules($validate_data);
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			// echo "string";
		if($this->form_validation->run() == true) {
			$dat=array(
					array(
								"schNo"=>$this->input->post("sch"),
			          "fullName"=>$this->input->post("fullname"),
			          "Fname"=>$this->input->post("fname"),
			          "Mname"=>$this->input->post("mname"),
			          // "image"=>$imgurl,
			          "age"=>$age,
			          "caste"=>$this->input->post("cast"),
			          "adhar"=>$this->input->post("adhar"),
			          "sssmid"=>$this->input->post("sssm"),
			          "contact"=>$this->input->post("contact"),
			          "address"=>$this->input->post("address"),
			          "block"=>$this->input->post("block"),
			          "city"=>$this->input->post("city"),
			          "dob"=>$userDob,
			          "rdate"=>$this->input->post("regDate")
			          ),
					array("schNo"=>$this->input->post("sch"),"class_id"=>$this->input->post("clas"))

				);
					// print_r($dat);
					$result = $this->StudentM->insert_std($dat);
					$this->addStd($result);

			}
			else{
				// echo "string";
				$this->addStd('0');
			}

	}
	//--------------------------------------------AAAAAAAA------------------------------------------------
		/*public function uploadImage()
	{
		$type = explode('.', $_FILES['file']['name']);
		$type = $type[count($type)-1];
		$url = 'assets/images/students/'.uniqid(rand()).'.'.$type;
		if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
			if(is_uploaded_file($_FILES['file']['tmp_name'])) {
				if(move_uploaded_file($_FILES['file']['tmp_name'], $url)) {
					return $url;
				}	else {
					return false;
				}
			}
		}
	}*/



function showStudentTable(){

	 $class = $this->input->post("clas");
	 $data=$this->StudentM->fetch_students($class);
	 $class_n = $this->StudentM->fetch_class_name($class);
	 // print_r($class_n->class_name);
	 echo "<center><h2>2022-23</h2><h3>Students of Class $class_n->class_name</h3></center>";
	?>
		<input class="form-control" id="myInput" type="text" placeholder="Search.."><br>
			<table id="myTable" class="table table-striped table-bordered" >
				<tr>
					<th>
						Sr.
					</th>
					<th>
						Student Name (Scholar No.)
					</th>

					<th>
						Father Name
					</th>
						<!-- <th>
							SSSM Id
						</th>
						<th>
							Address
						</th> -->
					<th>
						Action
					</th>
				</tr>
	<?php
	$temp = 1;
	if($data){
			foreach ($data as $key => $value) {
	?>


				<tr>
				<td> <?php echo $temp;
						$temp++; ?>.</td>
					<td style=" text-transform: uppercase;">
						<?php echo $value['fullName']." ( ".$value['schNo']." ) "; ?>
					</td>
					<td style=" text-transform: uppercase;">
						<?php echo $value['fname']; ?>
					</td>
					<!-- <td>
						<?php //echo $value['sssmid']; ?>
					</td>
					<td>
						<?php //echo $value['address']; ?>
					</td> -->
					<td>
						<form action="<?php echo base_url('dashboard/updateStudent') ?>" target="_blank" method="post">
						  <input type="hidden" name="sch" value="<?php echo $value['schNo'];?>">
						  <button class="btn btn-primary" id="edit<?php echo $value['schNo'];?>" type="submit" >Edit</button>
						</form>

						<!-- <button value="<?php //echo $value['rollNo'];?>" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Edit</button>&emsp; -->

						<button value="<?php echo $value['schNo'];?>" onclick="disableStudent(this)" class="btn btn-danger">Remove</button>

					</td>
					<!-- <td>
						<form action="<?php //echo base_url('marksheet/create_marksheet_p') ?>" target="_blank" method="post">
						  <input type="hidden" name="sch" value="<?php //echo $value['schNo'];?>">
						  <button class="btn btn-primary" id="marksheet<?php //echo $value['schNo'];?>" type="submit" >Marksheet</button>
						</form>
					</td> -->


				</tr>

	<?php
			}
	}  ?>

			</table>
			 <script type="text/javascript">
			 $(document).ready(function(){
				$("#myInput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#myTable tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			 });

				function disableStudent(val){
					val.setAttribute("disabled", false);

					// document.getElementById('marksheet'+val.value).setAttribute("disabled", false);
					// alert(val.value);
					// document.getElementById('edit'+val.value).setAttribute("disabled", false);

					var x = val.getAttribute('value');
					if(confirm("Do you want to delete this student.")){
						$.ajax({
							url: "<?php echo base_url('dashboard/disableStudent') ?>",
							type: "POST",
							data: {
								roll: x
							},
							cache: false,
							success: function(msg) {
			        			alert(msg);
	        				}
						});
					}
					else{
						val.removeAttribute("disabled");
					}

				}

			</script>

	<?php
	}




function disableStudent(){

 	$roll = $this->input->post("roll");

	$data=$this->StudentM->disable_student($roll);

	echo $data;

}



function updateStudent(){

 	$sch = $this->input->post("sch");
	$data['data'] = $this->StudentM->fetch_student($sch);
	$data['classData'] = array($this->StudentM->fetch_class($sch));
	// print_r($this->StudentM->fetch_class($sch));
	// $i = ($data->row('class_id'));
	// echo $this->StudentM->fetch_class_name($i);
	$this->load->view("dashboard/header");
	$this->load->view("dashboard/editStudents", $data);
	$this->load->view("dashboard/footer");

	// print_r($data);
}


	function update_std(){
		$userDob = $this->input->post("dob");
		$dob = new DateTime($userDob);
		$now = new DateTime();
		$difference = $now->diff($dob);
		$age = $difference->y;
		// print($age);
		// $schNo= $this->input->post("sch");
		$oldsch = $this->input->post("oldsch");
		$newsch = $this->input->post("newsch");

		if($oldsch == $newsch){
					$dat=array(
							array(
								"schNo"=>$oldsch,
			          "fullName"=>$this->input->post("fullname"),
			          "Fname"=>$this->input->post("fname"),
			          "Mname"=>$this->input->post("mname"),
			          // "image"=>$imgurl,
			          "age"=>$age,
			          "contact"=>$this->input->post("contact"),
			          "address"=>$this->input->post("address"),
			          "block"=>$this->input->post("block"),
			          "city"=>$this->input->post("city"),
			          "dob"=>$userDob,
			          "caste"=>$this->input->post("cast"),
			          "adhar"=>$this->input->post("adhar"),
			          "sssmid"=>$this->input->post("sssm")
			          ),
							array("schNo"=>$oldsch,"class_id"=>$this->input->post("clas"))
			          );
							$result = $this->StudentM->update_std($dat);
							if($result){
								echo "<script> alert('Updated Successfully...'); window.close(); </script>";

							}
							else{
								echo "<script> alert('Some Error Happened... Try again...\n\n$result');</script>";
							}
				}
				else{
					// echo $oldsch."  ".$newsch;
						$dat=array(
							array(
								"schNo"=>$newsch,
			          "fullName"=>$this->input->post("fullname"),
			          "Fname"=>$this->input->post("fname"),
			          "Mname"=>$this->input->post("mname"),
			          // "image"=>$imgurl,
			          "age"=>$age,
			          "contact"=>$this->input->post("contact"),
			          "address"=>$this->input->post("address"),
			          "block"=>$this->input->post("block"),
			          "city"=>$this->input->post("city"),
			          "dob"=>$userDob,
			          "caste"=>$this->input->post("cast"),
			          "adhar"=>$this->input->post("adhar"),
			          "sssmid"=>$this->input->post("sssm")
			          ),
							array("schNo"=>$oldsch,"class_id"=>$this->input->post("clas"))
			          );
							$result = $this->StudentM->update_std_sch($dat);
							if($result){
								echo "<script> alert('Updated Successfully...'); window.close(); </script>";

							}
							else{
								echo "<script> alert('Some Error Happened... Try again...\n\n$result');</script>";
							}
				}
				// print_r($dat);
				// print($schNo);
		}



/*
function showSubjectTable(){

	 $class = $this->input->post("clas");
	 $data=$this->StudentM->fetch_subjects($class);
	 echo "<center><h3>Class $class Subjects</h3></center>";
	?>

			<table class="table table-bordered table-striped">
				<tr>
					<th>

					</th>
					<th>
						Subject Name
					</th>
					<th>

					</th>

					<th>
						Action
					</th>
				</tr>
	<?php

	if($data){
			foreach ($data as $key => $value) {
	?>


				<tr>
				<td></td>
					<td>
						<?php echo $value['name']; ?>
					</td>
					<td>
						<?php //echo $value['']; ?>
					</td>

					<td>
						<button value="<?php echo $value['class_id'];?>" data-toggle="modal" data-target="#myModal" onclick="editStudent(this)" class="btn btn-primary">Edit</button>&emsp;
						<button value="<?php echo $value['class_id'];?>" onclick="removeStudent(this)" class="btn btn-danger">Remove</button>
					</td>


				</tr>

	<?php
			}
	}  ?>

			</table>
<!-- 			<button type="button" class="btn btn-info btn-lg" >Open Modal</button>
 -->
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Edit Details</h4>
			      </div>
			      <div class="modal-body">
			        <p>Some text in the modal.</p>
			      </div>
			      <div class="modal-footer">
			      	<div id="harsh"></div>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

			<script type="text/javascript">
				function removeStudent(val){
					val.setAttribute("disabled", false);
					var x = val.getAttribute('value');
					if(confirm("Do you want to delete this student.")){
						$.ajax({
							url: "<?php echo base_url('dashboard/removeStudent') ?>",
							type: "POST",
							data: {
								roll: x
							},
							cache: false,
							success: function(msg) {
			        			alert(msg);
	        				}
						});
					}
					else{
						val.removeAttribute("disabled");
					}

				}

				function editStudent(val){
					$('#harsh').html("vghjkl");
				}
			</script>

	<?php
	}


*/
}

?>
