<?php
$file = "../downloads/MICGC.xls" ;
if(file_exists($file)){
header('Content-Description:File Transfer');
header('Content-type:application/pdf');
header('Content-Length: ' . filesize($file));
header("Pragma: no-cache");
header("Expires: 0");
ob_clean();
flush();
readfile($file);
}
?>