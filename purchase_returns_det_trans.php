<?php include('Connections/fundmaster.php'); 

$get_inv_id=$_GET['invoice_id'];
$order_code=$_GET['order_code'];
$lat_code=$_GET['sales_return_code'];
$purchase_order_id=$_GET['purchase_order_id'];
$amount_paid=$_GET['amount_paid'];
$orig_quant=$_GET['orig_quant'];
$supplier_id=$_GET['supplier_id'];
$purchase_return_code=$_GET['purchase_return_code'];
$currency=$_GET['currency'];
$date_generated=$_GET['date_generated'];




if ($_GET['truncate']==1)
{

$sqltrunc = "TRUNCATE TABLE temp_sales_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to print credit note?");
}


</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/stock_return_submenu.php');  ?>
		
		<h3>::View Purchases Return Transactions</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
		<div id="cont-left-full" class="br-5">
			
			
			
			
			
<!--<form name="sales_returns" action="processsalesret.php" method="post">-->				
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

if ($_GET['existggg']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";
?>
	
	</td>
	
	
    </tr>
	<?php 
$sqlorg="select invoices.invoice_id,invoices.invoice_no,invoices.date_generated,invoices.invoice_ttl,invoices.sales_code,
invoices.sales_rep,clients.c_name,invoices.client_id from invoices,clients where invoices.client_id=clients.client_id and 
invoices.invoice_id='$get_inv_id'";
$resultsorg= mysql_query($sqlorg) or die ("Error $sqlorg.".mysql_error());
$rowsorg=mysql_fetch_object($resultsorg);


$querysup="select * from suppliers where supplier_id ='$supplier_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="7" ><div align="center"><strong>Credit Note Number</strong> :
    <?php echo $debit_note=$_GET['debit_note']; ?>
<strong> Client Name:</strong> 
	<?php echo $rowssupp->supplier_name;?>
	<!--<strong>Amount Invoiced : </strong> 
	<?php echo number_format($rowsorg->invoice_ttl,2); ?>-->
	<td align="center" width="13%"><font color="#ff0000">
	<a href="debit_note2.php?purchase_return_code=<?php echo $purchase_return_code; ?>&order_code=<?php echo $order_code; ?>
	&debit_note=<?php echo $debit_note; ?>&supplier_id=<?php echo $supplier_id; ?>&currency=<?php echo $currency; ?>&date_generated=<?php echo $date_generated; ?>">Export Debit Note to word</a></font></td>
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="400"><div align="center"><strong>Product Code</strong></td>
    <td width="600"><div align="center"><strong>Product Name</strong></td>
	<td width="300"><div align="center"><strong>Qnty Returned</strong></td>
	<td width="300"><div align="center"><strong>BP (Mixed Curr)</strong></td>
	<td width="300"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>BP(Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Reason</strong></td>
	<td width="300"><div align="center"><strong>Total Amount (Kshs)</strong></td>

    </tr>
  
  <?php 
  
$sql="SELECT stock_returns.product_code,stock_returns.stock_return_quantity,stock_returns.vendor_price,
stock_returns.reason,stock_returns.curr_rate,products.product_name,products.pack_size from products,stock_returns where 
stock_returns.product_id=products.product_id and stock_returns.order_code='$order_code'";
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
    
    <td><?php echo $rows->product_code;?><!--<input type="text" name="product_code[]" size="20" value="<?php echo $rows->product_code;?>"></td>-->
    <td><?php echo $rows->product_name;?><!--<input type="text" name="product_id[]" size="20" value="<?php echo $rows->product_id;?>">
										<input type="text" name="invoice_id[]" size="20" value="<?php echo $rows->invoice_id;?>">
										<input type="text" name="sales_code[]" size="20" value="<?php echo $rows->sales_code;?>">
										<input type="text" name="client_id[]" size="20" value="<?php echo $rows->client_id;?>">
										<input type="text" name="sales_rep[]" size="20" value="<?php echo $rows->sales_rep;?>">
										<input type="text" name="selling_price[]" size="20" value="<?php echo $rows->selling_price;?>">-->
	</td>
	<td align="center"><?php echo $quant_ret=$rows->stock_return_quantity;?></td>
	<td align="right"><?php echo number_format($vendor_prc=$rows->vendor_price,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
	<td align="right"><?php 
	
	$bp_kshs=$vendor_prc*$curr_rate;
	
	echo number_format($bp_kshs,2);	
	
	
	?></td>
	
	
	<td align="center"><?php echo $rows->reason;?></td>
		<td align="right"><?php 
		
		$ttl_ret=$bp_kshs*$quant_ret;
	
echo number_format($ttl_ret,2);
	
	
	?></td>
	
	<!--<td align="center">
	
	<input type="text" name="qnty_sales_ret[]" size="20">
	</td>
	<td align="center"><input type="text" name="desc[]" size="20"></td>-->
	
  
    </tr>
  <?php 
  $grnd_ret_amnt=$grnd_ret_amnt+$ttl_ret;
  }
  ?>
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="7" height="30" align="center"> <strong>Totals</strong>

	
	
	
	</td>
	
	<td align="right"><strong>
	<?php echo number_format($grnd_ret_amnt,2);?>
	
	
	</td>
	
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
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
	 <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save and Print Credit Note">&nbsp;&nbsp;</td>
   
  </tr>-->
</table>
		
	<!--</form>	-->	

			
			
			
					
			  </div>
			  
			  <!--<div id="cont-right-half" class="br-5">
			  <form name="sales_returns" action="processsalesret.php?amount_paid=<?php echo $amount_paid;?>&orig_quant=<?php echo $orig_quant; ?>" method="post">						
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><strong><font color="#ff0000">Panel for Recording Sales Returns</strong></td>
    </tr>
<tr bgcolor="#FFFFCC">   
<td colspan="4" height="30" align="center"><?php
if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sales returns saved successfully</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Returned cannot be more than sold!!</font></p>";
?>
</td>
    </tr>
  
 
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="30%">Select Product<font color="#FF0000">*</font></td>
    <td>
	<select name="prod"><option>-------------------Select-----------------</option>
								  <?php
								  
$sql1="SELECT sales.sales_id,sales.sales_code,sales.product_id,sales.product_code,sales.quantity,
sales.selling_price,products.product_name,products.pack_size FROM sales,products where sales.product_id=products.product_id and 
sales.sales_code='$get_sales_code'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->product_id; ?>"><?php echo $rows1->product_name.' ('.$rows1->pack_size.')'; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>	</td>
    </tr>
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address</td>
    <td><input type="text" size="41" name="email" value="<?php echo $email;?>"></td>
    </tr>
	<tr height="30" >
    <td width="10%">
	
<input type="hidden" name="invoice_id" size="20" value="<?php echo $rowsorg->invoice_id;?>">
<input type="hidden" name="sales_code" size="20" value="<?php echo $rowsorg->sales_code;?>">
<input type="hidden" name="client_id" size="20" value="<?php echo $rowsorg->client_id;?>">
<input type="hidden" name="sales_rep" size="20" value="<?php echo $rowsorg->sales_rep;?>">


<!--<input type="text" name="selling_price" size="20" value="<?php echo $rows1->selling_price;?>">
<input type="text" name="product_code" size="20" value="<?php echo $rows1->product_code;?>">
<input type="text" name="product_id" size="20" value="<?php echo $rows1->product_id;?>">



</td>
    <td>Quantity Returned<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_ret"></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Reason</td>
    <td><input type="text" name="reason" size="41" /></td>
    </tr>
<tr height="20">
    <td>&nbsp;</td>
    <td>Over-Payment / Under-Payment? <font color="#FF0000">*</font></td>
    <td>
	Over-Payment&nbsp;<input type="radio" size="41" name="bal_type"  value="1">&nbsp;&nbsp;
	Under-Payment<input type="radio" size="41" name="bal_type" checked="checked" value="0">&nbsp;&nbsp;
	Zero Balance<input type="radio" size="41" name="bal_type" checked="checked" value="x">
	
	
	</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='sales_returns_errorloc' class='error_strings'></div></td>
   
    </tr>
 
</table>
</form>	

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("sales_returns");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("prod","dontselect=0",">>Please select the product");
  frmvalidator.addValidation("qnty_ret","req",">>Please enter quantity returned");


 
 
  </SCRIPT>
	
	
	
	
	
	
			  
			  </div>-->
				
				
			
			
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