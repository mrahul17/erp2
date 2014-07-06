<?php
class Erp extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('erp_model');
		$this->load->library('session');
		$this->load->dbforge();	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->library('upload');
		$this->load->helper('url');
	}
	
	public function index(){
		$this->login();
	}
	private function check_already_logged(){

		$privilege =$this->session->userdata('privilege'); 

			/* 
			members have privilege = 1
			office have privilege = 0
			coordinator has privilege = 2
			admin has privilege = 3
			
			*/
			

			 if ($privilege==1){
				redirect('member/show_work_list');
				return "True";
			}

			else if($privilege==-2){
				redirect('erp/office');
				return "True";
				
			}
			else if ($privilege==2){
				$this->load->view('coordinators/assign_alumni');
				return "True";
			}
			else if ($privilege==3){
				$this->load->view('admin');
				return "True";
			}
			else{
	
				return "False";
			}
			
	}

	public function login(){
		$access = $this->check_already_logged();
		if($access=="False"){
			
		
		//setting rules
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		//checking form validation result
		if ($this->form_validation->run()===FALSE){
			$this->load->view('form');
		}
		else{
			$username = $_POST['username'];
			//$password = md5($_POST['password']);
			$password = $_POST['password'];
			$privilege = $this->erp_model->get_privileges($username,$password);//using modal
			if($privilege==-1){
				// echo("Username Password Mismatch");
				$message['message'] ="Username Password Mismatch";
				$this->load->view('form',$message);
			
				
			}
			else if ($privilege==-2){
				
				$userdata['username']  = $username;
			$userdata['privilege'] = $privilege;
			$this->session->set_userdata($userdata);
				redirect('erp/office');
			}
			else if ($privilege==1){
				
				$userdata['username']  = $username;
			$userdata['privilege'] = $privilege;
			$this->session->set_userdata($userdata);
				redirect('member/show_work_list');
				//$this->load->view('members/work');
				
			}
			else if ($privilege==2){
			
				$userdata['username']  = $username;
			$userdata['privilege'] = $privilege;
			$this->session->set_userdata($userdata);
				$this->load->view('coordinator');
			}
			else if ($privilege==3){
				
				$userdata['username']  = $username;
			$userdata['privilege'] = $privilege;
			$this->session->set_userdata($userdata);
				//$this->admin();
				$this->load->view('admin');
			}

			

		}
	}
}

	public function add_user(){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('privilege','Privilege','required');

		//checking form validation result
		if ($this->form_validation->run()===FALSE||(!isset($_POST['submit']))){
			$this->load->view('admin');
		}
		else{


		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$privilege = $_POST['privilege'];
		$email = $_POST['email'];
		$query = $this->db->get_where('users',array('username'=>$username));
		if($query->num_rows()>0){
			$msg['error']="Username already taken, please try another";
			$this->load->view('admin',$msg);
			die();
		}
		$array = array('name'=>$name,'username'=>$username,'password'=>$password,'privilege'=>$privilege,'email'=>$email);
		$this->db->set($array);
		if($this->db->insert('users'))
		$this->load->view('success');
		}
	}
	
	public function logout(){
		$privilege = $this->session->userdata('privilege');
		if($privilege==1||$privilege==-2||$privilege==2||$privilege==3){
			$this->session->unset_userdata('privilege');
			$this->session->sess_destroy();
			$this->load->view('logout');
		}
		else{
			$this->load->view('access_error');
		}
	}

	public function registration($year=FALSE){

		if ($year==FALSE){

		}
	}

	public function office(){
		$privilege = $this->session->userdata('privilege');
		if($privilege==-2){
		
		$this->load->view('templates/header');
		$this->load->view('members/search');
	}
	else
		echo $privilege;
		//$this->load->view('access_error');
		//$this->load->view('year_wise_registrations');
	}

	

	

	


}



?>
