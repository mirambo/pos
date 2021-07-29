<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$cash_rec=$_GET['cash_rec'];
$mop=$_GET['mop'];
$client_id=$_GET['client_id'];
$salesreturn_code=$_GET['salesreturn_code'];
$credit_no=$_GET['credit_no'];

$year=date('Y');

/*$sqldate="SELECT * FROM temp_sales_returns";
$resultsdate=mysql_query($sqldate) or die ("Error: $sqldate.".mysql_error());
$rowsdate=mysql_fetch_object($resultsdate);

$date=$rowsdate->date_returned;
$id=$rows->sales_returns;*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Sheet</title>
<link rel="stylesheet" type="text/css" href="style.css" />

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
<table width="700" border="0" align="center" >
  <tr>
    <td colspan="3" rowspan="7"><img src="images/logolpo.png" /></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><font color="#000033" size="+2"><strong>
      <a href="pay_invoice.php"><div style="background-image:url(images/back.jpg); width:201px; height:32px;"></div></a>
    </strong></font></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!--Website: www.briskdiagnostics.com--> </td>
  </tr>
  <tr height="30">
    <td colspan="6"  align="center"><strong><br/><hr/><br/>Kigali Road, Jamia Plaza, 2nd Floor, P.O. BOX 71O89- 00622 Nairobi. <br/>Tel : +254 (0) 538004579 Cell : +254 702 358 399 / + 254 721 662 103. <br/>Email : info@briskdiagnostics.com. Website: www.briskdiagnostics.com <br/></strong></td>
  </tr>
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">BALANCE SHEET</span></td>
  </tr>
  
  
  <tr height="20">
    <td colspan="6"  align="center"><strong>For the year ending: <?php echo (Date("l F d, Y")); ?></strong></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong> <?php 
	echo $credit_no;
	
	?>
	
	</strong></td>
  </tr>
  
  
  
 
  
  
  <?php 
  
$querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>

  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="5%" colspan="4"><strong>Assets</strong></td>
    
	
    <td width="2%" colspan="4"><strong>Liabilities</strong></td>

	

    
	
	
  </tr>
  
  <tr>
    <td width="5%" colspan="4"><strong>Current Assets</strong></td>
    
	
    <td width="2%" colspan="4"><strong>Current Liabilities</strong></td>

	

    
	
	
  </tr>
  <tr height="30">
    <td width="10%" colspan="3">Cash</td>
    
	<td width="2%"><div align="right">
	 <?php 
 	 	 	 	 	
$sql="select  cash_ledger.transaction_id,cash_ledger.transactions,cash_ledger.debit,cash_ledger.credit,cash_ledger.currency_code,cash_ledger.curr_rate,cash_ledger.date_recorded, currency.curr_name 
from cash_ledger,currency where cash_ledger.currency_code=currency.curr_id order by cash_ledger.transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());





if (mysql_num_rows($results) > 0)
						  {
					
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  

 
 ?>
 
  

   
	<?php  number_format($curr_rate=$rows->curr_rate,2);?>
	
    <?php
	$amount_in=$rows->amount_in;
	if ($amount_in=='')
         {
		 
		 } 
else
{
number_format($amount_in,2);
}

	?>
	<?php
	if ($amount_in=='')
         {
		 
		 } 
else
{
	number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?>
	<?php
	$amount_out=$rows->amount_out;
	if ($amount_out=='')
         {
		 
		 } 
else
{
number_format($amount_out,2);
}
	
	

	?>
	<?php
	if ($amount_out=='')
         {
		 
		 } 
else
{
	number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	
	?>
   
    
  <?php 
  $grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  $grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
  }
  ?>
  <?php number_format($grnd_amount_in_kshs,2); ?>
	<?php number_format($grnd_amount_out_kshs,2); ?>
  

	
	<?php echo number_format($balance=$grnd_amount_in_kshs-$grnd_amount_out_kshs,2); ?>
	
  <?php 
  
  }?>
	
	</td>
    <td width="2%" >
	Accounts Payable
	</td>
	<td width="2%" colspan="3" align="right"><?php 
	$ttlap=0;
$sqlap="SELECT ttl_sales_return FROM credit_notes";
$resultsap= mysql_query($sqlap) or die ("Error $sqlap.".mysql_error());

if (mysql_num_rows($resultsap) > 0)
{

 while ($rowsap=mysql_fetch_object($resultsap))
							  {
							  
							  $ap=$rowsap->ttl_sales_return;
							  $ttlap=$ttlap+ $ap; 
							  }
							  
						echo number_format($ttlap,2);
						


}
	
	?>
	
	
	</td>

	
    
</tr> 
  
 <tr height="30">
    <td width="10%" colspan="3">Inventory/Stock</td>
    
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
    <td width="2%" >Salaries Payable</td>
	<td width="2%" colspan="4"><div align="right" ><?php 
$sqlsal="SELECT net_salary  FROM pay_slips";
$resultssal= mysql_query($sqlsal) or die ("Error $sqlsal.".mysql_error());
if (mysql_num_rows($resultssal) > 0)
{
while ($rowssal=mysql_fetch_object($resultssal))
		{
		 $ttl_sal=$ttl_sal+$rowssal->net_salary ;
		
		}
echo number_format($ttl_sal,2);

}
	
	?></div></td>
	
	
    
</tr>

<tr height="30">
    <td width="10%" colspan="3">Accounts Receivable</td>
    
	<td width="2%"><div align="right">

	<?php 
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
    <td width="2%" ><!--Bad Debts--></td>
<td width="2%" colspan="4"><div align="right" ><?php 
	//debts for over an year
/*$curr_date= date('Y-m-d');

$prev_date=date("Y-m-d", strtotime("- 365 day"));

$sqlbd="select inv_bal FROM invoices where date_generated BETWEEN '$prev_date' AND '$curr_date'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());
if (mysql_num_rows($resultsbd) > 0)
{
while ($rowsbd=mysql_fetch_object($resultsbd))
		{
		 $ttl_bd=$ttl_bd+$rowsbd->inv_bal;
		
		}
echo number_format($ttl_bd,2);

}
	*/
	?>
	
	
	</div></td>
	
    
