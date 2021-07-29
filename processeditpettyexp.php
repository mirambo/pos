<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['petty_cash_expense_id'];
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$amount=mysql_real_escape_string($_POST['amount']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$transaction_desccas="Petty Cash Expenses - ". $desc;

$sql= "update petty_cash_expense set description='$desc', amount='$amount',currency='$currency',curr_rate='$curr_rate', date_paid='$date_paid',ref_no='$ref_no' where petty_cash_expense_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqltranslg= "UPDATE cash_ledger SET 
transactions='$transaction_desccas',
amount='-$amount',
credit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE sales_code='petexp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());



$sqltranslg= "UPDATE misc_expenses_ledger SET
transactions='$transaction_desccas',
amount='$amount',
debit='$amount',
currency_code='$currency',
date_recorded='$date_paid',
curr_rate='$curr_rate'

WHERE order_code='petexp$id'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Edited petty expenses $desc')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Record Saved Successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

								  


mysql_close($cnn);


?>


