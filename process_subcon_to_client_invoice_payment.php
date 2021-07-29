<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$month_generated=mysql_real_escape_string($_POST['month_generated']);
$client_id=mysql_real_escape_string($_POST['client_id']);
$amnt_paid=mysql_real_escape_string($_POST['amnt_paid']);
$project_id=mysql_real_escape_string($_POST['project_id']);
$mop=mysql_real_escape_string($_POST['mop']);
$invoice_no=mysql_real_escape_string($_POST['invoice_no']);
$bal=mysql_real_escape_string($_POST['bal']);
$amnt_rec_sofar=mysql_real_escape_string($_POST['amnt_rec_sofar']);
$invoice_id=$_GET['invoice_id'];

//$current_month=(Date("F Y"));


$queryprof="select * from  subcon_to_client_invoice_payments where month_generated='$month_generated' and  client_id ='$client_id' and amount_received='$amnt_paid' and mop='$mop'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:home.php?recordsubcontoclientpayment=recordsubcontoclientpayment&project_id=$project_id&client_id=$client_id&month_generated=$month_generated&invoice_id=$invoice_id&invoice_ttl=$invoice_ttl&recordexist=1");


}


elseif ($amnt_paid>$bal)
{

$change=$amnt_paid-$bal;


header ("Location:home.php?recordsubcontoclientpayment=recordsubcontoclientpayment&abnormal=1&invoice_id=$invoice_id&balance=$bal&amnt_paid=$amnt_paid&amnt_rec_sofar=$amnt_rec_sofar&change=$change");


} 

else 

{



$sql= "insert into subcon_to_client_invoice_payments values ('','$month_generated','$invoice_id','$project_id','$client_id','$amnt_paid','$mop',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$transaction_desc='Subcon Invoice Payment to client for Invoice No:'.$invoice_no;
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

$transaction_desclg='Subcontractor Inv Payment from client for inv:'.$invoice_no;

$sqltrans= "insert into client_transactions values('','$client_id','$transaction_desc','-$amnt_paid',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','$amnt_paid','$amnt_paid','','2','1',NOW())";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Subcon Accounts Receivables (Invoice No : $invoice_no)','-$amnt_paid','','$amnt_paid','2','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Subcon Payment Received from client ( Invoice No : $invoice_no)','$amnt_paid','$amnt_paid','','2','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','-$amnt_paid','','$amnt_paid','2','1',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


}

header ("Location:home.php?receivesubconpay=receivesubconpay");
}

//header ("Location:sales_receipt.php?invoice_no=$invoice_no&receipt_no=$receipt_no&amnt_rec=$amnt_paid&mop=$mop&client_id=$client_id&curr_id=$currency_code");


//}




mysql_close($cnn);


?>


