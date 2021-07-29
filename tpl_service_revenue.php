<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Service Revenue</td>
    
	<td width="2%"><div align="right">
	<?php
	if ($date_from=='' && $date_to=='')
  
  {	
	
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select sales_ledger.transaction_id,sales_ledger.transactions,sales_ledger.amount,sales_ledger.debit,sales_ledger.credit,sales_ledger.currency_code,sales_ledger.curr_rate,sales_ledger.date_recorded, currency.curr_name 
from sales_ledger,currency where sales_ledger.currency_code=currency.curr_id order by sales_ledger.transaction_id desc";
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
	$curr_name=$rows->curr_initials.' '.number_format($amount,2);
	}
	else	
	{
	$curr_name=$rows->curr_initials.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php number_format($curr_rate=$rows->curr_rate,2);?>
	
   
	<?php
	
    $currency_code=$rows->currency_code;
	
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_in_kshs=$amount_in;
	 }
	 else
	 {
	 $amount_in_kshs=$amount_in/$curr_rate;
	 
	 }

	number_format($amount_in_kshs,2);
	
	
	}
	?>
	
	<?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_out_kshs=$amount_out;
	 }
	 else
	 {
	 $amount_out_kshs=$amount_out/$curr_rate;
	 
	 }

 number_format($amount_out_kshs,2);
	
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
		?>
	
	<?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal_sr=$ledger_bal_sr+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($service_revenue=$ledger_bal_sr,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
  
  }
  else
  {
  $amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select sales_ledger.transaction_id,sales_ledger.transactions,sales_ledger.amount,sales_ledger.debit,sales_ledger.credit,sales_ledger.currency_code,sales_ledger.curr_rate,sales_ledger.date_recorded, currency.curr_name 
from sales_ledger,currency where sales_ledger.currency_code=currency.curr_id AND sales_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by sales_ledger.transaction_id desc";
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
	$curr_name=$rows->curr_initials.' '.number_format($amount,2);
	}
	else	
	{
	$curr_name=$rows->curr_initials.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php number_format($curr_rate=$rows->curr_rate,2);?>
	
   
	<?php
	
    $currency_code=$rows->currency_code;
	
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_in_kshs=$amount_in;
	 }
	 else
	 {
	 $amount_in_kshs=$amount_in/$curr_rate;
	 
	 }

	number_format($amount_in_kshs,2);
	
	
	}
	?>
	
	<?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_out_kshs=$amount_out;
	 }
	 else
	 {
	 $amount_out_kshs=$amount_out/$curr_rate;
	 
	 }

 number_format($amount_out_kshs,2);
	
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
		?>
	
	<?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal_sr=$ledger_bal_sr+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($service_revenue=$ledger_bal_sr,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
  

  }
  
  
  ?>
</td>
    <td width="2%" colspan="2"></td>
    
</tr>