<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$quotation_id=$_GET['quotation_id'];
$quote_code=$_GET['quote_code'];
$quote_no=$_GET['quote_no'];
$reasons=mysql_real_escape_string($_POST['reasons']);

$sql="insert into cancelled_quotations values('','$quote_no','$quote_code','$reasons','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancel="UPDATE quotations set status='2' where quotation_id='$quotation_id'";
$resultscancel=mysql_query($querycancel) or die ("Error: $querycancel.".mysql_error());

/*$querycancelprod="UPDATE sales set status='2' where sales_code='$sales_code'";
$resultscancelprod=mysql_query($querycancelprod) or die ("Error: $querycancelprod.".mysql_error());



//select other invoice details
$sqlxy="select * from invoices where invoice_id='$invoice_id'";
$resultsxy= mysql_query($sqlxy) or die ("Error $sqlxy.".mysql_error());
$rowsxy=mysql_fetch_object($resultsxy);

$grndttl=$rowsxy->invoice_ttl;
$client_id=$rowsxy->client_id;
$currency=$rowsxy->currency_code;
$curr_rate=$rowsxy->curr_rate;
$transaction_descinv="Cancelation Of Invoice $invoice_no";


$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_descinv ($reasons)','-$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Sales ( Against Inv No:$get_invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Accounts Receivables (Inv No:$get_invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_descinv','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_descinv','-$grndttl','$grndttl','','$currency','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());






*/

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled Quotation $quote_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());







								  

header ("Location:view_quotations.php? cancelconfirm=1");






mysql_close($cnn);


?>


