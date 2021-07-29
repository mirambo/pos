<?php 
if ($date_from=='' && $date_to=='')
  
  {	

$sqlsales="select * FROM invoices where status='1'";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());

if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		
		 $sales=$rowssales->invoice_ttl;
		//$sales=$ttl_sales+$rowssales->invoice_ttl;
		 $curr_rate=$rowssales->curr_rate;
		 $ttl_sales_ksh=$curr_rate*$sales;
		
		$grnd_ttl_crsales_ksh=$grnd_ttl_crsales_ksh+$ttl_sales_ksh;
		
		}
		
 number_format($grnd_ttl_crsales_ksh,2);

}


$sqlcsales="select * FROM cash_sales_payments";
$resultscsales= mysql_query($sqlcsales) or die ("Error $sqlcsales.".mysql_error());

if (mysql_num_rows($resultscsales) > 0)
{
while ($rowscsales=mysql_fetch_object($resultscsales))
		{
		
		 $csales=$rowscsales->ttl_amount;
		//$sales=$ttl_sales+$rowssales->invoice_ttl;
		 $ccurr_rate=$rowscsales->curr_rate;
		 $ttl_csales_ksh=$ccurr_rate*$csales;
		
		$grnd_ttl_csales_ksh=$grnd_ttl_csales_ksh+$ttl_csales_ksh;
		
		}
		
number_format($grnd_ttl_csales_ksh,2);

}

number_format($grnd_ttl_sales_ksh=$grnd_ttl_crsales_ksh+$grnd_ttl_csales_ksh,2);
	
//sales returns 
$sqlsalesret="SELECT credit_notes.ttl_sales_return FROM credit_notes";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
if (mysql_num_rows($resultssalesret) > 0)
{
while ($rowssalesret=mysql_fetch_object($resultssalesret))
		{
		 $ttl_salesret=$ttl_salesret+$rowssalesret->ttl_sales_return;
		
		}
 number_format($ttl_salesret,2);

}


	
//Gross Sales
$gross_sale=$grnd_ttl_sales_ksh-$ttl_salesret;

//opening stock to be put here	

  $sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id and received_stock.order_code='0' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  
 
 ?>
 



	
	<?php 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
	
	
	
	
	?>
	

	
	

<?php $bp=$rows->curr_bp;?>
<?php  number_format($curr_rate=$rows->exchange_rate,2);?>

<?php 
	
	
	
	
	
	number_format($ttl_cost=$rec_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	

  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  
<?php  number_format($grnt_amnt_ttl_cost,2);?>
	
 
  
  
  <?php 
  
  
  }
  

	//purchases  

$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  purchases_ledger.transaction_id,purchases_ledger.transactions,purchases_ledger.amount,purchases_ledger.debit,purchases_ledger.credit,purchases_ledger.currency_code,purchases_ledger.curr_rate,purchases_ledger.date_recorded, currency.curr_name 
from purchases_ledger,currency where purchases_ledger.currency_code=currency.curr_id order by purchases_ledger.transaction_id desc";
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
	$ledger_bal_pur=$ledger_bal_pur+$amount_kshs; 
	
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  //echo number_format($grss_purc=$ledger_bal_pur,2);
  }
  
  else
  {
  
  
  }
  ?>





    
<?php 
	//Gross Purchases
	
	$grss_purc=$ledger_bal_pur;
	
	//number_format($grss_purc,2);
	

