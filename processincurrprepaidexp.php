<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$prepaid_expenses_id=$_GET['prepaid_expenses_id'];

$comm_due=mysql_real_escape_string($_POST['comm_due']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$amount_already_paid=mysql_real_escape_string($_POST['amount_already_paid']);
$balance=mysql_real_escape_string($_POST['balance']);
$currency=6;

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=1;
$desc='Incurr Of Prepaid Expenses';


$sqlfp= "insert into incurred_prepaid_expenses values ('','$prepaid_expenses_id','$amount_paid','$currency','$curr_rate',NOW(),'')";
$resultsfp= mysql_query($sqlfp) or die ("Error $sqlfp.".mysql_error());

$queryrec_no="select * from incurred_prepaid_expenses order by incurred_prepaid_expenses_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());

$numrowsrec_no=mysql_fetch_object($resultsrec_no);

$latest_id=$numrowsrec_no->incurred_prepaid_expenses_id;


$sqlss="INSERT INTO salary_expenses_ledger VALUES('','$desc','$amount_paid','$amount_paid', '', '$currency','$curr_rate',NOW(),'incurprepexp$latest_id')" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());


$sqltranslg= "insert into prepaid_expenses_ledger values('','$desc','-$amount_paid',' ','$amount_paid','$currency','$curr_rate',NOW(),'incurprepexp$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



//header ("Location:pay_commission.php");
header ("Location:recover_prepaid_expenses.php");




mysql_close($cnn);


?>


