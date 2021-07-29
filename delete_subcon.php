<?php

include('Connections/fundmaster.php');

$consultant_id=$_GET['consultant_id'];

$sql="delete from omconsultants where consultant_id='$consultant_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a subcontractor')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?viewomconsultants=viewomconsultants&delconfirm=1");



mysql_close($cnn);


?>


