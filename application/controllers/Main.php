<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	function index()
	{	
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}
	 function master($page)
	 {
	 	# code...
		$this->load->view('header');
		$this->load->view($page);
		$this->load->view('footer');

	 }
	 function location(){
	 	$this->master("location");
	 }
	 function admission(){
	 	$this->master("admission");
	 }
	 function mission(){
	 	$this->master("mission");
	 }
	 function about(){
	 	$this->master("about_us");

	 }
	 function principal(){
	 	$this->master("Principal");
	 }
	 function deputy_p(){
	 	$this->master("deputy");
	 }
	 function Student_leaders(){
	 	$this->master("student_leaders");
	 }
	 function teachers(){
	 	$this->master("teachers");
	 }
	 // function myResume(){
	 // 	redirect("https://resume-harsh.000webhostapp.com/");
	 // }
	 	
}
?>