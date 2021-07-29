<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$module_id=mysql_real_escape_string($_POST['module_id']);


foreach($_POST['sub_module_id'] as $row=>$sub_module_id)
{   
	$module_id=mysql_real_escape_string($_POST['module_id']);
    $sub_module_id=mysql_real_escape_string($_POST['sub_module_id'][$row]);
	



$sql3="DELETE from modules_submodules where module_id='$module_id' and sub_module_id='$sub_module_id'";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:home.php?viewassignsubmodule=viewassignsubmodule&delconfirm=1");
?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}
mysql_close($cnn);


?>


