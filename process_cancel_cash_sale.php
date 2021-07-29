<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=$_GET['invoice_id'];
$sales_date=date('Y-m-d');
//$invoice_amnt=$_GET['invoice_amnt'];

$reasons=mysql_real_escape_string($_POST['reason']);

$sqllpdet="select * FROM sales WHERE sales_id='$invoice_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rowslpdet=mysql_fetch_object($resultslpdet);

$invoice_no=$rowslpdet->invoice_no;
$sales_id=$rowslpdet->sales_id;
$customer_id=$rowslpdet->customer_id;
$shop_id=$rowslpdet->shop_id;
$currency=$rowslpdet->currency;
$curr_rate=$rowslpdet->curr_rate;
$discount=$rowslpdet->discount;
$vat=$rowslpdet->vat;
$date_from=date('Y-m-d');

$lpo_no1=$invoice_no;




$sql= "insert into cancelled_cash_sales values('','$invoice_id','$user_id','$incharge','$reasons',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancelsale="UPDATE sales set canceled_status='1' where sales_id='$sales_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());


$sqlcm= "delete from commision_earned where sales_id='$invoice_id'";
$resultscm= mysql_query($sqlcm) or die ("Error $sqlcm.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Canceled a cash sales receipt No $invoice_id')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
							  

?>
<script type="text/javascript">
alert('Cash Sales No : <?php echo $invoice_no; ?> Canceled successfuly');
window.location = "generate_cash_sales.php?sales_id=<?php echo $invoice_id  ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


