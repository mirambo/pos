<?php
#include connection
include ('includes/session.php'); 
include('Connections/fundmaster.php');

$to=date('Y-m-d H:i:s', time());
$to2=date('Y-m-d', time());

$currency=6;
$curr_rate=1;

foreach($_POST['item_id'] as $row=>$item_id)
{   

$item_id=mysql_real_escape_string($_POST['item_id'][$row]);

$query_no="SELECT * FROM items_opening_balances where item_id='$item_id'";
$results_no=mysql_query($query_no) or die ("Error: $query_no.".mysql_error());
$rows_no=mysql_num_rows($results_no);
	
	if ($rows_no>0)
	{
		
	}
	else
	{


	
$query1p="select * from items where item_id='$item_id'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=mysql_real_escape_string($rows1p->item_name);
	
    $op_date=mysql_real_escape_string($_POST['op_date'][$row]);
    $op_quant=mysql_real_escape_string($_POST['op_quant'][$row]);
    $op_cost=mysql_real_escape_string($_POST['op_cost'][$row]);
    $debit_account_id=mysql_real_escape_string($_POST['debit_account_id'][$row]);
    $credit_account_id=mysql_real_escape_string($_POST['credit_account_id'][$row]);
    //$md_remarks=mysql_real_escape_string($_POST['md_remarks'][$row]);
	
$ttl_cost=$op_quant*$op_cost;
	
$memo2='Opening Stock For Item '.$item_name;
$dr_transaction_code='itm_op_dr'.$item_id;
$cr_transaction_code='itm_op_cr'.$item_id;

$orderdate = explode('-', $op_date);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

if ($op_date=='0000-00-00')
{
	
	
}
else
{
	
//////	
$sql34="INSERT INTO items_opening_balances SET 
	date_recorded='$op_date',
	item_id='$item_id',
	quantity='$op_quant',
	cost='$op_cost',
	amount='$ttl_cost',
	account_credited='$credit_account_id',
	account_debited='$debit_account_id',
	datetime_recorded='$todate',
	recorded_by='$user_id'" or die(mysql_error());
    $results34= mysql_query($sql34) or die ("Error $sql34.".mysql_error());
	$lat_id=mysql_insert_id();	
	
	
	
	
	
	

///debit transactions	
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$debit_account_id',
transaction_section='OPNSTC',
memo='$memo2',
amount='$ttl_cost',
debit='$ttl_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$op_date',
transaction_datetime_recorded='$to',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	



///credit transactions	
$sqltransx="INSERT INTO chart_transactions SET 
account_type_id='$credit_account_id',
transaction_section='OPNSTC',
memo='$memo2',
amount='$ttl_cost',
credit='$ttl_cost',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$op_date',
transaction_datetime_recorded='$to',
transaction_code='$cr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstransx=mysql_query($sqltransx) or die ("Error $sqltransx.".mysql_error());	

$sql23= "update items SET 
status2='1' where item_id='$item_id'";
$results23=mysql_query($sql23) or die ("Error $sql23.".mysql_error()); 
	
}
}	

}

?>
									
									
<script type="text/javascript">
alert('Record Saved Successfully');
window.location = "home.php?post_item_ob";
</script>
<?php

mysql_close($cnn);


?>


