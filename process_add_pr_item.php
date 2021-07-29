<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=mysql_real_escape_string($_POST['order_code']);

$sqlrec="select * FROM purchase_returns WHERE purchase_returns_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$order_date=$rowsrec->date_generated;

//$booking_id=mysql_real_escape_string($_POST['booking_id']);
$part_id=mysql_real_escape_string($_POST['part_id']);

$query11="select * from products where product_id='$part_id'";
$results11=mysql_query($query11) or die ("Error: $query11.".mysql_error());
$rows11=mysql_fetch_object($results11);

$product_name=$rows11->product_name;
$pack_size=$rows11->pack_size;

$quantity=mysql_real_escape_string($_POST['item_quantity']);
$price=mysql_real_escape_string($_POST['price']);

$purchase_cost=$price*$quantity;
 
$sql= "insert into purchase_returns_items values('','$order_code','$part_id','$description','$quantity','$price','$order_date','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querylatelpo="select * from purchase_returns_items order by purchase_returns_items_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_pr_id=$rowslatelpo->purchase_returns_items_id;

$sqlaccpay="insert into inventory_ledger values('','Purchase returns $quantity $product_name ($pack_size)','-$purchase_cost','','$purchase_cost','$currency','$curr_rate','$order_date','prt$latest_pr_id','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqltrans= "insert into item_transactions values('','$part_id','Purchase returns $quantity $product_name ($pack_size)','-$quantity','$order_date','prt$latest_pr_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Added more purchase returns items into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location:record_purchase_returns.php?order_code=$order_code&addpartconfirm=1");




mysql_close($cnn);

?>


