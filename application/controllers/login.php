<?php
class Login extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('login');
	}

	public function show_form(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		//setting rules
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		//checking form validation result
		if ($this->form_validation->run()===FALSE){
			$this->load->view('form');
		}
		else{
			$privilege = $this->login_model->get_privileges();
			if($privilege==-1)
				echo("Username Password Mismatch");
			else if ($privilege==0)
				$this->load->view('office');
			else if ($privilege==1)
				$this->load->view('heads');
			else if ($privilege==2)
				$this->load->view('admin');

		}
	}



}



?>