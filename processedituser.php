<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$f_name=mysql_real_escape_string($_POST['f_name']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
//$area_id=mysql_real_escape_string($_POST['area_id']);
$sales_rep_code=mysql_real_escape_string($_POST['sales_rep_code']); 
$get_incharge=mysql_real_escape_string($_POST['shop_id']);
$user_group_idx=mysql_real_escape_string($_POST['user_group_id']); 
$username=mysql_real_escape_string($_POST['username']);
$password=md5(mysql_real_escape_string($_POST['password']));
$cpassword=mysql_real_escape_string($_POST['cpassword']);
$allow_add=mysql_real_escape_string($_POST['allow_add']);
$allow_view=mysql_real_escape_string($_POST['allow_view']);
$allow_edit=mysql_real_escape_string($_POST['allow_edit']);
$allow_delete=mysql_real_escape_string($_POST['allow_delete']);



$id=$_GET['get_user_id'];

$sql= "update users set user_group_id='$user_group_idx',f_name='$f_name',phone='$phone',email='$email', 
incharge='$get_incharge' ,username='$username',allow_add='$allow_add',allow_view='$allow_view',allow_edit='$allow_edit',
allow_delete='$allow_delete',user_code='$sales_rep_code' where user_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


//header ("Location:home.php?edituser=edituser&get_user_id=$id&edituserconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script> 

<?php




mysql_close($cnn);


?>


