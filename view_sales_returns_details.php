<?php 
$sqlrec="select * FROM mop,currency,customer,sales_returns WHERE sales_returns.mop_id=mop.mop_id AND 
sales_returns.currency=currency.curr_id AND sales_returns.customer_id=customer.customer_id AND 
sales_returns.sales_returns_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->customer_id;
$customer_id=$rowsrec->customer_id;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->credit_note_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;
$freight_charge=$rowsrec->freight_charge;

$status=$rowsrec->status;

$queryshp="select * from sales where sales_id='$freight_charge'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$inv_no=$rowshp->invoice_no;


$querytcsp="select * from customer where customer_id='$customer_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$customer_name=$rowstcsp->customer_name;
$region_id=$rowstcsp->region_id;

?>
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

	<h3 align="center">View Sales Returns Details
	
	<?php 
	/* if ($status==2)
	{ */
	
	?>
	<a style="float:right; margin-right:200px;" target="_blank" href="print_credit_note_items.php?order_code=<?php echo $order_code; ?>">
	
	Print Credit Note
	
	
	</a>
	
	<!--<a style="float:right; margin-right:50px;" href="print_credit_note_excel.php?order_code=<?php echo $order_code; ?>">
	
	Export To Excel
	
	
	</a>-->
	<?php
/* }
if ($status==0)
{ */?>
<span style="float:right; margin-right:200px; color:#ff0000; font-size:11px;"><!--Can Only be printed after approval--></span>
<?php


//}

	?>
	
	
	</h3>
	
	
	
<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">



<strong>
Invoice No : </strong><i><?php echo $inv_no;?></i>
<strong>Credit Note Number : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Customer : </strong><i><?php echo $customer_name=$rowsrec->customer_name;  ?></i>
	
	
	
	<strong>Sales Return Date :</strong><i><?php echo $order_date=$rowsrec->date_generated;  ?></i>
	<br/>
	<br/>
	<strong>Currency: </strong><i><?php echo $curr_name=$rowsrec->curr_name;  ?></i>
	<strong>Exchange Rate: </strong><i><?php echo $scurr_rate=$rowsrec->curr_rate;  ?></i>
	
	
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<?php

	if ($status==2)
	{
	}
	else
	{
	?>
	
	<!--<a rel="facebox" href="edit_sales_returns.php?order_code=<?php echo $order_code;?>"><img src="images/edit.png"> </a>-->
	<?php 
	}
	
	?>	
		
		
		<br/>
	<br/>

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns  added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Items Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Sales Returns items Updated Successfully!!</font></strong></p></div>';

