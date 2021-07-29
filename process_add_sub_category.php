<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$to=date( 'Y-m-d H:i:s', time());
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$sub_cat_name=mysql_real_escape_string($_POST['sub_cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);


$sqlprof= "SELECT * from items_sub_category where cat_id='$cat_id' and sub_cat_name='$sub_cat_name'";
$resultsprof= mysql_query($sqlprof) or die ("Error $sqlpo.".mysql_error());
$rowsprof=mysql_num_rows($resultsprof);

if ($rowsprof>0)
{
?>
<script type="text/javascript">
alert('SORRY!!! record exist');
//window.location = "home.php?initiateproject=initiateproject&sub_module_id=<?php echo $sub_module_id; ?>";
window.location = "home.php?assignsubprojectarea=assignsubprojectarea";

</script> 

<?php
}
else
{
$sqllpo= "insert into items_sub_category VALUES('','$cat_id','$sub_cat_name','$cat_desc')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item sub-category $sub_cat_name into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:home.php?addsubproject=addsubproject&addconfirm=1");


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Created an item $item_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


?>
<script type="text/javascript">
alert('Item Sub-Categpry Created Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "home.php?assignsubprojectarea=assignsubprojectarea";
</script> 

<?php

}

mysql_close($cnn);

?>


