<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/financials_submenu.php');  ?>
		
		<h3>:: General Trial Balance</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
  
  
  
 
  
  
  <?php 
  
$querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>

  
  


<table width="85%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>


  <tr style="background:url(images/description.gif);" height="30">
    <td width="40%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>DR.</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>CR.</strong></div></td>
    
	
	
  </tr>
  
 <tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Sales</td>
    
	<td width="2%"><div align="right">
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right"><?php 
	$ttl_sales=0;
$sqlsales="select invoice_ttl FROM invoices";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());
if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		 $ttl_sales=$ttl_sales+$rowssales->invoice_ttl;
		
		}
echo number_format($ttl_sales,2);

}
	
	?></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Sales Returns (Credit Notes)</td>
    
	<td width="2%"><div align="right">
	
	<?php
$ttl_salesret=0;	
$sqlsalesret="SELECT credit_notes.ttl_sales_return FROM credit_notes";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
if (mysql_num_rows($resultssalesret) > 0)
{
while ($rowssalesret=mysql_fetch_object($resultssalesret))
		{
		 $ttl_salesret=$ttl_salesret+$rowssalesret->ttl_sales_return;
		
		}
echo number_format($ttl_salesret,2);

}
	
	?>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>




<!--<tr height="30">
    <td width="10%" colspan="3">Opening Stock</td>
    
	<td width="2%"><div align="center">XXXXXXXXXX</td>
    <td width="2%" colspan="2"></td>
    
</tr>-->
   
   <tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Purchases</td>
    
	<td width="2%"><div align="right">
	<?php
	$grnd_lpo_amount_paid_kshs=0;
	$sql="select lpo.lpo_no,lpo.date_generated,lpo.order_code,lpo.currency_code,lpo.lpo_amount,lpo.paid_amount,suppliers.supplier_name,suppliers.supplier_id,currency.curr_name,currency.curr_rate
from lpo,suppliers,currency where lpo.supplier_id=suppliers.supplier_id AND currency.curr_id=lpo.currency_code and lpo.status='1' order by lpo.lpo_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 $order_id=$rows->order_code;

 $rows->curr_name.' '.number_format($lpo_amount=$rows->lpo_amount,2);
	

	
number_format($curr_rate=$rows->curr_rate,2);

	

number_format($cost_kshs=$curr_rate*$lpo_amount,2);

	$lpo_amount_paid=$rows->paid_amount;
	$lpo_amount_paid_kshs=$curr_rate*$lpo_amount_paid;
	
number_format($lpo_amount_paid_kshs,2);


	$lpo_balance=$lpo_amount-$lpo_amount_paid;
	
number_format($stock_bal=$cost_kshs-$lpo_amount_paid_kshs,2);


$grnt_cost_kshs=$grnt_cost_kshs+$cost_kshs; 
$grnd_lpo_amount_paid_kshs=$grnd_lpo_amount_paid_kshs+$lpo_amount_paid_kshs;
$grnd_stock_bal=$grnd_stock_bal+$stock_bal;
  
  }



echo number_format($grnd_lpo_amount_paid_kshs,2);

  
  }
  

?>
	
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Purchases Returns (Debit Note)</td>
    
	<td width="2%"><div align="right">
	
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right">
<?php 
$ttl_purret=0;
$sqlpurret="SELECT debit_notes.debit_note_id,debit_notes.debit_note_no,debit_notes.ttl_stock_return,debit_notes.date_generated,debit_notes.order_code,debit_notes.currency
,suppliers.supplier_name FROM debit_notes,suppliers where debit_notes.supplier_id=suppliers.supplier_id group by debit_notes.stockreturn_code order by debit_notes.debit_note_id desc";
$resultspurret= mysql_query($sqlpurret) or die ("Error $sqlpurret.".mysql_error());
if (mysql_num_rows($resultspurret) > 0)
{
while ($rowspurret=mysql_fetch_object($resultspurret))
		{
		$ttl_stock_ret=$rowspurret->ttl_stock_return;
		 //$ttl_purret=$ttl_purret+$rowspurret->ttl_stock_return;
		 $order_id=$rowspurret->order_code;
	
$sqlord="select MAX(exchange_rate) AS mxrt from stock_payments where order_code='$order_id'";
$resultsord= mysql_query($sqlord) or die ("Error $sqlord.".mysql_error());
$rowsord=mysql_fetch_object($resultsord);

$ex_rate=$rowsord->mxrt;
$purr_ret_kshs=$ttl_stock_ret*$ex_rate;		 
$ttl_purret=$ttl_purret+$purr_ret_kshs;		
		}
	
	
	
	
echo number_format($ttl_purret,2);

}
	
	?>
	
