<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=$_GET['invoice_id'];
//$invoice_amnt=$_GET['invoice_amnt'];

$reasons=mysql_real_escape_string($_POST['reason']);
$sales_date=date('Y-m-d');
$date_from=$sales_date;

$sqllpdet="select * FROM sales WHERE sales_id='$invoice_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);

$invoice_no=$rowslpdet->invoice_no;
$sales_id=$rowslpdet->sales_id;
$shop_id=$rowslpdet->shop_id;
$customer_id=$rowslpdet->customer_id;
$currency=$rowslpdet->currency;
$curr_rate=$rowslpdet->curr_rate;
$discount=$rowslpdet->discount;
$vat=$rowslpdet->vat;
$sales_date=date('Y-m-d');

$lpo_no1=$invoice_no;


$sqlrec="SELECT * FROM customer WHERE customer_id='$customer_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$customer_name=$rowsrec->customer_name;

$sql= "insert into cancelled_invoices values('','$invoice_id','$user_id','$shop_id','$reasons',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancelsale="UPDATE sales set canceled_status='1' where sales_id='$sales_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());


$transaction_descinv="Cancelation Of Invoice $invoice_no Reason ($reasons)";

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'$transaction_descinv')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
							  

//header ("Location:home.php?view_biweekly=view_biweekly&cancelconfirm=1&invoice_no=$sales_id");
?>
<script type="text/javascript">
alert('Invoice No : <?php echo $invoice_no; ?> Cancel successfuly');
window.location = "generate_invoice.php?sales_id=<?php echo $invoice_id  ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


