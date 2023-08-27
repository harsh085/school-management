<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marksheet extends CI_Controller {

public function __construct()
	{
		parent::__construct();

		// loading the users model
		// $this->load->model('LoginM');
		$this->load->model('StudentM');
		$this->load->model('Logs');

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

		function calculat_grades($m){
			$p = (($m/120)*100);
		if($p>=91){
			return array("-","A1","A1","A1");
		}
		else if($p>=81){
			return array("-","A2","A1","A2");
		}
		else if($p>=71){
			return array("-","B2","A2","B1");
		}
		else if($p>=61){
			return array("-","B2","B2","B2");
		}
		else if($p>=51){
			return array("-","B2","C","C");
		}
		else{
			return array("-","D","C","D");
		}

}
function calculat_tatal_grade($p){
			// $p = (($m/480)*100);
		if($p>=91){
			$arr[0] = "A1";
			$arr[1] = "Well done";
		}
		else if($p>=81){
			$arr[0] = "A2";
			$arr[1] = "Very Good";	}
		else if($p>=71){
			$arr[0] = "B1";
			$arr[1] = "good but can be better";	}
		else if($p>=61){
			$arr[0] = "B2";
			$arr[1] = "Constently improving";	}
		else if($p>=51){
			$arr[0] = "C";
			$arr[1] = "needs improvement";		}
		else{
			$arr[0] = "D";
			$arr[1] = "need lots of improvement";	}
			return $arr;

}
	 function create_marksheet_p(){
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
		$result = $this->StudentM->fetch_student($sch);
		$arr = (array) $result;
		if($arr['adhar'] == "0"){
			$arr['adhar'] = '';
		}
		if($arr['attnd'] == "0"){
			$arr['attnd'] = '';
		}
		$arr['dob'] = date("d-m-Y", strtotime($arr['dob']));


		$this->send($arr['fullName'],$arr['class_name']);

		//  = $newDate;
//		print_r($arr);
		if($arr['class_id'] == 101 || $arr['class_id'] == 102 || $arr['class_id'] == 103 || $arr['class_id'] == 1 || $arr['class_id'] == 2 || $arr['class_id'] == 3 || $arr['class_id'] == 4 || $arr['class_id'] == 5)
		{
			$temp = $arr['eng']+$arr['hin']+$arr['maths']+$arr['evs'];
			$arr['total']  = strval($temp)."/480";
			$arr['totalg'] = $this->calculat_tatal_grade(($temp/480)*100);
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
			$arr['total']  = strval($temp)."/720";
			$arr['totalg'] = $this->calculat_tatal_grade(($temp/720)*100);
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
		$canvas->set_opacity(.2);

		// Specify horizontal and vertical position
		$x = (($w-$imgWidth)/2);
		$y = (($h-$imgHeight)/2);

		// Add an image to the pdf
		$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);

		// Output the generated PDF (1 = download and 0 = preview)
		// $pdf->stream('document.pdf', array("Attachment" => 0));

		$this->pdf->stream("welcome.pdf", array("Attachment"=>0));

	 }


	 public function send($name,$class)
	 {
	 	$this->load->helper('date');
        $format = "%d-%m-%Y %h:%i %a";
        $d = mdate($format);
    	$log_data = array(
                        'name'     => $name,
                        'class'  => $class,
                        'time'   => $d
                        );
    	$this->Logs->marksheet_logs($log_data);
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
