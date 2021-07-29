<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$id=$_GET['sub_module_id'];


$submodule_name=mysql_real_escape_string($_POST['submodule_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$link=mysql_real_escape_string($_POST['link']);
$desc=mysql_real_escape_string($_POST['desc']);







$sql= "UPDATE sub_module SET sub_module_name='$submodule_name',sort_order='$sort_order',sublink='$link',description='$desc' where sub_module_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trails values('','$user_id',NOW(),'Updated Sub Module Details')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


//header ("Location:home.php?editsubmodules=editsubmodules&sub_module_id=$id&editconfirm=1");

?>
<script type="text/javascript">
alert('Record Updated successfuly');
//window.location = "view_received_stock.php";
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


