<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$get_latest_rfq_id=$_GET['all_rfq_id'];
$rfq_no=$_GET['rfq_no'];
$get_latest_sup_id=$_GET['supp_id'];
$get_latest_rfq_id=$_GET['rfq_code'];

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=RFQ-$rfq_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$year=date('Y');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Request for Quotation - <?php echo $rfq_no; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />

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
    <td colspan="4" rowspan="7" valign="center" width="60%">
	<table width="100%" border="0">
	<?php 
	
$querysup="select * from suppliers where supplier_id ='$get_latest_sup_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
	
$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);	
	
	
	?>
	
	
	
	</table>
	
	
	</td>
    
  </tr>
  <tr>
    <td colspan="3" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
    <tr>
    <td colspan="7"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Website : www.briskdoagnostics.com</div></td>
  </tr>
  <tr><td colspan="7"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr>
    
	
    <td colspan="4"><strong>Supplier Name : </strong><?php echo $rowssupp->supplier_name; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    
   
    <td width="31%" colspan="4"><strong>Postal Address : </strong>P.O. BOX <?php echo $rowssupp->postal; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
   
  
    <td colspan="4"><strong>Town / City : </strong><?php echo $rowssupp->town; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
 

    <td width="31%" colspan="4"><strong>Country : </strong><?php echo $rowssupp->country; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    
    
    <td colspan="4"><strong>Mobile Phone No. : </strong><?php echo $rowssupp->phone; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    
    
    <td colspan="4"><strong>Email Address : </strong><?php echo $rowssupp->email; ?></td>
    <td >&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
 
 
  <tr height="30">
    <td colspan="11" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">REQUEST FOR QUOTATION</span></td>
  </tr>
  <tr height="20">
    <td colspan="11"  align="left">DATE : <?php echo (Date("l F d, Y")); 
	$date_generated=date('Y-m-d');
	?><hr/></td>
  </tr>
  
   <tr height="2%">
    <td colspan="11"  align="left"><strong>REF NO :  <?php 
	echo $rfq_no;
	
	
	?>
	
	</strong><hr/></td>
  </tr>
  </table>

  <table width="700" border="0" align="center" bgcolor="#C0D7E5" style="border-top:1px solid #073B6A; border-bottom:1px solid #073B6A;">
  <tr>
    <td colspan="2" width="40%"><strong>CONTACT </strong></td>
    <td colspan="2"><strong>DELIVERY ADDRESS </strong></td>
    <td width="56%"><strong>SHIP VIA </strong></td>
    <td width="30%"><strong>PAYMENT TERMS </strong></td>
  </tr>
  
  <?php 
	
$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
	
	
	
	
	?>
  
  
  
  <tr>
    <td colspan="2"><?php echo $rowscont->cont_person; ?></td>
    <td colspan="2"><?php echo $rowscont->street; ?></td>
	<?php 
	
$queryship="select * from shippers where shipper_id ='$shipp_id'";
$resultsship=mysql_query($queryship) or die ("Error: $queryship.".mysql_error());
$rowsship=mysql_fetch_object($resultsship);
	
	
	
	
	?>
	
	
    <td><?php echo $rowsship->shipper_name;   ?></td>
    <td><?php echo $pay_terms;   ?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->phone; ?></td>
    <td colspan="2"><?php echo  $rowscont->building; ?></td>
    <td><?php echo $rowsship->town;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->telephone; ?></td>
    <td colspan="2">P.O.BOX<?php echo  $rowscont->address; ?> </td>
    <td><?php echo $rowsship->phone;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo  $rowscont->email; ?></td>
    <td colspan="2"><?php echo  $rowscont->town; ?> - Kenya</td>
    <td><?php echo $rowsship->email;   ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td width="31%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
  <?php 
  
$querysup="select * from suppliers where supplier_id ='$get_latest_sup_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>

  
  
   
</table>
  <br/>
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
