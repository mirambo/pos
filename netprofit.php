<?php include('Connections/fundmaster.php'); ?>

	<?php 
$sqlsales="select invoice_ttl FROM invoices";
$resultssales= mysql_query($sqlsales) or die ("Error $sqlsales.".mysql_error());
if (mysql_num_rows($resultssales) > 0)
{
while ($rowssales=mysql_fetch_object($resultssales))
		{
		 $ttl_sales=$ttl_sales+$rowssales->invoice_ttl;
		
		}
 number_format($ttl_sales,2);

}
	
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
$gross_sale=$ttl_sales-$ttl_salesret;

	
	
	//purchases
	

	$grnd_lpo_amount_paid_kshs=0;
	$sqlpur="select lpo.lpo_no,lpo.date_generated,lpo.order_code,lpo.currency_code,lpo.lpo_amount,lpo.paid_amount,suppliers.supplier_name,suppliers.supplier_id,currency.curr_name,currency.curr_rate
from lpo,suppliers,currency where lpo.supplier_id=suppliers.supplier_id AND currency.curr_id=lpo.currency_code and lpo.status='1' order by lpo.lpo_id desc";
$resultspur= mysql_query($sqlpur) or die ("Error $sqlpur.".mysql_error());


if (mysql_num_rows($resultspur) > 0)
						  {
							  $RowCounter=0;
							  while ($rowspur=mysql_fetch_object($resultspur))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)

 
 $order_id=$rowspur->order_code;

 $rows->curr_name.' '.number_format($lpo_amount=$rowspur->lpo_amount,2);
	

	
number_format($curr_rate=$rowspur->curr_rate,2);

	

number_format($cost_kshs=$curr_rate*$lpo_amount,2);

	$lpo_amount_paid=$rowspur->paid_amount;
	$lpo_amount_paid_kshs=$curr_rate*$lpo_amount_paid;
	
number_format($lpo_amount_paid_kshs,2);


	$lpo_balance=$lpo_amount-$lpo_amount_paid;
	
number_format($stock_bal=$cost_kshs-$lpo_amount_paid_kshs,2);


$grnt_cost_kshs=$grnt_cost_kshs+$cost_kshs; 
$grnd_lpo_amount_paid_kshs=$grnd_lpo_amount_paid_kshs+$lpo_amount_paid_kshs;
$grnd_stock_bal=$grnd_stock_bal+$stock_bal;
  
  }



number_format($grnd_lpo_amount_paid_kshs,2);

  
  }
  

// Carriage Inwards 
$sqlci="SELECT stock_payments.lpo_no,stock_payments.freight_charges,stock_payments.exchange_rate,stock_payments.mop,stock_payments.date_paid,suppliers.supplier_name,currency.curr_name
FROM stock_payments,suppliers,currency WHERE stock_payments.supplier_id=suppliers.supplier_id AND stock_payments.currency=currency.curr_id";
$resultsci= mysql_query($sqlci) or die ("Error $sqlci.".mysql_error());
if (mysql_num_rows($resultsci) > 0)
{
while ($rowsci=mysql_fetch_object($resultsci))
		{
		  $f_charge=$rowsci->freight_charges;
		  $x_rate=$rowsci->exchange_rate;
		 
		  $ci=$f_charge*$x_rate;
		 
		 $ttl_ci=$ttl_ci+$ci;
		  //echo  $ttl_ci.',<br/>';
		
		}
number_format($ttl_ci,2);

}
	
	?>
	
	
	<?php 
	//Gross Purchases
	
	$grss_purc=$grnd_lpo_amount_paid_kshs+$ttl_ci;
	
 number_format($grss_purc,2)
	?>
    <?php 
	
	//echo number_format($grss_purc,2)
	?>
    
<?php 

//Purchases Returns
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
	
	
	
	
number_format($ttl_purret,2);

}
	
	




//Total Cost of Sales
    
	
$cost_of_sales=$grss_purc-$ttl_purret; 
 number_format($cost_of_sales,2); ?>
    

	<?php 
	
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
	//Gross loss or profit plus incomes
number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?>





Net
	<?php 
	
	$net_pl=$prof_inc-$grnd_expense;
	
	if ($net_pl>0)
	{
	 echo "Profit";
	}
	else
	{
	echo "Loss";
	
	}
	?>
	
	
	
	
	
	
    
	
  <?php 
	echo number_format($net_pl=$prof_inc-$grnd_expense,2);

/*$sqlred="SELECT * from 	net_profit where amount='$net_pl'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$rowsred=mysql_fetch_object($resultsred);
$net_profit_id=$rowsred->net_profit_id;
$rowsred=mysql_num_rows($resultsred);
if ($rowsred>0)
{
$sqlnetp= "update net_profit set amount='$net_pl' where net_profit_id='$net_profit_id'";
$resultsnetp= mysql_query($sqlnetp) or die ("Error $sqlnetp.".mysql_error());

} 

else
{
$sql3="INSERT INTO net_profit VALUES('','$net_pl',NOW())";
$results3= mysql_query($sql3) or die ("Error $sql3.".mysql_error());


}*/
	?>
    
  
 
  
  
  
 
  
