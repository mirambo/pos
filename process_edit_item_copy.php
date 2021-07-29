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
//$pack_size='Pieces';

$sql3="UPDATE items SET
cat_id='$cat_id',
sub_cat_id='$sub_cat_id',
item_name='$item_name',
item_code='$item_code',
vat_status='$vat_status',
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

if ($value_at_hand=='')
{
	

	
	
	
}
else
{
/* 
$sql3="INSERT INTO received_stock VALUES('','$order_code_id','$order_code','$item_id','$value_at_hand','$currency','$curr_rate','$date_dep',
'$expiry_date','1',NOW(),'$user_id','$batch_no')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error()); */

$sqldr3= "SELECT * from received_stock where product_id='$item_id' AND order_code_id='0'";
$resultsdr3= mysql_query($sqldr3) or die ("Error $sqldr3.".mysql_error());
$num_rowsdr3=mysql_num_rows($resultsdr3);

if ($num_rowsdr3>0)
{
$sql3="UPDATE received_stock SET
product_id='$item_id',
quantity_rec='$value_at_hand',
delivery_date='$date_dep'

WHERE product_id='$item_id' and order_code_id='0'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
}
else
{
	
$sql3="INSERT INTO received_stock SET
product_id='$item_id',
quantity_rec='$value_at_hand',
delivery_date='$date_dep'" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());
	
	
	
}

}

/* $account_id_dr=7;
$sqldr= "SELECT * from account where account_id='$account_id_dr'";
$resultsdr= mysql_query($sqldr) or die ("Error $sqldr.".mysql_error());
$rowsdr=mysql_fetch_object($resultsdr);
$acc_type_id_dr=$rowsdr->account_type_id;
$acc_cat_id_dr=$rowsdr->account_cat_id;


$account_id_cr=6;
$sqlcr= "SELECT * from account where account_id='$account_id_cr'";
$resultscr= mysql_query($sqlcr) or die ("Error $sqlcr.".mysql_error());
$rowscr=mysql_fetch_object($resultscr);
$acc_type_id_cr=$rowscr->account_type_id;
$acc_cat_id_cr=$rowscr->account_cat_id;




$memo="Inventory Opening Balance for item ".$item_name;
$amount=$value_at_hand*$item_value;
$currency=6;
$curr_rate=1;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="itemop".$latest_id;




//debit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr','$acc_type_id_dr','$account_id_dr','$shop_id','$memo','$amount','$amount','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

//credit
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr','$acc_type_id_cr','$account_id_cr','$shop_id','$memo','$amount','','$amount','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into item_transactions values('','$latest_id','$memo','$value_at_hand','$date_dep','$day','$month','$year','$transaction_code',
'$user_id','$shop_id','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */


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


