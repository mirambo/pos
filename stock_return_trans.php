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
		
		
		
		<?php require_once('includes/stock_return_submenu.php');  ?>
		
		<h3>::List of All Stock Returns Transactions</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
	<!--<tr bgcolor="#FFFFCC" height="30">
   
    
	
	<td colspan="3"><strong>Filter By: Client Name</strong><input type="text" name="c_name" size="30" /></td>
	
						<td><strong>Or By Date</strong></td>
							<td align="right"><strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /></td>
		<td></td>
			<td><strong>To:</strong><input type="text" name="to" size="15" id="to" readonly="readonly" /></td>
				<td align="center" colspan="3"><input type="submit" name="generate" value="Generate"></td>
					
	
    </tr>-->
   <tr style="background:url(images/description.gif);" height="30" >
   <td width="300"><div align="center"><strong>Supplier Name</strong></td>
    <td width="200"><div align="center"><strong>Product Name</strong></td>
    <td width="100"><div align="center"><strong>Product code</strong></td>
	<td width="100"><div align="center"><strong>Qnty Returned</strong></td>
	<td width="400"><div align="center"><strong>Vendor Price</strong></td>
	<td width="300"><div align="center"><strong>Stock Return (Other Curr)</strong></td>
	<td width="250"><div align="center"><strong>Exchange Rate  (To Kshs.)</strong></td>
	<td width="300"><div align="center"><strong>Stock Return (Kshs.)</strong></td>
	
	<td width="300"><div align="center"><strong>Date Returned</strong></td>
	<td width="100"><div align="center"><strong>Edit</strong></td>
	<td width="100"><div align="center"><strong>Delete</strong></td>
    
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  $grnd_ttl_stock_ret=0;
  $grnd_ttl_quant_ret=0;
  
$sql="SELECT suppliers.supplier_name,products.product_name,stock_returns.product_code,stock_returns.vendor_price,stock_returns.stock_return_quantity,stock_returns.reason,
stock_returns.date_returned,stock_returns.currency,stock_returns.order_code from products,stock_returns,suppliers
where stock_returns.supplier_id=suppliers.supplier_id and stock_returns.product_id=products.product_id";
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
    <td><?php echo $rows->supplier_name;?></a></td>
    <td><?php echo $rows->product_name;?></a></td>
    <td><?php echo $rows->product_code;?></td>
	<td align="center"><?php echo $quant=$rows->stock_return_quantity;?></td>
	<td align="right"><?php echo $rows->currency.' '. number_format($vendor_price=$rows->vendor_price,2);?></td>
	<td align="right"><?php echo $rows->currency.' '.number_format($stock_returns=$quant*$vendor_price,2);?></td>
	<td align="right">
	<?php
	
$order_id=$rows->order_code;
	
$sqlord="select MAX(exchange_rate) AS mxrt from stock_payments where order_code='$order_id'";
$resultsord= mysql_query($sqlord) or die ("Error $sqlord.".mysql_error());
$rowsord=mysql_fetch_object($resultsord);
echo number_format($exch_rate=$rowsord->mxrt,2);
	?>
	</td>
	<td align="right">
	<?php
	echo number_format($kshs_stock_ret=$exch_rate*$stock_returns,2);
	?>
	</td>
	
	<td align="center"><?php echo $rows->date_returned;?></td>
	<td align="center"><img src="images/edit.png"></td>
	
	<td align="center"><img src="images/delete.png"></td>
	
  
    </tr>
  <?php 
$grnd_ttl_stock_ret=$grnd_ttl_stock_ret+$kshs_stock_ret;
$grnd_ttl_quant_ret=$grnd_ttl_quant_ret+$quant;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="center"><strong><font size="+1"><?php 
	echo $grnd_ttl_quant_ret;
	
	
	?></font></strong></td>
	<td width="200"><div align="right"></td>
	<td width="200"></td>
	<td width="200"><div align="center"><strong></strong></td>
    <td width="200" colspan="4"><div><strong><font size="+1">Kshs.<?php echo number_format($grnd_ttl_stock_ret,2); ?></font></strong></td>
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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