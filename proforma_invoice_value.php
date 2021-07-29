<?php 
//basic job_card details
$sqlqt="SELECT * FROM proforma where sales_id='$job_card_id'";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());
$rowsqt=mysql_fetch_object($resultsqt);
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$discount_perc=$rowsqt->discount; 
$vat=$rowsqt->vat; 


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$sqlts="SELECT * from proforma_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from proforma_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  

$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



$task_totals=$sub_ttl1+$vat_value;

echo "<span style='float:right; font-weight:bold;'>"; 
 
echo number_format($task_totals,2); 

echo "</span></br>";


$job_card_ttl=$job_card_ttl+$task_totals;
?>