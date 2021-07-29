<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$prize=mysql_real_escape_string($_POST['prize']);







$sql= "insert into prize values('','$emp_id','$prize','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?viewpostgraduate=viewpostgraduate&emp_id=$emp_id&success=1");




mysql_close($cnn);


?>


