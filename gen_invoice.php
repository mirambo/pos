<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_client_id=$_GET['prnt_client_id'];
$get_prnt_sales_id=$_GET['prnt_sales_id'];
$get_prnt_currency=$_GET['currency'];
$get_prnt_curr_rate=$_GET['curr_rate'];
$cash_rec=mysql_real_escape_string($_POST['cash_rec']);
$mop=mysql_real_escape_string($_POST['mop']);
$sales_rep=mysql_real_escape_string($_POST['sales_rep']);


$_SESSION['get_client_id']=$get_prnt_client_id;
$_SESSION['get_sales_id']=$get_prnt_sales_id;
$_SESSION['currency']=$get_prnt_currency;
$_SESSION['curr_rate']=$get_prnt_curr_rate;
$current_month=(Date("F Y"));

$sess_grndttl=$_SESSION['grndttl'];

$sess_com=$_SESSION['com'];// Sales Commsison amount session
$sess_sales_rep=$_SESSION['sales_rep']; // session for sales rep for the sake of commission calculation

// Check redudancy when posting invoicepayments
$queryprofpay="select * from  invoice_payments where sales_code='$get_prnt_sales_id' and  client_id ='$get_prnt_client_id' and amount_received='$cash_rec'";
$resultsprofpay=mysql_query($queryprofpay) or die ("Error: $queryprofpay.".mysql_error());

$numrowsprofpay=mysql_num_rows($resultsprofpay);
if ($numrowsprofpay>0)

{

//header ("Location:receive_invoice_payment.php? recordexist=1");

}

else
{

//$sql= "insert into invoice_payments values ('','$get_prnt_sales_id','$get_prnt_client_id','$cash_rec','$get_prnt_currency','$get_prnt_curr_rate','$mop',NOW(),'')";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}


// Calcculations of commisions based on amount received from the client
   
// get %commision for the sales rep

$sqlcomm_perc="select * from commisions where user_id='$sales_rep'";
$resultscomm_perc= mysql_query($sqlcomm_perc) or die ("Error $sqlcomm_perc.".mysql_error());
$rowscomm_perc=mysql_fetch_object($resultscomm_perc);

$comm_perc=$rowscomm_perc->comm_perc;
  
$comm_paid=$comm_perc/100*$cash_rec;


$queryprofcom="select * from  commision_payments where sales_code='$get_prnt_sales_id' and  sales_rep ='$sales_rep' and amount_paid='$comm_paid'";
$resultsprofcom=mysql_query($queryprofcom) or die ("Error: $queryprofcom.".mysql_error());
$numrowsprofcom=mysql_num_rows($resultsprofcom);

if ($numrowsprofcom>0)

{


}

else

{

$sqlreccom= "insert into commision_payments values ('','$get_prnt_sales_id','$sales_rep','$comm_paid','$get_prnt_currency','$get_prnt_curr_rate',NOW(),'$current_month','','')";
$resultsreccom= mysql_query($sqlreccom) or die ("Error $sqlreccom.".mysql_error());

}






// get latest order code for the sake of lpo details
$queryprof="select * from temp_sales order by temp_sales_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_sales_code=$rowsprof->sales_code;

//Prevent redudancy of lpo postings
$queryred="select * from invoices where sales_code ='$latest_sales_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{
$sqllpo= "insert into invoices values('','','','','$get_prnt_currency','$get_prnt_curr_rate','$get_prnt_client_id','$latest_sales_code','$user_id','$sess_sales_rep',NOW(),'1','1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());






}

$sqlgrndttl= "update invoices set invoice_ttl='$sess_grndttl',inv_bal='$sess_grndttl' where sales_code='$latest_sales_code'";
$resultsgrndttl= mysql_query($sqlgrndttl) or die ("Error $sqlgrndttl.".mysql_error());



// generate lpo number
$querylatelpo="select * from invoices order by invoice_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_id=$rowslatelpo->invoice_id;
$latest_date_generated=$rowslatelpo->date_generated;

$year=date('Y');


	$tempnum=$latest_invoice_id;
	if($tempnum < 10)
            {
              $invoice_no = "BDINV000".$tempnum."/".$year;
			   //echo $newnum;
			   
			   session_start();
               $_SESSION['invoice_no']=$invoice_no;	   
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no = "BDINV00".$tempnum."/".$year;
			  session_start();
               $_SESSION['invoice_no']=$invoice_no;	   
			 
			 //echo $newnum;
            } else 
			{ 
			$invoice_no= "BDINV".$tempnum."/".$year; 
			 session_start();
               $_SESSION['invoice_no']=$invoice_no;	   
			
			//echo $newnum;
			}
	
	








//$lpo_no="BD".$latest_lpo_id."/".$year;


// insert lpo number
$sqllpono="UPDATE invoices set invoice_no='$invoice_no' where invoice_id='$latest_invoice_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());
//converted amount in kshs.

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Generated a invoice $invoice_no ')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());



/*
//calculate the transaction balance
$querytransbal="select * from client_transactions order by transaction_id desc limit 1";
$resultstransbal=mysql_query($querytransbal) or die ("Error: $querytransbal.".mysql_error());
$rowstransbal=mysql_fetch_object($resultstransbal);
$latest_trans_id=$rowstransbal->transaction_id;
$latest_amount=$rowstransbal->balance;
$trans_bal=$tranaction_amount+$latest_amount;
//insert transaction balance
$sqlbal="UPDATE client_transactions set balance='$latest_amount' where transaction_id='$latest_trans_id'";
$resultsbal= mysql_query($sqlbal) or die ("Error $sqlbal.".mysql_error());

*/




if ($sess_sales_rep=='x')

{
 
}

else

{
//record Commisions expected
// Prevent Redudancy in commisions table
$querycomred="select * from commisions_expected where invoice_no='$invoice_no' and user_id='$sess_sales_rep' and sales_code ='$latest_sales_code'";
$resultscomred=mysql_query($querycomred) or die ("Error: $querycomred.".mysql_error());

$numrowscomred=mysql_num_rows($resultscomred);

if ($numrowscomred>0)

{
// update commsion value incase of additional items after printing the invoice
$sqlupdate_com= "UPDATE commisions_expected SET tll_commision='$sess_com' where sales_code='$latest_sales_code'";
$resultsupdate_com= mysql_query($sqlupdate_com) or die ("Error $sqlupdate_com.".mysql_error());


}

else 

{
$sqlcom= "insert into commisions_expected values('','$invoice_no','$sess_com','$get_prnt_currency','$get_prnt_curr_rate','$latest_sales_code','$sess_sales_rep',NOW(),'1')";
$resultscom= mysql_query($sqlcom) or die ("Error $sqlcom.".mysql_error());

}

}

header ("Location:invoice.php?invoice_id=$latest_invoice_id&sales_code=$latest_sales_code&client_id=$get_prnt_client_id&currency=$get_prnt_currency&cash_rec=$cash_rec&mop=$mop&invoice_no=$invoice_no");



mysql_close($cnn);


?>


