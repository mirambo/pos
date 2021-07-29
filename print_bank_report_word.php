<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$bank=$_GET['bank'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=System_Bank_Transactions_Report.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>System Bank Statement Report</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css"/>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();">
 
<table width="700" border="0" align="center" style="margin:auto;" >
<?php 
  



$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="5" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="5"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr><!-- <tr>
    <td colspan="5"><div align="right">Website : <?php echo $rowscont->website; ?></div></td>
  </tr> -->
<tr>
    <td colspan="5"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
   

  <tr height="30">
    <td colspan="5" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">SYSTEM BANK STATEMENT REPORT</span>
	
	</td>
  </tr>
  </table>
  <?php 
if ($date_from=='' && $date_from=='')
{
 ?> 
 
<table width="700" border="0" align="center" class="table" style="margin:auto;" >
<tr height="30" bgcolor="#FFFFCC">
 <td colspan="5"  align="center" >

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">System Bank Statement for Account: </font><font size="+1" color="#ff0000"><?php 

$sqlemp_det="select * from banks where bank_id='$bank'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
 ?></font></strong></div>

  </tr>
  <tr bgcolor="#FFFFCC"><td colspan="5" align="center"><strong><font size="+1">For the Period Ending : </font><font color="#ff0000" size="+1"><?php echo date('Y-m-d'); ?></font></strong></td></tr>
	
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="5"><div align=""><strong>Deposits Transactions</strong></div></td>
    
	
    
	
	
  </tr>
  
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="10%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
   	<td width="2%"><div align="center"><strong>Amount (Kshs)</strong></div></td>
  
  </tr>
  <?php
$sql="SELECT cheque_deposits.comments,cheque_deposits.cheque_deposit_id,cheque_deposits.date_drawn,cheque_deposits.curr_id,cheque_deposits.amount,cheque_deposits.date_deposited,
cheque_deposits.date_recorded,banks.bank_name,banks.account_name,cheque_deposits.curr_rate,cheque_deposits.cheque_drawer,cheque_deposits.cheque_no,cheque_deposits.bank_deposited,currency.curr_name
FROM banks,cheque_deposits,currency where cheque_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cheque_deposits.curr_id AND cheque_deposits.bank_deposited='$bank' order by cheque_deposits.cheque_deposit_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
<td align="center"><?php echo $rows->date_deposited;?></td>
    <td>Cheque Deposit : Cheque No:<?php echo $rows->cheque_no;?></td>
    <td align="right"><?php echo $rows->curr_name.' '.number_format($amount=$rows->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate=$rows->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs=$amount*$curr_rate,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt=$gnd_amnt+$inc_kshs;
}

}

 ?>
 <!--<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Inflows (Kshs)</strong></td>
    <td width="5%" colspan="1" align="center"><strong><font color="#00CC33" size="+1"><?php echo number_format($gnd_amnt,2);?></font></strong></td>
    
	
    
	
	
  </tr>-->
<?php
//cash deposits
$sqlcashdep="SELECT cash_deposits.comments,cash_deposits.cash_deposit_id,cash_deposits.person_dep,cash_deposits.curr_id,cash_deposits.amount,cash_deposits.phone_no,
cash_deposits.date_recorded,cash_deposits.date_deposited,banks.bank_name,banks.account_name,cash_deposits.curr_rate,cash_deposits.deposit_slip_no,cash_deposits.bank_deposited,currency.curr_name
FROM banks,cash_deposits,currency where cash_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cash_deposits.curr_id AND cash_deposits.bank_deposited='$bank' order by cash_deposits.cash_deposit_id asc";
$resultscashdep= mysql_query($sqlcashdep) or die ("Error $sqlcashdep.".mysql_error());

if (mysql_num_rows($resultscashdep) > 0)
						  {
							  $RowCounter=0;
							  while ($rowscashdep=mysql_fetch_object($resultscashdep))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}


 ?>  
 <td align="center"><?php echo $rowscashdep->date_deposited;?></td>
    <td>Cash Deposit : Slip No:<?php echo $rowscashdep->deposit_slip_no;?></td>
    <td align="right"><?php echo $rowscashdep->curr_initials.' '.number_format($amountcashdep=$rowscashdep->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_cashdep=$rowscashdep->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_caspdep=$amountcashdep*$curr_rate_cashdep,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_cashdep=$gnd_amnt_cashdep+$inc_kshs_caspdep;
}

}

 ?>
 
