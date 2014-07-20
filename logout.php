<?php

$this->session->unset_userdata('privilege');
$this->session->sess_destroy();
$this->load->view('logout');
?>