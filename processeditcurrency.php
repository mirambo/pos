<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$curr_name=mysql_real_escape_string($_POST['curr_name']);
$exrate=mysql_real_escape_string($_POST['exrate']);


$id=$_GET['curr_id'];



$sql= "update currency set curr_name='$curr_name',exchange_rate='$exrate' where curr_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited user currency $curr_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:edit_currency.php?updatecurrencyconfirm=1&curr_id=$id");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);


?>


