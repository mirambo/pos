<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Statement_Of_Account.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice - <?php echo $invoice_no_top; ?></title>
<link rel="stylesheet" type="text/css" href="http://localhost/brisk_sys/style.css"/>

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
<?php 
  
$querysup="select * from clients where client_id ='$id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><img src="http://localhost/brisk_sys/images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Kigali Road, Jamia Plaza, 2nd Floor </div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
        <!--Tel : +254 (0) 538004579 -->
    Mobile: +254 702 358 399 / 752 755 472 </div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : info@briskdiagnostics.com </div></td>
  </tr>
  
  <tr>
    <td width="20%"  colspan="2"><font size="+1"><strong>To:</strong></font></td>
    <td colspan="3"><font size="+1"><strong><?php //echo $rowssupp->supplier_name; ?></strong></font></td>
  </tr>
  <tr>
    <td width="15%"><strong>Client Name</strong></td>
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
  </tr>
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STATEMENT OF ACCOUNT</span>
	
	</td>
  </tr>
  
  
  <tr height="20">
    <td colspan="7"  align="right" ><hr/>DATE : <?php echo (Date("l F d, Y")); 
	
	$date_generated=date('Y-m-d')?>
	<hr/>
	
	</td>
  </tr>
  
  
  
  
  
 
  
  
  
  
  
</table>

<table width="700" border="0" align="center" class="table">
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
<?php 
 $bal==0; 
$sql="select * from client_transactions where client_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


$sqlob="select opening_balance from clients where client_id='$id'";
$resultsob= mysql_query($sqlob) or die ("Error $sqlob.".mysql_error());
$rowsob=mysql_fetch_object($resultsob);

?>
<tr bgcolor="#C0D7E5" height="25">


<td></td>
<td>Opening Balance</td>
<td></td>
<td align="right"><?php echo number_format($rowsob->opening_balance,2);?></td>
</tr>
<?php 

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
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
     <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php echo number_format($rows->amount,2);?></td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

	?>
	
	</td>
    </tr>
  <?php 
  
  }
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>








</body>
</html>
