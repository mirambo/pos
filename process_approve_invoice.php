<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');

$job_card_id=$_GET['job_card_id'];

$sql2prf="SELECT * FROM approved_job_cards where job_card_id='$job_card_id'";
$resultsprf= mysql_query($sql2prf) or die ("Error $sql2prf.".mysql_error());
$rows_num=mysql_num_rows($resultsprf);

if ($rows_num>0)
{


}
else
{

$sql= "insert into approved_job_cards values('','$job_card_id','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql3= "UPDATE job_cards SET approved_status='1' WHERE job_card_id='$job_card_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sqluprec_no="UPDATE invoice_payments set status='1' where sales_code_id='$job_card_id'";
$resultsuprec_no= mysql_query($sqluprec_no) or die ("Error $sqluprec_no.".mysql_error());
$latest_id=$invoice_payment_id;

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Approved Job Card/Invoice/Cash Sale: No $job_card_id')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
}

header ("Location:pre_approve_invoice.php");


mysql_close($cnn);


?>


