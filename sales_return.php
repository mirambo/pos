<?php include('Connections/fundmaster.php'); 

$sales_code_id=$_GET['sales_code_id'];
$sales_return_code_id=$_GET['sales_return_code_id'];
$get_sales_code=$_GET['sales_code'];
$lat_code=$_GET['sales_return_code'];
$purchase_order_id=$_GET['purchase_order_id'];
$amount_paid=$_GET['amount_paid'];
$orig_quant=$_GET['orig_quant'];
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
		
		
		
		<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>::Record Sales Returns</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
		<div id="cont-left-half" class="br-5">
			
			
			
			
			
<!--<form name="sales_returns" action="processsalesret.php" method="post">-->				
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center"> 
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
$sqlorg="select sales_code.invoice_no,sales_code.client_id,clients.c_name,sales_returns_code.credit_note_no FROM clients,sales_code,sales_returns_code WHERE 
 sales_code.client_id=clients.client_id AND sales_returns_code.sales_code_id=sales_code.sales_code_id AND sales_code.sales_code_id='$sales_code_id'";
$resultsorg= mysql_query($sqlorg) or die ("Error $sqlorg.".mysql_error());
$rowsorg=mysql_fetch_object($resultsorg);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="9"><div align="center"><strong>Invoice Number</strong> :
    <?php echo $rowsorg->invoice_no; ?>
	<strong>Client Name:</strong> 
	<?php echo $c_name=$rowsorg->c_name; $client_id=$rowsorg->client_id;?>
	<strong>Credit Note No : </strong> 
	<?php echo $credit_note_no=$rowsorg->credit_note_no; ?>
	
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="400"><div align="center"><strong>Product Code</strong></td>
    <td width="600"><div align="center"><strong>Product Name</strong></td>
	<td width="300"><div align="center"><strong>Qnty Invoiced</strong></td>
	<td width="300"><div align="center"><strong>Qnty Returned</strong></td>
	<td width="300"><div align="center"><strong>Balance</strong></td>
	
	<!--<td width="400"><div align="center"><strong>Enter Return Qnty </strong></td>
	<td width="400"><div align="center"><strong>Why Return?</strong></td>-->

    </tr>
  
  <?php 
  
$sql="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id'  order by sales.sales_id asc";
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
    
    <td><?php echo $rows->prod_code;?><!--<input type="text" name="product_code[]" size="20" value="<?php echo $rows->product_code;?>"></td>-->
    <td><?php echo $rows->product_name;?><!--<input type="text" name="product_id[]" size="20" value="<?php echo $rows->product_id;?>">
										<input type="text" name="invoice_id[]" size="20" value="<?php echo $rows->invoice_id;?>">
										<input type="text" name="sales_code[]" size="20" value="<?php echo $rows->sales_code;?>">
										<input type="text" name="client_id[]" size="20" value="<?php echo $rows->client_id;?>">
										<input type="text" name="sales_rep[]" size="20" value="<?php echo $rows->sales_rep;?>">
										<input type="text" name="selling_price[]" size="20" value="<?php echo $rows->selling_price;?>">-->
	</td>
	<td align="center"><?php echo $orig_quant=$rows->quantity;?></td>
	<td align="center"><?php 
$prod_id=$rows->product_id;
	
$sqlsalesret="SELECT SUM(sales_return_quantity) AS ttl_ret,selling_price from sales_returns where product_id='$prod_id' AND sales_return_code_id='$sales_return_code_id'";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
$rowssalesret=mysql_fetch_object($resultssalesret);
echo $quant_ret=$rowssalesret->ttl_ret;
$selling_price=$rowssalesret->selling_price;
	
	
	
	?>
	
<input type="hidden" name="sales_return_quantity" size="20" value="<?php echo $quant_ret;?>">	
<input type="hidden" name="selling_price" size="20" value="<?php echo $selling_price;?>">	
<?php  $ttl_amnt=$selling_price*$quant_ret;?>
	</td>
	<td align="center"><?php 
	
echo $bal_quant=$orig_quant-$quant_ret;
	
	
	?></td>
	
	<!--<td align="center">
	
	<input type="text" name="qnty_sales_ret[]" size="20">
	</td>
	<td align="center"><input type="text" name="desc[]" size="20"></td>-->
	
  
    </tr>
  <?php 
$grnd_ttl=$grnd_ttl+$ttl_amnt;
  }
  ?>
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"> 
<?php 	
	if ($_GET['print']==1)
{


?>

<font color="#ff0000"><a href="credit_note.php?sales_return_code_id=<?php echo $sales_return_code_id; ?>&sales_code_id=<?php echo $sales_code_id; ?>">Export Credit Note to word</a></font>

<?php 
$grnd_ttl;

$transaction_descinv='Sales Return Credit Note No:'.$credit_note_no;	
$transaction_desc='Sales Return from '.$c_name.' Credit Note No: '.$credit_note_no;	

$sqlprof="select * from client_transactions where sales_code='salret$sales_return_code_id'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
$sqlupd="UPDATE client_transactions SET amount='-$grnd_ttl',transaction='$transaction_descinv' WHERE sales_code='salret$sales_return_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd= "UPDATE sales_return_ledger SET amount='$grnd_ttl',debit='$grnd_ttl',transactions='$transaction_desc',currency_code='6',curr_rate='1' WHERE sales_code='salret$sales_return_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

}
else
{
$sqltrans= "insert into client_transactions values('','$client_id','salret$sales_return_code_id','$transaction_descinv','-$grnd_ttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into sales_return_ledger values('','$transaction_desc','$grnd_ttl','$grnd_ttl','','6','1',NOW(),'salret$sales_return_code_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}




} ?>
	
	
	
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
			  
			  <div id="cont-right-half" class="br-5">
			  <form name="sales_returns" action="processsalesret.php" method="post">						
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
								  
$sql1="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id'  order by sales.sales_id asc";
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
    </tr>-->
	<tr height="30" >
    <td width="10%">
	

<input type="hidden" name="sales_return_code_id" size="20" value="<?php echo $sales_return_code_id;?>">
<input type="hidden" name="sales_code_id" size="20" value="<?php echo $sales_code_id;?>">





</td>
    <td>Quantity Returned<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_ret"></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Reason</td>
    <td><input type="text" name="reason" size="41" /></td>
    </tr>
<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Over-Payment / Under-Payment? <font color="#FF0000">*</font></td>
    <td>
	Over-Payment&nbsp;<input type="radio" size="41" name="bal_type"  value="1">&nbsp;&nbsp;
	Under-Payment<input type="radio" size="41" name="bal_type" checked="checked" value="0">&nbsp;&nbsp;
	Zero Balance<input type="radio" size="41" name="bal_type" checked="checked" value="x">
	
	
	</td>
    </tr>-->
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