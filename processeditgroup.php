<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$man_hours_value=mysql_real_escape_string($_POST['man_hours']); 


$id=$_GET['man_hours_id'];

$sql= "update man_hours set man_hours_value='$man_hours_value' where man_hours_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?editgroup=editgroup&man_hours_id=$id&editconfirm=1");




mysql_close($cnn);


?>


