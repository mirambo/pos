<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$employee=mysql_real_escape_string($_POST['employee']);
$amountx=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$bal_type=mysql_real_escape_string($_POST['bal_type']);




$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
//curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

$amount=$amountx*$curr_rate;


$sqlemp_det="select * from employees where emp_id='$employee'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);



$transaction2="Staff Opening Balance for ".$rowsemp_det->emp_firstname.' '.$rowsemp_det->emp_middle_name.' '.$rowsemp_det->emp_lastname;
$transaction="Staff Opening Balance";

$sqltransp= "insert into pay_slips values('','','','$employee','$amount','','$amount',NOW(),'','')";
$resultstransp=mysql_query($sqltransp) or die ("Error $sqltransp.".mysql_error());

$sqltrans= "insert into staff_transactions values('','$employee','0','$transaction','$amount','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqlaccpay= "insert into com_payables_ledger values('','$transaction2','$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());









header ("Location:add_employees_op.php? addconfirm=1");




mysql_close($cnn);


?>


