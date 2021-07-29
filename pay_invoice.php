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
		
		
		
	<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>::All Sales  Transactions Dashboard </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
<tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	

	<?php
	
if ($user_group_id!='15')
{
echo "<font color='#ff0000'><strong>Sorry!! You Not Allowed To Visit This Module!!</strong></font>";
}
else{
	
?>
	
	</td>
	
    </tr>
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
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
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" />
							<strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
				
					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Invoice Number</strong></td>
    <!--<td width="15%"><div align="center"><strong>Date Generated</strong></td>-->
	<td width="15%"><div align="center"><strong>Client Name</strong></td>
	<td width="10%"><div align="center"><strong>Amount Invoiced (Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
    <td width="300" ><div align="center"><strong>Returns</strong></td>
    <td width="100"><div align="center"><strong>Edit</strong></td>
    </tr>
  
  <?php
 if (!isset($_POST['generate']))
{
 
$sql="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,
currency.curr_name,clients.c_name from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and invoices.status='1' order by invoices.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,
invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,currency.curr_name,clients.c_name 
from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and 
invoices.status='1' and invoices.client_id='$client' order by invoices.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,
invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,currency.curr_name,clients.c_name 
from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and 
invoices.status='1' and invoices.date_generated BETWEEN '$date_from' AND '$date_to' order by invoices.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,
invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,currency.curr_name,clients.c_name 
from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and 
invoices.status='1' and invoices.date_generated BETWEEN '$date_from' AND '$date_to' and invoices.client_id='$client' order by invoices.invoice_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select invoices.invoice_id,invoices.user_id,invoices.invoice_no,invoices.client_id,invoices.currency_code,invoices.curr_rate,invoices.date_generated,invoices.invoice_ttl,invoices.inv_bal,invoices.sales_code,invoices.sales_rep,
currency.curr_name,clients.c_name from invoices,clients,currency where invoices.client_id=clients.client_id AND invoices.currency_code=currency.curr_id and invoices.status='1' order by invoices.invoice_id  desc";
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
	$invoice_no=$rows->invoice_no; 
	
	if ($invoice_no=='')
	{
	echo "<font size='-2'>Opening Balance</font>";
	}
	else
	{	
	?>
	<a href="invoice_transactions.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $sales_code=$rows->sales_code; ?>">
	<?php

	echo $rows->invoice_no;?></a>
	<?php 
	}
	?>
	
	</td>
    <!--<td align="center"><?php echo $rows->date_generated;?></td>-->
	<td><a href="client_statement.php?client_id=<?php echo $client_id=$rows->client_id; ?>"><?php echo $rows->c_name;?></a></td>
	<td ><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->invoice_ttl,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	<td align="right"><strong><font color="#009900"><?php 
      $sales_code_id=$rows->sales_code;
	  
	  if ($sales_code_id=='0')
	  {
	  /*$sqlrec="select SUM(client_opening_bal_payment.amount_received) as ttl_amnt_rec from 
	  client_opening_bal_payment where client_opening_bal_payment.client_id='$client_id'";*/
	  
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec,invoice_payments.curr_rate from 
	  invoice_payments where invoice_payments.client_id='$client_id' and invoice_payments.sales_code='0'";
	  }
	  else
	  {
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec,invoice_payments.curr_rate from 
	  invoice_payments where invoice_payments.sales_code='$sales_code_id' AND invoice_payments.client_id='$client_id'";
	  }
	  
      $resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	  
	  $rowsrec=mysql_fetch_object($resultsrec);
	  
	  $ttlrec=$rowsrec->ttl_amnt_rec;
	  $invpay_xrate=$rowsrec->curr_rate;
	  
	  //echo $curr_rate.'-';
	  $ttl_rec_kshs=$ttlrec*$curr_rate;
	  
	  echo number_format($ttl_rec_kshs,2);
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal_kshs=$inv_ttl_kshs-$ttl_rec_kshs;
	
	//echo $bal=$rows->inv_bal;
	
	//$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	
/*$sqlupdtbal="UPDATE invoices set inv_bal='$bal_kshs' where invoice_id='$idd'";
$resultsupdtbal= mysql_query($sqlupdtbal) or die ("Error $sqlupdtbal.".mysql_error());*/
	
	
	
	
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
	<td align="center"> <?php
if ($user_group_id!='15')	

{


}	
else
{	
	//$ttlrec $invoice_ttl 
	
if ($bal_kshs==0)
{

echo "Cleared";

/*$sqlpdt="update invoices set status='0' where sales_code='$sales_code'";
$resultspdt= mysql_query($sqlpdt) or die ("Error $sqlpdt.".mysql_error());*/

}

elseif ($ttlrec==0)
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&balance=<?php echo $bal_kshs; ?>" style="color:#000099; font-weight:bold;">Rec. Payment</a>

<?php

}

elseif ($ttlrec < $invoice_ttl && $ttlrec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal_kshs; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

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
	
	
	
	}
	
	?></td>

	
	<td align="center">
	
	<?php 
	
$sales_code=$rows->sales_code;
$sqlsalesret="SELECT * FROM credit_notes where sales_code='$sales_code'";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
$rowssalesret=mysql_num_rows($resultssalesret);

if ($rowssalesret>0)	
{

//echo "<i><font color='#ff0000'>returned</font></i>";

}

elseif ($bal_kshs==0)
{
echo "-";

}

if ($invoice_no=='')
{

}

else
{
if ($ttlrec==0 && $rowssalesret==0)
  {
  ?>
	<a href="sales_return.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $rows->sales_code;?>&truncate=1&amount_paid=<?php echo $ttl_rec_kshs; ?>">Returns</a></td>
	<?php 
	
	}
	
	}
	?>
  <td align="center">
  <?php 
  if ($ttlrec!=0)
  {
  ?>
  <a href="edit_receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $rows->sales_code; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>"><img src="images/edit.png"></a></td>
<?php 
}
?>
    </tr>
  <?php 
  
  $invoice_ttl_kshs=$rows->invoice_ttl;
  $grand_ttl_inv_kshs=$grand_ttl_inv_kshs+$inv_ttl_kshs;
  $grand_ttl_bal_kshs=$grand_ttl_bal_kshs+$bal_kshs;
  $grand_ttl_rec_kshs=$grand_ttl_rec_kshs+$ttl_rec_kshs;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	echo number_format($grand_ttl_inv_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	echo number_format($grand_ttl_rec_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grand_ttl_bal_kshs,2);
	
	
	?></font></strong></td>
    <td width="200" ><div align="center"></td>
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
   
    <td colspan="10" height="30" align="center"> 
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

<?php 
}

?>