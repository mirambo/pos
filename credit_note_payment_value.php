<?php 
//basic job_card details
   $query1pd="select SUM(amount_received) as ttl_amnt from credit_note_payments WHERE sales_code_id='$job_card_id'"; 
	   $results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
	   $rowspd=mysql_fetch_object($results1pd);

	   $invoice_value=$rowspd->ttl_amnt;
			  


 
 
echo number_format($invoice_value,2); 



$inv_ttl=$inv_ttl+$invoice_value;
?>