<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marksheet extends CI_Controller {

public function __construct()
	{
		parent::__construct();

		// loading the users model
		// $this->load->model('LoginM');
		$this->load->model('StudentM');
		$this->load->model('MarksM');

		// $this->load->model('ClassM');
		// $this->load->model('SubjectM');
		// $this->load->model('TeachersM');

		// loading the form validation library
		// $this->load->library('form_validation');
		$this->load->library('pdf');
		$this->load->library('form_validation');
	}
	function redirect_primary(){
		$this->primary('0');
	}
	function redirect_middle(){
		$this->middle('0');
	}


	function selectClassEnterMarks()
	{

		$data["classData"]=$this->StudentM->fetch_class();
		// $data["classData"]=$this->StudentM->fetch_marks(2);
		// $data["red"]=false;
		//if ($s != '0') {
			# code...
			// $data["something"] = $s;
		//}

		// print_r($data);

		$this->load->view('dashboard/header');
		$this->load->view('marksheet/selectClassEnterMarks.php',$data);
		$this->load->view('dashboard/footer');
	}
	function editMarksMarksheet(){   // for edit button .. NA for now
		$cls = $this->input->post("cls");
		$sess = $this->input->post("sess");
		if ($cls==1 || $cls==2 || $cls==3 || $cls==4 || $cls==5 || $cls==6 || $cls==7 || $cls==8 || $cls==9 || $cls==101 || $cls==102 || $cls==103 ) {

		}
		else{
			# code...
			echo "<script> alert('Class out of bound.');</script>";
			return "";
		}
		$data = array(
          "schNo"=>$this->input->post("schNo"),
          "class_id"=>$cls,
          "hin"=>$this->input->post("hin"),
          "eng"=>$this->input->post("eng"),
          "maths"=>$this->input->post("maths"),
          "scie"=>$this->input->post("scie"),
          "sst"=>$this->input->post("sst"),
          "evs"=>$this->input->post("evs"),
          "sansk"=>$this->input->post("sans")
          );

					switch ($sess) {
						case '2020-21':
							// code...
								$result = $this->MarksM->insertMarks21($data);
							break;
						case '2021-22':
								// code...
									$result = $this->MarksM->insertMarks22($data);
							break;
						case '2022-23':
								// code...
									$result = $this->MarksM->insertMarks23($data);
							break;
						default:
							// code...
							echo "<script> alert('Session out of bound.');</script>";
							return "";
							break;
					}


		print_r($data);
		// echo $result;
		if($result){
			echo "<script> alert('Updated Successfully...'); window.close(); </script>";
		}
		else{
			echo "<script> alert('Some Error Happened... Try again...\n\nor contact administrator..');</script>";
		}

	}

	function enterMarks()
	{
		$clas = $this->input->post("clas");
		// $data["classData"]=$this->StudentM->fetch_class();
		$data["classData"]=$this->StudentM->fetch_marks($clas);
		$data["clas"] = $this->StudentM->fetch_class_name($clas);
		// $data["red"]=false;
		//if ($s != '0') {
			# code...
			// $data["something"] = $s;
		//}

		// print_r($data);

		$this->load->view('dashboard/header');
		$this->load->view('marksheet/enterMarks.php',$data);
		$this->load->view('dashboard/footer');
	}
	function submitBulkMarks(){
		// print_r($this->input->post("schNo"));
		$dat=array(
			"schNo"=>$this->input->post("schNo"),
          "hin"=>$this->input->post("hi"),
          "eng"=>$this->input->post("en"),
          "maths"=>$this->input->post("ma"),
          "scie"=>$this->input->post("scie"),
          "sst"=>$this->input->post("sstt"),
          "evs"=>$this->input->post("ev"),
          "sansk"=>$this->input->post("san"),
          "attd"=>$this->input->post("at")
      );
		$clas = $this->input->post("clas");
		// echo $clas;
		$result = $this->MarksM->bulkMarks($dat,$clas);
		echo " <h3 style='color:green;'> Success! </h3>";
		// print_r($result);
		// if($result=="Success"){

		// }
		// echo(count($dat["rollNo"]));

	}

	function primary($s)
	{

		// $data["classData"]=$this->StudentM->fetch_class();
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			$data["something"] = $s;
		//}

		// print_r($data);

		$this->load->view('dashboard/header');
		$this->load->view('marksheet/primary.php',$data);
		$this->load->view('dashboard/footer');
	}

	function manageMarksheet(){
		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		$this->load->view("dashboard/header");
		$this->load->view("marksheet/manageMarks", $data);
		$this->load->view("dashboard/footer");
	}

	function viewMarksheet(){
		$sch = $this->input->post("sch");
		$data["info"]=$this->StudentM->fetch_marksheet($sch); // change acording to current sesssion every year
		$data["marks21"]=$this->StudentM->fetch_marks21($sch);
		$data["marks22"]=$this->StudentM->fetch_marks22($sch);
		$data["marks23"]=$this->StudentM->fetch_marks23($sch);
		$data["logs"]=$this->MarksM->fetch_logs($sch);
		$data["classData"]=$this->StudentM->fetch_class();
		// $data["red"]=false;
		// print_r();
		$this->load->view("dashboard/header");
		$this->load->view("marksheet/viewMarks", $data);
		$this->load->view("dashboard/footer");
	}
	function manage()
	{

		// $data["classData"]=$this->StudentM->fetch_class();

		$this->load->view('dashboard/header');
		$this->load->view('marksheet/manageMarks.php');
		$this->load->view('dashboard/footer');
	}
	function middle($s)
	{

		$data["classData"]=$this->StudentM->fetch_class();
		$data["red"]=false;
		//if ($s != '0') {
			# code...
			$data["something"] = $s;
		//}

		// print_r($data);

		$this->load->view('dashboard/header');
		$this->load->view('marksheet/middle.php', $data);
		$this->load->view('dashboard/footer');
	}
	// function marksheet(){

	//  }
	// function addStd($s){
	// 	$data["classData"]=$this->StudentM->fetch_class();
	// 	$data["red"]=false;
	// 	//if ($s != '0') {
	// 		# code...
	// 		$data["something"] = $s;
	// 	//}

	// 	// print_r($data);
	// 	$this->load->view("dashboard/header");
	// 	$this->load->view("dashboard/addStd", $data);
	// 	$this->load->view("dashboard/footer");
	// }
	 function save_details(){

	 	$validate_data = array(
			array(
				'field' => 'roll',
				'label' => 'Roll No',
				'rules' => 'required'
			),
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
				'field' => 'dob',
				'label' => 'Date of Birth',
				'rules' => 'required'
			)
		);

			// $userDob = date("d-m-Y", strtotime($this->input->post("dob")));
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
		if($this->form_validation->run() == true) {

	 	if($this->input->post("temp")){
	 	$dat=array(
          "rollNo"=>$this->input->post("roll"),
          "schNo"=>$this->input->post("sch"),
          "fullName"=>$this->input->post("fullname"),
          "Fname"=>$this->input->post("fname"),
          "Mname"=>$this->input->post("mname"),
          // "image"=>$imgurl,
          "class_id"=>$this->input->post("clas"),
          "dob"=>$userDob,
          "attnd"=>$this->input->post("attendance"),
          "caste"=>$this->input->post("cast"),
          "adhar"=>$this->input->post("adhar"),
          "sssmid"=>$this->input->post("sssm"),
          "eng"=>$this->input->post("english"),
          "maths"=>$this->input->post("maths"),
          "hin"=>$this->input->post("hindi"),
          "evs"=>$this->input->post("evs")
          );
	 		}
	 	else{
	 		$dat=array(
          "rollNo"=>$this->input->post("roll"),
          "schNo"=>$this->input->post("sch"),
          "fullName"=>$this->input->post("fullname"),
          "Fname"=>$this->input->post("fname"),
          "Mname"=>$this->input->post("mname"),
          // "image"=>$imgurl,
          "class_id"=>$this->input->post("clas"),
          "dob"=>$userDob,
          "attnd"=>$this->input->post("attendance"),
          "caste"=>$this->input->post("cast"),
          "adhar"=>$this->input->post("adhar"),
          "sssmid"=>$this->input->post("sssm"),
          "eng"=>$this->input->post("english"),
          "maths"=>$this->input->post("maths"),
          "hin"=>$this->input->post("hindi"),
          "sst"=>$this->input->post("sst"),
          "scie"=>$this->input->post("science"),
          "sansk"=>$this->input->post("sans")
          );
	 			}

				$result = $this->StudentM->insert_std($dat);
				$this->primary($result);

			}
			else{
				$this->primary('0');
			}


		// $result = $this->StudentM->insert_std($dat);

		// $dat['total']  = strval($dat['eng']+$dat['hin']+$dat['maths']+$dat['evs'])."/480";

	}

		function calculat_grades($p){
			// $p = (($m/120)*100);
			// $p = $m;
			if($p>=86){
			return array("A2","A1","A1","A1");
			}
			else if($p>=71){
				return array("A2","A2","A1","A2");
			}
			else if($p>=61){
				return array("B1","B2","A2","B1");
			}
			else if($p>=51){
				return array("B1","B2","B2","B2");
			}
			else if($p>33){
				return array("B1","C","C","C");
			}
			else{
				return array("C","D","C","D");
			}

}
function calculat_tatal_grade($p){
			// $p = (($m/480)*100);
		if($p>=85){
			$arr[0] = "A1";
			$arr[1] = "Well done";
		}
		else if($p>=70){
			$arr[0] = "A2";
			$arr[1] = "Very Good";	}
		else if($p>=60){
			$arr[0] = "B1";
			$arr[1] = "Good but can be better";	}
		else if($p>=50){
			$arr[0] = "B2";
			$arr[1] = "Constantly improving";	}
		else if($p>=33){
			$arr[0] = "C";
			$arr[1] = "Needs improvement";		}
		else{
			$arr[0] = "D";
			$arr[1] = "Need lots of improvement";	}
			return $arr;

}

	 function createMarksheet(){
	 	/*
	 	$newDate = date("d-m-Y", strtotime($this->input->post("dob")));
	 	$dat=array(
          "rollNo"=>$this->input->post("roll"),
          "schNo"=>$this->input->post("sch"),
          "fullName"=>$this->input->post("fullname"),
          "Fname"=>$this->input->post("fname"),
          "Mname"=>$this->input->post("mname"),
          // "image"=>$imgurl,
          "class_id"=>$this->input->post("clas"),
          "dob"=>$newDate,
          "caste"=>$this->input->post("cast"),
          "eng"=>$this->input->post("english"),
          "maths"=>$this->input->post("maths"),
          "hin"=>$this->input->post("hindi"),
          "evs"=>$this->input->post("evs")
          );

		*/

		// $dat['total']  = strval($dat['eng']+$dat['hin']+$dat['maths']+$dat['evs'])."/480";


		$sch=$this->input->post("sch");
		$result = $this->MarksM->fetch_marks_session($sch);

		$arr = (array) $result[0];

		if($arr['adhar'] == "0"){
			$arr['adhar'] = '';
		}
		if($arr['attd'] == "0"){
			$arr['attd'] = '';
		}
		if($arr['sssmid'] == "0"){
			$arr['sssmid'] = '';
		}
		$arr['dob'] = date("d-m-Y", strtotime($arr['dob']));
		$arr['sess'] = substr($sch,-2);
		// print_r($arr);

		$this->send($arr['fullName'],$arr['class_name'],$sch);

		//  = $newDate;

		if($arr['class_id'] == 101 || $arr['class_id'] == 102 || $arr['class_id'] == 103 || $arr['class_id'] == 1 || $arr['class_id'] == 2 || $arr['class_id'] == 3 || $arr['class_id'] == 4 || $arr['class_id'] == 5)
		{
			$temp = $arr['eng']+$arr['hin']+$arr['maths']+$arr['evs'];
			$arr['total']  = strval($temp)."/400";
			$arr['totalg'] = $this->calculat_tatal_grade(($temp/400)*100);
			// $arr['tremarks'] =
			$arr['engm'] = $this->calculat_grades($arr['eng']);
			$arr['mathsm'] = $this->calculat_grades($arr['maths']);
			$arr['hinm'] = $this->calculat_grades($arr['hin']);
			$arr['evsm'] = $this->calculat_grades($arr['evs']);
			$this->load->view('marksheet/marksheet_p.php',$arr);
		}
		else
		{

			$temp = $arr['eng']+$arr['hin']+$arr['maths']+$arr['sst']+$arr['scie']+$arr['sansk'];
			$arr['total']  = strval($temp)."/600";
			$arr['totalg'] = $this->calculat_tatal_grade(($temp/600)*100);
			// $arr['tremarks'] =
			$arr['engm'] = $this->calculat_grades($arr['eng']);
			$arr['mathsm'] = $this->calculat_grades($arr['maths']);
			$arr['hinm'] = $this->calculat_grades($arr['hin']);
			$arr['sstm'] = $this->calculat_grades($arr['sst']);
			$arr['scm'] = $this->calculat_grades($arr['scie']);
			$arr['sansm'] = $this->calculat_grades($arr['sansk']);

	 		$this->load->view('marksheet/marksheet_m.php',$arr);
	 	}


	 	$html = $this->output->get_output();

		// $this->pdf->loadHtml($html_content);
		// 	$this->pdf->render();
		// $this->dompdf->load_html($aData['html']);
		//this->dompdf->set_option('isRemoteEnabled',TRUE);
		$this->pdf->load_html($html);
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->render();
		// Instantiate canvas instance
		$canvas = $this->pdf->getCanvas();

		// Get height and width of page
		$w = $canvas->get_width();
		$h = $canvas->get_height();

		// Specify watermark image
		$imageURL = 'images/logom.png';
		$imgWidth = 500;
		$imgHeight = 500;

		// Set image opacity
		$canvas->set_opacity(.1);

		// Specify horizontal and vertical position
		$x = (($w-$imgWidth)/2);
		$y = (($h-$imgHeight)/2);

		// Add an image to the pdf
		$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);

		// Output the generated PDF (1 = download and 0 = preview)
		// $pdf->stream('document.pdf', array("Attachment" => 0));

		$this->pdf->stream($arr["fullName"].".pdf", array("Attachment"=>0));

	 }


