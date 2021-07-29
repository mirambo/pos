<?php
include('includes/session.php');
include('Connections/fundmaster.php');
session_start(); 
$order_code=$_SESSION['order_code'];
$sqlrec="select order_code_get.lpo_no,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.order_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->supplier_id;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->lpo_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;

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


?> <span style="color:#000066"><?php echo $supp_name=$rows->supplier_name;
		
		
		 ?>  </span></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="gen_order" action="processgenorder.php?order_code=<?php echo $order_code; ?>" method="post">			
			<table width="100%" border="1">
  <tr height="30" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	<strong>Supplier : </strong><i><?php echo $supplier_name=$rowsrec->supplier_name;  ?></i>
	
	<strong>Shipping Agency : </strong><i><?php echo $shipper_name=$rowsrec->shipper_name;  ?></i>
	
	<strong>Term Of Payments :</strong><i><?php echo $mop_name=$rowsrec->mop_name;  ?></i>
	
	<strong>Currency: </strong><i><?php echo $curr_name=$rowsrec->curr_name;  ?></i>
	<br/>
	<br/>
	<strong>Freight Charges : </strong><i><?php echo $freight_charge=$rowsrec->freight_charge;  ?></i>
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> <a rel="facebox" href="edit_order_code.php?order_code=<?php echo $order_code;?>"><img src="images/edit.png"> </a>
		<br/>
	<br/>

<?php
/*
if ($_GET['genorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order added successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
*/

?></td>
    

  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>Select Product Category</td>
    <td><select name="prod_cat" id="prod_cat" onChange="reload(this.form)">
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
    <td>Select Product</td>
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
								  
								  </select></td>
    <td>Product Description</td>
    <td rowspan="3"><textarea name="description" cols="30" rows="5"></textarea></td>
    
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>F.O.C Applicable?</td>
    <td><input type="radio" name="foc" value="1">Yes<input type="radio" name="foc" checked="checked" value="0">No</td>
    <td>Enter Quantity</td>
    <td colspan="2"><input type="text" name="qnty" size="20"> Unit Price (<?php echo $curr_name ?>)<input type="text" name="vend_price" size="20"></td>
    
   
    
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
<td colspan="2" align="center"><input type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;Save Transaction&nbsp;&nbsp;&nbsp;">&nbsp;<!--<input type="reset" value="Cancel">--></td>
    
    
   
    <td>&nbsp;</td>

   
    

  </tr>
  
 
  <tr height="40">
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td colspan="3"><div id='gen_order_errorloc' class='error_strings'></div;</td>
 
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
 frmvalidator.addValidation("prod","dontselect=0",">>Please select product");
 //frmvalidator.addValidation("prod_code","req","Please enter product code");
 frmvalidator.addValidation("qnty","req",">>Please enter quantity");
 frmvalidator.addValidation("vend_price","req",">>Please enter vendor price");
 

</SCRIPT>

<table width="100%" border="0">
  <tr bgcolor="#000033" height="30">
    <td colspan="11" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">:::Purchase Order Details</span>
	<span style="color:#FFFFFF; float:right;">
	
	<a href="begin_order.php"style="color:#FFFFFF;" >Save Only</a>&nbsp;|
	
	<a target="_blank" href="lpo.php?order_code=<?php echo $order_code; ?>"style="color:#FFFFFF;" >Save And Print</a>&nbsp;|
	
	<!--<a href="lpo_word.php?order_code=<?php echo $order_code;?>"style="color:#FFFFFF;">Save And Export to Word </a>--></span></td>
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Product Code</strong></div></td>
    <td colspan="2"><div align="center"><strong>Item  Name </strong></div></td>
    <td colspan="2" width="20%"><div align="center"><strong>Description</strong></div></td>
    <td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <td width="12%"><div align="center"><strong>Unit Price (<?php echo $curr_name; ?>)</strong></div></td>
    <td><div align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></div></td>
    <td width="6%"><div align="center"><strong>Edit</strong></div></td>
    <td width="5%"><div align="center"><strong>Delete</strong></div></td>
    
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select purchase_order.purchase_order_id,purchase_order.quantity,purchase_order.vendor_prc,purchase_order.vendor_prc,purchase_order.description,
purchase_order.order_code,purchase_order.product_id,products.product_name,products.prod_code,products.pack_size FROM purchase_order,products 
WHERE purchase_order.product_id=products.product_id AND purchase_order.order_code='$order_code'";
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
    <td><?php echo $rowslpdet->prod_code;?></td>
    <td colspan="2"><?php echo $rowslpdet->product_name.' ('.$rowslpdet->pack_size.')'; ?></td>
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
    <td align="center"><a rel="facebox" href="edit_lpo_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>"><img src="images/edit.png"></a></td>
   







   <td align="center"><a href="delete_lpo_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
  </tr>
  
   <?php
	
	
	}
	
	?>
  
  
  
  
  <tr height="40" bgcolor="#FFFFCC">
       <td colspan="6">&nbsp;</td>
    <td><strong>Sub Totals</strong></td>
    <td align="right"><strong><?php



