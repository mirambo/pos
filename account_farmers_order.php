<?php include('Connections/fundmaster.php'); 

$order_code_id=$_GET['order_id'];

$id=$_GET['id'];

$querydc="select * FROM account_farmers_order_code,account_type WHERE account_farmers_order_code.account_to_credit=account_type.account_type_id and
account_farmers_order_code_id='$id'";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
$rowsdc=mysql_fetch_object($resultsdc);

$sqlrec="select * FROM order_code_get,suppliers,currency WHERE 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=Suppliers.supplier_id 
and order_code_get.order_code_id='$order_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->lpo_no;
$ref_no=$rowsrec->ref_no;
$grn_no=$rowsrec->delivery_note_no;
$curr_name=$rowsrec->curr_name;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->supplier_id;
$farmer_id=$rowsrec->farmer_id;
$order_code=$rowsrec->order_code_id;
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];

$sqltrunc = "DELETE FROM temp_sales_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());

$sqlst1="SELECT * FROM  farmers where farmer_id='$farmer_id'";
$resultst1= mysql_query($sqlst1) or die ("Error $sqlst1.".mysql_error());	
$rowst1=mysql_fetch_object($resultst1);	
$farmer_name=$rowst1->farmer_name;

include('select_search.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save?");
}


</script>










<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php //require_once('includes/stocksubmenu.php');  ?>
		<?php require_once('includes/farmers_orders_account_submenu.php'); ?>
		<h3>::Post Farmers Order To Accounts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
		<div id="cont-left-half"   style="" class="br-5">
			<!--<div style="width:100%;"   class="br-5">-->
			
		
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="right"> 
	<!--<font size="+1"><a href="print_received_stock.php?order_code_id=<?php echo $order_code_id;?>&lpo_no=<?php echo $lpo_no;?>
	&supplier_id=<?php echo $supplier_id; ?>&qnty_ordered=<?php echo $qnty_ordered; ?>&purchase_order_id=<?php echo $purchase_order_id ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/> </a>
-->	
	</td>
	
	
    </tr>
	<?php 
$sql="select * from suppliers where supplier_id='$supplier_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

$rows=mysql_fetch_object($results);
	
	?>
 
    <tr bgcolor="#FFFFCC" height="30" >
    <td width="400" colspan="8" align="center"><strong>LPO Number</strong> :
    <?php echo $lpo_no;?>
	<strong>Ref No.</strong> :
    <?php echo $ref_no;?>
		
	<strong> Supplier Name:</strong><?php echo $rows->supplier_name;?></strong>
	</br>
	</br>
	<strong> Farmer Name : </strong><?php echo $farmer_name;?></strong>
	<strong>Currency:</strong><?php echo $curr_name; ?> <strong>Rate : </strong><?php echo $curr_rate;?>
	</td>

    </tr>
	
	<tr style="background:url(images/description.gif);" height="30" >
	
    <td width="200"><div align="center"><strong>Item Code</strong></td>
    <td width="800"><div align="center"><strong>Item Name</strong></td>
	<td width="200"><div align="center"><strong>Qty Received</strong></td>
	<td width="200"><div align="center"><strong>Unit Cost</strong></td>
	<td width="200"><div align="center"><strong>Amount</strong></td>
	<td width="200"><div align="center"><strong>VAT</strong></td>
       <!-- <td width="200"><div align="center"><strong>Qty Received</strong></td>	
	<td width="200"><div align="center"><strong>Balance Qty</strong></td>	
<td width="200"><div align="center"><strong>Delivery Date</strong></td>	
    <td width="200"><div align="center"><strong>Expiry Date</strong></td>
   	
	<td width="50"><div align="center"><strong>Edit</strong></td>-->

	<!--<td width="600"><div align="center"><strong>Enter Delivery date</strong></td>
	<td width="600"><div align="center"><strong>Enter Expiry date</strong></td>-->

    </tr>
  
  <?php 
 $grndttl=0; 
$sql="select * FROM purchase_order,items 
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
    
    <td><?php echo $rows->item_code;?><input type="hidden" name="product_code[]" size="20" value="<?php echo $rows->item_code;?>"></td>
    <td><?php echo $rows->item_name;?><input type="hidden" name="product_id[]" size="20" value="<?php echo $rows->item_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $qnty_ordered=$rows->quantity;?></td>
	<td align="right"><?php 
