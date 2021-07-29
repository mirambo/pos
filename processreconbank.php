<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$bank=mysql_real_escape_string($_POST['bank']);
$date_from=mysql_real_escape_string($_POST['date_from']);
$date_to=mysql_real_escape_string($_POST['date_to']);
$date_done=mysql_real_escape_string($_POST['date_done']);
$out_bal=mysql_real_escape_string($_POST['out_bal']);
$desc=mysql_real_escape_string($_POST['desc']);
$effect=mysql_real_escape_string($_POST['effect']);
$date_rec=mysql_real_escape_string($_POST['date_rec']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);


$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_rate=$rowsprod->curr_rate;

if ($effect==1)
{
$sql= "insert into reconciled_bank_balance values ('','$bank','$date_from','$date_to','$out_bal','$effect','$desc','$amount',
'$amount','','$currency','$curr_rate','$date_done','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($effect==0)
{
$sql= "insert into reconciled_bank_balance values ('','$bank','$date_from','$date_to','$out_bal','$effect','$desc','-$amount',
'','$amount','$currency','$curr_rate','$date_done','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
else
{

}


header ("Location:reconcile_bank_balance.php?bank_id=$bank&date_from=$date_from&date_to=$date_to&date_done=$date_done&out_balance=$out_bal&addconfirm=1");




mysql_close($cnn);


?>


