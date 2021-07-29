<?php 

include('Connections/fundmaster.php'); 

$order_code_id=$_GET['order_id'];
$id=$_GET['id'];

$querydc="select * FROM received_supplier_invoice_code,order_code_get,suppliers WHERE suppliers.supplier_id=order_code_get.supplier_id 
and received_supplier_invoice_code.order_code_id=order_code_get.order_code_id AND 
received_supplier_invoice_code.received_supplier_invoice_code_id='$id'";
$resultsdc= mysql_query($querydc) or die ("Error $querydc.".mysql_error());
$rowsdc=mysql_fetch_object($resultsdc);


$account_credited=$rowsdc->account_to_credit;
	
$sqlsp2="select * from account_type where account_type_id='$account_credited'";
$resultssp2= mysql_query($sqlsp2) or die ("Error $sqlsp2.".mysql_error());
$rowssp2=mysql_fetch_object($resultssp2);

$account_credited_name=$rowssp2->account_code.' '. $rowssp2->account_type_name;


$account_debited=$rowsdc->account_to_debit;

$sqlsp2="select * from account_type where account_type_id='$account_debited'";
$resultssp2= mysql_query($sqlsp2) or die ("Error $sqlsp2.".mysql_error());
$rowssp2=mysql_fetch_object($resultssp2);

$account_debited_name=$rowssp2->account_code.' '. $rowssp2->account_type_name;



$sqlrec="select * FROM order_code_get,suppliers,currency WHERE 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=Suppliers.supplier_id 
and order_code_get.order_code_id='$order_code_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->lpo_no;
$ref_no=$rowsrec->ref_no;
$lpo_date=$rowsrec->date_generated;
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



<script>
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr height='30'>");
        var cols = "";

        //cols += '<td><input type="text" class="form-control" name="account[]' + counter + '"/></td>';
        cols += '<td><select required id="account_from'+ counter +'" name="debit_account_id[]' + counter + '"  style="width:200px;"><option value="">Select..............................</option><?php $query1="select * from account_type  order by account_type_name asc";  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());  if ($num_rows1=mysql_num_rows($results1)>0) { while ($rows1=mysql_fetch_object($results1)) {  ?><option value="<?php echo $rows1->account_type_id; ?>"><?php echo $rows1->account_code." - ".mysql_real_escape_string($rows1->account_type_name); ?></option><?php      } } ?></select><?php include('"account_from.php"');?></td>';
        cols += '<td><input required type="text" class="txt" name="debit_amount[]' + counter + '"/> <input type="button"  class="ibtnDel btn btn-md btn-danger" value="-Remove"></td>';
      
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});





function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
 
</script>


<form name="rec_prod" action="process_receive_supplier_invoice.php?order_code_id=<?php echo $order_code_id; ?>&id=<?php echo $id; ?>" method="post">					
				<table width="100%" border="0">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="8" height="30" align="center"><strong><font color="#ff0000">Panel Recording Supplier Invoice</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center">

<strong>Date Ordered: </strong><i><?php echo $lpo_date;  ?></i>

<strong>

LPO Number : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Supplier : </strong><i><?php echo $supplier_name=$rowsrec->supplier_name;  ?></i>
	
	
	
	<strong>Mode Of Payment :</strong><i><?php echo $mop_name=$rowsrec->mop_name;  ?></i>
	
	<strong>Currency: </strong><i><?php echo $curr_name=$rowsrec->curr_name;  ?></i>
	
	<strong>Rate: </strong><i><?php echo $curr_rate=$rowsrec->curr_rate;  ?></i>
	<br/>
	<br/>
	<strong>Terms Of Payments : </strong><i><?php  echo $lpo_type=$rowsrec->payment_schedule;  
	

	
	?></i>
	
	<strong>Delivery Conditions : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	
	<strong>Order Ref. No : </strong><i><?php echo $rowsrec->ref_no;  ?></i> 	
	
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

    <td align="center">
	Date Invoice Received : <input type="text" name="date_paid" autocomplete="off" size="10" value="<?php echo $rowsdc->date_paid; ?>" id="delivery_date" required />
	
		Ref No/Invoice No : <input type="text" name="ref_no" value="<?php echo $rowsdc->supplier_invoice_no; ?>" autocomplete="off" size="10" required />
		
			Rate : 
	<input type="text" name="curr_rate" autocomplete="off" size="10" value="<?php echo $curr_rate;?>" required />
	
		
		Comments : <input type="text" name="comments" autocomplete="off" size="40" value="<?php echo $rowsdc->comments; ?>" required />
	
	
	<input type="hidden" name="currency" autocomplete="off" size="10" value="<?php echo $currency;?>" required />

	</td>

    </tr>
	
	<tr height="30" bgcolor="#ffffcc">

    <td align="center">
	
