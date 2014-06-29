<?php
// function to redirect in case previleges are not right
//office has privilege 0
//student members have privilege 1
//coordinators have privilege 2
//admin will have privilege 3
if($privilege =$this->session->userdata('privilege')){ 

			if ($privilege==0){
				
				$this->session->set_userdata('privilege', '0');
				$this->office();
			}
			else if ($privilege==1){
				
				$this->session->set_userdata('privilege', '1');
				$this->load->view('members');
			}
			else if ($privilege==2){
			
				$this->session->set_userdata('privilege', '2');
				$this->load->view('coordinator');
			}
			else if ($privilege==3){
				
				$this->session->set_userdata('privilege', '3');
				//$this->admin();
				$this->load->view('admin');
			}
			else{
				$this->load->view('form');
			}
}
?>