function showMarksheetTable(){

	 $class = $this->input->post("clas");
	 $data=$this->StudentM->fetch_students($class);
	 $class_n = $this->StudentM->fetch_class_name($class);
	 // print_r($class_n->class_name);
	 echo "<center><h3>Students of Class $class_n->class_name</h3></center>";
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
						<td>
							<form action="<?php echo base_url('marksheet/viewMarksheet') ?>" method="post">
							  <input type="hidden" name="sch" value="<?php echo $value['schNo'];?>">
							  <button class="btn btn-success" id="edit<?php echo $value['schNo'];?>" type="submit" ><b>View</b></button>
							</form><br>
							<?php if($this->session->userdata('level') == '1'){ //for only admin level
								?>
							<button value="<?php echo $value['schNo'];?>" onclick="deleteStudent(this)" class="btn btn-danger">Delete</button> <?php } ?>

						</td>

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
				function deleteStudent(val){
					val.setAttribute("disabled", false);

					// document.getElementById('marksheet'+val.value).setAttribute("disabled", false);
					// alert(val.value);
					// document.getElementById('edit'+val.value).setAttribute("disabled", false);

					var x = val.getAttribute('value');
					if(confirm("Do you want to PERMANENTLY delete this student.")){
						$.ajax({
							url: "<?php echo base_url('marksheet/deleteStudent') ?>",
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

function oldStudents(){
	$data["classData"]=$this->StudentM->fetch_alumni_students();
	$this->load->view("dashboard/header");
	$this->load->view("marksheet/manageAlumniMarks", $data);
	$this->load->view("dashboard/footer");
}
function update_std(){
		$sch = $this->input->post("sch");
					$dat=array(
							"schNo"=>$sch,
							"fullName"=>$this->input->post("fullname"),
							"Fname"=>$this->input->post("fname"),
							"Mname"=>$this->input->post("mname"),
							"dob"=>$this->input->post("dob"),
							"caste"=>$this->input->post("caste"),
							"adhar"=>$this->input->post("adhar"),
							"sssmid"=>$this->input->post("sssm")
							);
							// print_r($dat);
						$result = $this->StudentM->update_std_marksheet($dat);
						if($result){
							echo "<script> alert('Updated Successfully...');</script>";
						}
						else{
							echo "<script> alert('Some Error Happened... Try again...\n\n$result');</script>";
						}
						$data["info"]=$this->StudentM->fetch_marksheet($sch); // change acording to current sesssion every year
						$data["marks21"]=$this->StudentM->fetch_marks21($sch);
						$data["marks22"]=$this->StudentM->fetch_marks22($sch);
						$data["marks23"]=$this->StudentM->fetch_marks23($sch);
						$data["logs"]=$this->MarksM->fetch_logs($sch);
						$data["classData"]=$this->StudentM->fetch_class();
						// $data["red"]=false;
						// print_r();
						$this->load->view("dashboard/header");
						$this->load->view("marksheet/viewMarks", $data);
						$this->load->view("dashboard/footer");

			// print_r($dat);
			// print($schNo);
	}

function addOldMarks(){

}

	function deleteStudent(){

	 	$roll = $this->input->post("roll");

		$data=$this->StudentM->delete_student($roll);

		echo $data;

	}
	function enableStudent(){

	 	$roll = $this->input->post("roll");

		$data=$this->StudentM->enable_student($roll);

		echo $data;

	}



	 public function send($name,$class,$sch)
	 {
	 	$sess = substr($sch,-2);
		$sch = substr($sch,0,-2);

	 	$this->load->helper('date');
        $format = "%d-%m-%Y %h:%i %a";
        $d = mdate($format);
    	$log_data = array(
    					'schNo' => $sch,
              'time'   => $d,
              'emplName'    => $this->session->userdata('user'),
              'session' => $sess,
							'count' => 1
              );
    	$this->MarksM->marksheet_logs($log_data);
	 }
	/*{
		$this->load->library('email');
	          // Pass here your mail id

		$this->load->helper('date');
        $format = "%d-%m-%Y %h:%i %a";
        $d = mdate($format);

	    $emailContent = '<!DOCTYPE><html><head></head><body><p>Details:</p><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td padding-left:3%"></td></tr>';
	    $emailContent .='<tr><td style="height:20px"></td></tr>';


	    // $emailContent .= $this->input->post('message');  //   Post message available here

		$emailContent .= '<tr><td padding-left:3%">name: '.$name.'</td></tr>';
		$emailContent .= '<tr><td padding-left:3%">class: '.$class.'</td></tr>';
		$emailContent .= '<tr><td padding-left:3%">time: '.$d.'</td></tr>';
	    $emailContent .='<tr><td style="height:20px"></td></tr></body></html>';


	    $config['protocol']    = 'smtp';
	    $config['smtp_host']    = 'ssl://smtp.gmail.com';
	    $config['smtp_port']    = '465';
	    $config['smtp_timeout'] = '60';

	    $config['smtp_user']    = 'maa.sharda.school.dhar@gmail.com';    //Important
	    $config['smtp_pass']    = 'harshitnigam';  //Important

	    $config['charset']    = 'utf-8';
	    $config['newline']    = "\r\n";
	    $config['mailtype'] = 'html'; // or html
	    // $config['validation'] = TRUE; // bool whether to validate email or not



		$this->email->initialize($config);
		$this->email->set_mailtype("html");
	    $this->email->from('maa.sharda.school.dhar@gmail.com', 'Alert :New Marksheet');
		$this->email->to('harshitnigam0885@gmail.com');
		$this->email->cc('maashardaschool16@gmail.com');
		$this->email->bcc('kanishknigamw@gmail.com');
		$this->email->subject('New Marksheet Downloaded');
		$this->email->message($emailContent);
		$this->email->send();

	    // $this->session->set_flashdata('msg',"Mail has been sent successfully");
	    // $this->session->set_flashdata('msg_class','alert-success');
	}
*/
}
?>
