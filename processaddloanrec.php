<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$l_name=mysql_real_escape_string($_POST['l_name']);
$l_address=mysql_real_escape_string($_POST['l_address']);
$l_phone=mysql_real_escape_string($_POST['l_phone']);
$l_email=mysql_real_escape_string($_POST['l_email']);
$l_town=mysql_real_escape_string($_POST['l_town']);
$l_amount=mysql_real_escape_string($_POST['l_amount']);
$date_paid=mysql_real_escape_string($_POST['date_deposited']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$mop=mysql_real_escape_string($_POST['mop']);
$period_years=mysql_real_escape_string($_POST['period_years']);
$period_months=mysql_real_escape_string($_POST['period_months']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
//$date_paid=mysql_real_escape_string($_POST['date_paid']);
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
$amount==$l_amount;

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */


$queryprof="select * from loan_received where lenders_name='$l_name' and lenders_address='$l_address' and lenders_phone='$l_phone' and lenders_email='$l_email' 
and lenders_town='$l_town' and loan_amount='$l_amount' and currency_code='$currency' and period_years='$period_years' and period_months='$period_months'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


if ($numrowscomp>0)

{

 header ("Location:add_loan.php? recordexist=1");

}

else 

{





if ($mop==1)//cash
{

$sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$ref_no','$cheq_drawer','$our_bank','$date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

/* if ($mop==4)//mpesa
{
$sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$ref_no','$cheq_drawer','$our_bank','$m_date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
} */

if ($mop==2)//cheque
{

$sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$ref_no','$cheq_drawer','$our_bank','$date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
/* $sql= "insert into income values ('','$desc','$currency','$curr_rate','$amount','$mop','$transaction_code',
'$date_trans','$client_bank','$our_bank',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */

$sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$transaction_code','$client_bank','$our_bank','$date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}




/* $sql= "insert into loan_received values('', '$l_name', '$l_address', '$l_phone', '$l_email', '$l_town','$l_amount','$currency','$curr_rate','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$queryrec_no="select * from loan_received order by loan_received_id desc limit 1";
$resultsrec_no=mysql_query($queryrec_no) or die ("Error: $queryrec_no.".mysql_error());
$numrowsrec_no=mysql_fetch_object($resultsrec_no);
$latest_id=$numrowsrec_no->loan_received_id;

$exp_cat_name=$l_name;

$transaction_descinv='Loan Received From: ('.$exp_cat_name.')';
$transaction_desclg='Loan Received From ('.$exp_cat_name.') through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Loan Received From ('.$exp_cat_name.') through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Loan Received From ('.$exp_cat_name.') through Cash. Ref No : '.$cheque_no;




if ($mop==2)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','$l_amount','$l_amount','','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','$l_amount','$l_amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','lnrec$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into notes_payables_ledger values('','$transaction_descch','$l_amount','','$l_amount','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$l_amount','$l_amount','','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$l_amount','$l_amount','','$mop','$our_bank','$currency','$curr_rate','$date_paid','lnrec$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into notes_payables_ledger values('','$transaction_desclg','$l_amount','','$l_amount','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}

if ($mop==1 || $mop==4)
{

$sqltranslg= "insert into cash_ledger values('','$transaction_desccas','$l_amount','$l_amount','','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into notes_payables_ledger values('','$transaction_desclg','$l_amount','','$l_amount','$currency','$curr_rate','$date_paid','lnrec$latest_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Loan Received from $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:add_loan.php? addloanconfirm=1");



}

/*$queryprof="select * from  user_groups where group_name='$group_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);*/
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
/*if ($numrowscomp>0)

{

header ("Location:add_user_groups.php? recordexist=1");

}

else 

{



$sql= "insert into user_groups values ('','$group_name','$group_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_user_groups.php? addgroupconfirm=1");

}
*/


mysql_close($cnn);


?>


