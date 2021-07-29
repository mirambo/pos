<?php
#include connection
 include ('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from form
$client_id=$_GET['client_id'];
$bunch_id=$_GET['bunch_id'];
$billsheet_amount=$_GET['billsheet_amount'];


$queryprof="select * from billsheets where client_id='$client_id' AND bunch_id='$bunch_id' AND billsheet_ttl='$billsheet_amount'";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);


$numrowscomp=mysql_num_rows($resultsprof);

if ($numrowscomp>0)

{

$billsheet_no=$rowsprof->billsheet_no;

header ("Location:billsheet.php?client_id=$client_id&billsheet_no=$billsheet_no");

}

else 
{

$sql= "insert billsheets values ('','','$billsheet_amount','$client_id','$bunch_id','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

// generate billsheet number
$querylatelpo="select * from billsheets order by billsheet_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_billsheet_id=$rowslatelpo->billsheet_id;
$latest_date_generated=$rowslatelpo->date_generated;

$year=date('Y');


	$tempnum=$latest_billsheet_id;
	if($tempnum < 10)
            {
              $billsheet_no = "SPTBN000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
			  
            } else if($tempnum < 100) 
			{
             $billsheet_no = "SPTBN00".$tempnum."/".$year;
			  
			 
			 //echo $newnum;
            } else 
			{ 
			$billsheet_no= "SPTBN".$tempnum."/".$year; 
			  
			
			//echo $newnum;
			}
			
$sqllpono="UPDATE billsheets set billsheet_no='$billsheet_no' where billsheet_id='$latest_billsheet_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());



header ("Location:billsheet.php?client_id=$client_id&billsheet_no=$billsheet_no");

}



mysql_close($cnn);


?>


