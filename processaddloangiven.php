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
$currency=mysql_real_escape_string($_POST['currency']);
$period_years=mysql_real_escape_string($_POST['period_years']);
$period_months=mysql_real_escape_string($_POST['period_months']);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;


$queryprof="select * from loan_given where lenders_name='$l_name' and lenders_address='$l_address' and lenders_phone='$l_phone' and lenders_email='$l_email' 
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

 header ("Location:add_loan_given_out.php? recordexist=1");

}

else 

{
$transaction_desclg="Loan Given To $l_name";

$sql= "insert into loan_given values('', '$l_name', '$l_address', '$l_phone', '$l_email', '$l_town','$l_amount','$currency','$curr_rate','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryl="select * from loan_given order by loan_given_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$loan_given_id=$rowsl->loan_given_id;

/*$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desclg','$l_amount','','$l_amount','$currency','$curr_rate',NOW(),'lg$loan_given_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/

$sqlaccpay= "insert into notes_receivables_ledger values('','$transaction_desclg','$l_amount','$l_amount','','$currency','$curr_rate',NOW(),'lg$loan_given_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','-$l_amount','','$l_amount','$currency','$curr_rate',NOW(),'lg$loan_given_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','$transaction_desclg','-$l_amount','','$l_amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash $transaction_desclg','$l_amount','$l_amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Loan Given To from $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:add_loan_given_out.php? addloanconfirm=1");



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


