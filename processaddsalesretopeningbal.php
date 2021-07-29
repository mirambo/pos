<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$amount=mysql_real_escape_string($_POST['amount']);
$client=mysql_real_escape_string($_POST['client']);
$transaction="Opening Balance";
$transaction2="Sales Return Opening Balance";




$queryprof="select * from  sales_return_ledger where transactions='$transaction'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
if ($numrowscomp>0)

{

header ("Location:add_sales_opening_balance.php? recordexist=1");

}

else 
{



$sql= "insert into sales_return_ledger values ('','$transaction','$amount','$amount','','6','1',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqltrans= "insert into client_transactions values('','$client','0','$transaction2','-$amount',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


$sql2= "insert into credit_notes values ('','','$amount','','','','','','',NOW(),'0')";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());



header ("Location:add_sales_return_opening_balance.php? addconfirm=1");

}




mysql_close($cnn);


?>