</td>
    
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Expenses</td>
    
	<td width="2%" align="right">
	
	
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  salary_expenses_ledger.transaction_id,salary_expenses_ledger.transactions,salary_expenses_ledger.amount,salary_expenses_ledger.debit,salary_expenses_ledger.credit,salary_expenses_ledger.currency_code,salary_expenses_ledger.curr_rate,salary_expenses_ledger.date_recorded, currency.curr_name 
from salary_expenses_ledger,currency where salary_expenses_ledger.currency_code=currency.curr_id order by salary_expenses_ledger.transaction_id desc";
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
	$ledger_balexp=$ledger_balexp+$amount_kshs; 
	
	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  echo number_format($ledger_balexp,2);
  }
  
  else
  {
  
  ?>
  
  
  
	
	<?
  
  }
  ?>

	
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right"><?php 
/*$sqlsales="select invoice_ttl FROM invoices";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());
if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		 $ttl_sales=$ttl_sales+$rowssales->invoice_ttl;
		
		}
echo number_format($ttl_sales,2);

}*/
	
	?></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Other Revenues</td>
    
	<td width="2%"><div align="right">
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right"><?php 

$sqlinc="SELECT income.description,income.curr_id,income.amount,income.mop,income.date_of_transaction,income.curr_rate,currency.curr_name 
FROM income,currency where currency.curr_id=income.curr_id";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { 
	$amount=$rowsinc->amount;
	$curr_rate=$rowsinc->curr_rate;
	$inc_kshs=$curr_rate*$amount;
	//echo number_format($inc_kshs,2);
	
	$grnd_ttl=$grnd_ttl+$inc_kshs;						
		
 }
echo number_format($grnd_ttl,2);
}


?></td>
    
</tr>
<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Fixed Assets</td>
    
	<td width="2%"><div align="right">
	
	
  
  <?php 
  	 	 	 	 	 	 	  
$sql="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.description,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency where 
fixed_assets.currency=currency.curr_id AND fixed_assets.status='0' order by fixed_assets.fixed_asset_id desc ";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 
 ?>
  
   
	 <?php $rows->curr_name.' '.number_format($value=$rows->value,2);?>
  <?php number_format($curr_rate=$rows->curr_rate,2);?>
	<?php  number_format($value_kshs=$value*$curr_rate,2); $dep_value=$rows->dep_value;?>
		<?php number_format($dep_value_kshs=$dep_value*$curr_rate,2); ?>
   <?php 
	$fixed_asset_id=$rows->fixed_asset_id;
$ttl_paid=0;	
$sqlp="select * from fixed_assets_payments where fixed_asset_id='$fixed_asset_id'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
if (mysql_num_rows($resultsp) > 0)
{
while ($rowsp=mysql_fetch_object($resultsp))
		{
		 $amount_paid=$curr_rate*$rowsp->amount_paid;
		 $ttl_paid=$ttl_paid+$amount_paid;
		
		}
	number_format($ttl_paid,2);
//echo number_format($ttl_cash1,2);

}


//$curr_rate=$rowcurr->curr_rate;
	
	
number_format($bal_fp= $value_kshs-$ttl_paid,2);

   

  $grnd_ttl=$grnd_ttl+$rows->value;
  $grnd_value_kshs=$grnd_value_kshs+$value_kshs;
  $grnt_bal_fp=$grnt_bal_fp+$bal_fp;
  $grnd_ttl_paid=$grnd_ttl_paid+$ttl_paid;
  $grnd_dep_value_kshs=$grnd_dep_value_kshs+$dep_value_kshs;
  }
  
  ?>
  

   <?php number_format($grnd_value_kshs,2); ?>
	  <?php number_format($grnd_dep_value_kshs,2); ?>
