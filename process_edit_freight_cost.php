<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=mysql_real_escape_string($_POST['order_code']);
$freight_cost=mysql_real_escape_string($_POST['freight_cost']);
//$exrate=mysql_real_escape_string($_POST['exrate']);


$id=$_GET['curr_id'];



$sql= "update freight_charges SET freight_charge_amount='$freight_cost' where order_code_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$update_sql="UPDATE ledger_transactions SET amount='$freight_cost',debit='$freight_cost' WHERE transaction_code='frt$order_code' and account_id='11'";

$resultspd=mysql_query($update_sql) or die ("Error $update_sql.".mysql_error());



$update_sql="UPDATE ledger_transactions SET amount='$freight_cost',credit='$freight_cost' WHERE transaction_code='frt$order_code' and account_id='3'";

$resultspd=mysql_query($update_sql) or die ("Error $update_sql.".mysql_error());






/* $sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr2','$acc_type_id_dr2','$account_id_dr2','$shop_id','$memo2','$freight_charges','$freight_charges','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code2','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr23','$acc_type_id_dr23','$account_id_dr23','$shop_id','$memo2','$freight_charges','','$freight_charges','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code2','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */






$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited freight cost')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



header ("Location:receive_stock_to_warehouse.php?success=1&order_code_id=$order_code");



mysql_close($cnn);


?>


