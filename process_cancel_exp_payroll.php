<?php

include('Connections/fundmaster.php');

$date_month=mysql_real_escape_string($_POST['date_month']);


$sql= "delete from payrol_expbasic_log where payment_month='$date_month'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql= "delete from expenses_ledger where transactions LIKE '%$date_month%' AND transactions LIKE '%$Salary for exp%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where transactions LIKE '%$date_month%' AND transactions LIKE '%$Salary for exp%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from exp_pay_slips where month_printed LIKE '%$date_month%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?cancelexppayroll=cancelexppayroll&delconfirm=1&date_month=$date_month");



mysql_close($cnn);


?>


