<?php
include ('includes/session.php');
include('Connections/fundmaster.php');

$booking_id=$_GET['booking_id'];
$requisition_id=$_GET['order_code'];
$requisition_item_id=$_GET['purchase_order_id'];


////////////////////////prevent issuee requsition from adjustments
$sqlrec3="select COUNT(*) as ttl_req FROM requisition_item WHERE requisition_id='$order_code'";
$resultsrec3= mysql_query($sqlrec3) or die ("Error $sqlrec3.".mysql_error());	
$rowsrec3=mysql_fetch_object($resultsrec3);

$ttl_req=$rowsrec3->ttl_req;



$sqlrec4="select COUNT(*) as ttl_issue FROM issued_items WHERE requisition_id='$order_code'";
$resultsrec4= mysql_query($sqlrec4) or die ("Error $sqlrec4.".mysql_error());	
$rowsrec4=mysql_fetch_object($resultsrec4);

$ttl_issue=$rowsrec4->ttl_issue;

if ($ttl_reqyyyyyyyyyy!=$ttl_issueyyyyyyyyyyyyy)
{
?>

<script type="text/javascript">
alert('SORRY!! THIS REQUISITION HAS BEEN ISSUED IT CANNOT BE ADJUSTED');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php

}
else
	
	{




$sql= "delete from requisition_item where requisition_item_id='$requisition_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql2= "delete from issued_items where requisition_item_id='$requisition_item_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Deleted a requisition system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error()); 

?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?

//header ("Location:home.php?viewhrforms=viewhrforms&requisition_id=$requisition_id&deletepartconfirm=1");





	}
mysql_close($cnn);


?>


