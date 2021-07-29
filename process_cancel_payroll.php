<?php

include('Connections/fundmaster.php');
$emp_id=mysql_real_escape_string($_POST['emp_id']);
$date_month=mysql_real_escape_string($_POST['date_month']);

$sqlredday="select * from payroll where payment_month='$date_month' AND emp_id=$emp_id";
$resultsredday= mysql_query($sqlredday) or die ("Error $sqlredday.".mysql_error());
$rowsredday=mysql_fetch_object($resultsredday);
$payroll_id=$rowsredday->payroll_id;




$sql= "delete from payroll where payroll_id='$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from benefits where payroll_id='$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from deductions where payroll_id='$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from staff_advance_repayment where emp_id='$emp_id' and month_paid='$date_month'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
/*
$sql= "delete from salary_payments where payroll_id='$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from staff_transactions where order_code='payrol$payroll_id'";  
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from prepaid_salary_ledger where order_code='payrol$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from cash_ledger where sales_code='payrol$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from  com_payables_ledger where order_code='payrol$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from  general_expenses_ledger where sales_code='payrol$payroll_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
*/
header ("Location:begin_cancel_payrol.php?delconfirm=1");

/*
$sql= "delete from pay_slips where month_printed LIKE '%$date_month%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlpdcom= "UPDATE commision_payments SET paid_status='0' where month_paid='$date_month'";
$resultspdcom= mysql_query($sqlpdcom) or die ("Error $sqlpdcom.".mysql_error());



*/

mysql_close($cnn);


?>


