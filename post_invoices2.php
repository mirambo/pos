<?php 
$sales_id=$_GET['sales_id'];
$id=$_GET['id'];
$sqlrec="SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$customer_id=$rowsrec->customer_id;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->general_remarks;
$salesrep_id=$rowsrec->sales_rep; 
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;
$canceled_status=$rowsrec->canceled_status;

$sqlcnt="SELECT * FROM account_invoice_code,sales,account_type where account_invoice_code.account_to_debit=account_type.account_type_id and sales.sales_id=account_invoice_code.invoice_id 
AND account_invoice_code_id='$id'";
$resultscnt= mysql_query($sqlcnt) or die ("Error $sqlcnt.".mysql_error());
$rowscnt=mysql_fetch_object($resultscnt);

$rowscnt->account_type_name;
$shop_id=$rowsrec->shop_id;
$orig_shop_id=$_GET['orig_shop_id'];




$querytcsp="select * from customer where customer_id='$customer_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$customer_name=$rowstcsp->customer_name;
$region_id=$rowstcsp->region_id;


$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->invoice_no;
$currency=$rowsrec->currency;
$discount=$rowsrec->discount;
$vat=$rowsrec->vat;
$sales_date=$rowsrec->sale_date;
$order_no=$rowsrec->order_no;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;
/* $curr_rate=$rowsrec->curr_rate;
$status=$rowsrec->status; */


$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $mop=$rowsrec->mop;

/* $querymop="select * from mop where mop_id='$mop'";
$resultsmop=mysql_query($querymop) or die ("Error: $querymop.".mysql_error());								  
$rowsmop=mysql_fetch_object($resultsmop);
$mop_name=$rowsmop->mop_name; */


$invoice_id=$sales_id;





$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;

$queryprof1="select * from client_discount where client_id='$sales_rep'";
$resultsprof1=mysql_query($queryprof1) or die ("Error: $queryprof1.".mysql_error());
$rowsprof1=mysql_fetch_object($resultsprof1);
$com_perc=$rowsprof1->comm_perc;

include('select_search.php');


?>

<Script Language="JavaScript">

function load() {
var load = window.open('add_invoice_item.php?sales_id=<?php echo $sales_id; ?>','','scrollbars=no,menubar=no,height=300,width=800,resizable=yes,toolbar=no,location=no,status=no');
}

</Script>

<!--<script src="jquery.min.js"></script>
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
<script src="js/application.js" type="text/javascript" charset="utf-8"></script> -->


	<h3 align="center">View Invoice Details
	
	

	
	
	</h3>
	
	<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to post this invoice to accounts?");
}



</script>

<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
	
	
<form name="rec_prod" action="process_post_invoices.php?sales_id=<?php echo $sales_id; ?>&id=<?php echo $id; ?>" method="post">		
<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">



<strong>

Invoice No : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Customer Name : </strong><i><?php echo $customer_name;  ?></i>
	
	
	
	<strong>Sales Date :</strong><i><?php echo $sales_date; ?>
	
	
	<input type="text" name="sales_date" id="from" value="<?php echo $sales_date; ?>">
	
	
	</i>
	
	<strong>Ref No: </strong><i><?php echo $order_no;  ?></i>
	
	<input type="text" name="ref_no2" id="from" value="<?php echo $order_no; ?>">

	</br>

	

	<strong>Terms : </strong><i><?php echo $general_remarks;  ?></i> 
	
	
	
	<strong>Currency : </strong><i><?php echo $curr_name; ?>
		<strong>Rate : </strong><i><?php //echo $curr_rate; ?></i>
		
		<input type="text" name="curr_rate2" id="from" value="<?php echo $curr_rate; ?>">
	
	
	<strong>Delivery Address : </strong><i><?php echo $delivery_address;  ?></i> 
	
	
	

		
		
	
	

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center">Account To Debit
	
<select name="debit_account_id" id="account_from" required style="width:350px;">
<option value="<?php echo $rowscnt->account_type_id; ?>"><?php echo $rowscnt->account_code.' '.$rowscnt->account_type_name; ?></option>

<?php
								  
								  $query1r="select * from account_type where account_cat_id='2' order by account_type_name asc";
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


<input type="hidden" name="sales_date555" value="<?php echo $sales_date; ?>">


</td></tr>



<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->



<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong>

</td></tr>
<tr><td>
<table width="100%" class="table1">

  <tr  style="background:url(images/description.gif);" height="30" >
<td align="center"><strong>Items Code</strong></td>
<td align="center"><strong>Items Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price(<?php echo $curr_name; ?>)</strong></td>
<td align="center"><strong>Amount(<?php echo $curr_name; ?>)</strong></td>
<!--<td align="center"><strong>Discount</strong></td>-->
<td align="center"><strong>VAT(18%)</strong></td>
<td align="center"><strong>Total(<?php echo $curr_name; ?>)</strong></td>
<td align="center"><strong>Account To Credit</strong></td>
</tr>
<?php 
$task_totals=0;
$vat_value=0;
$item_total=0;

$amnt=0;
$item_vat_value=0;

$sqllpdet="select * FROM sales_item,items WHERE sales_item.item_id=items.item_id AND 
sales_item.sales_id='$sales_id' order by sales_item_id desc";
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
<td><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td >
<?php 

$batch_no=$rowslpdet->batch_no;
$man_date=$rowslpdet->man_date;
$expiry_date=$rowslpdet->expiry_date;

echo $product_name=mysql_real_escape_string($rowslpdet->item_name);

