<table>
<?php

$query = $this->db->get('alumni');

foreach ($query->result() as $row)
{
	echo <tr>;
	echo '<a href="update_detail?id="'.$row->$id.'/>';
    echo $row->title;
    echo </tr>;
}

?>
</table>