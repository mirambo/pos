<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
//$loginas=mysql_real_escape_string($_POST['loginas']);
$username=mysql_real_escape_string($_POST['username']);
$password=mysql_real_escape_string($_POST['password']);


$sql= "select * from users where username='$username' and password ='$password'";
$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());

$rowsuser=mysql_fetch_array($results);
//echo 
$group_id=$rowsuser['group_id'];
//$status=$rowsuser['group_id'];
if ($username=='' && $password=='')
{
header ("Location:index.php?nousernameandpass=1");

}
elseif ($username=='')
{
header ("Location:index.php?nousername=1");

}

elseif ($password=='')
{
header ("Location:index.php?nopassword=1&username=$username");

}



elseif($group_id==1)

{

session_start();
$_SESSION['user_id']= $rowsuser['user_id'];
$_SESSION['group_id']=1;


header ("Location:view_user.php?loginfirst=1");
}

elseif ($group_id==2)

{

session_start();
$_SESSION['user_id']= $rowsuser['user_id'];
$_SESSION['group_id']=2;


header ("Location:admin/view_customers.php?loginfirst=1");
}

elseif ($group_id==3)
{

session_start();
$_SESSION['user_id']= $rowsuser['user_id'];
$_SESSION['group_id']=3;
 header ("Location:sales/view_invoices.php?loginfirst=1");

}

elseif ($group_id==5)
{
session_start();
$_SESSION['user_id']= $rowsuser['user_id'];
$_SESSION['group_id']=4;
 header ("Location:normal/view_invoices.php?loginfirst=1");
}


else 

{

header ("Location:index.php?wrongpass=1");

}

mysql_close($cnn);


?>




