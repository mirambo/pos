<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>::Accounts Receivable (List of Debtors)</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
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
   <tr style="background:url(images/description.gif);" height="30" >
   <td width="300"><div align="center"><strong>Client Name</strong></td>
    <td width="200"><div align="center"><strong>Invoice Number</strong></td>
	<td width="300"><div align="center"><strong>Date Generated</strong></td>
	<td width="200"><div align="center"><strong>Amount Invoiced (Kshs)</strong></td>    
	<td width="200"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
	<!--<td width="200"><div align="center"><strong>Clear Balance</strong></td>-->
    <!--<td width="200" ><div align="center"><strong>Record Sales Returns</strong></td>-->
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select invoices.invoice_id,invoices.invoice_no,invoices.date_generated,invoices.invoice_ttl,invoices.sales_code,invoices.sales_rep,
clients.c_name from invoices,clients where invoices.client_id=clients.client_id and invoices.inv_bal!='0' order by invoices.date_generated desc";
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
    <td><?php echo $rows->c_name;?></td>
    <td><a href="invoice_transactions.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $rows->sales_code; ?>"><?php echo $rows->invoice_no;?></a></td>
    <td><?php echo $rows->date_generated;?></td>
	
	<td align="right"><strong><?php echo number_format($rows->invoice_ttl,2);?></strong></td>
	<td align="right"><strong><font color="#009900"><?php 
      $sales_code_id=$rows->sales_code;
	  
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec from invoice_payments where invoice_payments.sales_code='$sales_code_id'";
      $resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	  
	  $rowsrec=mysql_fetch_object($resultsrec);
	  
	  $ttlrec=$rowsrec->ttl_amnt_rec;
	  
	  echo number_format($ttlrec,2);
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	echo number_format($bal,2);
	
//$sqlupdtbal="UPDATE invoices set inv_bal='$bal' where invoice_id='$idd'";
//$resultsupdtbal= mysql_query($sqlupdtbal) or die ("Error $sqlupdtbal.".mysql_error());
	
	
	
	
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
	

	
  
    </tr>
  <?php 
  $ttl_bal= $ttl_bal+$bal;
  }
  
  ?>
  <tr><td colspan="5" align="right"><strong><font size="+1">Total Accounts Receivable</font></strong></td><td align="right"><strong><font size="+1"><?php echo number_format($ttl_bal,2); ?></font></strong></td></tr>
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