<?php

include('Connections/fundmaster.php');

$date_month=mysql_real_escape_string($_POST['date_month']);

$sql= "delete from payrol_basic_log where payment_month='$date_month'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from expenses_ledger where transactions LIKE '%$date_month%' AND transactions LIKE '%$Salary for nat%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from cash_ledger where transactions LIKE '%$date_month%' AND transactions LIKE '%$Salary for nat%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "delete from pay_slips where month_printed LIKE '%$date_month%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



header ("Location:home.php?cancelpayroll=cancelpayroll&delconfirm=1&date_month=$date_month");



mysql_close($cnn);


?>


