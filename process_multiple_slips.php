<?php 
include('Connections/fundmaster.php');

$emp_id=mysql_real_escape_string($_POST['emp_id']);
$current_month=mysql_real_escape_string($_POST['current_month']);

header ("Location:view_payslip.php?month_pay=$current_month");


/* }
else
{

header ("Location:begin_print_payslip.php?miss=1");
} */

?>