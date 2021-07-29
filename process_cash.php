<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_client_id=$_GET['prnt_client_id'];
$get_prnt_sales_id=$_GET['prnt_sales_id'];
$get_prnt_currency=$_GET['currency'];
$get_prnt_curr_rate=$_GET['curr_rate'];
$get_grndttl=$_GET['grndttl'];
$cash_rec=mysql_real_escape_string($_POST['cash_rec']);
$current_month=(Date("F Y"));

//$get_prnt_ship=$_GET['ship_id'];
//$get_prnt_payterms=$_GET['pay_terms'];

$_SESSION['get_client_id']=$get_prnt_client_id;
$_SESSION['get_sales_id']=$get_prnt_sales_id;
$_SESSION['currency']=$get_prnt_currency;

$sess_grndttl=$_SESSION['grndttl'];

$sess_com=$_SESSION['com'];// Sales Commsison amount session
$sess_sales_rep=$_SESSION['sales_rep']; // session for sales rep for the sake of commission calculation






// get latest order code for the sake of lpo details
$queryprof="select * from temp_cash_sales order by temp_cash_sales_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$latest_sales_code=$rowsprof->sales_code;

//Prevent redudancy of lpo postings
$queryred="select * from cash_sales_payments where sales_code ='$latest_sales_code'";
$resultsred=mysql_query($queryred) or die ("Error: $queryred.".mysql_error());

$numrowsred=mysql_num_rows($resultsred);

if ($numrowsred>0)

{


}

else 

{


$sqllpo= "insert into cash_sales_payments values('','','$sess_grndttl','$get_prnt_currency','$get_prnt_curr_rate','$sess_grndttl','$get_prnt_client_id','$latest_sales_code','$user_id','$sess_sales_rep',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());


}


// generate receipt number
$querylatelpo="select * from cash_sales_payments order by cash_sales_payment_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_cash_payment_id=$rowslatelpo->cash_sales_payment_id;

$year=date('Y');


	$tempnum=$latest_cash_payment_id;
	if($tempnum < 10)
            {
              $receipt_no= "BDCS000".$tempnum."/".$year;
			   //echo $newnum;
			   
			   session_start();
               $_SESSION['receipt_no']=$receipt_no;	   
			  
			  
            } else if($tempnum < 100) 
			{
             $receipt_no = "BDCS00".$tempnum."/".$year;
			  session_start();
               $_SESSION['receipt_no']=$receipt_no;	   
			 
			 //echo $newnum;
            } else 
			{ 
			$receipt_no= "BDCS".$tempnum."/".$year; 
			 session_start();
               $_SESSION['receipt_no']=$receipt_no;		   
			
			//echo $newnum;
			}
	
	








//$lpo_no="BD".$latest_lpo_id."/".$year;


// insert lpo number
$sqllpono="UPDATE cash_sales_payments set receipt_no='$receipt_no' where cash_sales_payment_id='$latest_cash_payment_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());


if ($sess_sales_rep=='x')

{
 
}

else

{
//record Commisions expected
// Prevent Redudancy in commisions table
$querycomred="select * from commisions_expected where invoice_no='$receipt_no' and user_id='$sess_sales_rep' and sales_code ='$latest_sales_code'";
$resultscomred=mysql_query($querycomred) or die ("Error: $querycomred.".mysql_error());

$numrowscomred=mysql_num_rows($resultscomred);

if ($numrowscomred>0)

{
// update commsion value incase of additional items after printing the invoice
$sqlupdate_com= "UPDATE commisions_expected SET tll_commision='$sess_com' where sales_code='$latest_sales_code'";
$resultsupdate_com= mysql_query($sqlupdate_com) or die ("Error $sqlupdate_com.".mysql_error());

$sqlupdate_com_pay= "UPDATE commision_payments SET amount_paid='$sess_com' where sales_code='$latest_sales_code'";
$resultsupdate_com_pay= mysql_query($sqlupdate_com_pay) or die ("Error : $sqlupdate_com_pay.".mysql_error());


}

else 

{

$sqlcashcomexp= "insert into commisions_expected values('','$receipt_no','$sess_com','$get_prnt_currency','$get_prnt_curr_rate','$latest_sales_code','$sess_sales_rep',NOW(),'1')";
$resultscashcomexp= mysql_query($sqlcashcomexp) or die ("Error $sqlcashcomexp.".mysql_error());


$sqlcashcompay= "insert into commision_payments values('','$latest_sales_code','$sess_sales_rep','$sess_com','$get_prnt_currency','$get_prnt_curr_rate',NOW(),'$current_month','1','')";
$resultscashcompay= mysql_query($sqlcashcompay) or die ("Error $sqlcashcompay.".mysql_error());

}




}

header ("Location:cash_receipt.php?cash_received=$cash_rec&receipt_no=$receipt_no&receipt_id=$latest_cash_payment_id&sales_code=$latest_sales_code&client_id=$get_prnt_client_id&curr_id=$get_prnt_currency");
//}

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


