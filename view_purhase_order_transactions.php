<?php include('Connections/fundmaster.php'); 

$get_inv_id=$_GET['invoice_id'];
$get_sales_code=$_GET['sales_code'];

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
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>::Details Transctions of a particular invoice</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#000033" height="30">
    <td colspan="11" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Purchase Order Details</span>
	<!--<span style="color:#FFFFFF; float:right;"><a target="_blank" href="lpo2.php?supp_id=<?php echo $get_supplier_id; ?>
	&order_code=<?php echo $get_order_code;  ?>&shipp_id=<?php echo $shipping_agent;?>&currency=<?php echo $currency;?>
	&pay_terms=<?php echo $pay_terms;  ?>&lpo_no=<?php echo $lpo_no;?>&date_generated=<?php echo $date_generated;?>&user=<?php echo $user; ?>
	&ttl_lpo_amount=<?php echo $ttl_lpo_amount;?>&freight_charges=<?php echo $freight_charges; ?>"style="color:#FFFFFF;">Print</a>
	
	| <a href="lpo_word2.php?supp_id=<?php echo $get_supplier_id; ?>
	&order_code=<?php echo $get_order_code;  ?>&shipp_id=<?php echo $shipping_agent;?>&currency=<?php echo $currency;?>
	&pay_terms=<?php echo $pay_terms;  ?>&lpo_no=<?php echo $lpo_no;?>&date_generated=<?php echo $date_generated;?>&user=<?php echo $user; ?>
	&ttl_lpo_amount=<?php echo $ttl_lpo_amount; ?>&freight_charges=<?php echo $freight_charges;?>"style="color:#FFFFFF;"> Export to Word </a>--></td>
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>LPO No</strong></div></td>
    <td width="25%"><div align="center"><strong>Supplier</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <!--<td colspan="2"><div align="center"><strong>Pack Size</strong></div></td>-->
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $curr_name;?>)</strong></div></td>
    <td><div align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></div></td>
    <td width="6%"><div align="center"><strong>Adjust</strong></div></td>

    
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.payment_term_id,purchase_order.vendor_prc,
purchase_order.shipping_agent_id,purchase_order.product_code,purchase_order.ttl,lpo.lpo_no,suppliers.supplier_name,products.product_name,products.pack_size 
from purchase_order,suppliers,lpo,products where suppliers.supplier_id=purchase_order.supplier_id AND lpo.order_code=purchase_order.order_code 
AND purchase_order.product_id=products.product_id order by purchase_order.purchase_order_id asc";
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
    <td><?php echo $rowslpdet->lpo_no;?></td>
    <td><?php echo $rowslpdet->supplier_name;?></td>
    <td colspan="2"><?php echo $rowslpdet->product_name; ?></td>
   <!-- <td colspan="2"><?php echo $rowslpdet->pack_size; ?></td>-->
    <td><?php echo number_format($rowslpdet->quantity,0); $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php 
	$vendor_prc=$rowslpdet->vendor_prc;
		if ($vendor_prc=='F.O.C')
		{
		echo $vendor_prc;
		}
		else
		{
		
	
	echo number_format($rowslpdet->vendor_prc,2); $unit_val= $rowslpdet->vendor_prc;
	
	}
	
	; $unit_val= $rowslpdet->vendor_prc;?></td>
    <td align="right"><?php 
	

	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	
	
	
	$grndttl_lpo=$grndttl_lpo+$ttl;
	
	


	

	?>	</td>
    <td align="center">
	
	<a href="edit_lpo_trans2.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>&lpo_amount_no_freight=<?php echo $grndttl_lpo; ?>&freight_charge=<?php ?>"><img src="images/edit.png"></a></td>
  
   
   
  </tr>
  
   <?php
	
	
	}
	
	?>
  
  
  
  
  <!--<tr height="40" bgcolor="#FFFFCC">
       <td colspan="6">Sub Totals</td>
    <td><strong></strong></td>
    <td align="right"><strong><?php 

	echo number_format ($grndttl_lpo,2);    

	?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr height="40" bgcolor="#C0D7E5">
      <td colspan="6">&nbsp;</td>
    <td><strong>Freight Charges</strong></td>
    <td align="right"><strong><?php 
//$freight_charges=$ttl_lpo_amount-$grndttl_lpo;

	echo number_format ($freight_charges,2);    

	?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr height="50" bgcolor="#FFFFCC">
    <td colspan="6">&nbsp;</td>

   
    <td><font size="+1"><strong>Totals</strong></font></td>
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$grndttl_lpo+$freight_charges,2);    

	?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>-->
  
  <?php 
	
	
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