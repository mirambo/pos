<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['user_group_id'];

$user_group=mysql_real_escape_string($_POST['user_group']);
$desc=mysql_real_escape_string($_POST['desc']);
 
 

$sqlupdt= "UPDATE user_group SET user_group_name='$user_group', description='$desc' where user_group_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());



//header ("Location:home.php?editgroup=editgroup&user_group_id=$id&editsuccess=1");
?>
<script type="text/javascript">
alert('Record Updated succefully');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

mysql_close($cnn);

?>


