<?php
include('includes/session.php');
include('Connections/fundmaster.php');

$sqlpd= "UPDATE users SET islogged_in='0' where user_id='$user_id'";
$resultspd= mysql_query($sqlpd) or die ("Error $sqlpd.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Signed out of the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

session_start();
session_destroy();


?>
<script type="text/javascript">
alert('Logged Out Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "index.php";
</script> 

<?php



?>


