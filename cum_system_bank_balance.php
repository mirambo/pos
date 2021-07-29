<?php 
include('Connections/fundmaster.php'); 
 //$bank=1;
//$date_from='2013-11-01';	
//$date_to='2013-11-30';
 //deposit transactionns
//cheque deposit
$sql="SELECT cheque_deposits.comments,cheque_deposits.cheque_deposit_id,cheque_deposits.date_drawn,cheque_deposits.curr_id,cheque_deposits.amount,cheque_deposits.date_deposited,
cheque_deposits.date_recorded,banks.bank_name,banks.account_name,cheque_deposits.curr_rate,cheque_deposits.cheque_drawer,cheque_deposits.cheque_no,cheque_deposits.bank_deposited,currency.curr_name
FROM banks,cheque_deposits,currency where cheque_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cheque_deposits.curr_id AND cheque_deposits.bank_deposited='$bank'
and cheque_deposits.date_deposited BETWEEN '$date_from' AND '$date_to' order by cheque_deposits.cheque_deposit_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 $amount=$rows->amount;?>
  <?php 
number_format($curr_rate=$rows->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?><?php 
number_format($inc_kshs=$amount*$curr_rate,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt=$gnd_amnt+$inc_kshs;
}

}

 ?>
 <!--<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Inflows (Kshs)</strong></td>
    <td width="5%" colspan="1" align="center"><strong><font color="#00CC33" size="+1"><?php echo number_format($gnd_amnt,2);?></font></strong></td>
    
	
c
	
	
  </tr>-->
<?php
//cash deposits
$sqlcashdep="SELECT cash_deposits.comments,cash_deposits.cash_deposit_id,cash_deposits.person_dep,cash_deposits.curr_id,cash_deposits.amount,cash_deposits.phone_no,
cash_deposits.date_recorded,cash_deposits.date_deposited,banks.bank_name,banks.account_name,cash_deposits.curr_rate,cash_deposits.deposit_slip_no,cash_deposits.bank_deposited,currency.curr_name
FROM banks,cash_deposits,currency where cash_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cash_deposits.curr_id AND cash_deposits.bank_deposited='$bank' 
AND cash_deposits.date_deposited BETWEEN '$date_from' AND '$date_to' order by cash_deposits.cash_deposit_id asc";
$resultscashdep= mysql_query($sqlcashdep) or die ("Error $sqlcashdep.".mysql_error());

if (mysql_num_rows($resultscashdep) > 0)
						  {
							  $RowCounter=0;
							  while ($rowscashdep=mysql_fetch_object($resultscashdep))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
 $rowscashdep->date_deposited;?>
   
   <?php  number_format($amountcashdep=$rowscashdep->amount,2);?>
    <?php 
	number_format($curr_rate_cashdep=$rowscashdep->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?>
    <?php 
 number_format($inc_kshs_caspdep=$amountcashdep*$curr_rate_cashdep,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_cashdep=$gnd_amnt_cashdep+$inc_kshs_caspdep;
}

}

 ?>
 
<?php
//income bank transfers
$sqlbt="SELECT income.description,income.income_id,income.curr_id,income.amount,income.mop,income.date_of_transaction,income.curr_rate,currency.curr_name 
FROM income,currency where currency.curr_id=income.curr_id AND income.date_of_transaction BETWEEN '$date_from' AND '$date_to' order by income.income_id asc";
$resultsbt= mysql_query($sqlbt) or die ("Error $sqlbt.".mysql_error());
if (mysql_num_rows($resultsbt) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbt=mysql_fetch_object($resultsbt))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)



 ?>
<?php $rowsbt->date_received;?>
<?php  $rowsbt->ref_no;?>
   <?php number_format($amountbt=$rowsbt->amount,2);?>
 <?php 
number_format($curr_rate_bt=$rowsbt->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?><?php 
number_format($inc_kshs_bt=$amountbt*$curr_rate_bt,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_bt=$gnd_amnt_bt+$inc_kshs_bt;
}

}


//income received from clients via bank transfer


$sqlinv="select * FROM clients,invoice_payments,currency where 
invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id AND invoice_payments.mop='Electronic' AND 
invoice_payments.our_bank='$bank' and invoice_payments.date_paid BETWEEN '$date_from' AND '$date_to'";
$resultsinv= mysql_query($sqlinv) or die ("Error $sqlinv.".mysql_error());


if (mysql_num_rows($resultsinv) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsinv=mysql_fetch_object($resultsinv))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


?>

<?php  $rowsinv->date_drawn;?>
    <?php  $rowsinv->ref_no;?>
  <?php $rowsbt->curr_name.' '.number_format($amountinv=$rowsinv->amount_received,2);?>
   <?php 
 number_format($curr_rate_inv=$rowsinv->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?>
  <?php 
 number_format($inc_kshs_inv=$amountinv*$curr_rate_inv,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_inv=$gnd_amnt_inv+$inc_kshs_inv;
}

}

?>


 
 
    <?php  //total deposit
	number_format($ttl_deposits=$gnd_amnt+$gnd_amnt_cashdep+$gnd_amnt_bt+$gnd_amnt_inv,2);?>
    
	
    
	
	
  
  <?php
 //withdrawal transaction  
 //cheque withdrawal
 
