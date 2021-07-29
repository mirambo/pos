<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$id_no=mysql_real_escape_string($_POST['id_no']);
$issue_date=mysql_real_escape_string($_POST['issue_date']);
$exp_date=mysql_real_escape_string($_POST['exp_date']);
$issue_place=mysql_real_escape_string($_POST['issue_place']);
$id_remarks=mysql_real_escape_string($_POST['id_remarks']);

$queryprof="select * from staff_ids where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update staff_ids set 
	id_no='$id_no',
issue_date='$issue_date',
exp_date='$exp_date',
issue_place='$issue_place',
id_remarks='$id_remarks'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into staff_ids values('','$emp_id','$id_no','$issue_date','$exp_date','$issue_place','$id_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}


header ("Location:home.php?viewidcard=viewidcard&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


