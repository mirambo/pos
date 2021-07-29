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
<title>Trial Balance</title>
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
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">TRIAL BALANCE</span></td>
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
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>DR.</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>CR.</strong></div></td>
    
	
	
  </tr>
  
 <tr height="30">
    <td width="10%" colspan="3">Sales</td>
    
	<td width="2%"><div align="right">
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right"><?php 
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

<tr height="30">
    <td width="10%" colspan="3">Sales Returns (Credit Notes)</td>
    
	<td width="2%"><div align="right">
	
	<?php 
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
   
   <tr height="30">
    <td width="10%" colspan="3">Purchases</td>
    
	<td width="2%"><div align="right">
	
	<?php 
$sqlpur="SELECT order_code,product_id,quantity_rec FROM received_stock";
$resultspur= mysql_query($sqlpur) or die ("Error $sqlpur.".mysql_error());
if (mysql_num_rows($resultspur) > 0)
{
while ($rowspur=mysql_fetch_object($resultspur))
		{
		$order_code=$rowspur->order_code;
		$product_id=$rowspur->product_id;
		$quant_rec=$rowspur->quantity_rec;
		$sqlvp="SELECT purchase_order.vendor_prc,purchase_order.currency_code,currency.curr_name,currency.curr_rate FROM purchase_order,currency
		WHERE product_id='$product_id' and order_code='$order_code' and purchase_order.currency_code=currency.curr_name";
        $resultsvp= mysql_query($sqlvp) or die ("Error $sqlvp.".mysql_error());
		
		$rowsvp=mysql_fetch_object($resultsvp);
		
		$vendor_prc=$rowsvp->vendor_prc.',';
		
		$currncy=$rowsvp->currency_code.',';
		
		$curr_rate=$rowsvp->curr_rate.',';
		
	
		$purchases=$vendor_prc*$curr_rate*$quant_rec.',';
		 
		$quant_rec.'<br/>';
		
		 $ttl_purchases=$ttl_purchases+$purchases;
		
		}
echo number_format($ttl_purchases,2);

}
	
	?>
	
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>

<tr height="30">
    <td width="10%" colspan="3">Purchases Returns (Debit Note)</td>
    
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
    <td width="2%" colspan="2" align="right">
<?php 
XXX
/*$ttl_purret=0;
$sqlpurret="SELECT * FROM debit_notes";
$resultspurret= mysql_query($sqlpurret) or die ("Error $sqlpurret.".mysql_error());
if (mysql_num_rows($resultspurret) > 0)
{
while ($rowspurret=mysql_fetch_object($resultspurret))
		{
	$ttl_stock_ret=$rowspurret->ttl_stock_return;
	$currency=$rowspurret->currency;
	$order_code=$rowspurret->order_code;
	echo $ttl_stock_ret.' '.$currency.' '.$order_code.'<br/>';
	
		 //$ttl_purret=$ttl_purret+$ttl_stock_ret;
		
		}
//echo number_format($ttl_purret,2);

}*/
	
	?>
	
</td>
    
</tr>

<tr height="30">
    <td width="10%" colspan="3">Expenses</td>
    
	<td width="2%" align="right">
	<?php 

$sqlexp="SELECT expenses.description,expenses.curr_id,expenses.amount,expenses.mop,expenses.date_of_transaction,expenses.curr_rate,currency.curr_name 
FROM expenses,currency where currency.curr_id=expenses.curr_id";
$resultsexp=mysql_query($sqlexp) or die ("Error $sqlexp.".mysql_error());
if (mysql_num_rows($resultsexp) > 0)
{
 while ($rowsexp=mysql_fetch_object($resultsexp))
							  {
	$amountexp=$rowsexp->amount;
	$curr_rateexp=$rowsexp->curr_rate;
	$exp_kshs=$curr_rateexp*$amountexp;
	//echo number_format($exp_kshs,2);
	
	$grnd_ttlexp=$grnd_ttlexp+$exp_kshs;						
		
 }
echo number_format($grnd_ttlexp,2);
} ?>
	
	
	
	
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

<tr height="30">
    <td width="10%" colspan="3">Income</td>
    
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
<tr height="30">
    <td width="10%" colspan="3">Fixed Assets</td>
    
	<td width="2%"><div align="right">
	
	<?php
	$asset=59876785498766;

	echo number_format($asset,2); ?>
	
	
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

<tr height="30">
    <td width="10%" colspan="3">Current Asset (Cash)</td>
    
	<td width="2%"><div align="right">
	<?php 
	//cash sales payments
$sqlcash1="select cash_paid FROM cash_sales_payments";
$resultscash1= mysql_query($sqlcash1) or die ("Error $sqlcash1.".mysql_error());
if (mysql_num_rows($resultscash1) > 0)
{
while ($rowscash1=mysql_fetch_object($resultscash1))
		{
		 $ttl_cash1=$ttl_cash1+$rowscash1->cash_paid;
		
		}
//echo number_format($ttl_cash1,2);

}

//cash invoice payments

$sqlcash2="select amount_received FROM invoice_payments where mop='Cash'";
$resultscash2= mysql_query($sqlcash2) or die ("Error $sqlcash2.".mysql_error());
if (mysql_num_rows($resultscash2) > 0)
{
while ($rowscash2=mysql_fetch_object($resultscash2))
		{
		 $ttl_cash2=$ttl_cash2+$rowscash2->amount_received;
		
		}
//echo number_format($ttl_cash2,2);

}

$grnd_ttl_cash=$ttl_cash1+$ttl_cash2;

echo number_format($grnd_ttl_cash,2);


	
	?>
	
	
	
	
	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>
<tr height="30">
    <td width="10%" colspan="3">Current Asset (Bank)</td>
    
	<td width="2%"><div align="right"><?php 
	
$sqlbank="select amount_received FROM invoice_payments where mop='Cheque'";
$resultsbank= mysql_query($sqlbank) or die ("Error $sqlbank.".mysql_error());
if (mysql_num_rows($resultsbank) > 0)
{
while ($rowsbank=mysql_fetch_object($resultsbank))
		{
		 $ttl_bank=$ttl_bank+$rowsbank->amount_received;
		
		}
echo number_format($ttl_bank,2);

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
<tr height="30">
    <td width="10%" colspan="3">Current Liabilities (Bab Debts)</td>
    
	<td width="2%"><div align="right"><?php 
	//debts for over an year
$curr_date= date('Y-m-d');

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

<tr height="30">
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

<tr height="30">
    <td width="10%" colspan="3">Current Liabilities (Accounts Payable)</td>
    
	<td width="2%"><div align="right"><?php 
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
    <td width="2%" colspan="2" align="right"></td>
    
</tr>

<tr height="30">
    <td width="10%" colspan="3">Capital</td>
    
	<td width="2%"><div align="right"><?php 
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

// Totals on credit side
 $cr=$ttl_sales+$grnd_ttl;	
 $dr=$ttl_salesret+$ttl_purchases+$ttl_purret+$grnd_ttlexp+$asset+$grnd_ttl_cash+$ttl_bank+$ttl_bd+$ttldiv+$ttlap+$ttlcapt;




$suspence=$dr-$cr;
$drsuspence=$cr-$dr;
$crsuspence=$dr-$cr;


$crfinal=$cr+$crsuspence;
$drfinal=$dr+$drsuspence;



	
	?>
	</td>
    <td width="2%" colspan="2" align="right"></td>
    
</tr>
<?php 

if ($suspence>0)
{
?>

<tr height="30">
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

<tr height="30">
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
<tr height="30">
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
<tr height="30">
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
