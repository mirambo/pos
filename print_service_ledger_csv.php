<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Service_Ledger.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Service Revenue Ledger</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>csspr.css"/>

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
 <?php 
 if ($date_from=='' && $date_from=='')
{
 ?> 


<table width="700" border="0" align="center" >
<?php 
  



/*$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);*/
  
  
  ?>
  <!--<tr>
    <td colspan="7" align="center"><img src="<?php echo $base_url;?>images/logoeaco.jpg" /></td>
  </tr>-->
  <tr>
    <td colspan="7"><div align="center"><strong><H2>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</H2></strong><br/>
	Plot 257, Tong Ping Area, Juba, South Sudan<br/>
	Tel No: +211 (0) 911112662 / +211(0)959 0012273<br/>
	</div>
	
	</td>
  </tr>
   

  <tr height="30">
    <td colspan="7" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">SERVICE REVENUE LEDGER</span>
	
	</td>
  </tr>


    <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">Ledger Balance for the Period Ending <?php echo date('Y-m-d'); ?></font></strong></div>

  </tr>
<td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	
	<hr/>
	
	</td>
  </tr>


</table>
<table width="700" border="0" align="center" class="table">
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit (USD)</strong></td>	
	<td width="200" ><div align="center"><strong>Credit (USD)</strong></td>
	<td width="200" ><div align="center"><strong>Balance (USD)</strong></td>
  
    </tr>
 <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 

$sql="select  sales_ledger.transaction_id,sales_ledger.transactions,sales_ledger.amount,sales_ledger.debit,sales_ledger.credit,sales_ledger.currency_code,sales_ledger.curr_rate,sales_ledger.date_recorded, currency.curr_initials 
from sales_ledger,currency where sales_ledger.currency_code=currency.curr_id order by sales_ledger.transaction_id asc";
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
    <td><?php echo $rows->transactions;?></td>
	<td align="right"><?php
	$amount=$rows->amount;
	
	if ($amount>0)
	{
	echo $curr_name=$rows->curr_initials.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_initials.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	
    $currency_code=$rows->currency_code;
	
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_in_kshs=$amount_in;
	 }
	 else
	 {
	 $amount_in_kshs=$amount_in/$curr_rate;
	 
	 }

	echo number_format($amount_in_kshs,2);
	
	
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_out_kshs=$amount_out;
	 }
	 else
	 {
	 $amount_out_kshs=$amount_out/$curr_rate;
	 
	 }


	echo number_format($amount_out_kshs,2);
	
	
	
	
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
<td align="right"><strong><?php 

    if ($currency_code==2)
	{
	$amount_kshs=$amount;
	}
	else
	{
	$amount_kshs=$amount/$curr_rate;
	
	}
	
	
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></strong></td>
   
    </tr>
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  
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
  
  
  //end of filter
  }
  else
  {
  ?>
  <table width="700" border="0" align="center" >
<?php 
  



/*$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);*/
  
  
  ?>
  <!--<tr>
    <td colspan="7" align="center"><img src="<?php echo $base_url;?>images/logoeaco.jpg" /></td>
  </tr>-->
  <tr>
    <td colspan="7"><div align="center"><strong><H2>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</H2></strong><br/>
	Plot 257, Tong Ping Area, Juba, South Sudan<br/>
	Tel No: +211 (0) 911112662 / +211(0)959 0012273<br/>
	</div>
	
	</td>
  </tr>
   

  <tr height="30">
    <td colspan="7" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">SERVICE REVENUE LEDGER</span>
	
	</td>
  </tr>


    <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">Ledger Balance for the Period Between <?php echo $date_from; ?>And <?php echo $date_to; ?></font></strong></div>

  </tr>
<td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	
	<hr/>
	
	</td>
  </tr>


</table>


	<table width="700" border="0" align="center" class="table">
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit (USD)</strong></td>	
	<td width="200" ><div align="center"><strong>Credit (USD)</strong></td>
	<td width="200" ><div align="center"><strong>Balance (USD)</strong></td>
  
    </tr>
 <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 

$sql="select  sales_ledger.transaction_id,sales_ledger.transactions,sales_ledger.amount,sales_ledger.debit,sales_ledger.credit,sales_ledger.currency_code,sales_ledger.curr_rate,sales_ledger.date_recorded, currency.curr_initials 
from sales_ledger,currency where sales_ledger.currency_code=currency.curr_id AND date_recorded BETWEEN '$date_from' AND '$date_to' order by sales_ledger.transaction_id asc";
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
    <td><?php echo $rows->transactions;?></td>
	<td align="right"><?php
	$amount=$rows->amount;
	
	if ($amount>0)
	{
	echo $curr_name=$rows->curr_initials.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_initials.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	
    $currency_code=$rows->currency_code;
	
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_in_kshs=$amount_in;
	 }
	 else
	 {
	 $amount_in_kshs=$amount_in/$curr_rate;
	 
	 }

	echo number_format($amount_in_kshs,2);
	
	
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{

if ($currency_code==2)
     {
     $amount_out_kshs=$amount_out;
	 }
	 else
	 {
	 $amount_out_kshs=$amount_out/$curr_rate;
	 
	 }


	echo number_format($amount_out_kshs,2);
	
	
	
	
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
<td align="right"><strong><?php 

    if ($currency_code==2)
	{
	$amount_kshs=$amount;
	}
	else
	{
	$amount_kshs=$amount/$curr_rate;
	
	}
	
	
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></strong></td>
   
    </tr>
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
  <?php 
  
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
	
	
	


  
  
  
  
  
  
  

  }
  ?>

 <tr>
    <td colspan="7" align="right"><strong><em>Printed by :
         <?php 
$sqluser="select employees.emp_fname,employees.emp_mname,employees.emp_lname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_fname.' '.$rowsuser->emp_mname.' '.$rowsuser->emp_lname;
	
	
	
	?>
    </em></strong></td>
  </tr> 
  
  
  
</table>
</form>








</body>
</html>
