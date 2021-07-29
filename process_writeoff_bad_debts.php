<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_code=$_GET['sales_code'];
$client_id=$_GET['client_id'];
$amount=$_GET['recovrd_amount'];
$currency_code=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];
$doubtful_debt_id=$_GET['doubtful_debt_id'];
//$reason=mysql_real_escape_string($_POST['reason']);
$invoice_no=$_GET['invoice_no'];

$sqlpdt="update doubtful_debts set status='2' where sales_code='$sales_code'";
$resultspdt= mysql_query($sqlpdt) or die ("Error $sqlpdt.".mysql_error());


$transaction_desc='Write Off Bad Debdts for Inv:'.$invoice_no;
$date = date('Y-m-d h:i:s');
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*5);
$formatDate = date('Y-m-d h:i:s', $futureDate);



$queryred1="select * from  client_transactions where transaction ='$transaction_desc' AND date_recorded BETWEEN '$date' AND '$formatDate'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{
//echo "kweli";

}
else
{

$transaction_desclg='Sales receipt against Receipt No:'.$receipt_no;

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','Write Off Bad debts for Inv: $invoice_no','-$amount',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Write Off Bad debts for Inv: $invoice_no','$amount','$amount','','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','A/C Receivables(Write Off Bad debts Inv No:$invoice_no)','-$amount','','$amount','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into bad_debts_ledger values('','$transaction_desc','$amount','$amount','','$currency_code','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','Write Off Bad debts for Inv: $invoice_no','-$amount','','$amount','$currency_code','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



}


//}

header ("Location:view_doubtful_debts.php");






mysql_close($cnn);


?>


