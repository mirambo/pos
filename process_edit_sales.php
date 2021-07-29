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
$customer_id=mysql_real_escape_string($_POST['client_id']); 

$sales_rep=mysql_real_escape_string($_POST['sales_rep']); 
$order_no=mysql_real_escape_string($_POST['order_no']); 

$delivery_address=mysql_real_escape_string($_POST['delivery_address']);

$delivered_by=mysql_real_escape_string($_POST['delivered_by']);

$queryprof1="select * from client_discount where client_id='$sales_rep'";
$resultsprof1=mysql_query($queryprof1) or die ("Error: $queryprof1.".mysql_error());
$rowsprof1=mysql_fetch_object($resultsprof1);
$com_perc=$rowsprof1->comm_perc;

$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);
$mop=mysql_real_escape_string($_POST['mop']);

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);


$comments=mysql_real_escape_string($_POST['comments']);

$query1="select * from customer where customer_id='$customer_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->customer_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;



$sql= "update sales set 
 	customer_id='$customer_id', 
 	sales_rep='$sales_rep', 
 	comm_perc='$com_perc', 
 	discount='$discount',  	
 	vat='$vat',  	
  	sale_date='$date_from', 
  	order_no='$order_no', 
	delivery_address='$delivery_address',
	delivered_by='$delivered_by',
 	general_remarks='$comments'

where sales_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/* $sql= "update sales_items set 
 	shop_id='$shop_id'
 	

where sales_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error()); */


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated Sales details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Invoice Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "generate_invoice.php?sales_id=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

								  


mysql_close($cnn);


?>


