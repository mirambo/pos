<?php 
$cancel=$_GET['cancel'];
$reason=$_GET['reason'];

?>

<script type="text/javascript"> 

function confirmDeleteItem()
{
    return confirm("Are you sure want to delete the part?");
}

function confirmDelete()
{
    return confirm("Are you sure want to delete this task");
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

	<h3 align="center">View invoice Details
	
	<?php 
$sqlc="SELECT * from invoice,currency WHERE invoice.currency=currency.curr_id AND invoice.invoice_id='$invoice_id'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultsc);

$confirm_status=$rowsc->confirm_status;
	
	if ($cancel==1)
	{
	?>
	<p style="float:right; margin-right:200px; padding:4px; background:#009900; width:auto; border-radius:5px; color:#ffffff; font-weight:bold; ">Invoice Cancelled Successfully!!</p>
	<?php
	}
	else
	{
	?>
	<a rel="facebox" style="float:right; margin-right:200px; padding:4px; background:#990000; width:auto; border-radius:5px; color:#ffffff; font-weight:bold;" target="_blank" href="cancel_approved_invoice_reason.php?invoice_id=<?php echo $invoice_id; ?>&booking_id=<?php echo $booking_id; ?>&job_card_id=<?php echo $job_card_id; ?>" >Cancel This Approved Invoice</a>
	<?php
}
	?>
	
	
	</h3>
	
	
	
<table width="90%" border="0" align="center">
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php



if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Invoice Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Parts Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Items Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Customer Belonging Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Part Deleted Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer belonging deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >invoice Details Updated Successfully!!</font></strong></p></div>';

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Task Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_more_invoice_task.php?invoice_id=<?php echo $invoice_id; ?>&booking_id=<?php echo $booking_id; ?>"><!--Add More Tasks..--></a></td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>Task Name</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td>
</tr>
<?php 
$task_totals=0;
$sqlts="SELECT * from invoice_task,task where invoice_task.task_name=task.task_id AND invoice_task.invoice_id='$invoice_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
?>
<tr>
<td ><?php echo $rowsts->task_name.' ('.$rowsts->task_remarks.')';?></td>
<td align="right"><?php echo $task_cost=$rowsts->task_cost;?></td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a rel="facebox" href="edit_invoice_task.php?invoice_task_id=<?php echo $rowsts->invoice_task_id; ?>&booking_id=<?php echo $booking_id; ?>&invoice_id=<?php echo $invoice_id; ?>&job_card_id=<?php echo $job_card_id;?>"><!--<img src="images/edit.png">--></a>
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

<a href="delete_invoice_task.php?invoice_task_id=<?php echo $rowsts->invoice_task_id; ?>&booking_id=<?php echo $booking_id; ?>&invoice_id=<?php echo $invoice_id; ?>&job_card_id=<?php echo $job_card_id;?>"><!--<img src="images/delete.png" onClick="return confirmDelete();">--></a>

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
$task_totals=$task_totals+$task_cost;

}
?>
<tr><td ><strong>Task Totals</strong></td><td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td><!--<td ></td><td ></td>--></tr>
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

<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="4"  align="center"><img src="images/parts.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Parts Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_more_invoice_item.php?invoice_id=<?php echo $invoice_id; ?>&booking_id=<?php echo $booking_id; ?>"><!--Add More Parts..--></a></td></tr>
<tr><td>
<table width="100%">
<tr><td align="center"><strong>Part Name</strong></td>
<td align="center"><strong>Quantity</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Amount</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>

<?php 

$sqlred="SELECT * from customer_transactions where transaction_code='cai$invoice_id'";
$resultsred= mysql_query($sqlred) or die ("Error $sqlred.".mysql_error());
$nomrowsred=mysql_num_rows($resultsred);