//Purchases Returns
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select purchases_returns_ledger.transaction_id,purchases_returns_ledger.transactions,purchases_returns_ledger.amount,purchases_returns_ledger.debit,purchases_returns_ledger.credit,purchases_returns_ledger.currency_code,purchases_returns_ledger.curr_rate,purchases_returns_ledger.date_recorded, currency.curr_name 
from purchases_returns_ledger,currency where purchases_returns_ledger.currency_code=currency.curr_id order by purchases_returns_ledger.transaction_id desc";
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
	$ledger_bal_arxx=$ledger_bal_arxx+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
   number_format($ttl_purret=$ledger_bal_arxx,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
	
	

//Total Cost of Sales




//

    
//good avallable for sales	
$goods_available_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret; 

//closing stock


  
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							 
 
 
 ?>
  
	
	<?php 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;

$sqlret="select SUM(sales_returns.sales_return_quantity ) as ttl_sales_ret from sales_returns where sales_returns.product_id='$prod_id'";
$resultsret= mysql_query($sqlret) or die ("Error $sqlret.".mysql_error());
$rowsret=mysql_fetch_object($resultsret);

$prod_ret=$rowsret->ttl_sales_ret;
	
$sqlstockret="select SUM(stock_returns.stock_return_quantity) as ttl_stock_ret from stock_returns where stock_returns.product_id='$prod_id'";
$resultsstockret= mysql_query($sqlstockret) or die ("Error $sqlstockret.".mysql_error());
$rowsstockret=mysql_fetch_object($resultsstockret);

$stock_ret=$rowsstockret->ttl_stock_ret;
	
	
	
	
	?>
	

	<?php number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?>
	
	<?php $avail_prod=$rec_prod-$all_sold_prod+$prod_ret-$stock_ret;//echo $rows->curr_bp;?>
	<?php $bp=$rows->curr_bp;?>
	<?php number_format($curr_rate=$rows->exchange_rate,2);?>

	<?php 
	
	
	
	
	
 number_format($ttl_cost=$avail_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	
	

	
	
  
	
	
  

  <?php 
  $grnt_amnt_ttl_ccost=$grnt_amnt_ttl_ccost+$ttl_cost;
 
  }
  ?>
 
	<?php  number_format($grnt_amnt_ttl_ccost,2);?>


	
  
  
  
  <?php 
  
  
  }
  

  

  
  
 


 number_format($cost_of_sales=$goods_available_for_sale-$grnt_amnt_ttl_ccost,2);
     

	
	$gross_pl=$gross_sale-$cost_of_sales; 
	?>
	
<?php 
	if ($gross_pl>0)
	{
	
	//echo "Profit";
	}
	
	else
	{
	//echo "Loss";
	}
	


	
	
	
	
	
$gross_pl=$gross_sale-$cost_of_sales; 
number_format($gross_pl,2);
	

	//Add Other Incomes
	




$sqlinc="SELECT income.description,income.curr_id,income.amount,income.mop,income.date_of_transaction,income.curr_rate,currency.curr_name 
FROM income,currency where currency.curr_id=income.curr_id";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { 
						
   $rowsinc->description;
    

	$amount=$rowsinc->amount;
	$curr_rate=$rowsinc->curr_rate;
	$inc_kshs=$curr_rate*$amount;
	number_format($inc_kshs,2);
	?>
    

							  
						<?php	
	$grnd_ttl_inc=$grnd_ttl_inc+$inc_kshs;						
		
 }

}


?>
 


<?php  number_format($grnd_ttl_inc,2); ?>
 <?php  number_format($grnd_ttl_inc,2); ?>
    



    
	
<?php 
	//Gross loss or profit plus incomes
	number_format($prof_inc=$gross_pl+$grnd_ttl_inc,2);
	
	//echo number_format($grnd_ttl,2); 
	
//Less Operating Expenses	
	?>
	
  
  <?php
  
  //General Expenses
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sqlge="select  salary_expenses_ledger.transaction_id,salary_expenses_ledger.transactions,salary_expenses_ledger.amount,salary_expenses_ledger.debit,salary_expenses_ledger.credit,salary_expenses_ledger.currency_code,salary_expenses_ledger.curr_rate,salary_expenses_ledger.date_recorded, currency.curr_name 
from salary_expenses_ledger,currency where salary_expenses_ledger.currency_code=currency.curr_id order by salary_expenses_ledger.transaction_id desc";
$resultsge= mysql_query($sqlge) or die ("Error $sqlge.".mysql_error());





if (mysql_num_rows($resultsge) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsge=mysql_fetch_object($resultsge))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
 
 
 ?>
 
  

