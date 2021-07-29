<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$user_group_id=mysql_real_escape_string($_POST['user_group_id']);


foreach($_POST['module_id'] as $row=>$module_id)
{   
	$user_group_id=mysql_real_escape_string($_POST['user_group_id']);
    $module_id=mysql_real_escape_string($_POST['module_id'][$row]);
	
    
//  Check Redudancy


$sql3="DELETE from user_group_submodule where user_group_id='$user_group_id' and sub_module_id='$module_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

header ("Location:home.php?viewusergroupsm=viewusergroupsm&user_group_id=$user_group_id&delconfirm=1");
?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}








mysql_close($cnn);


?>


