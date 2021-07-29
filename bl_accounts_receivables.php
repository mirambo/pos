<tr  bgcolor="#C0D7E5" onClick="document.location.href='view_ledger.php?type=12'">
    <td width="10%" colspan="4">Accounts Receivables</td>
    <td></td>
	<td width="2%" colspan="2"><div align="right">
	<?php
	$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
if ($date_from=='' && $date_to=='')
  
  {	
$sql="select accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id order by accounts_receivables_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 }
 else
 {
 $sql="select accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id AND accounts_receivables_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by accounts_receivables_ledger.transaction_id desc";
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
  	echo number_format($accounts_receivables=$ledger_bal_ar,2);
  }
  
  else
  {
  
  
  
  }
  
  ?>
	
  
  
	
  
  

	
	
	</td>
  
    
</tr>