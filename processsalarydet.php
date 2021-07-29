<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$gross_salary=mysql_real_escape_string($_POST['gross_salary']);
$grade=mysql_real_escape_string($_POST['grade']);




$sql= "insert into salary_details values('','$emp_id','$gross_salary','$grade','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:home.php?contdet=contdet&emp_id=$emp_id");




mysql_close($cnn);


?>


