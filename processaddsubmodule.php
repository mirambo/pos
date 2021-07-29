<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$module_id=mysql_real_escape_string($_POST['module_id']);
$submodule_name=mysql_real_escape_string($_POST['submodule_name']);
$sort_order=mysql_real_escape_string($_POST['sort_order']);
$link=mysql_real_escape_string($_POST['link']);
$desc=mysql_real_escape_string($_POST['desc']);

$queryprof="select * from sub_module where sub_module_name='$submodule_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

//header ("Location:home.php?submodules=submodules&recordexist=1");

?>
<script type="text/javascript">
alert('Sorry!! Record Exist');
//window.location = "begin_order.php";
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>
<?php

}

else 
{

$sql="insert into sub_module values ('','$module_id','$submodule_name','$sort_order','$link','$desc','')";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());


//header ("Location:home.php?submodules=submodules&addgroupconfirm=1");

?>
<script type="text/javascript">
alert('Record Saved successfuly');
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


