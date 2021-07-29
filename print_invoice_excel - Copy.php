<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$direct=$_GET['direct'];

if ($direct==1)
{
$invoice_payment_id=$_GET['invoice_payment_id'];
}
else
{
$invoice_payment_id=$_POST['invoice_payment'];
}

$sales_id=$_GET['sales_id'];
$sqlrec="select * from invoice_payments where invoice_payment_id='$invoice_payment_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$rec_date=$rowsrec->date_paid;


$invoice_no=$sales_id;


$terms=$rowsrec->terms;
$vehicle_make=$rowsrec->vehicle_make;
$vehicle_model=$rowsrec->vehicle_model;
$engine=$rowsrec->engine;
$odometer=$rowsrec->odometer;
$chasis_no=$rowsrec->chasis_no;
$trim_code=$rowsrec->trim_code;
$reg_no=$rowsrec->reg_no;
$bk_user_id=$rowsrec->user_id;

$sqlj= "SELECT * FROM sales WHERE sales_id='$sales_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->sale_date;
$jb_user_id=$rowsj->user_id;
$client_id=$rowsj->customer_id;
$vehicle_description=$rowsj->vehicle_description;
$vat=$rowsj->vat;
$discount=$rowsj->discount;
$sale_type=$rowsj->sale_type;

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Invoice-$sales_id.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

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
     <td  align="right" rowspan="6" valign="top">
	<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>Customer Details</strong></font></td></tr>
	<tr><td><strong>Customer Name</strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->town; ?></td></tr>
	<tr><td><strong>Telephone</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><strong>Email Address</strong></td><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <!--<td colspan="5" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>-->
	<td colspan="5" align="right"><?php echo $rowscont->cont_person;?></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="5"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
  <tr bgcolor="#FFFFCC">
    <td colspan="5"> <?php echo $rowscont->company_description; ?></td>
  </tr>

  
  <tr height="30">
    <td colspan="5" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">
<?php if ($sale_type=='cr')
{
?>
INVOICE
<?php
}
else
{
?>
RECEIPT
<?php
}
 ?>
	
	</span></td>
  </tr>
 <tr height="30">
    <td colspan="3"  align="left"><strong>INVOICE NO :  <?php 
	echo $invoice_no;
	
	
	?>
	
	</strong></td>
	<td colspan="3" align="right"><strong>DATE : </strong><?php echo $date_generated;?></td>
  </tr>
  
 
  
  <!--<tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>JOB CARD DETAILS</strong><hr/></td>
<?php 


?>
	
	
	
  
  </tr>-->
  
  <tr height="30">
    <td colspan="9">
	
	<table width="100%" border="0" class="table">
	
	
	
 <tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<!--<td width="10%"><strong>Start From<strong></td>-->
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (KSHS)<strong></td>
<td width="15%"><strong>Total Cost (KSHS)<strong></td>

</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from sales_item where sales_id='$sales_id' order by sales_id asc";
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





       
		<td width="20%">
		
		
		
		<?php 
 
$item_id=$rowsts->item_id;
$querytcs="select * from items where item_id='$item_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs); 

?>
		
		
		<?php echo $rowstcs->item_name; ?></td>
        <td width="10%"><?php echo $rowsts->description;?></td>   
  
		<td align="center"><?php echo $quantity=$rowsts->item_quantity;?></td>	
		<td align="center"><?php echo $unit_cost=$rowsts->item_cost;?></td>
		<td align="right"><?php echo number_format($amnt=$unit_cost*$quantity,2);  ?></td>
            
        </tr>
<?php 

$task_totals=$task_totals+$amnt;
}
?>
<tr>
<td ></td>
<td></td>
<td ></td>
<td align="right"><strong>Sub Total</strong></td>
<td align="right"><strong><?php echo number_format($task_totals,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td ></td>
<td align="right"><strong>Discount</strong></td>
<td align="right"><strong><?php echo number_format($discount,2); ?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td ></td>
<td align="right"><strong>Sub Total 1</strong></td>
<td align="right"><strong><?php  number_format($sub_ttl1=$task_totals-$discount,2); 

if ($vat==1)
{
$sub_ttl_vat=$sub_ttl1*0.862;

$vat_value=0.16*$sub_ttl_vat;
}

if ($vat==0)
{

$sub_ttl_vat=$sub_ttl1;
$vat_value=0.16*$sub_ttl_vat;

} 


echo number_format($sub_ttl_vat,2)

?></strong></td>


</tr>

<tr>
<td ></td>
<td></td>
<td ></td>
<td align="right"><strong>VAT (16%)</strong></td>
<td align="right"><strong><?php echo number_format($vat_value,2); ?></strong></td>


</tr>


<tr><td ></td>
<td></td>
<td></td>
<td align="right"><strong>Grand Total</strong></td>
<td align="right"><strong><?php echo number_format($grnd_ttl=$sub_ttl_vat+$vat_value,2); ?></strong></td>


</tr>
<?php


}

?>		
	
	</table>
	
	</td>

	
	
	
  
  </tr>


 
  
  
  
    
  
  

  
  
</table>
	<table width="700" border="0" class="table" align="center">


  
 
<tr bgcolor="#C0D7E5" height="30">
    <td colspan="5"><strong>REMARKS</strong><hr/></td>
 </tr>
 
 <tr><td colspan="5"  align="center"><?php echo $rowsj->general_remarks; ?></td></tr>

  <tr>
    <td colspan="5" align="right"><strong><em>Created by :
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
  <tr >
    <td colspan="5" >Sign-------------------------------------------------------------------------------------------
	Stamp----------------------------------------------------</td>
  </tr>
  
 <tr  bgcolor="#C0D7E5">
    <td colspan="5" ><strong>TERMS AND CONDITION</strong></td>
  </tr>
  
<tr>
    <td colspan="5" >
	<?php 
	echo $rowscont->invoice_terms;
	
	?>



	</strong></td>
  </tr>

</table>









</body>
</html>
