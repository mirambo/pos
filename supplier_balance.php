<?php 
$task_totals=0;
$consumable=0;
$sqlts="SELECT * from supplier_transactions where supplier_id='$supplier_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $task_cost=$rowsts->amount;
						  $qnty=$rowsts->curr_rate;
						  $task_ttl_kshs=$task_cost*$qnty;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  

 
$lpo_ttl=$task_totals+$freight_charges;

 
echo number_format($lpo_ttl,2); 



$job_card_ttl=$job_card_ttl+$lpo_ttl;
?>