<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$fixed_asset_id=$_GET['fixed_asset_id'];
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$amnt_paid=mysql_real_escape_string($_POST['amount_paid']);
$amount_already_paid=mysql_real_escape_string($_POST['amount_already_paid']);
$balance=mysql_real_escape_string($_POST['balance']);
$mop=mysql_real_escape_string($_POST['mop']);
$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);

$date_paid=mysql_real_escape_string($_POST['date_paid']);
$m_date_paid=mysql_real_escape_string($_POST['m_date_paid']);
$m_ref_no=mysql_real_escape_string($_POST['m_ref_no']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$trans_src_bank=mysql_real_escape_string($_POST['trans_src_bank']);
$dep_bank=mysql_real_escape_string($_POST['dep_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */


$queryfx="select * from fixed_assets where fixed_asset_id='$fixed_asset_id'";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);
$exp_cat_name=$rowsfx->fixed_asset_name;


if ($mop==1)//cash
{
$sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


/* $sql= "insert into loan_received values('','$l_name', '$l_address', '$l_phone', '$l_email', '$l_town',
'$currency','$curr_rate','$l_amount','$mop','$cheque_no','$ref_no','$cheq_drawer','$our_bank','$date_paid','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */
}

if ($mop==4)//mpesa
{
$sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==2)//cheque
{

$sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','$cheque_no','$ref_no','$date_drawn','$cheq_drawer','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

if ($mop==3)//bank transfer
{
$sql= "insert fixed_assets_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$transaction_code','$date_paid','$client_bank','$our_bank',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}



$queryl="select * from fixed_assets_payments order by fixed_asset_repayment_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$fixed_asset_repayment_id=$rowsl->fixed_asset_repayment_id;


$transaction_descinv='Fixed Asset Payment: '.$exp_cat_name;
$transaction_desclg='Fixed Asset Payment '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Fixed Asset Payment '.($exp_cat_name).' through Cheque. Cheque No : '.$cheque_no;
$transaction_desccas='Fixed Asset Payment '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;


if ($mop==2)//cheque
{
$sqltranslg= "insert into bank_ledger values('','$transaction_descch','-$amnt_paid',' ','$amnt_paid','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_descch','-$amnt_paid',' ','$amnt_paid','$mop','$our_bank','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_descch','-$amnt_paid','$amnt_paid','','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


}

if ($mop==3)//Electronic transfer
{

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amnt_paid',' ','$amnt_paid','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amnt_paid',' ','$amnt_paid','$mop','$our_bank','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desclg','-$amnt_paid','$amnt_paid','','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


}

if ($mop==1 || $mop==4)//cash
{
$sqltrans= "insert into cash_ledger values('','$transaction_desccas','-$amnt_paid','','$amnt_paid','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desccas','-$amnt_paid','$amnt_paid','','$currency','$curr_rate','$date_paid','fxdap$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}





/* $sqlgenled= "insert into general_ledger values('','$transaction_desclg','$amnt_paid','$amnt_paid','','$currency','$curr_rate',NOW(),'fxdap$fixed_asset_repayment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desclg','-$amnt_paid','','$amnt_paid','$currency','$curr_rate',NOW(),'fxdap$fixed_asset_repayment_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error()); */


header ("Location:pay_fixed_asset.php?addconfirm=1&fixed_asset_id=$fixed_asset_id&amount_paid=$amount_already_paid&balance=$balance");




mysql_close($cnn);


?>


