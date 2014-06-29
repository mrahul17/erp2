<?php

$query = $this->db->get_where('users',array('name'=>$name));
if ($query->num_rows() > 0)
{
	echo form_open('erp/update_user');
   foreach ($query->result() as $row)
   {
      echo '<input type="text" name="detail1" value='.$row->name.'>';
      echo '<input type="text" name="detail2" value='.$row->username.'>';
      echo '<input type="text" name="detail3" value='.$row->email.'>';
      echo '<input type="text" name="detail4" value='.$row->privilege.'>';
      echo '<input type="submit" name="submit" value="Update" >';
      
   }
} 

?>
</form>