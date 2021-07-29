<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Loan_repayments.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


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
<table width="1000" border="1" class="table" align="center">


<tr height="40"> <td colspan="10" align="center"><H4>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H4></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center">
<H5>Cash Deposit Report</H5>
	
	</td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
 
   <td align="center" ><strong>Deposit Slip Number</strong></td>
      <td align="center" ><strong>Amount <br/>(Mixed Currency)</strong></td>
	<td align="center" ><strong>Exchange Rate </strong></td>
	<td align="center" ><strong>Amount (SSP)</strong></td>    
    <td align="center" ><strong>Bank Deposited</strong></td>
	<td align="center" ><strong>Person Deposited</strong></td>
    <td align="center" ><strong>Phone Number</strong></td>
    <td align="center" ><strong>Date Deposited</strong></td>
	<td align="center" ><strong>Date Recorded</strong></td>
	<td align="center" ><strong>Comments</strong></td>

    </tr>

 <?php 
$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Viewed all recorded cheque deposits')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());  
  
 
$sql="SELECT * FROM banks,cash_deposits,currency where cash_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cash_deposits.curr_id order by cash_deposits.cash_deposit_id desc";
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
   
    <td><?php echo $rows->deposit_slip_no;?></td>




    <td align="right"><?php 
	$currency=$rows->curr_id;
	$querycrr="select * from currency where curr_id='$currency'";
$resultscrr=mysql_query($querycrr) or die ("Error: $querycrr.".mysql_error());							  
$rowscrr=mysql_fetch_object($resultscrr);
$curr_name=$rowscrr->curr_name; 
	
	echo $curr_name=$rowscrr->curr_name.' '.number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	$currency_code=$rows->curr_id;
	
	
$inc_kshs=$amount*$curr_rate;
	//}
	echo number_format($inc_kshs,2);	
	
	
	
	?></strong></td>
	<td><?php echo $rows->bank_name.' ('.$rows->account_name.') ';?></td>
		<td ><?php echo $rows->person_dep;?></td>
	<td><?php echo $rows->phone_no?></td>
	<td align="center"><?php echo $rows->date_deposited;?></td>
	<td><?php echo $rows->date_recorded;?></td>
	<td><?php echo $rows->comments;?></td>
	


    </tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$inc_kshs;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center"><strong>Grand Totals</strong></td>
    <td align="center" ><strong></strong></td>

	<td align="right"  colspan="2" ><strong><?php echo number_format($gnd_amnt,2); ?></strong></td>
    <td align="center" ><strong></strong></td>
	<td align="center" ><strong></strong></td>
	<td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>



    </tr>
  
	
	<?
  
  }
  ?>
</table>
</body>


