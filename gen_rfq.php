<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_supid=$_GET['prnt_supp_id'];
$get_prnt_rfqid=$_GET['prnt_rfq_id'];



// get latest order code for the sake of lpo details
$queryprof="select * from temp_rfq order by temp_rfq_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_rfq_code=$rowsprof->rfq_code;




//Prevent redudancy of lpo postings
$queryred="select * from all_rfq where rfq_code ='$latest_rfq_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{
$sqllpo= "insert into all_rfq values('','','$get_prnt_supid','$latest_rfq_code','$user_id',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}



// generate lpo number
$querylatelpo="select * from all_rfq order by all_rfq_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_all_rfq_id=$rowslatelpo->all_rfq_id;

$year=date('Y');


	$tempnum=$latest_all_rfq_id;
	if($tempnum < 10)
            {
              $rfq_no = "RFQ000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $rfq_no = "RFQ00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$rfq_no= "RFQ".$tempnum."/".$year; 
			
			//echo $newnum;
			}
	
	








//$lpo_no="BD".$latest_lpo_id."/".$year;


// insert lpo number
$sqllpono="UPDATE all_rfq set rfq_no='$rfq_no' where all_rfq_id='$latest_all_rfq_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());





header ("Location:rfq.php?all_rfq_id=$latest_all_rfq_id&rfq_code=$latest_rfq_code&supp_id=$get_prnt_supid&rfq_no=$rfq_no");



mysql_close($cnn);


?>


