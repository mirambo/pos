<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$cash=$_GET['cash'];

$date_from=mysql_real_escape_string($_POST['date_from']); 
$credit_account_id=mysql_real_escape_string($_POST['credit_account_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 
$receipt_no=mysql_real_escape_string($_POST['receipt_no']); 
//$department_id=mysql_real_escape_string($_POST['department_id']); 


$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$comments=mysql_real_escape_string($_POST['terms']);

$sqlxx = "UPDATE expenses_code SET 
account_to_credit='$credit_account_id',
currency='$currency',
curr_rate='$curr_rate',
expense_receipt_no='$receipt_no',
expense_date='$date_from',
expense_description='$comments' WHERE expense_code_id='$order_code'";
$resultxx = mysql_query($sqlxx) or die ( mysql_error());

/* $sql= "update sales_items set 
 	shop_id='$shop_id'
 	

where sales_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated Expenses details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "generate_invoice.php?sales_id=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

								  


mysql_close($cnn);


?>


