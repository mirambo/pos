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
		
		
		
	<?php require_once('includes/advance_submenu.php');  ?>
		
		<h3>::List of All Staff Advance Payments</h3>
         
				
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
echo "<p align='center'><strong><font color='#FF0000'>Recorde Deleted Successfuly!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="11" align="center"><strong>Search : By Supplier Name:</strong>
	<select name="client">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from employees";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_firstname; ?> </option>
                                    
                                
										  
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
    <td width="10%"><div align="center"><strong>Date Received</strong></td>
	<td width="10%"><div align="center"><strong>Staff Name</strong></td>	
	<td width="10%"><div align="center"><strong>Receipt No</strong></td>	
	<td width="350"><div align="center"><strong>Amount Paid <br/>(Other Currencies)</strong></td>
	<td width="300"><div align="center"><strong>Repayment Installment</strong></td>
	 <td width="300" ><div align="center"><strong>Mop</strong></td>
	 <td width="300" ><div align="center"><strong>Staff Bank Account</strong></td>
	<td width="300"><div align="center"><strong>Bank Transfered From</strong></td>
	<td width="100"><div align="center"><strong>Edit</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
<?php
if (!isset($_POST['generate']))
{

$sql="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.install,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id ORDER BY staff_advance.date_received desc";
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
$sql="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.install,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id and staff_advance.emp_id='$client' order by staff_advance.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client=='0' && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.install,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id and staff_advance.date_paid BETWEEN '$date_from' AND '$date_to' order by staff_advance.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!='0' && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.install,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id and 
staff_advance.date_paid BETWEEN '$date_from' AND '$date_to' and staff_advance.emp_id='$client' order by staff_advance.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select mop.mop_name,employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname,staff_advance.amount_received,staff_advance.receipt_no,staff_advance.staff_advance_id ,staff_advance.mop,staff_advance.ref_no,staff_advance.client_bank,
staff_advance.our_bank,staff_advance.install,staff_advance.date_paid,staff_advance.receipt_no,staff_advance.date_received,staff_advance.status,currency.curr_name,
staff_advance.currency_code,staff_advance.curr_rate,staff_advance.amount_received FROM mop,employees,staff_advance,currency where 
staff_advance.mop=mop.mop_id and staff_advance.emp_id=employees.emp_id AND staff_advance.currency_code=currency.curr_id ORDER BY staff_advance.date_received desc";
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
echo $date_received=$rows->date_paid; 
	
	?>
	</td>
	<td><?php echo $rows->emp_firstname.' '.$rows->emp_middle_name.' '.$rows->emp_lastname;?></td>
	<td><?php echo $rows->receipt_no;?></td>
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->install,2);?></td>
	
	 <td><?php 
	 
	echo $mop=$rows->mop_name;
	
	if ($mop=='Cash')
	{
	
	}
	elseif ($mop=='Electronic ')
	 {
	echo '(Ref.No:'.$rows->ref_no.')';
	}
	
	elseif ($mop=='Cheque')
	 {
	echo '( Cheque No:'.$rows->cheque_no.')';
	}
	 
	 ?></td>
	 <!--<td align="right"><strong><font color="#009900"><?php 
      
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	

	
	
	
	
//$poi=$rows->purchase_order_id;	

//echo $poi;

 
//$sqlrec="select SUM(received_stock.quantity_rec) as ttlrec from received_stock where received_stock.purchase_order_id='$poi'";
//$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());

//rowsrec=mysql_fetch_object($resultsrec);

//$ttlrec=$rowsrec->ttlrec;
//if ($ttlrec=='')
//{ ?>
<!--<p align="center">-</p>-->
<?php //}

//else
//{
 //echo $ttlrec;
//}



//$order_quant=$rows->quantity;

//$rec_quant=$rowsrec->ttlrec;

//if ($order_quant==$rec_quant)
//{
//$sqlupdt="UPDATE purchase_order set status='0' where purchase_order.purchase_order_id='$poi'";
//$resultsupdt= mysql_query($sqlupdt) or die ("Error $sqlupdt.".mysql_error());
//}

//else 
//{


//}





	?></font></strong></td>
	 <!--<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
	if ($ttlrec==$bal)
{

echo "Cleared";


}

elseif ($ttlrec < $invoice_ttl && $ttlrec=='')
{
?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Receive Payment</a>

<?php

}

elseif ($ttlrec < $invoice_ttl && $ttlrec!='')	
{?>

<a href="receive_invoice_payment.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099; font-weight:bold;">Clear Balance</a>

<?php
}

elseif ($ttlrec==$invoice_ttl)	
{?>

Fully Paid

<?php
}

else

{

}
	
	
	
	
	
	?></td>-->
	
	
	
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
	
	<td align="center"><a href="edit_staff_advance.php?staff_advance_id=<?php echo $rows->staff_advance_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_staff_advance.php?staff_advance_id=<?php echo $rows->staff_advance_id;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong><!--Grand Total--></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<!--<td width="200"><div align="center"><strong></strong></td>-->
     <td width="200" ><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>
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