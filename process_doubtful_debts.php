<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');

$sales_code=mysql_real_escape_string($_POST['sales_code']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$amnt_paid=mysql_real_escape_string($_POST['amnt_paid']);
$currency_code=mysql_real_escape_string($_POST['currency_code']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$reason=mysql_real_escape_string($_POST['reason']);
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$invoice_no=mysql_real_escape_string($_POST['invoice_no']);
$bal=mysql_real_escape_string($_POST['bal']);
$amnt_rec_sofar=mysql_real_escape_string($_POST['amnt_rec_sofar']);
$invoice_id=$_GET['invoice_id'];

$current_month=(Date("F Y"));


$queryprof="select * from  doubtful_debts where sales_code='$sales_code' and  client_id ='$client_id' and amount='$amnt_paid' and reason='$reason'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  


$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:receive_invoice_payment.php? recordexist=1");

}


elseif ($amnt_paid>$bal)
{

$change=$amnt_paid-$bal;


header ("Location:receive_invoice_payment.php? abnormal=1&invoice_id=$invoice_id&sales_rep=$sales_rep&balance=$bal&amnt_paid=$amnt_paid&amnt_rec_sofar=$amnt_rec_sofar&change=$change");

} 

else 

{

$sql= "insert into doubtful_debts values ('','$sales_code','$client_id','$bal','$reason','$currency_code','$curr_rate',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlpdt="update invoices set doubt_ful_status='0' where sales_code='$sales_code'";
$resultspdt= mysql_query($sqlpdt) or die ("Error $sqlpdt.".mysql_error());




$transaction_desc='Doubtful Debts for Inv:'.$invoice_no;
$date = date('Y-m-d h:i:s');
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*5);
$formatDate = date('Y-m-d h:i:s', $futureDate);



$queryred1="select * from  client_transactions where transaction ='$transaction_desc' AND date_recorded BETWEEN '$date' AND '$formatDate'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$transaction_desclg='Sales receipt against Receipt No:'.$receipt_no;

$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','-$bal',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','$bal','$bal','','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','A/C Recv for Doubtful Debts for Invoice $invoice_no','-$bal','','$bal','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into doubtful_debts_ledger values('','$transaction_desc','$bal','$bal','','$currency_code','$curr_rate',NOW())";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
//$sqlaccpay= "insert into bad_debts_ledger values('','$transaction_desc','$bal','','$bal','$currency_code','$curr_rate',NOW())";
//$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
$sqlaccpay= "insert into accounts_receivables_ledger values('','Doubtful Debts for Invoice $invoice_no','-$bal','','$bal','$currency_code','$curr_rate',NOW(),'$sales_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}


}

header ("Location:bad_debts.php?success=1");


mysql_close($cnn);


?>


