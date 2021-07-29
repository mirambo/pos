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
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Loans Received</H2>
	
	</td>
	
    </tr>

  
   <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="200"><strong>Lender's Name</strong></td>
  <td align="center" width="200"><strong>Date Borrowed</strong></td>
    <td align="center" width="160"><strong>Loan Amount (Other Currency)</strong></td>
    <td align="center" width="150"><strong>Exchange Rate</strong></td>
	<td align="center" width="150"><strong>Loan Amount(SSP)</strong></td>
	<td align="center" width="150"><strong>Repaid Amount(SSP)</strong></td>
    <td width="180" align="center"><strong>Balance</strong></td>
    <!--<td align="center" width="50"><strong>Delete</strong></td>-->
    </tr>

  
   <?php 
 if (!isset($_POST['generate']))
{
$sql="SELECT * FROM loan_received order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$client=$_POST['client'];
if ($client!=0)
{
$sql="SELECT * FROM loan_received where loan_received_id='$client' order by loan_received_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM loan_received order by loan_received_id asc";
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
    <td><?php echo $rows->lenders_name;?></td>
    <td><?php echo $rows->date_drawn;?></td>

    <td align="right"><?php 
$currency_code=$rows->currency_code;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo $curr_name=$rowcurr->curr_name.' '.number_format($loan_amount=$rows->loan_amount,2);

?></td>
	<td align="right"><?php echo $curr_rate=$rows->curr_rate;?></td>
	<td align="right"><?php echo number_format($loan_amnt_kshs=$curr_rate*$loan_amount,2);?></td>
	
	<td align="right"><?php 
	 $loan_received_id=$rows->loan_received_id;
include ('loan_repayment_value.php');
	


	
//echo number_format($loan_rep=$rowslp->ttl_loan_rep,2);

	?></td>
	
	<td align="right"><?php
echo number_format($loan_bal=$loan_amnt_kshs-$ttl_loan_repaid,2);
	?>
	
	
	
	</td>
	 </tr>
  <?php 
  $grnd_loan_amnt_kshs=$grnd_loan_amnt_kshs+$loan_amnt_kshs;
  $grnd_loan_rep=$grnd_loan_rep+$ttl_loan_repaid;
  $grnd_loan_bal=$grnd_loan_bal+$loan_bal;
  }
  ?>
  <tr height="30" bgcolor="#FFFFCC">
  <td align="center" width="200"><strong>Totals</strong></td>

    <td align="center" width="160"><strong></strong></td>
    <td align="center" width="160"><strong></strong></td>
    <td align="center" width="150"><strong></strong></td>
	<td align="right" width="150"><strong><?php echo number_format($grnd_loan_amnt_kshs,2); ?></strong></td>
	<td align="right" width="150"><strong><?php echo number_format($grnd_loan_rep,2); ?></strong></td>
    <td width="180" align="right"><strong><?php echo number_format($grnd_loan_bal,2); ?></strong></td>

    <!--<td align="center" width="50"><strong></strong></td>-->
    </tr>
  
  <?php 
  
  }
  
  
  ?>
</table>
</body>


