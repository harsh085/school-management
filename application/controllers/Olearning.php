<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Olearning extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	

	}
	function index(){
		 $this->master("onlineLearning/selection");
	}
	
	function master($page){
		$this->load->view("header");
		$this->load->view($page);
		$this->load->view("footer");

	}

	function redir()
  {
    //$this->load->view("loginf" );
  	if(!isset($_POST["sub"]) or !isset($_POST["clas"]) or !isset($_POST["chap"]) ){
  		
    	echo " <h1> 404 NOT FOUND </h1> ";
		die();
  	}

    $subject=$_POST["sub"];
    $clas=$_POST["clas"];
    $data["chap"]=$_POST["chap"];

    $this->load->view("header");

    //if(file_exists(base_url('views/onlineLearning/links/class'.$clas.$subject.'.php'))){
    $this->load->view('onlineLearning/links/class'.$clas.$subject.'.php',$data);
    	
    //}
    //else{
    //	$this->load->view('notfound');
    //}
	
	
	$this->load->view("footer");
   
  }


}

?>