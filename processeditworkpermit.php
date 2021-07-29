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

$queryprof="select * from staff_work_permit where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update staff_work_permit set 
work_permit_no='$work_permit_no',
issue_date='$issue_date',
exp_date='$exp_date',
issue_place='$issue_place',
work_permit_remarks='$work_permit_remarks'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into staff_work_permit values('','$emp_id','$work_permit_no','$issue_date','$exp_date','$issue_place','$work_permit_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}


header ("Location:home.php?viewworkpermit=viewworkpermit&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


