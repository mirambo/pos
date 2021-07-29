<?php

include('Connections/fundmaster.php');

$id=$_GET['assigned_staff_id'];
$staff=$_GET['staff'];

$sql= "delete from assigned_staffold where assigned_staff_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlpd= "update employees set status='0'  where emp_id='$staff'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());


header ("Location:home.php?viewstafftoprojects=viewstafftoprojects&deleteconfirm=1");



mysql_close($cnn);


?>


