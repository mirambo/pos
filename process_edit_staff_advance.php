<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['staff_advance_id'];
$client_id=mysql_real_escape_string($_POST['employee']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=6;
$install=mysql_real_escape_string($_POST['install']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;

$queryprodsup="select * from employees where emp_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$supplier=$rowsprodsup->emp_firstname.' '.$rowsprodsup->emp_middle_name.' '.$rowsprodsup->emp_lastname;

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

$amount_paid_kshs=$amount*$curr_rate;

if ($mop==2)
{
$sql= "update staff_advance SET
emp_id='$client_id',
amount_received='$amount',
install='$install',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
client_bank='$cheq_drawer',
our_bank='$our_bank',
date_paid='$date_drawn'
where staff_advance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update staff_advance SET
emp_id='$client_id',
amount_received='$amount',
install='$install',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_trans'
where staff_advance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop==1 || $mop==4) 
{
$sql= "update staff_advance SET
emp_id='$client_id',
amount_received='$amount',
install='$install',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where staff_advance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

//get receipt no
$sqlrp="SELECT receipt_no from staff_advance WHERE staff_advance_id='$id'";
$resultsrp= mysql_query($sqlrp) or die ("Error $sqlrp.".mysql_error());
$rowsrp=mysql_fetch_object($resultsrp);
$receipt_no=$rowsrp->receipt_no;

$transaction_descinv='Advance Payments made on'.$date_drawn.' '.$date_paid.' '.$date_trans;
$transaction_desc='Advance Payments To : '.$supplier;


$sqlupd="UPDATE staff_transactions SET emp_id='$client_id', amount='$amount',currency='$currency',curr_rate='$curr_rate' 
WHERE order_code='sadv$id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());


$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desc',
amount='-$amount',
credit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='sadv$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE prepaid_salary_ledger SET 
transactions='$transaction_desc',
amount='$amount',
debit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='sadv$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());





$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited Salary Advance Paid To $supplier')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_staff_advance.php?staff_advance_id=$id&updateconfirm=1");

						  


mysql_close($cnn);


?>


