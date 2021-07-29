<?php
#include connection
include('includes/session.php');
include('Connections/fundmaster.php');

$sale_type=$_GET['sale_type'];
$client_id=mysql_real_escape_string($_POST['client']); 
//$sales_rep=mysql_real_escape_string($_POST['sales_rep']);
$mop=mysql_real_escape_string($_POST['mop']);
$currency=mysql_real_escape_string($_POST['currency']);
$sale_date=mysql_real_escape_string($_POST['sale_date']);
$terms=mysql_real_escape_string($_POST['terms']);

$querycr="select curr_rate from currency where curr_id='$currency'";
$resultscr=mysql_query($querycr) or die ("Error: $querycr.".mysql_error());							  
$rowscr=mysql_fetch_object($resultscr);
$curr_rate=$rowscr->curr_rate;
//$curr_rate=mysql_real_escape_string($_POST['curr_rate']);

//echo $sales_rep;

$sql= "insert into sales_code values('','$client_id','$user_id','$mop','$terms','$currency','$curr_rate','','$sale_date',NOW(),'0','$sale_type','1')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryprof="select * from sales_code order by sales_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);

$received_order_code_id=$rowsprof->sales_code_id;

$year=date('Y');
$tempnum=$received_order_code_id;

if ($sale_type=='i')
{

if($tempnum < 10)
            {
              $invoice_no = "MGINV000".$tempnum."/".$year; 
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no = "MGINV00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$invoice_no="MGINV".$tempnum."/".$year; 
			

			}

}
elseif ($sale_type=='c')
{

if($tempnum < 10)
            {
              $invoice_no = "MGCSH000".$tempnum."/".$year; 
		 
			  
			  
            } else if($tempnum < 100) 
			{
             $invoice_no = "MGCSH00".$tempnum."/".$year;
		  
			 
	
            } else 
			{ 
			$invoice_no="MGCSH".$tempnum."/".$year; 
			

			}


}
			
$sqllpono="UPDATE sales_code set invoice_no='$invoice_no' where sales_code_id='$received_order_code_id'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());			



session_start();
$_SESSION['sales_code_id']=$received_order_code_id;
$_SESSION['sale_type']=$sale_type;



if ($sale_type=='i')
{
header ("Location:generate_invoice.php");
}
elseif ($sale_type=='c')
{
header ("Location:generate_cash_sales.php");
}

mysql_close($cnn);


?>


