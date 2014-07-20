<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">

</head>
<body class="container">
<?php $this->load->view('templates/header');?>
<ol>
  <li>
<h2>Assign a work to the members</h2>

  		<?php echo form_open('coordinator/assignwork');?>
      <?php  $query = $this->db->get_where('users',array('privilege'=>1));
      //var_dump($query);?>
      <?php 
      $table= "alumni";
      $query2 = $this->db->get_where($table,array('assigned'=>'No'));
      ?>

      <?php

      

      ?>
      <input type="hidden" value="" name="id" >
      <input type="hidden" value="<?php echo $table ; ?>" name="table" >
      <label for="description"> DESCRIPTION</label><input type="text" name="description" class="form-control" value="<?php echo form_prep(set_value('description','PUT description here'));?>">
      <label for="toname">ASSIGN TO:</label><select name = "toname" class="form-control">  
        <?php foreach ($query->result() as $row) {
          echo '<option value="'.$row->name.'">'.$row->name.'</option>';
          # code...
        }?>

      </select>
      
      <label for="fromid">FROM ID</label><select name ="fromid" class="form-control">
        <?php 
         foreach ($query2->result() as $row) {
            echo '<option value='.$row->id.'>'.$row->id.'</option>';
          # code...
        }?>

      </select>
      <label for="toid">TO ID</label><select name ="toid" class="form-control">
      <?php
         foreach ($query2->result() as $row) {
            echo '<option value='.$row->id.'>'.$row->id.'</option>';
          # code...
        }?>

      </select>
      


      <br><br><input type="submit" value="Assign" name="submit" class="form-control">
    </form>
  

  <?php
$this->table->clear();
//$query = $this->db->get_where('users',array('description'=>''));

  ?>
</li>
<li>
  <h2>Register an alumni in database</h2>
<?php $table = "alumni";?><!--This is important, the databse must have a table by the name of "alumni" that should have the same headings as the rest of the alumni contacts table-->
<?php
  $fields = $this->db->list_fields($table);
echo form_open('coordinator/register_alumni');

foreach ($fields as $field)
{  if($field!="registered"&&$field!="paid"&&$field!="assigned"){
  
   echo '<select name ="'.$field.'" class="form-control">';
   
    // Time to use query bindings
   //$tables = $this->db->list_tables();
 //  var_dump($tables);

  // $query = mysql_query("SELECT DISTINCT $field FROM $table ");
          echo '<option selected = "selected">'.$field.'</option>';

   // foreach ($tables as $table) {
    # code...
   $query = mysql_query("SELECT DISTINCT $field FROM $table WHERE registered=0 ");


  if($query){
    while($result = mysql_fetch_array($query)){
       foreach ($result as $key => $value) {
        echo '<option class="form-control" value="'.$value.'">'.$value.'</option>';
        break;
       }

      //var_dump($result);
    }
  }  //}
   //$this->db->query($query,array('$field','$table'));
echo '</select><br>';
   
   //echo $query;
}}
echo '<input type="submit" class="form-control" value = "Register alumni" name = "register">'; 
echo '</form>';
  
?>

</li>
<li><h2>Update payment</h2>
<?php
  echo form_open('coordinator/pay_alumni');

foreach ($fields as $field)
{  if($field!="registered"&&$field!="paid"&&$field!="assigned"){
  
   echo '<select name ="'.$field.'" class="form-control">';
   
    // Time to use query bindings
   //$tables = $this->db->list_tables();
 //  var_dump($tables);

  // $query = mysql_query("SELECT DISTINCT $field FROM $table ");
          echo '<option selected = "selected">'.$field.'</option>';

   // foreach ($tables as $table) {
    # code...
   $query = mysql_query("SELECT DISTINCT $field FROM $table WHERE paid='No' ");


  if($query){
    while($result = mysql_fetch_array($query)){
       foreach ($result as $key => $value) {
        echo '<option class="form-control" value="'.$value.'">'.$value.'</option>';
        break;
       }

      //var_dump($result);
    }
  }  //}
   //$this->db->query($query,array('$field','$table'));
echo '</select><br>';
   
   //echo $query;
}}
echo '<input type="submit" class="form-control" value = "This alum has paid" name = "paid">'; 
echo '</form>';
  
?></li>
<li>
<h2>Upload new records in database</h2>
<?php echo form_open_multipart('coordinator/put_in_database');?>
<input type="file" name="data"><br>
<input type="submit" value="Upload" name="submit">

</form>

</li>

</ol>