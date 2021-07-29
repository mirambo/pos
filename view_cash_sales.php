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
    return confirm("Are you sure you want to cancel this cash sales?");
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
		
		<h3>::List of All Cash Sales Generated</h3>
         
				
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
echo "<p align='center'><strong><font color='#FF0000'>Cash Sales Canceled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Cash Sales Receipt : By Client Name:</strong>
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
    <td width="200"><div align="center"><strong>Receipt No</strong></td>
    <!--<td width="200"><div align="center"><strong>Shop Branch</strong></td>-->
    <td width="300"><div align="center"><strong>Sales Date</strong></td>
	<td width="15%"><div align="center"><strong>Client Name</strong></td>
	<!--<td width="350"><div align="center"><strong>Container No</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>-->
	<td width="300"><div align="center"><strong>Cash Sale Amount(Other Currency)</strong></td>
	<td width="300"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Cash Sale Amount(Kshs)</strong></td>
	 <td width="300" ><div align="center"><strong>View Details</strong></td>
	 <td width="300" ><div align="center"><strong>Cancel</strong></td>
	 <!--<td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
   
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
<?php
if ($shop_id==0)
{
$inv_grnd_ttl_kshs=0;
if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.curr_rate,currency.curr_name,sales_code.invoice_no,
sales_code.date_generated,sales_code.user_id,clients.c_name FROM currency,clients,sales_code WHERE sales_code.currency=currency.curr_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c'  order by sales_code.sales_code_id desc";
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
sales_code.date_generated,sales_code.curr_rate,currency.curr_name,sales_code.user_id,clients.c_name FROM currency, clients,sales_code WHERE sales_code.currency=currency.curr_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.curr_rate,currency.curr_name,sales_code.user_id,clients.c_name FROM currency,clients,sales_code WHERE sales_code.currency=currency.curr_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.curr_rate,currency.curr_name,sales_code.user_id,clients.c_name FROM currency,clients,sales_code WHERE sales_code.currency=currency.curr_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,sales_code.curr_rate,currency.curr_name,sales_code.user_id,clients.c_name FROM currency,clients,sales_code WHERE sales_code.currency=currency.curr_id AND sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}

}
//end of if user not related to any shop
else
{
$inv_grnd_ttl_kshs=0;
if (!isset($_POST['generate']))
{
 
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
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
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' AND sales_code.client_id='$client' AND sales_code.date_generated BETWEEN '$date_from' AND '$date_to' order by sales_code.sales_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select sales_code.invoice_no,sales_code.user_id,sales_code.sales_code_id,sales_code.invoice_no,
sales_code.date_generated,clients.c_name FROM clients,sales_code,users WHERE sales_code.client_id=clients.client_id 
AND sales_code.status='0' AND sales_code.display='0' AND sales_code.sale_type='c' and sales_code.user_id=users.user_id AND users.shop_id='$shop_id' order by sales_code.sales_code_id desc";
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
    <td align="center"><?php echo $rows->date_generated;?></td>
   
	<td><?php echo $rows->c_name;?></td>
	
	
	<td align="right"><?php 
echo $rows->curr_name.' ';
	
	
	
$sales_code_id=$rows->sales_code_id;

/*$sqllpdet="select accounts_receivables_ledger.currency_code,accounts_receivables_ledger.curr_rate, 
accounts_receivables_ledger.amount,currency.curr_name FROM currency,accounts_receivables_ledger WHERE 
accounts_receivables_ledger.currency_code=currency.curr_id AND accounts_receivables_ledger.sales_code='crs$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());


$rowslpdet=mysql_fetch_object($resultslpdet);


echo $rowslpdet->curr_name.' '.number_format($amount=$rowslpdet->amount,2);*/
$grnd_ttl_amnt=0;
$sqllpdet="select sales.sales_id,sales.prod_desc,sales.quantity,sales.quantity,sales.selling_price,sales.discount,sales.discount_value,sales.product_id,sales.vat_value,sales.vat,
sales.lease,sales.foc,sales.vat_value,products.product_name,products.prod_code,products.pack_size from sales_code,sales, 
products where sales.product_id=products.product_id AND sales.sales_code_id=sales_code.sales_code_id AND sales.sales_code_id='$sales_code_id'";
$resultslpdet= mysql_query($sqllpdet) or die ("Error $sqllpdet.".mysql_error());

if (mysql_num_rows($resultslpdet) > 0)
						  {
							  
							  while ($rowslpdet=mysql_fetch_object($resultslpdet))
							  { 
							  $selling_price=$rowslpdet->selling_price;
							  $qnty=$rowslpdet->quantity;
							  
							  $subttl=$selling_price*$qnty;
							  							 
							  $disc=$rowslpdet->discount_value;
							  $vat=$rowslpdet->vat_value;
							  
							   //echo number_format($ttl_amnt=$subttl+$disc-$vat,2);
							  $ttl_amnt=$subttl-$disc+$vat;
							  
							  $grnd_ttl_amnt=$grnd_ttl_amnt+$ttl_amnt;
							  }
							  
 echo number_format($grnd_ttl_amnt,2);							  
							  
							  }



?></strong></td>
	
	
	<td align="center"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right">
	<?php 
	echo $rows->curr_name.' ';
	echo number_format($inv_amnt_kshs=$grnd_ttl_amnt*$curr_rate,2);
	
	
	?>
	
	</td>
	<td align="center">
	
	<a href="view_cash_sales_trans.php?sales_code_id=<?php echo $rows->sales_code_id;?>">View Details</a>
	
	
	</td>
	
	
	
	<td align="center">
	
	

	
	<a href="cancel_cash_sale_reason.php?sales_code_id=<?php echo $rows->sales_code_id;?>&grndttl=<?php echo $amount; ?>" onClick="return confirmCancel();"><img src="images/dissaprove.png"></a>
	
	
	

	
	</td>
	
  
    </tr>
  <?php 

 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_amnt_kshs;
 
  }
  ?>
  
  <tr height="30" bgcolor="#FFFFCC">

<td></td>
  <td colspan="4" align="center"><strong><font size="+1">Totals</font></td>
  <td align="right"><strong><font size="+1"><?php echo  number_format($inv_grnd_ttl_kshs,2); ?></font></strong></td>
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