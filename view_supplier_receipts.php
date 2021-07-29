<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>::List of All Purchase Order Receipts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<!--<tr bgcolor="#FFFFCC">
   
    
	
	<td colspan="2"><strong>Filter By: Client Name</strong><input type="text" name="c_name" size="20" /></td>
	<td><strong>Or By Date</strong></td>
						<td><strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /></td>
							<td align="right"><strong>To:</strong><input type="text" name="to" size="25" id="to" readonly="readonly" /></td>
		<td><input type="submit" name="generate" value="Generate"></td>
			<td></td>
				<td align="center"colspan="3"></td>
					
	
    </tr>-->
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Receipt Number</strong></td>
    <td width="350"><div align="center"><strong>Date Generated</strong></td>
	<td width="70"><div align="center"><strong>Supplier Name</strong></td>
	<td width="300"><div align="center"><strong>Amount(Other Currencies)</strong></td>
	<td width="300"><div align="center"><strong>Mode of Payment</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount(Kshs)</strong></td>
<!--<td width="300"><div align="center"><strong>Cash Received (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
     <td width="300" ><div align="center"><strong>Returns</strong></td>
<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select supplier_receipt.supplier_receipt_id,supplier_receipt.receipt_no,supplier_receipt.curr_rate,supplier_receipt.currency_code,supplier_receipt.date_generated,
supplier_receipt.amnt_rec,supplier_receipt.order_code,supplier_receipt.mop,supplier_receipt.cheque_no,supplier_receipt.supplier_id,currency.curr_name,suppliers.supplier_name,lpo.lpo_no from supplier_receipt,suppliers,currency,lpo
where supplier_receipt.supplier_id=suppliers.supplier_id AND supplier_receipt.currency_code=currency.curr_id AND supplier_receipt.order_code=lpo.order_code order by supplier_receipt.date_generated desc";
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

    <td><a href="supplier_receipt2.php?lpo_no=<?php echo $rows->lpo_no;?>&receipt_no=<?php echo $rows->receipt_no;?>&amnt_rec=<?php echo $rows->amnt_rec; ?>&mop=<?php echo $rows->mop;?>&supplier_id=<?php echo $rows->supplier_id;?>&curr_id=<?php echo $rows->currency_code; ?>&date_generated=<?php echo $rows->date_generated; ?>"><?php echo $rows->receipt_no;?></a></td>
    <td><?php echo $rows->date_generated;?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td align="right"><?php echo $rows->curr_name.' '.number_format($ttl_amount=$rows->amnt_rec,2);?></td>
	<td align="left"><?php 
$cheque_no=$rows->cheque_no;	
$mop=$rows->mop;
if ($mop=='Cheque')
{
echo 'Cheque (No:'.$cheque_no.')';
}
else
{
echo $mop;
}
	
	
	?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($cash_ttl_kshs=$curr_rate*$ttl_amount,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	<!--<td align="right"><strong><font color="#009900"><?php 
     
	  $ttl_cash_rec=$rows->cash_paid;
	  //echo $curr_rate.'-';
	  $cash_rec_kshs=$ttl_cash_rec*$curr_rate;
	  
	  echo number_format($cash_rec_kshs,2);
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	$ttl_amount;
	$ttl_cash_rec;
	$bal;
	
	
	$idd=$rows->invoice_id;
	
	//$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$ttl_amount-$ttl_cash_rec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);

	?></font></strong></td>-->
<!--	<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
if ($ttl_cash_rec==$bal)
{

echo "Cleared";


}

elseif ($ttl_cash_rec < $ttl_amount && $ttl_cash_rec=='')
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>
&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Receive Payment</a>

<?php

}

elseif ($ttl_cash_rec < $ttl_amount && $ttl_cash_rec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>
&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

<?php
}

elseif ($ttl_cash_rec==$ttl_amount)	
{?>

Fully Paid

<?php
}

else

{

}
	
	
	
	
	
	?></td>-->
	

	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
  $grnd_cash_ttl_kshs=$grnd_cash_ttl_kshs+$cash_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grnd_cash_ttl_kshs,2);
	
	
	?></font></strong></td>
	  <!--<td width="200"><div align="center"><strong>Clear Balance</strong></td>
	 <td width="200"><div align="center"><strong>Clear Balance</strong></td>
  <td width="200" ><div align="center"><strong>Record Sales Returns</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
    }
  );
  
  
  
  </script> -->
		
			

			
			
			
					
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