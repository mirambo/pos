<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];
$item_id=$_GET['item_id'];



$sqlsp="select * FROM items where item_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);
$item_name=$rowsp->item_name;

$dr_transaction_code='itm_op_dr'.$item_id;
$cr_transaction_code='itm_op_cr'.$item_id;


$sql="delete from items_opening_balances where opening_balance_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql23="delete from chart_transactions where transaction_code='$dr_transaction_code'";
$results23= mysql_query($sql23) or die ("Error $sql23.".mysql_error());


$sql2="delete FROM chart_transactions where transaction_code='$cr_transaction_code'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());

$sql23= "update items SET 
status2='0' where item_id='$item_id'";
$results23=mysql_query($sql23) or die ("Error $sql23.".mysql_error()); 


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted opening balance for item $item_name from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php


mysql_close($cnn);


?>


