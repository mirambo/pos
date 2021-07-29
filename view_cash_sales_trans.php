<?php include('Connections/fundmaster.php'); 

$sales_code_id=$_GET['sales_code_id'];
$sales_type='c';
//echo $received_order_code_id=$_GET['received_order_code_id'];
$id=$_GET['cat'];
$sqlrec="select sales_code.invoice_no,sales_code.sale_date,sales_code.terms,sales_code.currency,sales_code.date_generated,sales_code.curr_rate,
sales_code.user_id,sales_code.sales_code_id,sales_code.client_id,clients.c_name,currency.curr_name FROM currency,clients,sales_code WHERE 
currency.curr_id=sales_code.currency and sales_code.client_id=clients.client_id AND sales_code.sales_code_id='$sales_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	
$rowsrec=mysql_fetch_object($resultsrec);	

$curr_name=$rowsrec->curr_name;
$curr_rate=$rowsrec->curr_rate;
$currency=$rowsrec->currency;
//$sales_rep_id=$rowsrec->sales_rep_id;

/* $sqltc="select employees.emp_firstname,employees.emp_lastname,user_group.user_group_name,users.user_id from users,user_group,
employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id and users.emp_id='$sales_rep_id'";
$resultstc= mysql_query($sqltc) or die ("Error $sqltv.".mysql_error());
$rowstc=mysql_fetch_object($resultstc);
$salesrep_user_id=$rowstc->user_id; */

$get_prod=$_GET['product_id'];
$get_avl_quant=$_GET['avl_quant'];

$sqlprodname="select product_name,pack_size,weight from products where product_id='$get_prod'";
$resultsprodname= mysql_query($sqlprodname) or die ("Error $sqlprodname.".mysql_error());
$rowprodnamw=mysql_fetch_object($resultsprodname);


?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.prod_cat.options[form.prod_cat.options.selectedIndex].value;
self.location='receive_stock2.php?cat=' + val ;
}

</script>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
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
		
		
		
		<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>:: Details Transactions For Cash Sales Receipt Number : <?php echo $invoice_no=$rowsrec->invoice_no; ?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
					
			

<form name="gen_order" action="process_received_stock2.php" method="post">			
			<table width="100%" border="0">
<tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="11" align="center">

<?php

