<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$booking_id=$_GET['booking_id'];
$quotation_id=$_GET['quotation_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);



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

$sqlj= "SELECT * FROM quotation WHERE quotation_id='$quotation_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->quotation_date;
$jb_user_id=$rowsj->user_id;
$invoice_no=$rowsj->quotation_id;
 $discount_perc=$rowsj->discount_perc;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
QUOTATION / ESTIMATES <?php echo $invoice_no; ?></title>
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
 
  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">

QUOTATION / ESTIMATES

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10" ><strong>QUOTATION NO : <?php echo $invoice_no; ?><span style="float:right;">DATE : <?php echo $date_generated;

	?> </span><hr/></td>
  </tr>
  

  <tr bgcolor="#C0D7E5" height="30">
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
  
  
  
  <tr height="30">
    <td colspan="9">
	<table width="100%" border="0" class="table">

	
	 <tr bgcolor="#C0D7E5" height="30">
    <td colspan="9" align="center"><strong> TASK / LABOUR DETAILS</strong><hr/></td>
 </tr>
 <tr><td align=""><strong>Task Name</strong></td><td align="center"><strong>Amount</strong></td></tr>
<?php 
$task_totals=0;
$sqlts="SELECT * from quotation_task,task where quotation_task.task_id=task.task_id AND quotation_task.quotation_id='$quotation_id'";
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
<td ><?php echo $rowsts->task_name;


$task_cost=$rowsts->task_cost;



$task_totals=$task_totals+$task_cost;


?></td>
<td align="right"><?php echo number_format($task_cost,2);?></td>

</tr>

<?php
}
?>

<tr>
<td >
<strong><strong>Total Task Cost : </strong></strong>
</td>
<td  align="right"><strong>
<?php
//$consumables=$task_totals*0.25;



echo number_format($task_totals+$consumables,2);
 ?>
</strong></td>
</tr>
<?php



}
else
{
?>
<tr><td align="center" colspan="5"><font color="#ff0000">No task/labour assigned to this quotation created!!</font></td></tr>
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
   <td width="15%"><div align="center"><strong>Price </strong></div></td> 
    <td width="20%"><div align="center"><strong>Totals </strong></div></td>
	
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;


$sqllpdet="SELECT * from quotation_item,items  where quotation_item.item_id=items.item_id AND quotation_item.quotation_id='$quotation_id'";
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
    <td align="center"><?php echo $quantity=$rowslpdet->item_quantity; ?></td>
      <td align="right"><?php echo number_format($curr_sp=$rowslpdet->item_cost,2);?></td>
<td align="right"><strong><?php echo number_format($amnt=$curr_sp*$quantity,2);?></strong></td>
     <!-- <td align="right"><?php echo number_format($discount_value=$rowslpdet->discount_value,2).' ('.$rowslpdet->discout.'%)';?></td>
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
 
	
	
	}
	else
	{?>
	<tr><td colspan="5" align="center"><font color="#f0000">No parts assigned to this quotation</font></td></tr>
	<?php
	
	}
	
	?>
  
 
  <tr height="10">

  
    
 <td width="6%" colspan="4" align="right"><strong>Parts / Materials Cost</strong></td>
    <td align="right" colspan="2"><strong><strong><?php 

	echo number_format ($grnd_amnt,2);    

	?></strong></strong></td>

    

  </tr>
  
  <tr height="10"><td width="6%" colspan="4" align="right"><strong>Sub Totals</strong></td>
    <td align="right" colspan="2"><strong><strong><?php 

	echo number_format ($sub_total1=$grnd_amnt+$task_totals+$consumables,2);    

	?></strong></strong></td></tr>
	
	<tr height="10"><td width="6%" colspan="4" align="right"><strong>VAT (16%)</strong></td>
    <td align="right" colspan="2"><strong><strong><?php 
	
	$vat=$rowsj->vat;

	//echo number_format ($grnd_amnt+$task_totals,2);  

if ($vat==1)
 {
$vat_value=0.16*$sub_total1;
 }
 else
 {
$vat_value=0;
 }
 
 
echo number_format($vat_value,2); 	


$sub_total2=$sub_total1+$vat_value;
	?></strong></strong></td></tr>
	
	<tr height="10"><td width="6%" colspan="4" align="right"><strong>Discount(<?php echo $discount_perc;?>%)</strong></td>
    <td align="right" colspan="2"><strong><strong><?php 


 

$discount_val=$discount_perc*$sub_total2/100;

 
 
echo number_format($discount_val,2); 


?></strong></strong></td></tr>

  <tr height="10"><td width="6%" colspan="4" align="right"><strong><font size="+1">Grand Totals</font></strong></td>
    <td align="right" colspan="2"><strong><font size="+1"><?php 

 
 

$grand_ttl=$sub_total2-$discount_val;

 
 
echo number_format($grand_ttl,2); 


?></font></strong></td></tr>
  <!-- <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="4" align="right"><strong>Total VAT</strong></td>
    <td align="right" colspan="2"><?php 

	echo number_format ($grnd_vat,2);  

	?></td>

    

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="4" align="right"><strong>Total Discount</strong></td>
    <td align="right" colspan="2"><?php 

echo number_format ($grnd_disc,2); 

	?></td>

    

  </tr>
  
  <tr height="10">
    <td>&nbsp;</td>
  
    
 <td width="6%" colspan="4" align="right"><strong>Total Amount</strong></td>
    <td align="right" colspan="2"><strong><font size="+0"><?php 

	//$grndttl=$subttl+$grndvat-$grnddisc;

	echo number_format ($grnd_ttl_amnt,2);     

	?></font></strong></td>

    

  </tr>-->
  
 
  

   
<tr bgcolor="#C0D7E5" height="30">
    <td colspan="9"><strong>Terms And Conditions</strong><hr/></td>
 </tr>
 
 <tr><td colspan="5" width="60%" ><strong>1. <?php echo $rowsj->terms ?></strong><br/>
<strong>2. All amount is quoted in <?php 

$sqlc="SELECT * from quotation,currency WHERE quotation.currency=currency.curr_id AND quotation.quotation_id='$quotation_id'";
$resultsc= mysql_query($sqlc) or die ("Error $sqlc.".mysql_error());
$rowsc=mysql_fetch_object($resultsc);


echo $rowsc->curr_name;
?></strong>
 
 
 </td></tr>

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
	Stamp-------------------------------------------------------------------</td>
  </tr>
  
   <!-- <tr height="10">
    <td colspan="6" >Goods Received By---------------------------------------------------------------------- Sign--------------------------- Stamp------------------------</td>
  </tr>
  
<tr>
    <td colspan="6" align="center" ><strong>GOODS MUST BE CHECKED AND VERIFIED AT THE TIME OF DELIVERY. NO COMPLAINT WILL BE<br/>
	ENTERTAINED ONCE YOU HAVE ACCEPTED THE GOODS, NO CASH PAYMENTS TO BE MADE <br/>
	TO ANY OF OUR SALES PERSON UNLESS AUTHORITY IN WRITING IS OBTAINED.<br/>
	GOODS REMAIN THE PROPERTY OF BRISK DIAGNOSTICS LTD UNTIL PAID FOR IN FULL.<br/>



	</strong></td>
  </tr>-->

</table>








</body>
</html>
