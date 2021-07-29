<?php 
//basic job_card details
$all_amnt_totals=0;
$sqlqt="SELECT * FROM sales where sales_id='$job_card_id'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;



$all_amnt_totals=0;
$sqlts="SELECT * from invoice_payments where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $amount=$rowsts->amount_received;
						  $task_cost=$rowsts->unit_cost*$quant;
						  $ttl_amnt_kshs=$amount*$curr_rate;
						  $all_amnt_totals=$all_amnt_totals+$ttl_amnt_kshs;
						  }
						  //echo $task_totals;
			
						  }
			  


			  

 
echo number_format($all_amnt_totals,2); 

//$grnd_inv_payment=$grnd_inv_payment+$all_amnt_totals;


?>