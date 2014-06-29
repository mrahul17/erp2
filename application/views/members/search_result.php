<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">
</head>
<body class="container">
<?php $this->load->view('templates/header');?>

<h3> Total <?php  echo $num_rows?>  results found.</h3>
<h3>Search Results</h3>
<?php ?>
<?php echo $table; ?>
<?php $this->load->view('templates/footer');?>

</body>