<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$oldpass=md5(mysql_real_escape_string($_POST['oldpass']));
$newpass=md5(mysql_real_escape_string($_POST['newpass']));
$cnewpass=md5(mysql_real_escape_string($_POST['cnewpass']));



//$sql= "insert into user_group values ('','$user_group_name')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlspons="SELECT * FROM users where user_id='$user_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);

$oldpassdb=$rowssponsor->password;
if ($oldpassdb!=$oldpass) 
{

//header ("Location:home.php?newpass=newpass&wrongoldpass=1");

?>
<script type="text/javascript">
alert('Wrong Old Password');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php



}
elseif ($newpass!=$cnewpass)
{
//header ("Location:home.php?newpass=newpass&passmismatch=1");

?>
<script type="text/javascript">
alert('Sorry!!! Your password do not match');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 
{

$sql= "update users set password='$newpass' where user_id='$user_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Changed his/her own password')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



?>
<script type="text/javascript">
alert('Sorry!!! Your password changed successfuly');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php


}









mysql_close($cnn);


?>


