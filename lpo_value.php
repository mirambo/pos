<?php 
//basic job_card details
$sqlqt="SELECT * FROM order_code_get where order_code_id='$order_code'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$freight_charges=$rowsqt->freight_charge; 
//$vat=$rowsqt->vat; 


// Items value
$task_totals=0;
$consumable=0;
$lpo_ttl=0;
$ttl_vat=0;
$sqlts="SELECT * from purchase_order where order_code='$order_code'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $task_cost=$rowsts->vendor_prc;
						  $qnty=$rowsts->quantity;
						  $vat_value=$rowsts->order_vat_value;
						  $ttl_vat=$ttl_vat+$vat_value;
						  $task_ttl_kshs=$task_cost*$qnty;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  

 
$lpo_ttl=$task_totals+$ttl_vat;

 
 
echo number_format($lpo_ttl,2); 



//$job_card_ttl=$job_card_ttl+$grand_ttl;
?>