<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$sales_id=$_GET['sales_id'];
$sales_item_id=$_GET['sales_item_id'];
$q=$_GET['q'];
$cash=$_GET['cash'];

  
$dr_transaction_code="drexp".$sales_item_id;
$dr_transaction_code_vat="drexpvt".$sales_item_id;

$sql= "delete from expenses where expenses_id='$sales_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sql2= "delete from chart_transactions where transaction_code='$dr_transaction_code'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$sql2= "delete from chart_transactions where transaction_code='$dr_transaction_code_vat'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted an expenses item')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());







?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php




mysql_close($cnn);


?>


