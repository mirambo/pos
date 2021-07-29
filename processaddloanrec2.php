<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form

$l_name=mysql_real_escape_string($_POST['l_name']);
$l_address=mysql_real_escape_string($_POST['l_address']);
$l_phone=mysql_real_escape_string($_POST['l_phone']);
$l_email=mysql_real_escape_string($_POST['l_email']);
$l_town=mysql_real_escape_string($_POST['l_town']);
$l_amount=mysql_real_escape_string($_POST['l_amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$period_years=mysql_real_escape_string($_POST['period_years']);
$period_months=mysql_real_escape_string($_POST['period_months']);


$queryprof="select * from loan_received where lenders_name='$l_name' and lenders_address='$l_address' and lenders_phone='$l_phone' and lenders_email='$l_email' 
and lenders_town='$l_town' and loan_amount='$l_amount' and currency='$currency' and period_years='$period_years' and period_months='$period_months'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


if ($numrowscomp>0)

{

 header ("Location:add_loan.php? recordexist=1");

}

else 

{

$sql= "insert into loan_received values('', '$l_name', '$l_address', '$l_phone', '$l_email', '$l_town','$l_amount','$currency','$curr_rate','$period_years',
'$period_months',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Loan Received from $l_name into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:add_loan.php? addloanyyconfirm=1");



}

/*$queryprof="select * from  user_groups where group_name='$group_name'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
//$rowsprof=mysql_fetch_object($resultsprof);

$numrowscomp=mysql_num_rows($resultsprof);*/
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 //$emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;


//echo $u_pwrd;

//echo $u_cpwrd;

//echo $cus_fname;

//$realdob= dateconvert($dob, 1);
//$realdob = date('Y-m-d', strtotime($dob));
/*if ($numrowscomp>0)

{

header ("Location:add_user_groups.php? recordexist=1");

}

else 

{



$sql= "insert into user_groups values ('','$group_name','$group_desc','0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());






header ("Location:add_user_groups.php? addgroupconfirm=1");

}
*/


mysql_close($cnn);


?>


