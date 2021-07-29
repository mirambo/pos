<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Service Order </td>
    
	<td width="2%"><div align="right">
	<?php
		if ($date_from=='' && $date_to=='')
  
  {	
	
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select accounts_payables_ledger.transaction_id,accounts_payables_ledger.transactions,accounts_payables_ledger.amount,accounts_payables_ledger.debit,accounts_payables_ledger.credit,accounts_payables_ledger.currency_code,accounts_payables_ledger.curr_rate,accounts_payables_ledger.date_recorded, currency.curr_name 
from accounts_payables_ledger,currency where accounts_payables_ledger.currency_code=currency.curr_id order by accounts_payables_ledger.transaction_id desc";
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
	$ledger_bal_so=$ledger_bal_so+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($service_order=$ledger_bal_so,2);
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
$sql="select accounts_payables_ledger.transaction_id,accounts_payables_ledger.transactions,accounts_payables_ledger.amount,accounts_payables_ledger.debit,accounts_payables_ledger.credit,accounts_payables_ledger.currency_code,accounts_payables_ledger.curr_rate,accounts_payables_ledger.date_recorded, currency.curr_name 
from accounts_payables_ledger,currency where accounts_payables_ledger.currency_code=currency.curr_id AND accounts_payables_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by accounts_payables_ledger.transaction_id desc";
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
	$ledger_bal_so=$ledger_bal_so+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($service_order=$ledger_bal_so,2);
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