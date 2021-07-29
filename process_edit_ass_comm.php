<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['ass_comm_id'];
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$comm_perc=mysql_real_escape_string($_POST['comm_perc']);

echo $sales_rep;
echo $comm_perc;

$sql= "update client_discount set client_id='$sales_rep',comm_perc='$comm_perc' where client_discount_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited commision details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Item Updated Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php							  


mysql_close($cnn);


?>


