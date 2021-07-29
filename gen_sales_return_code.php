<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$sales_code_id=$_GET['sales_code_id'];


$sql= "insert into sales_returns_code values('','$sales_code_id','',NOW(),'$user_id','')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$queryprof="select * from sales_returns_code order by sales_return_code_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->sales_return_code_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "BDCRN000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "BDCRN00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "BDCRN".$tempnum."/".$year; 
			
			//echo $newnum;
			}


$sqllpono="UPDATE sales_returns_code set credit_note_no='$lpo_no' where sales_return_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error());




header ("Location:sales_return.php?sales_code_id=$sales_code_id&sales_return_code_id=$order_code");




mysql_close($cnn);


?>


