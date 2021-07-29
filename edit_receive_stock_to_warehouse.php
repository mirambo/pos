<?php include('Connections/fundmaster.php'); 

$order_code=$_GET['order_code'];
$lpo_no=$_GET['lpo_no'];
$supplier_id=$_GET['supplier_id'];
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];
$product_id=$_GET['product_id'];



$sqlupd="select * from received_stock where product_id='$product_id' and order_code='$order_code' order by received_stock_id desc limit 1";
$resultsupd= mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());
$rowsupd=mysql_fetch_object($resultsupd);
$qnty_rec=$rowsupd->quantity_rec;
//$qnty_rec=$rowsupd->quantity_rec;




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
		
		<h3>::Receive Stock to the Warehouse</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-half" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="7" height="30" align="center"> 
	
	
	</td>
	
	
    </tr>
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
  
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="7" align="center"><strong>LPO Number</strong> :
    <?php echo $lpo_no;?><strong>Supplier Name:</strong><?php echo $rows->supplier_name;?><strong>Total Stock Ordered: </strong><?php echo $qnty_ordered.' Items'; ?>
	</td>
    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="200"><div align="center"><strong>Product Code</strong></td>
    <td width="800"><div align="center"><strong>Product Name</strong></td>
	<td width="200"><div align="center"><strong>Quantity Ordered</strong></td>
    <td width="200"><div align="center"><strong>Quantity Already Received</strong></td>	
    <td width="200"><div align="center"><strong>Balance Quantity</strong></td>		
	<td width="50"><div align="center"><strong>Edit</strong></td>

	<!--<td width="600"><div align="center"><strong>Enter Delivery date</strong></td>
	<td width="600"><div align="center"><strong>Enter Expiry date</strong></td>-->

    </tr>
  
  <?php 
  
$sql="select products.product_name,products.pack_size,product_code,purchase_order.quantity,purchase_order.product_id,purchase_order.purchase_order_id,purchase_order.status,purchase_order.order_code,purchase_order.supplier_id from products
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
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $qnty_ordered=$rows->quantity;?></td>
	
	<td align="center">
	<?php 
	
$p_id=$rows->product_id;
$sqlord1="select SUM(quantity_rec) as ttl_quant_rec from received_stock where product_id='$p_id' and order_code='$order_code'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
echo $qnty_rec=$rowsord1->ttl_quant_rec;
	?>
	
	
	</td>
	<td align="center">
	
	<?php echo $quant_bal=$qnty_ordered-$qnty_rec; ?>
	
	
	</td>
	<td align="center"><a href="edit_receive_stock_to_warehouse.php?lpo_no=<?php echo $lpo_no; ?>&supplier_id=<?php echo $rows->supplier_id; ?>&order_code=<?php echo $rows->order_code; ?>&product_id=<?php echo $rows->product_id; ?>&qnty_ordered=<?php echo $quant_ordered; ?>&purchase_order_id=<?php  echo $rows->purchase_order_id; ?>&received_stock_id=<?php echo $rowsupd->received_stock_id;?>"><img src="images/edit.png"></a>
	
	
	
	
	</td>
	
	
		<!--<td align="center"><input type="text" name="qnty_stock_rec[]" size="20"></td>
<td align="center"><input type="text" name="delivery_date[]" size="41" id="delivery_date[]" readonly="readonly" /></td>
	<td align="center"><input type="text" name="expiry_date[]" size="41" id="expiry_date[]" readonly="readonly" /></td>
	

	<td align="center"><input type="text" name="qnty_stock_rec[]" size="20" value="0" readonly="readonly"></td>
	<td align="center"><select name="deliv_year[]">

<option value="-">recorded</option>	
	</select>
	<select name="deliv_month[]">
<option value="-">recorded</option>
</select>
	<select name="deliv_day[]">
<option value="-">recorded</option>    
</select></td>
	<td align="center">
<select name="exp_year[]">
<option value="-">recorded</option>	
	</select>
	<select name="exp_month[]">
<option value="-">recorded</option>	
	</select>
	<select name="exp_day[]">
<option value="-">recorded</option>	
</select></td>-->
	
	
	
	
	
  
    </tr>
	
  <?php 
  
  }
  
  
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
    <td align="center"><input type="submit" name="submit" value="Save Stock to the Warehouse">&nbsp;&nbsp;</td>
   
  </tr>-->
</table>
		

	
	 



			
			
			
					
			  </div>
				
				<div id="cont-right-half" class="br-5">
<form name="rec_prod" action="processedit_rec_stock_to_warehouse.php?lpo_no=<?php echo $lpo_no; ?>&qnty_orderedbck=<?php echo $qnty_ordered; ?>&purchase_order_id=<?php echo $purchase_order_id;?>&received_stock_id=<?php echo $rowsupd->received_stock_id; ?>&product_id=<?php echo $product_id;?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><strong><font color="#ff0000">Panel for Receiving Stock into the Warehouse</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Stock Updated successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Received cannot be more than ordered!!</font></p>";
?>
</td>
    </tr>
  
 
	<tr height="30">
    <td>&nbsp;</td>
    <td  width="30%">Select Product<font color="#FF0000">*</font></td>
    <td>
	<select name="prod">
	<?php 
	$querycat="select * from products where product_id='$product_id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	?>

	<option value=<?php $rowscat->product_id ?>><?php echo $rowscat->product_name.' ('.$rowscat->pack_size.')'; ?></option>
	</select>	</td>
    </tr>
	<tr height="30" >
    <td width="10%"><input type="hidden" name="order_code" size="20" value="<?php echo $order_code; ?>">
<input type="hidden" name="supplier_id" size="20" value="<?php echo $supplier_id;?>">
<input type="hidden" name="purchase_order_id" size="20" value="<?php echo $rows1->purchase_order_id;?>"></td>
    <td>Quantity Received<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="qnty_rec" value="<?php echo $qnty_rec=$rowsupd->quantity_rec; ?>"></td>
    </tr>

	<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Delivery Date</td>
    <td><input type="text" name="delivery_date" size="41" id="delivery_date" readonly="readonly" value="<?php echo $rowsupd->delivery_date;?>" /></td>
    </tr>
	<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Expiry Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="expiry_date" size="41" id="expiry_date" value="<?php echo $rowsupd->expiry_date;?>"/></td>
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
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='rec_prod_errorloc' class='error_strings'></div></td>
   
    </tr>
 
</table>

	</form>	

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "delivery_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "expiry_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "expiry_date"       // ID of the button
    }
  );
  
 
  
  
  
  </script>
  
  <!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_prod");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("prod","dontselect=0",">>Please select the product");
  frmvalidator.addValidation("qnty_rec","req",">>Please enter quantity received");
 frmvalidator.addValidation("expiry_date","req",">>Please enter expiry");

 
 
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