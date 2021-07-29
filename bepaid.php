<?php 
include('includes/session.php'); 
include('Connections/fundmaster.php'); 
$shop_id;
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

function confirmCancel()
{
    return confirm("Are you sure you want to cancel this invoice?");
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
		
		
		
<?php require_once('includes/invoicessubmenu.php');  ?>
		
		<h3>::List of All Invoices Generated And Have Commission Value</h3>
         
				
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

if ($_GET['cancelconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Invoice Canceled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Invoices : By Client Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients order by c_name";
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
    <td width="200"><div align="center"><strong>Invoice No</strong></td>
	<td width="15%"><div align="center"><strong>Client Name</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Other Currency)</strong></td>
	<td width="300"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Kshs)</strong></td>
	
	<td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
   
   <!-- <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
<?php
if ($shop_id==0)
{
if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code,commisions_expected WHERE 
commisions_expected.sales_code=sales_code.sales_code_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND commisions_expected.tll_commision!=0 order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code,commisions_expected WHERE 
commisions_expected.sales_code=sales_code.sales_code_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND commisions_expected.tll_commision!=0 AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code,commisions_expected WHERE 
commisions_expected.sales_code=sales_code.sales_code_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND commisions_expected.tll_commision!=0 AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code,commisions_expected WHERE 
commisions_expected.sales_code=sales_code.sales_code_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND commisions_expected.tll_commision!=0 AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM clients,sales_code,commisions_expected WHERE 
commisions_expected.sales_code=sales_code.sales_code_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND commisions_expected.tll_commision!=0 order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}

}
//end of if user not related to any shop
else
{

if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!='0' && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

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
  
    <td><a href="view_sales_trans.php?sales_code_id=<?php echo $rows->sales_code_id;?>"><?php echo $invoice_no=$rows->invoice_no;?></a>
	
	</td>
	 <!--<td><?php 
$shop_keeper=$rows->user_id;
$sqlshp="SELECT clients.c_name FROM sales_code,clients,users WHERE users.user_id=sales_code.user_id and 
sales_code.user_id='$shop_keeper'";
$resultsshp= mysql_query($sqlshp) or die ("Error $sqlshp.".mysql_error());
$rowsshp=mysql_fetch_object($resultsshp);

$c_name=$rowsshp->c_name;

if ($c_name=='')
{
echo "<i>Super Administrator</i>";
}
else
{
echo $c_name;
}

	 
	 
	 ?></td>-->
 
   
	<td><?php echo $rows->c_name;?></td>
	
	
	<td align="right"><?php 
$sales_code_id=$rows->sales_code_id;

$sqllpdet="select  accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate, 
accounts_receivables_ledger.amount,currency.curr_name FROM currency,accounts_receivables_ledger WHERE 
accounts_receivables_ledger.currency_code=currency.curr_id AND accounts_receivables_ledger.sales_code='crs$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


$rowslpdet=mysql_fetch_object($resultslpdet);
							 
							 
echo $rowslpdet->curr_name.' '.number_format($amount=$rowslpdet->amount,2);
?></strong></td>
	
	
	<td align="center"><?php echo number_format($curr_rate=$rowslpdet->curr_rate,2);?></td>
	<td align="right">
	<?php 
	echo number_format($inv_amnt_kshs=$amount*$curr_rate,2);
	
	
	?>
	
	</td>
	<td align="right">
	<?php 
$sales_code_id=$rows->sales_code_id;
$grnd_amount_rec=0;	
$sqlpaid="SELECT *  from invoice_payments where sales_code_id='$sales_code_id'";
$resultspaid= mysql_query($sqlpaid) or die ("Error $sqllpaid.".mysql_error());
if (mysql_num_rows($resultspaid) > 0)
						  {
						
							  while ($rowspaid=mysql_fetch_object($resultspaid))
							  { 
							     $amount_received=$rowspaid->amount_received;
								$curr_rate=$rowspaid->curr_rate.',';
								$amnt_rec_kshs=$amount_received*$curr_rate.',';
								$grnd_amount_rec=$grnd_amount_rec+$amnt_rec_kshs;
							  }
							  
							  echo number_format($grnd_amount_rec,2);
							  }
	
	if ($grnd_amount_rec=='')
	{
	echo "0.00";
	
	}

	
/*$sqlpaid="SELECT SUM(amount_received) as amnt_rec from invoice_payments where sales_code_id='$sales_code_id'";
$resultspaid= mysql_query($sqlpaid) or die ("Error $sqllpaid.".mysql_error());
$rowspaid=mysql_fetch_object($resultspaid);	
$grnd_amount_rec=$rowspaid->amnt_rec;*/
	?>
	
	
	</td>
	<td align="center">
	<?php 
	echo number_format($balance_kshs=$inv_amnt_kshs-$grnd_amount_rec,2);
	
	?>
	
	
	
	</td>
	
	
	
	<td align="center">
	<?php
if ($inv_amnt_kshs==$balance_kshs)
{
	?>
	

	<a href="receive_invoice_payment.php?sales_code_id=<?php echo $rows->sales_code_id;?>">Receive Payment</a>

	<?php
}
elseif ($balance_kshs!=0)
{

?>
	

	<a href="receive_invoice_payment.php?sales_code_id=<?php echo $rows->sales_code_id;?>"><font color="#ff0000">Clear Balance Payment</font></a>

	<?php

}
elseif ($grnd_amount_rec==$inv_amnt_kshs || $balance_kshs<0)
{
echo "<font color='#009900'>Cleared</font>";

}


	?>
	
	

	
	</td>
	
  
    </tr>
  <?php 

 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_amnt_kshs;
 
  }
  ?>
  
  <tr height="30" bgcolor="#FFFFCC">

<td></td>
  <td colspan="3" align="center"><strong><font size="+1">Totals</font></td>
  <td align="right"><strong><font size="+1"><?php echo  number_format($inv_grnd_ttl_kshs,2); ?></font></strong></td>
  <td></td>
  <td></td>
  <td></td>
  
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