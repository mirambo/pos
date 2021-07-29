<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);
$currency=mysql_real_escape_string($_POST['currency']);
$mop=mysql_real_escape_string($_POST['mop']);


$queryprof="select * from custom_clearance where description='$desc'and mop='$mop' and curr_id='$currency' and amount='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

if ($numrowscomp>0)

{

 header ("Location:custom_clearance.php? recordexist=1");

}

else 

{

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;

$sql= "insert into custom_clearance values('','$user_id','$desc','$currency','$curr_rate','$amount','$mop',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlss="INSERT INTO custom_clearance_ledger VALUES('','$desc','$amount','$amount', '', '$currency','$curr_rate',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$desc','$amount','$amount','','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Custom clearance Paid on $desc','-$amount','','$amount','$currency','$curr_rate',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into cash_ledger values('','Cash Custom clearance Paid on $desc','-$amount','','$amount','$currency','$curr_rate',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded Custom clearance expense $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:custom_clearance.php? addexpconfirm=1");



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


