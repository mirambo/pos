<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code_id=$_GET['sales_code_id'];
$view=$_GET['view'];
$amount=mysql_real_escape_string($_POST['amount']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


$queryred1="select * from  partial_invoice_payments where sales_code_id='$sales_code_id'";
//$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{

$sqlupd= "UPDATE partial_invoice_payments SET amount_received ='$amount' WHERE sales_code_id='$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());
}
else
{

if ($mop==1 || $mop==4)//cash or mpesa
{
$sql= "insert into partial_invoice_payments values ('','$sales_code_id','$amount','$mop','$ref_no',
'$date_paid','','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{
$sql= "insert into partial_invoice_payments values ('','$sales_code_id','$amount','$mop','$cheque_no',
'$date_drawn','$cheq_drawer','',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert into partial_invoice_payments values ('','$sales_code_id','$amount','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
}

if ($view==1)
{
header ("Location:view_sales_trans.php?sales_code_id=$sales_code_id");
}
else
{
header ("Location:generate_invoice.php");
}
?>


