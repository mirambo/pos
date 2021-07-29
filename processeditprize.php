<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$emp_id=$_GET['emp_id'];
$prize=mysql_real_escape_string($_POST['prize']);



$queryprof="select * from prize where emp_id='$emp_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								 

$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$sql= "update prize set 
prize_description='$prize'



where emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




}
else
{

$sql= "insert into prize values('','$emp_id','$prize','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:home.php?viewprize=viewprize&emp_id=$emp_id&editconfirm=1");




mysql_close($cnn);


?>


