<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$invoice_no=$job_card_id;
$client_id=$rowsrec->customer_id;

$terms=$rowsrec->terms;
$vehicle_make=$rowsrec->vehicle_make;
$vehicle_model=$rowsrec->vehicle_model;
$engine=$rowsrec->engine;
$odometer=$rowsrec->odometer;
$chasis_no=$rowsrec->chasis_no;
$trim_code=$rowsrec->trim_code;
$reg_no=$rowsrec->reg_no;
$bk_user_id=$rowsrec->user_id;

$sqlj= "SELECT * FROM job_cards WHERE job_card_id='$job_card_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->date_generated;
$jb_user_id=$rowsj->user_id;
$vehicle_description=$rowsj->vehicle_description;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
Workshop Job Card <?php echo $invoice_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>style.css"  />

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
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

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();" style="background:none;">
<table width="700" border="0" align="center">	
	 <?php 
  
$querysup="select * from customer where customer_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="6" valign="top">
	<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>Customer Details</strong></font></td></tr>
	<tr><td><strong>Customer Name</strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->town; ?></td></tr>
	<tr><td><strong>Telephone</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><strong>Email Address</strong></td><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <td colspan="5" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="6"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
 <!-- <tr>
    <td colspan="7"><div align="right"><strong>Sale Representative : </strong><?php echo $rowsx->emp_firstname.' '.$rowsx->emp_middle_name.' '.$rowsx->emp_lastname; ?> <strong>Phone : </strong><?php echo $rowsx->emp_phone; ?></div></td>
  </tr>
  
  <tr>
    <td width="20%"  colspan="2"><font size="+1"><strong>To:</strong></font></td>
    <td colspan="3"><font size="+1"><strong><?php //echo $rowssupp->supplier_name; ?></strong></font></td>
  </tr>
  <tr>
    <td width="30%"><strong>Client Name</strong></td>
	<td><?php echo $rowssupp->c_name; ?></td>
    <td ></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Address</strong></td>
    <td width="31%">P.O. BOX <?php echo $rowssupp->c_address; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Town&nbsp;</strong></td>
    <td><?php echo $rowssupp->c_town; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td><strong>Telephone</strong></td>
    <td><?php echo $rowssupp->c_phone; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    
    <td><strong>Email Address</strong></td>
    <td><?php echo $rowssupp->c_email; ?></td>
	<td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">

WORKSHOP JOB CARD

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10" ><strong>JOB CARD NO : <?php echo $invoice_no; ?><span style="float:right;">DATE : <?php echo $date_generated;

	?> </span><hr/></td>
  </tr>
  

  <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>VEHICLE DETAILS</strong><hr/></td>

	
	
	
  
  </tr>
  <tr height="30">
    <td colspan="9">
	<table width="100%" border="0">
	<tr>
	<td><strong>Registration No:</strong></td>
	<td><strong><i><?php echo $reg_no; ?></i></strong></td>
	<td><strong>Make And Model:</strong></td>
	<td><strong><i><?php echo $vehicle_make.' '.$vehicle_model; ?></i></strong></td>
	
	</tr>
	<tr height="20">
	<td><strong>Engine:</strong></td>
	<td><strong><i><?php echo $engine; ?></i></strong></td>
	<td><strong>Chasis No:</strong></td>
	<td><strong><i><?php echo $chasis_no; ?></i></strong></td>
	
	</tr>
	
	<tr height="20">
	<td><strong>Odometer:</strong></td>
	<td><strong><i><?php echo $odometer; ?></i></strong></td>
	<td><strong>Trim Code:</strong></td>
	<td><strong><i><?php echo $trim_code; ?></i></strong></td>
	
	</tr>
	
	</table>
	
	</td>

	
	
	
  
  </tr>
   
  <tr height="10">
    <td colspan="10"></td>
   
  </tr>
  
  <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>JOB CARD DETAILS</strong><hr/></td>
<?php 


?>
	
	
	
  
  </tr>
  
  <tr height="30">
    <td colspan="9">
	<table width="100%" border="0">
	<tr>
	<td><strong>Begin Date: <i><?php echo $rowsj->start_date; ?></i></strong></td>
	<td width="30%"><strong>Completion Date:<i><?php echo $rowsj->end_date; ?></i></strong></td>
	<td width="20%"></td>
	<!--<td><strong></td>-->
	
	</tr>
	<!--<tr height="30">
	<td><strong>Technician Incharge:</strong></td>
	<td><strong><i><?php echo $rowsj->f_name; ?></i></strong></td>
	<td><strong>Technician Phone No:</strong></td>
	<td><strong><i><?php echo $rowsj->phone; ?></i></strong></td>
	
	</tr>
	
	<tr height="20">
	<td valign="top"><strong>Work Description:</strong></td>
	<td colspan="3" width="100"><?php echo $rowsj->work_description; ?></td>
	
	
	</tr>-->
	
	<!--<tr height="20">
	<td><strong>Odometer</strong></td>
	<td><strong><?php echo $odometer; ?></strong></td>
	<td><strong>Trim Code</strong></td>
	<td><strong><?php echo $trim_code; ?></strong></td>
	
	</tr>-->
	
	 <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>JOB CARD TASK/LABOUR DETAILS</strong><hr/></td>
 </tr>
 <tr><td align="center"><strong>Task Name / Labour Name</strong></td><td align="center"><strong>Technician Assigned</strong></td><td align="center"><strong><!--Delete--></strong></td></tr>
