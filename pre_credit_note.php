<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from formsale
$sales_return_code_id=$_GET['sales_return_code_id'];
$sales_code_id=$_GET['sales_code_id'];




$queryprof="select * from  sales_returns order by sales_returns_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$client_id=$rowsprof->client_id;
$sales_code=$rowsprof->sales_code;
$sales_rep=$rowsprof->sales_rep;

//calculate total sales return

$querytsr="select * from  sales_returns where sales_return_code_id='$sales_return_code_id'";
$resultstsr=mysql_query($querytsr) or die ("Error: $querytsr.".mysql_error());
//$rowstsr=mysql_fetch_object($resultstsr);

if (mysql_num_rows($resultstsr) > 0)
{
	while ($rowstsr=mysql_fetch_object($resultstsr))
		{
             $sales_return_quantity=$rowstsr->sales_return_quantity;
			 $selling_price=$rowstsr->selling_price;

			 $ttl_sales_return=$sales_return_quantity*$selling_price;
			 
			 //echo $ttl_sales_return;
			 
			 $grnd_ttl_sales_return=$grnd_ttl_sales_return+$ttl_sales_return;
		}

		$grnd_ttl_sales_return;
}


$sqltrans= "insert into client_transactions values('','$client_id','$sales_code','$transaction_desc','-$grnd_ttl_sales_return',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());


//Prevent redudancy



/*$queryred1="select * from  client_transactions where transaction ='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$transaction_desc='Credit Note No:'.$cred_no;


}*/

}





header ("Location:credit_note.php?client_id=$client_id&salesreturn_code=$sales_return_code&credit_no=$cred_no&sales_code=$sales_code&amount_paid=$amount_paid&orig_quant=$orig_quant");

//}

//$results=mysql_query($sql) or die ("Error: $sql.".mysql_error());
//echo $results;
//$count=mysql_num_rows($results);
//echo $count;
/*if (==1)
{
session_start();
$_SESSION['admin']= $adminusern;
/*
session_register("myusername");
session_register("mypassword");*/
/*header("Location:membersarea.php");
}
else
{*/
//header ("Location:adduser.php? createuserconfirm=1");
//echo "<p align='center'><font color='#FF0000' size='-1'>Wrong Username and Password.</font></p>";


mysql_close($cnn);


?>


