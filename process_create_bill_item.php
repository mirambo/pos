<?php
include('includes/session.php');
include('Connections/fundmaster.php');
$booking_id=mysql_real_escape_string($_POST['booking_id']);
$order_code=mysql_real_escape_string($_POST['order_code']);
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$item_name=mysql_real_escape_string($_POST['item_name']);
$item_code=mysql_real_escape_string($_POST['item_code']);
$qnty=mysql_real_escape_string($_POST['item_quantity']);
$reorder_level=mysql_real_escape_string($_POST['reorder_level']);
$vend_price=mysql_real_escape_string($_POST['item_value']);
$unit_price=mysql_real_escape_string($_POST['item_sp']);
$item_desc=mysql_real_escape_string($_POST['item_desc']);
$pack_size='Pieces';

$sqlprof= "SELECT * from items where item_code='$item_code'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
header ("Location:begin_invoice.php?order_code=$order_code&recordexist=1");
}
else
{

$sql3="INSERT INTO items VALUES('','$cat_id','$item_name','$item_code','$pack_size','$reorder_level','$item_value','$item_sp','$item_desc','')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$sql= "insert into products values ('','$cat_id','$item_name','$item_code','$pack_size','$weight','$reorder_level','$item_sp','$item_value','6','1','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlprofi= "SELECT * from items order by item_id desc limit 1";
$resultsprofi= mysql_query($sqlprofi) or die ("Error $sqlprofi.".mysql_error());
$rowsprofi=mysql_fetch_object($resultsprofi);

$prod=$rowsprofi->item_id;

$sql= "insert into purchase_order values('','$order_code','$prod','$description','$qnty','$vend_price',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$queryprof="select * from order_code_get where order_code_id='$order_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());								  
$rowsprof=mysql_fetch_object($resultsprof);
$currency=$rowsprof->currency;
$curr_rate=$rowsprof->curr_rate;
$delivery_date=$rowsprof->date_generated;

$purchase_cost=$vend_price*$qnty;


$sql3="INSERT INTO received_stock VALUES('','$order_code', '$prod','$qnty','$currency','$curr_rate','$delivery_date',
'$expiry_date','1',NOW())";
$results3=mysql_query($sql3) or die ("Error $sql3.".mysql_error());

$querylatelpo="select * from purchase_order order by purchase_order_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_pr_id=$rowslatelpo->purchase_order_id;


$sqlaccpay="insert into inventory_ledger values('','Direct order $qnty $item_name','$purchase_cost','$purchase_cost','','$currency','$curr_rate','$delivery_date','dro$latest_pr_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$prod','Direct Order $qnty $item_name','$qnty','$delivery_date','dro$latest_pr_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into purchases_ledger values('','Direct order $qnty $product_name ($pack_size)','$purchase_cost','$purchase_cost','','$currency','$curr_rate','$delivery_date','dro$latest_pr_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item $item_name through direct order into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:begin_invoice.php?order_code=$order_code&addconfirm=1");
}

?>