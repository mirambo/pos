<?php 
$payroll_code_id;
/////////sum generic deductions
$query_parent3d = mysql_query("SELECT SUM(deduction_amount) as emp_deductions FROM deductions where 
payroll_code_id='$payroll_code_id'") or die("Query failed: ".mysql_error());
$rows3d = mysql_fetch_object($query_parent3d);

$emp_deductions=$rows3d->emp_deductions;

//////////////////tax
$paye_amount=$rows->paye_amount;

///absentism_amount
$days_absent_amount=$rows->days_absent_amount;
$nhif_amount=$rows->nhif_amount;
$staff_nssf_amount=$rows->staff_nssf_amount;
$sdl_amount=$rows->sdl_amount;


//$ttl_emp_deductions=$nhif_amount;
//$ttl_emp_deductions=$emp_deductions+$nhif_amount+$paye_amount+$staff_nssf_amount;
$ttl_emp_deductions=$emp_deductions+$nhif_amount+$paye_amount+$staff_nssf_amount+$days_absent_amount;


echo number_format($ttl_emp_deductions,2)


/* ////overtime amount
$query_parent3ot = mysql_query("SELECT SUM(normal_ot_amount+holiday_ot_amount) as emp_ot FROM payroll_code where 
payroll_code_id='$payroll_code_id'") or die("Query failed: ".mysql_error());
$rows3ot = mysql_fetch_object($query_parent3ot);

$emp_ot=$rows3ot->emp_ot;


echo number_format($ttl_employee_allowance=$emp_benefit+$emp_ot,2); */









?>