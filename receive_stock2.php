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
		
		<h3>:: List of All Ordered Stock Yet To Be Received</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['addrecprodconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Product added successfully to the inventory!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
    <tr style="background:url(images/description.gif);" height="30" >
    <td width="400"><div align="center"><strong>Purchase Order Number</strong></td>
    <td width="300"><div align="center"><strong>Date Ordered</strong></td>
	<td width="600"><div align="center"><strong>Supplier</strong></td>
	<td width="400"><div align="center"><strong>Product Name</strong></td>
	<td width="250"><div align="center"><strong>Quantity Ordered</strong></td>
	<td width="250"><div align="center"><strong>Quantity Received</strong></td>
	<td width="200"><div align="center"><strong>Receive</strong></td>
   <td width="100" ><div align="center"><strong>Return</strong></td>
     <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select lpo.lpo_no,lpo.date_generated,suppliers.supplier_name,products.product_name,products.pack_size,purchase_order.quantity,purchase_order.product_id,purchase_order.purchase_order_id,purchase_order.status,purchase_order.order_code from lpo,suppliers,products,purchase_order where lpo.order_code=purchase_order.order_code AND purchase_order.supplier_id=suppliers.supplier_id AND purchase_order.product_id=products.product_id order by lpo.date_generated desc";
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
  
    <td><?php echo $rows->lpo_no;?></td>
    <td><?php echo $rows->date_generated;?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td><?php echo $rows->product_name;?>(<?php echo $rows->pack_size;?>)</td>
	<td align="center"><?php echo $rows->quantity;?></td>
	<td align="center"><?php
	
$poi=$rows->purchase_order_id;	

//echo $poi;

 
$sqlrec="select SUM(received_stock.quantity_rec) as ttlrec from received_stock where received_stock.purchase_order_id='$poi'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

$rowsrec=mysql_fetch_object($resultsrec);

$ttlrec=$rowsrec->ttlrec;
if ($ttlrec=='')
{ ?>
<p align="center">-</p>
<?php }

else
{
 echo $ttlrec;
}






	?></td>
	<td align="center">
	
	<?php 
	$quant_ordered=$rows->quantity;
	$status=$rows->status;
	
	
	if ($quant_ordered==$ttlrec)

     {
	 
	 echo "<font color='#33CC00'>Received All</font>";

     }
	 elseif ($quant_ordered>$ttlrec && $status!=2)
	 
	 {
	 ?>
	 
	 <a title="Receive this product into the warehouse" href="receive_product.php?purchase_order_id=<?php echo $rows->purchase_order_id;?>&ttlrec=<?php echo $ttlrec; ?>&product_id=<?php echo $rows->product_id; ?>&order_id=<?php echo $rows->order_code;  ?>" style="color:#000099; font-weight:bold;">Receive</a>
	 
	 <?php 
	 }
	
	 
	 elseif ($quant_ordered>$ttlrec && $status==2 && $ttlrec=='' )
	 {
	 
	 echo "<font color='#ff0000'>Order Canceled</font>";
	 
	 }
	 
	 

	 
	 

	 
	
	
	
	?>
	
	
	
	</td>
	<td align="center"><?php
	
	if ($quant_ordered==$ttlrec)

     {
	 
	 echo "<font color='#ff0000'>-</font>";

     }
	 elseif ($quant_ordered>$ttlrec && $status!=2)
	 
	 {
	 ?>
	
	 <a title="Return product to the supplier" href="return_product.php?purchase_order_id=<?php echo $rows->purchase_order_id;?>&ttlrec=<?php echo $ttlrec; ?>&product_id=<?php echo $rows->product_id; ?>&order_id=<?php echo $rows->order_code;  ?>" style="color:#ff0000; font-weight:bold;">Return</a>
	 
	 <?php 
	 }
	
	
	
	?>
	
	
	
	
	</td>
  
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