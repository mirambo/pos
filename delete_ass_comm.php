<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$updt_uname=mysql_real_escape_string($_POST['updt_uname']);
//$updt_pword=mysql_real_escape_string($_POST['updt_pword']);
$id=$_GET['commision_id'];


$sql= "delete from client_discount where client_discount_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



?>
<script type="text/javascript">
alert('Item Deleted Successfuly');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>

<?php



mysql_close($cnn);


?>


