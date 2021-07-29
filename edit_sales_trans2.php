<?php
session_start(); 
//$temp_sales_id=$_GET['temp_sales_id'];
$client_id=$_GET['client_id'];
$sales_code=$_GET['sales_code'];
$currency=$_GET['currency'];
$inv_bal=$_GET['inv_bal'];
$invoice_no=$_GET['invoice_no'];
$date_generated=$_GET['date_generated'];
$user=$_GET['user'];
$sales_rep=$_GET['sales_rep'];


$id=$_GET['temp_sales_id'];
$get_avl_quant=$_GET['avl_quant'];
$get_prod=$_GET['product_id'];
include('Connections/fundmaster.php');
$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);


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
self.location='generate_invoice.php?cat=' + val ;

}

</script>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to remove the item from the list?");
}

</script>

<script>
function toggle() {
 if( document.getElementById("hidethis").style.display=='none' || document.getElementById("hidethis1").style.display=='none'  )
 {
   document.getElementById("hidethis").style.display = '';
   document.getElementById("hidethis1").style.display = '';
   document.getElementById("hidethis2").style.display = '';
   document.getElementById("hidethis3").style.display = '';
 }else
 {
   document.getElementById("hidethis").style.display = 'none';
   document.getElementById("hidethis1").style.display = 'none';
   document.getElementById("hidethis2").style.display = 'none';
   document.getElementById("hidethis3").style.display = 'none';
 }
}
</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

	<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Update Invoice Transaction <?php
		
$sqlsup="SELECT * FROM clients where client_id='$get_client_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->c_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processeditsalestrans2.php?temp_sales_id=<?php echo $id;?>&sales_code=<?php echo $sales_code; ?>
&client_id=<?php echo $client_id; ?>&currency=<?php echo $currency; ?>&inv_bal=<?php echo $inv_bal; ?>&invoice_no=<?php echo $invoice_no; ?>&date_generated=<?php echo $date_generated ?>&user=<?php echo $user ?>&sales_rep=<?php echo $sales_rep ?>" method="post">	


		
			<table width="100%" border="0">
  <tr height="30">

    <td colspan="11" align="center">

<?php

if ($_GET['genorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['overproduct']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Quantity available for '.$rowprodnamw->product_name.'('.$rowprodnamw->pack_size.') are <span style="font-size:14px; font-weight:bold;">'.$get_avl_quant.'</span> Units Only</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    <td><input type="hidden" name="client_id" size="20" value="<?php echo $get_client_id; ?>">
	<input type="hidden" name="sales_code" size="20" value="<?php echo $get_sales_code; ?>">
	<input type="hidden" name="currency1" size="20" value="<?php echo $currency; ?>">
	<input type="hidden" name="sales_rep" size="20" value="<?php echo $get_sales_rep; ?>">
	
	</td>
    
  <!--</tr>
  <tr height="30">
    <td width="10%">&nbsp;</td>
   
    <td width="30%">Select Category 
	
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
	 <option><?php echo $rowscat->cat_name;?></option>
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
    <td colspan="4" rowspan="3" valign="top"><div id='gen_order_errorloc' class='error_strings'></div></td>
    
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
    <td width="10%">Select Product <select name="prod">
	

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
    <td width="15%">&nbsp;
	
	
	
	</td>
    <td>&nbsp;<a href="#">Add Product</a></td>
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
  </tr>-->
  <?php 
$sqllpdet="select * from sales where temp_sales_id='$id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());
$rows=mysql_fetch_object($resultslpdet);
  
  
  ?>
  
  
  <tr height="30">
    <td valign="top" align="right">&nbsp;</td>
    <td valign="top">Apply V.A.T &nbsp;
	<?php  $vat_val=$rows->vat_value; 
	if ($vat_val!=0)
        {
	?>
      <input type="radio" name="vat" value="1" checked>Yes
	  <input type="radio" name="vat" value="0">No
	  <?php 
	  }
	  else
	  {?>
	  
	  <input type="radio" name="vat" value="1">Yes
	  <input type="radio" name="vat" value="0" checked>No
	  
	  <?php 
	  }
	  
	  ?>
	  </td>
	     <td valign="top" width="15%" align="right">Product Code</td>
	   <td valign="top"><div align="center"><input type="text" name="prod_code" size="20" value="<?php echo $rows->product_code;  ?>" readonly="readonly"></td>
    <td valign="top" width="10%"><div align="right">Quantity </div></td>
    <td valign="top"><div align="center"> <input type="text" name="qnty" size="20" value="<?php echo $rows->quantity;  ?>">
	<input type="hidden" name="prod_id" size="20" value="<?php echo $rows->product_id ;  ?>">
      
    </div></td>
    <td valign="top" width="15%" align="right">Discount (%)</td>
    <td valign="top" colspan="2"><input type="text" name="discount" size="20" value="<?php echo $rows->discount_perc;  ?>">
    </td>
 
    <td valign="top"><div align="center"></div></td>
    <td valign="top"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
    <td colspan="4" align="right"><!--<input type="submit" name="submit" value="Save Order">&nbsp;<input type="reset" value="Cancel">--></td>
  <!--  <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>-->
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
 frmvalidator.addValidation("discount","req","Please enter discount allowed");
 

</SCRIPT>


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