<?php
	$amountge=$rowsge->amount;
	
	if ($amountge>0)
	{
 $curr_name=$rowsge->curr_name.' '.number_format($amountge,2);
	}
	else	
	{
$curr_name=$rowsge->curr_name.' '.number_format($str2=substr($amountge,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php  number_format($curr_rate=$rowsge->curr_rate,2);?>
	
   
<?php
	$amount_in=$rowsge->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	 number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?>
	
<?php
	$amount_out=$rowsge->credit;
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
	
	$amount_kshs=$curr_rate*$amountge;
	$ledger_bal_exp=$ledger_bal_exp+$amount_kshs; 
	
	
	?>
   
    
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
 number_format($ledger_bal_exp,2);
  }
  
  else
  {
  
  ?>
  
  
  
	
	<?
  
  }
  ?>

	
	

	
  
  <?php 
 //Miscellinous Expenses
$sqlpetty="SELECT * from petty_cash_expense";
$resultspetty= mysql_query($sqlpetty) or die ("Error $sqlpetty.".mysql_error());


if (mysql_num_rows($resultspetty) > 0)
						  {
						
							  while ($rowspetty=mysql_fetch_object($resultspetty))
							  { 
							  
							 

 
 ?>
   


	<?php  number_format($amount_me=$rowspetty->amount,2);?>
	

  
 
  <?php 
  
  $gnd_amnt_me=$gnd_amnt_me+$amount_me;
  }
  
  
  ?>
  
    
<?php number_format($gnd_amnt_me,2); ?>


  
  <?php
  
  }
  
  
  ?>
  
  <?php 
 
$sqlinc="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency 
where fixed_assets.currency=currency.curr_id order by fixed_assets.fixed_asset_id desc";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { ?>
							  
    
    
	
	<?php 
	
	$value=$rowsinc->value;
	$curr_rate=$rowsinc->curr_rate;
	$value_kshs=$value*$curr_rate;
	$dep_value=$rowsinc->dep_value;
	$dep_value_kshs=$dep_value*$curr_rate;
	$curr_date=date('Y-m-d');
$date_purchased=$rowsinc->date_purchased;

 $curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 $ttl_dep=$dep_value_kshs*$period_years_final;
 $grnd_depr=$grnd_depr+$ttl_dep;
 }
 
  $grnd_depr;
 
 }
 
 //allowance for doubtful debts expenses
 $amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select bad_debts_ledger.transaction_id,bad_debts_ledger.transactions,bad_debts_ledger.amount,bad_debts_ledger.debit,bad_debts_ledger.credit,bad_debts_ledger.currency_code,bad_debts_ledger.curr_rate,bad_debts_ledger.date_recorded, currency.curr_name 
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
	$ledger_bal_bd=$ledger_bal_bd+$amount_kshs; 
	
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  //echo number_format($grss_purc=$ledger_bal_pur,2);
  }
  
  else
  {
  
  
  }
  

	//Gross loss or profit plus incomes
number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$grnd_depr+$ledger_bal_bd,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?>






	<?php 
	
	$net_pl=$prof_inc-$grnd_expense;
	
	if ($net_pl>0)
	{
	 //echo "Profit";
	}
	else
	{
	//echo "Loss";
	
	}
	?>
	
  <?php 
number_format($net_pl=$prof_inc-$grnd_expense,2);

number_format($net_loss=$grnd_expense-$prof_inc,2);



//end of filter
}

else

{
//echo "date selected";


$sqlsales="select * FROM invoices where status='1' and 	date_generated BETWEEN '$date_from' AND '$date_to'";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());
 
if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		
		 $sales=$rowssales->invoice_ttl;
		//$sales=$ttl_sales+$rowssales->invoice_ttl;
		 $curr_rate=$rowssales->curr_rate;
		 $ttl_sales_ksh=$curr_rate*$sales;
		
		$grnd_ttl_crsales_ksh=$grnd_ttl_crsales_ksh+$ttl_sales_ksh;
		
		}
		
 number_format($grnd_ttl_crsales_ksh,2);

}


$sqlcsales="select * FROM cash_sales_payments WHERE date_generated BETWEEN '$date_from' AND '$date_to'";
$resultscsales= mysql_query($sqlcsales) or die ("Error $sqlcsales.".mysql_error());

if (mysql_num_rows($resultscsales) > 0)
{
while ($rowscsales=mysql_fetch_object($resultscsales))
		{
		
		 $csales=$rowscsales->ttl_amount;
		//$sales=$ttl_sales+$rowssales->invoice_ttl;
		 $ccurr_rate=$rowscsales->curr_rate;
		 $ttl_csales_ksh=$ccurr_rate*$csales;
		
		$grnd_ttl_csales_ksh=$grnd_ttl_csales_ksh+$ttl_csales_ksh;
		
		}
		
number_format($grnd_ttl_csales_ksh,2);

}

