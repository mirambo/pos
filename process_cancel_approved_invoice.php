<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$job_card_id=$_GET['job_card_id'];

$reasons=mysql_real_escape_string($_POST['reason']);

$sqllpdet="select * FROM job_cards WHERE job_card_id='$job_card_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);

//$invoice_no=$rowslpdet->invoice_id;
//$job_card_id=$rowslpdet->job_card_id;
$client_id=$rowslpdet->customer_id;
$currency=$rowslpdet->currency;
$curr_rate=$rowslpdet->curr_rate;



$sql= "insert into cancelled_invoices values('','$job_card_id','$user_id','$reasons',NOW(),'3')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancelsale="UPDATE job_cards set approved_status='2' where job_card_id='$job_card_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Cancel Sales ( Against Inv No:$invoice_no)','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cancel Accounts Receivables (Inv No:$invoice_no)','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled an approved Invoice No $invoice_no')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());




								  

header ("Location:home.php?addformfields=addformfields&job_card_id=$job_card_id&cancelconfirm=1&cancel=1&reason=$reasons");






mysql_close($cnn);


?>


