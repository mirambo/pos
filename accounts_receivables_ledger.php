<?php include('Connections/fundmaster.php'); 
$id=$_GET['client_id'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php require_once('includes/accountreceivableledgersubmenu.php');  ?>
		
		<h3>::Accounts Receivables Legder Ledger</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
<?php 		
if (!isset($_POST['generate']))
{
?>			
<form name="search" method="post" action=""> 				
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Accounts Receivables Legder</strong></font>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_ar_ledger.php" target="_blank">Print</a>|<a href="print_ar_ledger_word.php">Export to word </a>
	
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
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit (Kshs)</strong></td>	
	<td width="200" ><div align="center"><strong>Credit (Kshs)</strong></td>
	<td width="200" ><div align="center"><strong>Balance (Kshs)</strong></td>
  
    </tr>
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id order by accounts_receivables_ledger.transaction_id asc";
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
	echo $curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	echo number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	echo number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
	<td align="right"><?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></td>
   
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
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];

if ($date_from!='' && $date_to!='')
{
?>			
<form name="search" method="post" action=""> 				
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	Accounts Receivables Legder</strong></font>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_ar_ledger.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to; ?>" target="_blank">Print</a> | <a href="print_ar_ledger_word.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to; ?>">Export to word </a>
	
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
	
	<tr   height="30" bgcolor="#FFFFCC">
    <td colspan="9" align="center"><strong>Statement from <font color="#ff0000"><?php echo $date_from; ?></font> To <font color="#ff0000"> <?php echo $date_to; ?></font></strong></td>
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit (Kshs)</strong></td>	
	<td width="200" ><div align="center"><strong>Credit (Kshs)</strong></td>
	<td width="200" ><div align="center"><strong>Balance (Kshs)</strong></td>
  
    </tr>
<tr bgcolor="#C0D7E5" height="25">

<td><?php echo $date_from; ?></td>
<td><strong>Balance Brought forward (Bal b/f)</strong></td>



<td colspan="5" align="right"><strong>
<?php 
$sqlbbd="select  accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id AND date_recorded <'$date_from' order by accounts_receivables_ledger.transaction_id asc";
$resultsbbd= mysql_query($sqlbbd) or die ("Error $sqlbbd.".mysql_error());




if (mysql_num_rows($resultsbbd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbbd=mysql_fetch_object($resultsbbd))
							  { 
							  
							  
 
 
 ?>
	<?php
	$amount=$rowsbbd->amount;
	
	if ($amount>0)
	{
	$curr_name=$rowsbbd->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	$curr_name=$rowsbbd->curr_name.' '.number_format($str2=substr($amount,1),2);

	}
	?>
	<?php number_format($curr_rate=$rowsbbd->curr_rate,2);?>
	
   
	<?php
	$amount_in=$rowsbbd->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	
	$amount_out=$rowsbbd->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	
	
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	
  
  }
  if ($ledger_bal==0)
  {
  echo "0";
  }
  else
  {
   echo number_format($bal_bf=$ledger_bal,2);
 }
  
  
  }


?>
</strong></td>


</tr>		
	
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id AND date_recorded BETWEEN '$date_from' AND '$date_to' order by accounts_receivables_ledger.transaction_id asc";
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
	echo $curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	echo number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	echo number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
	<td align="right"><?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></td>
   
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
	Accounts Receivables Legder</strong></font>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_ar_ledger.php" target="_blank">Print</a> | <a href="print_ar_ledger_word.php">Export to word </a>
	
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
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit (Kshs)</strong></td>	
	<td width="200" ><div align="center"><strong>Credit (Kshs)</strong></td>
	<td width="200" ><div align="center"><strong>Balance (Kshs)</strong></td>
  
    </tr>
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
$sql="select  accounts_receivables_ledger.transaction_id,accounts_receivables_ledger.transactions,accounts_receivables_ledger.amount,accounts_receivables_ledger.debit,accounts_receivables_ledger.credit,accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate,accounts_receivables_ledger.date_recorded, currency.curr_name 
from accounts_receivables_ledger,currency where accounts_receivables_ledger.currency_code=currency.curr_id order by accounts_receivables_ledger.transaction_id asc";
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
	echo $curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	echo number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	echo number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
	<td align="right"><?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></td>
   
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

}


?>
		
			

			
			
			
					
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