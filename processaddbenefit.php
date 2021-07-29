<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$approve=$_GET['approve'];
$emp_id=mysql_real_escape_string($_POST['emp_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);
$payroll_id=mysql_real_escape_string($_POST['payroll_id']);
/* $ded_name=mysql_real_escape_string($_POST['deduction_name']);
$ded_amount=mysql_real_escape_string($_POST['deduction_amount']); */



$deduction_name=mysql_real_escape_string($_POST['deduction_name']);
$deduction_amount=mysql_real_escape_string($_POST['deduction_amount']);
$deduction_log_id=mysql_real_escape_string($_POST['deduction_log_id']);

$sql= "insert into benefits values ('','$emp_id','$payroll_id','$deduction_log_id','$deduction_name','$deduction_amount','$current_month')";
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


