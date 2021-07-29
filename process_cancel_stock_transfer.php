<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=$_GET['invoice_id'];
//$invoice_amnt=$_GET['invoice_amnt'];

$reasons=mysql_real_escape_string($_POST['reason']);

/* sqllpdet="select * FROM sales WHERE sales_id='$invoice_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);

//$invoice_no=$rowslpdet->job_card_id;
$sales_id=$rowslpdet->sales_id;
$customer_id=$rowslpdet->customer_id;
$currency=$rowslpdet->currency;
$curr_rate=$rowslpdet->curr_rate;
$discount=$rowslpdet->discount;
$vat=$rowslpdet->vat;
$sales_date=date('Y-m-d');


$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$amount_received=$rowsrec->amount_received; */



$sql= "insert into cancelled_stock_transfer values('','$invoice_id','$user_id','$incharge','$reasons',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancelsale="UPDATE stock_transfer set status='1' where stock_transfer_id='$invoice_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());
/* 

$transaction_descinv="Cancelation Of Job Card $invoice_no Reason ($reasons)";

//effect on inventory ledger
$sqllpdet1="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id'";
$resultslpdet1= mysql_query($sqllpdet1) or die ("Error $sqllpdet.".mysql_error());
if (mysql_num_rows($resultslpdet1) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet1=mysql_fetch_object($resultslpdet1))
							  { 
							 echo  $prod=$rowslpdet1->item_id;
							  $latest_received_stock_id=$rowslpdet1->sales_item_id;
							  
$query="UPDATE sales_item set status='1' where sales_id='$sales_id'";
$results=mysql_query($query) or die ("Error: $query.".mysql_error());

$item_bp=$rowslpdet1->curr_bp;
	
	$qnty=$rowslpdet1->item_quantity;
	$item_cost=$rowslpdet1->item_cost;
	$product_name=$rowslpdet1->item_name;
	$item_code=$rowslpdet1->item_code;
	$purchase_cost=$item_bp*$qnty;
	
	$amnt=$item_cost*$qnty;
	
$item_trans_desc='Canceled '.$qnty.' '.$product_name.' '.($item_code).' of invoice No :'.$sales_id;



$sqlaccpay="insert into inventory_ledger values('','$item_trans_desc','$purchase_cost','$purchase_cost','','$currency','$curr_rate',NOW(),'cancinv$latest_received_stock_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$prod','$item_trans_desc','$qnty',NOW(),'cancinv$latest_received_stock_id sale$invoice_id','$incharge')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
							  
							  
							  
	$task_totals=$task_totals+$amnt; 				  
							  
							  }
							  
$sub_ttl1=$task_totals-$discount;


 if ($vat==1)
{
$sub_ttl_vat=$sub_ttl1*0.862;

$vat_value=0.16*$sub_ttl_vat;
}

if ($vat==0)
{

$sub_ttl_vat=$sub_ttl1;
$vat_value=0.16*$sub_ttl_vat;

} 

$grnd_ttl=$sub_ttl_vat+$vat_value;

//$amount_received=$grnd_ttl;

$get_job_card_id=$sales_id;

$transaction_descinv='Invoice Cancelation Invoice No:'.$get_job_card_id;	
$transaction_desc='Invoice Cancelation Invoice No:'.$get_job_card_id;
$transaction_desc_paid='Advance Payment Cancelation for Invoice No:'.$get_job_card_id.' of customer'.$customer_name;

$customer_amnt1=$grnd_ttl;
$grand_ttl=$grnd_ttl;



$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','-$customer_amnt1','$sales_date','cancinv$invoice_id','$incharge','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','-$grand_ttl','','$grand_ttl','$currency','$curr_rate','$sales_date','cancinv$invoice_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_desc','-$grand_ttl','$grand_ttl','','$currency','$curr_rate','$sales_date','cancinv$invoice_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


//echo number_format($sub_ttl_vat,2)	

if ($amount_received!='')
{

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_desc_paid','$amount_received','$sales_date','cancpart$invoice_id','$incharge','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc_paid','$amount_received','$amount_received','','$currency','$curr_rate','$sales_date','cancpart$invoice_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cash_ledger values('','$transaction_desc_paid','-$amount_received','','$amount_received','$currency','$curr_rate','$sales_date','cancpart$invoice_id','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}
else
{


}				  
							  
							  
							  
							  
							  
							  
							  
							  
							  
							  }


 */



/*
$sqltrans= "insert into client_transactions values('','$client_id','cns$invoice_no','$transaction_descinv','-$invoice_amnt',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Sales ( Against Inv No:$invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Accounts Receivables (Inv No:$invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled a Stock Transfer No $invoice_id')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
							  

header ("Location:home.php?pending_booking=pending_booking&cancelconfirm=1&invoice_no=$invoice_id");






mysql_close($cnn);


?>


