<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$mach_cat_name=mysql_real_escape_string($_POST['mach_cat_name']);
$mach_cat_desc=mysql_real_escape_string($_POST['mach_cat_desc']);


$id=$_GET['cat_id'];



$sql= "update product_categories set cat_name='$mach_cat_name',cat_desc='$mach_cat_desc' where cat_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited product category $mach_cat_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_prod_cat.php?updateconfirm=1&prod_cat_id=$id");

mysql_close($cnn);


?>


