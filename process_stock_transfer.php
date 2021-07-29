<?php
#include connection
include ('includes/session.php');
include('Connections/fundmaster.php');

$date_from=mysql_real_escape_string($_POST['date_from']); 
$source=mysql_real_escape_string($_POST['source']); 
$destination=mysql_real_escape_string($_POST['destination']); 
$receive=mysql_real_escape_string($_POST['receive']);
$release=mysql_real_escape_string($_POST['release']);
/* $mop=1;
$currency=mysql_real_escape_string($_POST['currency']);
 */
/* $sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_rate=$rowcurr->curr_rate; */

$comments=mysql_real_escape_string($_POST['comments']);
//$freight_charge=mysql_real_escape_string($_POST['freight_charge']);

$sql= "insert into stock_transfer values('','$date_from','$source','$destination','$release','$receive',NOW(),'$user_id','$incharge','0','$comments')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



$queryprof="select * from stock_transfer order by stock_transfer_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
								  
$rowsprof=mysql_fetch_object($resultsprof);


$order_code=$rowsprof->stock_transfer_id;
$tempnum=$order_code;
$year=date('Y');

if($tempnum < 10)
            {
              $lpo_no = "STR000".$tempnum."/".$year;
			   //echo $newnum;
			  
			  
            } else if($tempnum < 100) 
			{
             $lpo_no = "STR00".$tempnum."/".$year;
			 
			 //echo $newnum;
            } else 
			{ 
			$lpo_no= "STR".$tempnum."/".$year; 
			
			//echo $newnum;
			}


/* $sqllpono="UPDATE stock_transfer set lpo_no='$lpo_no' where order_code_id='$order_code'";
$resultslpono= mysql_query($sqllpono) or die ("Error $sqllpono.".mysql_error()); */


$query1="select * from suppliers where supplier_id='$sup'";
$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
$rows1=mysql_fetch_object($results1);
$supp_name=$rows1->supplier_name;

$transaction_descinv="Freight Charges for Goods Supplied By:".$supp_name;
//if shipping agencies is the supplier themseleves
if ($ship_agency==5)
{

}
else
{
//shipper transaction
/*$sqltrans= "insert into shippers_transactions values('','$sup','shp$order_code','$transaction_descinv','$freight_charge','$currency','$curr_rate',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_descinv','$freight_charge','','$freight_charge','$currency','$curr_rate',NOW(),'shp$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());*/
}

//Items Details

$prod=mysql_real_escape_string($_POST['prod']);
$qnty=mysql_real_escape_string($_POST['qnty']);
//$vend_price=mysql_real_escape_string($_POST['vend_price']);

foreach($_POST['prod'] as $row=>$Prod)
{

$prod=mysql_real_escape_string($_POST['prod'][$row]);
$qnty=mysql_real_escape_string($_POST['qnty'][$row]);
//$vend_price=mysql_real_escape_string($_POST['vend_price'][$row]);

$sql= "insert into stock_transfer_items values('','$order_code','$prod','$qnty','$date_from','0',NOW(),'$user_id','$incharge')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


header ("Location:begin_stock_transfer.php?order_code=$order_code");




mysql_close($cnn);


?>