if ($batch_no=='')
{
	
}
else
{
//echo ' <i>(Batch No :'.$batch_no.') ';
}

if ($man_date=='0000-00-00')
{
	
}
else
{
//echo 'Mfg.Date : '.$rowslpdet->man_date;
}

if ($expiry_date=='0000-00-00')
{
	
}
else
{

//echo 'Exp. Date : '.$rowslpdet->expiry_date.'</i>';
}
$prod=$rowslpdet->item_id;

$po_id=$rowslpdet->sales_item_id;


?>



</td>
<td ><?php echo $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?>


<input type="hidden" name="item_id[<?php echo $po_id; ?>]" value="<?php echo $prod; ?>">
<input type="hidden" name="item_id[<?php echo $po_id; ?>]" value="<?php echo $prod; ?>">
<input type="hidden" name="sales_item_id[<?php echo $po_id; ?>]" value="<?php echo $po_id; ?>">



</td>
<td align="right"><?php 
	
		
	
	 echo number_format($item_cost=$rowslpdet->item_cost,2);
	

	
$item_bp2=$rowslpdet->item_bp;

if ($item_bp2=='')
{
	
$item_bp=$rowslpdet->curr_bp;
}
else
{

$item_bp=$item_bp2;	
	
}
	
	
	
	?>
	
	
	
		<input type="hidden" name="item_price[<?php echo $po_id; ?>]" value="<?php echo $item_cost; ?>">
	
	</td>
	
	
	<td align="right">
	
	<?php 
echo number_format($amnt=$item_cost*$qnty,2);
	
?>
	
	
	</td>
	
	
	<td align="right"><?php echo number_format($item_vat_value=$rowslpdet->vat_value,2); 
	
	$vat_value=$vat_value+$item_vat_value;
	
	
	
	?>
	
	<input type="hidden" name="vat_amount[<?php echo $po_id; ?>]" value="<?php echo $item_vat_value; ?>">
	
	</td>
	<td align="right"><?php echo number_format($item_total=$amnt+$item_vat_value,2); ?>
	
	<input type="hidden" name="item_amount[<?php echo $po_id; ?>]" value="<?php echo $item_total; ?>">
	
	
	</td>
	

	
	</td>
<td align="center">

<?php 

$sqlemp_det2="select * from account_invoice,account_type where account_invoice.account_to_credit=account_type.account_type_id AND 
account_invoice.sales_item_id='$po_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

?>


<input type="hidden" name="account_invoice_id[<?php echo $po_id; ?>]" value="<?php echo $rowsemp_det2->account_invoice_id; ?>">














<select name="credit_account_id[<?php echo $po_id; ?>]"  id="account_to<?php echo $po_id; ?>" required style="width:250px;"><option value="<?php echo $rowsemp_det2->account_type_id; ?>"><?php echo $rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name; ?></option>

<?php
								  
								  $query1r3="select * from account_type WHERE account_type_name LIKE '%sales%' order by account_type_name asc";
								  $results1r3=mysql_query($query1r3) or die ("Error: $query1r3.".mysql_error());
								  
								  if (mysql_num_rows($results1r3)>0)
								  
								  {
									  while ($rows1r3=mysql_fetch_object($results1r3))
									  
									  { ?>
										  
<option value="<?php echo $rows1r3->account_type_id; ?>"><?php echo $rows1r3->account_code.' '.$rows1r3->account_type_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>






</select>

  <script>


$("#account_to<?php echo $po_id; ?>").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	

	
	
</script></td>

</tr>

<?php
$task_totals=$task_totals+$amnt;
$bp_totals=$bp_totals+$amnt_bp;
}
?>
<tr><td ></td>
<td></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); 
$vat_value

?></strong></td>
<td ></td>
<td ></td>
</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>Discount</strong></td>
<td align="right"><strong><?php 



echo number_format($disc_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>Sub Total 1</strong></td>
<td align="right"><strong><?php  number_format($sub_ttl1=$task_totals-$disc_value,2); 



echo number_format($sub_ttl1,2)

?></strong></td>
<td ></td>
<td ></td>
</tr>

<tr><td ></td>
<td></td>
<td align="right"><strong>VAT (18%)</strong></td>
<td align="right"><strong><?php echo number_format($vat_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>


<tr><td ></td>
<td></td>
<td align="right"><strong>Grand Total</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl1+$vat_value,2); ?></strong></td>
<td ></td>
<td ></td>
</tr>

<?php 
}
else
{
?>
<tr><td align="center" colspan="10"><font color="#ff0000">No results found!!</font></td></tr>
<?php
}

?>


<tr><td ></td>
<td></td>
<td align="right"><strong>Balance</strong></td>
<td align="right"><strong><font color="#ff0000" size="+1"><?php

$bal=$grnd_ttl-$amount_received;



echo number_format($bal,2); 





 ?></font></strong>
 <input type="hidden" name="invoice_amount" value="<?php echo $bal; ?>">
 
 </td>
<td ></td>
<td >
</td>
</tr>







</td></tr>

</table>
</table>


<?php 

?>	

</table>

<table width="100%">
<tr>
<td align="center">
<input  type="submit" onClick="return confirmDelete();" style="background:#009900; font-size:13px; color:#ffffff; font-weight:bold; width:200px; height:30px; border-radius:5px;" name="submit" value="Post To Accounts">&nbsp;&nbsp;

</td>

</tr>
</table>

	</form>	

  <script>


$("#account_from").select2( {
	placeholder: "Select Account",
	allowClear: true
	} );
	
	
</script>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "from"       // ID of the button
    }
  );
  

  
  
  </script> 