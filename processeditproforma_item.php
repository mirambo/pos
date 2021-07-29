<?php
require_once('includes/session.php'); 
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sales_id=$_GET['sales_id'];
$q=$_GET['q'];
$cash=$_GET['cash'];
$sales_item_id=$_GET['sales_item_id'];
$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
$vend_price=mysql_real_escape_string($_POST['vend_price']);

  if ($q==1)
  {
	  
	  $sql1= "update quote_item set item_id='$prod', item_cost='$vend_price' where sales_item_id='$sales_item_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Quotation details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
	  
	  
  }
  else
  {


$sql1= "update proforma_item set item_id='$prod',item_quantity='$qnty',item_cost='$vend_price' where sales_item_id='$sales_item_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Updates Proforma Invoice Items details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
  }


?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
//window.location = "generate_invoice.php?sales_id=<?php echo $order_code; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

mysql_close($cnn);



?>