if ($_GET['saveconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Invoice Saved successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['overproduct']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Quantity available for '.$rowprodnamw->product_name.'('.$rowprodnamw->pack_size.') are <span style="font-size:14px; font-weight:bold;">'.$get_avl_quant.'</span> Units Only</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
 
	


  </tr>
  
  <tr height="30" bgcolor="#FFFFCC">

  
    <td colspan="11" align="center">

<?php

?></td>
 
	


  </tr>
  
  <?php




  ?>
  
  
  <tr height="30" bgcolor="#FFFFCC">

    <td width="15%" align="center"colspan="11"><strong>Client : </strong><font color="#FF0000"></font>
    <i><?php echo $c_name=$rowsrec->c_name; ?></i>
	
	
	

   <strong>Currency : </strong><?php echo $curr_name.'      '; ?><strong>Sale Date :  </strong><font color="#FF0000"></font>
    <i><?php echo $rowsrec->date_generated; ?></i>
								  <strong>Sales Rep :</strong><font color="#FF0000"></font>
								   <i><?php echo $rowsrec->emp_firstname.' '.$rowsrec->emp_middle_name.' '.$rowsrec->emp_lastname; ?></i>
								   
								    <strong>Payment Terms :</strong><font color="#FF0000"></font>
								   <i><?php echo $rowsrec->terms; ?></i>
								  
<a rel="facebox" href="edit_sales_code.php?sales_code_id=<?php echo $sales_code_id;?>&view=1&sales_type=<?php echo $sales_type; ?>" style="margin-left:20px;" title="Edit"><img src="images/edit.png"></a>
								  
								 
								  
								  </td>
								  
  </tr>

  
	  
	 
 
  
   

  <!--<tr height="15" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" id="btnClick" value="Save" >&nbsp;&nbsp;<input type="reset" value="Cancel" id="btnReset"></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>-->
  
  
 <!-- <tr height="30" bgcolor="#FFFFCC">

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">
	<div id='gen_order_errorloc' class='error_strings'></div></td>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
 

  </tr>-->
  
  <tr bgcolor="#FFFFCC" style="background:url(images/description.gif);">
  <td colspan="11" height="30" align="center"><strong>Invoice Transaction Details</strong>
  <span style="float:right; margin-right:100px; color:#000;">
  

	<a href="invoice.php?sales_code_id=<?php echo $sales_code_id;?>&sales_type=<?php echo $sales_type; ?>" style="color:#000;" target="_blank">Print Cash Sales Receipt</a> | 
	
	<a href="word_invoice.php?sales_code_id=<?php echo $sales_code_id;?>&sales_type=<?php echo $sales_type; ?> "style="color:#000;">Export Cash Sales Receipt to Word</a> |
  
  
  </span></td></tr>
 
 <tr bgcolor="#FFFFCC" height="30">
 <td align="center" width="5%"><strong>Product Code</strong></td>
 <td align="center" width="20%"><strong>Product Name / Description</strong></td>
 <td align="center" width="10%"><strong>Pack Size</strong></td>
 <td align="center" width="15%"><strong>Quantity</strong></td>
 <td align="center" width="10%"><strong>Unit Price (<?php echo $curr_name ?>)</strong></td>
 <td align="center" width="15%"><strong>Totals (<?php echo $curr_name ?>)</strong></td>
 <td align="center" width="10%"><strong>VAT (<?php echo $curr_name ?>)</strong></td>
  <td width="8%"><div align="center"><strong>Disc(%)</strong></div></td>
    <td width="10%"><div align="center"><strong>Disc Value (<?php echo $curr_name; ?>)</strong></div></td>
 <td align="center" width="5%"><strong>Edit</strong></td>
 <td align="center" width="5%"><strong>Delete</strong></td>

 </tr>
<?php

								  $query2="select sales.sales_id,sales.prod_desc,sales.quantity,sales.discount,sales.discount_value,sales.quantity,sales.selling_price,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id'  order by sales.sales_id asc";
								  $results2=mysql_query($query2) or die ("Error: $query2.".mysql_error());
								  
								  if (mysql_num_rows($results2)>0)
								  
								  {
									  $RowCounter=0;
									  while ($rows2=mysql_fetch_object($results2))
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
<td><?php echo $rows2->prod_code; ?></td>									  
<td><?php echo $rows2->product_name.' '.$rows2->prod_desc.' '; ?></td>									  
<td><?php echo $rows2->pack_size; ?></td>									  
<td align="center"><?php echo $quantity=$rows2->quantity.' '.$rows2->unit_name; ?></td>									  
<td align="right"><?php echo number_format($unit_price=$rows2->selling_price,2); ?></td>									  
<td align="right"><?php echo number_format($amount=$unit_price*$quantity,2); ?></td>									  
								  
<td align="right"><?php echo number_format($vat_value=$rows2->vat_value,2); ?></td>
	<td align="right"><?php echo number_format($rows2->discount,0).'%'; //$ttl_vat=$rowslpdet->vat_value; ?></td>
	<td align="right"><?php echo number_format($rows2->discount_value,2); $ttl_disc=$rows2->discount_value; ?></td>
<td align="center"><a rel="facebox" href="edit_sales.php?sales_id=<?php echo $rows2->sales_id;?>&view=1&sales_code_id=<?php echo $sales_code_id; ?>&sales_type=<?php echo $sales_type; ?>"><img src="images/edit.png"></a></td>										  
<td align="center"><a href="delete_sales.php?sales_id=<?php echo $rows2->sales_id;?>&view=1&sales_code_id=<?php echo $sales_code_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>								  
	 <td></td>
 <td></td>							  
								  
	</tr>								  
									  
									  
									  <?php
$ttl_amnt=$ttl_amnt+$amount;	
$ttl_vat=$ttl_vat+$vat_value;		
$grnddisc=$grnddisc+$ttl_disc;					  


}


}


 ?> 
 <tr height="30" bgcolor="#FFFFCC" >


 <td></td>
 <td></td>
 <td></td>
 <td colspan="2" align="right"><strong>Sub Total</strong></td>
 <td align="right"><strong><?php echo number_format($ttl_amnt,2); ?></strong></td>
<td align="right"><strong><?php echo number_format($ttl_vat,2); ?></strong></td>
 <td></td>
<td align="right"><strong><?php echo number_format($ttl_disc,2); ?></strong></td>
 <td></td>
 <td></td>
 <td></td>
 
 </tr> 
 
 <tr height="30" bgcolor="#FFFFCC" >


 <td></td>
 <td></td>
 <td colspan="2" align="right"><strong><font size="+1">Grand Total</font></strong></td>
 <td align="right" colspan="2"><strong><font size="+1"><?php echo number_format($grndbal=$ttl_amnt+$ttl_vat-$grnddisc,2); 
 $grndbal_kshs=$grndbal*$curr_rate;
 
 
 
 
 
 
 ?></font></strong></td>

 <td></td>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 
 </tr> 
 
 <tr height="30" bgcolor="#FFFFCC" >


 <td></td>
 <td></td>
 <td colspan="2" align="right"><strong><font size="+1">Amount Paid</font></strong></td>
 <td align="right" colspan="2"><strong><font size="+1">
 <?php 
	

echo number_format($amnt_paid=$grndbal,2);
$amnt_paid_kshs=$amnt_paid*$curr_rate;	
	?>
 
 </font></td>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 
 </tr> 
 
 <tr height="30" bgcolor="#FFFFCC" >


 <td></td>
 <td></td>
 <td colspan="2" align="right"><strong><font size="+1">Balance</font></strong></td>
 <td align="right" colspan="2"><strong><font size="+1"><?php echo number_format($grndttl=$grndbal-$amnt_paid,2);
	$grndttl_kshs=$grndttl*$curr_rate;
	?></font></strong></td>

 <td></td>
 <td></td>
 <td></td>
 <td></td>
 <td></td>
 
 </tr> 
 
 <tr height="30" bgcolor="#FFFFCC">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"></td>    
   <td align="right" colspan="4">
 
</font></strong></i>
<?php

$transaction_descinv='Credit Sales Inv No:'.$invoice_no;	
$transaction_desc='Credit Sales To '.$c_name.' Invoice: '.$invoice_no;	
$transaction_desclg='Amount Paid Upon Invoice Generation '.$invoice_no;
$transaction_desc_comm='Commission Payable for Staff:'.$f_name.' '.$l_name;


/* $sqlupd="UPDATE client_transactions SET amount='$grndbal_kshs',transaction='$transaction_descinv' WHERE sales_code='crs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE client_transactions SET amount='-$amnt_paid_kshs',transaction='$transaction_desclg' WHERE sales_code='pcrs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error()); */

$sqlupd="UPDATE customer_transactions SET amount='$grndbal_kshs',transaction='$transaction_descinv' WHERE transaction_code='crs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE customer_transactions SET amount='-$grndbal_kshs',transaction='$transaction_desclg' WHERE transaction_code='pcrs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd= "UPDATE accounts_receivables_ledger SET amount='$grndttl',debit='$grndttl',transactions='$transaction_desc',
currency_code='$currency',curr_rate='$curr_rate'  WHERE sales_code='crs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd= "UPDATE sales_ledger SET amount='$grndbal',credit='$grndbal',transactions='$transaction_desc',currency_code='$currency',curr_rate='$curr_rate' WHERE sales_code='crs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd= "UPDATE cash_ledger SET amount='$amnt_paid',debit='$amnt_paid',currency_code='$currency',curr_rate='$curr_rate' WHERE sales_code='crs$sales_code_id'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

   
   
   
   
   ?></i>
   </font>
   
   </td>
   

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	
	<tr/>
  
  
  
  
  
  
  
  
  
  
 
 
  
</table>

</form>



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("gen_order");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("sup","dontselect=0",">>Please select supplier");
 frmvalidator.addValidation("container_no","req",">>Please enter container number");
 frmvalidator.addValidation("delivery_date","req",">>Please enter date delivery");

  
 
 
 
  </SCRIPT>
  
  <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "delivery_date"       // ID of the button
    }
  );
		
	  </SCRIPT>		

			
			
		
			
			
			

			
			
			
					
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