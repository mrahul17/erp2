<?php
class Member extends CI_Controller{

	
	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->dbforge();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->library('pagination');
		//$config['base_url']=base_url().'index.php/member/generate_result';
		//$config['total_rows'] = 200;
		//$config['per_page'] = 10; 
		
	}

	public function access_check(){
		$privilege = $this->session->userdata('privilege');
		if($privilege!=1){
			return "False";
		}

	}
	
	public function show_work_list(){
		$access = $this->access_check();
		if($access=="False")
		$this->load->view('access_error');
		else
		$this->load->view('members/work');			
	}
	public function work(){
		$access = $this->access_check();
		if($access=="False")
		$this->load->view('access_error');
		else{
		$privilege = $this->session->userdata('privilege');
		if(!isset($privilege)||$privilege=='-1'){
			redirect('/erp/login');
		}
		if(isset($_POST['work'])||$this->session->userdata('work')){
			if(isset($_POST['work'])){
				$this->session->set_userdata('work',$_POST['work']);//for the first time
			}else{
				$_POST['work'] = $this->session->userdata('work');//for the other cases
			}

			$workid['work'] = $_POST['work'];
		
			$this->load->view('members/list',$workid);
		}
		else{
			$this->load->view('members/work');
		}
		}
	}
	public function update_detail(){
		if(!$this->access_check()){
			die();
		}
		$id = $_POST['id'];
		$table = $_POST['tablename'];
		foreach ($_POST as $key => $value) {
			if($key!="submit" && $key !="tablename")
				$data[$key] = $value;
		}
		$this->db->where('id',$id);
		if($this->db->update($table,$data))
			//echo "<script>document.getElementById('statusdiv').innerHTML = 'Value Updated';</script>";
			echo "Success";
		//var_dump($_POST);
		
	}

	public function get_form(){
		if(!$this->access_check()){
			die();
		}
	}
	public function get_details(){
		$access = $this->access_check();
		if($access=="False")
		$this->load->view('access_error');
		else{
		if(isset($_POST['id'])&&isset($_POST['tablename'])){
			$id = $_POST['id'];
			$table = $_POST['tablename'];
			foreach ($_POST as $key => $value) {
				if($key!="submit" && $key !="tablename")
					$data[$key] = $value;
			}
			$this->db->where('id',$id);
			if($this->db->update($table,$data)){
			//echo "<script>document.getElementById('statusdiv').innerHTML = 'Value Updated';</script>";
				header('Refresh:2, url="work.sac"');
				echo "Values have been updated.. You will automatically be redirected back";
				unset($_POST['id']);
		//var_dump($_POST);
		}


		}

		if(isset($_GET['id'])&&isset($_GET['table'])){
		$id = $_GET['id'];
		$table = $_GET['table'];
		$query = $this->db->get_where($table,array('id'=>$id));
		if($query){
			$row = $query->row();
			//var_dump($row);
			echo form_open('member/get_details');
			foreach ($row as $key => $value) {
				//echo $key.'     <input type="text" name='.$key.' value='.$value.'><br>';
				if($key!="id" && $key!="assigned")
					echo $key.'<input type="text" class="form-control" name="'.$key.'" value="'.$value.'"><br>';
				else if($key=="id")
					echo $key.'<input type="hidden" class="form-control" name="'.$key.'" value="'.$value.'"><br>';
			}
			echo '<input type="hidden" value="'.$table.'"name="tablename">';
			echo '<input type="submit" value="Update" name ="submit">';
			echo '</form>';
			return;
		}
	}

		}//echo $_GET['id'];
	}

	public function search(){
		$privilege = $this->session->userdata('privilege');
		if($privilege==1||$privilege==-2||$privilege==2||$privilege==3){
		
		$this->load->view('members/search');
		}
		else
		$this->load->view('access_error');
	}

	public function generate_result(){

		$privilege = $this->session->userdata('privilege');
		if($privilege==1||$privilege==-2||$privilege==2||$privilege==3){
		$this->table->clear();
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr><th></th>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl); 
		$sql = "SELECT * FROM alumni WHERE";
		$count= 0;
		if(isset($_POST['submit'])){
			
			foreach ($_POST as $key => $value) {
				if($key!=$value && $key!="submit"){
					$this->db->escape($key);
					$this->db->escape($value);
					if($count==0)
					$sql .=" $key='$value'";
				 	else
					$sql .=" AND $key='$value'";
					$count++;
					//echo $sql;
				}
			}
					$query = mysql_query($sql);
					//$this->table->generate($query);
					if($query){
						$num_rows = mysql_num_rows($query);
						//$config['total_rows'] = $num_rows;
						//$this->pagination->initialize($config); 
					// echo "<h3>Total $num_rows records found as per your search query</h3>";
						while ($row = mysql_fetch_array($query)) {
							//var_dump($row);
							foreach ($row as $key1 => $value1) {
								if(is_string($key1))
									$dota[$key1] = $value1;
							}
							$this->table->add_row($dota);
							//$this->table->generate();	
							# code...
							//echo 'sd';
							//var_dump($dota);
						}
						$fields  = $this->db->list_fields('alumni');
	if($fields){
		//$fields = array('<td></td>',$fields);
		//array_unshift($fields, '<th></th>');
	$this->table->set_heading($fields);
	}

						$dota['table'] =  $this->table->generate();
						$dota['num_rows'] = $num_rows;
						$this->load->view('members/search_result',$dota);
					}
				
				
			
		}
	}
	else{
	$this->load->view('access_error');
}

//$this->pagination->initialize($config); 
}
}




?>