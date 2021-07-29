<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Client Statement Of Account</title>
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
<table width="700" border="0" align="center" style="margin:auto;">
   
	
	 <?php 
  
$querysup="select * from clients where client_id ='$id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="6" valign="top">
	<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr><td><strong>Client Name</strong></td><td><?php echo $rowssupp->c_name; ?></td></tr>
	<tr><td><strong>Address</strong></strong></td><td>P.O. BOX <?php echo $rowssupp->c_address; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->c_town; ?></td></tr>
	<tr><td><strong>Telephone</strong></td><td><?php echo $rowssupp->c_phone; ?></td></tr>
	<tr><td><strong>Email Address</strong></td><td><?php echo $rowssupp->c_email; ?></td></tr>
	<tr><td><strong>Contact Person</strong></td><td><?php echo $rowssupp->contact_person; ?></td></tr>
	
	</table>
	
	
	</td>
 
    <td colspan="3" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
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
    <td colspan="6"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STATEMENT OF ACCOUNT</span>
	
	</td>
  </tr>
  
  
   <tr height="30">
    <td colspan="7"  align="right" >Date Printed : <?php echo (Date("l F d, Y")); 
	
	$date_generated=date('Y-m-d')?>
	<hr/>
	
	</td>
  </tr>
  
 
  
</table>



<?php 
if ($date_from=='' && $date_to=='')

