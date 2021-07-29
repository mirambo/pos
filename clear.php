<?php 
include('Connections/fundmaster.php');



$sql = "TRUNCATE customer_transactions"; 

$result = mysql_query($sql);


$sql = "TRUNCATE customer_transactions"; 

$result = mysql_query($sql);

$sql = "TRUNCATE misc_expenses_ledger"; 

$result = mysql_query($sql);


$sql = "TRUNCATE accounts_receivables_ledger"; 

$result = mysql_query($sql);


$sql = "TRUNCATE cash_ledger"; 
$result = mysql_query($sql);


$sql = "TRUNCATE bank_ledger"; 
$result = mysql_query($sql);


$sql = "TRUNCATE sales_ledger"; 
$result = mysql_query($sql);


$sql = "TRUNCATE sales_returns_ledger"; 
$result = mysql_query($sql);

$sql = "TRUNCATE inventory_ledger"; 
$result = mysql_query($sql);

$sql = "TRUNCATE cost_of_production_ledger"; 
$result = mysql_query($sql);

/* $sql = "TRUNCATE quotation"; 
$result = mysql_query($sql);


$sql = "TRUNCATE quotation_item"; 
$result = mysql_query($sql);


$sql = "TRUNCATE quotation_task"; 
$result = mysql_query($sql);



$sql = "TRUNCATE quotation_requisition"; 
$result = mysql_query($sql);


$sql = "TRUNCATE quotation_requisition_item"; 
$result = mysql_query($sql);


$sql = "TRUNCATE requisition"; 
$result = mysql_query($sql);


$sql = "TRUNCATE requisition_item"; 
$result = mysql_query($sql);


$sql = "TRUNCATE order_code_get"; 
$result = mysql_query($sql);


$sql = "TRUNCATE purchase_order"; 
$result = mysql_query($sql);

$sql = "TRUNCATE received_stock"; 
$result = mysql_query($sql);


$sql = "TRUNCATE released_items"; 
$result = mysql_query($sql);

$sql = "TRUNCATE supplier_transactions"; 
$result = mysql_query($sql);

$sql = "TRUNCATE supplier_payments"; 
$result = mysql_query($sql); */

?>
<script type="text/javascript">
alert('Data Base cleared Successfuly');
window.location = "home.php?monitor=monitor";
</script>
<?php


?>
