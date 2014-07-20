<head>
<link rel="stylesheet" type="text/css" href="./erp/styles/bootstrap.min.css">
</head>
<body>
<?php
$id = $_GET['id'];
$query = $this->db->get_where('alumni', array('id' => $id));
if(!$query){
			die();
		}
$result = $query->row();
// again echo out the details in an editable field.
?>
</body>