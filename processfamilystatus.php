<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$family_address=mysql_real_escape_string($_POST['family_address']);
$zip_code=mysql_real_escape_string($_POST['zip_code']);
$family_members=mysql_real_escape_string($_POST['family_members']);




$sql= "insert into family_status values('','$emp_id','$family_address','$zip_code','$family_members','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?skillprofile=skillprofile&emp_id=$emp_id");




mysql_close($cnn);


?>


