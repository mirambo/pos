<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
//$get_latest_invoice_id=$_GET['invoice_id'];
//$get_latest_client_id=$_GET['client_id'];
//$get_latest_sales_id=$_GET['sales_code'];
$amnt_rec=$_GET['amnt_rec'];
$mop=$_GET['mop'];
$date_generated=$_GET['date_generated'];
$invoice_no=$_GET['invoice_no'];
$receipt_no=$_GET['receipt_no'];
$sales_rep=$_GET['sales_rep'];
$curr_id=$_GET['curr_id'];
$year=date('Y');
//echo convert_number_to_words(123456789);

//currency name
$querycurr="select * from currency where curr_id ='$curr_id'";
$resultscurr=mysql_query($querycurr) or die ("Error: $querycurr.".mysql_error());
$rowscurr=mysql_fetch_object($resultscurr);
$curr_name=$rowscurr->curr_name;


  
$querysup="SELECT employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,employees.employee_no from employees, users where users.emp_id=employees.emp_id and users.user_id='$sales_rep'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  


include ('number_words.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Staff Commission Payment Receipt <?php echo $receipt_no;  ?></title>
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

<body onload="window.print();">
<table width="700" border="0" align="center" >
  <tr>
    <td colspan="3" rowspan="7"><img src="images/logolpo.png" /></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><font color="#000033" size="+2"><strong>
      <!--Brisk Diagnostics Limited --><a href="commission_payment_receipts.php"><div style="background-image:url(images/back.jpg); width:201px; height:32px;"></div></a>
    </strong></font></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    <!--Mobile: +254 702 358 399 / 752 755 472 --></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right"><!--Email : info@briskdiagnostics.com --></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><!--Website: www.briskdiagnostics.com--> </td>
  </tr>
  
  
  
  
  
  
  <!--<tr height="30">
    <td colspan="6"  align="center"><strong><br/><hr/><br/>Kigali Road, Jamia Plaza, 2nd Floor, P.O. BOX 71O89- 00622 Nairobi. <br/>Tel : +254 (0) 538004579 Cell : +254 702 358 399 / + 254 721 662 103. <br/>Email : info@briskdiagnostics.com. Website: www.briskdiagnostics.com <br/></strong></td>
  </tr>-->
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STAFF COMMISSION PAYMENT RECEIPT</span></td>
  </tr>
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  
  <tr height="20">
    <td colspan="6"  align="right">DATE : <?php echo $date_generated; ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong>RECEIPT NO:  <?php 
	echo $receipt_no;
	
	?>
	
	</strong></td>
  </tr>
  
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    <td><strong><font size="+1">Employee NO: <?php echo $rowssupp->employee_no;?></font></strong></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  
  
 
  
  
  
<tr>
    <td colspan="6"><font size="+1">Payment To: <u><i><?php echo $rowssupp->emp_firstname.''.$rowssupp->emp_middle_name.''.$rowssupp->emp_lastname; ?></u></i></font></td>
   
  </tr>
  <tr height="20">
    <td><font size="+1"><strong></strong></font></td>
    <td colspan="5"></td>
  </tr>
  
  <tr>
    <td colspan="6"><font size="+1">The Sum Of : <?php 
	
	echo '<u><i>'.$curr_name.' '.convert_number_to_words ($amnt_rec).' '.'only</i></u>' ;
	
	
	?></font></td>
    
  </tr>
  
  <tr height="20">
    <td><font size="+1"><strong></strong></font></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    <td colspan="6"><font size="+1">Being payment for <i><u>commissions due <?php echo $invoice_no;  ?></font></u></i></td>
    
  </tr>
  
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    <td colspan="2"><font size="+2"><?php echo $curr_name.' ';  ?><i><u><?php echo number_format($amnt_rec,2);  ?></font></u></i></td>
    <td colspan="4">_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</td>
  </tr>
  
  <tr height="20">
    <td><i><strong>Paid Via : <?php echo $mop; ?></i></strong></td>
    <td colspan="5" align="right">For : BRISK DIAGNOSTICES LIMITED</td>
  </tr>
  
   <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
   <tr>
    <td colspan="8" align="right"><strong><em>Receipt generated by :
          <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr>
  
  <tr height="20">
    <td></td>
    <td colspan="5"></td>
  </tr>
  
  <tr height="20">
    
    <td colspan="6"><hr/></td>
  </tr>
  
  
  
  
  <!--<tr>
    <td>&nbsp;</td>
	<td><strong>Client Name</strong></td>
    <td ><?php //echo $rowssupp->c_name; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Address</strong></td>
    <td width="31%">P.O. BOX <?php //echo $rowssupp->c_address; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Town&nbsp;</strong></td>
    <td><?php //echo $rowssupp->c_town; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Telephone</strong></td>
    <td><?php //echo $rowssupp->c_phone; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Email Address</strong></td>
    <td><?php //echo $rowssupp->c_email; ?></td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
  
  
</table>









</body>
</html>
