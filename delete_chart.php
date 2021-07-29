<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['id'];



$sqlsp="select * FROM account_type where account_type_id='$id'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowsp=mysql_fetch_object($resultssp);
$account_type_name=$rowsp->account_type_name;




$sql= "delete from account_type where account_type_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Deleted chart of account $account_type_name from the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Record Deleted Successfuly');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php


mysql_close($cnn);


?>


