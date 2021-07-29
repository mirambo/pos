<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$edu_desc=mysql_real_escape_string($_POST['edu_desc']);

$queryprof="select * from education_description where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update education_description set 
	education_description='$edu_desc'


where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into education_description values('','$emp_id','$edu_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewedubg=viewedubg&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