</tr>




<!--<tr height="30">
    <td width="10%" colspan="3">Opening Stock</td>
    
	<td width="2%"><div align="center">XXXXXXXXXX</td>
    <td width="2%" colspan="2"></td>
    
</tr>-->
   
   

<tr height="30">
    <td width="10%" colspan="3"><strong>Total Current Asset</strong></td>
    
	<td width="2%"><div align="right"><strong>
	
	<?php echo number_format($ttl_curr_asset= $grnd_ttl_cash+$ttl_bank+$ttl_purret+$grnt_amnt,2);  ?>
	
	</strong>
	</td>
    <td width="2%"  ><strong>
Total Current Liabilities
</strong>	
</td>
<td width="2%" colspan="4"><div align="right" ><strong><?php 
echo number_format($ttl_curr_liab=$ttldiv+$ttl_bd+$ttl_sal+$ttlap,2);
						



	
	?></strong></div></td>
    
</tr>


<tr height="30">
    <td width="10%" colspan="4"><strong>Fixed Assets</strong></td>
    
	
    <td width="2%"  colspan="4"><strong>Long-Term Liabilities</strong></td>
	
	
    
</tr>

<tr height="30">
    <td width="10%" colspan="4" align="right">
<table width="100%" border="0">	

	<?php 

$sqlfa="SELECT * FROM fixed_assets";
$resultsfa=mysql_query($sqlfa) or die ("Error $sqlfa.".mysql_error());
if (mysql_num_rows($resultsfa) > 0)
{
 while ($rowsfa=mysql_fetch_object($resultsfa))
							  { ?>
	<tr><td>						  
  <span style="float:left;"> <?php echo $rowsfa->fixed_asset_name.'  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';?></span>
    </td>
	<td>
	<?php
	
	echo number_format($amountfa=$rowsfa->value).'<br/>';
	
	?>
	</td>
	</tr>						  
						<?php	
	$grnd_ttlfa=$grnd_ttlfa+$amountfa;						
		
 }
 
} ?>
	</table>
	</td>
	
	

    <td width="2%" valign="top">Loans</td>
    <td width="2%" colspan="4" valign="top"><div align="right" >
	 <?php 
 