$sqlchqw="SELECT cheque_withdrawals.comments,cheque_withdrawals.cheque_withdrawal_id,cheque_withdrawals.date_drawn,cheque_withdrawals.curr_id,cheque_withdrawals.amount,cheque_withdrawals.date_withdrawn,
cheque_withdrawals.date_recorded,banks.bank_name,banks.account_name,cheque_withdrawals.curr_rate,cheque_withdrawals.cheque_no,cheque_withdrawals.bank_withdrawn,currency.curr_name
FROM banks,cheque_withdrawals,currency where cheque_withdrawals.date_withdrawn BETWEEN '$date_from' AND '$date_to' AND cheque_withdrawals.bank_withdrawn=banks.bank_id AND cheque_withdrawals.bank_withdrawn='$bank' AND currency.curr_id=cheque_withdrawals.curr_id order by cheque_withdrawals.cheque_withdrawal_id desc";
$resultschqw= mysql_query($sqlchqw) or die ("Error $sqlchqw.".mysql_error());


if (mysql_num_rows($resultschqw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowschqw=mysql_fetch_object($resultschqw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


 ?>
 
   <?php  number_format($amountchqw=$rowschqw->amount,2);?>
   <?php 
	 number_format($curr_rate_chqw=$rowschqw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?>
    <?php 
number_format($inc_kshs_chqw=$amountchqw*$curr_rate_chqw,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_chqw=$gnd_amnt_chqw+$inc_kshs_chqw;
}

}

 ?>
 
 
 <?php
 
 //cash withdrawal
$sqlcw="SELECT cash_withdrawal.comments,cash_withdrawal.cash_withdrawal_id,cash_withdrawal.person_withdrawn,cash_withdrawal.curr_id,cash_withdrawal.amount,cash_withdrawal.phone_no,
cash_withdrawal.date_recorded,cash_withdrawal.date_withdrawn,banks.bank_name,banks.account_name,cash_withdrawal.curr_rate,cash_withdrawal.withdrawal_slip_no,cash_withdrawal.bank_withdrawn,currency.curr_name
FROM banks,cash_withdrawal,currency where cash_withdrawal.date_withdrawn BETWEEN '$date_from' AND '$date_to' AND cash_withdrawal.bank_withdrawn=banks.bank_id AND cash_withdrawal.bank_withdrawn='$bank' AND currency.curr_id=cash_withdrawal.curr_id order by cash_withdrawal.cash_withdrawal_id asc";
$resultscw= mysql_query($sqlcw) or die ("Error $sqlcw.".mysql_error());


if (mysql_num_rows($resultscw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowscw=mysql_fetch_object($resultscw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


 ?>
<?php $rowscw->date_withdrawn;?>
<?php $rowscw->withdrawal_slip_no;?>
   <?php number_format($amountcw=$rowscw->amount,2);?>
   <?php 
	 number_format($curr_rate_cw=$rowscw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?><?php 
number_format($inc_kshs_cw=$amountcw*$curr_rate_cw,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_cw=$gnd_amnt_cw+$inc_kshs_cw;
}

}

 ?>
 
 
 <?php
 //expenses through bank transfer
$sqlbtw="SELECT * FROM expenses,currency where currency.curr_id=expenses.currency_code AND expenses.date_paid 
BETWEEN '$date_from' AND '$date_to' and expenses.mop='Electronic Transfer' AND expenses.our_bank='$bank' 
order by expenses.expenses_id asc";
$resultsbtw= mysql_query($sqlbtw) or die ("Error $sqlbtw.".mysql_error());


if (mysql_num_rows($resultsbtw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbtw=mysql_fetch_object($resultsbtw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


 ?>
 
    <?php $rowsbtw->curr_name.' '.number_format($amountbtw=$rowsbtw->amount,2);?>
    <?php 
number_format($curr_rate_btw=$rowsbtw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?><?php 
 number_format($inc_kshs_btw=$amountbtw*$curr_rate_btw,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_btw=$gnd_amnt_btw+$inc_kshs_btw;
}

}

//payments made to supplier via bank transfer


$sqlsup="select suppliers.supplier_name,stock_payments.amnt_paid,stock_payments.receipt_no,stock_payments.stock_payments_id,
stock_payments.mop,
stock_payments.cheque_no,stock_payments.ref_no,stock_payments.client_bank,stock_payments.our_bank,
stock_payments.date_drawn,stock_payments.date_paid,stock_payments.status,
stock_payments.currency,stock_payments.exchange_rate,currency.curr_name FROM stock_payments,suppliers,currency where 
stock_payments.supplier_id=suppliers.supplier_id AND stock_payments.currency=currency.curr_id and stock_payments.mop='Electronic Transfer' 
AND stock_payments.our_bank='$bank' and stock_payments.date_drawn BETWEEN '$date_from' AND '$date_to'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());


if (mysql_num_rows($resultssup) > 0)
						  {
							  $RowCounter=0;
							  while ($rowssup=mysql_fetch_object($resultssup))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


?>


    <?php $rowssup->curr_name.' '.number_format($amountsup=$rowssup->amnt_paid,2);?>
    <?php 
number_format($curr_rate_sup=$rowssup->exchange_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?><?php 
 number_format($inc_kshs_sup=$amountsup*$curr_rate_sup,2);	
	//echo $rows->Project_Name;
	
	?>
<?php
$gnd_amnt_sup=$gnd_amnt_sup+$inc_kshs_sup;
}

}

?>


 
 
 
 
 
 <?php  number_format($ttl_withdrawals=$gnd_amnt_btw+$gnd_amnt_cw+$gnd_amnt_chqw+$gnd_amnt_sup,2);?>
 
 <?php echo number_format($out_bal=$ttl_deposits-$ttl_withdrawals,2);?>
    
	
    
	
	
  