<?php 
$sqlts="SELECT * from job_card_task,task,users where job_card_task.task_id=task.task_id AND 
job_card_task.technician_id=users.user_id AND job_card_task.job_card_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
?>
<td ><?php echo $rowsts->task_name;?></td>
<td ><?php  $technician=$rowsts->technician_id;

$sqlusert="select * FROM users WHERE user_id='$technician'";
$resultsusert= mysql_query($sqlusert) or die ("Error $sqlusert.".mysql_error());
	
$rowsusert=mysql_fetch_object($resultsusert);	

echo $rowsusert->f_name;

?></td>
<td align="center">

</td>
</tr>

<?php
}}
else
{
?>
<tr><td align="center" colspan="3"><font color="#ff0000">No task created!!</font></td></tr>
<?php
}

?>
 
	
	</table>
	
	</td>

	
	
	
  
  </tr>

 <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>PARTS / MATERIALS DETAILS</strong><hr/></td>
 </tr>
 
  
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table">
<tr>
    <td width="10%"><div align="center"><strong>Part Code</strong></div></td>
    <td  width="20%"><div align="center"><strong>Part Name</strong></div></td>
	<td width="10%"><div align="center"><strong>Quantity</strong></div></td>
    <!--<td width="15%"><div align="center"><strong>Price (Kshs)</strong></div></td>
	 <td width="20%"><div align="center"><strong>Discount (Kshs)</strong></div></td> 
    <td width="10%"><div align="center"><strong>VAT (16%)</strong></div></td>   
    <td width="20%"><div align="center"><strong>Totals (Kshs)</strong></div></td>-->
	
  <!--</tr>-->
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
/* $sqllpdet="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id' order by sales.sales_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error()); */

$sqllpdet="SELECT * from released_item,items where released_item.item_id=items.item_id AND released_item.job_card_id='$job_card_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


if (mysql_num_rows($resultslpdet) > 0)
						  {
							  $RowCounter=0;
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
 
 
 ?>
    <td><?php echo $rowslpdet->item_code;?></td>
    <td ><?php echo $rowslpdet->item_name; ?></td>
    <td align="center"><?php echo $quantity=$rowslpdet->released_quantity; ?></td>
       <!-- <td align="right"><?php echo number_format($curr_sp=$rowslpdet->curr_sp,2);?></td>
<td align="right"><strong><?php echo number_format($amnt=$curr_sp*$quantity,2);?></strong></td>
    <td align="right"><?php echo number_format($discount_value=$rowslpdet->discount_value,2).' ('.$rowslpdet->discout.'%)';?></td>
    <td align="right"><?php echo number_format($vat_value=$rowslpdet->vat_value,2);?></td>
    <td align="right"><strong><font size=""><?php 
	
	//$qnty=$rowslpdet->quantity;
	echo number_format($ttl_amnt=$amnt-$discount_value+$vat_value,2);
	
	?></font></strong></td>-->
  
   <?php
    $grnd_amnt=$grnd_amnt+$amnt;
	$grnd_disc=$grnd_disc+$discount_value;
	$grnd_vat=$grnd_vat+$vat_value;
	$grnd_ttl_amnt=$grnd_ttl_amnt+$ttl_amnt;
	
	}
	
	?>
  
  
  <?php 
	
	
	}
	else
	{?>
	<tr><td colspan="3" align="center"><font color="#f0000">No parts assigned to this job card</font></td></tr>
	<?php
	
	}
	
	?>
   <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>CUSTOMER BELONGINGS DETAILS</strong><hr/></td>
 </tr>
 <TR>
 <td colspan="2"><i>
<?php 
$sqltcus="SELECT * from customer_item where job_card_id='$job_card_id'";
$resultscus= mysql_query($sqltcus) or die ("Error $sqltcus.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowscus=mysql_fetch_object($resultscus))
						  {
						  

?>


<?php echo $rowscus->customer_item_name.',';?>
<?php
}}
else
{
?>
<font color="#ff0000">No customer belonging recorded!!</font>
<?php
}

?>



</i></td>


</td>
</tr>
 <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>VEHICLE CONDITION DESCRIPTION</strong><hr/></td>
 </tr>
 <TR>
 <td colspan="2"><i>

<?php echo $vehicle_description;?>


</i></td>


</td>
</tr>
<tr bgcolor="#C0D7E5" height="30">
    <td colspan="9"><strong>TECHNICIAN REMARKS</strong><hr/></td>
 </tr>
 
 <tr><td colspan="3" width="60%" align="center"><textarea rows="5" cols="107"></textarea></td></tr>

  <tr>
    <td colspan="8" align="right"><strong><em>Created by :
         <?php 
		 //$bk_user_id=$rowslpdet->user_id;
$sqluser="select * FROM users WHERE user_id='$jb_user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  <tr height="30">
    <td colspan="6" >Sign-------------------------------------------------------------------------------------------
	Stamp----------------------------------------------------</td>
  </tr>
  
 <tr height="10" bgcolor="#C0D7E5">
    <td colspan="6" ><strong>TERMS AND CONDITION</strong></td>
  </tr>
  
<tr>
    <td colspan="6" >
	Terms of payment are the net amount of the invoice in Kenya Shillings
	currency within thirty (30) days of the date of the invoice. A late payment charge will be charged for each month, or any portion thereof, that payment 
	is not made within thirty (30) days of the date of the invoice.	Goods Or Services held as a result 
	of customer inability or refusal to accept delivery are at the risk and expense of buyer.



	</strong></td>
  </tr>

</table>








</body>
</html>
