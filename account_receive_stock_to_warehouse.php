<?php include('Connections/fundmaster.php'); 


$order_code_id=$_GET['stock_code_id'];

$sqlrec="select * FROM received_stock_code,order_code_get,suppliers,currency WHERE 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=Suppliers.supplier_id AND received_stock_code.order_code_id=order_code_get.order_code_id AND received_stock_code.stock_code_id='$order_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->lpo_no;
$grn_no=$rowsrec->delivery_note_no;
$curr_name=$rowsrec->curr_name;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->supplier_id;
$order_code=$rowsrec->order_code_id;
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];
$sqltrunc = "DELETE FROM temp_sales_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());
include('select_search.php');

$id=$_GET['id'];
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
    return confirm("Are you sure you want to receive items to the store?");
}


</script>










<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php //require_once('includes/stocksubmenu.php');  ?>
		<?php require_once('includes/post_accounts_submenu.php'); ?>
		<h3>::Post Received Items To Accounts</h3>
         
				
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
	<strong>GRN Number</strong> :
    <?php echo $grn_no;?>
	
	
	<strong> Supplier Name:</strong><?php echo $rows->supplier_name;?>
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


    </tr>
  
  <?php 
 $grndttl=0; 
$sql="select * FROM received_stock,items 
WHERE received_stock.product_id=items.item_id AND received_stock.stock_code_id='$order_code_id'";
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
    <td><?php echo $rows->item_name;
	
	
$item_cat_id=$rows->cat_id;

$sql1_ct="select * FROM items_category WHERE cat_id='$item_cat_id'";
$results1_ct= mysql_query($sql1_ct) or die ("Error $sql1_ct.".mysql_error());
$rows_ct=mysql_fetch_object($results1_ct);

echo '<i>('.$rows_ct->cat_name.')</i>';
	
	
	
	
	
	
	?><input type="hidden" name="product_id[]" size="20" value="<?php echo $rows->item_id;?>">										
										<input type="hidden" name="order_code[]" size="20" value="<?php echo $order_code; ?>">
										<input type="hidden" name="supplier_id[]" size="20" value="<?php echo $supplier_id;?>">
										<input type="hidden" name="purchase_order_id[]" size="20" value="<?php echo $poi=$rows->purchase_order_id;?>">
										
	</td>
	<td align="center"><?php echo $qnty_ordered=$rows->quantity_rec;?></td>
	<td align="right"><?php 
$order_code;
$product_id=$rows->product_id;

	$query1rp="select * from purchase_order where purchase_order_id='$poi'";
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
<form name="rec_prod" action="account_process_rec_stock_to_warehouse_bulk.php?order_code_id=<?php echo $order_code_id; ?>&id=<?php echo $id; ?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="8" height="30" align="center"><strong><font color="#ff0000">Panel Posting Received Items To Accounts</strong></td>
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
	
	
	
$sql_dt="select * FROM account_received_stock_code,account_type,order_code_get,currency WHERE 
currency.curr_id=order_code_get.currency and account_received_stock_code.order_code_id=order_code_get.order_code_id 
and account_received_stock_code.account_to_credit=account_type.account_type_id 
AND account_received_stock_code.account_stock_code_id='$id'";
$results_dt= mysql_query($sql_dt) or die ("Error $sql_dt.".mysql_error());	
$rows_dt=mysql_fetch_object($results_dt);


	
	
	
	
	
	
	
?>












	
	<tr height="30" bgcolor="#ffffcc">

    <td align="center">Delivery Date : <input type="text" autocomplete="off" value="<?php echo $rows_dt->posted_date; ?>" name="delivery_date" size="10" id="delivery_date" required />
	Account To Credit
	
<select name="credit_account_id"  id="account_from" required style="width:250px;"><option value="<?php echo $rows_dt->account_type_id; ?>"><?php echo $rows_dt->account_code.' '.$rows_dt->account_type_name; ?></option>

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

       <table border="1" width="100%" align="center">	
<tr style="background:url(images/description.gif);" height="30" >

<td align="center" width="30%"><strong>Item Name</strong></td>
<td align="center"><strong>Qnty</strong></td>
<td align="center"><strong>Account To Debit</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>VAT</strong></td>
<td align="center"></td>

</tr>
	
								  
<?php 
$sql1="select * FROM received_stock,items 
WHERE received_stock.product_id=items.item_id AND received_stock.stock_code_id='$order_code_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { 
									  
									  $p_id=$rows1->product_id;

 $product_id=$rows1->product_id;
 $poid=$rows1->purchase_order_id;

	$query1rp="select * from purchase_order where purchase_order_id='$poid'";
    $results1rp=mysql_query($query1rp) or die ("Error: $query1rp.".mysql_error());
	$rows1rp=mysql_fetch_object($results1rp);
	
$unit_cost=$rows1rp->vendor_prc;									  
$vat_value=$rows1rp->order_vat_value;	

$ttl_vat_value=$ttl_vat_value+$vat_value;								  

									  
									  
									  
 $qnty_rec=$rows1->quantity_rec;	

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



$po_id=$rows1->received_stock_id;


			  
									  ?>
									  
									  


<td align="">

<input type="hidden" name="received_stock_id[<?php echo $po_id;?>]" value="<?php echo $po_id;?>">
<input type="hidden" name="purchase_order_id[<?php echo $po_id;?>]" value="<?php echo $poid;?>">
<input type="hidden" name="item_id[<?php echo $po_id;?>]" value="<?php echo $rows1->item_id;?>">
<input type="checkbox"  hidden


checked 


name="prod[<?php echo  $po_id; ?>]" value="<?php echo $rows1->product_id; ?>">

<?php echo $rows1->item_name; ?>







</td>

<td align="">
<?php echo $qnty_rec;  ?>
<input type="hidden" readonly name="qnty_rec[<?php echo $po_id; ?>]" value="<?php echo $qnty_rec; ?>" size="10"></td>

<td align="center">

<?php


	$query1rp_x="select * from account_received_stock,account_type where 
	account_type.account_type_id=account_received_stock.account_to_debit AND  
	account_received_stock.received_stock_id='$po_id'";
    $results1rp_x=mysql_query($query1rp_x) or die ("Error: $query1rp_x.".mysql_error());
	$rows1rp_x=mysql_fetch_object($results1rp_x);


?>


<input type="hidden" name="account_stock_id[<?php echo $po_id; ?>]" value="<?php echo $rows1rp_x->account_stock_id; ?>">



<select name="debit_account_id[<?php echo $po_id; ?>]" id="account_to<?php echo $po_id; ?>" required style="width:200px;"><option value="<?php echo $rows1rp_x->account_type_id; ?>"><?php echo $rows1rp_x->account_code.' '.$rows1rp_x->account_type_name; ?></option>

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


<input type="hidden" name="ttl_order_value" value="<?php echo $ttl_cost; ?>"> 



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
<strong><?php echo number_format($grand_order_value=$ttl_vat_value+$ttl_cost,2); ?></strong>	



<input type="hidden" name="grand_order_value" value="<?php echo $grand_order_value; ?>"> 


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
      ifFormat    : " %Y-%m-%d  ",    // the date format
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