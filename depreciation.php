Depreciation :
	
  
  <?php 
  include('Connections/fundmaster.php'); 
 $grnd_depr=0;
  if ($date_from=='' && $date_to=='')
  
  {  
 
$sqlinc="select * from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id and fixed_assets.status='0'";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
}

else

{

$sqlinc="select * from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id and fixed_assets.status='0' AND fixed_assets.date_recorded 
BETWEEN '$date_from' AND '$date_to' order by fixed_assets.fixed_asset_id desc";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());

}




if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { ?>
							  
    
    
	
	<?php 
	
$value=$rowsinc->value;
$curr_rate=$rowsinc->curr_rate;
$value_kshs=$value*$curr_rate;
$dep_value=$rowsinc->dep_value;
$quantity=$rowsinc->quantity;
$dep_value_kshs=$dep_value*$curr_rate*$quantity;
$curr_date=date('Y-m-d');
$date_purchased=$rowsinc->depreciation_date;

 $curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 $ttl_dep=$dep_value_kshs*$period_years_final;
 $grnd_depr=$grnd_depr+$ttl_dep;
 }
 
 echo '<span style="float:right; margin-right:100px;">('.number_format($grnd_depr,2).')</span>';
 
 }
 
 //echo number_format($curr_value=$value_kshs-$ttl_dep,2);
	
//end of filter


	
	?>



  

	
  
  

	
	
	