<?php 
//$order_code_id=$_GET['order_code_id'];
$order_code=$_GET['order_code'];

$sqlrec="SELECT * FROM requisition WHERE requisition_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$lpo_no=$rowsrec->requisition_no;
$req_date=$rowsrec->date_generated;
$ref_no=$rowsrec->ref_no;
$comments=$rowsrec->comments;
$curr_name=$rowsrec->curr_name;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$supplier_id=$rowsrec->requested_by;
$qnty_ordered=$_GET['qnty_ordered'];
$purchase_order_id=$_GET['purchase_order_id'];
$sqltrunc = "DELETE FROM temp_sales_returns";
$resultstrunc=mysql_query($sqltrunc) or die ("Error: $sqltrunc.".mysql_error());




include('select_search.php');

$sqlb="select * from users where user_id='$supplier_id'";
$resultsb= mysql_query($sqlb) or die ("Error $sqlb.".mysql_error());
$rowsb=mysql_fetch_object($resultsb);
?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


				
				<div id="cont-right-full" class="br-5">
				<!--<div style="width:100%" class="br-5">-->
<form name="rec_prod" action="process_post_issued_items_to_accounts.php?order_code=<?php echo $order_code; ?>" method="post">					
				<table width="80%" border="0" align="center">
				 <tr bgcolor="#FFFFCC">
    
	<td colspan="8" height="30" align="center"><strong><font color="#ff0000">Panel for Post Items To accounts</strong></td>
    </tr>
  <tr bgcolor="#FFFFCC">
    
	<td colspan="4" height="30" align="center">
	
	
	<strong>Requisition Number </strong> :
    <?php echo $lpo_no;?>
	
		<strong>Ref No </strong> :
    <?php echo $ref_no;?>
	</br>
	</br>
			<strong>Date Requested </strong> :
    <?php echo $req_date;?>
	
	
	<strong>Requested By:</strong><?php echo $rowsb->f_name;?>
	

	</td>
    </tr>	
	
	
</td>
    </tr>




<?php 
if ($order_codedd!='')
{

include('receive_stock_details.php');


}
else
{
?>












	
	<tr height="30" bgcolor="#ffffcc">

    <td align="center">Date Issued : <input type="text" name="delivery_date" autocomplete="off" size="20" id="delivery_date" required /><!--Account To Credit
	
<select name="credit_account_id" id="account_from" required style="width:250px;"><option value="">Select..............................</option>

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











</select>-->	</td>

    </tr>
 
 
 <tr><td colspan="4">

       <table border="0" width="100%" align="center">	
<tr style="background:url(images/description.gif);" height="30" >

<td align="center" width="30%"><strong>Item Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Unit Cost</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Account To Debit</strong></td>
<td align="center"><strong>Account To Credit</strong></td>

</tr>
	
								  
<?php 
$sql1="select * FROM requisition_item,items WHERE requisition_item.item_id=items.item_id AND 
requisition_item.requisition_id='$order_code'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { 
									  
									  $p_id=$rows1->item_id;
									  $po_id=$rows1->requisition_item_id;
									  
$sqlord1="select SUM(quantity_issued) as ttl_issued from issued_items where requisition_item_id='$po_id' and requisition_id='$order_code'";
$resultsord1= mysql_query($sqlord1) or die ("Error $sqlord1.".mysql_error());
$rowsord1=mysql_fetch_object($resultsord1);
	

$qnty_rec=$rowsord1->ttl_issued;	

$unit_cost=$rows1->item_value;



$quantity=$rows1->item_quantity;



$quant_bal=$quantity-$qnty_rec;	

$cost_amount=$quant_bal*$unit_cost;	

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
									  
									  


<td align="">

<input type="hidden" name="requsition_item_id[<?php echo $po_id; ?>]" value="<?php echo $po_id; ?>">


<input type="checkbox"  hidden


checked 


name="prod[<?php echo $po_id; ?>]" value="<?php echo $item_id=$rows1->item_id; ?>">

<?php echo $rows1->item_name; 

$item_cat_id=$rows1->cat_id;

$sql1_ct="select * FROM items_category WHERE cat_id='$item_cat_id'";
$results1_ct= mysql_query($sql1_ct) or die ("Error $sql1_ct.".mysql_error());
$rows_ct=mysql_fetch_object($results1_ct);

echo ' <i>('.$rows_ct->cat_name.')</i>';



	

?>



</td>

<td align="center">

<?php echo $qnty_rec;?>
<input type="hidden" name="qnty_rec[<?php echo $po_id; ?>]" value="<?php echo $qnty_rec ?>" size="10%">



<?php $ttl_item_quant=$ttl_item_quant+$quant_bal; ?>


</td>

<td align="right">
<?php echo number_format($item_value=$rows1->item_value,2);?>
<input type="hidden" readonly name="item_value[<?php echo $po_id; ?>]" value="<?php echo $rows1->item_value;   ?>">
</td>

<td align="right"><?php echo number_format($amount=$qnty_rec*$item_value,2); 


$ttl_item_value=$ttl_item_value+$amount;

?></td>

<td>



<select name="debit_account_id[<?php echo $po_id; ?>]"  id="account_to<?php echo $po_id; ?>" required style="width:250px;"><option value="">Select..............................</option>

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

<td>



<select name="credit_account_id[<?php echo $po_id; ?>]"  id="account_from<?php echo $po_id; ?>" required style="width:250px;"><option value="">Select..............................</option>

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


$("#account_from<?php echo $po_id; ?>").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script>

</td>



</tr>

							  
	<?php 
$ttl_quant=$ttl_quant+$quantity;
	
	
	}
	
	 $ttl_quant;
	
	?>
	
<input type="hidden" name="ttl_qnty_rec" value="<?php echo $ttl_quant; ?>"> 	
<input type="hidden" name="ttl_item_value" value="<?php echo $ttl_item_value; ?>"> 	
	<?php
	
									  
									  
									  }
								  
								  
 $ttl_item_quant;						  
								  
								  ?>							  
								  
								  
</table>	

  </div>							  
</td>								  
</tr>								  
								  
<?php 

}
?>								  
								  
								  
								  
								  
								  
								  
								  
		<?php
if ($order_code_ff!='')
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
</div>



<table align="right" width="100%" style="margin-top:10px;" border="0" bgcolor="#fff">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">
	
	<?php 
$sqlord1i="select SUM(quantity_issued) as ttl_quant_rec from issued_items,items where issued_items.item_id=items.item_id AND 
issued_items.requisition_id='$order_code'";
$resultsord1i= mysql_query($sqlord1i) or die ("Error $sqlord1i.".mysql_error());
$rowsord1i=mysql_fetch_object($resultsord1i);

$quant_issued=$rowsord1i->ttl_quant_rec;


$sqlord1p="select SUM(quantity_issued) as ttl_quant_post from account_issued_stock,items where account_issued_stock.issued_item_id=items.item_id AND 
account_issued_stock.requisition_id='$order_code'";
$resultsord1p= mysql_query($sqlord1p) or die ("Error $sqlord1.".mysql_error());
$rowsord1p=mysql_fetch_object($resultsord1p);


$qnty_post=$rowsord1p->ttl_quant_post;	
	
	
if ($quant_issued==$qnty_post) 	
{
		?>

<input  type="submit" disabled style="background:#ff0000; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" value="Record Already Posted!!">&nbsp;&nbsp;

<?php 
	
}
else
{
	?>

<input  type="submit" onClick="return confirmDelete();" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" name="submit" value="Post To Accounts">&nbsp;&nbsp;

<?php 

}

?>

</td>


	
	

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

			
			
			
					
	
				
				