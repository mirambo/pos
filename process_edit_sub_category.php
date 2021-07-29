<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$id=$_GET['sub_cat_id'];
$to=date( 'Y-m-d H:i:s', time());
$cat_id=mysql_real_escape_string($_POST['cat_id']);
$sub_cat_name=mysql_real_escape_string($_POST['sub_cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);




$sqlupdt= "UPDATE items_sub_category SET 
cat_id ='$cat_id',

sub_cat_name ='$sub_cat_name'

WHERE sub_cat_id='$id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated items sub category details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Item Sub-Categpry Updated Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "home.php?viewhrforms=viewhrforms&sub_cat_id=<?php echo $id; ?>";
</script> 

<?php



mysql_close($cnn);

?>


