<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['supplier_payments_id'];
$client_id=mysql_real_escape_string($_POST['client']);
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */

$queryprodsup="select * from suppliers where supplier_id='$client_id'";
$resultsprodsup=mysql_query($queryprodsup) or die ("Error: $queryprodsup.".mysql_error());
$rowsprodsup=mysql_fetch_object($resultsprodsup);
$exp_cat_name=$rowsprodsup->supplier_name;

$mop=mysql_real_escape_string($_POST['mop']);

$queryprod="select * from mop where mop_id='$mop'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$mop_name=$rowsprod->mop_name;

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
$sql= "update supplier_payments SET
supplier_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
client_bank='$cheq_drawer',
our_bank='$our_bank',
date_paid='$date_paid'
where supplier_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update supplier_payments SET
supplier_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'
where supplier_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ($mop==1 || $mop==4) 
{
$sql= "update supplier_payments SET
supplier_id='$client_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where supplier_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

//get receipt no
$sqlrp="SELECT receipt_no from supplier_payments WHERE supplier_payments_id='$id'";
$resultsrp= mysql_query($sqlrp) or die ("Error $sqlrp.".mysql_error());
$rowsrp=mysql_fetch_object($resultsrp);
$receipt_no=$rowsrp->receipt_no;


/* $transaction_descinv='Supplier Payment: ('.$exp_cat_name.')';
$transaction_desclg='Supplier Payment ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Supplier Payment ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Supplier Payment ('.$exp_cat_name.') through Cash. Ref No : '.$ref_no; */

$transaction_desclg='Supplier Payment through '.$mop_name;

/* $sqlupd="UPDATE supplier_transactions SET supplier_id='$client_id', 
amount='-$amount',
currency='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate' 
WHERE order_code='supm$id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error()); */

$sqltrans="UPDATE supplier_transactions SET 
supplier_id='$client_id',
date_recorded='$date_paid',
amount='-$amount',
credit='$amount',
currency='$currency',
curr_rate='$curr_rate',
transaction='$transaction_desclg' 
WHERE order_code='supm$id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

if ($mop==1 || $mop==4)
{
$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desccas',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}

if ($mop==3)//bank transfer
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_desclg',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}


if ($mop==2)//check
{

$sqltranslg= "UPDATE bank_ledger SET 
transactions='$transaction_descch',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE bank_statement SET 
transactions='$transaction_descch',
amount='-$amount',
credit='$amount',
mop='$mop',
bank_id='$our_bank',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

$sqltranslg= "UPDATE accounts_payables_ledger SET 
transactions='$transaction_descinv',
amount='-$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE order_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


/* $sqltranslg= "UPDATE purchases_ledger SET 
transactions='$transaction_desc',
amount='$amount',
debit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */

/* $sqltranslg= "UPDATE pending_purchases_ledger SET 
transactions='$transaction_descinv',
amount='-$amount',
credit='$amount',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='supm$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited payments paid to supplier $supplier')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:edit_supplier_payments.php?supplier_payments_id=$id&updateconfirm=1");

		?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php				  


mysql_close($cnn);


?>


