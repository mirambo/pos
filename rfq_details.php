<?php
include('Connections/fundmaster.php');

$get_sup_id=$_GET['supplier_id'];
$date_generated=$_GET['date_generated'];
$rfq_code=$_GET['rfq_code'];
$all_rfq_id=$_GET['all_rfq_id'];
$rfq_no=$_GET['rfq_no'];
$user=$_GET['user'];
?>



<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<SCRIPT language="javascript">
function reload(form)
{
var val=form.prod_cat.options[form.prod_cat.options.selectedIndex].value;
self.location='generate_rfq.php?cat=' + val ;

}

</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to remove the item from the list?");
}

</script>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/rfqsubmenu.php');  ?>
		
		<h3>:: Quotation Generated for Supplier  -- <?php
		
$sqlsup="SELECT * FROM suppliers where supplier_id='$get_sup_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->supplier_name;
		
		
		 ?> </span> : On <?php echo  $date_generated;  ?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
<form name="gen_order" action="processgenrfq.php" method="post">
<table width="100%" border="0">
 <tr bgcolor="#000033" height="30">
    <td colspan="10" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Quotation Details</span>
	<span style="color:#FFFFFF; float:right;"><a target="_blank" href="rfq2.php?supp_id=<?php echo $get_sup_id; ?>&user_id=<?php echo $user; ?>
	&rfq_code=<?php echo $rfq_code;?>&all_rfq_id=<?php echo $all_rfq_id; ?>&rfq_no=<?php echo $rfq_no ?>&date_generated=<?php echo $date_generated; ?>" style="color:#FFFFFF;">Print </a>
	

	
	| <a href="rfq_word2.php?supp_id=<?php echo $get_sup_id; ?>&user_id=<?php echo $user; ?>
	&rfq_code=<?php echo $rfq_code;?>&all_rfq_id=<?php echo $all_rfq_id; ?>&rfq_no=<?php echo $rfq_no ?>&date_generated=<?php echo $date_generated; ?>" style="color:#FFFFFF;">Export to Word </a></td>
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name</strong></div></td>
    <td colspan="2"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    
   
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php

$sqllpdet="select rfq.rfq_id,rfq.quantity,rfq.product_code,products.product_name, products.pack_size from rfq, products where 
rfq.product_id=products.product_id AND rfq.rfq_code='$rfq_code'ORDER BY rfq.rfq_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());

if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
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
    <td><?php echo $rowslpdet->product_code;?></td>
    <td colspan="2"><?php echo $rowslpdet->product_name; ?></td>
    <td colspan="2"><?php echo $rowslpdet->pack_size; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    
    
    <td align="center"><a href="edit_lpo_trans.php?temp_purchase_order_id=<?php echo $rowslpdet->temp_purchase_order_id; ?>"><img src="images/edit.png"></a></td>
   







   <td align="center"><a href="delete_po.php?temp_purchase_order_id=<?php echo $rowslpdet->temp_purchase_order_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
  </tr>
  
   <?php
	
	
	}
	
	?>
  
  
  
  

  
  <?php 
	
	
	}
	
	
	
	
	?>
	
	
	
	
	
	
</table>


  
  
  

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
				
				
				<?php
				
				


				?>
				
				<table width="100%" border="0" >
				
				<?php 
				
				 $querysup="select * from suppliers where supplier_id='$get_sup_id'";
				 $resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
				 $rowssup=mysql_fetch_object($resultssup);
				
				
				?>
				
				<tr><td colspan="3" align="center" bgcolor="#000033"><font color="#ffffff"><strong>Supplier</strong></font></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->supplier_name;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->postal;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->town;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->phone;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->email;  ?></td></tr>
				
				
				<?php 
				
				 $queryship="select * from shippers where shipper_id='$ship_agency'";
				 $resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
				 $rowsship=mysql_fetch_object($resultsship);
				
				
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