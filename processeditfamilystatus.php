<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];

$family_address=mysql_real_escape_string($_POST['family_address']);
$zip_code=mysql_real_escape_string($_POST['zip_code']);
$family_members=mysql_real_escape_string($_POST['family_members']);

$queryprof="select * from family_status where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update family_status set 
family_address='$family_address',
zip_code='$zip_code',
family_members='$family_members'



where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into family_status values('','$emp_id','$family_address','$zip_code','$family_members','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewfamilystatus=viewfamilystatus&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


