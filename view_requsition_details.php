<?php 
$sqlrec="select * FROM requisition WHERE requisition_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$requested_by=$rowsrec->requested_by;
$shipper_id=$rowsrec->shipper_id;
$requisition_no=$rowsrec->requisition_no;
$ref_no=$rowsrec->ref_no;
$lpo_date=$rowsrec->date_generated;
$status=$rowsrec->status;
$comments=$rowsrec->comments;

$querysup="select * from users where user_id ='$requested_by'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);


$body='';




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
  <Script Language="JavaScript">

function load() {
var load = window.open('add_requisition_item.php?order_code=<?php echo $order_code; ?>','','scrollbars=no,menubar=no,height=300,width=800,resizable=yes,toolbar=no,location=no,status=no');
}

</Script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

	<h3 align="center">View Requisition Details
	
	<?php 

	
	?>
	<a style="float:right; margin-right:200px;" target="_blank" href="lpo.php?order_code=<?php echo $order_code; ?>">
	
	<!--Print LPO	-->
	
	</a>
	
		<a style="float:right; margin-right:50px;"  onclick="return confirmSend();" href="send_email_lpo.php?order_code=<?php echo $order_code; ?>">
	
	<!--Send Via Email-->
	
	</a>
	

	
	
	</h3>
	
	
	
<table width="90%" border="0" align="center">

<tr><td colspan="7" bgcolor="#FFFFCC" align="center">

<strong>

Date : </strong><i><?php echo $lpo_date;  ?></i>

<strong>

Requisition Number : </strong><i><?php echo $requisition_no;  ?></i>
<strong>Requested By : </strong><i><?php echo $supplier_name=$rowssupp->f_name;  ?></i>
	
	
	
	
	<br/>
	<br/>
	<strong>Comments : </strong><i><?php  echo $comments;  
	

	
	?></i>
	
	
	
	<strong>Ref. No : </strong><i><?php echo $ref_no;  ?></i> 
	
	
	
	
	<?php

/* 	if ($status==2)
	{
	}
	else
	{ */
	?>
	
	<a rel="facebox" href="edit_requisition_code.php?order_code=<?php echo $order_code;?>"><img src="images/edit.png"> </a>
	<?php 
	//}
	
	?>	
		
		
		<br/>
	<br/>

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Job Card Items Added Successfully!!</font></strong></p></div>';


if ($_GET['addbelongconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Customer Belonging Added Successfully!!</font></strong></p></div>';



if ($_GET['deletepartconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Part Deleted Successfully from the job card!!</font></strong></p></div>';

if ($_GET['deletebelongconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Customer belonging deleted successfully from the job card!!</font></strong></p></div>';


if ($_GET['editjobcardconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Details Updated Successfully!!</font></strong></p></div>';

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong><a style="color:#ffffff;font-weight:bold; float:right;" href="javascript:load();">


<?php 
	if ($status==2)
	{
	}
	else
	{
	?>
Add More Item..
<?php 
}
?>

</a></td></tr>
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
$sqllpdet="select * FROM requisition_item,items WHERE requisition_item.item_id=items.item_id AND 
requisition_item.requisition_id='$order_code'";
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
<td ><?php echo $rowslpdet->item_name; ?></td>
<td ><?php echo $rowslpdet->item_quantity; $qnty=$rowslpdet->item_quantity;?></td>
<td align="right"><?php 
	$vendor_prc=$rowslpdet->item_value;
		
		
	
	echo number_format($vendor_prc,2);
	

	
	?></td>
	<td align="right">
	
	<?php 
	echo number_format($amnt=$vendor_prc*$qnty,2);
	
	?>
	
	
	</td>
<td align="center"><?php 



	
	if ($user_group_id==15 && $status==2)
	{ ?>

	<a  href="#" onClick="window.open('edit_requisition_trans.php?purchase_order_id=<?php echo $rowslpdet->requisition_item_id; ?>&order_code=<?php echo $order_code; ?>&approved=1','','scrollbars=no,menubar=no,height=300,width=800,top=200,left=300,resizable=yes,toolbar=no,location=no,status=no')"><img src="images/edit.png"></a>
	
	
	<?php }
	
	elseif ($user_group_id==15 && $status!=2)
	{
		
	?>
	

	<a  href="#" onClick="window.open('edit_requisition_trans.php?purchase_order_id=<?php echo $rowslpdet->requisition_item_id; ?>&order_code=<?php echo $order_code; ?>&approved=1','','scrollbars=no,menubar=no,height=300,width=800,top=200,left=300,resizable=yes,toolbar=no,location=no,status=no')"><img src="images/edit.png"></a>
	
	<?php	
		
	}
	
	else
	{
		
	}

	?></td>
<td align="center">
<?php 
	

if ($user_group_id==15 && $status!=2)
	{ ?>
<a href="delete_requisition_item.php?order_code=<?php echo $order_code; ?>&purchase_order_id=<?php echo $rowslpdet->requisition_item_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a>

<?php
	}
	else
	{
?>
<a href="delete_requisition_item.php?order_code=<?php echo $order_code; ?>&purchase_order_id=<?php echo $rowslpdet->requisition_item_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a>

<?php
}


	?>
</td>
</tr>

<?php
$task_totals=$task_totals+$amnt;
}
?>
<tr><td ><strong>Items Totals</strong></td><td></td><td></td><td align="right"><strong><?php echo number_format($task_totals,2); 



/* $transaction_descinv='Order <a href="begin_order.php?order_code='.$order_code.'"> LPO No:'.$lpo_no.'</a> generated';	


$sqlprof="select * from supplier_transactions where order_code='ord$order_code'";
$resultsprof=mysql_query($sqlprof) or die ("Error $sqlprof.".mysql_error());
$numrowsprof=mysql_num_rows($resultsprof);

if ($numrowsprof>0)	
{
	
$sqltrans="update supplier_transactions SET 
supplier_id='$supplier_id',
date_recorded='$lpo_date',
amount='$task_totals',
debit='$task_totals',
currency='$currency',
curr_rate='$curr_rate',
transaction='$transaction_descinv'
where order_code='ord$order_code'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());
	
	
}

else
{

$sqltrans="INSERT INTO supplier_transactions SET 
supplier_id='$supplier_id',
order_code='ord$order_code',
date_recorded='$lpo_date',
amount='$task_totals',
debit='$task_totals',
currency='$currency',
curr_rate='$curr_rate',
transaction='$transaction_descinv'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());	
	
	
	
} */











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
<strong><font color="#ffffff">LPO Value Details</strong></td></tr>



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
///$grand_ttl=$task_totals+$freight_charge;

 
 
//echo number_format($grand_ttl,2); 


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