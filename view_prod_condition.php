<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDiscard()
{
    return confirm("Are you sure you want to discard?");
}
</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/warehousesubmenu.php');  ?>
		
		<h3>::Products Condition in the Warehouse</h3>
         
				
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

if ($_GET['addexpconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Expired Product Discarded successfully</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr align="center" height="40">
	<td colspan="10" bgcolor="#FFFFCC" height="20" align="center" ><strong>Filter By Product Category</strong>
	<select name="prod">
	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from products";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->product_id;?>"><?php echo $rows1->product_name; ?></option>
                                    
                                										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="generate" value="Filter"></td>
	
    </tr>
	
	
	
  
    <tr style="background:url(images/description.gif);" height="30" >
	<td width="5%"><div align="center"><strong>Product Code</strong></td>
    <td width="22%"><div align="center"><strong>Product Name</strong></td>
	<td width="15%" colspan="2"><div align="center"><strong>Supplier</strong></td>
	<!--<td width="300"><div align="center"><strong>Weight</strong></td>-->
	<td width="300"><div align="center"><strong>Qnty Ordered</strong></td>
    <td width="300"><div align="center"><strong>Qnty Received</strong></td>
	<td width="400"><div align="center"><strong>Qnty Sold</strong></td>
	<!--<td width="400"><div align="center"><strong>Qty Sold Csh</strong></td>-->
	<td width="300"><div align="center"><strong>Qnty Available</strong></td>
	<td width="300"><div align="center"><strong>Expiry Date</strong></td>
	<td width="10%"><div align="center"><strong>Expiry Alert</strong></td>
    <!--<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
<?php 		
if (!isset($_POST['generate']))
{
  
$sql="select purchase_order.product_id,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$product_id=$_POST['prod'];
if ($product_id!='0')
{
$sql="select purchase_order.product_id,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code AND products.product_id='$product_id' ORDER BY products.product_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select purchase_order.product_id,suppliers.supplier_name,purchase_order.purchase_order_id,purchase_order.quantity,products.curr_bp,products.product_id,products.product_name,
products.prod_code,products.reorder_level,received_stock.quantity_rec,received_stock.supplier_id,products.pack_size,products.weight,received_stock.delivery_date,received_stock.expiry_date from purchase_order,products,suppliers, received_stock 
where purchase_order.supplier_id=suppliers.supplier_id and products.product_id=received_stock.product_id AND purchase_order.product_id=received_stock.product_id and purchase_order.order_code=received_stock.order_code ORDER BY products.product_name asc";
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
  <td><?php echo $rows->prod_code;?></td>
    <td><?php echo $rows->product_name;?></td>
	<td colspan="2"><?php echo $rows->supplier_name;?></td>
	
	<td align="center"><?php echo $rows->quantity;?></td>
    <td align="center">
	<?php
	echo $quant_rec=$rows->quantity_rec;
	?></td>
	
	<td align="center"><?php 
	
	$poi=$rows->purchase_order_id;
	
$sqlprodsold="select SUM(sales.quantity) as ttl_sold_prod from sales where sales.purchase_order_id='$poi' group by sales.purchase_order_id";
$resultsprodsold= mysql_query($sqlprodsold) or die ("Error $sqlprodsold.".mysql_error());
$rowprodsold=mysql_fetch_object($resultsprodsold);
 $qnt_sold=$rowprodsold->ttl_sold_prod;
 
 if ($qnt_sold)
 {
 echo $qnt_sold;
 }
 else
 {
 echo '0';
 
 }
	
	
	
	
	?></td>
	<td align="center"><?php 
	echo $qnt_avail=$quant_rec-$qnt_sold;
	
	//echo $avail_prod=$rec_prod-$all_sold_prod;//echo $rows->curr_bp;
	
	?></td>
	<td align="center"><?php echo $expiry_date=$rows->expiry_date;?></td>

  
	<td align="center">
	
	<?php 
$curr_date=date('Y-m-d');
	
$curr_date_string= strtotime ($curr_date);	
$expiry_date_string= strtotime ($expiry_date);

 $period_sec=$expiry_date_string-$curr_date_string;

 $period_days= $period_sec/86400;
 


	if ($period_days<='120' && $period_days>0 )
	
	{
	
	echo "<blink><font color='#009900'>$period_days days to expiry</font></blink>";
	
	}
	
	elseif ($period_days<='0')
	{?>
	
    <font color='#ff0000'><a onClick="return confirmDiscard();" href="discard_expired.php?purchase_order_id=<?php echo $poi; ?>
	&qnty_expired=<?php echo $qnt_avail; ?>&supplier_id=<?php echo $rows->supplier_id;?>&product_id=<?php echo $rows->product_id;?>" style="color:#ff0000;">Expired..</a></font>
	
	<?php 
	}
	
	elseif ($period_days>='120')
	{
	
	echo "<font color='#003399'>Good Condition</font>";
	}
	
	
	?>
	
	
	</td>
	
  
    </tr>
  <?php 
  $grnt_amnt=$grnt_amnt+$amnt;
  $ttl_stock=$ttl_stock+$avail_prod;
  }
  ?>
  
  
  
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