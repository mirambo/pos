<?php
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$sup_name=mysql_real_escape_string($_POST['sup_name']);
$sup_code=mysql_real_escape_string($_POST['sup_code']);
$cont_person=mysql_real_escape_string($_POST['cont_person']);
$country=mysql_real_escape_string($_POST['country']);
$address=mysql_real_escape_string($_POST['address']);
$phone=mysql_real_escape_string($_POST['phone']);
$town=mysql_real_escape_string($_POST['town']);
$email=mysql_real_escape_string($_POST['email']);


$id=$_GET['supplier_id'];



$sql= "update suppliers set supplier_name='$sup_name', cont_person='$cont_person',country='$country',postal='$address',town='$town',phone='$phone',
email='$email',sup_code='$sup_code' where supplier_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'edited supplier details for $sup_name')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



//header ("Location:edit_supplier.php?supplier_id=$id&updateconfirm=1");
?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?php

mysql_close($cnn);


?>