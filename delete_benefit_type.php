<?php
#include connection
include('Connections/fundmaster.php');

$id=$_GET['benefit_type_id'];


$sql= "delete from benefit_logs where benefit_log_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted benefit type details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

//header ("Location:view_benefit_type.php? deleteconfirm=1");


?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php	



mysql_close($cnn);


?>


