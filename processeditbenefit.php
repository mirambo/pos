<?php

include('Connections/fundmaster.php');
$approve=$_GET['approve'];
$emp_id=mysql_real_escape_string($_POST['emp_id']);
$benefit_id=mysql_real_escape_string($_POST['benefit_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);
$payroll_id=mysql_real_escape_string($_POST['payroll_id']);
$benefit_name=mysql_real_escape_string($_POST['benefit_name']);
$benefit_amount=mysql_real_escape_string($_POST['benefit_amount']);



/*$sql= "insert into benefits values ('','$emp_id','$payroll_id','$benefit_name','$benefit_amount','$current_month')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "update benefits set benefit_name='$benefit_name',benefit_amount='$benefit_amount' where benefit_id='$benefit_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if ($approve==1)
{
header ("Location:approve_payslip.php?payroll_id=$payroll_id&approve=1");
}
else
{

header ("Location:adjust_payroll_details.php?payroll_id=$payroll_id");

}




mysql_close($cnn);


?>


