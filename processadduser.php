<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$f_name=mysql_real_escape_string($_POST['f_name']);
$phone=mysql_real_escape_string($_POST['phone']);
$email=mysql_real_escape_string($_POST['email']);
$get_incharge=mysql_real_escape_string($_POST['shop_id']);
$user_group_idx=mysql_real_escape_string($_POST['user_group_id']); 
$sales_rep_code=mysql_real_escape_string($_POST['sales_rep_code']); 
$username=mysql_real_escape_string($_POST['username']);
$password=md5(mysql_real_escape_string($_POST['password']));
$cpassword=mysql_real_escape_string($_POST['cpassword']);
$allow_add=mysql_real_escape_string($_POST['allow_add']);
$allow_view=mysql_real_escape_string($_POST['allow_view']);
$allow_edit=mysql_real_escape_string($_POST['allow_edit']);
$allow_delete=mysql_real_escape_string($_POST['allow_delete']);


//echo implode(',',$area_id2); 



$queryprof="select * from users where username='$username'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$numrowscomp=mysql_num_rows($resultsprof);
if ($numrowscomp>0)
{
//header ("Location:home.php?users=users&recordexist=1");
?>
<script type="text/javascript">
alert('SORRY!! User exist');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "home.php?users=users";
</script> 

<?php
}
else
{

$sql= "insert into users values ('','$f_name','$phone','$email','$user_group_idx','$username','$password',NOW(),'$sales_rep_code','$allow_add','$allow_view',
'$allow_edit','$allow_delete','','$get_incharge','$sales_rep_code')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



//header ("Location:home.php?users=users&adduserconfirm=1");
?>
<script type="text/javascript">
alert('User Created Successfuly');
//window.location = "home.php?balancesheet=balancesheet&sub_module_id=<?php echo $sub_module_id;?>";
window.location = "home.php?users=users";
</script> 

<?php

}

mysql_close($cnn);


?>


