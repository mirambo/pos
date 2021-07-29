<?php include('Connections/fundmaster.php'); 

$id=$_GET['purchase_order_id'];
$get_ttlrec=$_GET['ttlrec'];
$product_id=$_GET['product_id'];
$recieved_quantity=$_GET['rec_quant'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/prodsubmenu.php');  ?>
		
		<h3>:: Receiving Stock into the Warehouse</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="rec_prod" action="processrecprod.php" method="post">	
<?php 
$sql="select product_categories.cat_name,suppliers.supplier_name,suppliers.supplier_id,products.product_name,products.product_id,products.pack_size,purchase_order.quantity,purchase_order.order_code from product_categories,suppliers,products,purchase_order where purchase_order.supplier_id=suppliers.supplier_id AND purchase_order.product_id=products.product_id AND product_categories.cat_id=products.cat_id AND purchase_order_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);


?>
		
<table width="100%" border="0">
  <tr bgcolor="#ffff99">
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addrecprodconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Product added successfully to the inventory!!</font></strong></p></div>';


if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! quantity to be received cannot be more than ordered one</font></strong></p></div>';

?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="30" bgcolor="#b2d281">
    <td >&nbsp;</td>
    <td width="19%"><strong>Product Category : </strong></td>
    <td width="23%"><?php echo $rows->cat_name;?></td>
    <td width="40%" rowspan="8" valign="center"><div id='rec_prod_errorloc' class='error_strings'></div></td>
  </tr>
	
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Product Name : </strong></td>
    <td width="23%"><?php echo $rows->product_name;?>(<?php echo $rows->pack_size; ?>)<input type="hidden" size="41" name="prod_id" value="<?php  echo $rows->product_id; ?>"></td>
    
  </tr>
  
  <tr height="30" bgcolor="#b2d281">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Supplier : </strong></td>
    <td width="23%"><?php echo $rows->supplier_name;?><input type="hidden" size="41" name="supp_id" value="<?php  echo $rows->supplier_id; ?>">
	                                                  <input type="hidden" size="41" name="purchase_order_id" value="<?php  echo $id; ?>">
													  <input type="hidden" size="41" name="order_code" value="<?php  echo $rows->order_code; ?>">
													  <input type="hidden" size="41" name="ordered_qnty" value="<?php  echo $rows->quantity; ?>">
													   <input type="hidden" size="41" name="ttl_rec" value="<?php  echo $get_ttlrec;?>">
	</td>
    </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Quantity Ordered : </strong></td>
    <td width="23%"><?php echo $rows->quantity;?>
	
	
	</td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30" bgcolor="#b2d281">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Quantity Already Received : </strong></td>
    <td width="23%"><?php 
	
	
	echo $get_ttlrec; ?>
	
	
	</td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%"><strong>Quanity yet to be received : </strong></td>
    <td width="23%"><?php 
	
	$qnty_rec=$rows->quantity;
	
	$qnty_bal=$qnty_rec-$get_ttlrec;
	
	echo $qnty_bal; ?>
	
	
	</td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Quantity Received<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="rec_quant" value="<?php echo $recieved_quantity; ?>"></td>
    </tr>
  
  <tr height="30" bgcolor="#b2d281">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Delivery Date<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="del_date" size="30" id="del_date" readonly="readonly" /></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30" bgcolor="#ffff99">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Expiry Date <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" name="exp_date" size="30" id="exp_date" readonly="readonly" /></td>
    </tr>
 <!--<tr height="30">
    <td>&nbsp;</td>
    <td>Batch Number</td>
    <td><textarea rows="5" cols="30" name="mach_cat_desc"></textarea></td>
    </tr>-->
  
  <tr bgcolor="#b2d281" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffff99" height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "del_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "del_date"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "exp_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "exp_date"       // ID of the button
    }
  );
  
  
  </script> 

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_prod");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
  frmvalidator.addValidation("rec_quant","req","Please enter quantity received");
 frmvalidator.addValidation("del_date","req","Please date delivered");
 frmvalidator.addValidation("exp_date","req","Please enter expiry date");
 
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
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