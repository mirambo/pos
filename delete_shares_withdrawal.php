<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['shares_withdrawal_id'];


$sql= "delete from shares_withdrawal where shares_withdrawal_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from shareholder_transactions where order_code='shwd$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where sales_code='shwd$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from shares_ledger where order_code='shwd$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Shares Withdrawal Investments')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:view_shares_withdrawal.php? deleteconfirm=1");






mysql_close($cnn);


?>


