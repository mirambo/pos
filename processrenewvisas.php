<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$visa_details_id=$_GET['visa_details_id'];
$emp_id=$_GET['emp_id'];
$visa_type=mysql_real_escape_string($_POST['visa_type']);
$new_issue_date=mysql_real_escape_string($_POST['new_issue_date']);
$new_exp_date=mysql_real_escape_string($_POST['new_exp_date']);
$issue_place=mysql_real_escape_string($_POST['issue_place']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;

$sqlemp="select * from employees where emp_id='$emp_id'";
$resultsemp= mysql_query($sqlemp) or die ("Error $sqlemp.".mysql_error());
$rowsemp=mysql_fetch_object($resultsemp);
$emp_fname=$rowsemp->emp_fname;
$emp_lname=$rowsemp->emp_lname;




$queryprof="select * from renewed_visas where issue_date='$new_issue_date' and exp_date='$new_exp_date' and issue_place='$issue_place'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?renewvisa2=renewvisa2&visa_details_id=$visa_details_id&emp_id=$emp_id&recordexist=1");

}

else 
{

$sql= "insert into renewed_visas values ('','$visa_details_id','$emp_id','$visa_type','$new_issue_date','$amount',
'$new_exp_date','$issue_place','$currency','$curr_rate','0',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlpd= "update staff_visas set status='1' where emp_id='$emp_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());



$sqlss="INSERT INTO expenses_ledger VALUES('','Visa Renewal for $emp_fname $emp_lname','$amount','$amount', '','$currency','$curr_rate',NOW())";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Visa Renewal Payment for $emp_fname $emp_lname','-$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Visa Renewal Expenses for $emp_fname $emp_lname','$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Visa Renewal Payment for $emp_fname $emp_lname','-$amount','','$amount','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());





header ("Location:home.php?renewvisa2=renewvisa2&visa_details_id=$visa_details_id&emp_id=$emp_id&addcdpconfirm=1");

}

mysql_close($cnn);


?>


