<?php 
 
 $grnd_ttl_orig_amnt=0; 

	
//$query2 = mysql_query("select * FROM ledger_transactions WHERE account_id ='$account_id'");
   
   
   
 include('filter_loop.php'); 
   
   
   
   
   
	
    while($row2 = mysql_fetch_object($resultsdc)) 
	{
	
	$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
	
	?>
	<td align="center"><?php echo $row2->transaction_date; ?></td>
	<td><?php echo $row2->memo;?></td>
	<td align="right"><?php 
	
	$curr_id=$row2->currency_code;
	
	$quer="select * FROM currency WHERE curr_id ='$curr_id'";
$resu=mysql_query($quer) or die ("Error: $quer.".mysql_error()); 
$ro=mysql_fetch_object($resu);

echo $ro->curr_name.' ';
	
	
	echo number_format($amount_mx=$row2->amount,2);?></td>
	<td align="center"><?php echo $curr_rate=$row2->curr_rate;?></td>
	<td align="center"><?php echo $amount=$amount_mx*$curr_rate;?></td>
	<td align="right"><?php echo number_format($row2->debit,2);?></td>
	<td align="right"><?php echo number_format($row2->credit,2);?></td>
	
	<td align="right"><strong>
	<?php 
	echo number_format($bal=$bal+$amount,2);
	
	?>
	
	
	</strong>
	
	</td>
	
	
	</tr>
	
	<?php
	
/* 	$orig_amount=$row2->amount;
	$curr_rate=$row2->curr_rate;
	
	$ttl_orig_amnt=$orig_amount*$curr_rate;
	
	$grnd_ttl_orig_amnt=$grnd_ttl_orig_amnt+$ttl_orig_amnt; */
   // echo '<strong><font color="#ff0000">Total Balance (SSP)</font> : '.number_format($row2['cust_ttl'],2).'</strong>';
    }


//echo number_format($grnd_ttl_orig_amnt,2);

?>