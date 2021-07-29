<?php
#include connection
require_once('includes/session.php');
include('Connections/fundmaster.php');
#authenticate member in to LAPF, and first, check if its admin
//username and password sent from formsale

$stock_return_code=$_GET['stock_return_code'];
$amount_paid=$_GET['amount_paid'];
$orig_quant=$_GET['orig_quant'];

$queryprof="select * from  temp_stock_returns order by temp_stock_returns_id desc limit 1";
$resultsprof=mysql_query($queryprof) or die ("Error: $queryprof.".mysql_error());
$rowsprof=mysql_fetch_object($resultsprof);

$supplier_id=$rowsprof->supplier_id;
$order_code=$rowsprof->order_code;
$currency=$rowsprof->currency;
$curr_rate=$rowsprof->curr_rate;

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
//$curr_rate=$rowcurr->curr_rate;

//calculate total stock return

$querytsr="select * from  temp_stock_returns";
$resultstsr=mysql_query($querytsr) or die ("Error: $querytsr.".mysql_error());
//$rowstsr=mysql_fetch_object($resultstsr);

if (mysql_num_rows($resultstsr) > 0)
{
	while ($rowstsr=mysql_fetch_object($resultstsr))
		{
             $stock_return_quantity=$rowstsr->stock_return_quantity;
			 $vendor_price=$rowstsr->vendor_price;

			 $ttl_stock_returns=$stock_return_quantity*$vendor_price;
			 
			 //echo $ttl_sales_return;
			 
			 $grnd_ttl_stock_return=$grnd_ttl_stock_return+$ttl_stock_returns;
		}

		$grnd_ttl_stock_return;
}


//Prevent redudancy

$queryprofred="select * from debit_notes where ttl_stock_return='$grnd_ttl_stock_return' and currency='$currency' and 
supplier_id='$supplier_id' and order_code='$order_code' and stockreturn_code='$stock_return_code'";

/*$queryprofred="select * from debit_notes where ttl_stock_return='$grnd_ttl_stock_return' and currency='$currency' and 
supplier_id='$supplier_id' and order_code='$order_code' and stockreturn_code='$stock_return_code' and user_id='$user_id'"; */

$resultsprofred=mysql_query($queryprofred) or die ("Error: $queryprofred.".mysql_error());
								  
$rowsprofred=mysql_fetch_object($resultsprofred);

$numrowscompred=mysql_num_rows($resultsprofred);

if ($numrowscompred>0)

{

$querynotex="select debit_note_no from  debit_notes order by debit_note_id desc limit 1";
$resultsnotex=mysql_query($querynotex) or die ("Error: $querynotex.".mysql_error());
$rowsnotex=mysql_fetch_object($resultsnotex);
$debit_no=$rowsnotex->debit_note_no;
}

else
{


$sql= "insert into debit_notes values ('','','$grnd_ttl_stock_return','','$currency','$curr_rate','$supplier_id','$order_code','$stock_return_code','$user_id',NOW(),'0')";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


//Generate Credit note number

$querynote="select * from  debit_notes order by debit_note_id desc limit 1";
$resultsnote=mysql_query($querynote) or die ("Error: $querynote.".mysql_error());
$rowsnote=mysql_fetch_object($resultsnote);

$lat_debit_note_id=$rowsnote->debit_note_id;

echo $lat_debit_note_id;

$year=date('Y');


	$tempnum=$lat_debit_note_id;
	if($tempnum < 10)
            {
              $debit_no = "BDDN000".$tempnum."/".$year;
			   //echo $newnum;
			   
			   //session_start();
               //$_SESSION['invoice_no']=$invoice_no;	   
			  
			  
            } else if($tempnum < 100) 
			{
              $debit_no = "BDDN00".$tempnum."/".$year;
			  //session_start();
               //$_SESSION['invoice_no']=$invoice_no;	   
			 
			 //echo $newnum;
            } else 
			{ 
			 $debit_no= "BDDN".$tempnum."/".$year; 
			 //session_start();
               //$_SESSION['invoice_no']=$invoice_no;	   
			
			//echo $newnum;
			}
			
$sqlcredno="UPDATE debit_notes set debit_note_no='$debit_no' where debit_note_id ='$lat_debit_note_id'";
$resultscredno= mysql_query($sqlcredno) or die ("Error $sqlcredno.".mysql_error());

}





header ("Location:debit_note.php?supplier_id=$supplier_id&stockreturn_code=$stock_return_code&debit_no=$debit_no&currency=$currency&curr_rate=$curr_rate&amount_paid=$amount_paid");


mysql_close($cnn);


?>


