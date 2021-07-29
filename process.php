<?php
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$loginas=mysql_real_escape_string($_POST['loginas']);
 $u_name=mysql_real_escape_string($_POST['username']);
 $u_pwrd=md5(mysql_real_escape_string($_POST['password']));


$sql= "select * from users where username = '$u_name' and password = '$u_pwrd' and suspend='0'";
$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());

$rowsuser=mysql_fetch_array($results);

 $numrows=mysql_num_rows($results);
//echo 
$user_group_idxx=$rowsuser['user_group_id'];
$area_idxx=$rowsuser['area_id'];

$sqljon="SELECT * FROM nrc_area WHERE area_id='$area_idxx'";
$resultsjon=mysql_query($sqljon) or die ("Error: $sqljon.".mysql_error());
$rowsjon=mysql_fetch_array($resultsjon);



//$status=$rowsuser['group_id'];

if ($numrows>0)

{

session_start();
 $_SESSION['user_id']= $rowsuser['user_id'];
//$_SESSION['user_id']= $rowsuser['user_id'];
$_SESSION['incharge']= $rowsuser['incharge'];
//$_SESSION['area_id']= $rowsjon['area_id'];
//$_SESSION['country_id']= $rowsjon['country_id'];
 $_SESSION['user_group_id']=$rowsuser['user_group_id'];
$_SESSION['allow_add']=$rowsuser['allow_add'];
$_SESSION['allow_view']=$rowsuser['allow_view'];
$_SESSION['allow_edit']=$rowsuser['allow_edit'];
$_SESSION['allow_delete']=$rowsuser['allow_delete'];

if ($rowsuser['user_group_id']==1)
{
header ("Location:home.php?loginfirst=1&monitor=monitor");
}
else
{
header ("Location:home.php?loginfirst=1&monitor=monitor");

}




}
else 

{

header ("Location:index.php?wrongpass=1");

}
	

?>




