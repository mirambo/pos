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
    return confirm("Are you sure you want to delete?");
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
		
		<h3>::List Of Written Off Bad Debts</h3>
         
				
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
   
    
	
	<td colspan="10" align="center"><strong>Filter By: Client Name : <input type="text" name="c_name" size="20" /></strong>
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
	<td width="300" ><div align="center"><strong>Status</strong></td>
	<td width="12%"><div align="center"><strong>Reason</strong></td>
   
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select bad_debts.bad_debt_id,bad_debts.client_id,bad_debts.curr_rate,bad_debts.date_received,bad_debts.status,bad_debts.reason,invoices.invoice_no,invoices.invoice_id,
bad_debts.amount,bad_debts.sales_code, currency.curr_name,clients.c_name from bad_debts,clients,invoices,
currency where bad_debts.client_id=clients.client_id AND bad_debts.sales_code=invoices.sales_code AND bad_debts.currency_code=currency.curr_id order by bad_debts.bad_debt_id desc";
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
	<td align="center"><?php  
	
$status=$rows->status;
	if ($status==1)
	{
	echo "<font size='-2'>Recovered Bad Debts..</a>";
	}
	else
	{
	echo '<font size="-2" color="#ff0000">Bad Debt..</a>';
	}
	
	
	?></td>

	
	<td align="left"><?php  
	
	echo $rows->reason;
	
	
	?></td>
	
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