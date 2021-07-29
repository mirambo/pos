<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$idu=$_GET['get_user_id'];
$newpass=md5(mysql_real_escape_string($_POST['newpass']));
$cnewpass=md5(mysql_real_escape_string($_POST['cnewpass']));



//$sql= "insert into user_group values ('','$user_group_name')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($newpass!=$cnewpass)
{
header ("Location:home.php?resetpass2=resetpass2&get_user_id=$idu&passmismatch=1");
?>
<script type="text/javascript">
alert('Sorry!!! Passwords dont match');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php
}

else 
{

$sql= "update users set password='$newpass' where user_id='$idu'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

//header ("Location:home.php?resetpass2=resetpass2&newpassconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}






//header ("Location:home.php?newusergroup=newusergroup&addgroupconfirm=1");

//}

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


