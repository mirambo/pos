<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$get_prnt_client_id=$_GET['prnt_client_id'];
$get_prnt_sales_id=$_GET['prnt_sales_id'];
$get_prnt_currency=$_GET['currency'];
//$get_prnt_ship=$_GET['ship_id'];
//$get_prnt_payterms=$_GET['pay_terms'];

$_SESSION['get_client_id']=$get_prnt_client_id;
$_SESSION['get_sales_id']=$get_prnt_sales_id;
$_SESSION['currency']=$get_prnt_currency;



// get latest order code for the sake of lpo details
$queryprof="select * from temp_sales order by sales_id desc limit 1";
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
$sqllpo= "insert into invoices values('','','$get_prnt_client_id','$latest_sales_code','$user_id',NOW(),'1')";
$resultslpo= mysql_query($sqllpo) or die ("Error $sqllpo.".mysql_error());

}



// generate lpo number
$querylatelpo="select * from invoices order by invoice_id desc limit 1";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);

$latest_invoice_id=$rowslatelpo->invoice_id;

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

//echo $lpo_no;



header ("Location:csv_invoice.php?invoice_id=$latest_invoice_id&sales_code=$latest_sales_code&client_id=$get_prnt_client_id&currency=$get_prnt_currency");
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


