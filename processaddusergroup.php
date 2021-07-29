<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$user_group=mysql_real_escape_string($_POST['user_group']);
$desc=mysql_real_escape_string($_POST['desc']);
$allow_add=mysql_real_escape_string($_POST['allow_add']);
$allow_edit=mysql_real_escape_string($_POST['allow_edit']);
$allow_delete=mysql_real_escape_string($_POST['allow_delete']);

$queryprof="select * from user_group where user_group_name='$user_group'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

//header ("Location:home.php?newusergroup=newusergroup&recordexist=1");

?>
<script type="text/javascript">
alert('Sorry!!! Your record exist');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 
{

$sql= "insert into user_group values ('','$user_group','$desc')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


?>
<script type="text/javascript">
alert('Record Saved succefully');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

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


