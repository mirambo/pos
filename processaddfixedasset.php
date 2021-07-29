<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$fixed_asset_category_id=mysql_real_escape_string($_POST['fixed_asset_category_id']);

$sqldep="select * from fixed_asset_category where fixed_asset_category_id='$fixed_asset_category_id'";
$resultsdep= mysql_query($sqldep) or die ("Error $sqldep.".mysql_error());
$rowdep=mysql_fetch_object($resultsdep);
$dep_perc=$rowdep->fixed_asset_dep_perc;

$asset_name=mysql_real_escape_string($_POST['asset_name']);
$quantity=mysql_real_escape_string($_POST['quantity']);
$desc=mysql_real_escape_string($_POST['desc']);
$purchase_date=mysql_real_escape_string($_POST['purchase_date']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$value1=mysql_real_escape_string($_POST['value']);
//$useful_life=mysql_real_escape_string($_POST['useful_life']);
//$useful_life=mysql_real_escape_string($_POST['useful_life']);
//$salvage_value=mysql_real_escape_string($_POST['salvage_value']);

$value=$value1*$quantity;
//$dep_value=($value1-$salvage_value)/$useful_life;
$dep_value=$dep_perc*$value/100;

//$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
//$balance=$value-$amount_paid;

/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */



$queryprof="select * from  fixed_assets where fixed_asset_name='$asset_name' AND value='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:add_fixed_asset.php? recordexist=1");

}

else 

{

$transaction_desc="Purchase of fixed asset $asset_name";
//$transaction_descbs="Payment of fixed asset through bank transfer. Ref :".$transaction_code;
$sql= "insert into fixed_assets values ('','$asset_name','$quantity','$desc','$purchase_date','$currency','$curr_rate','$value1','$dep_value','$fixed_asset_category_id','$dep_perc',NOW(),'$purchase_date','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$queryfx="select * from fixed_assets order by fixed_asset_id desc limit 1";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);

$latest_id=$rowsfx->fixed_asset_id;

/* $sqlgenled= "insert into general_ledger values('','Purchase of Fixed Asset ($asset_name)','$value','$value','','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables ( Purchase of Fixed Asset $asset_name )','-$value','','$value','$currency','$curr_rate',NOW(),'fixeda$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error()); */

$sqltrans= "insert into fixed_assets_ledger values('','$transaction_desc','$value','$value','','$currency','$curr_rate','$purchase_date','fixeda$latest_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desc','$value','','$value','$currency','$curr_rate','$purchase_date','fixeda$latest_id','','','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());



header ("Location:add_fixed_asset.php? addconfirm=1");

}


mysql_close($cnn);


?>


