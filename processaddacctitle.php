<?php
#include connection
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$acc_cat=mysql_real_escape_string($_POST['acc_cat']);
$acc_title=mysql_real_escape_string($_POST['acc_title']);
$acc_title_code1=mysql_real_escape_string($_POST['acc_title_code']);


$queryprof="select * from  accounts_titles where accounts_category_id='$acc_cat' and accounts_title_name='$acc_title' and accounts_title_code='$acc_title_code'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);
$numrowscomp=mysql_num_rows($resultsprof);

$queryprof2="select * from  accounts_titles where accounts_title_code='$acc_title_code'";
$resultsprof2=mysql_query($queryprof2) or die ("Error: $queryprof2.".mysql_error());
$numrowscomp2=mysql_num_rows($resultsprof2);

$queryprof3="select * from  accounts_titles where accounts_title_name='$acc_title'";
$resultsprof3=mysql_query($queryprof3) or die ("Error: $queryprof3.".mysql_error());
$numrowscomp3=mysql_num_rows($resultsprof3);



$querycode="select * from  accounts_category where accounts_category_id='$acc_cat'";
$resultscode=mysql_query($querycode) or die ("Error: $querycode.".mysql_error());
$rowscode=mysql_fetch_object($resultscode);
//$numrowscomp=mysql_num_rows($resultsprof);
$acc_code=$rowscode->accounts_category_code;
$acc_title_code=$acc_code.'-'.$acc_title_code1;
								  


 
 
if ($numrowscomp>0)

{

header ("Location:home.php?addaccounts=addaccounts&recordexist=1");

}
elseif ($numrowscomp2>0)
{
header ("Location:home.php?addaccounts=addaccounts&coderecordexist=1");

}

elseif ($numrowscomp3>0)
{
header ("Location:home.php?addaccounts=addaccounts&namerecordexist=1");

}

else 

{

$sql= "insert into accounts_titles values ('','$acc_cat','$acc_title','$acc_title_code',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


header ("Location:home.php?addaccounts=addaccounts&addconfirm=1");

}

mysql_close($cnn);


?>


