<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Less Operating Expenses</strong></td>
	
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">General Expenses</td>
    
	<td width="2%"><div align="right">
  
  <?php 
 $ttlkshs=0;
 if ($date_from=='' && $date_to=='')
 {
$sqlexp="SELECT expenses.expense_id,expenses.description,expenses.curr_id,expenses.amount,expenses.mop,expenses.date_of_transaction,expenses.curr_rate,currency.curr_initials 
FROM expenses,currency where currency.curr_id=expenses.curr_id";
$resultsexp= mysql_query($sqlexp) or die ("Error $sqlexp.".mysql_error());
}
else
{
$sqlexp="SELECT expenses.expense_id,expenses.description,expenses.curr_id,expenses.amount,expenses.mop,expenses.date_of_transaction,expenses.curr_rate,currency.curr_initials 
FROM expenses,currency where currency.curr_id=expenses.curr_id AND expenses.date_of_transaction BETWEEN '$date_from' AND '$date_to'";
$resultsexp= mysql_query($sqlexp) or die ("Error $sqlexp.".mysql_error());


}

if (mysql_num_rows($resultsexp) > 0)
						  {
							  $RowCounter=0;
							  while ($rows_exp=mysql_fetch_object($resultsexp))
							  { 
							  
							  

 

   
number_format($amount=$rows_exp->amount,2);
  number_format($curr_rate=$rows_exp->curr_rate,2);
	

	$currency_code=$rows_exp->curr_id;
	if ($currency_code==2)
	{
 $kshs_gen_exp=$amount;
	}
	
	else
	{
$kshs_gen_exp=$amount/$curr_rate;
	}
number_format($kshs_gen_exp,2);
	//echo number_format($kshs=$curr_rate*$amount,2);
	
number_format($ttl_gen_exp=$ttl_gen_exp+$kshs_gen_exp,2);
  
  }
  echo number_format($ttl_gen_exp,2);
    
  }
  

  ?>
</td>
    <td width="2%" colspan="2"></td>
    
</tr>