<?php 

$ttl_fixed_assets=$grnd_ttl_paid-$grnd_dep_value_kshs;


echo number_format($ttl_fixed_assets,2); ?>
	   <?php  number_format($grnt_bal_fp,2); ?>

  
  
  <?php
  
  
  }
  
  else
  {
  
  ?>
  
  
  
	
	<?
  
  }
  ?>

	
	
	</td>
    <td width="2%" colspan="2" align="right"><?php 
/*$sqlsales="select invoice_ttl FROM invoices";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());
if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		 $ttl_sales=$ttl_sales+$rowssales->invoice_ttl;
		
		}
echo number_format($ttl_sales,2);

}*/
	
	?></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Current Asset (Cash)</td>
    
	<td width="2%"><div align="right">
	
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  cash_ledger.transaction_id,cash_ledger.transactions,cash_ledger.amount,cash_ledger.debit,cash_ledger.credit,cash_ledger.currency_code,cash_ledger.curr_rate,cash_ledger.date_recorded, currency.curr_name 
from cash_ledger,currency where cash_ledger.currency_code=currency.curr_id order by cash_ledger.transaction_id desc";
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
  number_format($amount,2);
	}
	else	
	{
 number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php  
	
	number_format($curr_rate=$rows->curr_rate,2);?>
	
   
<?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
 number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	
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
	$ledger_bal_cash=$ledger_bal_cash+$amount_kshs; 

	
	?>
   
  
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  
   echo number_format($ledger_bal_cash,2);
  ?>
  
  <?php 
  
  }
  
  else
  {
  
  
  }
  ?>

	
	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Current Asset (Stock/Inventory)</td>
    
	<td width="2%"><div align="right">
		<?php 
  
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight from products, received_stock 
where products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 ?>
 
	
	<?php //number_format($rows->ttl_quant,0);
	$rec_prod=$rows->ttl_quant;
    $prod_id=$rows->product_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
	$sold_prod=$rowsold->ttl_sold_prod;
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' group by cash_sales.product_id";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);

$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;

$ttl_sold_prod=$sold_prod+$prod_cash_sold;
	

	
	//echo $avail_prod; 
	
	
	
	
	?>
	
	<?php  number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?>
	<?php  $avail_prod=$rec_prod-$all_sold_prod;//echo $rows->curr_bp;?>
	<?php //echo $avail_prod;?><?php $curr_bp=$rows->curr_bp;?>
	<?php  number_format($amnt=$avail_prod*$curr_bp,2);?>
  

  <?php 
  $grnt_amnt=$grnt_amnt+$amnt;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
 <?php echo number_format($grnt_amnt,2); ?>
	
  
  
  <?php 
  
  
  }
  
  
  ?>
	
  
  

	
	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>

<tr height="30" bgcolor="#FFFFCC">
<td width="10%" colspan="3">Bab Debts</td>
    
<td><div align="right">
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  bad_debts_ledger.transaction_id,bad_debts_ledger.transactions,bad_debts_ledger.amount,bad_debts_ledger.debit,bad_debts_ledger.credit,bad_debts_ledger.currency_code,bad_debts_ledger.curr_rate,bad_debts_ledger.date_recorded, currency.curr_name 
from bad_debts_ledger,currency where bad_debts_ledger.currency_code=currency.curr_id order by bad_debts_ledger.transaction_id desc";
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
	$ledger_bal_bad_debt=$ledger_bal_bad_debt+$amount_kshs; 
	echo number_format($ledger_bal_bad_debt,2);
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  
  }
  
  else
  {
  
  ?>
  
  
  
	
	<?
  
  }
  ?>



	
	
	
	
</td>
<td></td>
    
</tr>
<tr height="30" bgcolor="#FFFFCC">
<td width="10%" colspan="3">Current Liabilities (Allowance for Doubtful Debts)</td>
    
<td><div align="right">
  
  
  
