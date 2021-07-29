<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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
		
		
		
		<?php require_once('includes/bank_reconcilliation_submenu.php');  ?>
		
		<h3>:: Reconcilled Bank Balance</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
  
  
 <?php
 if (!isset($_POST['generate']))
{

?>
 <form name="search" method="post" action="">   
 
<table width="85%" border="0" align="center" style="margin:auto;" class="table">

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
	<a href="print_tpla.php" target="_blank">Print</a>|<a href="print_tpla_word.php">Export to word </a>
	
	</td>
	</tr>
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    
	
	
  </tr>
  
 <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><strong><font color="#ff0000">Bank Side</font></strong>
	
	
	</td>
	</tr>
	
	<tr  height="30" bgcolor="#FFFFCC">
    <td width="5%" colspan="3" >Balance Bank Statement</td>
    
	<td width="2%"><div align="center"><strong></strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong></strong></div></td>
    
	
	
  </tr>
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align=""><strong><font color="#ff0000">Outstanding Transactions Into The Bank (Deposits)</font></strong>
	
	
	</td>
	</tr>
<?php 
$sqlinv=" SELECT * FROM bank_recon where transaction_type='B' and effect='From System to Bank'";
$resultsinv= mysql_query($sqlinv) or die ("Error $sqlinv.".mysql_error());


if (mysql_num_rows($resultsinv) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsinv=mysql_fetch_object($resultsinv))
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
    <td width="5%" colspan="3" ><?php echo $rowsinv->transaction_name.' '.$rowsinv->cheque_no;?></td>
    
	<td width="2%" align="right"><?php 
	
	echo number_format($rowsinv->amount,2);
	
	?></td>
    <td width="2%" colspan="2"><div align="center"><strong></strong></div></td>

  </tr>
  <?php 
  }}
  
  ?>
  
  
  <tr height="30" bgcolor="#FFFFCC">
<td colspan="3"><strong>Total Payment Received Through Bank</strong></td>
<td></td>
<td colspan="2" align="right"><strong><font size="+1"><?php  echo number_format($ttl_receipts=$ttl_inv_payment+$ttl_inc_payment,2); ?></strong></td>

</tr>
  
  
  
  
  
  <tr  height="30" bgcolor="#FFFFCC">
    <td width="5%" colspan="3" >Outstanding Transactions from the Bank (Withdrawals)</td>
    
	<td width="2%"><div align="center"><strong></strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong></strong></div></td>
    
	
	
  </tr>
  
  <tr  height="30" bgcolor="#FFFFCC">
    <td width="5%" colspan="3" ><strong>Reconciled Bank Balance</strong></td>
    
	<td width="2%"><div align="center"><strong></strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong></strong></div></td>
    
	
	
  </tr>
	
	
	
</table>	
	




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