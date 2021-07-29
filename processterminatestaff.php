<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$terminate_reason=mysql_real_escape_string($_POST['terminate_reason']);


$sql= "insert into terminated_staff values ('','$emp_id','$terminate_reason','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if ($results)
{
$sqldel= "update employees set terminate='1' where emp_id='$emp_id'";
$resultsdel= mysql_query($sqldel) or die ("Error $sqldel.".mysql_error());

$sqldel= "update users set suspend='1' where emp_id='$emp_id'";
$resultsdel= mysql_query($sqldel) or die ("Error $sqldel.".mysql_error());

}


header ("Location:home.php?viewpostgraduate=viewpostgraduate&delconfirm=1");



mysql_close($cnn);


?>


