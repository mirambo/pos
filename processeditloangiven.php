<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['loan_given_id'];
$l_name=mysql_real_escape_string($_POST['l_name']);
$l_address=mysql_real_escape_string($_POST['l_address']);
$l_phone=mysql_real_escape_string($_POST['l_phone']);
$l_email=mysql_real_escape_string($_POST['l_email']);
$l_town=mysql_real_escape_string($_POST['l_town']);
$l_amount=mysql_real_escape_string($_POST['l_amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$period_years=mysql_real_escape_string($_POST['period_years']);
$period_months=mysql_real_escape_string($_POST['period_months']);


$sql= "update loan_given set 
lenders_name='$l_name',
lenders_address='$l_address', 
lenders_phone='$l_phone',
lenders_email='$l_email' ,
lenders_town='$l_town' ,
loan_amount='$l_amount' ,
period_years='$period_years', 
period_months='$period_months' 

where loan_given_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update cash_ledger set amount='$l_amount', credit='$l_amount' where sales_code='lg$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update notes_receivables_ledger set amount='-$l_amount', debit='$l_amount' where sales_code='lg$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited loan given out details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:edit_loan_given.php?updateconfirm=1&loan_given_id=$id");

								  


mysql_close($cnn);


?>


