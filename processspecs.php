<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$spec_no=mysql_real_escape_string($_POST['spec_no']);
$issue_date=mysql_real_escape_string($_POST['issue_date']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$issue_place=mysql_real_escape_string($_POST['issue_place']);
$spec_remarks=mysql_real_escape_string($_POST['spec_remarks']);




$sql= "insert into specs_ids values('','$emp_id','$spec_no','$issue_date','$exp_date','$spec_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?edubg=edubg&emp_id=$emp_id");




mysql_close($cnn);


?>


