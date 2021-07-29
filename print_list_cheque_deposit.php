<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$location_id=$_GET['location_id'];
$date_from=$_GET['from'];
$date_to=$_GET['to'];

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
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center">
<H2>List Of All Cheque Deposits</H2>
	
	</td>
	
    </tr>

  
   <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="300"><strong>Cheque Number</strong></td>
 
   <td align="center" width="160"><strong>Amount <br/>(Mixed Currency)</strong></td>
	<td align="center" width="160"><strong>Exchange Rate </strong></td>
	<td align="center" width="160"><strong>Amount (Kshs)</strong></td>    
    <td align="center" width="200"><strong>Bank Deposited</strong></td>
	<td align="center" width="200"><strong>Cheque Drawer</strong></td>
    <td align="center" width="200"><strong>Date Drawn</strong></td>
    <td align="center" width="200"><strong>Date Deposited</strong></td>
	<td align="center" width="200"><strong>Date Recorded</strong></td>
	<td align="center" width="200"><strong>Comments</strong></td>

    </tr>
  
  <?php 

  
	
	
	$querydc= "SELECT * FROM banks,cheque_deposits,currency";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "cheque_deposits.bank_deposited='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
       $conditions[] = "cheque_deposits.date_deposited>='$date_from' AND cheque_deposits.date_deposited<='$date_to'";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and cheque_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cheque_deposits.curr_id order by cheque_deposits.cheque_deposit_id desc";
    }
	else
	{	
	
$querydc="SELECT * FROM banks,cheque_deposits,currency where cheque_deposits.bank_deposited=banks.bank_id AND currency.curr_id=cheque_deposits.curr_id order by cheque_deposits.cheque_deposit_id desc";
$results= mysql_query($querydc) or die ("Error $querydc.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());



	
	
	
	
	

if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
   
    <td><?php echo $rows->cheque_no;?></td>




    <td align="right"><?php echo $rows->curr_name.' '.number_format($amount=$rows->amount,2);?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	$currency_code=$rows->curr_id;
	
	
$inc_kshs=$amount*$curr_rate;
	//}
	echo number_format($inc_kshs,2);	
	
	
	
	?></strong></td>
	<td><?php echo $rows->bank_name.' ('.$rows->account_name.') ';?></td>
		<td ><?php echo $rows->cheque_drawer;?></td>
	<td><?php echo $rows->date_drawn?></td>
	<td><?php echo $rows->date_deposited;?></td>
	<td><?php echo $rows->date_recorded;?></td>
	<td><?php echo $rows->comments;?></td>
	<!--<td><?php 
	
		/*$bank_id=$rows->receiving_bank_id;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		
	if ($bank_id==0)
{
echo "Petty  Cash Account";
}
else
{
		
	echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
	}
	*/
	?></td>
	<td><?php echo $rows->date_deposited;?></td>-->

	
    </tr>
  <?php 
  
  $gnd_amnt=$gnd_amnt+$inc_kshs;
  }
  
  
  ?>
   <tr  height="30" bgcolor="#FFFFCC" >
 
    <td align="center" width="300"><strong>Grand Totals</strong></td>
    <td align="center" width="160"><strong></strong></td>

	<td align="right" width="160" colspan="2" ><strong><?php echo number_format($gnd_amnt,2); ?></strong></td>
    <td align="center" width="200"><strong></strong></td>
	<td align="center" width="200"><strong></strong></td>
	<td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>
    <td align="center"><strong></strong></td>


    </tr>
  
  <?php
  
  }
  
  
  ?>
</table>
</table>
</body>


