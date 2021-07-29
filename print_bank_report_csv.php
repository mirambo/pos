<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$bank=$_GET['bank'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=System_Bank_Transactions_Report.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>System Bank Statement Report</title>
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
 
<table width="700" border="0" align="center" style="margin:auto;" >
<?php 
  



$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><?php echo $rowscont->cont_person;?></td>
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
  </tr><!-- <tr>
    <td colspan="5"><div align="right">Website : <?php echo $rowscont->website; ?></div></td>
  </tr> -->
<tr>
    <td colspan="7"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
   

  <tr height="30">
    <td colspan="7" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">SYSTEM BANK STATEMENT REPORT</span>
	
	</td>
  </tr>
  </table>
  <?php
 ?> 
 
<table width="700" border="0" align="center" class="table" style="margin:auto;" >
<tr height="30" bgcolor="#FFFFCC">
 <td colspan="7"  align="center" >

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">System Bank Statement for Account: </font><font size="+1" color="#ff0000"><?php 

$sqlemp_det="select * from banks where bank_id='$bank'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
 ?></font></strong></div>

  </tr>
  <tr bgcolor="#FFFFCC"><td colspan="7" align="center"><strong><font size="+1">
<?php if ($date_from!='' && $date_to!='')
{
  
  ?>
  For the Period Between <?php echo $date_from?> AND <?php echo $date_to; ?>

  <?php 
 }
else
{ ?>
  For the Period Ending : </font><font color="#ff0000" size="+1"><?php echo date('Y-m-d'); ?>
<?php


} 
  
  ?>
  
  
  </font><font color="#ff0000" size="+1"><?php echo date('Y-m-d'); ?></font></strong></td></tr>

	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="15%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
    <td width="5%"><div align="center"><strong>Money In (SSP)</strong></div></td>
    <td width="5%"><div align="center"><strong>Money Out (SSP)</strong></div></td>
   	<td width="2%"><div align="center"><strong>Balance (SSP)</strong></div></td>
  
  </tr>
  <?php
  
  $run_bal=0;
  $amount=0;
  $inc_kshs=0;
  if (!isset($_POST['generate']))
{ 
  
$sql="SELECT * FROM bank_statement, currency where bank_statement.currency_code=currency.curr_id AND bank_statement.bank_id='$bank' ORDER BY transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
$sql="SELECT * FROM bank_statement, currency where bank_statement.currency_code=currency.curr_id AND 
bank_statement.bank_id='$bank' AND bank_statement.date_recorded>='$date_from' AND bank_statement.date_recorded<='$date_to' 
ORDER BY transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="SELECT * FROM bank_statement, currency where bank_statement.currency_code=currency.curr_id AND bank_statement.bank_id='$bank' ORDER BY transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}

if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" >';
}
else 
{
echo '<tr bgcolor="#FFFFCC"  >';
}

 ?>
<td align="center"><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transactions;?></td>
    <td align="right">
	
	<?php echo $rows->curr_name.' ';
	
	$amount=$rows->amount;
	
	if ($amount<0)
	{
	echo number_format($str2=substr($amount,1),2);
	
	}
	else
	{
	
	echo number_format($amount,2);
	
	}
	
	//.' '.number_format($amount=$rows->amount,2);?></td>
    <td align="right"><?php 
	echo number_format($curr_rate=$rows->curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
	<td align="right"><?php 
	$money_in=$rows->debit;
	
	if ($money_in<0)
	{
	echo $str2=substr($money_in,1);
	
	}
	else
	{
	
	echo number_format($money_in*$curr_rate,2);
	
	}
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
	<td align="right"><?php 
	echo number_format($money_out=$rows->credit*$curr_rate,2);
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>
    <td align="right"><?php 
$inc_kshs=$amount*$curr_rate;	
	//echo $rows->Project_Name;
	echo number_format($run_bal=$run_bal+$inc_kshs,2);
	?></td>
	</tr>
<?php
//$gnd_amnt=$gnd_amnt+$inc_kshs;
}

}

 ?>
 <!--<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Inflows (Kshs)</strong></td>
    <td width="5%" colspan="1" align="center"><strong><font color="#00CC33" size="+1"><?php echo number_format($gnd_amnt,2);?></font></strong></td>
    
	
    
	
	
  </tr>-->

</table>
</form>



<table width="700" border="0" style="margin:auto;"> 
  <tr  height="20">
   <td colspan="7" align="right"><strong>Printed by :
 <?php 
$sqluser="select * from users where user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
   </strong></td>
  </tr>  
  
  
  </table>

</body>
</html>
