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

$job_card_id=$_GET['job_card_id'];
$sqlrec="select * from invoice_payments where invoice_payment_id='$invoice_payment_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);
$rec_date=$rowsrec->date_paid;


$invoice_no=$job_card_id;


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
$client_id=$rowsj->customer_id;
$vehicle_description=$rowsj->vehicle_description;
$start_from=$rowsj->starting_from;
$sale_type=$rowsj->sale_type;

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
  <tr bgcolor="#FFFFCC">
    <td colspan="6"> <?php echo $rowscont->company_description; ?></td>
  </tr>

  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">
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
    <td colspan="10" ><strong>
	<?php if ($sale_type=='cr')
{
?>
	INVOICE NO
<?php
}
else
{?>

RECEIPT NO	
<?php 
}
?>	
:	
	
	<?php echo $invoice_payment_id; ?>
	&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<span align="center">JOB CARD NO: <?php echo $invoice_no; ?></span>
	
	
	
	<?php //echo $invoice_no; ?><span style="float:right;">DATE : <?php echo $rec_date;

	?> </span><hr/></td>
  </tr>
  
 
  
  <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>JOB CARD DETAILS</strong><hr/></td>
<?php 


?>
	
	
	
  
  </tr>
  
  <tr height="30">
    <td colspan="9">
	
	<table width="100%" border="0" class="table">
	
	
	
 <tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Start from<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (SSP)<strong></td>
<td width="15%"><strong>Total Cost (SSP)<strong></td>

</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from job_card_task where job_card_id='$job_card_id' order by job_card_task_id asc";
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
 
$service_id=$rowsts->service_item_id;
$querytcs="select * from service_item where service_item_id='$service_id'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);

?>
		
		
		<?php echo $rowstcs->service_item_name; ?></td>
        <td width="10%"><?php echo $rowsts->description;?></td>   
        <td width="10%"><?php echo $rowsts->start_from;?></td>   
		<td align="center"><?php echo $quantity=$rowsts->quantity;?></td>	
		<td align="center"><?php echo $unit_cost=$rowsts->unit_cost;?></td>
		<td align="center"><?php echo $ttl_amnt=$unit_cost*$quantity;    $grnd_amnt=$grnd_amnt+$ttl_amnt;?></td>
            
        </tr>
<?php 
}
?>
<tr>
<td colspan="6" align="center">
<strong><font color="#000000">Total Amount : <?php echo $grnd_amnt ?></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="#009900">Amount Paid : 
<?php 
	   $query1pd="select SUM(amount_received) as ttl_amnt from invoice_payments WHERE sales_code_id='$job_card_id'"; 
	   $results1pd=mysql_query($query1pd) or die ("Error: $query1pd.".mysql_error()); 
	   $rowspd=mysql_fetch_object($results1pd);
	   
	   echo $ttl_amount_paid=$rowspd->ttl_amnt;
	   ?></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<font color="#ff0000">
Balance : 
<?php echo $balance=$grnd_amnt-$ttl_amount_paid; ?>

</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="#0033CC">Amount Received : 
<?php 
	   $queryrec="select amount_received from invoice_payments WHERE invoice_payment_id='$invoice_payment_id'"; 
	   $resultsrec=mysql_query($queryrec) or die ("Error: $queryrec.".mysql_error()); 
	   $rowsrec=mysql_fetch_object($resultsrec);
	   
	   echo $amount_rec=$rowsrec->amount_received;
	   ?>
<font></strong>
</td>
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
    <td colspan="9"><strong>REMARKS</strong><hr/></td>
 </tr>
 
 <tr><td colspan="3" width="60%" align="center"><textarea readonly rows="5" cols="107"><?php echo $rowsj->general_remarks; ?></textarea></td></tr>

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
	
	<?php 
	echo $rowscont->receipt_terms;
	
	?>



	</strong></td>
  </tr>

</table>









</body>
</html>
