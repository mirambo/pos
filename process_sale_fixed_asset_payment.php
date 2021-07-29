<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$fixed_asset_id=mysql_real_escape_string($_POST['fixed_asset_id']);
$amnt_paid=mysql_real_escape_string($_POST['amnt_paid']);
$curr_value=mysql_real_escape_string($_POST['curr_value']);
$mop=mysql_real_escape_string($_POST['mop']);

$sqlfa="SELECT * FROM fixed_assets where fixed_asset_id='$fixed_asset_id'";
$resultsfa=mysql_query($sqlfa) or die ("Error: $sqlfa.".mysql_error());
$rowsfa=mysql_fetch_object($resultsfa);
$fixed_asset_name=$rowsfa->fixed_asset_name;
$value=$rowsfa->value ;
$currency=$rowsfa->currency;
$curr_rate=$rowsfa->curr_rate;
$value_kshs=$value*$curr_rate;

$gain=$amnt_paid-$value_kshs;
$loss=$value_kshs-$amnt_paid;
$sql= "insert into sale_fixed_asset_payment values ('','$fixed_asset_id','$curr_value','$amnt_paid','6','1','$mop',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$queryfx="select * from sale_fixed_asset_payment order by sale_fixed_asset_payment_id desc limit 1";
$resultsfx=mysql_query($queryfx) or die ("Error: $queryfx.".mysql_error());
								  
$rowsfx=mysql_fetch_object($resultsfx);

$latest_id=$rowsfx->sale_fixed_asset_payment_id;

if ($gain>=0)
{
/*$sqld= "insert into income values('','$user_id','Gain on sale of fixed asset $fixed_asset_name','6','1','$gain','$mop',NOW())";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());*/

$sqlaccpay= "insert into income_ledger values('','Gain on sale of fixed asset $fixed_asset_name','$gain',' ','$gain','6','1',NOW(),'disfa$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into fixed_assets_ledger values('','Gain on sale of fixed asset $fixed_asset_name','-$gain','','$gain','6','1',NOW(),'disfa$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}
else
{
/*$sqld= "insert into expenses values('','$user_id','loss on sale of fixed_asset $fixed_asset_name','6','1','$loss','$mop',NOW())";
$resultsd= mysql_query($sqld) or die ("Error $sqld.".mysql_error());*/

$sqlss="INSERT INTO salary_expenses_ledger VALUES('','loss on sale of fixed asset $fixed_asset_name','$loss','$loss', '', '6','1',NOW(),'disfa$latest_id')";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());


$sqlaccpay= "insert into fixed_assets_ledger values('','loss on sale of fixed asset $fixed_asset_name','-$loss','','$loss','6','1',NOW(),'disfa$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
$sqlpdt="update fixed_assets set status='1' where fixed_asset_id='$fixed_asset_id'";
$resultspdt= mysql_query($sqlpdt) or die ("Error $sqlpdt.".mysql_error());


/*$transaction_desc='Receipt No:'.$receipt_no;
$date = date('Y-m-d h:i:s');
$currentDate = strtotime($date);
$futureDate = $currentDate+(60*1);
$formatDate = date('Y-m-d h:i:s', $futureDate);*/




$sqltranslg= "insert into cash_ledger values('','Disposal Fixed Asset $fixed_asset_name','$amnt_paid','$amnt_paid','','6','1',NOW(),'disfa$latest_id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Disposal Fixed Asset $fixed_asset_name','$amnt_paid','','$amnt_paid','6','1',NOW(),'disfa$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash ( Disposal Fixed Asset $fixed_asset_name)','$amnt_paid','$amnt_paid','','6','1',NOW(),'disfa$latest_id')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into fixed_assets_ledger values('','Disposal Fixed Asset $fixed_asset_name','-$amnt_paid','','$amnt_paid','6','1',NOW(),'disfa$latest_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());








header ("Location:dispose_fixed_assets.php?success=1");





mysql_close($cnn);


?>


