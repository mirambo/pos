<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<script type="text/javascript"> 

function confirmBounce()
{
    return confirm("Are you sure you want to declare this cheque as bounced?");
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
		
		
		
	<?php require_once('includes/invoice_payment_submenu.php');  ?>
		
		<h3>::List of All Invoice Payments Recorded But Not Yet Approved</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['invoice_payment_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Payment Received successfully for the Invoice number' ;?> <?php echo $invoice_no;?> <?php echo '</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Payment Cancelled Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="11" align="center"><strong>Search Invoice : By Client Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from clients order by c_name asc";
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
			<input type="submit" name="generate" value="Filter">
											

					
	
    </tr>
<tr bgcolor="#FFFFCC">
	
   
    <td colspan="13" height="30" align="right"><font size="+1">
	
	<?php 
	if (isset($_POST['generate']))
	{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
	}
	?>
	
	<a href="print_invoice_payments.php?client=<?php echo $client;?>&date_from=<?php echo $date_from;  ?>&date_to=<?php echo $date_to ?>" title="Export To Word"><img src="images/word.png" style="margin-right:30px;"/> </a>
	
	
	
	</td>
	</tr>	
	
	
	</table>
<DIV class=fakeContainer>
<table width="100%" border="0" class=demoTable id=demoTable align="center">
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="12%"><div align="center"><strong>Date Received</strong></td>
	<td width="17%"><div align="center"><strong>Client Name</strong></td>	
	<td width="17%"><div align="center"><strong>Client Name</strong></td>	
	<td width="350"><div align="center"><strong>Amount Received <br/>(Other Currencies)</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Received (Kshs)</strong></td>
	 <td width="300" ><div align="center"><strong>Mop</strong></td>
	 <td width="300" ><div align="center"><strong>Client Bank Account</strong></td>
	  <td width="300"><div align="center"><strong>Bank Transfered To</strong></td>
		<td width="300"><div align="center"><strong>Approve Payments</strong></td><!--
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>   
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
   <td width="100"><div align="center"><strong>Edit</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
<?php
if (!isset($_POST['generate']))
{
 
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='0' 
AND  invoice_payments.currency_code=currency.curr_id ORDER BY invoice_payments.date_received desc ";
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
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='0' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.client_id='$client' order by invoice_payments.invoice_payment_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='0' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.date_received BETWEEN '$date_from' AND '$date_to' order by invoice_payments.invoice_payment_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='0' 
AND  invoice_payments.currency_code=currency.curr_id and invoice_payments.date_received BETWEEN '$date_from' AND '$date_to' and invoice_payments.client_id='$client' order by invoice_payments.invoice_payment_id  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,clients.c_name,invoice_payments.amount_received,invoice_payments.receipt_no,invoice_payments.invoice_payment_id,
invoice_payments.mop,invoice_payments.ref_no,invoice_payments.sales_rep,invoice_payments.client_bank,invoice_payments.our_bank,invoice_payments.date_paid,
invoice_payments.sales_code_id,invoice_payments.receipt_no,invoice_payments.date_received,invoice_payments.status,currency.curr_name,
invoice_payments.currency_code,invoice_payments.curr_rate,invoice_payments.amount_received FROM clients,mop,invoice_payments,
currency where invoice_payments.mop=mop.mop_id and invoice_payments.client_id=clients.client_id and invoice_payments.status='0' 
AND  invoice_payments.currency_code=currency.curr_id ORDER BY invoice_payments.date_received desc";
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
  
    <td>
<?php 
echo $date_received=$rows->date_received; 
	
	?>
	</td>
	<td><?php echo $rows->c_name;?></td>
	<td><?php echo $rows->receipt_no;?></td>
	
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td><?php 
	 
$mop=$rows->mop;
	
	if ($mop==1 || $mop==4)
	{
	echo $rows->mop_name.'</br>'.'<i>(Ref.No:'.$rows->ref_no.')</i>';
	}
	elseif ($mop==3)
	 {
	echo $rows->mop_name.'</br>'.'<i>(Ref.No:'.$rows->ref_no.')</i>';
	}
	
	elseif ($mop==2)
	 {
	echo '<a onClick="return confirmBounce();" href="record_bounced_cheque.php?invoice_payments_id='.$rows->invoice_payment_id.'">'.$rows->mop_name.'</br>'.'<i>(Cheque No:'.$rows->ref_no.')</i></a>';
	}
	 
	 ?></td>
	

	
	<td align="center">
	<?php 
	echo $rows->client_bank;

	?>
	
	</td>
	
	<td>
	
	
<?php 	
$bank_id=$rows->our_bank;
$sqlemp_det="select * from banks where bank_id='$bank_id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);
		
	if ($bank_id==0)
{
echo "-";
}
else
{
		
	echo $rowsemp_det->bank_name.' ('.$rowsemp_det->account_name.')';
	}
	
	
	?>
	
	</td>
	
	<td align="center">
	<!--
	<a target="_blank" href="sales_receipt.php?invoice_payment_id=<?php echo $rows->invoice_payment_id; ?>"><img src="images/print_icon.gif"></a>
	--><a href="approve_payment2.php?invoice_payment_id=<?php echo $rows->invoice_payment_id; ?>">Approve Payment</a>
	
	</td>
	<td align="center"><a href="edit_invoice_payment.php?invoice_payment_id=<?php echo $rows->invoice_payment_id; ?>&receipt_no=<?php echo $rows->receipt_no; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_invoice_payment.php?invoice_payment_id=<?php echo $rows->invoice_payment_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
<td width="200"><strong>Grand Total</strong></td>
	
	<td width="200" colspan="6"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
	 <td width="20"></td>

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
  
  <SCRIPT src="js/superTables.js" 
type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>
//<![CDATA[

(function() {
	var mySt = new superTable("demoTable", {
		cssSkin : "sSky",
		fixedCols : 1,
		headerRows : 1,
		onStart : function () {
			this.start = new Date();
		},
		onFinish : function () {
			document.getElementById("testDiv").innerHTML += "Finished...<br>" + ((new Date()) - this.start) + "ms.<br>";
		}
	});
})();

//]]>
</SCRIPT>	
		
			

			
			
			
					
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