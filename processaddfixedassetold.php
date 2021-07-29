<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$asset_name=mysql_real_escape_string($_POST['asset_name']);
$desc=mysql_real_escape_string($_POST['desc']);
$purchase_date=mysql_real_escape_string($_POST['purchase_date']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$amount_paid=mysql_real_escape_string($_POST['amount_paid']);
$unit_cost=mysql_real_escape_string($_POST['unit_cost']);
$currency=mysql_real_escape_string($_POST['currency']);
$dep_perc=mysql_real_escape_string($_POST['dep_perc']);
$ttl_value=$qnty*$unit_cost;
$dep_value=$dep_perc/100*$ttl_value;






$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate;
$curr_rate=$rowcurr->curr_rate;


/*if ($currency==2)
{
$amount_paid=$amount_paidx;
}
else
{
$amount_paid=$amount_paidx/$curr_rate;

}*/
$balance=$ttl_value-$amount_paid;



$queryprof="select * from  fixed_assets where fixed_asset_name='$asset_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 
if ($numrowscomp>0)

{

header ("Location:home.php?fixedasset=fixedasset&recordexist=1");

}


else 

{

$transaction_desc="Purchase of fixed asset $asset_name";
$sql= "insert into fixed_assets values ('','$asset_name','$desc','$purchase_date','$qnty','$unit_cost','$ttl_value','$currency','$curr_rate','$dep_perc','$dep_value','$amount_paid',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




$queryfx="select * from fixed_assets order by fixed_asset_id desc limit 1";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);

$latest_id=$rowsfx->fixed_asset_id;

if ($amount_paid=='' || $amount_paid==0)
{


$sqlgenled= "insert into general_ledger values('','Purchase of Fixed Asset ($asset_name)','$ttl_value','$ttl_value','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (Purchase of Fixed Asset $asset_name )','-$ttl_value','','$ttl_value','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqltrans= "insert into fixed_assets_ledger values('','$transaction_desc','$ttl_value','$ttl_value','','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desc','$ttl_value','','$ttl_value','$currency','$curr_rate',NOW(),'')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}

else
{

//posting cash
$sqlfp= "insert into fixed_assets_payments values ('','$latest_id','$currency','$curr_rate','$amount_paid',NOW())";
$resultsfp= mysql_query($sqlfp) or die ("Error $sqlfp.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash payment of Fixed Asset $asset_name','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables Payment of Fixed Asset $asset_name','$amount_paid','$amount_paid','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());


$sqltrans= "insert into cash_ledger values('','$transaction_desc','-$amount_paid','','$amount_paid','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','Cash payment of Fixed Asset $asset_name','-$amount_paid','$amount_paid','','$currency','$curr_rate',NOW(),'')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//posting cost

$sqlgenled= "insert into general_ledger values('','Purchase of Fixed Asset $asset_name','$ttl_value','$ttl_value','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables ( Purchase of Fixed Asset $asset_name )','-$ttl_value','','$ttl_value','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());



$sqltrans= "insert into fixed_assets_ledger values('','$transaction_desc','$ttl_value','$ttl_value','','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltrans= "insert into accounts_payables_ledger values('','$transaction_desc','$ttl_value','','$ttl_value','$currency','$curr_rate',NOW(),'')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

}


header ("Location:home.php?fixedasset=fixedasset&addconfirm=1");

}


mysql_close($cnn);


?>


