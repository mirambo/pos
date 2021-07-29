<?php include('Connections/fundmaster.php'); ?>

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
		
		
		
		<?php require_once('includes/stock_return_submenu.php');  ?>
		
		<h3>::Purchases Return Transactions</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<!--<tr bgcolor="#FFFFCC">
   
    <td height="30" align="center"></td>
	
	<td><strong>Filter By: Client Name</strong></td>
	<td><input type="text" name="c_name" size="40" /></td>
						<td><strong>Or By Date</strong></td>
							<td align="right"><strong>From : </strong></td>
		<td><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong><input type="text" name="to" size="25" id="to" readonly="readonly" /><input type="submit" name="generate" value="Generate"></td>
	
	
					
	
    </tr>-->
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Debit Note No.</strong></td>
	<td width="100"><div align="center"><strong>Supplier Name</strong></td>
    <td width="100"><div align="center"><strong>Stock Returns <br/>(Other Currency)</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>	
<td width="300"><div align="center"><strong>Stock Returns<br/>(Kshs.)</strong></td>
<td width="300"><div align="center"><strong>Date Generated</strong></td>
<td width="300"><div align="center"><strong>View Transactions</strong></td>
<td width="300"><div align="center"><strong>Record Refund</strong></td>
		
    </tr>
  
  <?php 
  
$sql="SELECT debit_notes.debit_note_id,debit_notes.debit_note_no,debit_notes.currency,debit_notes.curr_rate,debit_notes.ttl_stock_return,debit_notes.supplier_id,debit_notes.stockreturn_code,debit_notes.date_generated,debit_notes.order_code,
currency.curr_name,suppliers.supplier_name FROM currency,debit_notes,suppliers WHERE debit_notes.currency=currency.curr_id 
and debit_notes.supplier_id=suppliers.supplier_id group by debit_notes.stockreturn_code order by debit_notes.debit_note_id desc ";
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
  
    <td><a href="purchase_returns_det_trans.php?order_code=<?php echo $rows->order_code;?>
 &supplier_id=<?php echo $rows->supplier_id; ?>&debit_note=<?php echo $rows->debit_note_no;?>&currency=<?php echo $rows->currency; ?>
 &date_generated=<?php echo $rows->date_generated; ?>"><?php echo $rows->debit_note_no;?></a></td>
    <td><?php echo $rows->supplier_name;?></td>
	<td align="right" ><?php echo $rows->curr_name.' '.number_format($ttl_stock_ret=$rows->ttl_stock_return,2);?></td>
	<td align="right">
	
		<?php
	
echo number_format($curr_rate=$rows->curr_rate,2);
	?>
	
	
	</td>
	 <td width="200"><div align="right"><?php echo number_format ($stock_ret_kshs=$ttl_stock_ret*$curr_rate,2); ?></td>
<td align="center"><?php echo $rows->date_generated;?></td>
 <td width="200"><div align="center"><a href="purchase_returns_det_trans.php?order_code=<?php echo $rows->order_code;?>
 &supplier_id=<?php echo $rows->supplier_id; ?>&debit_note=<?php echo $rows->debit_note_no;?>&currency=<?php echo $rows->currency; ?>
 &date_generated=<?php echo $rows->date_generated; ?>">View Transactions</a></td>
 <td width="200"><div align="center"><a href="receive_refund.php?debit_note_id=<?php echo $rows->debit_note_id;?>&order_code=<?php echo $rows->order_code;?>
 &supplier_id=<?php echo $rows->supplier_id; ?>&debit_note=<?php echo $rows->debit_note_no;?>&currency=<?php echo $rows->currency; ?>&amount_to_refunded=<?php echo $stock_ret_kshs;?>&curr_rate=<?php echo $curr_rate; ?>">Receive Fund</a></td>
    </tr>
  <?php 
  $grnd_stock_ret_kshs=$grnd_stock_ret_kshs+$stock_ret_kshs;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 

	
	
	?></font></strong></td>
	
	<td width="200" colspan="3"><strong><font size="+1">Kshs.<?php 
	echo number_format($grnd_stock_ret_kshs,2);
	
	
	?></font></strong></td>
   
    </tr>
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
<!--<script type="text/javascript">
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
  
  
  
  </script> -->
		
			

			
			
			
					
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