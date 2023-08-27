<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// loading the users model
		$this->load->model('LoginM');

		// loading the form validation library
		$this->load->library('form_validation');

	}

	function LoginT(){
		$this->load->view('login/loginT');
	}

	function login_validationT(){
     	$this->form_validation->set_rules('usr','Username','required');
     	$this->form_validation->set_rules('pass','Password','required');

  	   if($this->form_validation->run()){
      		 $username=$this->input->post('usr');
       		$password=$this->input->post('pass');
      		$q = $this->LoginM->can_login($username, $password);
      		// print_r($q[);
      				if(!empty($q)){
        						// $this->Main_model->load();
			                $session_data=array(
			                	'id' => $q[0]["EmpId"],
			                'user' => $q[0]["Name"],
			                'level' => $q[0]["level"]
			                );
      					// echo "string";
			                print_r($session_data);
			          $this->session->set_userdata($session_data);
			          redirect (base_url().'dashboard/details');
			       }

      		 else {
				         $this->session->set_flashdata('error', 'Invalid Credentials!!');
				         // echo "string";
				         // redirect (base_url().'login/loginr');
				         // $data['title']='codeigniter';
				          $this->load->view("login/loginT");
				      }
		}
    	 else {
      		 redirect (base_url());
     	}
	}


	function logout(){
		 $this->session->unset_userdata('user');
		 redirect (base_url() );
	}
}

?>
