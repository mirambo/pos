<?php
include('includes/session.php');
include('Connections/fundmaster.php');
echo $order_code=$_GET['order_code'];
$show_approve=$_GET['show_approve'];
$approved=$_GET['approved'];

$sqlrec="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND 
order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->supplier_id;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->lpo_no;
$status=$rowsrec->status;

$order_date=$rowsrec->date_generated;



?>


<?php //include('Connections/fundmaster.php'); ?>

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

function confirmApprove()
{
    return confirm("Are you sure you want to approve this lpo?");
}

</script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/approve_lposubmenu.php');  ?>
		
		<h3>:: Creating Purchase Order to -- <?php
		
$sqlsup="SELECT * FROM suppliers where supplier_id='$get_supplier_id'";
$resultssup= mysql_query($sqlsup) or die ("Error $sqlsup.".mysql_error());
$rowssup=mysql_fetch_object($resultssup);


?> <span style="color:#000066"><?php echo $rowssup->supplier_name; ?> <span/> <span style="color:#FF9900">LPO Number : </span><?php echo $lpo_no; ?>

<span style="color:#FF9900">Date Generated : </span><?php echo $order_date; ?>
</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="gen_order" action="process_approve_lpo.php?order_code=<?php echo $order_code; ?>" method="post">			
			<table width="100%" border="0">
 
	<tr height="30" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	<strong>Supplier : </strong><i><?php echo $supplier_name=$rowsrec->supplier_name;  ?></i>
	
	<strong>Currency: </strong><i><?php echo $curr_name=$rowsrec->curr_name;  ?></i>
	<strong>Rate: </strong><i><?php echo $curr_rate;  ?></i>
	<strong>Mode Of Payment: </strong><i><?php echo $rowsrec->mop_name;  ?></i>
	
	<br/>
	<br/>
	
	<strong>Terms Of Payment: </strong><i><?php  echo $lpo_type=$rowsrec->payment_schedule;    ?></i>
	<strong>Delivery Conditions : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<?php if ($approved==1)
{

}
else
{
?>
	
	
<a rel="facebox" href="edit_order_code.php?order_code=<?php echo $order_code;?>&approved=<?php echo $approved;?>&view=1"><img src="images/edit.png"> </a>
		
<?php }?>		
		
		
		<br/>
	<br/>

</td>
    

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
	<span style="color:#FFFFFF; float:right;">
		<?php 
	/* if ($status==2)
	{ */
	
	?>
	<a style="float:right; margin-right:10px; color:#ffffff;" target="_blank" href="lpo.php?order_code=<?php echo $order_code; ?>">
	
	Print LPO |
	 
	
	</a>
	
	<a style="float:right; margin-right:10px; color:#ffffff;"  href="lpo_excel.php?order_code=<?php echo $order_code; ?>">
	
	Export To Excel
	
	
	</a>
	<?php
/* }
if ($status==0)
{ */?>
<span style="float:right; margin-right:10px; color:#ffffff; font-size:11px;"><!--Can Only be printed after approval!!!--></span>
<?php


//}

	?>
	
	
	|</tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td colspan="2" width="20%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>VAT(<?php echo $curr_name; ?>)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select * FROM purchase_order,items
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code'";
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
    <td><?php echo $rowslpdet->item_code;?></td>
    <td colspan="2"><?php echo $rowslpdet->item_name; ?></td>
    <td colspan="2"><?php echo $rowslpdet->description; ?></td>
    <td><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
    <td align="right"><?php 
	$vendor_prc=$rowslpdet->vendor_prc;
		if ($vendor_prc=='F.O.C')
		{
		echo $vendor_prc;
		}
		else
		{
		
	
	echo number_format($vendor_prc,2);
	
	}
	
	?></td>
    <td align="right"><?php 
	
	
	$ttl=$vendor_prc*$qnty;
	
	echo number_format ($ttl,2);
	
	
	
	$grndttl_lpo=$grndttl_lpo+$ttl;
	
	


	

	?>	</td>
	<td align="right"><?php echo number_format($order_vat_value=$rowslpdet->order_vat_value,2);



$ttl_vat=$ttl_vat+$order_vat_value;



	?></td>
    <td align="center">
