<?php include('Connections/fundmaster.php'); 
$id=$_GET['shipper_id'];

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
<?php require_once('includes/shipsubmenu.php');  ?>
		
		<h3>:: Statement Of Account for Shipper : <?php 
		$sqlclient="select * from shippers where shipper_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->shipper_name;
		
		
		
		?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
	<?php 		
if (!isset($_POST['generate']))
{


?>			
<form name="search" method="post" action=""> 
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement Of Account for Shipper: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from shippers where shipper_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->shipper_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (MIxed Currency)</strong></td>
    <td width="200" ><div align="center"><strong>Exchange Rate</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
  <?php 
  
$sql="select * from shippers_transactions where shipper_id='$id' order by date_recorded asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


/*$sqlob="select opening_balance from clients where client_id='$id'";
$resultsob= mysql_query($sqlob) or die ("Error $sqlob.".mysql_error());
$rowsob=mysql_fetch_object($resultsob);*/



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
 <td><?php
$transaction=$rows->transaction;
if 	($transaction=='Opening Balance')
{

echo $transaction=$rows->transaction; 


}
else
{
echo $transaction=$rows->transaction; 
}
	//echo 
	
	?></td>
	
	<td><?php echo $amountxx=$rows->amount; ?></td>
	<td><?php echo $curr_rate=$rows->curr_rate; ?></td>
    <td align="right">
	
	<?php number_format($amount=$amountxx*$curr_rate,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($amount,2);
	}
	?>
	
	
	</td>
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
<br/>
<!--<table width="100%" border="0" align="center" style="margin-auto;">
<tr bgcolor="#FFFFCC" height="30" align="center">
<td><strong>Current Balance(0-30 days)</strong></td>
<td><strong>Due Balance (31-60 days)</strong></td>
<td><strong>Overdue Balance (61-90 days)</strong></td>
<td><strong>Past Overdue Balance (Over 90 days)</strong></td>
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
$grnd_inv_balxy=0;
$sqlinvxy="select * from invoices where client_id='$id' and date_generated BETWEEN '$date_back2x' AND '$current_date3x' AND status='1'";
$resultsinvxy= mysql_query($sqlinvxy) or die ("Error $sqlinvxy.".mysql_error());

if ($numrowsinvxy=mysql_num_rows($resultsinvxy)>0)
{
while ($rowsinvxy=mysql_fetch_object($resultsinvxy))
			{
$inv_balxy=$rowsinvxy->invoice_ttl.'-';
 $grnd_inv_balxy=$grnd_inv_balxy+$inv_balxy.'-';
$sales_codexy=$rowsinvxy->sales_code;
 
$sqlpxy="select sum(amount_received) as ttlrecxy from invoice_payments where client_id='$id' and sales_code='$sales_codexy' and date_received BETWEEN '$date_back2x' AND '$current_date2'";
$resultspxy= mysql_query($sqlpxy) or die ("Error $sqlpxy.".mysql_error());
if ($numrowspxy=mysql_num_rows($resultspxy)>0)
{
while ($rowspxy=mysql_fetch_object($resultspxy))
			{
        $paymentxy=$rowspxy->ttlrecxy;
	
		  
			
			}
 //echo $grnd_paymentx;

			}
 $grnd_paymentxy=$grnd_paymentxy+$paymentxy;		
//$rowsp=mysql_fetch_object($resultsp);
//echo $payment=$rowsp->amount_received;
 
 

 
 $grnd_paymentxy.'-';
		

			}
		 $grnd_inv_balxy;	
		 
		 $grnd_paymentxy.'-';
		  $balpnxy=$grnd_inv_balxy-$grnd_paymentxy;
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
 $sales_codexyz=$rowsinvxyz->sales_code.'-';
 
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
  
</table>-->
</form>

 <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> 

		
	<?php 
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
?>			
<form name="search" method="post" action=""> 
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement Of Account for Client: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
    <td colspan="9" height="20" align="right"><font size="+1">
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to;?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>&date_from=<?php echo $date_from; ?>&date_to=<?php echo $date_to;?>">Export to word </a>
	
	</td>
	
    </tr>
	
	<tr   height="30" bgcolor="#FFFFCC">
    <td colspan="9" align="center"><strong>Statement from <font color="#ff0000"><?php echo $date_from; ?></font> To <font color="#ff0000"> <?php echo $date_to; ?></font></strong></td>
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
  
$sqlbd="select * from client_transactions where client_id='$id' AND date_recorded <'$date_from'";
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
	number_format($amount,2);
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
  
$sql="select * from client_transactions where client_id='$id' AND date_recorded BETWEEN '$date_from' AND '$date_to'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




?>

<?php 

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
    <td align="right">
	
	<?php number_format($amount=$rows->amount,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($str2=substr($amount,1),2);
	}
	?>
	
	
	</td>
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

</form>

 <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> 

		
	<?php
}
else
{ 
?>			
<form name="search" method="post" action=""> 
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Statement Of Account for Client: </font> <font size="+1" color="#FF6600"><?php 
		$sqlclient="select * from clients where client_id='$id'";
		$resultsclient= mysql_query($sqlclient) or die ("Error: $sqlclient.".mysql_error());
        $rowsclient=mysql_fetch_object($resultsclient);
		
		echo $rowsclient->c_name;
		
		
		
		?></strong></font>
	
	</td>
	
    </tr>
	
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_client_statement.php?client_id=<?php echo $id; ?>" target="_blank">Print</a> | <a href="print_client_statementword.php?client_id=<?php echo $id; ?>">Export to word </a>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
  
  <?php 
  
$sql="select * from client_transactions where client_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




?>

<?php 

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
    <td align="right">
	
	<?php number_format($amount=$rows->amount,2);
	
	if ($amount>0)
	{
		echo number_format($amount=$rows->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	echo number_format($str2=substr($amount,1),2);
	}
	?>
	
	
	</td>
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
  <tr>
</table>

</form>

 <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script> 

		
	<?php

}}
?>		

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>