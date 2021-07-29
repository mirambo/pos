<?php 
$region_ttl=0;
//basic job_card details
$sqlqt="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id and customer.region_id='$region_id' 
and sales.canceled_status='0' order by sales_id desc";
$resultsqt= mysql_query($sqlqt) or die ("Error $sqlqt.".mysql_error());

if (mysql_num_rows($resultsqt)>0)
{
	while ($rowsqt=mysql_fetch_object($resultsqt))
	{
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;

// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

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

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals;

//echo "</span></br>";
	}
}
echo number_format($region_ttl,2); 
//echo $region_ttl;
$job_card_ttl=$job_card_ttl+$region_ttl;
?>