$sqlpt="SELECT * from released_item,items where released_item.item_id=items.item_id AND released_item.job_card_id='$job_card_id'";
$resultspt= mysql_query($sqlpt) or die ("Error $sqlpt.".mysql_error());
if (mysql_num_rows($resultspt) > 0)
						  {
						  while ($rowspt=mysql_fetch_object($resultspt))
						  {
?>
<tr>
<td ><?php echo $rowspt->item_name.' ('.$rowspt->item_code.')'?></td>
<td align="center"><?php echo $item_quantity=$rowspt->released_quantity;?></td>
<td align="right"><?php echo $item_cost=$rowspt->curr_sp;?></td>
<td align="right"><?php echo number_format($item_amount=$item_quantity*$item_cost,2);

$ttl_item_cost=$ttl_item_cost+$item_amount;

$part_id=$rowspt->item_id;
$released_item_id=$rowspt->released_item_id;






if ($cancel==1)
	{


	if ($nomrowsred==0)
	{

	
$transaction_descinv="Cancelation Of sales Invoice $invoice_id Reason ($reasons)";



$sqlproj= "SELECT * from items where item_id='$part_id'";
$resultsproj= mysql_query($sqlproj) or die ("Error $sqlproj.".mysql_error());
$rowsproj=mysql_fetch_object($resultsproj);
$item_name=$rowsproj->item_name; 
$item_code=$rowsproj->item_code; 
//$quantity=mysql_real_escape_string($_POST['quantity'][$row]);
$item_value=$rowsproj->curr_bp;
$item_amount=$item_quantity*$item_value;

$transaction_descinvent='Cancelation of Item '.$item_name.' - '.$item_code.' of the Inv No:'.$invoice_id;


$sqlproj22= "SELECT * from inventory_ledger where order_code='inv$released_item_id'";
$resultsproj22= mysql_query($sqlproj22) or die ("Error $sqlproj22.".mysql_error());
//$rowsproj22=mysql_fetch_object($resultsproj22);
$rowsnum22=mysql_num_rows($resultsproj22);
//$item_name=$rowsproj22->item_name; 



$sqlaccpay= "insert into inventory_ledger values('','$transaction_descinvent','$item_amount','$item_amount','','6','1',NOW(),'cai$released_item_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());



$sqlupdt= "UPDATE released_item SET approved_invoice_status='0' WHERE released_item_id='$released_item_id'";
$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());

}

	
	
	
	else
	{
	
	}
}




?></td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a rel="facebox" href="edit_invoice_item.php?invoice_item_id=<?php echo $rowspt->invoice_item_id; ?>&booking_id=<?php echo $booking_id; ?>&invoice_id=<?php echo $invoice_id; ?>&job_card_id=<?php echo $job_card_id;?>"><!--<img src="images/edit.png">--></a>
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

<a href="delete_invoice_item.php?invoice_item_id=<?php echo $rowspt->invoice_item_id; ?>&booking_id=<?php echo $booking_id; ?>&invoice_id=<?php echo $invoice_id; ?>" onClick="return confirmDeleteItem();"><!--<img src="images/delete.png">--></a>

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
</table>








</td>




<td valign="top"><td valign="top" height="200" width="50%">

<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="5"  align="center"><img src="images/vehicle.png" align="left" width="30" height="20"><strong><font color="#ffffff">invoice Details</strong></td></tr>
<tr><td>
<table width="100%" border="0">
<tr><td colspan="5"><strong>NOTE : All amount is quoted in <?php 




echo $rowsc->curr_name;
?></strong></td></tr>
<tr>
<td align="center"><strong>invoice Date</strong></td>
<td align="center"><strong>Discount(%)</strong></td>
<td align="center"><strong>VAT</strong></td>
<td align="center"><strong>Terms</strong></td>
<td align="center"><strong>Edit</strong></td>
</tr>
<?php 
$sql="SELECT * FROM invoice where invoice_id='$invoice_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
if (mysql_num_rows($results) > 0)
						  {
							
							  while ($rows=mysql_fetch_object($results))
							  { ?>
<td align="center"><?php echo $rows->invoice_date; 

?></td>
<td align="center"><?php echo $discount_perc=$rows->discount_perc; ?></td>
<td align="center"><?php 

 $vat=$rows->vat; 
 
 if ($vat==1)
 {
 echo "Yes";
 }
 else
 {
 echo "No";
 }
 
 $invoice_status=$rows->confirm_status;
 $customer_id=$rows->customer_id;
 ?></td>

<td ><?php echo $rows->terms; ?></td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{
	?>
	<a rel="facebox" href="edit_invoice.php?booking_id=<?php echo $booking_id; ?>&invoice_id=<?php echo $invoice_id; ?>&job_card_id=<?php echo $job_card_id;?>"><!--<img src="images/edit.png">--></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?></td>
							  <?php
							  
							  }
							  
							  
							  }

?>

</table>
</tr></td>
<table width="100%" border="0" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/customer_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">invoice Totals Summary</strong></td></tr>
<!--<tr><td>Task Name/Description</td><td>Add More..</td></tr>-->
<tr><td>
<table width="100%">

<tr><td align="right" width="70%"><strong>Labour Totals</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>
</tr>
<tr><td align="right" width="70%"><strong>Consumables (15%)</strong></td>
<td align="right"><strong><?php echo number_format($consumables=$task_totals*0.15,2); ?></strong></td>
</tr>
<tr><td align="right"><strong>Parts / Material Totals</strong></td>
<td align="right"><strong><?php echo number_format($ttl_item_cost,2); ?></strong></td>
</tr>
<tr><td align="right"><strong>Sub Total 1</strong></td>
<td align="right"><strong><?php echo number_format($sub_total1=$ttl_item_cost+$task_totals+$consumables,2); ?></strong></td>
</tr>

<tr><td align="right"><strong>VAT Value (16%)</strong></td>
<td align="right"><strong><?php 

 
 
 if ($vat==1)
 {
$vat_value=0.16*$sub_total1;
 }
 else
 {
$vat_value=0;
 }
 
 
echo number_format($vat_value,2); 


?></strong></td>
</tr>

<tr><td align="right"><strong>Sub Total 2</strong></td>
<td align="right"><strong><?php echo number_format($sub_total2=$sub_total1+$vat_value,2); ?></strong></td>
</tr>

<tr><td align="right"><strong>Discount Value (%)</strong></td>
<td align="right"><strong><?php 

 
 

$discount_val=$discount_perc*$sub_total2/100;

 
 
echo number_format($discount_val,2); 


?></strong></td>
</tr>



</td></tr>

<tr><td align="right"><strong><font size="+1">Grand Totals</font></strong></td>
<td align="right"><strong><font size="+1"><?php 

 
 

$grand_ttl=$sub_total2-$discount_val;

 
 
echo number_format($grand_ttl,2); 


if ( $cancel==1)

{

if ($nomrowsred==0)
	{
	
	
	
$currency=6;
$curr_rate=1;
$transaction_descinv='Cancelation of Sales Inv No:'.$invoice_id.' ('.$reason.')';	
$transaction_desc='Cancelation of Sales Inv No:'.$invoice_id.' of client '.$c_name;

$sqltrans= "insert into customer_transactions values('','$customer_id','$transaction_descinv','-$grand_ttl',NOW(),'cai$invoice_id','')";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());

$sqlaccpay= "insert into accounts_receivables_ledger values('','$transaction_desc','-$grand_ttl','','$grand_ttl','$currency','$curr_rate',NOW(),'cai$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into sales_ledger values('','$transaction_desc','-$grand_ttl','$grand_ttl','','$currency','$curr_rate',NOW(),'cai$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into vat_ledger values('','$transaction_desc','-$vat_value','','$vat_value','$currency','$curr_rate',NOW(),'cai$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

$sqlaccpay= "insert into discount_allowed_ledger values('','$transaction_desc','-$discount_val','','$discount_val','$currency','$curr_rate',NOW(),'cai$invoice_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

}


	else
	{
	
	}

}





?></font></strong></td>
</tr>



</td></tr>


</table>
</table>


</td></td>


</tr>

<!--<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input type="submit" name="submit" value="Save Job Card Details" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	<input type="hidden" name="add_invoice" id="add_invoice" value="1">&nbsp;&nbsp;</td></tr>-->
<?php 
}
?>	

</table>