{
?>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>

	
<?php 
 $bal==0; 
$sql="select * from client_transactions where client_id='$id' and amount!='0'and amount!='-0'";
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
<?php
}
else
{

?>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="6"><div align="center"><strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong></div></td>
</tr>

  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
	<tr bgcolor="#C0D7E5" height="25">
	<td><?php echo $date_from; ?></td>
	<td><strong>Balance Brought forward (Bal b/f)</strong></td>
	<td></td>
	<td align="right"><strong>
	<?php 
  
$sqlbd="select * from client_transactions where client_id='$id' AND date_recorded <'$date_from' and amount!='0'and amount!='-0'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());




?>

<?php 

if (mysql_num_rows($resultsbd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbd=mysql_fetch_object($resultsbd))
							  { 
							  
					

 
 
 ?>
 
  


	
	<?php number_format($amount=$rowsbd->amount,2);
	
	if ($amount>0)
	{
		number_format($amount=$rowsbd->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	number_format($str2=substr($amount,1),2);
	}
	$bal=$bal+$rowsbd->amount;
	}
	
	
	?>
	
	
<?php
echo number_format($bal,2);
}
	?>
	
	</strong></td>

	</tr>	
<?php 
 $bal==0; 
$sql="select * from client_transactions where client_id='$id' AND date_recorded BETWEEN '$date_from' AND '$date_to' and amount!='0'and amount!='-0'";
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
<?php





}




 ?>
 
 
  <br/>  <br/>
<table width="700" border="0" align="center" style="margin:auto;" class="table">
<tr bgcolor="#FFFFCC" height="30" align="center">
<td><strong>Current Balance  <br/>(0-30 days)</strong></td>
<td><strong>Due Balance <br/>(31-60 days)</strong></td>
<td><strong>Overdue Balance <br/>(61-90 days)</strong></td>
<td><strong>Past Overdue Balance <br/>(Over 90 days)</strong></td>
  </tr>
  <tr bgcolor="#C0D7E5" height="30" align="center">
<td>
<?php 
$current_date2=date("Y-m-d", strtotime("+ 1 day"));
$date_back1=date("Y-m-d", strtotime("- 30 day"));

$sqlinv="select * from invoices where client_id='$id' and date_generated BETWEEN '$date_back1' AND '$current_date2' AND status='1'";
$resultsinv= mysql_query($sqlinv) or die ("Error $sqlinv.".mysql_error());

if ($numrowsinv=mysql_num_rows($resultsinv)>0)
{
while ($rowsinv=mysql_fetch_object($resultsinv))
			{
 $inv_bal=$rowsinv->invoice_ttl;
 $sales_code=$rowsinv->sales_code.'- ';
 
$sqlp="select sum(amount_received) as ttlrec from invoice_payments where sales_code='$sales_code' and date_received BETWEEN '$date_back1' AND '$current_date2'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
if ($numrowsp=mysql_num_rows($resultsp)>0)
{
while ($rowsp=mysql_fetch_object($resultsp))
			{
		$payment=$rowsp->ttlrec;
		$grnd_payment=$grnd_payment+$payment;
			
			}
		$grnd_payment;
			}
			
//$rowsp=mysql_fetch_object($resultsp);
//echo $payment=$rowsp->amount_received;
 
 
  $grnd_inv_bal=$grnd_inv_bal+$inv_bal;
 
 	$grnd_payment;
		
$balpn=$grnd_inv_bal-$grnd_payment;
			}
echo number_format($balpn,2);

}

?>
</td>
<td><?php 

$current_date2x=date("Y-m-d", strtotime(" -31 day"));
$date_back1x=date("Y-m-d", strtotime("- 60 day"));

$sqlinvx="select * from invoices where client_id='$id' and date_generated BETWEEN '$date_back1x' AND '$current_date2x' AND status='1'";
$resultsinvx= mysql_query($sqlinvx) or die ("Error $sqlinvx.".mysql_error());

if ($numrowsinvx=mysql_num_rows($resultsinvx)>0)
{
while ($rowsinvx=mysql_fetch_object($resultsinvx))
			{
 $inv_balx=$rowsinvx->invoice_ttl;
$sales_codex=$rowsinvx->sales_code.'- ';
 
$sqlpx="select sum(amount_received) as ttlrecx from invoice_payments where client_id='$id' and sales_code='$sales_codex' and date_received BETWEEN '$date_back1x' AND '$current_date2'";
$resultspx= mysql_query($sqlpx) or die ("Error $sqlpx.".mysql_error());
if ($numrowspx=mysql_num_rows($resultspx)>0)
{
while ($rowspx=mysql_fetch_object($resultspx))
			{
        $paymentx=$rowspx->ttlrecx;
	
		$grnd_paymentx=$grnd_paymentx+$paymentx;
			
			}
 //echo $grnd_paymentx;
			}
			
//$rowsp=mysql_fetch_object($resultsp);
//echo $payment=$rowsp->amount_received;
 
 
$grnd_inv_balx=$grnd_inv_balx+$inv_balx;
 
 $grnd_paymentx;
		
 $balpnx=$grnd_inv_balx-$grnd_paymentx;
			}
 echo number_format($balpnx,2);

}


?>
</td>
<td><?php 

$current_date3x=date("Y-m-d", strtotime(" -61 day"));
$date_back2x=date("Y-m-d", strtotime("- 90 day"));

$sqlinvxy="select * from invoices where client_id='$id' and date_generated BETWEEN '$date_back2x' AND '$current_date3x' AND status='1'";
$resultsinvxy= mysql_query($sqlinvxy) or die ("Error $sqlinvxy.".mysql_error());

if ($numrowsinvxy=mysql_num_rows($resultsinvxy)>0)
{
while ($rowsinvxy=mysql_fetch_object($resultsinvxy))
			{
 $inv_balxy=$rowsinvxy->invoice_ttl;
$sales_codexy=$rowsinvxy->sales_code.'- ';
 
$sqlpxy="select sum(amount_received) as ttlrecxy from invoice_payments where client_id='$id' and sales_code='$sales_codexy' and date_received BETWEEN '$date_back3x' AND '$current_date2'";
$resultspxy= mysql_query($sqlpxy) or die ("Error $sqlpxy.".mysql_error());
if ($numrowspxy=mysql_num_rows($resultspxy)>0)
{
while ($rowspxy=mysql_fetch_object($resultspxy))
			{
        $paymentxy=$rowspxy->ttlrecxy;
	
		$grnd_paymentxy=$grnd_paymentxy+$paymentxy;
			
			}
 //echo $grnd_paymentx;
			}
			
//$rowsp=mysql_fetch_object($resultsp);
//echo $payment=$rowsp->amount_received;
 
 
$grnd_inv_balxy=$grnd_inv_balxy+$inv_balxy;
 
 $grnd_paymentxy;
		
 $balpnxy=$grnd_inv_balxy-$grnd_paymentxy;
			}
 echo number_format($balpnxy,2);

}




?></td>
<td><?php 

$current_date4x=date("Y-m-d", strtotime(" -91 day"));
$date_back3x=date("Y-m-d", strtotime("- 760 day"));

$sqlinvxyz="select * from invoices where client_id='$id' and date_generated BETWEEN '$date_back3x' AND '$current_date4x' AND status='1'";
$resultsinvxyz= mysql_query($sqlinvxyz) or die ("Error $sqlinvxyz.".mysql_error());

if ($numrowsinvxyz=mysql_num_rows($resultsinvxyz)>0)
{
while ($rowsinvxyz=mysql_fetch_object($resultsinvxyz))
			{
 $inv_balxyz=$rowsinvxyz->invoice_ttl;
$sales_codexyz=$rowsinvxyz->sales_code.'- ';
 
$sqlpxyz="select sum(amount_received) as ttlrecxyz from invoice_payments where client_id='$id' and sales_code='$sales_codexyz' and date_received BETWEEN '$date_back3x' AND '$current_date2'";
$resultspxyz= mysql_query($sqlpxyz) or die ("Error $sqlpxyz.".mysql_error());
if ($numrowspxyz=mysql_num_rows($resultspxyz)>0)
{
while ($rowspxyz=mysql_fetch_object($resultspxyz))
			{
        $paymentxyz=$rowspxyz->ttlrecxyz;
	
		$grnd_paymentxyz=$grnd_paymentxyz+$paymentxyz;
			
			}
 //echo $grnd_paymentx;
			}
			
//$rowsp=mysql_fetch_object($resultsp);
//echo $payment=$rowsp->amount_received;
 
 
$grnd_inv_balxyz=$grnd_inv_balxyz+$inv_balxyz;
 
 $grnd_paymentxyz;
		
 $balpnxyz=$grnd_inv_balxyz-$grnd_paymentxyz;
			}
 echo number_format($balpnxyz,2);

}


?></td>
  </tr>
  
  
  </table>

<table width="700" border="0" align="center" style="margin:auto;"> 
  <tr align="center" height="20">
   <td colspan="4" ><strong><em>Printed by :
         <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr>  
  
  
  </table>





</body>
</html>