<table  border="0" width="70%" align="center" class="table order-list">	
	<tr>	
	
	<td width="20%"><input type="button" id="addrow" class="btn btn-success" value="+Add Debit Account" /></td>
	
	<td width="30%"></td>
		
<td width="40%">




Account To Credit
	
<select name="credit_account_id"  id="account_from2" required style="width:250px;"><option value="<?php echo $account_credited; ?>"><?php echo $account_credited_name; ?></option>

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
	
	
<?php 
if ($id!='')

{
	
$sqlemp_det2="select * from received_supplier_invoice,account_type where 
received_supplier_invoice.account_to_debit=account_type.account_type_id 
AND received_supplier_invoice.received_supplier_invoice_code_id='$id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
	
$received_supplier_invoice_id=$rowsemp_det2->received_supplier_invoice_id;	
?>
<tr>
<td>


<input type="hidden" name="received_supplier_invoice_id[<?php echo $received_supplier_invoice_id; ?>]" value="<?php echo $received_supplier_invoice_id; ?>">


<select name="debit_account_id[<?php echo $received_supplier_invoice_id; ?>]"  id="account_from2" required style="width:250px;"><option value="<?php echo $rowsemp_det2->account_to_debit; ?>"><?php echo $rowsemp_det2->account_type_name; ?></option>

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











</select></td>
<td>


<input required type="text" value="<?php echo $rowsemp_det2->debit_amount; ?>" name="debit_amount[<?php echo $received_supplier_invoice_id; ?>]"/>

</td>
<td></td>

</tr>

<?php
}	
	
}
else
{
	
	
}


?>
	
	
	
	
	</table>
	
	</td>

    </tr>
 
 
 <tr><td colspan="4">

       <table border="0" width="80%" align="center">	
<tr style="background:url(images/description.gif);" height="30" >

<td align="center" width="20%"><strong>Item Name</strong></td>
<td align="center" width="20%"><strong>Quantity</strong></td>
<td align="center" width="20%"><strong>Unit Cost</strong></td>
<td align="center" width="20%"><strong>Amount</strong></td>
<td align="center" width="20%"><strong>VAT</strong></td>


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



$po_id=$rows1->received_stock_id;


			  
									  ?>
									  
									  


<td align="">

<input type="hidden" name="purchase_order_id[<?php echo $po_id;?>]" value="<?php echo $po_id;?>">
<input type="hidden" name="item_id[<?php echo $po_id;?>]" value="<?php echo $rows1->item_id;?>">
<input type="checkbox"  hidden


checked 


name="prod[<?php echo  $po_id; ?>]" value="<?php echo $rows1->product_id; ?>">

<?php echo $rows1->item_name; ?>



</td>

<td align="center">
<?php 
echo $qnty_rec;

?>
<input type="hidden"  name="qnty_rec[<?php echo  $po_id; ?>]" value="<?php echo $qnty_rec; ?>" size="10"></td>



<?php 

$cost_amount=$unit_cost*$qnty_rec;

$ttl_cost=$ttl_cost+$cost_amount;


?>

<td align="right"><?php echo number_format($rows1->vendor_prc,2); ?></td>
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
<strong><?php echo number_format($ttl_vat_value,2); ?></font></strong>	
<input type="hidden" name="ttl_vat_value" value="<?php echo $ttl_vat_value; ?>">


<input type="hidden" name="ttl_order_value" value="<?php echo $ttl_vat_value+$ttl_cost; ?>"> 



</td>
</tr>

<tr height="40" bgcolor="#FFFFCC">

<td></td>
<td></td>

<td>
<strong><?php //echo number_format($ttl_cost,2); ?></strong>	


</td>	
<td align="right"><strong><font size="+1">Totals</font></strong></td>

<td align="right">
<strong><font size="+1"><?php echo number_format($ttl_vat_value+$ttl_cost,2); ?></font></strong>	






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
								  

	
  
  
 
</table>
</br>
<table align="center" bgcolor="#fff">
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
	
	
	$("#account_from2").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>
  
					
			