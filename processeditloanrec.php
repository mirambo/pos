<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['loan_received_id'];
$l_name=mysql_real_escape_string($_POST['l_name']);
$l_address=mysql_real_escape_string($_POST['l_address']);
$l_phone=mysql_real_escape_string($_POST['l_phone']);
$l_email=mysql_real_escape_string($_POST['l_email']);
$l_town=mysql_real_escape_string($_POST['l_town']);
$l_amount=mysql_real_escape_string($_POST['l_amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$period_years=mysql_real_escape_string($_POST['period_years']);
$period_months=mysql_real_escape_string($_POST['period_months']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_deposited']);
$m_date_paid=mysql_real_escape_string($_POST['m_date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

if ($mop==1)//cash
{

$sql= "update loan_received set 
lenders_name='$l_name',
lenders_address='$l_address', 
lenders_phone='$l_phone',
lenders_email='$l_email' ,
lenders_town='$l_town' ,
loan_amount='$l_amount',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop' ,
cheque_no='' ,
ref_no='$ref_no' ,
client_bank='' ,
our_bank='' ,
date_drawn='$date_paid' ,
period_years='$period_years', 
period_months='$period_months' 

where loan_received_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==4)//mpesa
{
$sql= "update loan_received set 
lenders_name='$l_name',
lenders_address='$l_address', 
lenders_phone='$l_phone',
lenders_email='$l_email' ,
lenders_town='$l_town' ,
loan_amount='$l_amount',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop' ,
cheque_no='' ,
ref_no='$ref_no' ,
client_bank='' ,
our_bank='' ,
date_drawn='$date_paid' ,
period_years='$period_years', 
period_months='$period_months' 

where loan_received_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{

$sql= "update loan_received set 
lenders_name='$l_name',
lenders_address='$l_address', 
lenders_phone='$l_phone',
lenders_email='$l_email' ,
lenders_town='$l_town' ,
loan_amount='$l_amount',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop' ,
cheque_no='$cheque_no' ,
ref_no='' ,
client_bank='$cheq_drawer' ,
our_bank='' ,
date_drawn='$date_paid' ,
period_years='$period_years', 
period_months='$period_months' 

where loan_received_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
/* $sql= "insert into income values ('','$desc','$currency','$curr_rate','$amount','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "update loan_received set 
lenders_name='$l_name',
lenders_address='$l_address', 
lenders_phone='$l_phone',
lenders_email='$l_email' ,
lenders_town='$l_town' ,
loan_amount='$l_amount',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop' ,
cheque_no='' ,
ref_no='$transaction_code' ,
client_bank='$client_bank' ,
our_bank='$our_bank' ,
date_drawn='$date_paid' ,
period_years='$period_years', 
period_months='$period_months' 

where loan_received_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}



$exp_cat_name=$l_name;

$transaction_descinv='Loan Received From: ('.$exp_cat_name.')';
$transaction_desclg='Loan Received From ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Loan Received From ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Loan Received From ('.$exp_cat_name.') through Cash. Ref No : '.$cheque_no;






if ($mop==1 || $mop==4)
{
$sqltranslg="UPDATE cash_ledger SET 
transactions='$transaction_desccas',
amount='$l_amount',
debit='$l_amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='lnrec$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());




$sql= "update notes_payables_ledger set 
amount='$l_amount', 
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate', 
transactions='$transaction_desccas', 
credit='$l_amount' 
where order_code='lnrec$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

if ($mop==3)
{
$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descbs',
amount='$l_amount',
debit='$l_amount',
date_recorded='$date_paid',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='lnrec$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sql= "update notes_payables_ledger set 
amount='$l_amount', 
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate', 
transactions='$transaction_descbs', 
credit='$l_amount' 
where order_code='lnrec$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descbs',
amount='$l_amount',
debit='$l_amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='lnrec$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
elseif ($mop==2)
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descch',
amount='$l_amount',
debit='$l_amount',
date_recorded='$date_paid',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='lnrec$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());




$sql= "update notes_payables_ledger set 
amount='$l_amount', 
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate', 
transactions='$transaction_descch', 
credit='$l_amount' 
where order_code='lnrec$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descch',
amount='$l_amount',
debit='$l_amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='lnrec$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());





}


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited loan received from $l_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_loan_rec.php?updateconfirm=1&loan_received_id=$id");

								  


mysql_close($cnn);


?>


