<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$contract_type=mysql_real_escape_string($_POST['contract_type']);
$term_type=mysql_real_escape_string($_POST['term_type']);
$begin_date=mysql_real_escape_string($_POST['begin_date']);
$termination_date=mysql_real_escape_string($_POST['termination_date']);
$probation_time=mysql_real_escape_string($_POST['probation_time']);
$cont_remarks=mysql_real_escape_string($_POST['cont_remarks']);




$sql= "insert into staff_contract values('','$emp_id','$contract_type','$term_type','$begin_date','$termination_date','$probation_time','$cont_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?salarydet=salarydet&emp_id=$emp_id");




mysql_close($cnn);


?>


