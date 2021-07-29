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

$queryprof="select * from specs_ids where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update specs_ids set 
	specs_no='$spec_no',
issue_date='$issue_date',
exp_date='$exp_date',
specs_remarks='$spec_remarks'

where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into specs_ids values('','$emp_id','$spec_no','$issue_date','$exp_date','$spec_remarks','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewspecid=viewspecid&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


