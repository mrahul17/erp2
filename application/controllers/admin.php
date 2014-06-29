<?php 

class Admin extends CI_Controller{

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


	public function access_check(){
		$privilege = $this->session->userdata('privilege');
		if($privilege!=3){
			return "False";
		}

	}
	public function create_a_database(){
		$name = $_POST['name'];
		if($this->dbforge->create_database($name)){
			echo('Database Created');
		}
	}

	public function drop_database(){
		$name = $_POST['name'];
		if ($this->dbforge->drop_database($name)){
    		echo 'Database deleted!';
		}
	}

	public function drop_table(){
		$name = $_POST['name'];
		if($this->dbforge->drop_table($name)){
			echo('Table "'.$name.' "Deleted');
		}
	}

	public function rename_table(){
		$old_name = $_POST['old_table'];$new_name = $_POST['new_table'];
		if($this->dbforge->rename_table($old_name,$new_name)){
			echo('Table '.$old_name.' renamed to '.$new_name);
		}
	}

	public function add_column(){
		$name = $_POST['table'];$column = $_POST['column'];
		if($this->dbforge->add_column($name,$columns)){
			echo('Columns added to the table '.$name);
		}
	}

	public function drop_column(){
		$name = $_POST['table'];$column = $_POST['column'];
		if($this->dbforge->drop_column($name,$column))
			echo($column. "dropped from table ".$name);

	}

	public function add_user(){
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('privilege','Privilege','required');

		//checking form validation result
		if ($this->form_validation->run()===FALSE||(!isset($_POST['submit']))){
			$this->load->view('new_member_register');
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
			$this->load->view('new_member_register',$msg);
			die();
		}
		$array = array('name'=>$name,'username'=>$username,'password'=>$password,'privilege'=>$privilege,'email'=>$email);
		$this->db->set($array);
		if($this->db->insert('users'))
			echo('User added');
		}

	}
	public function update_user(){
		$access = $this->access_check();
		if($access=="False")
		$this->load->view('access_error');
		else{
		if(isset($_POST['submit'])){
			array_pop($_POST);
			//var_dump($_POST);			//$details = array('id'=>$id,'name'=>$name,'username'=>$username,'password'=>$passsword,'privilege'=>$privilege,'email'=>$email);
			$this->db->where('name',$_POST['name']);
			foreach ($_POST as $key => $value) {
				if($value==''){
					unset($_POST[$key]);
				}
			}
			//var_dump($_POST);
			if($this->db->update('users',$_POST))
				$this->load->view('success');

			}

		}}

		
		
		
	

	public function update_details(){


		
	}
}
?>