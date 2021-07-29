<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$invoice_id=$_GET['invoice_id'];
//$invoice_amnt=$_GET['invoice_amnt'];

$reasons=mysql_real_escape_string($_POST['reason']);
$sales_date=date('Y-m-d', time());


$sql= "insert into cancelled_quotations values('','$invoice_id','','$reasons','$sales_date','$user_id','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$querycancelsale="UPDATE quote set canceled_status='1' where sales_id='$invoice_id'";
$resultscancelsale=mysql_query($querycancelsale) or die ("Error: $querycancelsale.".mysql_error());


?>
<script type="text/javascript">
alert('Quotation Cancel successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php





mysql_close($cnn);


?>


