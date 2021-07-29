<?php
include('Connections/fundmaster.php');
session_start(); 
$get_sup_id=$_SESSION['get_sup_id'];
$get_order_code=$_SESSION['order_code'];
$ship_agency=$_SESSION['ship_agency'];
$pay_term=$_SESSION['pay_term'];
$currency=$_SESSION['currency'];
$comments=$_SESSION['comments'];
$freight_charge=$_SESSION['freight_charge'];

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;


$id=$_GET['cat'];
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
self.location='generate_order.php?cat=' + val ;

}

</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to remove the item from the list?");
}

</script>

<script type="text/javascript">

function toggle(value){
if(value=='show')
 document.getElementById('vend_price').style.visibility='visible';
else
 document.getElementById('vend_price').style.visibility='hidden';
}

</script>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: Creating Purchase Order to -- <?php
		
$sqlsup="SELECT * FROM suppliers where supplier_id='$get_sup_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->supplier_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="gen_order" action="processgenorder.php" method="post">			
			<table width="100%" border="0">
  <tr height="30">
    <td width="8%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td colspan="7">

<?php

if ($_GET['genorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    <td><input type="hidden" name="supplier_id" size="20" value="<?php echo $get_sup_id; ?>">
	<input type="hidden" name="order_code" size="20" value="<?php echo $get_order_code; ?>">
	<input type="hidden" name="ship_agency" size="20" value="<?php echo $ship_agency; ?>">
	<input type="hidden" name="pay_term" size="20" value="<?php echo $pay_term; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $currency; ?>">
	
	<input type="hidden" name="freight_charge" size="20" value="<?php echo $freight_charge; ?>">
	<textarea name="comments" cols="30" rows="5" style="display:none;"><?php echo $comments; ?></textarea>
	
	</td>
    <td width="0%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td width="10%">Select Category </td>
    <td width="14%">
	
	<select name="prod_cat" id="prod_cat" onChange="reload(this.form)">
	<?php
	
	$querycat="select * from product_categories where cat_id='$id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	if ($id=='')
	{


	?>
	<option>-------------------Select-----------------------</option>
								  <?php
								  
     }
	 
	 else 
	 
	 { ?>
	 <option><?php echo $rowscat->cat_name; ?></option>
	 <?php 
	 
	 }
								  
								  $query1="select * from product_categories";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="13%">&nbsp;</td>
    <td width="9%" colspan="3" rowspan="2" valign="top"><div id='gen_order_errorloc' class='error_strings'></div></td>
    
    
  
    <td width="30%" colspan="5"></td>

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>Select Product </td>
    <td>
	<select name="prod">
	

	<option>-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from products where products.cat_id='$id'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->product_id; ?>"><?php echo $rows1->product_name; ?>    (<?php echo $rows1->pack_size; ?>)</option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	
	
	</td>
    <td><!--<a href="#">Add Product</a>--></td>
    
    
    <td>&nbsp;</td>
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
    <td valign="top" width="20%" align="right">F.O.C Applicable?</td>
    <td valign="top"><div align="center">
     <!--<input type="radio" name="foc" value="1">Yes<input type="radio" class="yesRadio" onClick="showTextBox()" name="foc" value="0"/>No-->
	 <input type="radio" name="foc" checked="checked" onclick="toggle('hide');" value="1">Yes<input type="radio" name="foc" checked="checked" onclick="toggle('show');" value="0">No



    </div></td>
    <td valign="top" align="right">Quantity</td>
    <td valign="top"><div align="center"> <input type="text" name="qnty" size="20">
      
    </div></td>
    <td valign="top" width="20%" align="right"><?php echo $curr_name; ?><font color="#ff0000"> <blink>Update Currency Rate!!</blink></font></strong><!--Vendor Price (<?php echo $curr_name; ?>)--></td>
    <td valign="top"><!--<input type="text" name="vend_price" size="20"><input type="text" name="vend_price" id="vend_price" size="20">-->
	<strong><input type="text" name="curr_rate" size="5" value="<?php echo $curr_rate; ?>">

    </td>
    <td valign="top"></td>
    <td valign="top"><div align="center"></div></td>
    <td valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><!--<strong><font color="#ff0000"> <blink>Update Currency Rate!!</blink></font></strong><input type="text" name="curr_rate" size="5" value="<?php echo $curr_rate; ?>">--></td>
    
    <td>&nbsp;</td>
   
    <td colspan="5"><input type="submit" name="submit" value="Save Order">&nbsp;<input type="reset" value="Cancel"></td>

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

<table width="100%" border="0">
  <tr bgcolor="#000033" height="30">
    <td colspan="11" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Purchase Order Details</span>
	<span style="color:#FFFFFF; float:right;"><a target="_blank" href="gen_lpo.php?prnt_supp_id=<?php echo $get_sup_id; ?>
	&prnt_order_id=<?php echo $get_order_code;  ?>&ship_id=<?php echo $ship_agency;?>&currency=<?php echo $currency;?>&curr_rate=<?php echo $curr_rate;?>
	&pay_terms=<?php echo $pay_term; ?>&comments=<?php echo $comments; ?>&freight_charge=<?php echo $freight_charge; ?>"style="color:#FFFFFF;" >Print</a>
	
	| <a href="gen_excel_lpo.php?prnt_supp_id=<?php echo $get_sup_id; ?>
	&prnt_order_id=<?php echo $get_order_code;  ?>&ship_id=<?php echo $ship_agency;?>&currency=<?php echo $currency;?>&curr_rate=<?php echo $curr_rate;?>
	&pay_terms=<?php echo $pay_term; ?>&comments=<?php echo $comments; ?>&freight_charge=<?php echo $freight_charge; ?>"style="color:#FFFFFF;">Export to Word </a></span></td>
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td colspan="2"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select temp_purchase_order.temp_purchase_order_id,temp_purchase_order.quantity, temp_purchase_order.vendor_prc,temp_purchase_order.product_code,
temp_purchase_order.ttl,products.product_name, products.pack_size from temp_purchase_order, products where 
temp_purchase_order.product_id=products.product_id order by temp_purchase_order.temp_purchase_order_id asc";
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
	
	?></td>
    <td align="right"><?php 
	
	//echo number_format($rowslpdet->ttl,2);
	
	
	//echo $qnty;  echo $unit_val;
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$grndttl_lpo=$grndttl_lpo+$ttl;
	
	


	

	?>	</td>
    <td align="center"><a href="edit_lpo_trans.php?temp_purchase_order_id=<?php echo $rowslpdet->temp_purchase_order_id; ?>"><img src="images/edit.png"></a></td>
   







   <td align="center"><a href="delete_po.php?temp_purchase_order_id=<?php echo $rowslpdet->temp_purchase_order_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
  </tr>
  
   <?php
	
	
	}
	
	?>
  
  
  
  
  <tr height="40" bgcolor="#FFFFCC">
       <td colspan="6">&nbsp;</td>
    <td><strong>Sub Totals</strong></td>
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

	echo number_format ($freight_charge,2);    

	?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr height="50" bgcolor="#FFFFCC">
    <td colspan="6">&nbsp;</td>

   
    <td><font size="+1"><strong>Totals</strong></font></td>
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$grndttl_lpo+$freight_charge,2);    

	?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  
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