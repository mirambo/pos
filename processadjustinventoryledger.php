<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$grndttl=mysql_real_escape_string($_POST['amount']);
$account=mysql_real_escape_string($_POST['account']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=6;
$curr_rate=1;
//$transaction="Opening Balance";


//$sql= "insert into accounts_payables_ledger values ('','$transaction','$amount','','$amount','6','1',NOW(),'')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$transaction_descinv="Balance Adjustment, Reason:".$desc;

if ($account==1)
{
$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinv','-$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}
elseif ($account==2)
{
$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinv','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
}

else
{

}

header ("Location:adjust_inventory_ledger.php? addconfirm=1");



mysql_close($cnn);


?>


