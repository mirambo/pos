<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$new=$_GET['new'];
$acc_cat_name=mysql_real_escape_string($_POST['acc_cat_name']);
$acc_cat_code=mysql_real_escape_string($_POST['acc_cat_code']);


$queryprof="select * from  accounts_category where accounts_category_name='$acc_cat_name' and accounts_category_code='$acc_cat_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
$numrowscomp=mysql_num_rows($resultsprof);

$queryprof2="select * from  accounts_category where accounts_category_code='$acc_cat_code'";
$resultsprof2=mysql_query($queryprof2) or die ("Error: $queryprof2.".mysql_error());
$numrowscomp2=mysql_num_rows($resultsprof2);

$queryprof3="select * from  accounts_category where accounts_category_name='$acc_cat_name'";
$resultsprof3=mysql_query($queryprof3) or die ("Error: $queryprof3.".mysql_error());
$numrowscomp3=mysql_num_rows($resultsprof3);
								  


 
 
if ($numrowscomp>0)

{

header ("Location:home.php?chart=chart&recordexist=1");

}
elseif ($numrowscomp2>0)
{
header ("Location:home.php?chart=chart&coderecordexist=1");

}

elseif ($numrowscomp3>0)
{
header ("Location:home.php?chart=chart&namerecordexist=1");

}

else 

{

$sql= "insert into accounts_category values ('','$acc_cat_name','$acc_cat_code',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($new==1)
{
header ("Location:home.php?addaccounts=addaccounts");
}
else
{
header ("Location:home.php?chart=chart&addconfirm=1");
}

}

mysql_close($cnn);


?>


