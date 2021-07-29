<strong>Less Operating Expenses : </strong>


    
	
  <?php
if ($date_from=='' && $date_to=='')
  
 {
  
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  * from salary_expenses_ledger,currency where salary_expenses_ledger.currency_code=currency.curr_id and closing_status='0' order by salary_expenses_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select  * from salary_expenses_ledger,currency where salary_expenses_ledger.currency_code=currency.curr_id AND salary_expenses_ledger.date_recorded BETWEEN 
'$date_from' AND '$date_to' order by salary_expenses_ledger.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							 

	$amount=$rows->amount;
	$curr_rate=$rows->curr_rate;
	$amount_in_kshs=$curr_rate*$amount;
	$ledger_bal_exp=$ledger_bal_exp+$amount_in_kshs; 
							  
	
	}
	
	
	}
echo '<span style="float:right; margin-right:100px;">('.number_format($ledger_bal_exp,2).')</span>';	
	
	
	