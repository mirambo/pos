<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_client_id=$_GET['prnt_client_id'];
$get_prnt_quote_code=$_GET['prnt_quote_code'];
$get_prnt_currency=$_GET['currency'];
$get_prnt_curr_rate=$_GET['curr_rate'];
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$get_payment_terms=$_GET['payment_terms'];
$get_delivery_terms=$_GET['delivery_terms'];


$_SESSION['get_client_id']=$get_prnt_client_id;
$_SESSION['get_sales_code']=$get_prnt_quote_code;
$_SESSION['currency']=$get_prnt_currency;
$_SESSION['curr_rate']=$get_prnt_curr_rate;
$_SESSION['payment_terms']=$get_payment_terms;
$_SESSION['curr_rate']=$get_delivery_terms;

$sess_grndttl=$_SESSION['grndttl'];



// get latest order code for the sake of lpo details
$queryprof="select * from temp_quote order by temp_quote_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_quote_code=$rowsprof->quote_code;

//Prevent redudancy of lpo postings
$queryred="select * from quotations where quote_code='$latest_quote_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{
$sqllpo= "insert into quotations values('','','','$get_prnt_currency','$get_prnt_curr_rate','$get_prnt_client_id','$get_prnt_quote_code','$user_id','$sess_sales_rep',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}

$sqlgrndttl= "update quotations set quotation_ttl='$sess_grndttl' where quote_code='$latest_quote_code'";
$resultsgrndttl= mysql_query($sqlgrndttl) or die ("Error $sqlgrndttl.".mysql_error());



// generate lpo number
$querylatelpo="select * from quotations order by quotation_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_quotation_id=$rowslatelpo->quotation_id;


$latest_date_generated=$rowslatelpo->date_generated;

$year=date('Y');


	$tempnum=$latest_quotation_id;
	if($tempnum < 10)
            {
              $quotation_no = "BDQTN000".$tempnum."/".$year;
			   //echo $newnum;
			   
			   session_start();
               $_SESSION['quotation_no']=$quotation_no;	   
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no = "BDQTN00".$tempnum."/".$year;
			  session_start();
              $_SESSION['quotation_no']=$quotation_no;	   
			 
			 //echo $newnum;
            } else 
			{ 
			$invoice_no= "BDQTN".$tempnum."/".$year; 
			 session_start();
               $_SESSION['quotation_no']=$quotation_no;	  
			
			//echo $newnum;
			}
	

$sqllpono="UPDATE quotations set quotation_no='$quotation_no' where quotation_id='$latest_quotation_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());
//converted amount in kshs.





header ("Location:quotation.php?quotation_id=$latest_quotation_id&quote_code=$latest_quote_code&client_id=$get_prnt_client_id&currency=$get_prnt_currency&quotation_no=$quotation_no&payment_termsx=$get_payment_terms&delivery_termsx=$get_delivery_terms");



mysql_close($cnn);


?>


