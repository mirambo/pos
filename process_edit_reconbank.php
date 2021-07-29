<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
/*$bank=mysql_real_escape_string($_POST['bank']);
$date_from=mysql_real_escape_string($_POST['date_from']);
$date_to=mysql_real_escape_string($_POST['date_to']);
$date_done=mysql_real_escape_string($_POST['date_done']);
$out_bal=mysql_real_escape_string($_POST['out_bal']);*/
$id=$_GET['reconciled_bank_balance'];
$desc=mysql_real_escape_string($_POST['desc']);
$effect=mysql_real_escape_string($_POST['effect']);
$date_rec=mysql_real_escape_string($_POST['date_rec']);
$amount=mysql_real_escape_string($_POST['amount']);
$amount2=substr($amount,1);
$currency=mysql_real_escape_string($_POST['currency']);


$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;

if ($effect==1)
{
$sql= "UPDATE reconciled_bank_balance SET 
effect='$effect',
description='$desc',
amount='$amount2',
reducing_amount='$amountxx',
adding_amount='$amount2',
currency='$currency',
curr_rate='$curr_rate',
date_done='$date_rec'

WHERE reconciled_bank_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


elseif ($effect==0)
{
$sql= "UPDATE reconciled_bank_balance SET 
effect='$effect',
description='$desc',
amount='-$amount',
reducing_amount='$amount',
adding_amount='$amountxx',
currency='$currency',
curr_rate='$curr_rate',
date_done='$date_rec'

WHERE reconciled_bank_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
else
{

}


header ("Location:edit_reconciled_bank_balance.php?editconfirm=1&reconciled_bank_balance=$id");




mysql_close($cnn);


?>


