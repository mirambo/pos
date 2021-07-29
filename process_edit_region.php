<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$customer_id=$_GET['region_id'];
$cat_code=mysql_real_escape_string($_POST['cat_code']);
$cat_name=mysql_real_escape_string($_POST['cat_name']);
$cat_desc=mysql_real_escape_string($_POST['cat_desc']);



$sqlupdt2= "UPDATE customer_region SET 

region_name='$cat_name',
region_code='$cat_code',
region_desc='$cat_desc'


WHERE region_id='$customer_id'";
$resultsupdt2= mysql_query($sqlupdt2) or die ("Error $sqlupdt2.".mysql_error());


$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Update customer region $cat_name details into the system ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

?>
<script type="text/javascript">
alert('Record Updated Successfuly');
window.location = "home.php?settlementreport=settlementreport&sub_module_id=<?php echo $sub_module_id; ?>";
</script>
<?php


mysql_close($cnn);




?>


