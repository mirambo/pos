<?php 
$payroll_code_id;
/////////sum generic allowances
$query_parent3 = mysql_query("SELECT SUM(benefit_amount) as emp_benefits FROM benefits where 
payroll_code_id='$payroll_code_id'") or die("Query failed: ".mysql_error());
$rows3 = mysql_fetch_object($query_parent3);

$emp_benefit=$rows3->emp_benefits;


////overtime amount

$query_parent3ot = mysql_query("SELECT SUM(normal_ot_amount+holiday_ot_amount) as emp_ot FROM payroll_code where 
payroll_code_id='$payroll_code_id'") or die("Query failed: ".mysql_error());
$rows3ot = mysql_fetch_object($query_parent3ot);

$emp_ot=$rows3ot->emp_ot;

echo number_format($ttl_employee_allowance=$emp_benefit+$emp_ot,2);









?>