number_format($grnd_ttl_sales_ksh=$grnd_ttl_crsales_ksh+$grnd_ttl_csales_ksh,2);
	
//sales returns 
$sqlsalesret="SELECT credit_notes.ttl_sales_return FROM credit_notes WHERE date_generated BETWEEN '$date_from' AND '$date_to'";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
if (mysql_num_rows($resultssalesret) > 0)
{
while ($rowssalesret=mysql_fetch_object($resultssalesret))
		{
		 $ttl_salesret=$ttl_salesret+$rowssalesret->ttl_sales_return;
		
		}
 number_format($ttl_salesret,2);

}


	
//Gross Sales
$gross_sale=$grnd_ttl_sales_ksh-$ttl_salesret;

//opening stock to be put here	

  $sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id and  received_stock.order_code='0' AND received_stock.date_received BETWEEN '$date_from' AND '$date_to' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  
 
 ?>
 



	
	<?php 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
	
	
	
	
	?>
	

	
	

<?php $bp=$rows->curr_bp;?>
<?php  number_format($curr_rate=$rows->exchange_rate,2);?>

<?php 
	
	
	
	
	
	number_format($ttl_cost=$rec_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	

  <?php 
  $grnt_amnt_ttl_cost=$grnt_amnt_ttl_cost+$ttl_cost;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  
<?php echo number_format($grnt_amnt_ttl_cost,2);?>
	
 
  
  
  <?php 
  
  
  }
  

	//purchases  

$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  purchases_ledger.transaction_id,purchases_ledger.transactions,purchases_ledger.amount,purchases_ledger.debit,purchases_ledger.credit,purchases_ledger.currency_code,purchases_ledger.curr_rate,purchases_ledger.date_recorded, currency.curr_name 
from purchases_ledger,currency where purchases_ledger.currency_code=currency.curr_id AND purchases_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by purchases_ledger.transaction_id desc";
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
	$ledger_bal_pur=$ledger_bal_pur+$amount_kshs; 
	
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  //echo number_format($grss_purc=$ledger_bal_pur,2);
  }
  
  else
  {
  
  
  }
  ?>





    
<?php 
	//Gross Purchases
	
	$grss_purc=$ledger_bal_pur;
	
	//number_format($grss_purc,2);
	

//Purchases Returns
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select purchases_returns_ledger.transaction_id,purchases_returns_ledger.transactions,purchases_returns_ledger.amount,purchases_returns_ledger.debit,purchases_returns_ledger.credit,purchases_returns_ledger.currency_code,purchases_returns_ledger.curr_rate,purchases_returns_ledger.date_recorded, currency.curr_name 
from purchases_returns_ledger,currency where purchases_returns_ledger.currency_code=currency.curr_id AND purchases_returns_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by purchases_returns_ledger.transaction_id desc";
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
	$ledger_bal_arxx=$ledger_bal_arxx+$amount_kshs; 

	
	?>

  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  	echo number_format($ttl_purret=$ledger_bal_arxx,2);
  }
  
  else
  {
  
  ?>
  
  
 
	
	<?
  
  }
	
	

//Total Cost of Sales




//

    
//good avallable for sales	
$goods_available_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret; 

//closing stock


  
$sql="select products.curr_bp,products.product_id,products.product_name,products.prod_code,products.exchange_rate,products.reorder_level,SUM(received_stock.quantity_rec) as ttl_quant,
products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date,received_stock.purchase_order_id,received_stock.order_code from products, received_stock 
where products.product_id=received_stock.product_id AND received_stock.date_received BETWEEN '$date_from' AND '$date_to' group by received_stock.product_id ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							 
 
 
 ?>
  
	
	<?php 	$rec_prod=$rows->ttl_quant;
	
    $prod_id=$rows->product_id;
	$purchase_order_id=$rows->purchase_order_id;
	
	$sqlsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.product_id='$prod_id' and date_generated BETWEEN '$date_from' AND '$date_to'";
	$resultssold= mysql_query($sqlsold) or die ("Error $sqlsold.".mysql_error());
	$rowsold=mysql_fetch_object($resultssold);
	
