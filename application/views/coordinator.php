<?php if($this->session->userdata['privilege']!=2)
$this->load->file('includes/functions.php');
?>
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">
</head>
<body class="container">
<?php $this->load->view('templates/header');?>
<h2>This is the page for the coordinators</h2>
  <ol>
  	<!--<li>Upload a new file to the database.<br>
  		<?php
  		$attribute//   = array('enctype'=>'multipart/form-data');
  		//echo form_open('coordinator/upload',$attribute);
  		?>
      <div class="form-group">
  		<input type="file" name="userfile"  class="form-control"/><br>
  		<input type="submit" value="Upload" class="form-control">
  	 </div>
    </form>
  	</li>-->
    <li>
<?php 

if(!isset($_POST['table'])){
       echo "Select sheet to assign the work.";
       $query = $this->db->list_tables();
      //var_dump($query);
       echo form_open('coordinator/get_table_name');
      echo '<label for="table">Sheet</label><select name="table" class="form-control">';
      
        foreach ($query as $key => $value) {
          $name = explode("_", $value);
         // echo $name[0];
          if($name[0]=="alumni")
          echo '<option value="'.$value.'">'.$name[0].'</option>';
          # code...
        }
        echo '</select>';
        echo '<input type="submit" value="Select Table" name="table_selection">';      
        echo '</form>';
      
    }
?>
    </li>
    <li>
      To update registration stats in the databse, click <a href="<?php echo base_url().'index.php/coordinator/new_registration'?>">Here</a>


    </li>
  </ol>
  	
</body>