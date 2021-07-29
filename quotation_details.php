<?php
include('Connections/fundmaster.php');
$get_client_id=$_GET['client_id'];
$date_generated=$_GET['date_generated'];
$quote_code=$_GET['quote_code'];
//$all_rfq_id=$_GET['all_rfq_id'];
$quotation_no=$_GET['quotation_no'];
$user=$_GET['user'];
$currency=$_GET['currency'];



$id=$_GET['cat'];
$get_avl_quant=$_GET['avl_quant'];
$get_prod=$_GET['product_id'];
include('Connections/fundmaster.php');
$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);

$sqlcurr="select * from currency where curr_id='$currency'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
$curr_name=$rowcurr->curr_name;
$curr_rate=$rowcurr->curr_rate;

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
self.location='generate_quote.php?cat=' + val ;

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
		
		<h3>:: Generate Quote to Client -- <?php
		
$sqlsup="SELECT * FROM clients where client_id='$get_client_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rows=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rows->c_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
<form name="gen_order" action="processgenquote.php" method="post">			


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

<table width="100%" border="0">
  <tr bgcolor="#000033" height="30">
    <td colspan="13" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Quotation Details</span>
	<span style="color:#FFFFFF; float:right;">
	
	<a target="_blank" href="quotation2.php?client_id=<?php echo $get_client_id; ?>
	&quote_code=<?php echo $quote_code; ?>&currency=<?php echo $currency;?>&quotation_no=<?php echo $quotation_no;?> "style="color:#FFFFFF;">Print Quotation</a> | 
	
	<!--quotation_id=$latest_quotation_id=-->
	
	
	<a href="word_quotation2.php?client_id=<?php echo $get_client_id; ?>
	&quote_code=<?php echo $quote_code; ?>&currency=<?php echo $currency;?>&quotation_no=<?php echo $quotation_no;?> "style="color:#FFFFFF;">Export Quotation to word</a></span></td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td ><div align="center"><strong>Pack Size</strong></div></td>
    <td width="5%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="10%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td colspan="2"><div align="center"><strong>Amount (<?php echo $curr_name; ?>)</strong></div></td>
	<td width="10%"><div align="center"><strong>Discount(%)</strong></div></td>
	<td width="10%"><div align="center"><strong>V.A.T (16%)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
$sqllpdet="select quote.quote_id,quote.quantity, quote.selling_price,quote.product_code,quote.vat_value,quote.discount_perc,quote.discount_value,products.product_name, 
products.pack_size from quote, products where quote.product_id=products.product_id AND quote.quote_code='$quote_code' order by quote.quote_id asc";
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
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php echo number_format($rowslpdet->selling_price ,2); $unit_val= $rowslpdet->selling_price;?></td>
    <td align="right" colspan="2"><?php 
	
	//echo number_format($rowslpdet->ttl,2);
	
	
	//echo $qnty;  echo $unit_val;
	$ttl=$unit_val*$qnty;
	
	echo number_format ($ttl,2);
	//$id=$rowslpdet->purchase_order_id;
	
	
	/*$sqlttl="UPDATE purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
	
	$sqlttl="UPDATE temp_purchase_order set ttl='$ttl' where purchase_order_id='$id'";
	$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());*/
	
	
	$subttl=$subttl+$ttl;
	
	

	
	

	?>	</td>
	
	<td align="right">(<?php echo $rowslpdet->discount_perc; ?>%) <?php echo number_format ($rowslpdet->discount_value,2); $ttl_disc=$rowslpdet->discount_value; ?> </td>
	<td align="right"><?php echo number_format($rowslpdet->vat_value,2); $ttl_vat=$rowslpdet->vat_value; ?></td>
    <td align="center">
	<?php
if ($user_group_id!='15')
{
	 
}
else
{
?>
<a href="edit_sales_trans.php?quote_id=<?php echo $rowslpdet->quote_id; ?>&client_id=<?php echo $get_client_id; ?>&sales_code=<?php echo $get_sales_code; ?>&currency=<?php echo $currency;  ?>"><img src="images/edit.png"></a>
<?php


}	
	?>

	</td>
    <td align="center">
	<?php
if ($user_group_id!='15')
{
	 
}
else
{
?>
	
	<a href="delete_sales_trans.php?quote_id=<?php echo $rowslpdet->quote_id; ?>&client_id=<?php echo $get_client_id; ?>&sales_code=<?php echo $get_sales_code; ?>&currency=<?php echo $currency;  ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a>
<?php


}	
	?>	
	</td>
    
  </tr>
  
   <?php
	$grndvat=$grndvat+$ttl_vat;
	$grnddisc=$grnddisc+$ttl_disc;
	
	}
	
	?>
  
  
  
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Sub Totals</strong></td>

    <td colspan="3"align="right"><strong><?php 

	echo number_format ($subttl,2);    

	?></strong></td>
    <td colspan="3" align="right">
	
	
	
	</td>
    
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%" colspan="3"> 
	
	
	
	
	
	</td>
    
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Total VAT</strong></td>

    <td colspan="3"align="right"><?php 
	
	

	echo number_format ($grndvat,2);    

	?></td>
    <td colspan="3" align="right"></td>
  
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><strong>Total Discount</strong></td>

    <td colspan="3"align="right"><?php 

	echo number_format ($grnddisc,2);    

	?></td>
    <td colspan="3" align="right">
	
	
	
	
	</td>
    
  </tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="5%">&nbsp;</td>
    <td align="right"><font size="+1"><strong>Grand Total</strong></font></td>

    <td colspan="3"align="right"><font size="+1" color="#ff0000"><?php 
	
	
	$grndttl=$subttl+$grndvat-$grnddisc;
	
	 session_start();
	 
	 $_SESSION['grndttl']=$grndttl;

	echo number_format ($grndttl,2);    

	?></font></td>
    <td colspan="3" align="right">
	
	
	
	</td>
	

   
  </tr>
  

  


  
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