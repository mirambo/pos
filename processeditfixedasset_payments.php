<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$asset_name=mysql_real_escape_string($_POST['asset_name']);
$desc=mysql_real_escape_string($_POST['desc']);
$purchase_date=mysql_real_escape_string($_POST['purchase_date']);
$currency=mysql_real_escape_string($_POST['currency']);
$value=mysql_real_escape_string($_POST['value']);
$useful_life=mysql_real_escape_string($_POST['useful_life']);
$salvage_value=mysql_real_escape_string($_POST['salvage_value']);
$dep_value=($value-$salvage_value)/$useful_life;

$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$balance=$value-$amount_paid;

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;

$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


$queryprof="select * from  fixed_assets where fixed_asset_name='$asset_name' AND value='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:add_fixed_asset.php? recordexist=1");

}

elseif ($amount_paid>$value)
{
header ("Location:add_fixed_asset.php? abnormal=1");
}


else 

{


$transaction_desc="Purchase of fixed asset $asset_name";
$transaction_descbs="Payment of fixed asset through bank transfer. Ref :".$transaction_code;
$sql= "insert into fixed_assets values ('','$asset_name','$desc','$purchase_date','$currency','$curr_rate','$value','$dep_value','$salvage_value','$useful_life','$amount_paid',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryfx="select * from fixed_assets order by fixed_asset_id desc limit 1";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);

$latest_id=$rowsfx->fixed_asset_id;

if ($amount_paid=='' || $amount_paid==0)
{


$sqlgenled= "insert into general_ledger values('','Purchase of Fixed Asset ($asset_name)','$value','$value','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables ( Purchase of Fixed Asset $asset_name )','-$value','','$value','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqltrans= "insert into fixed_assets_ledger values('','$transaction_desc','$value','$value','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desc','$value','','$value','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}
else
{
//posting cash
$sqlfp= "insert into fixed_assets_payments values ('','$latest_id','$currency','$curr_rate','$amount_paid',NOW())";
$resultsfp= mysql_query($sqlfp) or die ("Error $sqlfp.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash payment of Fixed Asset $asset_name','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables Payment of Fixed Asset $asset_name','$amount_paid','$amount_paid','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

if ($mop==2 || $mop==3)
{
$sqltranslg= "insert into bank_ledger values('','$transaction_desc','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
else
{
$sqltrans= "insert into cash_ledger values('','$transaction_desc','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
}


$sqltrans= "insert into accounts_payables_ledger values('','Cash payment of Fixed Asset $asset_name','-$amount_paid','$amount_paid','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

if ($mop==3)	
{
$sqltranslg= "insert into bank_statement values('','$transaction_descbs','-$amount_paid','','$amount_paid','$mop','$our_bank','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());
}
//posting cost

$sqlgenled= "insert into general_ledger values('','Purchase of Fixed Asset $asset_name','$value','$value','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables ( Purchase of Fixed Asset $asset_name )','-$value','','$value','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$sqltrans= "insert into fixed_assets_ledger values('','$transaction_desc','$value','$value','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desc','$value','','$value','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}


header ("Location:add_fixed_asset.php? addconfirm=1");

}


mysql_close($cnn);


?>