$sold_prod=$rowsold->ttl_sold_prod;
	
	
	
$sqlprodcashsold="select SUM(cash_sales.quantity) as ttl_cash_sold_prod from cash_sales where cash_sales.product_id='$prod_id' and date_generated BETWEEN '$date_from' AND '$date_to'";
$resultsprodcashsold= mysql_query($sqlprodcashsold) or die ("Error $sqlprodcashsold.".mysql_error());
$rowprodcashsold=mysql_fetch_object($resultsprodcashsold);


$prod_cash_sold=$rowprodcashsold->ttl_cash_sold_prod;
	
	
	
	
	?>
	

	<?php number_format($all_sold_prod=$sold_prod+$prod_cash_sold,0);?>
	
	<?php $avail_prod=$rec_prod-$all_sold_prod;//echo $rows->curr_bp;?>
	<?php $bp=$rows->curr_bp;?>
	<?php number_format($curr_rate=$rows->exchange_rate,2);?>

	<?php 
	
	
	
	
	
 number_format($ttl_cost=$avail_prod*$bp*$curr_rate,2);
	
	
	
	
	?>
	
	
	
	
	

	
	
  
	
	
  

  <?php 
  $grnt_amnt_ttl_ccost=$grnt_amnt_ttl_ccost+$ttl_cost;
 
  }
  ?>
 
	<?php echo number_format($grnt_amnt_ttl_ccost,2);?>


	
  
  
  
  <?php 
  
  
  }
  

  

  
  
 


 number_format($cost_of_sales=$goods_available_for_sale-$grnt_amnt_ttl_ccost,2);
     

	
	$gross_pl=$gross_sale-$cost_of_sales; 
	?>
	
<?php 
	if ($gross_pl>0)
	{
	
	//echo "Profit";
	}
	
	else
	{
	//echo "Loss";
	}
	


	
	
	
	
	
$gross_pl=$gross_sale-$cost_of_sales; 
number_format($gross_pl,2);
	

	//Add Other Incomes
	




$sqlinc="SELECT income.description,income.curr_id,income.amount,income.mop,income.date_of_transaction,income.curr_rate,currency.curr_name 
FROM income,currency where currency.curr_id=income.curr_id AND income.date_of_transaction BETWEEN '$date_from' AND '$date_to'";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { 
						
   $rowsinc->description;
    

	$amount=$rowsinc->amount;
	$curr_rate=$rowsinc->curr_rate;
	$inc_kshs=$curr_rate*$amount;
	number_format($inc_kshs,2);
	?>
    

							  
						<?php	
	$grnd_ttl_inc=$grnd_ttl_inc+$inc_kshs;						
		
 }

}


?>
 


<?php  number_format($grnd_ttl_inc,2); ?>
 <?php  number_format($grnd_ttl_inc,2); ?>
    



    
	
<?php 
	//Gross loss or profit plus incomes
	number_format($prof_inc=$gross_pl+$grnd_ttl_inc,2);
	
	//echo number_format($grnd_ttl,2); 
	
//Less Operating Expenses	
	?>
	
  
  <?php
  
  //General Expenses
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sqlge="select  salary_expenses_ledger.transaction_id,salary_expenses_ledger.transactions,salary_expenses_ledger.amount,salary_expenses_ledger.debit,salary_expenses_ledger.credit,salary_expenses_ledger.currency_code,salary_expenses_ledger.curr_rate,salary_expenses_ledger.date_recorded, currency.curr_name 
from salary_expenses_ledger,currency where salary_expenses_ledger.currency_code=currency.curr_id AND salary_expenses_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by salary_expenses_ledger.transaction_id desc";
$resultsge= mysql_query($sqlge) or die ("Error $sqlge.".mysql_error());





if (mysql_num_rows($resultsge) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsge=mysql_fetch_object($resultsge))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
 
 
 ?>
 
  

