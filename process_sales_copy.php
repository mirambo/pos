<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$customer_id=mysql_real_escape_string($_POST['customer_id']); 
$shop_id=mysql_real_escape_string($_POST['shop_id']); 

$sales_rep=mysql_real_escape_string($_POST['sales_rep']);

$queryprof1="select * from client_discount where client_id='$sales_rep'";
$resultsprof1=mysql_query($queryprof1) or die ("Error: $queryprof1.".mysql_error());
$rowsprof1=mysql_fetch_object($resultsprof1);

$com_perc=$rowsprof1->comm_perc;



$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$discount=mysql_real_escape_string($_POST['discount']);
$vat=mysql_real_escape_string($_POST['vat']);

$amount=mysql_real_escape_string($_POST['amount']);
$desc=mysql_real_escape_string($_POST['desc']);
$currency=7;
$curr_rate=1;

$cheque_no=mysql_real_escape_string($_POST['cheque_no']);
$cheq_drawer=mysql_real_escape_string($_POST['cheq_drawer']);
$date_drawn=mysql_real_escape_string($_POST['date_drawn']);
$ref_no=mysql_real_escape_string($_POST['ref_no']);
$date_paid=mysql_real_escape_string($_POST['date_paid']);
$transaction_code=mysql_real_escape_string($_POST['transaction_code']);
$client_bank=mysql_real_escape_string($_POST['client_bank']);
$our_bank=mysql_real_escape_string($_POST['our_bank']);
$date_trans=mysql_real_escape_string($_POST['date_trans']);
$comments=mysql_real_escape_string($_POST['terms']);

// check customer balance
$query1b="select SUM(amount) as ttl_bal from customer_transactions where customer_id='$customer_id'";
$results1b=mysql_query($query1b) or die ("Error: $query1b.".mysql_error());
$rows1b=mysql_fetch_object($results1b);
$ttl_bal=$rows1b->ttl_bal;










$query1="select * from customer where customer_id='$customer_id'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$cust_name=$rows1->customer_name;

 $credit_limit=$rows1->credit_limit;
 $credit_days=$rows1->credit_days;


if ($credit_limit!='' && $ttl_bal>$credit_limit)
{
?>
<script type="text/javascript">
alert('Sorry your credit limit of <?php echo $credit_limit?> for this customer has been exceeded. Let the balance of <?php echo $ttl_bal?>  cleared before given another sale on credit');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "generate_invoice.php";
</script>

<?php	
	
}

else
{

$sql= "insert into sales values('','$customer_id','$sales_rep','$com_perc','$currency','$curr_rate','$vat','$discount','$user_id',
'$shop_id','$date_from','cr','0','1','$comments',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryprof="select * from sales where user_id='$user_id' order by sales_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);


$sales_id=$rowsprof->sales_id;







//Items Details



foreach($_POST['country_no'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['country_no'][$row]);
$qnty=mysql_real_escape_string($_POST['country_code'][$row]);

$queryprofx="select * from received_stock_batch where procuct_id='$prod' order by expiry_date desc limit $qnty";
$resultsprofx=mysql_query($queryprofx) or die ("Error: $queryprofx.".mysql_error());
//$rowsprof=mysql_fetch_object($resultsprof);

while ($rowsprofx=mysql_fetch_object($resultsprofx))
{
	echo $rowsprofx->batch_no;
	
	echo '</br>';
	
}









$vend_price=mysql_real_escape_string($_POST['phone_code'][$row]);

$sql= "insert into sales_item values('','$sales_id','$shop_id','$prod','$qnty','$vend_price','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


//amount paid upon invoice payments

//header ("Location:generate_invoice.php?sales_id=$sales_id");
?>
<script type="text/javascript">
alert('Invoice Generated Suvccessfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "generate_invoice.php?sales_id=<?php echo $sales_id ?>";
</script>

<?php

mysql_close($cnn);

}
?>