$order_code;
$product_id=$rows->product_id;

	$query1rp="select * from purchase_order where product_id='$product_id' and order_code='$order_code'";
    $results1rp=mysql_query($query1rp) or die ("Error: $query1rp.".mysql_error());
	$rows1rp=mysql_fetch_object($results1rp);
	
	echo number_format($unit_cost=$rows1rp->vendor_prc,2);
	
	$vat_value1=$rows1rp->order_vat_value;	
	
	
	
	?></td>
	<td align="center"><?php echo number_format($amnt=$unit_cost*$qnty_ordered,2);
	
	$grndttl=$grndttl+$amnt;
	
	?></td>
	
		<td align="center"><?php echo number_format($vat_value1,2);
	
	$ttl_vat1=$ttl_vat1+$vat_value1;
	
	?></td>
	
	


	
	
		
	
	
	
	
	
  
    </tr>
	
  <?php 
  
  }
  
  ?>
<tr bgcolor="#FFFFCC" height="30">
<td>Totals</td>
<td></td>
<td></td>
<td colspan="2" align="right"><strong><?php echo number_format($grndttl,2); ?></strong></td>

<td><strong><?php echo number_format($ttl_vat1,2); ?></strong></td>
</tr>  
  <?php
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
	 <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save Stock to the Warehouse">&nbsp;&nbsp;</td>
   
  </tr>-->
</table>
		

	
	 



			
			
			
					
			  </div>
				
				<div id="cont-right-half" class="br-5">
				<!--<div style="width:100%" class="br-5">-->
<form name="rec_prod" action="account_process_farmers_order.php?order_code_id=<?php echo $order_code_id; ?>&id=<?php echo $id; ?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="8" height="30" align="center"><strong><font color="#ff0000">Panel Posting Farmers Order To Accounts</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center"><?php
if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:450px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Stock Received successfully into the warehouse</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";

