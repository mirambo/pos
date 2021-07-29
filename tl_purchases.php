<tr height="10" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Purchases During The Period</td>

    
	<td width="2%"><div align="right">
  <?php
if ($date_from=='' && $date_to=='')
  
 {
  
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  purchases_ledger.transaction_id,purchases_ledger.transactions,purchases_ledger.amount,purchases_ledger.debit,purchases_ledger.credit,
purchases_ledger.currency_code,purchases_ledger.curr_rate,purchases_ledger.date_recorded, currency.curr_name 
from purchases_ledger,currency where purchases_ledger.currency_code=currency.curr_id order by purchases_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select  purchases_ledger.transaction_id,purchases_ledger.transactions,purchases_ledger.amount,purchases_ledger.debit,purchases_ledger.credit,
purchases_ledger.currency_code,purchases_ledger.curr_rate,purchases_ledger.date_recorded, currency.curr_name 
from purchases_ledger,currency where purchases_ledger.currency_code=currency.curr_id AND purchases_ledger.date_recorded BETWEEN 
'$date_from' AND '$date_to' order by purchases_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 
 ?>
 
  

<?php
	$amount=$rows->amount;
	
	if ($amount>0)
	{
  number_format($amount,2);
	}
	else	
	{
 number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php  
	
	number_format($curr_rate=$rows->curr_rate,2);?>
	
   
<?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
 number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?>
	
	<?php 
	
	$amount_kshs=$curr_rate*$amount;
	$grss_purc=$grss_purc+$amount_kshs; 

	
	?>
   
  
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  
   echo number_format($grss_purc,2);
  ?>
  
  <?php 
  
  }
  
  else
  {
  
  
  }
  
  
  //end of filter
 // }
  
?>
	
	
	</td>
    	<td width="2%" ></td>
    
</tr>