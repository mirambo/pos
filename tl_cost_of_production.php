Cost Of Production:
 <?php
if ($date_from=='' && $date_to=='')
  
 {
  
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  * from cost_of_production_ledger,currency where cost_of_production_ledger.currency_code=currency.curr_id and closing_status='0' order by cost_of_production_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select  * from cost_of_production_ledger,currency where cost_of_production_ledger.currency_code=currency.curr_id AND cost_of_production_ledger.date_recorded BETWEEN 
'$date_from' AND '$date_to' order by cost_of_production_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
	$amount=$rows->amount;
	$curr_rate=$rows->curr_rate;
	$amount_in_kshs=$curr_rate*$amount;
	$grss_cop=$grss_cop+$amount_in_kshs; 
							  
							  
							  
							 
							 }
							 
							
							 
							 }
							 
							 echo '<span style="float:right; margin-right:100px;">'.number_format($grss_cop,2).'</span>'; 
							 