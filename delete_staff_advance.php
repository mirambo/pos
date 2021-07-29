<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['staff_advance_id'];

$sqlsp="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.emp_id,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id
and  staff_advance.staff_advance_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);


$sql= "delete from staff_advance where staff_advance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from staff_transactions where order_code='sadv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='sadv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from prepaid_salary_ledger where order_code='sadv$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());








$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Salary Advance')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_staff_advance.php? deleteconfirm=1");






mysql_close($cnn);


?>


