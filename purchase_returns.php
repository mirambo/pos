<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Less Purchases Returns</td>
    
	<td width="2%"><div align="right"><?php
if ($date_from=='' && $date_to=='')
  
  {  	
	
	$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select purchases_returns_ledger.transaction_id,purchases_returns_ledger.transactions,purchases_returns_ledger.amount,purchases_returns_ledger.debit,purchases_returns_ledger.credit,purchases_returns_ledger.currency_code,purchases_returns_ledger.curr_rate,purchases_returns_ledger.date_recorded, currency.curr_name 
from purchases_returns_ledger,currency where purchases_returns_ledger.currency_code=currency.curr_id order by purchases_returns_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





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
$curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
$curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php number_format($curr_rate=$rows->curr_rate,2);?>
	
   
	<?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?>
	
<?php
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
	$ledger_bal_ar=$ledger_bal_ar+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($ttl_purret=$ledger_bal_ar,2);
  }
  
  else
  {
  
  
  
  }
  //end of filter
  }
  else
  {
  
  $amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select purchases_returns_ledger.transaction_id,purchases_returns_ledger.transactions,purchases_returns_ledger.amount,purchases_returns_ledger.debit,purchases_returns_ledger.credit,purchases_returns_ledger.currency_code,purchases_returns_ledger.curr_rate,purchases_returns_ledger.date_recorded, currency.curr_name 
from purchases_returns_ledger,currency where purchases_returns_ledger.currency_code=currency.curr_id AND purchases_returns_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by purchases_returns_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





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
$curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
$curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php number_format($curr_rate=$rows->curr_rate,2);?>
	
   
	<?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?>
	
<?php
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
	$ledger_bal_ar=$ledger_bal_ar+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($ttl_purret=$ledger_bal_ar,2);
  }
  
  else
  {
  
  
  
  }
  
  
  
  }

	
	?></td>
    <td width="2%" colspan="2"></td>
    
</tr>