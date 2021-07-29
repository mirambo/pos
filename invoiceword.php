<?php 
include('includes/session.php');
include('Connections/fundmaster.php');


$invoice_no=$_GET['invoice_no'];
$client_id=$_GET['client_id'];
$invoice_amount=$_GET['invoice_amount'];
$ttl_days=$_GET['ttl_days'];
$manhours_charges=$_GET['manhours_charges'];
$visa_charges=$_GET['visa_charges'];
$per_dm=$_GET['per_dm'];
$flight_charges=$_GET['flight_charges'];
$current_month=(Date("F Y"));
$contract_no=$_GET['contract_no'];
include ('number_words.php');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Invoice-$invoice_no.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice - <?php echo $invoice_no; ?></title>
<link rel="stylesheet" type="text/css" href="http://localhost/sipet/csspr.css"  />

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
</head>

<body >
<table width="700" border="1" align="center" class="table">
<?php 
  
$querysup="select * from clients where client_id ='$client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>
 
  <tr>
    <td width="20%" align="center" ><img src="http://localhost/sipet/images/logoeaco.jpg" width="100" height="110"/></td>
	<td colspan="6" valign="top" align="center">
	<!--<table border="1" width="100%">
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	<tr><td>sa</td></tr>
	
	
	</table>-->
	<p><strong>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</strong></p>
	Plot 257, Tong Ping Area, Juba, South Sudan<br/><br/>
	Tel No: +211 (0) 911112662 / +211(0)959 0012273<br/>
	
	</td>
    
  </tr>
   <tr height="30">
    <td colspan="7" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVOICE</span></td>
  </tr>
  
  <tr>
    <td width="30%" colspan="2"><strong>To</strong></td>
	
    <td colspan="5" align="center" ><strong>Description</strong></td>
    
    
  </tr>
  <tr>
    
    <td><strong>Client Name</strong></td>
    <td width="35%"><?php echo $rowssupp->c_name; ?></td>
	<td colspan="5" rowspan="4">Charges for provision of Project Consultancy Services (PCS) for Facilities Engineering
	Department For Month of <?php echo $current_month;?>
	
	
	</td>
  </tr>
  <tr>
    
    <td><strong>Postal Address</strong></td>
    <td>P.O. BOX <?php echo $rowssupp->c_address; ?></td>
	
  </tr>
  <tr>

    <td><strong>Town</strong></td>
    <td><?php echo $rowssupp->c_town; ?></td>
	
  </tr>
  <tr>
    
    <td><strong>Telephone</strong></td>
    <td><?php echo $rowssupp->c_phone; ?></td>

  </tr>
 
  <tr height="40">
    <td colspan="7"  align="right"><span style="float:left;">Term Of Payments : 30 days</span>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	DATE : <?php echo (Date("l F d, Y")); 

	?></td>
  </tr>
  
   <tr height="40">
    <td colspan="7"  align="left"><strong>INVOICE NO : <?php 
	echo $invoice_no;
	
	?>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	

	</strong><span align="right"><strong>Contract No: <?php echo $contract_no; ?></strong></span>	</td>
  </tr>
  
 
  <tr height="30">
    <td colspan="7" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">INVOICE DETAILS</span></td>
  </tr>
  
  
    
  
  

  
  
</table>

<table width="700" border="0" align="center" class="table">
   <tr  style="background:url(images/description.gif);" height="30">
    <td align="center" width="15%"><strong>No.</strong></td>

	<td align="center" width="30%"><strong>Particulars</strong></td>
	<td align="center" width="20%"><strong>Unit</strong></td>
	  
	<td align="center" width="100"><strong>Amount(USD)</strong></td>
		
    </tr>
	
	<tr  height="30">
    <td align="center" width="15%">1.</td>

	<td  width="30%">Man Hours</td>
	<td align="center" width="20%"><?php echo $ttl_days ?> Days</td>
	  
	<td align="right" width="100"><strong><?php echo number_format($manhours_charges,2);?></strong></td>
		
    </tr>
	<tr  height="30">
    <td align="center" width="15%">2.</td>

	<td  width="30%">Perdiem Charges</td>
	<td align="center" width="20%"></td>
	  
	<td align="right" width="100"><strong><?php echo number_format($per_dm,2);?></strong></td>
		
    </tr>
	<tr  height="30">
    <td align="center" width="15%">3.</td>

	<td  width="30%">Visa Charges</td>
	<td align="center" width="20%"></td>
	  
	<td align="right" width="100"><strong><?php echo number_format($visa_charges,2);?></strong></td>
		
    </tr>
	<tr  height="30">
    <td align="center" width="15%">4.</td>

	<td  width="30%">Flight Charges</td>
	<td align="center" width="20%"></td>
	  
	<td align="right" width="100"><strong><?php echo number_format($flight_charges,2);?></strong></td>
		
    </tr>
	
	<tr  height="40">
    <td align="center" width="15%"></td>

	<td  width="30%"><strong><font size="+1">Grand Totals</font></strong></td>
	<td align="center" width="20%"></td>
	  
	<td align="right" width="100"><font size="+1"><strong><?php $grnd_ttl=$manhours_charges+$per_dm+$visa_charges+$flight_charges; 
	
	echo number_format($grnd_ttl,2);
	?></font></strong></td>
		
    </tr>
	
	
	
	
	
</table>	
  

  
<table width="700" border="1" align="center" class="table">
  <tr height="30">
    <td colspan="6" ><strong>Amount In Words :   <i><?php 
	
	echo $conv=convert_number_to_words ($grnd_ttl);
	
	
	?></li></strong></td>
  </tr>
  
  <tr height="30">
    <td colspan="6" ><strong>Payment Should Be Credited into : </strong><br/>
	<strong>Bank Name :</strong> QNB DOHA<br/>
	<strong>Benefeciary's Name :</strong> SIPET ENGINEERING & CONSULTANCY SERVICES LTD.<br/>
	<strong>Beneficiary's address : </strong>Plot 257, Tong Ping Area, Juba South Sudan<br/>
	<strong>Beneficiary Bank Name :</strong> Qatar National Bank SAQ<br/>
	<strong>Beneficiary Bank Address : </strong>P.O. Box 1000, Doha, Qatar<br/>
	<strong>Beneficiary's Account No.:</strong>0849-027297-061 (USD)<br/>
	<strong>Swifte Code :</strong> QNBAQAXXX<br/>
	
	
	
	</td>
  </tr>
  
  <tr height="100">
    <td colspan="6" valign="top">
	<strong>Authorised Signatory</strong><br/><br/><br/><br/>
	
	--------------------------------------------------------<br/>
	Mohd Nadziri Ismail<br/>
	<strong>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LTD</strong>



	</td>
  </tr>
  <tr height="40" align="right">
    <td colspan="6" ><i>Generated By :<?php echo $user_id; ?></i></td>
  </tr>
 
  
</table>








</body>
</html>
