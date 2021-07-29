<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['supplier_id'];

$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Suppliers_Statement.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supplier Statement Of Account</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css"/>

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
<table width="700" border="0" align="center" style="margin:auto">
   <?php 
  
$querysup="select * from suppliers where supplier_id ='$supplier_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td  align="right"  rowspan="6" valign="top">
	<table width="700" border="0">
	<tr><td colspan="2"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr><td ><strong>Supplier Name:</strong></td><td><?php echo $rowssupp->supplier_name; ?></td></tr>
	<tr><td><strong>Address:</strong></td><td><?php echo $rowssupp->postal; ?></td></tr>
	<tr><td><strong>Country:</strong></td><td><?php echo $rowssupp->country; ?></td></tr>
	<tr><td><strong>Telephone:</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><strong>Email Address:</strong></td><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 <td colspan="4" align="right">JUBA STATIONERY AND PRINTING COMPANY LIMITED</td>
   
  </tr>
  <tr>

    <td colspan="4"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="4"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
  <tr height="30">
    <td colspan="5" bgcolor="#000033" align="center"><span style="font-size:14px; font-weight:bold; color: #FFFFFF;">SUPPLIER STATEMENT OF ACCOUNT</span>
	
	</td>
  </tr>

  
  
 
  
  <tr height="30">
    <td colspan="5"  align="right" >Date Printed : <?php echo (Date("l F d, Y")); 
	
	?>

	
	</td>
  </tr>
  
 
</table>
<?php 

?>
<table width="700" border="0" align="center" class="table">





   <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="600"><div align="center"><strong>Transaction</strong></td>
    <td width="150" ><div align="center"><strong>Amount Other Currencies</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>
    <td width="100" ><div align="center"><strong>Amount (USD)</strong></td>
    <td width="200"><div align="center"><strong>Balance (USD)</strong></td>
    </tr>
<?php 
 $bal==0; 
if ($date_from=='' && $date_to=='')
{
$sql="select * from supplier_transactions where supplier_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

}


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
    <td align="right"><?php
	$currency_id=$rows->currency;
	$sqlcurr="select * from currency where curr_id='$currency_id'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' ';

//number_format($str2=substr($amount,1),2);

 number_format($forecurr_amnt=$rows->amount,2);
	if ($forecurr_amnt<0)
	{
	echo number_format($str2=substr($forecurr_amnt,1),2);
	}
	else
	{
   echo number_format($forecurr_amnt=$rows->amount,2);
 }
	
	?></td>
	<td align="right"><?php echo number_format($rows->curr_rate,2);?></td>
	<td align="right"><?php 
	
number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
	
	if ($amount<0)
	{
echo number_format($str2=substr($amount,1),2);
	}
	else
	{
   echo number_format($amount=$forecurr_amnt*$rows->curr_rate,2);
 }
	
	//echo number_format($str2=substr($forecurr_amnt,1),2);
	
	?></td>
    <td align="right">
<?php
	
echo number_format($bal=$bal+$amount,2);





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


 
 
 <table width="700" border="0" align="center" style="margin:auto;"> 
  <tr align="right" height="20">
   <td colspan="6" ><strong><em>Printed by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr>  
  
  
  </table>






</body>
</html>
