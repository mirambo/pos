<?php
#include connection
include('Connections/fundmaster.php');
include('includes/session.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$desc=mysql_real_escape_string($_POST['desc']);
$amount=mysql_real_escape_string($_POST['amount']);



$queryprof="select * from petty_cash_income where description='$desc' and amount='$amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);
 
 //$f_namecomp=$rowsprof->f_name;
 //$l_namecomp=$rowsprof->l_name;
 $emailcomp=$rowsprof->email;
 //$usernamecomp=$rowsprof->username;

if ($numrowscomp>0)

{

 header ("Location:add_petty_cash_income.php? recordexist=1");

}

else 

{


$sql= "insert into petty_cash_income values('','$desc','$amount',NOW())";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$queryl="select * from petty_cash_income order by petty_cash_income_id  desc limit 1";
$resultsl=mysql_query($queryl) or die ("Error: $queryl.".mysql_error());
								  
$rowsl=mysql_fetch_object($resultsl);

$transaction_id=$rowsl->petty_cash_income_id ;




$sql= "insert into petty_cash_ledger values('','$desc','','$amount',NOW(),'petinc$transaction_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sql= "insert into cash_ledger values('','Petty Cash Establishment $desc','-$amount','','$amount','6','1',NOW(),'petinc$transaction_id')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$sqlss="INSERT INTO misc_expenses_ledger VALUES('','Petty Cash Establishment $desc','$amount','$amount', '', '6','1',NOW(),'petinc$transaction_id')";
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

/*$sqlgenled= "insert into general_ledger values('','Petty Cash Expenses $desc','-$amount','','$amount','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Petty Cash $desc','$amount','$amount','','6','1',NOW(),'')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Recorded an petty cash income $desc worth $amount into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());


header ("Location:add_petty_cash_income.php? addconfirm=1");



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


