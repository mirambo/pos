<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$file = $_FILES ['file'];
$name1 = $file ['name'];
$type = $file ['type'];
$size = $file ['size'];
$tmppath = $file ['tmp_name']; 


move_uploaded_file ($tmppath, 'photos/'.$name1);//image is a folder in which you will save image





$sql= "update employees set photo='$name1' where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?staffdet=staffdet&emp_id=$emp_id");




mysql_close($cnn);


?>


