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
<table width="70%" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center">
<H2>List Of Bank / Cash Reconciliation Transactions</H2>
	
	</td>
	
    </tr>
  <tr  style="background:url(images/description.gif);" height="30" >
       <td align="center" width="200"><strong>Description</strong></td>
     <td align="center" ><strong>Date Recorded</strong></td>	
     <td align="center" ><strong>Bank Affected</strong></td>
     <td align="center" ><strong>Reconciliation Period</strong></td>
     <td align="center" ><strong>Effect</strong></td>	 
    <td align="center"><strong>Amount Reconciled </br>(Other Currency)</strong></td>
	<td align="center"><strong>Exchange Rate</strong></td>
	<td align="center"><strong>Amount (SSP)</strong></td>




  </tr>
	<?php 
  
  
$sql="select * FROM reconciled_system_balance,currency 
WHERE reconciled_system_balance.currency=currency.curr_id order by date_done desc";
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
  
    <td><?php echo $rows->description;?></td>
    <td align="center"><?php echo $rows->date_done;?></td>
    <td align="center"><?php
	$bank=$rows->bank_id;
if ($bank==0)	
{
echo "-";
}
else
{	
$queryprod="select * from banks where bank_id='$bank'";
$resultsprod=mysql_query($queryprod) or die ("Error: $queryprod.".mysql_error());
$rowsprod=mysql_fetch_object($resultsprod);
echo $bank_name=$rowsprod->bank_name;
}	
	
	?></td>
    <td align="center">
	
	<?php echo '<i>'.$rows->date_from.'</i> To <i>'.$rows->date_to.'</i>';
	
	
	?></td>
    <td >
	
	<?php //echo number_format($amount=$rows->amount,2);
$effect=$rows->effect;
	if ($effect==1)
	{
	echo "Increase Cash";
	}
	
		if ($effect==2)
	{
echo "Increase Bank";
	}
	
		if ($effect==3)
	{
echo "Reduce Cash";	
	}
	
		if ($effect==4)
	{
echo "Increase Bank";
	}
	
	?></td>
	<td align="center"><?php echo $rows->curr_name.' '.$amount=$rows->amount;?></td>
	<td align="center"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
	<td align="right"><strong><?php echo number_format($amnt_kshs=$amount*$curr_rate,2);?><strong></td>
	
	
    <!--<td align="center"><a href="edit_reconciled_system_balance.php?reconciled_system_balance=<?php echo $rows->reconciled_system_balance_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_reconciled_system_balance.php?reconciled_system_balance=
	<?php echo $rows->reconciled_system_balance_id;?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_from?>&bank_id=<?php echo $bank ?>&out_bal=<?php echo $out_bal; ?>" onClick="return confirmDelete();">
	<img src="images/delete.png"></a></td>-->
    </tr>
  <?php 
  $grnd_amnt_kshs=$grnd_amnt_kshs+$amnt_kshs;
  
  }
  
  
  }
  
  ?>
  <tr bgcolor="#FFFFCC" height="30">
    <td  colspan="7"><strong>Total Amount Reconciled</strong></td>
    <td  colspan="1" align="right"><strong><font color="#ff0000" size="+1"><?php echo number_format($grnd_amnt_kshs,2);?></font></strong></td>
    <!--<td align="center"></td>
    <td align="center"></td>-->
	
    
	
	
  </tr>
  <?php
  
  ?>
</table>
</table>
</body>


