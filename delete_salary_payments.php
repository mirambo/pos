<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['salary_payment_id'];
$emp_id=$_GET['emp_id'];

$sql= "delete from salary_payments where salary_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//$sql= "delete from shippers_transactions where transaction_code='tcp$id'";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*$sql= "delete from cash_ledger where sales_code='exp$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

/*$sql= "delete from accounts_receivables_ledger where sales_code='CP$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());*/

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted salary payment details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:view_sal_payment_details.php?emp_id=$emp_id&deleteconfirm=1");






mysql_close($cnn);


?>


