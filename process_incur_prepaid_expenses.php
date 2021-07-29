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


$queryfx="SELECT * FROM prepaid_expenses,expenses_categories WHERE 
prepaid_expenses.exp_cat_id=expenses_categories.exp_cat_id AND prepaid_expenses.prepaid_expenses_id='$fixed_asset_id'";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);
$exp_cat_name=$rowsfx->expense_category_name;


$sql= "insert INTO prepaid_expenses_payments values ('','','$fixed_asset_id','$amnt_paid','','$currency','$curr_rate',
'$mop','','$ref_no','$date_paid','','',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryl="select * from prepaid_expenses_payments order by prepaid_expenses_payments_id desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$fixed_asset_repayment_id=$rowsl->prepaid_expenses_payments_id;


$transaction_descinv='Incurr Prepaid Expenses: '.$exp_cat_name;
$transaction_desclg='Incurr Prepaid Expenses '.($exp_cat_name).' through Bank Transfer. Ref No : '.$transaction_code;
$transaction_descch='Incurr Prepaid Expenses '.($exp_cat_name).' through Cheque. Ref No : '.$cheque_no;
$transaction_desccas='Incurr Prepaid Expenses '.($exp_cat_name).' through Cash. Ref No : '.$ref_no;


$sqltrans= "insert into prepaid_expenses_ledger values('','$transaction_descinv','-$amnt_paid',' ','$amnt_paid','$currency','$curr_rate','$date_paid','prepay$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sqltrans= "insert into salary_expenses_ledger values('','$transaction_descinv','$amnt_paid',' $amnt_paid','','$currency','$curr_rate','$date_paid','prepay$fixed_asset_repayment_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());




header ("Location:incurr_prepaid_expenses.php?addconfirm=1&prepaid_expenses_id=$fixed_asset_id");



mysql_close($cnn);


?>


