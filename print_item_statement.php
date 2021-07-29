<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
$id=$_GET['item_id'];

$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);







?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>
Customer Statement Of Account</title>
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
<table width="700" border="0" align="center">	
	 <?php 
  
$querysup="select * from customer where customer_id ='$id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont); 
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="6" valign="top">
	<!--<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>Customer Details</strong></font></td></tr>
	<tr><td><strong>Customer Name</strong></td><td><?php echo $rowssupp->customer_name; ?></td></tr>
	<tr><td><strong>Address</strong></td><td>P.O. BOX <?php echo $rowssupp->address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->town; ?></td></tr>
	<tr><td><strong>Telephone</strong></td><td><?php echo $rowssupp->phone; ?></td></tr>
	<tr height="30"><td><strong></strong></td><td><?php // echo $rowssupp->email; ?></td></tr>
	<tr><td><strong>Date</strong></td><td><?php echo date('d-m-Y'); ?></td></tr>
	
	</table>-->
	
	
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
 
  
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:12px; font-weight:bold; color: #FFFFFF;">

STOCK CARD
	
	</span></td>
  </tr>
  <tr height="30" align="center">
    <td colspan="10" ><?php

if ($date_from!='' && $date_to!='')
{
?>
<strong>Statement of account for the period between <font color="#ff0000"><?php echo $date_from ?></font> and <font color="#ff0000"><?php echo $date_to ?> </font></strong>

<?php
}
else
{
?>

<H3>:: Stock Card Details for Item : <?php 
		$sqlclient="select * from items where item_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->item_name .' ('. $rowsclient->item_code.')';?></H3>

<?php
}

?><hr/></td>
  </tr>
  
  </table>
  <table width="700" border="1" class="table" align="center">
  <tr  style="background:url(images/description.gif);" height="30" align="center">
<td width="20%"><strong>Transaction Date</strong></td>
<td width="30%"><strong>Transaction Details</strong></td>
<td width="20%"><strong>Quantity Received</strong></td>
<td width="20%"><strong>Quantity Released</strong></td>
<td width="20%"><strong>Balance (Quantity)</strong></td>

</tr>	
<?php 

$sql="SELECT  * FROM item_transactions WHERE item_id='$id' order by transaction_date asc";
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
 number_format($amount=$rows->quantity,0);  
 if ($amount>0)
 {
 echo  number_format($amount,0);  
 }
 else
 {
  echo  '';
 }
 
 ?>


</td>

<td align="center">
<?php 
 number_format($amount=$rows->quantity,0);  
 if ($amount>0)
 {
 
   echo  '';
 }
 else
 {
 echo  number_format($amount,0); 
 }
 
 ?>

</td>

<td align="center"><?php
$bal=$bal+$rows->quantity;

 echo number_format($bal,0);  ?></td>
</tr>
	
<?php 
}}
else
{?>
  <tr height="30" bgcolor="#ffffcc"><td colspan="3" align="center"><font color="#ff0000"><strong>Sorrr!! No Transaction Found</strong></font></td></tr>
<?php

}

?>	
	
 
</table>








</body>
</html>
