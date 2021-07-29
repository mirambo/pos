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

function confirmCancel()
{
    return confirm("Are you sure you want to cancel this invoice?");
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
		
		
		
	<?php require_once('includes/invoice_payment_submenu.php');  ?>
		
		<h3>::List of All invoice_payments Payments Recorded</h3>
         
				
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

if ($_GET['cancelconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Invoice Cancelled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Invoice : By Client Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="12%"><div align="center"><strong>Date Received</strong></td>
	<td width="17%"><div align="center"><strong>Supplier Name</strong></td>	
	<td width="350"><div align="center"><strong>Amount Received <br/>(Other Currencies)</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Received (Kshs)</strong></td>
	 <td width="300" ><div align="center"><strong>Mop</strong></td>
	 <td width="300" ><div align="center"><strong>Client Bank Account</strong></td>
	  <td width="300"><div align="center"><strong>Bank Transfered To</strong></td>
   <td width="100"><div align="center"><strong>Edit</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
<?php
if (!isset($_POST['generate']))
{
if ($user_group_id!='15')
{ 
$sql="select clients.c_name,invoice_payments.amount_received,invoice_payments.invoice_payment_id,invoice_payments.mop,invoice_payments.cheque_no,invoice_payments.ref_no,invoice_payments.client_bank,
invoice_payments.our_bank,invoice_payments.date_drawn,invoice_payments.date_received,invoice_payments.status,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received invoice_payments FROM clients,currency where invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id and invoice_payments.status='1'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
} 
else
{
$sql="select clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,invoice_payments.mop,invoice_payments.cheque_no,invoice_payments.ref_no,invoice_payments.client_bank,
invoice_payments.our_bank,invoice_payments.date_drawn,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,invoice_payments,currency where 
invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id ORDER BY invoice_payments.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select invoice_payments.invoice_id,invoice_payments.user_id,invoice_payments.invoice_no,invoice_payments.client_id,invoice_payments.currency_code,invoice_payments.curr_rate,
invoice_payments.date_generated,invoice_payments.invoice_ttl,invoice_payments.inv_bal,invoice_payments.sales_code,invoice_payments.sales_rep,currency.curr_name,clients.c_name 
from invoice_payments,clients,currency where invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id and 
invoice_payments.status='1' and invoice_payments.client_id='$client' order by invoice_payments.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select invoice_payments.invoice_id,invoice_payments.user_id,invoice_payments.invoice_no,invoice_payments.client_id,invoice_payments.currency_code,invoice_payments.curr_rate,
invoice_payments.date_generated,invoice_payments.invoice_ttl,invoice_payments.inv_bal,invoice_payments.sales_code,invoice_payments.sales_rep,currency.curr_name,clients.c_name 
from invoice_payments,clients,currency where invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id and 
invoice_payments.status='1' and invoice_payments.date_generated BETWEEN '$date_from' AND '$date_to' order by invoice_payments.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select invoice_payments.invoice_id,invoice_payments.user_id,invoice_payments.invoice_no,invoice_payments.client_id,invoice_payments.currency_code,invoice_payments.curr_rate,
invoice_payments.date_generated,invoice_payments.invoice_ttl,invoice_payments.inv_bal,invoice_payments.sales_code,invoice_payments.sales_rep,currency.curr_name,clients.c_name 
from invoice_payments,clients,currency where invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id and 
invoice_payments.status='1' and invoice_payments.date_generated BETWEEN '$date_from' AND '$date_to' and invoice_payments.client_id='$client' order by invoice_payments.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select invoice_payments.invoice_id,invoice_payments.user_id,invoice_payments.invoice_no,invoice_payments.client_id,invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.date_generated,invoice_payments.invoice_ttl,invoice_payments.inv_bal,invoice_payments.sales_code,invoice_payments.sales_rep,
currency.curr_name,clients.c_name from invoice_payments,clients,currency where invoice_payments.client_id=clients.client_id AND invoice_payments.currency_code=currency.curr_id and invoice_payments.status='1' order by invoice_payments.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}




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
  
    <td>
<?php 
echo $date_received=$rows->date_received; 
	
	?>
	</td>
	<td><?php echo $rows->c_name;?></td>
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td><?php 
	 
	echo $mop=$rows->mop;
	
	if ($mop=='Cash')
	{
	
	}
	elseif ($mop=='Electronic ')
	 {
	echo '(Ref.No:'.$rows->ref_no.')';
	}
	
	elseif ($mop=='Cheque')
	 {
	echo '( Cheque No:'.$rows->cheque_no.')';
	}
	 
	 ?></td>
	 <!--<td align="right"><strong><font color="#009900"><?php 
      
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	

	
	
	
	
//$poi=$rows->purchase_order_id;	

//echo $poi;

 
//$sqlrec="select SUM(received_stock.quantity_rec) as ttlrec from received_stock where received_stock.purchase_order_id='$poi'";
//$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

//rowsrec=mysql_fetch_object($resultsrec);

//$ttlrec=$rowsrec->ttlrec;
//if ($ttlrec=='')
//{ ?>
<!--<p align="center">-</p>-->
<?php //}

//else
//{
 //echo $ttlrec;
//}



//$order_quant=$rows->quantity;

//$rec_quant=$rowsrec->ttlrec;

//if ($order_quant==$rec_quant)
//{
//$sqlupdt="UPDATE purchase_order set status='0' where purchase_order.purchase_order_id='$poi'";
//$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());
//}

//else 
//{


//}





	?></font></strong></td>
	 <!--<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
	if ($ttlrec==$bal)
{

echo "Cleared";


}

elseif ($ttlrec < $invoice_ttl && $ttlrec=='')
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Receive Payment</a>

<?php

}

elseif ($ttlrec < $invoice_ttl && $ttlrec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

<?php
}

elseif ($ttlrec==$invoice_ttl)	
{?>

Fully Paid

<?php
}

else

{

}
	
	
	
	
	
	?></td>-->
	
	
	
	<td align="center">
	<?php 
	echo $rows->client_bank;

	?>
	
	</td>
	
	<td>
	
	
<?php 	
$bank_id=$rows->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		
	if ($bank_id==0)
{
echo "-";
}
else
{
		
	echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
	}
	
	
	?>
	
	</td>
	
	<td align="center"><a href="edit_invoice_payment.php?invoice_payment_id=<?php echo $rows->invoice_payment_id; ?>&receipt_no=<?php echo $rows->receipt_no; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_income.php?income_id=<?php echo $rows->income_id;?>&income_desc=<?php echo $rows->description;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
   <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
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
<script type="text/javascript">
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
  
  
  
  </script> 
		
			

			
			
			
					
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