if ($_GET['editbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer Belongings Details Updated Successfully!!</font></strong></p></div>';


if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Updated Successfully!!</font></strong></p></div>';


?>
<?php

if ($_GET['delete']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td></tr>



<!--<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><a style="font-weight:bold; color:#ff0000;" href="home.php?areareport=areareport&booking_id=<?php echo $booking_id; ?>">!!!!!Click Here To Add More Parts!!!!</a></td></tr>-->


<?php 
if ($view==1)
{

}
else
{
?>

<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_sr_item.php?order_code=<?php echo $order_code; ?>">



<!--Add More Item..-->


</a>
<a title="Creating New Items That doesnt exist" style="color:#009900;font-weight:bold; float:right;" rel="facebox" href="create_new_itemlpo.php?order_code=<?php echo $order_code ?>"> <!--[ Create New Items ]--></a>
</td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>Items Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>
<?php 
$task_totals=0;
$sqllpdet="select * FROM sales_returns_items,items 
WHERE sales_returns_items.item_id=items.item_id AND sales_returns_items.sales_returns_id='$order_code'";
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
echo '<tr bgcolor="#FFFFCC" height="25">';
}
 
 
 ?>
<td ><?php echo $product_name=$rowslpdet->item_name.' ('.$rowslpdet->item_code.')'; 
$prod=$rowslpdet->item_id;
?></td>
<td ><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;?></td>
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
	<td align="right">
	
	<?php 
echo number_format($amnt=$vendor_prc*$qnty,2);
	
$curr_bp2=$rowslpdet->ret_item_bp;



if ($curr_bp2=='')
{
	
$curr_bp=$rowslpdet->curr_bp;
}
else
{

$curr_bp=$curr_bp2;	
	
}


$amnt_bp=$curr_bp*$qnty;

	
$latest_received_stock_id=$rowslpdet->sales_returns_items_id;

	
$tr_code='slsret'.$latest_received_stock_id;
$sqlprofy="select * from inventory_ledger where order_code='$tr_code'";

$memo2='Invoice Sales <a href="generate_invoice.php?sales_id='.$sales_id.'">Invoice No:'.$lpo_no.'</a> whose cost/BP is '.$curr_bp.' each';

$resultsprofy=mysql_query($sqlprofy) or die ("Error $sqlprofy.".mysql_error());
$numrowsprofy=mysql_num_rows($resultsprofy);

$transaction="Returned".$qnty." ".$product_name." on <a href='generate_sales_returns.php?order_code=".$order_code."'>credit note ".$lpo_no."</a> sold though ".$memo2;

if ($numrowsprofy>0)	
{
	
$sqlaccpay="update inventory_ledger SET 
date_recorded='$order_date',
transactions='Returned $qnty $product_name on credit note : $lpo_no sold through Invoice No : $inv_no',
amount='$amnt_bp',
debit='$amnt_bp'
where order_code='$tr_code'";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
}
else
{
	
$sqlaccpay="insert into inventory_ledger values('','Returned $qnty $product_name on credit note $lpo_no','$amnt_bp','$amnt_bp','','$currency','$curr_rate','$order_date','$tr_code','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}
	
	?>
	
	
	</td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{

if ($status==2)
	{
	}
	else
	{
	?>

	<!--<a rel="facebox" href="edit_sales_returns_trans.php?purchase_order_id=<?php echo $rowslpdet->sales_returns_items_id; ?>&order_code=<?php echo $order_code; ?>"><img src="images/edit.png"></a>-->
	<?php
	}
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
<td align="center">
<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
if ($status==2)
	{
	}
	else
	{
	?>
	

<!--<a href="delete_sr_trans.php?order_code=<?php echo $order_code; ?>&purchase_order_id=<?php echo $rowslpdet->sales_returns_items_id;?>"><img src="images/delete.png" onClick="return confirmDelete();"></a>-->

<?php
}
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
</td>
</tr>

<?php
$task_totals=$task_totals+$amnt;
$bp_totals=$bp_totals+$amnt_bp;
}
?>
<tr><td ><strong>Items Totals</strong></td><td></td><td></td><td align="right"><strong><?php echo number_format($task_totals,2); 

$transaction_code="crdn".$order_code;
$sales_date=$order_date;

$memo2='Sales Return <a href="generate_sales_returns.php?order_code='.$order_code.'">Credit Note No:'.$lpo_no.'</a> From <a href="generate_invoice.php?sales_id='.$freight_charge.'">Invoice No.'.$inv_no.'</a>';

$sqlprof="select * from customer_transactions where transaction_code='$transaction_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{

$sqltrans="update customer_transactions SET 
customer_id='$customer_id',
transaction_date='$sales_date',
amount='-$task_totals',
sales_id='$sales_id',
region_id='$region_id',
shop_id='$salesrep_id',
transaction='$memo2'
where transaction_code='$transaction_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqltranslg= "UPDATE sales_returns_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='$task_totals',
debit='$grand_ttl',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());


//update sales ledger
$sqltranslg= "UPDATE accounts_receivables_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='-$task_totals',
credit='$task_totals',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE sales_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

$sqltranslg= "UPDATE cost_of_production_ledger SET
transactions='$memo2',
date_recorded='$sales_date',
amount='-$bp_totals',
debit='$bp_totals',
currency_code='$currency',
curr_rate='$curr_rate'

WHERE order_code='$transaction_code'";
$resultstranslg=mysql_query($sqltranslg) or die ("Error $sqltranslg.".mysql_error());

}
else
{
	
	
$sqltrans= "insert into customer_transactions values('','$customer_id','$memo2','-$task_totals','$sales_date','$transaction_code','$sales_rep','$sales_id','$region_id')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	

$sqlaccpay= "insert into sales_returns_ledger values('','$memo2','$task_totals','$task_totals','','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$memo2','-$task_totals','','$task_totals','$currency','$curr_rate','$sales_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into cost_of_production_ledger values('','$memo2','-$bp_totals','$bp_totals','','$currency','$curr_rate','$start_date','$transaction_code','','','$incharge')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
	
}





?></strong></td><td ></td><td ></td></tr>
<?php 


}
else
{
?>
<tr><td align="center" colspan="4"><font color="#ff0000">No task created!!</font></td></tr>
<?php
}

?>


</td></tr>

</table>
</table>

<!--<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="4"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Parts Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_more_item.php?job_card_id=<?php echo $job_card_id; ?>&booking_id=<?php echo $booking_id; ?>">Add More Parts..</a></td></tr>
<tr><td>
<table width="100%">
<tr><td align="center"><strong>Part Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>

<?php 
$sqlpt="SELECT * from job_card_item,items  where job_card_item.item_id=items.item_id AND job_card_item.job_card_id='$job_card_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
if (mysql_num_rows($resultspt) > 0)
						  {
						  while ($rowspt=mysql_fetch_object($resultspt))
						  {
?>
<tr>
<td ><?php echo $rowspt->item_name.' ('.$rowspt->item_code.')'?></td>
<td align="center"><?php echo $item_quantity=$rowspt->item_quantity;?></td>
<td align="right"><?php echo $item_cost=$rowspt->item_cost;?></td>
<td align="right"><?php echo number_format($item_amount=$item_quantity*$item_cost,2);?></td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a rel="facebox" href="edit_job_card_item.php?job_card_item_id=<?php echo $rowspt->job_card_item_id; ?>&booking_id=<?php echo $booking_id; ?>&job_card_id=<?php echo $job_card_id; ?>"><img src="images/edit.png"></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
<td align="center">
<?php 
	
	$sess_allow_delete;
if ($sess_allow_delete==1)
{
	?>

<a href="delete_job_card_item.php?job_card_item_id=<?php echo $rowspt->job_card_item_id; ?>&booking_id=<?php echo $booking_id; ?>&job_card_id=<?php echo $job_card_id; ?>" onClick="return confirmDeleteItem();"><img src="images/delete.png"></a>

<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
</td>

</tr>

<?php
$ttl_item_cost=$ttl_item_cost+$item_amount;
}
?>
<tr>
<td><strong>Parts Totals</strong></td>
<td></td>
<td></td>
<td align="right"><strong><?php echo number_format($ttl_item_cost,2);?></strong></td>
<td></td>
<td></td>
</tr>
<?php

}
else
{
?>
<tr><td align="center" colspan="6"><font color="#ff0000">No parts assigned!!</font></td></tr>
<?php
}

?>

</table>
</table>-->








</td>




<td valign="top"><td valign="top" height="200" width="50%">

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20">
<strong><font color="#ffffff">Sales Returns Value Details</strong></td></tr>



<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><strong><font color="#ffffff"></strong></td></tr>

<tr><td>
<table width="100%">

<tr><td align="right" width="70%"><strong>Items Totals</strong></td>
<td align="right"><strong><?php echo number_format($grndttl_lpo=$task_totals,2); ?></strong></td>
</tr>
<tr><td align="right" width="70%"><strong>Freight Charges</strong></td>
<td align="right"><strong><?php echo number_format ($freight_charge,2);  ?></strong></td>
</tr>



<tr><td align="right"><strong><font size="+1">Grand Totals</font></strong></td>
<td align="right"><strong><font size="+1"><?php 

 
 
echo number_format ($grndttl=$grndttl_lpo+$freight_charge,2);



?></font></strong></td>
</tr>



</td></tr>


</table>
</table>


</td></td>


</tr>


<?php 
}
?>	

</table>