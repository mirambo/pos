<?php 
$sqlrec="select * FROM mop,currency,suppliers,purchase_returns WHERE purchase_returns.mop_id=mop.mop_id AND 
purchase_returns.currency=currency.curr_id AND purchase_returns.supplier_id=suppliers.supplier_id AND purchase_returns.purchase_returns_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$supplier_id=$rowsrec->supplier_id;
$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->debit_note_no;
$currency=$rowsrec->currency;
$curr_rate=$rowsrec->curr_rate;

$status=$rowsrec->status;

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

	<h3 align="center">View Purchase Returns Details
	
	<?php 
	/* if ($status==2)
	{ */
	
	?>
	<a style="float:right; margin-right:200px;" target="_blank" href="print_debit_note.php?order_code=<?php echo $order_code; ?>">
	
	Print Debit Note
	
	
	</a>
	
	<a style="float:right; margin-right:50px;" href="print_debit_note_excel.php?order_code=<?php echo $order_code; ?>">
	
	Export To Excel
	
	
	</a>
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

Debit Note Number : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Supplier : </strong><i><?php echo $supplier_name=$rowsrec->supplier_name;  ?></i>
	
	
	
	<strong>Purchase Return Date :</strong><i><?php echo $order_date=$rowsrec->date_generated;  ?></i>
	
	<strong>Currency: </strong><i><?php echo $curr_name=$rowsrec->curr_name;  ?></i>
	<strong>Exchange Rate: </strong><i><?php echo $scurr_rate=$rowsrec->curr_rate;  ?></i>
	<br/>
	<br/>
	
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<?php

	if ($status==2)
	{
	}
	else
	{
	?>
	
	<a rel="facebox" href="edit_purchase_returns.php?order_code=<?php echo $order_code;?>"><img src="images/edit.png"> </a>
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
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns  added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase ReturnsItems Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Purchase Returns items Updated Successfully!!</font></strong></p></div>';

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_pr_item.php?order_code=<?php echo $order_code; ?>">



Add More Item..


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
$sqllpdet="select * FROM purchase_returns_items,products 
WHERE purchase_returns_items.product_id=products.product_id AND purchase_returns_items.purchase_returns_id='$order_code'";
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
<td ><?php echo $rowslpdet->product_name.' ('.$rowslpdet->prod_code.')'; ?></td>
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

	<!--<a rel="facebox" href="edit_purchase_returns_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_returns_items_id; ?>&order_code=<?php echo $order_code; ?>"><img src="images/edit.png"></a>-->
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
	

<a href="delete_pr_trans.php?order_code=<?php echo $order_code; ?>&purchase_order_id=<?php echo $rowslpdet->purchase_returns_items_id;?>"><img src="images/delete.png" onClick="return confirmDelete();"></a>

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
}
?>
<tr><td ><strong>Items Totals</strong></td><td></td><td></td><td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td><td ></td><td ></td></tr>
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
<strong><font color="#ffffff">Purchase Returns Value Details</strong></td></tr>



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

$transaction_desc='Purchases Returns Debit Note No:'.$lpo_no;
//$transaction_descinv="Freight Charges for Goods Supplied By:".$shipper_name;

$sqlprof="select * from supplier_transactions where order_code='prt$order_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{

$sqlupd="UPDATE supplier_transactions SET amount='-$grndttl',currency='$currency',date_recorded='$order_date',curr_rate='$curr_rate' WHERE order_code='prt$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE accounts_payables_ledger SET amount='-$grndttl',debit='$grndttl',currency_code='$currency',date_recorded='$order_date',curr_rate='$curr_rate' WHERE order_code='prt$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

$sqlupd="UPDATE purchases_returns_ledger SET amount='$grndttl',credit='$grndttl',currency_code='$currency',date_recorded='$order_date',curr_rate='$curr_rate' WHERE order_code='prt$order_code'";
$resultsupd=mysql_query($sqlupd) or die ("Error $sqlupd.".mysql_error());

}

else
{

$sqltrans= "insert into supplier_transactions values('','$supplier_id','prt$order_code','$transaction_desc','$currency','$curr_rate','-$grndttl','$order_date')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay="insert into accounts_payables_ledger values('','$transaction_desc','-$grndttl','$grndttl','','$currency','$curr_rate','$order_date','prt$order_code','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());


$sqlaccpay="insert into purchases_returns_ledger values('','$transaction_desc','$grndttl','','$grndttl','$currency','$curr_rate','$order_date','prt$order_code','','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



}







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