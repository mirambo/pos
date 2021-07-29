<?php 
$sqlrec="SELECT * FROM quote WHERE sales_id='$sales_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$customer_id=$rowsrec->customer_id;
$customer_name=$rowsrec->customer_name;
$curr_rate=$rowsrec->curr_rate;
$general_remarks=$rowsrec->general_remarks;
$sales_rep=$rowsrec->sales_rep; 
$delivery_address=$rowsrec->delivery_address;
$delivered_by=$rowsrec->delivered_by;

$shop_id=$rowsrec->shop_id;
$orig_shop_id=$_GET['orig_shop_id'];

$queryshp="select * from account where account_id='$shop_id'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$shop_name=$rowshp->account_name;


$querytcsp="select * from customer where customer_id='$customer_id'";
$resultstcsp=mysql_query($querytcsp) or die ("Error: $querytc.".mysql_error());								  
$rowstcsp=mysql_fetch_object($resultstcsp);




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


$sqlrec="SELECT * FROM invoice_payments WHERE sales_id='$sales_id' and receipt_no=''";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
 $mop=$rowsrec->mop;




$invoice_id=$sales_id;





$queryshp="select * from users where user_id='$sales_rep'";
$resultshp=mysql_query($queryshp) or die ("Error: $queryshp.".mysql_error());								  
$rowshp=mysql_fetch_object($resultshp);
$sales_rep_name=$rowshp->f_name;



?>

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


	<h3 align="center">View Quotation Details
	
	<?php 
	/* if ($status==2)
	{ */
	
	?>
	<!--<a style="float:right; margin-right:200px;" target="_blank" href="print_invoice.php?sales_id=<?php echo $sales_id;?>&cash=1">-->
	<a style="float:right; margin-right:200px;" target="_blank" href="print_quote.php?sales_id=<?php echo $sales_id;?>&cash=1">
	
	Print Quotation
	
	
	</a>
	
	<a style="float:right; margin-right:50px;" href="print_invoice_excel.php?sales_id=<?php echo $sales_id; ?>&cash=1">
	
	<!--Export To Excel-->
	
	
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

Proforma Invoice No : </strong><i><?php echo $lpo_no;  ?></i>
<strong>Customer Name : </strong><i><?php echo $customer_name;  ?></i>
	
	
	
	<strong>Date :</strong><i><?php echo $sales_date; ?></i>
	
	<strong>Discount: </strong><i><?php echo $discount.'%';  ?></i>
	<strong>VAT (16%): </strong><i><?php  $vat;  
	

 
 if ($vat==1)
 {
 echo "Yes";
 }
 else
 {
 echo "No";
 }
 


	
	
	?></i>
	</br>

	

	<strong>Terms and Conditions : </strong><i><?php echo $general_remarks;  ?></i> 
	
	
	

	
	
	<a rel="facebox" href="edit_proforma.php?sales_id=<?php echo $sales_id;?>&q=1"><img src="images/edit.png"></a>
	
		
		
	
	

</td></tr>
<tr bgcolor="#FFFFCC" height="20"><td colspan="10" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #009900; height:15px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Record Created Successfully!!</font></strong></p></div>';

if ($_GET['addtaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More task added successfully!!</font></strong></p></div>';


if ($_GET['editaskconfirm']==1)
echo '<div align="center" style="background: #009900; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Updated Successfully!!</font></strong></p></div>';

if ($_GET['deletetaskconfirm']==1)
echo '<div align="center" style="background: #ff0000; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Task Deleted Successfully!!</font></strong></p></div>';


if ($_GET['editpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >Job Card Items Updated Successfully!!</font></strong></p></div>';

if ($_GET['addpartconfirm']==1)
echo '<div align="center" style="background: #009900; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ffffff" >More Items Added Successfully!!</font></strong></p></div>';


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



<tr height="50" bgcolor="#FFFFCC">
<td valign="top" height="200" width="50%">
<table width="100%" border="1" class="table">
<tr bgcolor="#2E3192"><td colspan="2"  align="center"><img src="images/task_icon.png" align="left" width="20" height="20"><strong><font color="#ffffff">View Items Details</font></strong><a rel="facebox" style="color:#ffffff;font-weight:bold; float:right;" href="add_lpo_item.php?order_code=<?php echo $order_code; ?>">


<?php 
	
	?>
<!--Add More Item..-->
<?php 

?>

</a>
<a title="Creating New Items That doesnt exist" style="color:#fff;font-weight:bold; float:right;" rel="facebox" href="add_more_proforma_item.php?sales_id=<?php echo $sales_id ?>&q=1"> [ Add More Items ]</a>
</td></tr>
<tr><td>
<table width="100%">

<tr>
<td align="center"><strong>Items Code</strong></td>
<td align="center"><strong>Items Name</strong></td>
<td align="center"><strong>Price</strong></td>
<td align="center"><strong>Edit</strong></td>
<td align="center"><strong>Delete</strong></td></tr>
<?php 
$task_totals=0;
$sqllpdet="select * FROM quote_item,items WHERE quote_item.item_id=items.item_id AND 
quote_item.sales_id='$sales_id' order by sales_item_id desc";
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
<td ><?php echo $item_code=$rowslpdet->item_code; ?></td>
<td ><?php echo $product_name=$rowslpdet->item_name; 
$prod=$rowslpdet->item_id;


?></td>

<td align="right"><?php 
	
		
	
	echo number_format($item_cost=$rowslpdet->item_cost,2);
	

	?></td>
	
	
	
<td align="center"><?php 
	
	$sess_allow_edit;
if ($sess_allow_edit==1)
{


	?>

	<a rel="facebox" href="edit_proforma_item.php?sales_item_id=<?php echo $rowslpdet->sales_item_id; ?>&sales_id=<?php echo $sales_id; ?>&q=1"><img src="images/edit.png"></a>
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
	

<a href="delete_proforma_item.php?sales_id=<?php echo $sales_id; ?>&sales_item_id=<?php echo $rowslpdet->sales_item_id;?>&q=1"><img src="images/delete.png" onClick="return confirmDelete();"></a>

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


<?php 

?>	

</table>