if ($_GET['exist']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! The Record Exists!!</font></p>";

if ($_GET['abnormal']==1)
echo "<p align='center'><font color='#FF0000'>Sorry!! Qantity Received cannot be more than ordered!!</font></p>";
?>
</td>
    </tr>




<?php 
if ($order_codehhh!='')
{

include('receive_stock_details.php');


}
else
{
?>












	
	<tr height="30" bgcolor="#ffffcc">

    <td align="center">Date Posted : <input type="text" name="delivery_date" value="<?php echo $rowsdc->posted_date; ?>" autocomplete="off" size="10" id="delivery_date" required />
	Account To Credit
	
<select name="credit_account_id"  id="account_from" required style="width:250px;"><option value="<?php echo $rowsdc->account_to_credit; ?>"><?php echo $rowsdc->account_code.' '.$rowsdc->account_type_name; ?></option>

<?php
								  
								  $query1r="select * from account_type order by account_type_name asc";
								  $results1r=mysql_query($query1r) or die ("Error: $query1r.".mysql_error());
								  
								  if (mysql_num_rows($results1r)>0)
								  
								  {
									  while ($rows1r=mysql_fetch_object($results1r))
									  
									  { ?>
										  
<option value="<?php echo $rows1r->account_type_id; ?>"><?php echo $rows1r->account_code.' '.$rows1r->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>











</select>	
	
	
	
	</td>

    </tr>
 
 
 <tr><td colspan="4">

       <table border="0" width="100%" align="center">	
<tr style="background:url(images/description.gif);" height="30" >

<td align="center" width="20%"><strong>Item Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Account To Debit</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>VAT</strong></td>
<td align="center"></td>

</tr>
	
								  
<?php 
$sql1="select * FROM purchase_order,items 
WHERE purchase_order.product_id=items.item_id AND purchase_order.order_code='$order_code_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { 
									  
									  $p_id=$rows1->product_id;

 $product_id=$rows1->product_id;

	$query1rp="select * from purchase_order where product_id='$product_id' and order_code='$order_code'";
    $results1rp=mysql_query($query1rp) or die ("Error: $query1rp.".mysql_error());
	$rows1rp=mysql_fetch_object($results1rp);
	
$unit_cost=$rows1rp->vendor_prc;									  
$vat_value=$rows1rp->order_vat_value;	

$ttl_vat_value=$ttl_vat_value+$vat_value;								  

									  
									  
									  
 $qnty_rec=$rows1->quantity;	

$quantity=$rows1->quantity;		


$quant_bal=$quantity-$qnty_rec;		

$RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}



$po_id=$rows1->purchase_order_id;


			  
									  ?>
									  
									  


<td align="">

<input type="hidden" name="purchase_order_id[<?php echo $po_id;?>]" value="<?php echo $po_id;?>">
<input type="hidden" name="item_id[<?php echo $po_id;?>]" value="<?php echo $rows1->item_id;?>">
<input type="checkbox"  hidden


checked 


name="prod[<?php echo $po_id; ?>]" value="<?php echo $rows1->product_id; ?>">

<?php echo $rows1->item_name; ?>



</td>

<td align="center">
<?php 
echo $qnty_rec;

?>
<input type="hidden"  name="qnty_rec[<?php echo $po_id; ?>]" value="<?php echo $qnty_rec; ?>" size="10"></td>

<td>
<?php 
$sqlemp_det2="select * from account_farmers_order,account_type where account_farmers_order.account_to_debit=account_type.account_type_id 
AND account_farmers_order.purchase_order_id='$po_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

$account_farmers_order_id=$rowsemp_det2->account_farmers_order_id;

?>

<select name="debit_account_id[<?php echo $po_id; ?>]" id="account_to<?php echo $po_id; ?>" required style="width:200px;"><option value="<?php echo $rowsemp_det2->account_type_id; ?>"><?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name; ?></option>

<?php
								  
								  $query1r="select * from account_type order by account_type_name asc";
								  $results1r=mysql_query($query1r) or die ("Error: $query1r.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1r=mysql_fetch_object($results1r))
									  
									  { ?>
										  
<option value="<?php echo $rows1r->account_type_id; ?>"><?php echo $rows1r->account_code.' '.$rows1r->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>






</select>

<script>


$("#account_to<?php echo $po_id; ?>").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>


</td>

<?php 

$cost_amount=$unit_cost*$qnty_rec;

$ttl_cost=$ttl_cost+$cost_amount;


?>


<td align="right">



<?php echo number_format($cost_amount,2); ?>

<input type="hidden"  name="unit_cost[<?php echo $po_id; ?>]" size="15" value="<?php echo $unit_cost; ?>">
<input type="hidden"  name="cost_amount[<?php echo $po_id; ?>]" size="15" value="<?php echo $cost_amount; ?>">


</td>
<td align="right">
<?php echo number_format($vat_value,2); ?>
<input type="hidden"  name="vat_value[<?php echo $po_id; ?>]" size="15" value="<?php echo  $vat_value;?>">

</td>

</tr>


							  
	<?php 
$ttl_quant=$ttl_quant+$quantity;
	
	
	}
	
	 $ttl_quant;
	
	?>
<tr height="40" bgcolor="#FFFFCC">
<td></td>
<td></td>
<td></td>
<td align="right">
<strong><?php echo number_format($ttl_cost,2); ?></strong>	
<input type="hidden" name="ttl_cost" value="<?php echo $ttl_cost; ?>"> 

</td>	

<td align="right">
<strong><?php echo number_format($ttl_vat_value,2); ?></strong>	
<input type="hidden" name="ttl_vat_value" value="<?php echo $ttl_vat_value; ?>">


<input type="hidden" name="ttl_order_value" value="<?php echo $ttl_vat_value+$ttl_cost; ?>"> 



</td>
</tr>

<tr height="40" bgcolor="#FFFFCC">
<td>Totals</td>
<td></td>
<td></td>
<td>
<strong><?php //echo number_format($ttl_cost,2); ?></strong>	


</td>	

<td align="right">
<strong><?php echo number_format($ttl_vat_value+$ttl_cost,2); ?></strong>	






</td>
</tr>


	<?php
	
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>							  
								  
								  
</table>	

  </div>							  
</td>								  
</tr>								  
								  
<?php 

}
?>								  
								  
								  
								  
								  
								  
								  
								  
		<?php
if ($order_codeff!='')
{

?>

<?php
}

else
{
?>							  
								  
								  


	
	
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Freight Charges (<?php echo $curr_name ?>)</td>
    <td><input type="text" name="freight_charges" size="41"/></td>
    </tr>-->
	
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Current Exchange Rate </td>
    <td><input type="text" name="curr_rate" size="30"/></td>
    </tr>-->
	
  
  
 
</table>
</div></br>
<table align="right" bgcolor="#fff">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>

<input type="submit" onClick="return confirmDelete();" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" name="submit" value="Save">&nbsp;&nbsp;</td>


	
	

  </tr>
  <tr height="30">
    <td>&nbsp;</td>
    <td colspan="2"><div id='rec_prod_errorloc' class='error_strings'></div></td>
   
    </tr>
	
	 <?php
}



?> 
 
</table>



	</form>	
	
	<script>

$('#start_time').datetimepicker({value:'',step:10});
$('#end_time').datetimepicker({value:'',step:10});

</script>
	
	
	
	
	
	
	
	
			<?php
if ($_GET['success']==1)
{

}

else
{
?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "delivery_date",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "delivery_date"       // ID of the button
    }
  );
  
  /* Calendar.setup(
    {
      inputField  : "expiry_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "expiry_date"       // ID of the button
    }
  ); */
  
 
  
  
  
  </script>
  
  <?php 
  }
  
  ?>
  
 <SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("rec_prod");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("delivery_date","req",">>Please enter delivery date");

 
 
  </SCRIPT>
  
    <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>
  
					
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