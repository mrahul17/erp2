<?php //if($this->session->userdata('privilege')!='1' || $this->session->userdata('privilege')!=1)
//$this->load->file('includes/functions.php');
?>
<head>
<?php include('includes/head.php');?>
<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
<style type="text/css">
.tabs {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }</style>
</head>
<body class="container">
   <?php $this->load->view('templates/header');?>
<h3>Networking Summary</h3>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">All Years</a></li>
        <li><a href="#tab2">1965</a></li>
        <li><a href="#tab3">1975</a></li>
        <li><a href="#tab4">1990</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <p>Searching Status</p>
            <table>
               <tr></tr><tr></tr>
            </table>
            <p>Response Status</p>
            <table>
               <tr></tr><tr></tr>
            </table>
        </div>
 
        <div id="tab2" class="tab">
            <p>Tab #2 content goes here!</p>
            <p>Donec pulvinar neque sed semper lacinia. Curabitur lacinia ullamcorper nibh; quis imperdiet velit eleifend ac. Donec blandit mauris eget aliquet lacinia! Donec pulvinar massa interdum risus ornare mollis. In hac habitasse platea dictumst. Ut euismod tempus hendrerit. Morbi ut adipiscing nisi. Etiam rutrum sodales gravida! Aliquam tellus orci, iaculis vel.</p>
        </div>
 
        <div id="tab3" class="tab">
            <p>Tab #3 content goes here!</p>
            <p>Donec pulvinar neque sed semper lacinia. Curabitur lacinia ullamcorper nibh; quis imperdiet velit eleifend ac. Donec blandit mauris eget aliquet lacinia! Donec pulvinar massa interdum ri.</p>
        </div>
 
        <div id="tab4" class="tab">
            <p>Tab #4 content goes here!</p>
            <p>Donec pulvinar neque sed semper lacinia. Curabitur lacinia ullamcorper nibh; quis imperdiet velit eleifend ac. Donec blandit mauris eget aliquet lacinia! Donec pulvinar massa interdum risus ornare mollis. In hac habitasse platea dictumst. Ut euismod tempus hendrerit. Morbi ut adipiscing nisi. Etiam rutrum sodales gravida! Aliquam tellus orci, iaculis vel.</p>
        </div>
    </div>
</div>
<!-- -->
<h3>List of all works assigned till date, select one to continue</h3>
<?php
$username = $this->session->userdata('username');
$query = $this->db->get_where('users',array('username'=>$username));
if($query->num_rows()>0){
   $row = $query->row_array();
}
$query = $this->db->get_where('work', array('toname' => $row['name']));
if ($query->num_rows() > 0)
{
	echo form_open('member/work');
	echo '<table class="table table-striped table-bordered table-hover">';
   foreach ($query->result() as $row)

   {
   		echo '<tr>';
     echo '<td><input type="radio" name="work" value='.$row->id.'></td>';
   	  
      echo '<td>'.$row->description.'</td>';
      
      echo '</tr>';
    
   }
 
?>
</table>
<input type="submit" value="Select this work" name="submit">
</form><?php }else{
   echo 'No work has been alloted to you.<br>';
}
$this->load->view('templates/footer');?>
<script type="text/javascript">
$(document).ready(function() {
    $('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = $(this).attr('href');
 
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});

</script>
</body>