<?php 
//basic job_card details
$sqlqt="SELECT * FROM credit_note where credit_note_id='$job_card_id'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$discount_perc=$rowsqt->discount_perc; 
$vat=$rowsqt->vat; 





// Task value
$task_totals=0;
$consumable=0;
$sqlts="SELECT * from credit_note_task where credit_note_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $quant=$rowsts->quantity;
						  $task_cost=$rowsts->unit_cost*$quant;
						  $task_ttl_kshs=$task_cost;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  


 
 
echo number_format($task_totals,2); 



$job_card_ttl=$job_card_ttl+$task_totals;
?>