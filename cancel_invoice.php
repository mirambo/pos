<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code_id=$_GET['sales_code_id'];

$reasons=mysql_real_escape_string($_POST['reasons']);

$sqllpdet="select * FROM sales_code WHERE sales_code_id='$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);

$invoice_no=$rowslpdet->invoice_no;
$client_id=$rowslpdet->client_id;
$currency=$rowslpdet->currency;
$curr_rate=$rowslpdet->curr_rate;


$sqllpdet="select  accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate, 
accounts_receivables_ledger.amount,currency.curr_name FROM currency,accounts_receivables_ledger WHERE 
accounts_receivables_ledger.currency_code=currency.curr_id AND accounts_receivables_ledger.sales_code='crs$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);
$grndttl=$rowslpdet->amount;
$grndttl_kshs=$grndttl*$curr_rate;

//get products canceled
$amount=0;
$sqllpdet="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id'  order by sales.sales_id asc  ";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet) > 0)
						  {
							 
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  $prod=$rowslpdet->product_id.' '.$quantity=$rowslpdet->quantity.',';
							  //$quantity=$rowslpdet->quantity;
							  
							  $queryprod="select * from products where product_id='$prod'";
							  $resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
							  $rowsprod=mysql_fetch_object($resultsprod);
							   $curr_bp=$rowsprod->curr_bp.' '.$exchange_rate=$rowsprod->exchange_rate.',';
							   $rowsprod->exchange_rate.',';
							  $cost=$quantity*$curr_bp*$exchange_rate;
							  
							  $amount=$amount+$cost;
							  }
							echo $amount;
							  }




$sqlproof="select * FROM cancelled_invoices WHERE sales_code='$sales_code_id'";
$resultsproof= mysql_query($sqlproof) or die ("Error $sqlproof.".mysql_error());
$rowsproof=mysql_num_rows($resultsproof);

if ($rowsproof>0)
{


}
else
{

$sql= "insert into cancelled_invoices values('','$invoice_no','$sales_code_id','$reasons','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancel="UPDATE sales_code set status='1' where sales_code_id='$sales_code_id'";
$resultscancel=mysql_query($querycancel) or die ("Error: $querycancel.".mysql_error());

$querycancelsale="UPDATE sales set status='1' where sales_code_id='$sales_code_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());


$transaction_descinv="Cancelation Of Credit sales Invoice $invoice_no Reason ($reasons)";


$sqltrans= "insert into client_transactions values('','$client_id','cns$sales_code_id','$transaction_descinv','-$grndttl_kshs',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Cancel Sales ( Against Inv No:$invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Accounts Receivables (Inv No:$invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'cns$sales_code_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_descinv','-$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'cns$sales_code_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into inventory_ledger values('','Cancelation of sales product under Invoice $invoice_no','$amount','$amount','','6','1',NOW(),'cns$sales_code_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sql1= "DELETE FROM commisions_expected where sales_code='$sales_code_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled an Invoice No $invoice_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


}

								  

header ("Location:view_invoices.php? cancelconfirm=1");






mysql_close($cnn);


?>


