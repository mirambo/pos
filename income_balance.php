<?php
//echo $rows->station_name;
/* $query_val = mysql_query("SELECT SUM(amount) as hand_val FROM ledger_transactions WHERE account_id ='$account_id'");
$row_val = mysql_fetch_array($query_val);
	
echo number_format($row_val['hand_val'],2); */

//$sub_cat = $_GET['parent_cat1'];
   
include ('filter_loop.php');



 while($row2 = mysql_fetch_object($resultsdc)) 
	{
	
	$orig_amount=$row2->amount;
	$curr_rate=$row2->curr_rate;
	
	$ttl_orig_amnt=$orig_amount*$curr_rate;
	
	$grnd_ttl_orig_amnt=$grnd_ttl_orig_amnt+$ttl_orig_amnt;
   // echo '<strong><font color="#ff0000">Total Balance (SSP)</font> : '.number_format($row2['cust_ttl'],2).'</strong>';
    }


echo number_format($grnd_ttl_orig_amnt,2);

$income_bal=$income_bal+$grnd_ttl_orig_amnt;

 ?>