<?php
//deposits bank transfers
$sqlbt="SELECT income.description,income.income_id,income.curr_id,income.amount,income.mop,income.date_of_transaction,income.curr_rate,currency.curr_name 
FROM income,currency where currency.curr_id=income.curr_id order by income.income_id asc";
$resultsbt= mysql_query($sqlbt) or die ("Error $sqlbt.".mysql_error());
if (mysql_num_rows($resultsbt) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbt=mysql_fetch_object($resultsbt))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}


 ?>
 <td align="center"><?php echo $rowsbt->date_received;?></td>
    <td>Gen. Income Bank Transfer: Ref No :<?php echo $rowsbt->ref_no;?></td>
    <td align="right"><?php echo $rowsbt->curr_initials.' '.number_format($amountbt=$rowsbt->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_bt=$rowsbt->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_bt=$amountbt*$curr_rate_bt,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_bt=$gnd_amnt_bt+$inc_kshs_bt;
}

}



//income received from clients via bank transfer


$sqlinv="select clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.cheque_no,invoice_payments.ref_no,invoice_payments.client_bank,
invoice_payments.our_bank,invoice_payments.date_drawn,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,invoice_payments,currency where 
invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id AND invoice_payments.mop='Electronic' AND 
invoice_payments.our_bank='$bank'";
$resultsinv= mysql_query($sqlinv) or die ("Error $sqlinv.".mysql_error());


if (mysql_num_rows($resultsinv) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsinv=mysql_fetch_object($resultsinv))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

?>

<td align="center"><?php echo $rowsinv->date_drawn;?></td>
    <td>Client Payment Bank Transfer: Ref No :<?php echo $rowsinv->ref_no;?></td>
    <td align="right"><?php echo $rowsbt->curr_name.' '.number_format($amountinv=$rowsinv->amount_received,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_inv=$rowsinv->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_inv=$amountinv*$curr_rate_inv,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_inv=$gnd_amnt_inv+$inc_kshs_inv;
}

}

?>
 
 
 
 
 
 
 <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Deposits(Kshs)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($ttl_deposits=$gnd_amnt+$gnd_amnt_cashdep+$gnd_amnt_bt+$gnd_amnt_inv,2);?></font></strong></td>
    
	
    
	
	
  </tr>
  
  
<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="5"><div align=""><strong>Withdrawal Transactions</strong></div></td>
    
	
    
	
	
  </tr>
  
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="10%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
   	<td width="2%"><div align="center"><strong>Amount (Kshs)</strong></div></td>
  
  </tr>
  <?php
$sqlchqw="SELECT cheque_withdrawals.comments,cheque_withdrawals.cheque_withdrawal_id,cheque_withdrawals.date_drawn,cheque_withdrawals.curr_id,cheque_withdrawals.amount,cheque_withdrawals.date_withdrawn,
cheque_withdrawals.date_recorded,banks.bank_name,banks.account_name,cheque_withdrawals.curr_rate,cheque_withdrawals.cheque_no,cheque_withdrawals.bank_withdrawn,currency.curr_name
FROM banks,cheque_withdrawals,currency where cheque_withdrawals.bank_withdrawn=banks.bank_id AND cheque_withdrawals.bank_withdrawn='$bank' AND currency.curr_id=cheque_withdrawals.curr_id order by cheque_withdrawals.cheque_withdrawal_id desc";
$resultschqw= mysql_query($sqlchqw) or die ("Error $sqlchqw.".mysql_error());


