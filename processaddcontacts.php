<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$ssmob1=mysql_real_escape_string($_POST['ssmob1']);
$ssmob2=mysql_real_escape_string($_POST['ssmob2']);
$comob1=mysql_real_escape_string($_POST['comob1']);
$comob2=mysql_real_escape_string($_POST['comob2']);

$sstel1=mysql_real_escape_string($_POST['sstel1']);
$sstel2=mysql_real_escape_string($_POST['sstel2']);
$cotel1=mysql_real_escape_string($_POST['cotel1']);
$cotel2=mysql_real_escape_string($_POST['cotel2']);

$office_email1=mysql_real_escape_string($_POST['office_email1']);
$office_email2=mysql_real_escape_string($_POST['office_email2']);
$private_email1=mysql_real_escape_string($_POST['private_email1']);
$private_email2=mysql_real_escape_string($_POST['private_email2']);




$sql= "insert into staff_contacts values('','$emp_id','$ssmob1','$ssmob2','$comob1','$comob2','$sstel1','$sstel2','$cotel1','$cotel2',
'$office_email1','$office_email2','$private_email1','$private_email2','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','2',NOW(),'Created a new employee by the name $f_name $m_name $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




header ("Location:home.php?familystatus=familystatus&emp_id=$emp_id");




mysql_close($cnn);


?>