echo number_format ($grndttl_lpo,2);    



if ($approved==1)
{

$transaction_desc='Purchase Order LPO No:'.$lpo_no;
$transaction_descinv="Freight Charges for Goods Supplied By:".$shipper_name;

if ($shipper_id==5)	
{

}

else
{
$sqlprof="select * from supplier_transactions where order_code='po$order_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{

$sqlupd="UPDATE supplier_transactions SET amount='$grndttl_lpo',currency='$currency',curr_rate='$curr_rate' 
WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE accounts_payables_ledger SET amount='$grndttl_lpo',credit='$grndttl_lpo',currency_code='$currency',curr_rate='$curr_rate' WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE accounts_payables_ledger SET amount='$freight_charge',credit='$freight_charge',currency_code='$currency',curr_rate='$curr_rate' WHERE order_code='fc$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE pending_purchases_ledger SET amount='$grndttl_lpo',debit='$grndttl_lpo',currency_code='$currency',curr_rate='$curr_rate' WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE shippers_transactions SET amount='$freight_charge',currency='$currency',curr_rate='$curr_rate' WHERE order_code='fc$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE custom_clearance_ledger SET amount='$freight_charge',debit='$freight_charge',currency_code='$currency',curr_rate='$curr_rate' WHERE order_code='fc$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());



}
else
{
	

$sqltrans= "insert into supplier_transactions values('','$supplier_id','po$order_code','$transaction_desc','$currency','$curr_rate','$grndttl_lpo',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','$grndttl_lpo','','$grndttl_lpo','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_descinv','$freight_charge','','$freight_charge','$currency','$curr_rate',NOW(),'fc$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into pending_purchases_ledger values('','$transaction_desc','$grndttl_lpo','$grndttl_lpo','','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlss="INSERT INTO custom_clearance_ledger VALUES('','$transaction_descinv','fc$order_code','$freight_charge','$freight_charge', '', '$currency','$curr_rate',NOW())" or die(mysql_error());
$resultsss= mysql_query($sqlss) or die ("Error $sqlss.".mysql_error());

$sql4="INSERT INTO shippers_transactions VALUES('','$shipper_id','fc$order_code','$transaction_descinv','$freight_charge','$currency',
'$curr_rate',NOW())" or die(mysql_error());
$results4= mysql_query($sql4) or die ("Error $sql4.".mysql_error());
/*
$sqlgenled= "insert into general_ledger values('','Purchases Account (PO No:$lpo_no)','$grndttl_lpo','$grndttl_lpo','','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','Accounts Payables (PO No:$lpo_no)','-$grndttl_lpo','','$grndttl_lpo','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());*/
}
}
}
else
{


}
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

if ($approved==1)	

{	
//if shipper is by the supplier himself
if ($shipper_id==5)	
{
$sqlprof="select * from supplier_transactions where order_code='po$order_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
$sqlupd="UPDATE supplier_transactions SET amount='$grndttl',currency='$currency',curr_rate='$curr_rate' 
WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE accounts_payables_ledger SET amount='$grndttl',credit='$grndttl' WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE pending_purchases_ledger SET amount='$grndttl_lpo',debit='$grndttl_lpo' WHERE order_code='po$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());




}
else
{
$transaction_descinv="Freight Charges for Goods Supplied By:".$shipper_name;
$transaction_desc='Purchase Order LPO No:'.$lpo_no;

$sqltrans= "insert into supplier_transactions values('','$supplier_id','po$order_code','$transaction_desc','$currency','$curr_rate','$grndttl',NOW())";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_payables_ledger values('','$transaction_desc','$grndttl','','$grndttl','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into pending_purchases_ledger values('','$transaction_desc','$grndttl','$grndttl','','$currency','$curr_rate',NOW(),'po$order_code')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());





}

}

else
{

}
}
else
{

}	

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