$sql="SELECT * FROM loan_received order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							 

 
 ?>

    
    <?php 
	
$currency_code=$rows->currency_code;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
number_format($loan_amount=$rows->loan_amount,2);

	
	
	
 ?>
	<?php $curr_rate=$rows->curr_rate;?>
	<?php number_format($amnt_kshs=$curr_rate*$loan_amount,2);?>
	


	
  
  <?php 
  $grnt_amnt_kshs=$grnt_amnt_kshs+$amnt_kshs;
  }
  ?>
  
	<?php echo number_format($grnt_amnt_kshs,2); ?>

   
  
  <?php 
  
  }
  
  
  ?>

	
</div></td>
    
</tr>


<tr height="30">
    <td width="10%" colspan="3"><strong>Total Fixed Assets</strong></td>
    
	<td width="2%"><div align="right"><strong><?php echo number_format($grnd_ttlfa,2);  ?>

	</strong>
	
	</td>
    <td width="2%">Net Capital</td>
	<td width="2%" colspan="4"><div align="right" ><?php 
//total initial capital
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
							  
						//echo number_format($ttlcapt,2);
						


}
//other investments
number_format($ttl_inv,2);

//retained earnings
$ttlretearn=0;
$sqlretearn="SELECT dividend FROM ploughed_back_dividend";
$resultsretearn= mysql_query($sqlretearn) or die ("Error $sqlretearn.".mysql_error());

if (mysql_num_rows($resultsretearn) > 0)
{

 while ($rowsretearn=mysql_fetch_object($resultsretearn))
							  {
							  
							  $retearn=$rowsretearn->dividend;
							  $ttlretearn=$ttlretearn+ $retearn; 
							  }
							  
						//echo number_format($ttlretearn,2);
						


}
//total capital
$all_cap=$ttlcapt+$ttl_inv+$ttlretearn;
//dividends
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
							  
						//echo number_format($ttldiv,2);
						


}
//ttl withdrawals
$ttlwith=0;
$sqlwith="SELECT dividend FROM withdrawn_dividends";
$resultswith= mysql_query($sqlwith) or die ("Error $sqlwith.".mysql_error());

if (mysql_num_rows($resultswith) > 0)
{

 while ($rowswith=mysql_fetch_object($resultswith))
							  {
							  
							  $with=$rowswith->dividend;
							  $ttlwith=$ttlwith+ $with; 
							  }
							  
						//echo number_format($ttlwith,2);
						


}
//net capital
echo number_format($capbal=$all_cap-$ttlwith-$ttldiv,2);

	?></div></td>
    
</tr>
<tr height="30">
    <td width="10%" colspan="3"></td>
    
	<td width="2%"><div align="right">
	</td>
    <td width="2%" ><strong><!--Total Fixed Liabilities--></strong></td>
	
	<td width="2%" colspan="4" align="right"><strong> <?php 
	$ttl_fixed_liab=$ttlcapt+$ttlretearn+$net_profit;
	//echo number_format($ttl_fixed_liab,2);
	?></strong></td>
	
    
</tr>
<tr height="30">
    <td width="10%" colspan="3"><!--Current Liabilities (Bab Debts)--></td>
    
	<td width="2%"><div align="right"><?php 
	//debts for over an year
