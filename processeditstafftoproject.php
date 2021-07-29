<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_loc=mysql_real_escape_string($_POST['job_loc']); 
$segment=mysql_real_escape_string($_POST['segment']);


$id=$_GET['assigned_staff_id'];

$sql= "update assigned_staffold set work_place='$job_loc', segment='$segment'  where assigned_staffold.assigned_staff_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

header ("Location:home.php?editstafftoprojects=editstafftoprojects&assigned_staff_id=$id&edituserconfirm=1");




mysql_close($cnn);


?>


