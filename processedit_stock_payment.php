<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['stock_payments_id'];
$original_amnt_paid=$_GET['original_amnt_paid'];
$order_code=$_GET['order_code'];
$recent_amount_paid=$_GET['recent_amount_paid'];
$amnt_paid_to_supplier=mysql_real_escape_string($_POST['amnt_paid_to_supplier']);
$curr_rate_now=mysql_real_escape_string($_POST['curr_rate_now']);

//$new_books_amount=$original_amnt_paid-$amnt_paid_to_supplier;



$sql= "update stock_payments set amnt_paid='$amnt_paid_to_supplier' where stock_payments_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

/*
$sqlsp="select 	* from supplier_transactions where order_code='$order_code' order by date_recorded desc limit 1";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultssp);
$transaction_id=$rowssp->transaction_id;


$sqlsp="select 	* from supplier_transactions where order_code='$order_code' order by date_recorded desc limit 1";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultssp);
$transaction_id=$rowssp->transaction_id;

$sqltrans="update supplier_transactions SET amount='-$amnt_paid_to_supplier' where transaction_id='$transaction_id'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltransw= "insert into cash_ledger values('','$transaction_desc','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW())";
$resultstransw=mysql_query($sqltransw) or die ("Error $sqltransw.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (PO No:$lpo_no)','$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Cash ( Against PO No:$lpo_no)','-$amnt_paid_to_supplier','','$amnt_paid_to_supplier','$currency','$curr_rate_now',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','Cash ( Against PO No:$lpo_no)','-$amnt_paid_to_supplier','$amnt_paid_to_supplier','','$currency','$curr_rate_now',NOW(),'')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Amount Paid to supplier')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());*/



//header ("Location:receive_stock.php");

?>
<script type="text/javascript">
alert('Record Saved Successfuly');
window.location = "receive_stock.php";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php								  


mysql_close($cnn);


?>


