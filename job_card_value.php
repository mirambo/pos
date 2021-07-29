<?php 
//basic job_card details
$sqlqt="SELECT * FROM job_cards where job_card_id='$job_card_id'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$discount_perc=$rowsqt->discount_perc; 
$vat=$rowsqt->vat; 


// Task value
$task_totals=0;
$consumable=0;
$sqlts="SELECT * from job_card_task where job_card_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $task_cost=$rowsts->task_cost;
						  $task_ttl_kshs=$task_cost*$curr_rate;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  
//parts cost
$ttl_item_cost=0;
$item_amount=0;
$sqlpt="SELECT * from released_item,items where released_item.item_id=items.item_id AND released_item.job_card_id='$job_card_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
if (mysql_num_rows($resultspt) > 0)
						  {
						  while ($rowspt=mysql_fetch_object($resultspt))
						  {
						  $item_quantity=$rowspt->released_quantity;
						  $item_cost=$rowspt->curr_sp;
						  $item_amount=$item_quantity*$item_cost*$curr_rate;
						  $ttl_item_cost=$ttl_item_cost+$item_amount;
						  
						  }
						  
						  //echo $ttl_item_cost;
						  }

						  
//othre job_card values
//subtotal 1
$consumable=$task_totals*0.15;
$sub_total1=$ttl_item_cost+$task_totals+$consumable;


if ($vat==1)
 {
$vat_value=0.16*$sub_total1;
 }
 else
 {
$vat_value=0;
 }						  

 
 $sub_total2=$sub_total1+$vat_value;
 
 $discount_val=$discount_perc*$sub_total2/100;
 
 $grand_ttl=$sub_total2-$discount_val;

 
 
echo number_format($grand_ttl,2); 



$job_card_ttl=$job_card_ttl+$grand_ttl;
?>