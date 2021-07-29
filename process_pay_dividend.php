<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$desc=mysql_real_escape_string($_POST['desc']);
$div_amount=mysql_real_escape_string($_POST['div_amount']);
$amount=mysql_real_escape_string($_POST['amount']);
$mop=mysql_real_escape_string($_POST['mop']);
$shares_id=$_GET['shares_id'];
$financial_year_id=$_GET['financial_year_id'];
$dividend_id=$_GET['dividend_id'];

$plough_back=$div_amount-$amount;


$queryprof="select * from withdrawn_dividends where description='$desc' and dividend='$amount' and mop='$mop' and shares_id='$shares_id'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

if ($numrowscomp>0)

{

 header ("Location:pay_dividend.php? recordexist=1");

}

else 

{


$sql= "insert into withdrawn_dividends values('','$shares_id','$dividend_id','$financial_year_id','$user_id','$desc','$amount','$mop',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

if ($plough_back!=0)
 {
$sqladd= "insert into ploughed_back_dividend values('','$shares_id','$dividend_id','$financial_year_id','$user_id','$plough_back','Partial plough back due to partial withdrawal of $share_holder_name dividends',NOW())";
$resultsadd= mysql_query($sqladd) or die ("Error $sqladd.".mysql_error());

 }

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded withdrawn dividend $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());

header ("Location: view_dividends.php?successpay=1");

}


mysql_close($cnn);


?>


