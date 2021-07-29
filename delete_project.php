<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

$project_id=$_GET['project_id']; 

$sql= "delete from projects where project_id='$project_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a project from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:home.php?viewprojects=viewprojects&delconfirm=1");



mysql_close($cnn);


?>


