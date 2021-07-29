<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$visa_type=mysql_real_escape_string($_POST['visa_type']);
$issue_date=mysql_real_escape_string($_POST['issue_date']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$issue_place=mysql_real_escape_string($_POST['issue_place']);
$visa_remarks=mysql_real_escape_string($_POST['visa_remarks']);




$sql= "insert into staff_visas values('','$emp_id','$visa_type','$issue_date','$exp_date','$issue_place','$passport_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?workpermit=workpermit&emp_id=$emp_id");




mysql_close($cnn);


?>


