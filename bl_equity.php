<table width="100%" border="0" id="example" class="table">







<?php

$exp_bal=0;
  
$sql="select * from account where account_type_id='4'";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());
//$numrowsprof=mysql_num_rows($resultsprof); 
  
  
  if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  ?>
							  
							  <tr    onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">
							 <td width="70%"><?php echo $rows->account_name;?></td> 
							 <td width="30%" align="right" onClick="document.location.href='view_ledger.php?account_id=<?php echo $account_id=$rows->account_id;?>'">
							 <?php
include ('bl_equity_balance.php');

							 ?>
							 
							 </td> 
							  
							  
							  </tr> <?php 
/* 	$amount=$rows->amount;
	$curr_rate=$rows->curr_rate;
	$amount_in_kshs=$curr_rate*$amount;
	$grnd_ttl_sales_ksh=$grnd_ttl_sales_ksh+$amount_in_kshs; */
	
	?>
  <?php
  }
  
  ?>
  <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">
<td width="70%">Net Income</td>
<td width="30%" align="right" onClick="document.location.href='view_tpla.php'"><?php include ('net_income.php');?></td>
</tr>
 <tr onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">
 <td><strong>Total Equity</strong></td>
 <td align="right"><strong><?php echo number_format($ttl_equity=$net_income+$bl_equity_bal,2); ?></strong></td>
 
 </tr> 
  <?php
  

  }
  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* 
  
  
if ($date_from=='' && $date_to=='')
{ 
$amount_in_kshs=0;  
$amount_out_kshs=0;
$grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select * from ledger_transactions,currency where ledger_transactions.currency_code=currency.curr_id and account_id='' and closing_status='0' order by ledger_transactions.transaction_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select * from ledger_transactions,currency where ledger_transactions.currency_code=currency.curr_id AND ledger_transactions.date_recorded >='$date_from' 
AND ledger_transactions.date_recorded <='$date_to' order by ledger_transactions.transaction_id desc";
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
	$grnd_ttl_sales_ksh=$grnd_ttl_sales_ksh+$amount_in_kshs;
	
	
  
  }

  }
    echo '<span style="float:right; margin-right:100px;">'.number_format($grnd_ttl_sales_ksh,2).'</span>'; */
  
?>
	
 </table> 	
	