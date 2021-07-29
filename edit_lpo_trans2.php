<?php
include('Connections/fundmaster.php');
$lpo_amount_no_freight=$_GET['lpo_amount_no_freight'];

$purchase_order_id=$_GET['purchase_order_id'];

$sqltemp="SELECT purchase_order.supplier_id, suppliers.supplier_name,purchase_order.currency_code,currency.curr_name,purchase_order.product_code,
purchase_order.quantity,purchase_order.order_code,purchase_order.payment_term_id,purchase_order.shipping_agent_id,purchase_order.vendor_prc  FROM purchase_order, suppliers, currency WHERE 
purchase_order.currency_code=currency.curr_id AND suppliers.supplier_id=purchase_order.supplier_id AND purchase_order_id='$purchase_order_id'";
$resultstemp=mysql_query($sqltemp) or die ("Error : $sqltemp.".mysql_error());
$rowstemp=mysql_fetch_object($resultstemp);




?>


<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<SCRIPT language="javascript">
function reload(form)
{

var val=form.prod_cat.options[form.prod_cat.options.selectedIndex].value;
self.location='edit_lpo_trans.php?cat='+val;

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
		

		<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: Update The Transaction : <?php
		



?> <span style="color:#000066"><?php echo $rowstemp->supplier_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="gen_order" action="processeditorder2.php?purchase_order_id=<?php echo $purchase_order_id;?>&lpo_amount=<?php ?>" method="post">			
<table width="100%" border="0">
  <tr height="30">
    <td width="8%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td colspan="7">

<?php

if ($_GET['genorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    <td><input type="hidden" name="supplier_id" size="20" value="<?php echo $rowstemp->supplier_id; ?>">
	<input type="hidden" name="order_code" size="20" value="<?php echo $rowstemp->order_code; ?>">
	<input type="hidden" name="ship_agency" size="20" value="<?php echo $rowstemp->shipping_agent_id; ?>">
	<input type="hidden" name="pay_term" size="20" value="<?php echo $rowstemp->shipping_agent_id; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $rowstemp->currency_code; ?>">
	<input type="hidden" name="purchase_order_idgggg" size="20" value="<?php echo $tempp_purchase_order_id; 
	
	
	?>">
	
	</td>
    <td width="0%">&nbsp;</td>
    <td width="8%">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
  
   <tr>
    <td valign="top" width="20%" align="right"></td>
    <td valign="top">Product Code</td>
    <td valign="top" ></td>
    <td valign="top"><div align="center"><input type="text" name="prod_code" size="20" value="<?php echo $rowstemp->product_code; ?>">
      
    </div></td>
    <td valign="top" width="15%" align="right">Quantity</td>
    <td valign="top"><input type="text" name="qnty" size="20" value="<?php echo $rowstemp->quantity; ?>"></td>
   
    <td valign="top" colspan="3" width="20%"><div align="right">Vendor Price(<?php echo $rowstemp->curr_name; ?>)</div></td>

    <td valign="top"><input type="text" name="vend_price" size="20" value="<?php echo $rowstemp->vendor_prc; ?>"></td>
    <td>&nbsp;</td>
  </tr>
  <tr height="50">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" name="submit" value="Update Transaction">&nbsp;<input type="reset" value="Cancel"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
    <td ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 //frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");
 frmvalidator.addValidation("prod","dontselect=0","Please select product");
 frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("qnty","req","Please enter quantity");
 frmvalidator.addValidation("vend_price","req","Please enter vendor price");
 

</SCRIPT>




  
  
  

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
				
				
				<?php
				
				


				?>
				
				<table width="100%" border="0" >
				
				
				<tr><td colspan="3" align="center" bgcolor="#000033"><font color="#ffffff"><strong>Supplier</strong></font></td></tr>
				<tr><td colspan="3"><?php echo $rowstemp->supplier_name;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->postal;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->town;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->phone;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->email;  ?></td></tr>
				
				
				<?php 
				
				 $queryship="select * from shippers where shipper_id='$ship_agency'";
				 $resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
				 $rowsship=mysql_fetch_object($resultsship);
				
				
				?>

				<tr><td colspan="3" align="center" bgcolor="#000033"><strong><font color="#ffffff">Shipping Details</font></strong></td></tr>
				<tr><td colspan="3"><?php echo $rowsship->shipper_name; ?></td></tr>
				<tr><td colspan="3"><?php echo $rowsship->town; ?></td></tr>
				
				
				
				<tr><td colspan="3" align="center" bgcolor="#000033"><strong><font color="#ffffff">Terms of Payment</font></strong></td></tr>
				<tr><td colspan="3"><?php echo $pay_term; ?></td></tr>
				
				
				
				
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