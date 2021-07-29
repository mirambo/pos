<?php
#include connection
include('Connections/fundmaster.php');
include ('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['fixed_asset_repayment_id'];
$fixed_assets_payments_desc=$_GET['expense_desc'];


$sql= "delete from prepaid_expenses_payments where prepaid_expenses_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from prepaid_expenses_ledger where order_code='prepay$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from salary_expenses_ledger where order_code='prepay$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted Prepaid Expenses recovery Payments details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:view_recovered_prepaid_expenses.php? deleteconfirm=1");





mysql_close($cnn);


?>


