<?php

include ('filter_loop.php');

 while($row2 = mysql_fetch_object($resultsdc)) 
	{
	
	$orig_amount=$row2->amount;
	$curr_rate=$row2->curr_rate;
	
	$ttl_orig_amnt=$orig_amount*$curr_rate;
	
	$grnd_ttl_orig_amnt=$grnd_ttl_orig_amnt+$ttl_orig_amnt;
   // echo '<strong><font color="#ff0000">Total Balance (SSP)</font> : '.number_format($row2['cust_ttl'],2).'</strong>';
    }


number_format($grnd_ttl_orig_amnt,2);

$cos_bal=$cos_bal+$grnd_ttl_orig_amnt;

 ?>