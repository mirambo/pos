<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$rec_id=mysql_real_escape_string($_POST['rec_id']);
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
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$queryprod="select * from currency where curr_id='$currency'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
$curr_name=$rowsprod->curr_name;

if ($effect==1)
{
$mop=1;
$transaction_desclg='Reconcile Cash balance ('.$desc.') Upwards';

$sql= "insert into reconciled_system_balance values ('','$rec_id','','$date_from','$date_to','$out_bal','$effect','$transaction_desclg','$amount',
'$amount','','$currency','$curr_rate','$date_rec','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from reconciled_system_balance order by reconciled_system_balance_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$id=$rowslatelpo->reconciled_system_balance_id;

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into income_ledger values('','$transaction_desclg','$amount','','$amount','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


/* $sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$bank',
'$currency','$curr_rate','$date_rec','srecon$id')";
$resultstranslg=mysql_query($sqltranslg) or die ("error $sqltranslg.".mysql_error()); */


}


if ($effect==2)
{
$mop=2;
$transaction_desclg='Reconcile Bank balance ('.$desc.') Upwards';

$sql= "insert into reconciled_system_balance values ('','$rec_id','$bank','$date_from','$date_to','$out_bal','$effect','$transaction_desclg','$amount',
'$amount','','$currency','$curr_rate','$date_rec','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from reconciled_system_balance order by reconciled_system_balance_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$id=$rowslatelpo->reconciled_system_balance_id;

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into income_ledger values('','$transaction_desclg','$amount','','$amount','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqltranslg= "insert into bank_statement values('','$transaction_desclg','$amount','$amount','','$mop','$bank',
'$currency','$curr_rate','$date_rec','srecon$id')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());




}



if ($effect==3)
{
$mop=1;
$transaction_desclg='Reconcile Cash balance ('.$desc.') Downwards';

$sql= "insert into reconciled_system_balance values ('','$rec_id','','$date_from','$date_to','$out_bal','$effect','$transaction_desclg','$amount',
'','$amount','$currency','$curr_rate','$date_rec','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from reconciled_system_balance order by reconciled_system_balance_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$id=$rowslatelpo->reconciled_system_balance_id;

$sqltranslg= "insert into cash_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into salary_expenses_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}


if ($effect==4)
{
$mop=2;
$transaction_desclg='Reconcile Bank balance ('.$desc.') Downwards';

$sql= "insert into reconciled_system_balance values ('','$rec_id','$bank','$date_from','$date_to','$out_bal','$effect','$transaction_desclg','$amount',
'','$amount','$currency','$curr_rate','$date_rec','0','$user_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from reconciled_system_balance order by reconciled_system_balance_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
$id=$rowslatelpo->reconciled_system_balance_id;

$sqltranslg= "insert into bank_ledger values('','$transaction_desclg','-$amount','','$amount','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into salary_expenses_ledger values('','$transaction_desclg','$amount','$amount','','$currency','$curr_rate','$date_rec','srecon$id','','','')";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "insert into bank_statement values('','$transaction_desclg','-$amount','','$amount','$mop','$bank',
'$currency','$curr_rate','$date_rec','srecon$id')";
$resultstranslg=mysql_query($sqltranslg) or die ("error $sqltranslg.".mysql_error());


}

else
{

}


header ("Location:reconcile_system_balance.php?bank_id=$bank&date_from=$date_from&date_to=$date_to&rec_id=$rec_id&addconfirm=1");




mysql_close($cnn);


?>


