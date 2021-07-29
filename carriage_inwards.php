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
		
		
		
		<?php require_once('includes/stocksubmenu.php');  ?>
		
		<h3>::List of All Carriage Inwards Transactions</h3>
         
				
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
    <td width="200"><div align="center"><strong>LPO No.</strong></td>
	<td width="100"><div align="center"><strong>Supplier Name</strong></td>
    <td width="100"><div align="center"><strong>Carriage Inwards <br/>(Other Currency)</strong></td>
	<td width="100"><div align="center"><strong>Exchange Rate</strong></td>	
<td width="300"><div align="center"><strong>Carriage Inwards <br/>(Kshs.)</strong></td>
<td width="300"><div align="center"><strong>Mode of Payment</strong></td>
<td width="300"><div align="center"><strong>Date Generated</strong></td>

		
    </tr>
  
  <?php 
  
$sql="SELECT stock_payments.lpo_no,stock_payments.freight_charges,stock_payments.exchange_rate,stock_payments.mop,stock_payments.date_paid,suppliers.supplier_name,currency.curr_name
FROM stock_payments,suppliers,currency WHERE stock_payments.supplier_id=suppliers.supplier_id AND stock_payments.currency=currency.curr_id";
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
  
    <td><?php echo $rows->lpo_no;?></td>
    <td><?php echo $rows->supplier_name;?></td>
	<td align="right" ><?php echo $rows->curr_name.' '.number_format($ttl_stock_ret=$rows->freight_charges,2);?></td>
	<td align="right"><?php
	
echo $ex_rate=$rows->exchange_rate;
	

	?>
	
	
	</td>
	 <td width="200"><div align="right"><strong><?php echo number_format ($stock_ret_kshs=$ttl_stock_ret*$ex_rate,2); ?></strong></td>

 <td width="200"><?php echo $rows->mop;?></td>
 <td align="center"><?php echo $rows->date_paid;?></td>
    </tr>
  <?php 
  $grnd_stock_ret_kshs=$grnd_stock_ret_kshs+$stock_ret_kshs;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_sales_ret,2);
	
	
	?></font></strong></td>
	
	<td width="200" colspan="3"><strong><font size="+1">Kshs.<?php 
	echo number_format($grnd_stock_ret_kshs,2);
	
	
	?></font></strong></td>
    <!--<td width="200" ><div align="center"><strong>Record Sales Returns</strong></td>
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
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