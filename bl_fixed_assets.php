<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="7"><strong>Fixed Assets</strong></td>
	
    
</tr>

<?php 
  include('Connections/fundmaster.php'); 
  
if ($date_from=='' && $date_to=='')
  
  {

$sqlinc="select * from fixed_assets,currency where fixed_assets.currency=currency.curr_id and fixed_assets.status='0'";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());

}
else
{

$sqlinc="select * from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id and fixed_assets.status='0' AND 
fixed_assets.date_recorded BETWEEN '$date_from' AND '$date_to' order by fixed_assets.fixed_asset_id desc";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());


}


if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { ?>
							  <tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><?php echo $rowsinc->fixed_asset_name;?></td>
    <td></td>
	<td width="2%" colspan="2"><div align="right">
	<?php 
	$quantity=$rowsinc->quantity;
	$value=$rowsinc->value;
	$curr_rate=$rowsinc->curr_rate;
	$value_kshs=$value*$curr_rate*$quantity;
	$dep_value=$rowsinc->dep_value;
	
$dep_value_kshs=$dep_value*$curr_rate*$quantity;
$curr_date=date('Y-m-d');
$date_purchased=$rowsinc->date_purchased;

 $curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 $ttl_dep=$dep_value_kshs*$period_years_final;
 
 echo  number_format($curr_value=$value_kshs-$ttl_dep,2);
	

	?></td>

    
</tr>
							  
						<?php	
	$grnd_curr_value=$grnd_curr_value+$curr_value;						
		
 }

}

//end of filter


?>
 

<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Total Fixed Assets</strong></td>
    
	<td ></td>
    <td width="2%" colspan="2" align="right"><strong><?php echo number_format($grnd_curr_value,2); ?></strong></td>
    
</tr>