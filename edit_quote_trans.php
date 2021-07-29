<?php

echo $temp_quote_id=$_GET['temp_quote_id'];
$client_id=$_GET['client_id'];
$quote_code=$_GET['sales_code'];
$currency=$_GET['currency'];
//$get_sales_rep=$_SESSION['sales_rep'];

//echo $get_sales_rep;
//$pay_term=$_SESSION['pay_term'];

/*$get_sup_id=$_GET['supplier_id'];
$get_order_code=$_GET['order_code'];
$ship_agency=$_GET['ship_agency'];
$ship_agency=$_GET['ship_agency'];
$pay_term=$_GET['pay_term'];

$currency=$_GET['currency'];*/

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

<?php require_once('includes/quotesubmenu.php');  ?>
		
		<h3>:: Update Quotation Transaction Generated To<?php
		
$sqlsup="SELECT * FROM clients where client_id='$client_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rowsc=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rowsc->c_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processeditquotetrans.php?temp_quote_id=<?php echo $temp_quote_id;?>&quote_code=<?php echo $quote_code; ?>&client_id=<?php echo $client_id; ?>&currency=<?php echo $currency; ?>" method="post">			
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
    
 
  <?php 
$sqllpdet="select * from temp_quote where temp_quote_id='$temp_quote_id'";
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
    <td valign="top" width="8%" align="right">Discount (%)</td>
    <td valign="top" colspan="2"><input type="text" name="discount" size="20" value="<?php echo $rows->discount_perc;  ?>">
    </td>
 
    <td valign="top"><div align="center">Unit Price (<?php
	$currency=$rows->currency_code;
	$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_rate=$rowcurr->curr_name;


	?>)</div></td>
    <td valign="top"><input type="text" name="selling_price" size="20" value="<?php echo $rows->selling_price; ?>" readonly="readonly"></td>
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