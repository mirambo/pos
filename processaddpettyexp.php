<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);


$sql= "insert into petty_cash_expense values('','$desc','$amount','$currency','$curr_rate','$ref_no','$date_paid',NOW(),'')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$queryl="select * from petty_cash_expense order by petty_cash_expense_id  desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$transaction_id=$rowsl->petty_cash_expense_id;

$sql= "insert into cash_ledger values('','Petty Cash Expenses - $desc','-$amount','','$amount','$currency','$curr_rate','$date_paid','petexp$transaction_id','','','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlss="INSERT INTO misc_expenses_ledger VALUES('','Petty Cash Expenses - $desc','$amount','$amount', '', '$currency','$curr_rate','$date_paid','petexp$transaction_id','','','')";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded an petty cash expense $desc worth $amount into the system')";
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


