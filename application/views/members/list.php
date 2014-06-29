
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'styles/bootstrap.min.css' ;?>">
	
<!--<script type="text/javascript" src="<?php //echo base_url().'scripts/bootstrap.min.js' ;?>">
<?php //$this->load->file('scripts/bootstrap.min.js');?></script>
<script type="text/javascript" src="<?php //echo base_url().'scripts/jquery-2.1.0.min.js' ?>"><?php //$this->load->file('scripts/jquery-2.1.0.min.js');
?>
</script>-->

</head>
<body class="container">
<div class="modal fade" id="update"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" id="cross_button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body" id="updateform">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" id = "cancel_button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>	
<?php
$this->load->view('templates/header');


$workid = $work;
$table_name ="";
$query = $this->db->get_where('work',array('id'=>$workid));


if($query->num_rows()>0){
	$row = $query->row();
	$table_name = $row->table;
	$from_id = $row->fromid;
	$to_id = $row->toid;
	$fields  = $this->db->list_fields($table_name);
	if($fields){
		//$fields = array('<td></td>',$fields);
		//array_unshift($fields, '<th></th>');
	$this->table->set_heading($fields);
	}
	
for ($i=$from_id; $i <=$to_id ; $i++) { 
	$query = $this->db->get_where($table_name,array('id'=>$i));
	$row = $query->row();
	// $query = mysql_query("SELECT * FROM $table_name WHERE id=$i");
	// if($query){
	// 	$row = mysql_fetch_array($query);
	// 	foreach ($row as $key => $value) {
	// 		$data[$key] = element($key,$row);
	// 	}
	// 	//$this->table->add_row($data);
	// 	//print_r($data);
	// }
	//
	foreach ($row as $key => $value) {
		$data[$key] = $value;
	}
	if($data['assigned']==1)
	$this->table->add_row($data);
}
$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="5" cellpadding="6" cellspacing="4">',

                    'heading_row_start'   => '<tr ><th></th>',// Important
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr class="lookfor" >',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr class="lookfor" >',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

              

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);
echo '<div>';
echo $this->table->generate();
echo '</div>';
//echo '<div id="updateform" style="position:relative;	">';
//echo '<div id="statusdiv"></div>';
//echo '</div>';

	

	//show list of contacts
}



?>


<?php $this->load->view('templates/footer');?>



<script type="text/javascript">
window.onload = function (){
	var link = document.getElementsByClassName("lookfor");
	var headers = document.getElementsByClassName("heading");
	
//window.alert(link.length);
//window.alert(link[1].cells[0].id);
for (var i = link.length - 1; i >= 0; i--) {
	link[i].onclick = EventHandler;
}
/*for (var i = headers.length - 1; i >= 0; i--) {
	headers[i].onclick = AnotherEventHandler;
}*/
};

function EventHandler() {
var dom = document.getElementById('update');
dom.setAttribute('class','modal fade in');
dom.setAttribute('aria-hidden','false');
dom.setAttribute('style','display:block');
var dom2 = document.getElementById('cancel_button');
dom2.onclick = function(){
dom.setAttribute('class','modal fade ');
dom.setAttribute('aria-hidden','true');
dom.setAttribute('style','display:hidden');
}
var dom3 = document.getElementById('cross_button');
dom3.onclick = function(){
dom.setAttribute('class','modal fade ');
dom.setAttribute('aria-hidden','true');
dom.setAttribute('style','display:hidden');
}
	//w.onclick = window.alert(this.cells[0].id);
getdetails(this.cells[0].id);
}
function AnotherEventHandler(){
	var field = this.innerHTML;
	createDropDown(field);
}
/*function createDropDown(field){
	var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		document.getElementById("updateform").innerHTML=xhr.responseText;
	}
}

xhr.open("GET","get_dropdown?field="+field,true);
xhr.send();
}*/


function getdetails(id){
var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		document.getElementById("updateform").innerHTML=xhr.responseText;
	}
}

xhr.open("GET","get_details?id="+id+"&table="+'<?php echo $table_name ?>',true);
xhr.send();
}

</script>
</body>