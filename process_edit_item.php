<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$item_id=$_GET['item_id'];
$to=date( 'Y-m-d H:i:s', time());
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$sub_cat_id=mysql_real_escape_string($_POST['sub_cat_id']);
$item_name=mysql_real_escape_string($_POST['item_name']);
$item_code=mysql_real_escape_string($_POST['item_code']);
$value_at_hand=mysql_real_escape_string($_POST['value_at_hand']);
$date_dep=mysql_real_escape_string($_POST['date_dep']);
$shop_id=mysql_real_escape_string($_POST['shop_id']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$item_value=mysql_real_escape_string($_POST['item_value']);
$item_sp=mysql_real_escape_string($_POST['item_sp']);
$item_desc=mysql_real_escape_string($_POST['item_desc']);
$vat_status=mysql_real_escape_string($_POST['vat_status']);
$item_section=mysql_real_escape_string($_POST['item_section']);
$account_type_id=mysql_real_escape_string($_POST['account_type_id']);
//$pack_size='Pieces';

$sql3="UPDATE items SET
cat_id='$cat_id',
account_type_id='$account_type_id',
sub_cat_id='$sub_cat_id',
item_name='$item_name',
item_code='$item_code',
vat_status='$vat_status',
item_section='$item_section',
reorder_level='$reorder_level',
curr_bp='$item_value',
curr_sp='$item_sp',
description='$item_desc',
opening_balance='$value_at_hand',
opening_bal_date='$date_dep'

where item_id='$item_id'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


/* $sqlop= "SELECT * from items order by item_id desc limit 1";
$resultsop= mysql_query($sqlop) or die ("Error $sqlpod.".mysql_error());
$rowsop=mysql_fetch_object($resultsop); */

/* $sql3="INSERT INTO received_stock VALUES('','$order_code_id', '$item_id','$value_at_hand','6','1','$date_dep',
'$expiry_date','1','$to','$user_id')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error()); */

$memo="Inventory Opening Balance for item ".$item_name;
$transaction_code="itemop".$item_id;

$date_dep;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="itemop".$latest_id;

if ($value_at_hand=='')
{
	
echo "blank";
	
	
	
}
else
{

$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error()); 

$sqldr3= "SELECT * from received_stock where product_id='$item_id' AND order_code_id='0'";
$resultsdr3= mysql_query($sqldr3) or die ("Error $sqldr3.".mysql_error());
$num_rowsdr3=mysql_num_rows($resultsdr3);

if ($num_rowsdr3>0)
{
	
$sql3="UPDATE received_stock SET
product_id='$item_id',
status='1',
quantity_rec='$value_at_hand',
delivery_date='$date_dep'

WHERE product_id='$item_id' and order_code_id='0'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());



}
else
{
$sql3="INSERT INTO received_stock SET
product_id='$item_id',
status='1',
quantity_rec='$value_at_hand',
delivery_date='$date_dep'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

	
	
}




$sqldr3p= "SELECT * from item_transactions where transaction_code='$transaction_code'";
$resultsdr3p= mysql_query($sqldr3p) or die ("Error $sqldr3p.".mysql_error());
$num_rowsdr3p=mysql_num_rows($resultsdr3p);

if ($num_rowsdr3p>0)
{
	
	
$sql3="UPDATE item_transactions SET
item_id='$item_id',
memo='$memo',
quantity='$value_at_hand',
transaction_date='$date_dep',
l_day='$day',
l_month='$month',
l_year='$year' WHERE transaction_code='$transaction_code'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());





}
else
{
	
$sql3="INSERT INTO item_transactions SET
item_id='$item_id',
memo='$memo',
quantity='$value_at_hand',
transaction_date='$date_dep',
transaction_code='$transaction_code',
l_day='$day',
l_month='$month',
l_year='$year'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());	
	
	
}


}

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated an item $item_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Item Updated Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "home.php?setuptemplate=setuptemplate&item_id=<?php echo $item_id;?>";
</script>

<?php



mysql_close($cnn);

?>


