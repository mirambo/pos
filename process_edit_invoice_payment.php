<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['invoice_payment_id'];
$approve=$_GET['approve'];

$sqlcl="select * FROM customer,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.customer_id=customer.customer_id  
AND  invoice_payments.currency_code=currency.curr_id AND invoice_payments.invoice_payment_id='$id'";
$resultscl= mysql_query($sqlcl) or die ("Error $sqlcl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);
//$c_name=$rowscl->customer_name;
$receipt_no=$rowscl->receipt_no;


//$_id=$rowscl->sales_code_id;

//$salesrep_user_id=$rowscl->sales_rep;


$shop_id=mysql_real_escape_string($_POST['shop_id']);
$sales_code_id=mysql_real_escape_string($_POST['invoice_id']);
$record_date=mysql_real_escape_string($_POST['date_paid']);
$client_id=mysql_real_escape_string($_POST['customer_id']);
$sqlrec="SELECT * FROM customer WHERE customer_id='$client_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$invoice_no='N/A';
$c_name=$rowsrec->customer_name;
//$sales_code_id=$_GET['sales_code_id'];
$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */

$mop=mysql_real_escape_string($_POST['mop']);
//$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$sales_rep=$user_id;

/* $queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate; */




$mop=mysql_real_escape_string($_POST['mop']);
$salesrep_user_id=mysql_real_escape_string($_POST['sales_rep']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);
$desc=mysql_real_escape_string($_POST['desc']);
$dep_by=mysql_real_escape_string($_POST['dep_by']);

$amount_paid_kshs=$amount*$curr_rate;

if ($mop==2)//cheque
{
$sql= "update invoice_payments SET
customer_id='$client_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$cheque_no',
dep_by='$dep_by',
client_bank='$cheq_drawer',
our_bank='$our_bank',
date_paid='$date_paid'
where invoice_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



if ($approve==1)
{
//update bank ledger
$sqltranslg= "UPDATE bank_ledger SET 
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='crsp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
else
{



}
}
elseif ($mop==3) //transfer
{

//echo "machine";
$sql= "update invoice_payments SET
customer_id='$client_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$transaction_code',
dep_by='$dep_by',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'
where invoice_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($approve==1)
{
$sqltranslg= "UPDATE bank_ledger SET 
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='crsp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());




$sqltranslg= "UPDATE bank_statement SET 
amount='$amount',
debit='$amount',
bank_id='$our_bank',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='crsp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
else
{}
}

elseif ($mop==1 || $mop==4) //cash or mpesa
{
$sql= "update invoice_payments SET
customer_id='$client_id',
sales_id='$sales_code_id',
shop_id='$shop_id',
amount_received='$amount',
decription='$desc',
currency_code='$currency',
curr_rate='$curr_rate',
mop='$mop',
ref_no='$ref_no',
dep_by='$dep_by',
client_bank='$client_bank',
our_bank='$our_bank',
date_paid='$date_paid'

where invoice_payment_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if ($approve==1)
{

$sqltranslg= "UPDATE cash_ledger SET 
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='crsp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
else
{

}

}



// debit the shop
$account_id_dr2=$shop_id;
$sqldr2= "SELECT * from account where account_id='$account_id_dr2'";
$resultsdr2= mysql_query($sqldr2) or die ("Error $sqldr2.".mysql_error());
$rowsdr2=mysql_fetch_object($resultsdr2);
$acc_type_id_dr2=$rowsdr2->account_type_id;
$acc_cat_id_dr2=$rowsdr2->account_cat_id;

// accounts receivables revenue
$account_id_cr2=8;
$sqlcr2= "SELECT * from account where account_id='$account_id_cr2'";
$resultscr2= mysql_query($sqlcr2) or die ("Error $sqlcr2.".mysql_error());
$rowscr2=mysql_fetch_object($resultscr2);
$acc_type_id_cr2=$rowscr2->account_type_id;
$acc_cat_id_cr2=$rowscr2->account_cat_id;

	
	


$date_dep=$record_date;
$latest_id2=$id;
$customer_id=$client_id;
$grand_ttl=$amount;

$customer_amnt=$amount*$curr_rate;

//$memo='Sold '.$qnty.' '.$product_name.' '.($item_code).' through invoice <a href="generate_invoice.php?sales_id='.$sales_id.'">Inv No:'.$sales_id.'</a>';
$memo2='Customer Payment <a href="edit_invoice_payment.php?invoice_payment_id='.$latest_id2.'&receipt_no='.$receipt_no.'"> Receipt No : '.$receipt_no.'</a> Received from '.$c_name;


$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="crsp".$latest_id2;



$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$date_dep',
amount='-$customer_amnt',
transaction='$memo2'
where transaction_code='$transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

//update account receivables ledger
$sqltrans="update ledger_transactions SET 
memo='$memo2',
shop_id='$shop_id',
currency_code='$currency',
curr_rate='$curr_rate',
amount='-$grand_ttl',
credit='$grand_ttl',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$account_id_cr2'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//shop
$sqltrans="update ledger_transactions SET 
memo='$memo2',
shop_id='$shop_id',
account_id='$shop_id',
amount='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate',
debit='$grand_ttl',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year'

where transaction_code='$transaction_code' and account_id='$shop_id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());



////flagin off fully paid invoices

$sqlqt="SELECT * FROM sales where sales_id='$sales_code_id'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$discount_perc=$rowsqt->discount; 
$vat=$rowsqt->vat; 


$sqlts="SELECT * from sales_item where sales_id='$sales_code_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
			  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						  $task_ttl_kshs=$task_cost*$curr_rate;

						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  }
						  
						  
						//echo  $task_totals2;
			
						  }
						  
$disc_value=$discount_perc*$task_totals2/100;				  
						  
$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

}

//$sub_ttl_vat;



$invoice_amount=$sub_ttl1+$vat_value;						  
						  
						  
						  
						  
						  
						  
	
$sqy="SELECT SUM(amount_received) as ttl_paid from invoice_payments where sales_id='$sales_code_id'";
$resy= mysql_query($sqy) or die ("Error $sqy.".mysql_error());
$rowy=mysql_fetch_object($resy);

 echo $ttl_paid=$rowy->ttl_paid;



if ($invoice_amount<=$ttl_paid)
{
$sqlz="UPDATE sales set paid='1' where sales_id='$sales_code_id'";
$resultsz= mysql_query($sqlz) or die ("Error $sqlz.".mysql_error());

}
else
{
$sqlz="UPDATE sales set paid='0' where sales_id='$sales_code_id'";
$resultsz= mysql_query($sqlz) or die ("Error $sqlz.".mysql_error());
	
}






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated Customer payments details received from $c_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:edit_invoice_payment.php?invoice_payment_id=$id&updateconfirm=1&receipt_no=$receipt_no&approve=$approve");

?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


