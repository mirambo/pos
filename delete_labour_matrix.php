<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$task_id=$_GET['task_id'];
$engine_range_id=$_GET['engine_range_id'];


$sql= "delete from labour_cost_matrix where task_id='$task_id' AND engine_range_id='$engine_range_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted labour cost matrix from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 


header ("Location:home.php?viewreneworkpermit2=viewreneworkpermit2&deleteconfirm=1");






mysql_close($cnn);


?>