<?php if ($approved==1)
{

}
else
{
?>	
	
	
	
	<a rel="facebox" href="edit_lpo_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>&order_code=<?php echo $order_code; ?>&view=1"><img src="images/edit.png"></a></td>
   
<?php 
}

?>






   <td align="center">
   <?php if ($approved==1)
{

}
else
{
?>
   
   <a href="delete_lpo_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>&order_code=<?php echo $order_code; ?>&view=1" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
 <?php 
}

?>   
  </tr>
  
   <?php
	
	
	}
	

	
	}
	
	?>
  
  <tr height="40" bgcolor="#FFFFCC">
       <td colspan="6"></td>
    <td><strong>Sub Totals</strong></td>
    <td align="right"><strong><?php 

echo number_format ($grndttl_lpo,2);    


	?></strong></td>
    <td align="right"><strong><?php 

echo number_format ($ttl_vat,2);    


	?></strong></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
 
  </tr>
  <tr height="40" bgcolor="#C0D7E5">
      <td colspan="6">
<?php
if ($show_approve==1)
{

 ?>	  
	  <p align="center" style="background:#2E3192; font-size:14px; margin:auto; color:#ffffff; font-weight:bold; width:300px; height:20px; border-radius:5px;">
<a  style="color:#ffffff; font-weight:bold;"  href="process_approve_lpo.php?order_code=<?php echo $order_code; ?>" onClick="return confirmApprove();">Approve This LPO And Go Next>>></a>
</p>
<?php
}


elseif ($approved==1)
{
?>	  
	 <p align="center" style="background:#2E3192; font-size:14px; margin:auto; color:#ffffff; font-weight:bold; width:300px; height:20px; border-radius:5px;">
<a  style="color:#ffffff; font-weight:bold;"  href="process_approve_lpo.php?order_code=<?php echo $order_code; ?>" onClick="return confirmApprove();">Approve This LPO And Go Next>>></a>
</p>
<?php
}

 ?>
</td>
    <td><strong></strong></td>
    <td align="right"><strong><?php 

	//echo number_format ($freight_charge,2);    

	?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    
  </tr>
  

	
  <tr height="50" bgcolor="#FFFFCC">
    <td colspan="6">&nbsp;</td>

   
    <td><font size="+1"><strong>Totals</strong></font></td>
    <td align="right"><font size="+1" color="#FF0000"><?php 

	echo number_format ($grndttl=$grndttl_lpo+$freight_charge+$ttl_vat,2);    

	?></font></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
  </tr>
  
  <?php 



  
  
  
  
  
  
  

	
	
	
	?>
	

	
	
	
	
</table>



  
  
  

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
				
				
				<?php
				
				


				?>
				
				<table width="100%" border="0" >
				
				<?php 
				
				 /*$querysup="select * from suppliers where supplier_id='$get_sup_id'";
				 $resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
				 $rowssup=mysql_fetch_object($resultssup);*/
				
				
				?>
				
				<tr><td colspan="3" align="center" bgcolor="#000033"><font color="#ffffff"><strong>Supplier</strong></font></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->supplier_name;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->postal;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->town;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->phone;  ?></td></tr>
				<tr><td colspan="3"><?php echo $rowssup->email;  ?></td></tr>
				
				
				<?php 
				//echo $rowslpdet->product_name;
				$shipping_id=$rowslpdet->shipping_agent_id;
			
				 $queryship="select * from shippers where shipper_id='$shipping_agent'";
				 $resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
				 $rowsship=mysql_fetch_object($resultsship);
				
				
				?>

				<tr><td colspan="3" align="center" bgcolor="#000033"><strong><font color="#ffffff">Shipping Details</font></strong></td></tr>
				<tr><td colspan="3"><?php echo $rowsship->shipper_name; ?></td></tr>
				<tr><td colspan="3"><?php echo $rowsship->town; ?></td></tr>
				
				
				
				<tr><td colspan="3" align="center" bgcolor="#000033"><strong><font color="#ffffff">Terms of Payment</font></strong></td></tr>
				<tr><td colspan="3"><?php echo $pay_terms; ?></td></tr>
				
				
				
				
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