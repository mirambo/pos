<?php
#include connection
include('Connections/fundmaster.php');
require_once('includes/session.php'); 
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$cur_password=md5(mysql_real_escape_string($_POST['cur_password']));
$password=md5(mysql_real_escape_string($_POST['password']));
$con_password=md5(mysql_real_escape_string($_POST['con_password']));
//$u_email=mysql_real_escape_string($_POST['u_email']);
//$u_group=mysql_real_escape_string($_POST['u_group']);
//$u_name=mysql_real_escape_string($_POST['u_name']);
//$dob=mysql_real_escape_string($_POST['dob']);
//$email_addr=mysql_real_escape_string($_POST['email_addr']);
//$ppwrd=mysql_real_escape_string($_POST['ppwrd']);
//$updt_bevdesc=mysql_real_escape_string($_POST['updt_bevdesc']);
//$updt_prodprice=mysql_real_escape_string($_POST['updt_prodprice']);
//$id=$_GET['employee_id'];

//echo $id;

$sqlpass="select users.password from users where users.user_id='$user_id'";
$resultspass= mysql_query($sqlpass) or die ("Error $sqlpass.".mysql_error());
$rowspass=mysql_fetch_object($resultspass); 

//$numrows=mysql_num_rows($resultspass);

$oldpass=$rowspass->password;

/*if ($oldpass=$cur_password)

{

header ("Location:change_pass.php? disallow_current_pass=1");

}*/

if ($oldpass!=$cur_password)

{

?>
<script type="text/javascript">
alert('Sorry!!! wrong old password');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}




elseif ($password!=$con_password)

{

//header ("Location:change_pass.php? mismatchconfirmpass=1");
?>
<script type="text/javascript">
alert('Sorry!!! Your password changed successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else

$sql= "update users set password='$password' where user_id='$user_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Changed his/her own password')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:change_pass.php? passupdatedconfirm=1");

?>
<script type="text/javascript">
alert('Sorry!!! Your password changed successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php



//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


