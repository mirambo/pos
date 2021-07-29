<?php include('Connections/fundmaster.php'); 

$order_code=$_GET['order_code'];
$lpo_no=$_GET['lpo_no'];
$supplier_id=$_GET['supplier_id'];
$qnty_ordered=$_GET['qnty_ordered'];
$currency=$_GET['currency_code'];
$lat_code=$_GET['stock_return_code'];
$amount_paid=$_GET['amount_paid'];
$product_id=$_GET['product_id'];


$sqlupd="select * from stock_returns where product_id='$product_id' and order_code='$order_code' order by stock_returns_id desc limit 1";
$resultsupd= mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());
$rowsupd=mysql_fetch_object($resultsupd);
$qnty_ret=$rowsupd->stock_return_quantity;
$stock_returns_code=$rowsupd->stockreturn_code;
$stock_returns_id=$rowsupd->stock_returns_id;

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
		
		
		
		<?php //require_once('includes/stocksubmenu.php');  ?>
		<?php require_once('includes/warehousesubmenu.php'); ?>
		
		<h3>::Return Stock to the Supplier</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-half" class="br-5">
				
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center"> 
	
	
	</td>
	
	
    </tr>
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="9"><div align="center"><strong>LPO Number</strong> :
    <?php echo $lpo_no;?>
	<strong>Supplier Name:</strong> 
	<?php echo $rows->supplier_name;?>
	<strong>Total Stock Ordered: </strong> 
	<?php echo $qnty_ordered.' Items'; ?>
	
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="10%"><div align="center"><strong>Product Code</strong></td>
    <td width="30%"><div align="center"><strong>Product Name</strong></td>
	<td width="10%"><div align="center"><strong>Quantity Ordered</strong></td>	
	<td width="10%"><div align="center"><strong>Quantity Returned</strong></td>
	<td width="10%"><div align="center"><strong>Balance</strong></td>
	<td width="5%"><div align="center"><strong>Edit</strong></td>
	

    </tr>
  
  <?php 
  
$sql="select products.product_name,products.pack_size,purchase_order.vendor_prc,purchase_order.quantity,purchase_order.currency_code,
purchase_order.product_id,purchase_order.purchase_order_id,purchase_order.product_code,purchase_order.status,purchase_order.order_code,purchase_order.supplier_id from products
,purchase_order where purchase_order.product_id=products.product_id and purchase_order.order_code='$order_code'";
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
    
    <td><?php echo $rows->product_code;?><input type="hidden" name="product_code[]" size="20" value="<?php echo $rows->product_code;?>"></td>
    <td><?php echo $rows->product_name.' ('.$rows->pack_size.')';?><input type="hidden" name="product_id[]" size="20" value="<?php echo $rows->product_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="vendor_price[]" size="20" value="<?php echo $rows->vendor_prc;?>">
										<input type="hidden" name="currency[]" size="20" value="<?php echo $rows->currency_code;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $orig_quant=$rows->quantity;?></td>
	
	<td align="center">
	<?php 
$prod_id=$rows->product_id;
	
$sqlsalesret="SELECT SUM(stock_return_quantity) as ttl_ret_quant from stock_returns where product_id='$prod_id' and order_code='$order_code'";
$resultssalesret= mysql_query($sqlsalesret) or die ("Error $sqlsalesret.".mysql_error());
$rowssalesret=mysql_fetch_object($resultssalesret);
echo $quant_ret=$rowssalesret->ttl_ret_quant;
	
	
	
	?>
	
	
	</td>
	<td align="center"><?php
	echo $bal_quant=$orig_quant-$quant_ret;
	?>
	
	</td>
	
	<td align="center"><a href="edit_return_stock.php?lpo_no=<?php echo $lpo_no; ?>&supplier_id=<?php echo $rows->supplier_id; ?>&order_code=<?php echo $rows->order_code; ?>&product_id=<?php echo $rows->product_id; ?>&qnty_ordered=<?php echo $quant_ordered; ?>&purchase_order_id=<?php  echo $rows->purchase_order_id;?>&stock_returns_id=<?php echo $stock_returns_id;?>&stock_return_code=<?php echo $stock_returns_code;?>"><img src="images/edit.png"></a>
  
    </tr>
	
  <?php 
  
  }
  ?>
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"> 


<font color="#ff0000"><a href="pre_debit_note.php?stock_return_code=<?php echo $stock_returns_code; ?>&amount_paid=<?php echo $amount_paid; ?>">Export Debit Note to word</a></font>


	
	
	
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
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
	 <td>&nbsp;</td>
    <td align="center"><!--<input type="submit" name="submit" value="Save and Export Debit Note Excell">&nbsp;&nbsp;--></td>
   
  </tr>
</table>
		
	</form>	



			
			
			
					
			  </div>
			  
			  <div id="cont-right-half" class="br-5">
			  
			<form name="sales_returns" action="processedit_stock_return.php?lpo_no=<?php echo $lpo_no; ?>&qnty_orderedbck=<?php echo $qnty_ordered; ?>&purchase_order_id=<?php echo $purchase_order_id;?>&stock_returns_id=<?php echo $rowsupd->stock_returns_id; ?>&product_id=<?php echo $product_id;?>"" method="post">				
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><strong><font color="#ff0000">Panel for Recording Purchases Returns</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Purchase Return Updated successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Returned cannot be more than ordered!!</font></p>";
?>
</td>
    </tr>
  
 
	<tr height="30">
    <td>
	
	
	
	
	</td>
    <td  width="30%">Select Product<font color="#FF0000">*</font></td>
    <td>
	<select name="prod">
	<?php 
	$querycat="select * from products where product_id='$product_id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	?>

	<option value=<?php $rowscat->product_id ?>><?php echo $rowscat->product_name.' ('.$rowscat->pack_size.')'; ?></option>
	</select>	
								  
								 	</td>
    </tr>
	
	<tr height="30" >
    <td width="10%">
	

	
<input type="hidden" name="lpo_no" size="20" value="<?php echo $lpo_no;?>">
<input type="hidden" name="qnty_ordered" size="20" value="<?php echo $qnty_ordered;?>">									
<input type="hidden" name="order_code" size="20" value="<?php echo $order_code; ?>">
<input type="hidden" name="supplier_id" size="20" value="<?php echo $supplier_id;?>">







</td>
    <td>Quantity Returned<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_ret" value="<?php echo $qnty_ret=$rowsupd->stock_return_quantity;?>"></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Reason</td>
    <td><input type="text" name="reason" size="41" value="<?php echo $qnty_ret=$rowsupd->reason;?>" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='sales_returns_errorloc' class='error_strings'></div></td>
   
    </tr>
 
</table>
</form>	

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("sales_returns");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("prod","dontselect=0",">>Please select the product");
  frmvalidator.addValidation("qnty_ret","req",">>Please enter quantity returned");


 
 
  </SCRIPT>-->
			  
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