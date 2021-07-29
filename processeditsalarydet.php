<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$gross_salary=mysql_real_escape_string($_POST['gross_salary']);
$grade=mysql_real_escape_string($_POST['grade']);

$queryprof="select * from salary_details where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update salary_details set 
gross_pay='$gross_salary',
	grade='$grade'


where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into salary_details values('','$emp_id','$gross_salary','$grade','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewsalarydet=viewsalarydet&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


