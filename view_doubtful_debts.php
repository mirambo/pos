<?php include('Connections/fundmaster.php'); 

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to recover this doubtful debt?");
}

function confirmWriteoff()
{
    return confirm("Are you sure you want to Write Off this bad debt?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php require_once('includes/baddebtssubmenu.php');  ?>
		
		<h3>:: Bad Debts Transactions</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Bad Debts Declared successfully</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    
	
	<td colspan="9" align="center"><strong>Filter By: Client Name : <input type="text" name="c_name" size="20" /></strong>
	<strong>Or By Date</strong>
						
							<strong>From : </strong>
		<input type="text" name="from" size="30" id="from" readonly="readonly" />
			<strong>To:</strong><input type="text" name="to" size="25" id="to" readonly="readonly" />
				<input type="submit" name="generate" value="Generate"></td>
					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Invoice Number</strong></td>
    <td width="15%"><div align="center"><strong>Date Generated</strong></td>
	<td width="15%"><div align="center"><strong>Client Name</strong></td>
	<td width="13%"><div align="center"><strong>Amount(Foreign Currencies)</strong></td>
	<td width="10%"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="15%"><div align="center"><strong>Amount(Kshs)</strong></td>
	<td width="12%"><div align="center"><strong>Reason</strong></td>
	<td width="10%"><div align="center"><strong>Recover</strong></td>
	<td width="45%"><strong>Write&nbsp;Off&nbsp;&nbsp;&nbsp;</strong></td>
   
    </tr>
  
  <?php 
  
$sql="select doubtful_debts.doubtful_debt_id,doubtful_debts.client_id,doubtful_debts.curr_rate,doubtful_debts.date_received,doubtful_debts.reason,doubtful_debts.currency_code,doubtful_debts.status,invoices.invoice_no,invoices.invoice_id,
doubtful_debts.amount,doubtful_debts.sales_code,currency.curr_name,clients.c_name from doubtful_debts,clients,invoices,currency where doubtful_debts.client_id=clients.client_id AND doubtful_debts.sales_code=invoices.sales_code AND 
doubtful_debts.currency_code=currency.curr_id order by doubtful_debts.doubtful_debt_id desc";
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
  
    <td><a href="invoice_transactions.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $rows->sales_code; ?>"><?php echo $rows->invoice_no;?></a></td>
    <td align="center"><?php echo $rows->date_received;?></td>
	<td><a href="client_statement.php?client_id=<?php echo $rows->client_id;?>"><?php echo $rows->c_name;?></a></td>
	<td align="right"><?php echo $rows->curr_name.' '.number_format($dd_amount=$rows->amount,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($dd_ttl_kshs=$curr_rate*$dd_amount,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	<!--<td align="center"><?php  
	
$status=$rows->status;
	if ($status==1)
	{
	echo "<font size='-2'>Declared Bad Debts..</a>";
	}
	else
	{
	echo '<font size="-2" color="#ff0000">Doubtful Debt..</a>';
	}
	
	
	?></td>-->

	
	<td align="left"><?php  
	
	echo $rows->reason;
	
	
	?></td>
	<td align="center"> 
	<?php 
	$status=$rows->status;
	if ($status==1)
	{
	echo "<font color='#ff0000' size='-2'>Recovered..</font>";
	}
	elseif ($status==2)
	{
	
	echo "<font color='#ff0000' size='-2'>Impossible..</font>";
	
	}
	else
	{
	?>
	<a href="process_recover_bad_debts.php?doubtful_debt_id=<?php echo $rows->doubtful_debt_id;?>&sales_code=<?php echo $rows->sales_code; ?>
	&currency=<?php echo $rows->currency_code;?>&curr_rate=<?php echo $rows->curr_rate; ?>&recovrd_amount=<?php echo $dd_amount;?>
	&client_id=<?php echo $rows->client_id; ?>&invoice_no=<?php echo $rows->invoice_no;?>" style="color:#000099;" onClick="return confirmDelete();">Recover</a>
	<?php
    }

	?>
	</td>
	<td align="center" width="200">
	<?php 
	if ($status==1)
	{
	echo "<font color='#ff0000' size='-2'>Impossible..</font>";
	}
	elseif ($status==2)
	{
	
	echo "<font color='#ff0000' size='-2'>Written Off..</font>";
	
	}
	else
	{
	?>
	<a href="process_writeoff_bad_debts.php?doubtful_debt_id=<?php echo $rows->doubtful_debt_id;?>&sales_code=<?php echo $rows->sales_code; ?>
	&currency=<?php echo $rows->currency_code;?>&curr_rate=<?php echo $rows->curr_rate; ?>&recovrd_amount=<?php echo $dd_amount;?>
	&client_id=<?php echo $rows->client_id;?>&invoice_no=<?php echo $rows->invoice_no;?>" style="color:#000099;" onClick="return confirmWriteoff();">Write Off</a>
	<?php
}
	?>
	</td>
	
	<!--<td align="center"><a href="sales_return.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_code=<?php echo $rows->sales_code; ?>">Returns</a></td>-->
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
  $grand_ttl_inv=$grand_ttl_inv+$invoice_ttl;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
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
      inputField  : "from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "to"       // ID of the button
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