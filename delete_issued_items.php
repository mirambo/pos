<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$released_item_id=$_GET['issued_item_id'];
$requisition_id=$_GET['requisition_id'];
$all=$_GET['all'];

$querydc="select * FROM issued_items,items,requisition WHERE issued_items.requisition_id=requisition.requisition_id AND issued_items.item_id=items.item_id AND issued_items.issued_item_id='$released_item_id'";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

$rows=mysql_fetch_object($resultsdc);

$prod=$rows->item_id;
$qnty_rec=$rows->quantity_issued;
$amount=$rows->issued_item_value;
$delivery_date=date('Y-m-d', time());



$bp_totals=$qnty_rec*$amount;

$currency=7;
$curr_rate=1;

$transaction_code="delcop".$released_item_id;

$query1p="select * from items where item_id='$prod'";
$results1p=mysql_query($query1p) or die ("Error: $query1p.".mysql_error());
$rows1p=mysql_fetch_object($results1p);
$item_name=$rows1p->item_name;


$memo2='Deleted Issued items name '.$item_name.' , quantity : '.$qnty_rec.' from the store';


$sqlaccpay= "insert into cost_of_production_ledger values('','$memo2','-$bp_totals','','$bp_totals','$currency','$curr_rate','$delivery_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	


$sqlaccpay= "insert into inventory_ledger values('','$memo2','$bp_totals','$bp_totals','','$currency','$curr_rate','$delivery_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	



$sql= "DELETE  FROM issued_items where issued_item_id='$released_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'$memo2')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "view_issued_items.php?sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


