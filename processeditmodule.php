<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['module_id'];

$module_name=mysql_real_escape_string($_POST['module_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$link=mysql_real_escape_string($_POST['link']);
$desc=mysql_real_escape_string($_POST['desc']);


$sql= "UPDATE modules SET module_name='$module_name',sort_order='$sort_order',link='$link',description='$desc' where module_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated User Group Details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:home.php?editmodules=editmodules&module_id=$id");

?>
<script type="text/javascript">
alert('Record Updated succefully');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php




mysql_close($cnn);


?>


