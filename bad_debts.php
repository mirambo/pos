<?php 
include('includes/session.php');
include('Connections/fundmaster.php'); 
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
		
		<h3>::Declare Doubtfuls Debts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">


  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	

	<?php
	
if ($user_group_id!='15')
{
echo "<font color='#ff0000'><strong>Sorry!! You Not Allowed To Visit This Module!!</strong></font>";
}
else{
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Doubtful Debts Declared successfully</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
//}
?>
	
	</td>
	
    </tr>
	
	
	
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
	

	<?php
	
//if ($user_group_id!='15')
//{
//echo "Sorry Your Not Allowed to Visit this module";
//}
//else{
	
	$invoice_no=$_GET['invoice_no'];

if ($_GET['success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Doubtful Debts Declared successfully</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
//}
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
   
    
	
	<td colspan="2"><strong>Filter By: Client Name</strong></td>
	<td><input type="text" name="c_name" size="20" /></td>
						<td><strong>Or By Date</strong></td>
							<td align="right"><strong>From : </strong></td>
		<td><input type="text" name="from" size="30" id="from" readonly="readonly" /></td>
			<td><strong>To:</strong><input type="text" name="to" size="25" id="to" readonly="readonly" /></td>
				<td align="center"colspan="3"><input type="submit" name="generate" value="Generate"></td>
					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Invoice Number</strong></td>
    <td width="15%"><div align="center"><strong>Date Generated</strong></td>
	<td width="70"><div align="center"><strong>Client Name</strong></td>
	<td width="13%"><div align="center"><strong>Amount Invoiced (Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Invoiced (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="12%"><div align="center"><strong>Doubtful Debts</strong></td>
    <!--<td width="300" ><div align="center"><strong>Returns</strong></td>-->
    <!--<td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php 
  
$sql="select invoices.invoice_id,invoices.invoice_no,invoices.client_id,invoices.curr_rate,invoices.date_generated,
invoices.invoice_ttl,invoices.sales_code,invoices.sales_rep,currency.curr_name,clients.c_name from invoices,clients,
currency where invoices.client_id=clients.client_id AND invoices.status='1' AND invoices.doubt_ful_status='1'  AND 
invoices.currency_code=currency.curr_id order by invoices.invoice_id desc";
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
    <td align="center"><?php echo $rows->date_generated;?></td>
	<td><a href="client_statement.php?client_id=<?php echo $rows->client_id; ?>"><?php echo $rows->c_name;?></a></td>
	<td ><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->invoice_ttl,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	<td align="right"><strong><font color="#009900"><?php 
      $sales_code_id=$rows->sales_code;
	  
	  $sqlrec="select SUM(invoice_payments.amount_received) as ttl_amnt_rec,invoice_payments.curr_rate from invoice_payments where invoice_payments.sales_code='$sales_code_id'";
      $resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());
	  
	  $rowsrec=mysql_fetch_object($resultsrec);
	  
	  $ttlrec=$rowsrec->ttl_amnt_rec;
	  $invpay_xrate=$rowsrec->curr_rate;
	  
	  //echo $curr_rate.'-';
	  $ttl_rec_kshs=$ttlrec*$curr_rate;
	  
	  echo number_format($ttl_rec_kshs,2);
	
	
	?></strong></td>
	<td align="right"><strong><font color="#ff0000">
	
	<?php
	
	$idd=$rows->invoice_id;
	
	$invoice_ttl=$rows->invoice_ttl;
	
	//echo $invoice_ttl;
	
	$bal=$invoice_ttl-$ttlrec;
	
	$bal_kshs=$curr_rate*$bal;
	
	echo number_format($bal_kshs,2);
	
$sqlupdtbal="UPDATE invoices set inv_bal='$bal' where invoice_id='$idd'";
$resultsupdtbal= mysql_query($sqlupdtbal) or die ("Error $sqlupdtbal.".mysql_error());
	
	
	
	
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
	<td align="center"> <?php
	
	//$ttlrec $invoice_ttl 
	
$sales_code1=$rows->sales_code;
	
$sqldc="SELECT sales_code from doubtful_debts where sales_code='$sales_code1'";
$resultsdc= mysql_query($sqldc) or die ("Error $sqldc.".mysql_error());
$rowsdc=mysql_fetch_object($resultsdc);

$sales_codedc=$rowsdc->sales_code;	
	
	
	if ($sales_code1==$sales_codedc)
{

echo '<font color="#ff0000">Doubtful Debt..</font>';




}

/*elseif ($ttlrec==0)
{
?>

<a href="declare_doubtful_debts.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&balance=<?php echo $bal; ?>" style="color:#000099;">Declare Bad Debt</a>

<?php

}*/

elseif ($ttlrec < $invoice_ttl && $ttlrec!='')	
{?>

<a href="declare_doubtful_debts.php?invoice_id=<?php echo $rows->invoice_id;?>&sales_rep=<?php echo $rows->sales_rep; ?>&amnt_rec=<?php echo $ttlrec; ?>&balance=<?php echo $bal; ?>" style="color:#000099;">Declare Doubtful Debts</a>

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
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong></strong></td>
	<td width="200"><div align="right"><strong></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong><font size="+1"><?php 
	echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
    <td width="200" ><div align="center"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($grand_ttl_bal,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>

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

<?php 
}

?>