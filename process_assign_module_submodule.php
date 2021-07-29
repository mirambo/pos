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
	
    
//  Check Redudancy

$queryprof="select * from modules_submodules where module_id='$module_id' AND sub_module_id='$sub_module_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

header ("Location:home.php?assignsubmodule=assignsubmodule&recordexist=1");

}
else
{
$sql3="INSERT INTO modules_submodules VALUES('','$module_id','$sub_module_id','0')" or die(mysql_error());
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());

//header ("Location:home.php?assignsubmodule=assignsubmodule&addconfirm=1");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}
}








mysql_close($cnn);


?>


