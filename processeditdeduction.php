<?php

include('Connections/fundmaster.php');

$emp_id=mysql_real_escape_string($_POST['emp_id']);
$deduction_id=mysql_real_escape_string($_POST['deduction_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);
$payroll_id=mysql_real_escape_string($_POST['payroll_id']);
$deduction_name=mysql_real_escape_string($_POST['deduction_name']);
$deduction_amount=mysql_real_escape_string($_POST['deduction_amount']);
$approve=$_GET['approve'];


/*$sql= "insert into deductions values ('','$emp_id','$payroll_id','$deduction_name','$deduction_amount','$current_month')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sql= "update deductions set deduction_name='$deduction_name',deduction_amount='$deduction_amount' where deduction_id='$deduction_id'";
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