</td>
<td align="right"><?php
  $ledger_bal=0;
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  doubtful_debts_ledger.transaction_id,doubtful_debts_ledger.transactions,doubtful_debts_ledger.amount,doubtful_debts_ledger.debit,doubtful_debts_ledger.credit,doubtful_debts_ledger.currency_code,doubtful_debts_ledger.curr_rate,doubtful_debts_ledger.date_recorded, currency.curr_name 
from doubtful_debts_ledger,currency where doubtful_debts_ledger.currency_code=currency.curr_id order by doubtful_debts_ledger.transaction_id desc";
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
	$ledger_bal_db=$ledger_bal_db+$amount_kshs; 

	
	?>
   

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
 echo number_format($ledger_bal_db,2);
  	
  }
  
  else
  {

  
  }
  ?></td>
    
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Current Liabilities (Dividends)</td>
    
	<td width="2%"><div align="right"><?php 
$ttldiv=0;
$sqldiv="SELECT dividend_amount FROM dividends";
$resultsdiv= mysql_query($sqldiv) or die ("Error $sqldiv.".mysql_error());

if (mysql_num_rows($resultsdiv) > 0)
{

 while ($rowsdiv=mysql_fetch_object($resultsdiv))
							  {
							  
							  $div=$rowsdiv->dividend_amount;
							  $ttldiv=$ttldiv+ $div; 
							  }
							  
						echo number_format($ttldiv,2);
						


}
	
	?>
	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Current Liabilities (Accounts Payable)</td>
    
	<td width="2%"><div align="right">
	
  
  

	</td>
    <td width="2%" colspan="2" align="right">
	<?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  accounts_payables_ledger.transaction_id,accounts_payables_ledger.transactions,accounts_payables_ledger.amount,accounts_payables_ledger.debit,accounts_payables_ledger.credit,accounts_payables_ledger.currency_code,accounts_payables_ledger.curr_rate,accounts_payables_ledger.date_recorded, currency.curr_name 
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
$curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
$curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php  number_format($curr_rate=$rows->curr_rate,2);?>
	
   
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
	$ledger_bal_ap=$ledger_bal_ap+$amount_kshs; 
	
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  echo number_format($ledger_bal_ap,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
  ?>
	</td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Accounts Receivables</td>
    
	<td width="2%"><div align="right">
	
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id order by accounts_receivables_ledger.transaction_id desc";
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
  	echo number_format($ledger_bal_ar,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
  ?>


	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">Capital</td>
    
	<td width="2%"><div align="right"><?php 


// Totals on credit side




	
	?>
	</td>
    <td width="2%" colspan="2" align="right"><?php
$ttlcapt=0;
$sqlcapt="SELECT shares_amount FROM shares";
$resultscapt= mysql_query($sqlcapt) or die ("Error $sqlcapt.".mysql_error());

if (mysql_num_rows($resultscapt) > 0)
{

 while ($rowscapt=mysql_fetch_object($resultscapt))
							  {
							  
							  $capt=$rowscapt->shares_amount;
							  $ttlcapt=$ttlcapt+ $capt; 
							  }
							  
						echo number_format($ttlcapt,2);
						


}


	?>
	
	</td>
    
</tr>
<tr bgcolor="#C0D7E5" height="30">
<td width="10%" colspan="3">Drawings/Withdrawals</td>

<td align="right"><?php   
//$sql="select financial_year.start_fyear,financial_year.end_fyear,dividends.dividend_amount from financial_year,dividends where dividends.financial_year_id=financial_year.financial_year_id";
//$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$sql="SELECT withdrawn_dividends.dividend,withdrawn_dividends.description,withdrawn_dividends.transaction_date,shares.shares_id,shares.share_holder_name,financial_year.start_fyear,financial_year.financial_year_id,financial_year.end_fyear 
FROM shares,financial_year,withdrawn_dividends where shares.shares_id=withdrawn_dividends.shares_id AND withdrawn_dividends.financial_year_id=financial_year.financial_year_id";
$results=mysql_query($sql) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)


 
 
 ?>
    

<?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
 $share_holder_name=$rows->share_holder_name;
	
	?>
<?php //echo $rows->start_fyear."/".$rows->end_fyear;
	
 $desc=$rows->description;
	
	?>
   <?php $origfyid=$rows->financial_year_id; 
   
 $rows->start_fyear.' / '.$rows->end_fyear;?>

	
	
	
	
	
	
	
	<?php 
	
	 $divident_amnt=$rows->dividend;
	 
	 
	 
number_format($divident_amnt,2);
	 
  ?>

	
    


	<?php 
	
$rows->transaction_date;
	 
	 
	 
	
	 
  ?>

	
  <?php 
  $grnd_div=$grnd_div+$divident_amnt;
  }
  
 ?>
  
  
  

