<div class="row">
<span class="col-md-12"><?php $this->load->view('tot_registrations');?><br><!-- important--></span>
</div>
<div class="row">
<span class="col-md-3"><a href="<?php echo base_url();?>index.php/member/search"  target="_blank">Search</a></span>
<span class="col-md-3"></span>
<span class="col-md-3"><a href="<?php echo base_url();?>index.php/erp/logout" >Logout</a></span>

<span class="col-md-3">Logged in as <?php echo $this->session->userdata('username');?></span>
</div>