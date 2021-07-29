<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$exp_cat_name=mysql_real_escape_string($_POST['lender_name']);
$amnt_paid=mysql_real_escape_string($_POST['amnt_paid']);
$currency_code=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$m_date_paid=mysql_real_escape_string($_POST['m_date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

/* $sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$bal=mysql_real_escape_string($_POST['bal']);
$amnt_rec_sofar=mysql_real_escape_string($_POST['amnt_rec_sofar']);
$loan_received_id=$_GET['loan_received_id'];


/*$queryprof="select * from  loan_repayments where loan_received_id='$loan_received_id' and mop='$mop'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());

$numrowscomp=mysql_num_rows($resultsprof);
 

if ($numrowscomp>0)

{

header ("Location:repay_loan.php?loan_received_id=$loan_received_id&loan_paid=$amnt_rec_sofar&loan_bal=$bal&recordexist=1");

}*/
$amnt_paid2=$amnt_paid*$curr_rate;

if ($amnt_paid2>$bal)
{

$change=$amnt_paid-$bal;


header ("Location:repay_loan.php?loan_received_id=$loan_received_id&loan_paid=$amnt_rec_sofar&loan_bal=$bal&abnormal=1");
} 

else 

{


if ($mop==1)//cash
{
$sql= "insert loan_repayments values ('','','$loan_received_id','$amnt_paid','','$currency_code','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


/* $sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$ref_no','$cheq_drawer','$our_bank','$date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */
}

if ($mop==4)//mpesa
{
$sql= "insert loan_repayments values ('','','$loan_received_id','$amnt_paid','','$currency_code','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{

$sql= "insert loan_repayments values ('','','$loan_received_id','$amnt_paid','','$currency_code','$curr_rate',
'$mop','$cheque_no','$ref_no','$date_paid','$cheq_drawer','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert loan_repayments values ('','','$loan_received_id','$amnt_paid','','$currency_code','$curr_rate',
'$mop','','$transaction_code','$date_paid','$client_bank','$our_bank',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}



$queryl="select * from loan_repayments order by loan_repayment_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$loan_repayment_id=$rowsl->loan_repayment_id;




$transaction_descinv='Loan Repayment: ('.$exp_cat_name.')';
$transaction_desclg='Loan Repayment ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Loan Repayment ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Loan Repayment ('.$exp_cat_name.') through Cash. Ref No : '.$ref_no;


if ($mop==2)//cheque
{
$sqltranslg= "insert into notes_payables_ledger values('','$transaction_descch','-$amnt_paid','$amnt_paid','','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_ledger values('','$transaction_descch','-$amnt_paid',' ','$amnt_paid','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','-$amnt_paid','','$amnt_paid','$mop','$our_bank','$currency','$curr_rate','$date_paid','lnrep$loan_repayment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==3)// transafer
{

$sqltranslg= "insert into notes_payables_ledger values('','$transaction_desclg','-$amnt_paid','$amnt_paid','','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amnt_paid',' ','$amnt_paid','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amnt_paid','','$amnt_paid','$mop','$our_bank','$currency','$curr_rate','$date_paid','lnrep$loan_repayment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}

if ($mop==1 || $mop==4)
{

$sqltranslg= "insert into notes_payables_ledger values('','$transaction_desccas','-$amnt_paid','$amnt_paid','','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','-$amnt_paid',' ','$amnt_paid','$currency_code','$curr_rate','$date_paid','lnrep$loan_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}




header ("Location:view_loan_rec.php?addconfirm=1");

}




mysql_close($cnn);


?>


