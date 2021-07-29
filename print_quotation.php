<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$direct=$_GET['direct'];

$job_card_id=$_GET['quotation_id'];

$sqlj= "SELECT * FROM quotation WHERE quotation_id='$job_card_id'";
$resultsj= mysql_query($sqlj) or die ("Error $sqlj.".mysql_error());
$rowsj=mysql_fetch_object($resultsj);
$date_generated=$rowsj->quotation_date;
$jb_user_id=$rowsj->user_id;
$client_id=$rowsj->customer_id;
$terms=$rowsj->terms;
$start_from=$rowsj->starting_from;

 $curr_id=$rowsj->currency;
$querytc="select * from currency where curr_id='$curr_id'";
$resultstc=mysql_query($querytc) or die ("Error: $querytc.".mysql_error());								  
$rowstc=mysql_fetch_object($resultstc);
$curr_name=$rowstc->curr_name;




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

QUOTATION
	
	</span></td>
  </tr>
  <tr height="30">
    <td colspan="10" ><strong>QUOATION NO : <?php echo $job_card_id; ?>
	&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<!--<span align="center">JOB CARD NO: <?php echo $invoice_no; ?></span>-->
	
	
	
	<?php //echo $invoice_no; ?><span style="float:right;">DATE : <?php echo $date_generated;

	?> </span><hr/></td>
  </tr>
  
 
  
  <tr bgcolor="#C0D7E5" height="30" align="center">
    <td colspan="9"><strong>QUOTATION DETAILS</strong><hr/></td>
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
<td width="15%"><strong>Unit Cost (<?php echo $curr_name;?>)<strong></td>
<td width="15%"><strong>Total Cost (<?php echo $curr_name;?>)<strong></td>

</tr>
<?php
$task_totals=0;
$sqlts="SELECT * from quotation_task where quotation_id='$job_card_id' order by quotation_task_id asc";
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
		<td align="right"><?php echo $ttl_amnt=$unit_cost*$quantity;    $grnd_amnt=$grnd_amnt+$ttl_amnt;?></td>
            
        </tr>
<?php 
}
?>
<tr>
<td></td>
<td></td>

<td colspan="2" align="right"><strong><font color="#000000" size="+1">Total Amount (<?php echo $curr_name;?>):</font></strong></td>
<td  align="right">
<strong><font color="#000000"  size="+1"> <?php echo $grnd_amnt ?></font></strong>
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
    <td colspan="9"><strong>PAYMENT TERMS</strong><hr/></td>
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
    <td colspan="6" ><strong>TERMS AND CONDITIONS</strong></td>
  </tr>
  
<tr>
    <td colspan="6" >
<?php 

echo $rowscont->quotation_terms;
?>



	</strong></td>
  </tr>

</table>

</body>
</html>
