<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Petty_Cash_Report.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$date_month=$_GET['payment_month'];
$location_id=$_GET['customer_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];


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
<body>
<table  border="1" class="table" align="center">


<tr height="40"> <td colspan="6" align="center"><H4><?php echo $rowscont->cont_person; ?></H4></td></tr>

<tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center">
<H5>Petty Cash Expenses Report</H5>
	
	</td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" ><strong>Date Paid</strong></td>
    <td align="center" ><strong>Description</strong></td>
    <td align="center" ><strong>Refference No.</strong></td>
    <td align="center" ><strong>Amount (Mixed Currency)</strong></td>
    <td align="center" ><strong>Exchange Rate</strong></td>
    <td align="center" ><strong>Amount(Kshs)</strong></td>

    </tr>
 <?php 
 
if ($date_from!='' && $date_to!='')
{
$sql="SELECT * from petty_cash_expense where date_paid >='$date_from' AND date_paid<='$date_to' order by date_paid desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="SELECT * from petty_cash_expense order by date_paid desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
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
   
    <td><?php echo $rows->date_paid;?></td>
    <td><?php echo $rows->description;?></td>
    <td><?php echo $rows->ref_no;?></td>
	<td align="right"><?php echo number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><?php echo number_format($amount_ssp=$rows->amount*$curr_rate,2);?></td>
	<!--td align="center"><?php echo $rows->date_recorded;?></td>-->
</tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$amount_ssp;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center" ><strong>Grand Totals</strong></td>
    
	
	<td align="center"><strong></strong></td>
	
	<td align="center"><strong></strong></td>
	<td align="center"><strong></strong></td>
	
    <td align="center"><strong></strong></td>
<td align="right" ><strong><?php echo  number_format($gnd_amnt,2); ?></strong></td>


    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>
</body>


