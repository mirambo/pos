<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$direct=$_GET['direct'];

$credit_note_id=$_GET['credit_note_id'];
$sqlrec="select * from credit_note_payments where credit_note_payment_id='$credit_note_payment_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);



$invoice_no=$credit_note_id;


$terms=$rowsrec->terms;
$vehicle_make=$rowsrec->vehicle_make;
$vehicle_model=$rowsrec->vehicle_model;
$engine=$rowsrec->engine;
$odometer=$rowsrec->odometer;
$chasis_no=$rowsrec->chasis_no;
$trim_code=$rowsrec->trim_code;
$reg_no=$rowsrec->reg_no;
$bk_user_id=$rowsrec->user_id;

$sqlj= "SELECT * FROM credit_note WHERE credit_note_id='$credit_note_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);

$date_generated=$rowsj->date_generated;
$jb_user_id=$rowsj->user_id;
$client_id=$rowsj->customer_id;
$vehicle_description=$rowsj->vehicle_description;
$start_from=$rowsj->starting_from;
$sale_type=$rowsj->sale_type;
$rec_date=$rowsj->credit_note_date;
$terms=$rowsj->terms;

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


  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">

CREDIT NOTE

	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10" ><strong>
	

CREDIT NOTE NO

:	
	
<?php echo $invoice_no; ?>
	&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	

	
	
	
	<?php //echo $invoice_no; ?>
	<span style="float:right;">DATE : <?php echo $rec_date=$rowsj->credit_note_date;

	?> </span><hr/></td>
  </tr>
  
 
  
  <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>CREDIT NOTE DETAILS</strong><hr/></td>
<?php 


?>
	
	
	
  
  </tr>
  
  <tr height="30">
    <td colspan="9">
	
	<table width="100%" border="0" class="table">
	
	
	
 <tr style="background:url(images/description.gif);" height="20" align="center">
<td width="20%"><strong>Service Item</strong></td>
<td width="10%"><strong>Description<strong></td>
<td width="10%"><strong>Quantity<strong></td>
<td width="15%"><strong>Unit Cost (SSP)<strong></td>
<td width="15%"><strong>Total Cost (SSP)<strong></td>

</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from credit_note_task where credit_note_id='$credit_note_id' order by credit_note_task_id asc";
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
		<td align="center"><?php echo $quantity=$rowsts->quantity;?></td>	
		<td align="center"><?php echo $unit_cost=$rowsts->unit_cost;?></td>
		<td align="center"><?php echo $ttl_amnt=$unit_cost*$quantity;    $grnd_amnt=$grnd_amnt+$ttl_amnt;?></td>
            
        </tr>
<?php 
}
?>
<tr>
<td colspan="5" align="center">
<strong><font color="#000000">Total Amount : <?php echo $grnd_amnt ?></font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="#009900">Amount Paid : 
<?php 
	   $query1pd="select SUM(amount_received) as ttl_amnt from credit_note_payments WHERE sales_code_id='$credit_note_id'"; 
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
<!--<font color="#0033CC">Amount Received : 
<?php 
	   $queryrec="select amount_received from credit_note_payments WHERE credit_note_payment_id='$credit_note_payment_id'"; 
	   $resultsrec=mysql_query($queryrec) or die ("Error: $queryrec.".mysql_error()); 
	   $rowsrec=mysql_fetch_object($resultsrec);
	   
	   echo $amount_rec=$rowsrec->amount_received;
	   ?>
<font>--></strong>
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
 
 <tr><td colspan="3" width="60%" align="center"><textarea readonly rows="5" cols="107"><?php echo $rowsj->terms; ?></textarea></td></tr>

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
	echo $rowscont->credit_note_terms;
	
	?>



	</strong></td>
  </tr>

</table>









</body>
</html>
