<?php 
$get_sup_id=$_GET['supplier_id'];
$get_order_code=$_GET['order_code'];
$ship_agency=$_GET['ship_agency'];
$ship_agency=$_GET['ship_agency'];
$pay_term=$_GET['pay_term'];
$currency=$_GET['currency'];
?>


<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/suppliersubmenu.php');  ?>
		
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
    <td><input type="hidden" name="supplier_id" size="20" value="<?php echo $get_sup_id; ?>">
	<input type="hidden" name="order_code" size="20" value="<?php echo $get_order_code; ?>">
	<input type="hidden" name="ship_agency" size="20" value="<?php echo $ship_agency; ?>">
	<input type="hidden" name="pay_term" size="20" value="<?php echo $pay_term; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $currency; ?>">
	</td>
    <td width="0%">&nbsp;</td>
    <td width="8%">&nbsp;</td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>Select Category </td>
    <td width="14%">
	
	<select name="prod_cat"><option>-------------------Select-----------------------</option>
								  <?php
								  
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
    <td width="9%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>Select Product </td>
    <td>
	<select name="prod"><option>-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from products";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->product_id; ?>"><?php echo $rows1->product_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	
	
	</td>
    <td><a href="#">Add Product</a></td>
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
    <td valign="top" >Product Code</td>
    <td valign="top"><div align="center">
      <input type="text" name="prod_code" size="20">
    </div></td>
    <td valign="top"><div align="center">Quantity </div></td>
    <td valign="top"><div align="center"> <input type="text" name="qnty" size="20">
      
    </div></td>
    <td valign="top" width="600">Vendor Price (<?php echo $currency; ?>)</td>
    <td valign="top"><input type="text" name="vend_price" size="20">
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save Order">&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("sup_name","req","Please enter supplier name");
 frmvalidator.addValidation("cont_person","req","Please enter contact person");
 frmvalidator.addValidation("country","dontselect=0","Please select country");
 frmvalidator.addValidation("phone","req","Please enter phone");
 frmvalidator.addValidation("email","req","Please enter email address");
 frmvalidator.addValidation("email","email","Please enter valid email address");

</SCRIPT>

<table width="100%" border="0">
  <tr bgcolor="#000033" height="30">
    <td colspan="11" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Purchase Order Details</span><span style="color:#FFFFFF; float:right;"><a href="gen_lpo.php?prnt_supp_id=<?php echo $get_sup_id; ?>&prnt_order_id=<?php echo $get_order_code;  ?>"style="color:#FFFFFF;">Print LPO in Kshs. </a>| <a href="#"style="color:#FFFFFF;">Print LPO in USD</a></span></td>
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td colspan="2"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $currency; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount (<?php echo $currency; ?>)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    <td width="2%"><div align="center"></div></td>
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select * from temp_purchase_order";
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
    <td colspan="2"><?php echo $rowslpdet->product_id; ?></td>
    <td colspan="2"><?php echo $rowslpdet->description; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
	
	
	
	?></td>
    <td align="right"><?php echo number_format($rowslpdet->convert_value,2); $unit_val= $rowslpdet->convert_value;?></td>
    <td align="right"><?php 
	
	echo number_format($rowslpdet->ttl,2);
	
	
	
	$ttl=$unit_val*$qnty;
	$id=$rowslpdet->purchase_order_id;
	
	
	$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	
	$grndttl=$grndttl+$rowslpdet->ttl;
	
	

	
	

	?>	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <?php
	
	
	}
	
	?>
  
  
  
  
  <tr height="50">
    <td>&nbsp;</td>
    <td width="12%">afsgafdgsfd</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td>&nbsp;</td>
    <td><font size="+1"><strong>Totals</strong></font></td>
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl,2);    

	?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <?php 
	
	
	}
	
	
	
	
	?>
</table>


  
  
  

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
				
				<table width="100%" border="1" >
				
				<tr><td colspan="3">Supplier</td></tr>
				<tr><td>Supplier</td><td>sdsd</td><td>sdsd</td></tr>
				<tr><td>ssds</td><td>sdsds</td><td>sdsd</td></tr>
				<tr><td >sds</td><td>sdsd</td><td>sdsd</td></tr>
				<tr><td>sdsd</td><td>sdsd</td><td>sdsd</td></tr>
				<tr><td>ssds</td><td>sdsds</td><td>sdsd</td></tr>
				
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