<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];

$requisition_id=$_GET['requisition_id'];


$sqlj= "SELECT * FROM requisition WHERE requisition_id='$requisition_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->date_generated;
$jb_user_id=$rowsj->user_id;
$remarks=$rowsj->remarks;
$job_card_id=$rowsj->job_card_id;

$booking_id=$rowsj->booking_id;

$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


$invoice_no=$requisition_id;
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
	<!--<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>Customer Details</strong></font></td></tr>
	<tr><td><strong>Customer Name</strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->town; ?></td></tr>

	
	</table>-->
	
	
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

WORKSHOP REQUISITION FORM

	
	
	
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10" ><strong>REQUISITION NO : <?php echo $invoice_no; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	JOB CARD NO : <?php echo $job_card_id; ?><span style="float:right;">DATE : <?php echo $date_generated;

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
	
  </tr>
 <?php 
$subttl=0;  
$grndvat=0;
$grnddisc=0;
$grndttl=0;
/* $sqllpdet="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id' order by sales.sales_id asc";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error()); */

$sqllpdet="SELECT * from requisition_item,items  where requisition_item.item_id=items.item_id AND requisition_item.requisition_id='$requisition_id'";
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
    <td colspan="9"><strong>Remarks</strong><hr/></td>
 </tr>
 <TR>
 <td colspan="2"><i>

<?php echo $remarks;?>


</i></td>


</td>
</tr>

 
 

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
    <td colspan="6" >Sign----------------------------------------------------------------------------
	Stamp---------------------------------------------------------------------------------</td>
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
