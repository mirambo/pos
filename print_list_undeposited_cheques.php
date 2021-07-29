<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
<body onLoad="window.print();">
<table width="900" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of All Undeposited Cheques Recorded</H2>
	
	</td>
	
    </tr>

  
   	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%"><div align="center"><strong>Date Of Transaction</strong></div></td>
    <td width="15%"><div align="center"><strong>Transaction Desciption</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount(Mixed Currency)</strong></div></td>
    <td width="5%"><div align="center"><strong>Exchange Rate</strong></div></td>
    <td width="5%"><div align="center"><strong>Amount In (SSP)</strong></div></td>
    
  
  </tr>


 <?php
  
  $run_bal=0;
  $amount=0;
  $inc_kshs=0;
  if (!isset($_POST['generate']))
{ 
  
$sql="SELECT * FROM bank_statement, currency where bank_statement.currency_code=currency.curr_id 
AND bank_statement.bank_id='0' and mop='2' and amount>=0 ORDER BY transaction_id asc";
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
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
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
	
	echo number_format($inc_kshs=$money_in*$curr_rate,2);
	
	}
	//$amount=$rows->amount;
	
	//echo number_format($inc_kshs=$amount*$curr_rate,2);
	
	?></td>

	</tr>
<?php
$gnd_amnt=$gnd_amnt+$inc_kshs;
}

}

 ?>
 <tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="4"><strong>Total Amount (SSP)</strong></td>
    <td width="5%" colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($gnd_amnt,2);?></font></strong></td>
    
	
    
	
	
  </tr>

</table>
</body>


