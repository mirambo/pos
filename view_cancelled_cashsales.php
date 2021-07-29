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

function confirmCancel()
{
    return confirm("Are you sure you want to cancel this cash sale?");
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
		
		
		
	<?php require_once('includes/cashsalessubmenu.php');  ?>
		
		<h3>::List of All Cancelled Cash Sales Made</h3>
         
				
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

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>

<?php 

if ($_GET['cancelconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Cash Sales Cancelled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Cash Sales Receipt : By Client Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->client_id; ?>"><?php echo $rows1->c_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Receipt Number</strong></td>
    <td width="350"><div align="center"><strong>Date Generated</strong></td>
	<td width="70"><div align="center"><strong>Client Name</strong></td>
	<td width="300"><div align="center"><strong>Amount(Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount(Kshs)</strong></td>
		 <td width="300"><div align="center"><strong>Reason for Cancelation</strong></td>
	 <td width="300"><div align="center"><strong>View Transactions</strong></td>

	 
	 <!--<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
     <td width="300" ><div align="center"><strong>Returns</strong></td>
<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php
 if (!isset($_POST['generate']))
{
if ($user_group_id!='15')
{
  
$sql="select cancelled_cash_sales.reasons,cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code and cash_sales_payments.client_id=clients.client_id AND cash_sales_payments.currency_code=currency.curr_id AND cash_sales_payments.user_id='$user_id' and cash_sales_payments.status='2' order by cash_sales_payments.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select cancelled_cash_sales.reasons, cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales 
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code and cash_sales_payments.client_id=clients.client_id and cash_sales_payments.status='2' AND cash_sales_payments.currency_code=currency.curr_id order by cash_sales_payments.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];

if ($client!='0' && $date_from=='' && $date_to=='')
{
$sql="select cancelled_cash_sales.reasons,cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales 
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code AND cash_sales_payments.client_id=clients.client_id and cash_sales_payments.status='2' AND cash_sales_payments.currency_code=currency.curr_id and cash_sales_payments.client_id='$client' order by cash_sales_payments.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
$sql="select cancelled_cash_sales.reasons,cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales 
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code AND cash_sales_payments.client_id=clients.client_id and cash_sales_payments.status='2' AND cash_sales_payments.currency_code=currency.curr_id and cash_sales_payments.date_generated BETWEEN '$date_from' AND '$date_to'  order by cash_sales_payments.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
$sql="select cancelled_cash_sales.reasons,cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales 
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code AND cash_sales_payments.client_id=clients.client_id and cash_sales_payments.status='2' AND cash_sales_payments.currency_code=currency.curr_id and cash_sales_payments.date_generated BETWEEN '$date_from' AND '$date_to' and cash_sales_payments.client_id='$client' order by cash_sales_payments.date_generated desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="select cancelled_cash_sales.reasons,cash_sales_payments.currency_code,cash_sales_payments.user_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.cash_sales_payment_id,cash_sales_payments.receipt_no,cash_sales_payments.client_id,cash_sales_payments.curr_rate,cash_sales_payments.date_generated,
cash_sales_payments.ttl_amount,cash_sales_payments.sales_code,cash_sales_payments.cash_paid,cash_sales_payments.sales_rep,currency.curr_name,clients.c_name from cash_sales_payments,clients,currency,cancelled_cash_sales 
where cancelled_cash_sales.sales_code=cash_sales_payments.sales_code AND cash_sales_payments.client_id=clients.client_id and cash_sales_payments.status='2' AND cash_sales_payments.currency_code=currency.curr_id order by cash_sales_payments.date_generated desc";
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
  
    <td><a href="view_cash_sale_trans.php?cash_sales_payment_id=<?php echo $rows->cash_sales_payment_id;?>&sales_code=<?php echo $rows->sales_code;?>&receipt_no=<?php echo $rows->receipt_no; ?>
	&client_id=<?php echo $rows->client_id; ?>&currency=<?php echo $rows->currency_code; ?>&sales_rep=<?php echo $rows->sales_rep; ?>&inv_bal=<?php echo $inv_bal=$rows->inv_bal;?>&inv_ttl=<?php echo $rows->ttl_amount; ?>&date_generated=<?php echo $rows->date_generated;?>&user=<?php echo $rows->user_id;?>
	"><?php echo $rows->receipt_no;?></a></td>
    <td><?php echo $rows->date_generated;?></td>
	<td><a href="client_statement.php?client_id=<?php echo $rows->client_id; ?>"><?php echo $rows->c_name;?></a></td>
	<td ><?php echo $rows->curr_name.' '.number_format($ttl_amount=$rows->ttl_amount,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($cash_ttl_kshs=$curr_rate*$ttl_amount,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	
	<td>
	<?php echo $rows->reasons; ?>
	</td>
	<td align="center"><a href="view_cash_sale_trans.php?cash_sales_payment_id=<?php echo $rows->cash_sales_payment_id;?>&sales_code=<?php echo $rows->sales_code;?>&receipt_no=<?php echo $rows->receipt_no; ?>
	&client_id=<?php echo $rows->client_id; ?>&currency=<?php echo $rows->currency_code; ?>&sales_rep=<?php echo $rows->sales_rep; ?>&inv_bal=<?php echo $inv_bal=$rows->inv_bal;?>&inv_ttl=<?php echo $rows->ttl_amount; ?>&date_generated=<?php echo $rows->date_generated;?>&user=<?php echo $rows->user_id;?>
	">View Transactions</a></td>
	<!--<td align="right"><strong><font color="#ff0000">
	
	<?php
	$ttl_amount;
	$ttl_cash_rec;
	$bal;
	
	
	$idd=$rows->invoice_id;
	
	//$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$ttl_amount-$ttl_cash_rec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);

	?></font></strong></td>-->
<!--	<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
if ($ttl_cash_rec==$bal)
{

echo "Cleared";


}

elseif ($ttl_cash_rec < $ttl_amount && $ttl_cash_rec=='')
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>
&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Receive Payment</a>

<?php

}

elseif ($ttl_cash_rec < $ttl_amount && $ttl_cash_rec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>
&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

<?php
}

elseif ($ttl_cash_rec==$ttl_amount)	
{?>

Fully Paid

<?php
}

else

{

}
	
	
	
	
	
	?></td>-->
	

	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
  $grnd_cash_ttl_kshs=$grnd_cash_ttl_kshs+$cash_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grnd_cash_ttl_kshs,2);
	
	
	?></font></strong></td>
	  <td width="200"><div align="center"><strong></strong></td>
	  <td width="200"><div align="center"><strong></strong></td>
	 <!--<td width="200"><div align="center"><strong>Clear Balance</strong></td>
  <td width="200" ><div align="center"><strong>Record Sales Returns</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
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