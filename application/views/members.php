
<head>
<style><?php $this->load->file('styles/bootstrap.css');?>
</style>
</head>
<body>
   <?php $this->load->view('templates/header')?>
<h2>This is the page for student members.</h2>

<h3>Below is the list of all works assigned till date</h3>
<?php
$username = $this->session->userdata('username');

$query = $this->db->get_where('work', array('toname' => $username));
if ($query->num_rows() > 0)
{	echo form_open('member/work');
	echo '<table class="table table-striped table-bordered table-hover">';
   foreach ($query->result() as $row)

   {
   		echo '<tr>';
     echo '<td><input type="radio" name="work" value='.$row->id.'></td>';
   	  
      echo '<td>'.$row->table.'</td>';
      echo '<td>'.$row->fromid.'</td>';
      echo '<td>'.$row->toid.'</td>';
      echo '</tr>';
      echo '<td></input></td>';
   }
} 
?>
</table>
<input type="submit" value="Select this work" name="submit">
</form>
</body>