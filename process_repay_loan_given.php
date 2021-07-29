<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$lender_name=mysql_real_escape_string($_POST['lender_name']);
$amnt_paid=mysql_real_escape_string($_POST['amnt_paid']);
$currency_code=mysql_real_escape_string($_POST['currency_code']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);

$bal=mysql_real_escape_string($_POST['bal']);
$amnt_rec_sofar=mysql_real_escape_string($_POST['amnt_rec_sofar']);
$loan_given_id=$_GET['loan_given_id'];


/*$queryprof="select * from  loan_repayments where loan_received_id='$loan_received_id' and mop='$mop'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());

$numrowscomp=mysql_num_rows($resultsprof);
 

if ($numrowscomp>0)

{

header ("Location:repay_loan.php?loan_received_id=$loan_received_id&loan_paid=$amnt_rec_sofar&loan_bal=$bal&recordexist=1");

}*/


if ($amnt_paid>$bal)
{

$change=$amnt_paid-$bal;


header ("Location:repay_loan_given.php?loan_given_id=$loan_given_id&loan_paid=$amnt_rec_sofar&loan_bal=$bal&abnormal=1");
} 

else 

{



$sql= "insert loan_given_repayments values ('','$loan_given_id','$amnt_paid','$currency_code','$curr_rate','$mop',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryl="select * from loan_given_repayments order by loan_given_repayment_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$loan_given_repayment_id=$rowsl->loan_given_repayment_id;


$transaction_desclg='Loan Given Repayment for '.$lender_name;

/*$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desclg','-$amnt_paid','$amnt_paid','','$currency_code','$curr_rate',NOW(),'lgrep$loan_given_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/
$sqlaccpay= "insert into notes_receivables_ledger values('','$transaction_desclg','-$amnt_paid','$amnt_paid','','$currency_code','$curr_rate',NOW(),'lgrep$loan_given_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','$amnt_paid','$amnt_paid','','$currency_code','$curr_rate',NOW(),'lgrep$loan_given_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Cash $transaction_desclg','$amnt_paid','$amnt_paid','','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desclg','-$amnt_paid','','$amnt_paid','$currency_code','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/




header ("Location:view_loan_given_out.php?addconfirm=1");

}




mysql_close($cnn);


?>


