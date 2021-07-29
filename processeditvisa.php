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

$queryprof="select * from staff_visas where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update staff_visas set 
visa_type='$visa_type',
issue_date='$issue_date',
exp_date='$exp_date',
issue_place='$issue_place',
visa_remarks='$visa_remarks'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into staff_visas values('','$emp_id','$visa_type','$issue_date','$exp_date','$issue_place','$visa_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}


header ("Location:home.php?viewvisa=viewvisa&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


