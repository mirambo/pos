<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$prod=$_GET['product_id'];
$shop_id=$_GET['shop_id'];
$date_adjust=mysql_real_escape_string($_POST['exit_date']);
$qnty_rec=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);
$bal_type=mysql_real_escape_string($_POST['account']);
$desc=mysql_real_escape_string($_POST['desc']);
$transaction="Balance Adjustment";

$sqllpdet="select * from items where item_id='$prod'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rows=mysql_fetch_object($resultslpdet);
$product_name=$rows->item_name.' ('.$rows->item_code.')';
$unit_price=$rows->curr_bp;

$grand_ttl=$unit_price*$qnty_rec;
$currency=7;
$curr_rate=1;
 

if ($bal_type==2)
{
$transactionr="Inventory Adjustment(Reduction), Reason:".$desc;

$sql3="INSERT INTO adjusted_items VALUES('','$prod','-$qnty_rec','$unit_price','$desc','$date_adjust','0','$shop_id')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sql="SELECT * FROM adjusted_items order by adjusted_item_id desc LIMIT 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$latest_item_id=$rows->adjusted_item_id;

$sqlaccpay= "insert into item_transactions values('','$prod','$transactionr','-$qnty_rec','$date_adjust','adj$latest_item_id','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into sales_ledger values('','$transactionr','-$grand_ttl','$grand_ttl','','$currency','$curr_rate','$date_adjust','adj$latest_item_id','','','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into inventory_ledger values('','$transactionr','-$grand_ttl','','$grand_ttl','$currency','$curr_rate','$date_adjust','adj$latest_item_id','','','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



/* $sql3="INSERT INTO received_stock VALUES('','$order_code_id', '$prod','$qnty_rec','6','1','$delivery_date',
'$expiry_date','1',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error()); */


}
elseif($bal_type==1)
{
$transactioni="Inventory Adjustment(Increament), Reason:".$desc;

$sql3="INSERT INTO adjusted_items VALUES('','$prod','$qnty_rec','$unit_price','$desc','$date_adjust','0','$shop_id')";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sql="SELECT * FROM adjusted_items order by adjusted_item_id desc LIMIT 1";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
$latest_item_id=$rows->adjusted_item_id;

$sqlaccpay= "insert into item_transactions values('','$prod','$transactioni','$qnty_rec','$date_adjust','adj$latest_item_id','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into sales_ledger values('','$transactioni','$grand_ttl',' ','$grand_ttl','$currency','$curr_rate','$date_adjust','adj$latest_item_id','','','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay= "insert into inventory_ledger values('','$transactioni','$grand_ttl','$grand_ttl','','$currency','$curr_rate','$date_adjust','adj$latest_item_id','','','$shop_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
else
{

}

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Adjusted inventory Balance for product $product_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Item <?php $product_name ?> Adjusted Successfully');
window.location = "closing_stock.php";

</script>

<?php

//header ("Location:closing_stock.php?addconfirm=1&product_id=$prod");






mysql_close($cnn);


?>


