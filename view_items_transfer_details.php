<?php 
$sqlrec="SELECT * FROM transfer_items_code WHERE transfer_item_code_id='$order_code'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);

$transfer_from=$rowsrec->transfer_from;
$transfer_to=$rowsrec->transfer_to;

//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
$acc_name_from=$rowsrec1->account_name;

//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
$acc_name_to=$rowsrec2->account_name;


$supplier_id=$rowsrec->supplier_id;
$querytcsp="select * from suppliers where supplier_id='$supplier_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);
$supplier_name=$rowstcsp->supplier_name;
//$curr_rate=$rowsrec->curr_rate;


$shipper_id=$rowsrec->shipper_id;
$lpo_no=$rowsrec->transfer_no;
$currency=$rowsrec->currency;

$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
$curr_name=$rowstcs->curr_name;
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

	<h3 align="center">View Items Transfer Details
	
	<?php 
	/* if ($status==2)
	{ */
	
	?>
	<a style="float:right; margin-right:200px;" target="_blank" href="lpo.php?order_code=<?php echo $order_code; ?>">
	
	Print LPO
	
	
	</a>
	
	<a style="float:right; margin-right:50px;" href="lpo_excel.php?order_code=<?php echo $order_code; ?>">
	
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

Transfer Batch Number : </strong><i><?php echo $lpo_no;  ?></i>

	
	
	
	<strong>Transfer Date :</strong><i><?php echo $order_datet=$rowsrec->date_generated;  ?></i>
	
	<strong>Transfer From: </strong><i><?php echo $acc_name_from;  ?></i>
	<strong>Transfer To: </strong><i><?php echo $acc_name_to;  ?></i>
	<br/>
	<br/>
	
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	
	<a rel="facebox" href="edit_order_code.php?order_code=<?php echo $order_code;?>"><!--<img src="images/edit.png">--></a>
	
		
		<br/>
	<br/>

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Record Created Successfully!!</font></strong></p></div>';

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
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Transfer Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_lpo_item.php?order_code=<?php echo $order_code; ?>">


<?php 
	
	?>
<!--Add More Item-->
<?php 

?>

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
$sqllpdet="select * FROM transfer_items,items
WHERE transfer_items.item_id=items.item_id AND transfer_items.transfer_item_code_id='$order_code'";
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
 //$transfer_item_id=
 $transfer_item_id=$rowslpdet->transfer_item_id;
 $item_id=$rowslpdet->item_id;
 ?>
<td ><?php echo $rowslpdet->item_name.' ('.$rowslpdet->item_code.')'; ?></td>
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
	
	
	


$account_id_dr=7;
$sqldr= "SELECT * from account where account_id='$account_id_dr'";
$resultsdr= mysql_query($sqldr) or die ("Error $sqldr.".mysql_error());
$rowsdr=mysql_fetch_object($resultsdr);
$acc_type_id_dr=$rowsdr->account_type_id;
$acc_cat_id_dr=$rowsdr->account_cat_id;


$account_id_cr=6;
$sqlcr= "SELECT * from account where account_id='$account_id_cr'";
$resultscr= mysql_query($sqlcr) or die ("Error $sqlcr.".mysql_error());
$rowscr=mysql_fetch_object($resultscr);
$acc_type_id_cr=$rowscr->account_type_id;
$acc_cat_id_cr=$rowscr->account_cat_id;




$memo="Item Transfer item ".$item_name." From ".$acc_name_from." To ".$acc_name_to;
$amount=$amnt;
$latest_id=$transfer_item_id;
$currency=6;
$curr_rate=1;
$date_dep=$order_datet;

$orderdate = explode('-', $date_dep);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];
$transaction_code="itrans".$latest_id;

$sqlproftm="select * from item_transactions where item_id='$item_id' AND transaction_code='itm$transfer_item_id trns$order_code'";
$resultsproftm=mysql_query($sqlproftm) or die ("Error $sqlproftm.".mysql_error());
$numrowsproftm=mysql_num_rows($resultsproftm);	

if ($numrowsproftm>0)	
{
}
else
{


/* //debit inventory for shop to
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_dr','$acc_type_id_dr','$account_id_dr','$transfer_from','$memo','$amount','$amount','','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());

//credit inventory for shop from
$sqlaccpay= "insert into ledger_transactions values('','$acc_cat_id_cr','$acc_type_id_cr','$account_id_cr','$transfer_to','$memo','-$amount','','$amount','$currency',
'$curr_rate','$date_dep','$day','$month','$year',NOW(),'$transaction_code','','','','','','$user_id')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error()); */

// reduce shop from
$sqlaccpay= "insert into item_transactions values('','$item_id','$memo','-$qnty','$date_dep','$day','$month','$year','itm$transfer_item_id trns$order_code',
'$user_id','$transfer_from','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());	


$sqlaccpay= "insert into item_transactions values('',' $item_id','$memo','$qnty','$date_dep','$day','$month','$year','itm$transfer_item_id trns$order_code',
'$user_id','$transfer_to','','')";
$resultsaccpay=mysql_query($sqlaccpay) or die ("Error $sqlaccpay.".mysql_error());
	
	}
	
	?>
	
	
	</td>
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{


	?>

	<a rel="facebox" href="edit_lpo_trans.php?purchase_order_id=<?php echo $rowslpdet->purchase_order_id; ?>&order_code=<?php echo $order_code; ?>"><!--<img src="images/edit.png">--></a>
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
	

<a href="delete_lpo_trans.php?order_code=<?php echo $order_code; ?>&purchase_order_id=<?php echo $rowslpdet->purchase_order_id;?>"><img src="images/delete.png" onClick="return confirmDelete();"></a>

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
$task_totals=$task_totals+$amnt;
}
?>
<tr><td ><strong>Items Totals</strong></td><td></td><td></td><td align="right"><strong><?php 
echo number_format($task_totals,2); 
















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