if (mysql_num_rows($resultschqw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowschqw=mysql_fetch_object($resultschqw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowschqw->date_withdrawn;?></td>
    <td>Cheque Withdrawal: Cheque No :<?php echo $rowschqw->cheque_no;?></td>
    <td align="right"><?php echo $rowschqw->curr_initials.' '.number_format($amountchqw=$rowschqw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_chqw=$rowschqw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_chqw=$amountchqw*$curr_rate_chqw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_chqw=$gnd_amnt_chqw+$inc_kshs_chqw;
}

}

 ?>
 
 
 <?php
$sqlcw="SELECT cash_withdrawal.comments,cash_withdrawal.cash_withdrawal_id,cash_withdrawal.person_withdrawn,cash_withdrawal.curr_id,cash_withdrawal.amount,cash_withdrawal.phone_no,
cash_withdrawal.date_recorded,cash_withdrawal.date_withdrawn,banks.bank_name,banks.account_name,cash_withdrawal.curr_rate,cash_withdrawal.withdrawal_slip_no,cash_withdrawal.bank_withdrawn,currency.curr_name
FROM banks,cash_withdrawal,currency where cash_withdrawal.bank_withdrawn=banks.bank_id AND cash_withdrawal.bank_withdrawn='$bank' AND currency.curr_id=cash_withdrawal.curr_id order by cash_withdrawal.cash_withdrawal_id asc";
$resultscw= mysql_query($sqlcw) or die ("Error $sqlcw.".mysql_error());


if (mysql_num_rows($resultscw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowscw=mysql_fetch_object($resultscw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowscw->date_withdrawn;?></td>
    <td>Cash Withdrawal: Slip No :<?php echo $rowscw->withdrawal_slip_no;?></td>
    <td align="right"><?php echo $rowscw->curr_initials.' '.number_format($amountcw=$rowscw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_cw=$rowscw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_cw=$amountcw*$curr_rate_cw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_cw=$gnd_amnt_cw+$inc_kshs_cw;
}

}

 ?>
 
 
 <?php
 //expenses through bank transfer
$sqlbtw="SELECT expenses.expense_id,expenses.description,expenses.cheque_no,expenses.curr_id,expenses.amount,expenses.mop,
expenses.cheque_no,expenses.ref_no,expenses.client_bank,expenses.our_bank,expenses.date_drawn,expenses.date_of_transaction,expenses.curr_rate,currency.curr_name 
FROM expenses,currency where currency.curr_id=expenses.curr_id AND expenses.mop='Electronic Transfer' AND expenses.our_bank='$bank'";
$resultsbtw= mysql_query($sqlbtw) or die ("Error $sqlbtw.".mysql_error());


if (mysql_num_rows($resultsbtw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbtw=mysql_fetch_object($resultsbtw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowsbtw->date_drawn;?></td>
    <td>Expenses paid Bank Transfer: Ref. No :<?php echo $rowsbtw->ref_no;?></td>
    <td align="right"><?php echo $rowsbtw->curr_name.' '.number_format($amountbtw=$rowsbtw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_btw=$rowsbtw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_btw=$amountbtw*$curr_rate_btw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
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
AND stock_payments.our_bank='$bank'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());


if (mysql_num_rows($resultssup) > 0)
						  {
							  $RowCounter=0;
							  while ($rowssup=mysql_fetch_object($resultssup))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

?>

<td align="center"><?php echo $rowssup->date_drawn;?></td>
    <td>Supplier Payment Bank Transfer: Ref No :<?php echo $rowssup->ref_no;?></td>
    <td align="right"><?php echo $rowssup->curr_name.' '.number_format($amountsup=$rowssup->amnt_paid,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_sup=$rowssup->exchange_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_sup=$amountsup*$curr_rate_sup,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_sup=$gnd_amnt_sup+$inc_kshs_sup;
}

}

?>



 <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Withdrawals(Kshs)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($ttl_withdrawals=$gnd_amnt_btw+$gnd_amnt_cw+$gnd_amnt_chqw+$gnd_amnt_sup,2);?></font></strong></td>
    
	
    
	
	
  </tr>
  
   <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>OUTSTANDING BALANCE (KSHS)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font  size="+2"><?php echo number_format($ttl_deposits-$ttl_withdrawals,2);?></strong></td>
    
	
    
	
	
  </tr>
</table>
</form>
</br></br>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>
 <?php 

}
else
{
?>
 <form name="search" method="post" action="">   
<table width="700" border="0" align="center" style="margin:auto;" class="table">


<tr height="30" bgcolor="#FFFFCC">
 <td colspan="5"  align="center" >

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">System Bank Statement for Account: </font><font size="+1" color="#ff0000"><?php 

$sqlemp_det="select * from banks where bank_id='$bank'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
 ?></font></strong></div>

  </tr>
  
  <tr bgcolor="#FFFFCC"><td colspan="5" align="center"><strong><font size="+1">For the Period Between : </font>
  <font color="#ff0000" size="+1"><?php echo $date_from; ?></font><font size="+1">And<font color="#ff0000" size="+1"><?php echo $date_to; ?></font></strong></td></tr>
	
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="5"><div align=""><strong>Deposits Transactions</strong></div></td>
    
	
    
	
	
  </tr>
  
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="10%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
   	<td width="2%"><div align="center"><strong>Amount (Kshs)</strong></div></td>
  
  </tr>
  <?php
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
<td align="center"><?php echo $rows->date_deposited;?></td>
    <td>Cheque Deposit : Cheque No:<?php echo $rows->cheque_no;?></td>
    <td align="right"><?php echo $rows->curr_initials.' '.number_format($amount=$rows->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate=$rows->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs=$amount*$curr_rate,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt=$gnd_amnt+$inc_kshs;
}

}

 ?>
 <!--<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Inflows (Kshs)</strong></td>
    <td width="5%" colspan="1" align="center"><strong><font color="#00CC33" size="+1"><?php echo number_format($gnd_amnt,2);?></font></strong></td>
    
	
    
	
	
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}


 ?>  
 <td align="center"><?php echo $rowscashdep->date_deposited;?></td>
    <td>Cash Deposit : Slip No:<?php echo $rowscashdep->deposit_slip_no;?></td>
    <td align="right"><?php echo $rowscashdep->curr_initials.' '.number_format($amountcashdep=$rowscashdep->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_cashdep=$rowscashdep->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_caspdep=$amountcashdep*$curr_rate_cashdep,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}


 ?>
 <td align="center"><?php echo $rowsbt->date_received;?></td>
    <td>Gen Income Bank Transfer: Ref No :<?php echo $rowsbt->ref_no;?></td>
    <td align="right"><?php echo $rowsbt->curr_initials.' '.number_format($amountbt=$rowsbt->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_bt=$rowsbt->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_bt=$amountbt*$curr_rate_bt,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_bt=$gnd_amnt_bt+$inc_kshs_bt;
}

}


//income received from clients via bank transfer


$sqlinv="select clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.cheque_no,invoice_payments.ref_no,invoice_payments.client_bank,
invoice_payments.our_bank,invoice_payments.date_drawn,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,invoice_payments,currency where 
invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id AND invoice_payments.mop='Electronic' AND 
invoice_payments.our_bank='$bank' and invoice_payments.date_drawn BETWEEN '$date_from' AND '$date_to'";
$resultsinv= mysql_query($sqlinv) or die ("Error $sqlinv.".mysql_error());


if (mysql_num_rows($resultsinv) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsinv=mysql_fetch_object($resultsinv))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

?>

<td align="center"><?php echo $rowsinv->date_drawn;?></td>
    <td>Client Payment Bank Transfer: Ref No :<?php echo $rowsinv->ref_no;?></td>
    <td align="right"><?php echo $rowsbt->curr_name.' '.number_format($amountinv=$rowsinv->amount_received,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_inv=$rowsinv->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_inv=$amountinv*$curr_rate_inv,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_inv=$gnd_amnt_inv+$inc_kshs_inv;
}

}

?>


 
 <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Deposits(Kshs)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($ttl_deposits=$gnd_amnt+$gnd_amnt_cashdep+$gnd_amnt_bt+$gnd_amnt_inv,2);?></font></strong></td>
    
	
    
	
	
  </tr>
  
  
<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="5"><div align=""><strong>Withdrawal Transactions</strong></div></td>
    
	
    
	
	
  </tr>
  
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="10%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
   	<td width="2%"><div align="center"><strong>Amount (Kshs)</strong></div></td>
  
  </tr>
  <?php
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowschqw->date_withdrawn;?></td>
    <td>Cheque Withdrawal: Cheque No :<?php echo $rowschqw->cheque_no;?></td>
    <td align="right"><?php echo $rowschqw->curr_initials.' '.number_format($amountchqw=$rowschqw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_chqw=$rowschqw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_chqw=$amountchqw*$curr_rate_chqw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_chqw=$gnd_amnt_chqw+$inc_kshs_chqw;
}

}

 ?>
 
 
 <?php
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowscw->date_withdrawn;?></td>
    <td>Cash Withdrawal: Slip No :<?php echo $rowscw->withdrawal_slip_no;?></td>
    <td align="right"><?php echo $rowscw->curr_initials.' '.number_format($amountcw=$rowscw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_cw=$rowscw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_cw=$amountcw*$curr_rate_cw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_cw=$gnd_amnt_cw+$inc_kshs_cw;
}

}

 ?>
 
 
 <?php
 //expenses through bank transfer
$sqlbtw="SELECT expenses.expense_id,expenses.description,expenses.cheque_no,expenses.curr_id,expenses.amount,expenses.mop,
expenses.cheque_no,expenses.ref_no,expenses.client_bank,expenses.our_bank,expenses.date_drawn,expenses.date_of_transaction,expenses.curr_rate,currency.curr_name 
FROM expenses,currency where currency.curr_id=expenses.curr_id AND expenses.date_drawn BETWEEN '$date_from' AND '$date_to' and expenses.mop='Electronic Transfer' AND expenses.our_bank='$bank' 
order by expenses.expense_id asc";
$resultsbtw= mysql_query($sqlbtw) or die ("Error $sqlbtw.".mysql_error());


if (mysql_num_rows($resultsbtw) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbtw=mysql_fetch_object($resultsbtw))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

 ?>
 <td align="center"><?php echo $rowsbtw->date_drawn;?></td>
    <td>Expenses Paid Bank Transfer: Ref No :<?php echo $rowsbtw->ref_no;?></td>
    <td align="right"><?php echo $rowsbtw->curr_name.' '.number_format($amountbtw=$rowsbtw->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_btw=$rowsbtw->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_btw=$amountbtw*$curr_rate_btw,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
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
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}

?>

<td align="center"><?php echo $rowssup->date_drawn;?></td>
    <td>Supplier Payment Bank Transfer: Ref No :<?php echo $rowssup->ref_no;?></td>
    <td align="right"><?php echo $rowssup->curr_name.' '.number_format($amountsup=$rowssup->amnt_paid,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate_sup=$rowssup->exchange_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
echo number_format($inc_kshs_sup=$amountsup*$curr_rate_sup,2);	
	//echo $rows->Project_Name;
	
	?></td>
	</tr>
<?php
$gnd_amnt_sup=$gnd_amnt_sup+$inc_kshs_sup;
}

}

?>


 
 
 
 
 
 <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Withdrawals(Kshs)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($ttl_withdrawals=$gnd_amnt_btw+$gnd_amnt_cw+$gnd_amnt_chqw+$gnd_amnt_sup,2);?></font></strong></td>
    
	
    
	
	
  </tr>
  
   <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>OUTSTANDING BALANCE (KSHS)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font  size="+2"><?php echo number_format($ttl_deposits-$ttl_withdrawals,2);?></strong></td>
    
	
    
	
	
  </tr>
</table>
</form>
</br></br>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>
 <?php 

}

?>
<table width="700" border="0"> 
  <tr  height="20">
   <td colspan="5" align="right"><strong>Printed by :
 <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
   </strong></td>
  </tr>  
  
  
  </table>

</body>
</html>
