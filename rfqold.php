<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$get_latest_rfq_id=$_GET['all_rfq_id'];
$rfq_no=$_GET['rfq_no'];
$get_latest_sup_id=$_GET['supp_id'];
$get_latest_rfq_id=$_GET['rfq_code'];

$year=date('Y');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Request for Quotation - <?php echo $rfq_no; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />

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

<body>
<table width="700" border="0" align="center" >
  <tr>
    <td colspan="3" rowspan="7" valign="top">
	<table width="100%" border="0">
	<?php 
	
$querysup="select * from suppliers where supplier_id ='$get_latest_sup_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
	
	
	
	
	?>
	<tr><td colspan="2"><font size="+1"><strong>Request Quotation To:</strong></font></td></tr>
	<tr><td><font size="+1"><strong><?php echo $rowssupp->supplier_name; ?></strong></font></td></tr>
	<tr><td>P.O. BOX <?php echo $rowssupp->postal; ?></td></tr>
	<tr><td><?php echo $rowssupp->town; ?></td></tr>
	<tr><td><?php echo $rowssupp->email; ?></td></tr>
	
	
	</table>
	
	
	</td>
    
  </tr>
  <tr>
    <td colspan="3" align="right"><img src="images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">Kigali Road, Jamia Plaza, 2nd Floor </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Mobile: +254 702 358 399 / 752 755 472 </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">Email : info@briskdiagnostics.com </div></td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td colspan="3"><!--Website: www.briskdiagnostics.com--> </td>
  </tr>
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">REQUEST FOR QUOTATION</span></td>
  </tr>
  <tr height="20">
    <td colspan="6"  align="left">DATE : <?php echo (Date("l F d, Y")); 
	$date_generated=date('Y-m-d');
	?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="left"><strong>REQUEST FOR QUOTATION NO :  <?php 
	echo $rfq_no;
	
	
	?>
	
	</strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>CONTACT </strong></td>
    <td colspan="2" width="56%"><strong>DELIVERY ADDRESS </strong></td>
    <td width="56%"><strong>SHIP VIA </strong></td>
    <td width="30%"><strong>PAYMENT TERMS </strong></td>
  </tr>
  <tr>
    <td colspan="2">Hussein Hassan </td>
    <td colspan="2">Kigali Road, Jamia </td>
	
	
	
    <td><?php echo $rowsship->shipper_name;   ?></td>
    <td><?php echo $pay_terms;   ?></td>
  </tr>
  <tr>
    <td colspan="2">+254 702 358 399 </td>
    <td colspan="2">Plaza, 2nd Floor,</td>
    <td><?php echo $rowsship->town;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">+254-(0) 538004579</td>
    <td colspan="2">B.O.Pox: 71089-00622 </td>
    <td><?php echo $rowsship->phone;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">hhassan@briskdiagnostics.com</td>
    <td colspan="2">Nairobi, Kenya</td>
    <td><?php echo $rowsship->email;   ?></td>
    <td>&nbsp;</td>
  </tr>
  
  
  <?php 
  
$querysup="select * from suppliers where supplier_id ='$get_latest_sup_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>

  
  <tr height="20">
    <td colspan="6"><hr/></td>
    
  </tr>
  
 
 
  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr>
    <td width="50"><div align="center"><strong>Code</strong></div></td>
    <td width="181"><div align="center"><strong>Item Name</strong></div></td>
    <td width="164"><div align="center"><strong>Pack Size</strong></div></td>
    <td width="71"><div align="center"><strong>Qty</strong></div></td>
 
  </tr>
  
  <?php 
  
$grndttl=0;

$sqllpdet="select temp_rfq.temp_rfq_id,temp_rfq.quantity,temp_rfq.product_code,products.product_name, products.pack_size from temp_rfq, products where 
temp_rfq.product_id=products.product_id order by temp_rfq.temp_rfq_id asc";
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
  
 
    <td><?php echo $rowslpdet->product_code;?></td>
    <td><?php echo $rowslpdet->product_name; ?></td>
    <td><?php echo $rowslpdet->pack_size; ?></td>
    <td align="center"><?php echo $rowslpdet->quantity; $qnty=$rowslpdet->quantity;
	
	?></td>
    

  </tr>
  
   <?php
	
	
	}
	
	?>
 
  
   <?php 
	
	
	}
	?>
  
  <tr>
    <td colspan="4" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  









</body>
</html>
