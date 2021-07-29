<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$pack_size=mysql_real_escape_string($_POST['pack_size']);



$id=$_GET['pack_size_id'];



$sql= "update pack_size set pack_size='$pack_size' where pack_size_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited pack size details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_pack_size.php?updateconfirm=1&pack_size_id=$id");

mysql_close($cnn);


?>


