<?php
class Coordinator extends CI_Controller{

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->dbforge();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->helper('array');
		$this->load->library('upload');
		$this->load->helper('url');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'application/vnd.ms-excel';
		$config['overwrite'] = FALSE;
		$config['remove-spaces'] = TRUE;
		$this->upload->initialize($config);
		$this->load->library('email');
		$config['smtp_port']=80;
		$this->email->initialize($config);
	}
	public function access_check(){
		$privilege = $this->session->userdata('privilege');
		if($privilege!=2){
			return "False";
		}

	}
	public function initialize_mail(){

		

	}

	public function upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'application/vnd.ms-excel';
		$config['overwrite'] = FALSE;
		$config['remove-spaces'] = TRUE;
		$this->upload->initialize($config);
		var_dump($config);		
		$this->upload->do_upload();
		echo $this->upload->display_errors('<p>', '</p>');
	}

	public function put_in_database(){
		$databasehost = 'localhost'; 
		$databasename = 'erp'; 
		$databasetable = "alumni"; 
		$databaseusername= 'root'; 
		$databasepassword = 'rmmr'; 
		$fieldseparator = ","; 
		$lineseparator = "\n";
		$csvfile = './uploads/alumni.csv';


		if(!file_exists($csvfile)) {
    		die("File not found. Make sure you specified the correct path.");
		}

		try {
    		$pdo = new PDO("mysql:host=$databasehost;dbname=$databasename", 
        	$databaseusername, $databasepassword,
        	array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        	)
    		);
		} catch (PDOException $e) {
    	die("database connection failed: ".$e->getMessage());
		}

	$affectedRows = $pdo->exec("
    LOAD DATA LOCAL INFILE ".$pdo->quote($csvfile)." INTO TABLE `$databasetable`
      FIELDS TERMINATED BY ".$pdo->quote($fieldseparator)."
      LINES TERMINATED BY ".$pdo->quote($lineseparator));

echo "Loaded a total of $affectedRows records from this csv file.\n";

	}

	public function get_table_name(){

		$access = $this->access_check();
		if($access=="False")
			$this->load->view('access_error');
		else{
		if(isset($_POST['table_selection'])){
			//var_dump($_POST);
			$data['table'] = $_POST['table'];
			//echo $data['table'];
			$this->load->view('coordinators/assign_alumni',$data);
		}
	}
	}

	public function assignwork(){
		$access = $this->access_check();
		if($access=="False")
			$this->load->view('access_error');
		else{
		
		if(isset($_POST['submit'])){
		array_pop($_POST);
		var_dump($_POST);
		foreach ($_POST as $key => $value) {
			if(!isset($_POST[$key]))
				die('Enter all details');
			// if(intval($_POST['fromid'])!==$_POST['fromid'])
			// 	die('Enter all details');
			// if(intval($_POST['toid'])!==$_POST['toid'])
			// 	die('Enter all details');
			# code...
		}

		if($this->db->insert('work',$_POST)){
			echo "Work assigned";
			$table = $_POST['table'];
			for($i=$_POST['fromid'];$i<=$_POST['toid'];$i++){
				$this->db->update($table, array('assigned'=>1), "id =".$i);
			}
			//send a mail to assigned people.
			$query = $this->db->get_where('users',array('name'=>$_POST['toname']));
			if($query->num_rows>0){
				$row = $query->row();
				$this->email->from('mentorship@adm.iitkgp.ernet.in','Rahul');
				$this->email->subject('New Work Assigned');
				$email = $row->email;
				$this->email->to('mishra.rahul1712@gmail.com');
				if(!$this->email->send()){
					echo 'mail not sent';
					$this->email->print_debugger();
					//send_email('mishra.rahul1712@gmail.com','mentorship@adm,iitkgp.ernet.in','internship opportunity');
				}
			}
				
		}
	
}
	}
}

	public function new_registration(){

		$this->load->view('coordinators/register');

	}
	public function register_alumni(){
		$access = $this->access_check();
		if($access=="False")
		$this->load->view('access_error');
		else{
		//$tables = $this->db->list_tables();
		//foreach ($tables as $table) {
		$table = "alumni";
		$sql = "SELECT * FROM $table WHERE";
		$count= 0;
		if(isset($_POST['register'])){
			
			foreach ($_POST as $key => $value) {
				if($key!=$value && $key!="register"){
					$this->db->escape($key);
					$this->db->escape($value);
					if($count==0)
					$sql .=" $key='$value'";
				 	else
					$sql .=" AND $key='$value'";
					$count++;
					//echo $sql;
				}
			}						//var_dump($_POST);
//echo $sql;
					$query = mysql_query($sql);
					//$this->table->generate($query);
					if($query){
						//echo $sql;
					if(mysql_num_rows($query)>0){
						$row = mysql_fetch_array($query);
						//var_dump($row);
						$update_query = mysql_query("UPDATE alumni SET registered='yes' WHERE id = $row[id]");
						//var_dump($_POST);
						if($update_query){
							header('Refresh:3,url=get_table_name.sac');
							echo "alum registered";
						}else{
							echo "unable to register, check inputs!!";
						}
						
	}
}

}//}
}}
//var_dump($_POST);
}



?>