<?php
	$amountge=$rowsge->amount;
	
	if ($amountge>0)
	{
 $curr_name=$rowsge->curr_name.' '.number_format($amountge,2);
	}
	else	
	{
$curr_name=$rowsge->curr_name.' '.number_format($str2=substr($amountge,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?>
	<?php  number_format($curr_rate=$rowsge->curr_rate,2);?>
	
   
<?php
	$amount_in=$rowsge->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	 number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?>
	
<?php
	$amount_out=$rowsge->credit;
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
	
	$amount_kshs=$curr_rate*$amountge;
	$ledger_bal_exp=$ledger_bal_exp+$amount_kshs; 
	
	
	?>
   
    
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
 number_format($ledger_bal_exp,2);
  }
  
  else
  {
  
  ?>
  
  
  
	
	<?
  
  }
  ?>

	
	

	
  
  <?php 
 //Miscellinous Expenses
$sqlpetty="SELECT * from petty_cash_expense where date_recorded BETWEEN '$date_from' AND '$date_to'";
$resultspetty= mysql_query($sqlpetty) or die ("Error $sqlpetty.".mysql_error());


if (mysql_num_rows($resultspetty) > 0)
						  {
						
							  while ($rowspetty=mysql_fetch_object($resultspetty))
							  { 
							  
							 

 
 ?>
   


	<?php  number_format($amount_me=$rowspetty->amount,2);?>
	

  
 
  <?php 
  
  $gnd_amnt_me=$gnd_amnt_me+$amount_me;
  }
  
  
  ?>
  
    
<?php number_format($gnd_amnt_me,2); ?>


  
  <?php
  
  }
  
  
  ?>
  
  <?php 
 
$sqlinc="select fixed_assets.fixed_asset_id,fixed_assets.fixed_asset_name,fixed_assets.date_purchased,fixed_assets.currency,fixed_assets.curr_rate,
fixed_assets.value,fixed_assets.dep_value,fixed_assets.amount_paid,fixed_assets.date_recorded,currency.curr_name from fixed_assets,currency 
where fixed_assets.currency=currency.curr_id AND fixed_assets.date_recorded BETWEEN '$date_from' AND '$date_to' order by fixed_assets.fixed_asset_id desc";
$resultsinc= mysql_query($sqlinc) or die ("Error $sqlinc.".mysql_error());
if (mysql_num_rows($resultsinc) > 0)
{
 while ($rowsinc=mysql_fetch_object($resultsinc))
							  { ?>
							  
    
    
	
	<?php 
	
	$value=$rowsinc->value;
	$curr_rate=$rowsinc->curr_rate;
	$value_kshs=$value*$curr_rate;
	$dep_value=$rowsinc->dep_value;
	$dep_value_kshs=$dep_value*$curr_rate;
	$curr_date=date('Y-m-d');
$date_purchased=$rowsinc->date_purchased;

 $curr_date_string= strtotime ($curr_date);	
 $purchase_date_string= strtotime ($date_purchased);

 $period_sec=$curr_date_string-$purchase_date_string;

 $period_days= $period_sec/86400;
 
 $period_years= $period_days/365;
 
 $period_years_final=number_format( $period_years,3);
 
 $ttl_dep=$dep_value_kshs*$period_years_final;
 $grnd_depr=$grnd_depr+$ttl_dep;
 }
 
  $grnd_depr;
 
 }
 
 //Bad debts expenses
 $amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select bad_debts_ledger.transaction_id,bad_debts_ledger.transactions,bad_debts_ledger.amount,bad_debts_ledger.debit,bad_debts_ledger.credit,bad_debts_ledger.currency_code,bad_debts_ledger.curr_rate,bad_debts_ledger.date_recorded, currency.curr_name 
from bad_debts_ledger,currency where bad_debts_ledger.currency_code=currency.curr_id AND bad_debts_ledger.date_recorded BETWEEN '$date_from' AND '$date_to' order by bad_debts_ledger.transaction_id desc";
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
	$ledger_bal_bd=$ledger_bal_bd+$amount_kshs; 
	
	
	?>
   
 
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  //echo number_format($grss_purc=$ledger_bal_pur,2);
  }
  
  else
  {
  
  
  }
  

	//Gross loss or profit plus incomes
number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$grnd_depr+$ledger_bal_bd,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?>






	<?php 
	
	$net_pl=$prof_inc-$grnd_expense;
	
	if ($net_pl>0)
	{
	 //echo "Profit";
	}
	else
	{
	//echo "Loss";
	
	}
	?>
	
  <?php 
number_format($net_pl=$prof_inc-$grnd_expense,2);

number_format($net_loss=$grnd_expense-$prof_inc,2);


}




?>