<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Statement_Of_Owners_Equity.xls");
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
<table width="100" border="1" class="table" align="center">


<tr height="40"> <td colspan="7" align="center"><H4>JUBA STATIONERY AND PRINTING COMPANY LIMITED</H4></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="7" height="30" align="center">
<H5>Statement Of Owners Equity</H5>
	
	</td>
	
    </tr>
 <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" ><strong>Share Holder Name</strong></td>
	<td align="center" ><strong>Contact Person</strong></td>
	<td align="center" ><strong>Next of Kin</strong></td>
	<td align="center" ><strong>Date Paid</strong></td>
    <td align="center" ><strong>Share Percentage (%)</strong></td>
	<td align="center" ><strong>Net Share Amount</strong></td>
		<td align="center" ><strong>Share Amount(SSP)</strong></td>

    </tr>


   <?php 
 $ttl_shares=0;
 $grnd_shares_kshs=0;
 $ttl_shares34=0;
 
$sql="SELECT * FROM shares where status='0' OR status='2'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="40">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 $shares_id=$rows->shares_id;
 ?>
   
    <td><?php echo $rows->share_holder_name;?></td>
    <td><?php echo $rows->contact_person;?></td>
	<td><?php echo $rows->next_of_kin;?></td>
	<td><?php echo $rows->date_paid;?></td>
    <td align="center">
	<?php 
//include ('all_shares_value.php');

//include ('specific_shares_value.php');

$task_totals=0;
$shares_amnt=0;
$sqlts="select * from shareholder_transactions where shareholder_id='$shares_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						  
						  $shares_amnt=$rowsts->amount;
						  $curr_rate=$rowsts->curr_rate;
						  $task_ttl_kshs=$shares_amnt*$curr_rate;
						  $task_totals=$task_totals+$task_ttl_kshs;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals,2); 
  
 

//$grnd_shares_kshs=$grnd_shares_kshs+$task_totals;

$task_totals2=0;
$shares_amnt2=0;
$task_ttl_kshs2=0;
$sqlts2="select * from shareholder_transactions";
$resultsts2= mysql_query($sqlts2) or die ("Error $sqlts2.".mysql_error());
if (mysql_num_rows($resultsts2) > 0)
						  {
						  while ($rowsts2=mysql_fetch_object($resultsts2))
						  {
						  
						  $shares_amnt2=$rowsts2->amount;
						  $curr_rate2=$rowsts2->curr_rate;
						  $task_ttl_kshs2=$shares_amnt2*$curr_rate2;
						  $task_totals2=$task_totals2+$task_ttl_kshs2;
						  }
						  //echo $task_totals;
			
						  }
						  
   number_format($task_totals2,2); 



echo $perc=number_format($task_totals/$task_totals2*100,2);	
	
	?></td>
	<td align="right">
	<?php




$task_totalsx=0;
$shares_amntx=0;
$sqltsx="select * from shareholder_transactions where shareholder_id='$shares_id'";
$resultstsx= mysql_query($sqltsx) or die ("Error $sqltsx.".mysql_error());
if (mysql_num_rows($resultstsx) > 0)
						  {
						  while ($rowstsx=mysql_fetch_object($resultstsx))
						  {
						  
						  
						  
$currency_code=$rowstsx->currency;
$sqlcurr="select * from currency where curr_id='$currency_code'";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error());
$rowcurr=mysql_fetch_object($resultscurr);
echo '<p>'.$curr_name=$rowcurr->curr_name.' ';
						  
						   $shares_amntx=$rowstsx->amount;
						  echo number_format ($shares_amntx,2).' ';
						 echo 'Rate :'.$curr_ratex=$rowstsx->curr_rate.'</p>';
						  
						  $task_totalsx=$task_totalsx+$task_ttl_kshsx;
						  }
						  //echo $task_totals;
			
						  }
						  
  // number_format($task_totalsx,2); 



	
	?>
	
	
	</td>
	
	<td align="right"><?php 
include ('specific_shares_value2.php');
	?></td>
	
	</tr>
  <?php 
  //$grndttlcap=$grndttlcap+$shares;

  }
  ?>
  <tr height="30" bgcolor="#FFFFCC" >
 
    <td align="center" ><strong>Totals</strong></td>
    <td align="center" ><strong></strong></td>
    <td align="center" ><strong></strong></td>

	<td align="center" ><strong><?php echo $gnrt_perc_shares;?></strong></td>
	<td width="260" align="right"><strong><?php //echo number_format($grndttlcap,2); ?></strong></td>
    <!--<td align="center" width="200"><strong>Mode of payment</strong></td>
	<td align="center" width="200"><strong>Date recorded</strong></td>-->
	<td align="center" ><strong></strong></td>
   <td  align="right"><strong><?php echo number_format($grnd_shares_kshs,2); ?></strong></td>


  
    </tr>
  <?php 
  
  }
  
  
  ?>
</table>
</body>