/*$curr_date= date('Y-m-d');

$prev_date=date("Y-m-d", strtotime("- 365 day"));

$sqlbd="select inv_bal FROM invoices where date_generated BETWEEN '$prev_date' AND '$curr_date'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());
if (mysql_num_rows($resultsbd) > 0)
{
while ($rowsbd=mysql_fetch_object($resultsbd))
		{
		 $ttl_bd=$ttl_bd+$rowsbd->inv_bal;
		
		}
echo number_format($ttl_bd,2);

}
	*/
	?>
	</td>
    <td width="2%"  align="right"><?php 
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
	<td width="2%" colspan="4"><div align="center"><strong></strong></div></td>
    
</tr>
<tr height="30">
    <td width="10%" colspan="3"><!--Current Liabilities (Bab Debts)--></td>
    
	<td width="2%"><div align="right"><?php 
	//debts for over an year
/*$curr_date= date('Y-m-d');

$prev_date=date("Y-m-d", strtotime("- 365 day"));

$sqlbd="select inv_bal FROM invoices where date_generated BETWEEN '$prev_date' AND '$curr_date'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());
if (mysql_num_rows($resultsbd) > 0)
{
while ($rowsbd=mysql_fetch_object($resultsbd))
		{
		 $ttl_bd=$ttl_bd+$rowsbd->inv_bal;
		
		}
echo number_format($ttl_bd,2);

}
	*/
	?>
	</td>
    <td width="2%"  align="right"><?php 
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
	<td width="2%" colspan="4"><div align="center"><strong></strong></div></td>
    
</tr>

<tr height="30">
    <td width="10%" colspan="3"><strong><font size="+1">Total Assets</font></strong></td>
    
	<td width="2%"><div align="right"><strong><font size="+1"><?php
// Totals on credit side	

$ttl_assets=$ttl_curr_asset+$grnd_ttlfa;
echo number_format($ttl_assets,2);
	
	?>
	</strong>
	</td>
    <td width="2%" ><strong><font size="+1">Total Liabilities and Owner's Equity </font></strong></td>
	<td width="2%" colspan="4"><strong><font size="+1"><?php
// Totals on credit side	

$ttl_liabs=$ttl_curr_liab+$capbal;
echo number_format($ttl_liabs,2);
	
	?>
	</font></strong></td>
    
</tr>



<tr height="30">
    <td width="10%" colspan="3"></td>
    
	<td width="2%"><div align="right"><?php 


// Totals on credit side
 $cr=$ttl_sales+$grnd_ttl;	
 $dr=$ttl_salesret+$ttl_purchases+$grnd_ttlexp+$asset+$grnd_ttl_cash+$ttl_bank+$ttl_bd+$ttldiv+$ttlap+$ttlcapt;




$suspence=$dr-$cr;
$drsuspence=$cr-$dr;
$crsuspence=$dr-$cr;


$crfinal=$cr+$crsuspence;
$drfinal=$dr+$drsuspence;



	
	?>
	</td>
    <td width="2%"  align="right"></td>
	<td width="2%" colspan="4"><div align="center"><strong></strong></div></td>
    
</tr>


<!--Grand Total-->
<?php 
if ($suspence>0)
{
?>
<tr height="30">
    <td width="10%" colspan="3">
	</td>
    
	<td width="2%" align="right"><strong><font size="+1"><?php
// Totals on credit side	

//echo number_format($dr,2);
	
	?>
	</strong></td>
    <td width="2%"  align="right"><strong><font size="+1"><?php 
	//echo number_format($crfinal,2);	
	?>
	
	</font></strong></td>
	<td width="2%" ><div align="center"><strong></strong></div></td>
	<td width="2%" ><div align="center"><strong></strong></div></td>
	<td width="2%" ><div align="center"><strong></strong></div></td>
    
</tr>
<?php 

}

else
{
?>
<tr height="30">
    <td width="10%" colspan="3">
	</td>
    
	<td width="2%" align="right"><strong><font size="+1"><?php
// Totals on credit side	

//echo number_format($drfinal,2);
	
	?>
	</strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php 
	//echo number_format($cr,2);	
	?>
	
	</font></strong></td>
    
</tr>
<?php 

}
?>

    <td colspan="8" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
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








</body>
</html>