<?php echo  number_format($grnd_div,2); ?>

    
   
	

	
	<?php
                // Check if delete button active, start this

  }
 $cr=$ttl_sales+$ttl_purret+$grnd_ttl+$ledger_bal_db+$ledger_bal_ap+$ttlcapt;	
 $dr=$ttl_salesret+$grnd_lpo_amount_paid_kshs+$ledger_balexp+$ttl_fixed_assets+$ledger_bal_cash+$grnt_amnt+$ledger_bal_bad_debt+$ttldiv+
$ledger_bal_ar+$grnd_div;




$suspence=$dr-$cr;
$drsuspence=$cr-$dr;
$crsuspence=$dr-$cr;


$crfinal=$cr+$crsuspence;
$drfinal=$dr+$drsuspence;
  
  ?></td>
    <td width="2%" colspan="2" align="right">
	
  
  

	
	</td>
    
</tr>
<?php 

if ($suspence>0)
{
?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Suspence</td>
    
	<td width="2%"><div align="right">

	</td>
    <td width="2%" colspan="2" align="right"><?php 
	//dispay suspence balance on credit side
	
	echo number_format($crsuspence,2); 
	
	?></td>
    
</tr>


<!--Grand Total if debit side is greater than credit side -->





<?php 
}

else
{
?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">Suspence</td>
    
	<td width="2%"><div align="right">
	<?php 
	//suspence appear on the debit side

	echo number_format($drsuspence,2); 
	?>

	</td>
    <td width="2%" colspan="2" align="right"></td>
    

</tr>




<?php 
}
?>

<!--Grand Total-->
<?php 
if ($suspence>0)
{
?>
<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3">
	</td>
    
	<td width="2%" align="right"><strong><font size="+1"><?php
// Totals on credit side	

echo number_format($dr,2);
	
	?>
	</strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php 
	echo number_format($crfinal,2);	
	?>
	
	</font></strong></td>
    
</tr>
<?php 

}

else
{
?>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3">
	</td>
    
	<td width="2%" align="right"><strong><font size="+1"><?php
// Totals on credit side	

echo number_format($drfinal,2);
	
	?>
	</strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php 
	echo number_format($cr,2);	
	?>
	
	</font></strong></td>
    
</tr>
<?php 

}
?>
<!--<tr>
    <td colspan="8" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr>--></table>
  
  <br/>
  
<!--<table width="700" border="0" align="center">
  <<tr height="30">
    <td colspan="6" >Goods Checked By-----------------------------------------------------------------------Sign----------------------------------------------------------</td>
  </tr>
  
  <tr height="30">
    <td colspan="6" >Goods Received By---------------------------------------------------------------------- Sign--------------------------- Stamp------------------------</td>
  </tr>
  
  <tr>
    <td colspan="6" align="center" ><strong>GOODS MUST BE CHECKED AND VERIFIED AT THE TIME OF DELIVERY. NO COMPLAINT WILL BE<br/>
	ENTERTAINED ONCE YOU HAVE ACCEPTED THE GOODS, NO CASH PAYMENTS TO BE MADE <br/>
	TO ANY OF OUR SALES PERSON UNLESS AUTHORITY IN WRITING IS OBTAINED.<br/>
	GOODS REMAIN THE PROPERTY OF BRISK DIAGNOSTICS LTD UNTIL PAID FOR IN FULL.<br/>



	</strong></td>
  </tr>-->
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
 
  <tr>
    <td colspan="6" >&nbsp;</td>
  </tr>
</table>

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
			
			
			
			
			
			

		
			

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>