<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$id=$_GET['customer_id'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Customer_Statement.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
Customer Statement Of Account <?php echo $invoice_no; ?></title>
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

<body >
<table width="700" border="0" align="center" style="margin:auto">
   <?php 
  
$querysup="select * from customer where customer_id ='$id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td  align="right"  rowspan="6" valign="top">
	<table width="100" border="0">
		<tr><td colspan="2"><font size="+1"><strong>Customer Details</strong></font></td></tr>
	<tr><td><strong>Customer Name</strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->town; ?></td></tr>
	<tr><td><strong>Telephone</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr><td><strong>Email Address</strong></td><td><?php echo $rowssupp->email; ?></td></tr>
	
	</table>
	
	
	</td>
 <td colspan="3" align="right">JUBA STATIONERY AND PRINTING COMPANY LIMITED</td>
   
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
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:14px; font-weight:bold; color: #FFFFFF;">CUSTOMER STATEMENT OF ACCOUNT</span>
	
	</td>
  </tr>
  <tr height="30" align="center">
    <td colspan="6" ><?php

if ($date_from!='' && $date_to!='')
{
?>
<strong>Statement of account for the period between <font color="#ff0000"><?php echo $date_from ?></font> and <font color="#ff0000"><?php echo $date_to ?> </font></strong>

<?php
}
else
{
?>
<strong>Full Statment Of Account</strong>
<?php
}

?><hr/></td>
  </tr>
  
  </table>
  <table width="700" border="1" class="table" align="center">
  <tr  style="background:url(images/description.gif);" height="30" align="center">
  <td width="10%"><strong>Transaction Date</strong></td>
<td width="20%"><strong>Transaction Details</strong></td>
<td width="15%"><strong>Amount(Mixed Currency)</strong></td>
<td width="10%"><strong>Rate</strong></td>
<td width="15%"><strong>Amount (Tshs)</strong></td>
<td width="15%"><strong>Balance (Tshs)</strong></td>
<td width="15%"><strong>Balance (Mixed Currency)</strong></td>

</tr>	
<?php 
$sql="SELECT  * FROM customer_transactions WHERE customer_id='$id' order by transaction_date asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
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

<td align="center"><?php echo $rows->transaction_date;  ?></td>
<td><?php echo $rows->transaction;  ?></td>
<td align="right"><?php 

$currency=$rows->currency;
	$querytcs="select * from currency where curr_id='$currency'";
$resultstcs=mysql_query($querytcs) or die ("Error: $querytc.".mysql_error());								  
$rowstcs=mysql_fetch_object($resultstcs);
echo $curr_name=$rowstcs->curr_name;








 number_format($amount=$rows->amount,2);  
 if ($amount>0)
 {
 echo  number_format($amount,2);  
 }
 else
 {
  echo  '';
 }
 
 ?>


</td>
  <td align="right"><?php echo $curr_rate=$rows->curr_rate; ?></td> 


<td align="right">
<?php 
 number_format($curr_amount=$rows->amount*$curr_rate,2);  
 if ($$curr_amount>0)
 {
 
   echo  '';
 }
 else
 {
 echo  number_format($curr_amount,2); 
 }
 
 ?>

</td>


<td align="right"><?php
$bal=$bal+$curr_amount;

 echo number_format($bal,2);  ?></td>

 
 <td align="right"><?php
 
 echo $curr_name.' ';
$bal2=$bal2+$amount;

 echo number_format($bal2,2);  ?></td>
</tr>
	
<?php 
}}
else
{?>
  <tr height="30" bgcolor="#ffffcc"><td colspan="3" align="center"><font color="#ff0000"><strong>Sorrr!! No Transaction Found</strong></font></td></tr>
<?php

}

?>	

  
  
  <tr>
    <td colspan="5" align="right"><strong><em>Printed by :
         <?php 
		 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr></table>
  
  <br/>
  
<table width="700" border="0" align="center">
  <tr height="30">
    <td colspan="5" >Sign-------------------------------------------------------------------
	Stamp-------------------------------------------------------------------</td>
  </tr>
  
   
</table>








</body>
</html>
