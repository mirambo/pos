<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$order_code=$_GET['order_code'];
$view=$_GET['view'];
$cs=$_GET['cs'];
$show_approve=$_GET['show_approve'];

$date_from=mysql_real_escape_string($_POST['date_from']); 
$lpo_type=mysql_real_escape_string($_POST['lpo_type']); 
$sup=mysql_real_escape_string($_POST['sup']);
$farmer_id=mysql_real_escape_string($_POST['farmer_id']);
$ship_agency=mysql_real_escape_string($_POST['ship_agency']);
$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

$comments=mysql_real_escape_string($_POST['comments']);
$freight_charge=mysql_real_escape_string($_POST['freight_charge']);
$payment_schedule=mysql_real_escape_string($_POST['payment_schedule']);

$ref_no=mysql_real_escape_string($_POST['ref_no']);
$expiry_date=mysql_real_escape_string($_POST['date_to']);


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;



$sql="update order_code_get set 
 	date_generated='$date_from', 
 	supplier_id='$sup', 
 	farmer_id='$farmer_id', 
 	shipper_id='$shipper_id', 
  	mop_id='$mop', 
 	currency='$currency', 
 	curr_rate='$curr_rate', 
	ref_no='$ref_no',
    lpo_expiry_date='$expiry_date',
 	payment_schedule='$payment_schedule', 
 	comments='$comments'

where order_code_id='$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if ($ship_agency=='5')
{

}
else
{

$sql= "update shippers_transactions set 
 	shipper_id='$freight_charge', 
	amount='$freight_charge',
  	currency='$currency', 
 	curr_rate='$curr_rate' 	

where order_code='shp$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "update accounts_payables_ledger set 
 	amount='$freight_charge',
	credit='$freight_charge',
  	currency_code='$currency', 
 	curr_rate='$curr_rate' 	

where order_code='shp$order_code'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}




$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updated an invoice trasaction')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



if ($view==1)
{
//header ("Location:view_lpo_trans.php?order_code=$order_code&show_approve=$show_approve");


?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "view_lpo_trans.php?order_code=<?php echo $order_code; ?>&show_approve=1";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php






}
else
{
?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "begin_order.php?order_code=<?php echo $order_code; ?>";
//window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}



								  


mysql_close($cnn);


?>


