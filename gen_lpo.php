<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_supid=$_GET['prnt_supp_id'];
$get_prnt_orderid=$_GET['prnt_order_id'];
$currency=$_GET['currency'];
$curr_rate=$_GET['curr_rate'];
$get_prnt_ship=$_GET['ship_id'];
$get_prnt_payterms=$_GET['pay_terms'];
$get_comments=$_GET['comments'];
$freight_charge=$_GET['freight_charge'];

//update currency rate





// get latest order code for the sake of lpo details
$queryprof="select * from temp_purchase_order order by temp_purchase_order_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_order_code=$rowsprof->order_code;
$latest_comments=$rowsprof->comments;
//$currency=$rowsprof->currency_code;



//Prevent redudancy of lpo postings
$queryred="select * from lpo where order_code ='$latest_order_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{



$sqllpo= "insert into lpo values('','$latest_comments','','','','$freight_charge','$currency','$curr_rate','$get_prnt_supid','$latest_order_code','$user_id',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}



// generate lpo number
$querylatelpo="select * from lpo order by lpo_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_lpo_id=$rowslatelpo->lpo_id;

$year=date('Y');


	$tempnum=$latest_lpo_id;
	if($tempnum < 10)
            {
              $lpo_no = "BD000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "BD00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "BD".$tempnum."/".$year; 
			
			//echo $newnum;
			}
	
	








//$lpo_no="BD".$latest_lpo_id."/".$year;


// insert lpo number
$sqllpono="UPDATE lpo set lpo_no='$lpo_no' where lpo_id='$latest_lpo_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Generated a purchase order $lpo_no ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());





header ("Location:lpo.php?lpo_id=$latest_lpo_id&order_code=$latest_order_code&supp_id=$get_prnt_supid&currency=$currency&shipp_id=$get_prnt_ship&pay_terms=$get_prnt_payterms&lpo_no=$lpo_no&comments=$get_comments&freight_charge=$freight_charge");



mysql_close($cnn);


?>


