<?php include('Connections/fundmaster.php'); 

$bank=$_GET['bank_id'];
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
		
		
		
	<?php require_once('includes/bank_statement_submenu.php');  ?>
		
		<h3>::System Bank Statement Report</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
 <form name="search" method="post" action="">   
<table width="90%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter	By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate">
	
		<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_undeposited_cheques.php">Print</a>						  

	
	</td>
	
    </tr>
	
	
  <tr bgcolor="#FFFFCC"><td colspan="7" align="center"><strong><font size="+1">List Of All Undeposited Cheques</font></strong></td></tr>
	
	
  
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
</form>
</br></br>
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