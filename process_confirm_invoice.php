<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$invoice_id=$_GET['invoice_id'];
$terms=mysql_real_escape_string($_POST['terms']);
$currency=6;
$invoice_date=mysql_real_escape_string($_POST['date_from']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$labour_cost=mysql_real_escape_string($_POST['labour_cost']);
$discount_val=mysql_real_escape_string($_POST['discount_val']);
$vat_value=mysql_real_escape_string($_POST['vat_value']);
$grand_ttl=mysql_real_escape_string($_POST['grand_ttl']);
$item_value=mysql_real_escape_string($_POST['item_value']);


$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;


$query1="SELECT * from bookings where booking_id='$booking_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$customer_id=$rows1->customer_id;

$querycl="SELECT * from customer where customer_id='$customer_id'";
$resultscl=mysql_query($querycl) or die ("Error: $querycl.".mysql_error());
$rowscl=mysql_fetch_object($resultscl);

$c_name=$rowscl->customer_name;

$transaction_descinv='Labour Sales Inv No:'.$invoice_id;	
$transaction_desc='Labour Sales Inv No:'.$invoice_id.' To '.$c_name;	
	


$sqllpo="insert into confirmed_invoice VALUES('','$invoice_id','$booking_id','$job_card_id','$customer_id','$user_id',NOW(),'0')";
$resultslpo=mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


foreach($_POST['part_id'] as $row=>$Part_Id)
{

$part_id=mysql_real_escape_string($_POST['part_id'][$row]);

$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$item_value=mysql_real_escape_string($_POST['item_value'][$row]);
$item_amount=$quantity*$item_value;

$transaction_descinvent='Sales for Item '.$item_name.'-'.$item_code.' of the Inv No:'.$invoice_id;
//$unit_price=$unit_price_org/$curr_rate;

$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinvent','$item_amount','$item_amount','','$currency','$curr_rate',NOW(),'inv$part_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlupdt= "UPDATE released_item SET approved_invoice_status='1' WHERE item_id='$part_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());  


}

$sqlupdt= "UPDATE  invoice SET confirm_status='1' WHERE invoice_id='$invoice_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());  

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','$grand_ttl',NOW(),'inv$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','$grand_ttl','$grand_ttl','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_desc','$grand_ttl','','$grand_ttl','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$sqlaccpay= "insert into vat_ledger values('','$transaction_desc','$vat_value','$vat_value','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into discount_allowed_ledger values('','$transaction_desc','$discount_val','$discount_val','','$currency','$curr_rate',NOW(),'inv$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$queryind="SELECT * from confirmed_invoice ORDER BY confirmed_invoice_id DESC LIMIT 1";
$resultsind=mysql_query($queryind) or die ("Error: $queryind.".mysql_error());
$rowsind=mysql_fetch_object($resultsind);
$confirmed_invoice_id=$rowsind->confirmed_invoice_id;

mysql_close($cnn);


?>


