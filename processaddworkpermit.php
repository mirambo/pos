<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$work_permit_no=mysql_real_escape_string($_POST['work_permit_no']);
$issue_date=mysql_real_escape_string($_POST['issue_date']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$issue_place=mysql_real_escape_string($_POST['issue_place']);
$work_permit_remarks=mysql_real_escape_string($_POST['work_permit_remarks']);


$sql= "insert into staff_work_permit values('','$emp_id','$work_permit_no','$issue_date','$exp_date','$issue_place','$passport_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?idcard=idcard&emp_id=$emp_id");




mysql_close($cnn);


?>


