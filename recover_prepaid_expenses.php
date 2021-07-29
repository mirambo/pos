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
		
		
		
<?php require_once('includes/prepaidexpensessubmenu.php');  ?>
		
		<h3>::Recover Prepaid Prepaid Expenses Recorded</h3>
         
				
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
	<td colspan="11" align="center"><strong>Search : Expenses Account:</strong>
	<select name="client" style="width:300px;">
	<option value="0">Select.................................</option>
								  <?php 
								  
								  $query1="select * from expenses_categories order by expense_category_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->exp_cat_id; ?>"><?php echo $rows1->expense_category_name;?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											
<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_expenses.php?client=<?php echo $client?>&date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to ?>">Print</a>						  


					
	
    </tr>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="10%"><div align="center"><strong>Date Paid</strong></td>
	<td width="10%"><div align="center"><strong>Description</strong></td>
	<td width="350"><div align="center"><strong>Amount Received <br/>(Other Currencies)</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Paid(SSP)</strong></td>
	 <td width="300" ><div align="center"><strong>Amount Recovered (SSP)</strong></td>
	 <td width="300" ><div align="center"><strong>Balance</strong></td>
	<td width="300"><div align="center"><strong>Recover</strong></td>
	<!--<td width="100"><div align="center"><strong>Edit</strong></td>
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
<?php
if (!isset($_POST['generate']))
{

$sql="select * FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id ORDER BY prepaid_expenses.date_received desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
if ($client!=0 && $date_from=='' && $date_to=='')
{
//echo "client only";
$sql="select * FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and prepaid_expenses.exp_cat_id='$client' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client==0 && $date_from!='' && $date_to!='')
{
//echo "Dea only";
$sql="SELECT * FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and prepaid_expenses.date_paid BETWEEN '$date_from' AND '$date_to' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($client!=0 && $date_from!='' && $date_to!='')
{
//echo "Date  and cilonly";
$sql="SELECT * FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id and 
prepaid_expenses.date_paid BETWEEN '$date_from' AND '$date_to' and prepaid_expenses.exp_cat_id='$client' order by prepaid_expenses.date_paid  desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
//echo "kba";
$sql="select * FROM mop,prepaid_expenses,currency where 
prepaid_expenses.mop=mop.mop_id AND prepaid_expenses.currency_code=currency.curr_id ORDER BY prepaid_expenses.date_received desc";
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
	<td><?php echo $rows->decription;?></td>
	<!--<td><?php echo $rows->receipt_no;?></td>-->
   
	
	<td align="right"><?php echo $rows->curr_name.' '.number_format($invoice_ttl=$rows->amount_received,2);?></td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($inv_ttl_kshs=$curr_rate*$invoice_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td align="right">

	 <?php
$prepaid_expenses_id=$rows->prepaid_expenses_id;

$amnt_paid_curr=0;	
$sqlp="select * from prepaid_expenses_payments where prepaid_expenses_id='$prepaid_expenses_id'";
$resultsp= mysql_query($sqlp) or die ("Error $sqlp.".mysql_error());
if (mysql_num_rows($resultsp) > 0)
{
while ($rowsp=mysql_fetch_object($resultsp))
		{
		  $curr_ratefp=$rowsp->curr_rate;
		 $amount_paid=$curr_ratefp*$rowsp->amount_received;
		 $amnt_paid_curr=$amnt_paid_curr+$amount_paid;
		
		}
		echo number_format($amnt_paid_curr,2);
//echo number_format($ttl_cash1,2);

}



	 ?>
	</td>
	 <td align="right">
<?php
echo number_format($bal_incurr=$inv_ttl_kshs-$amnt_paid_curr,2);



$grand_bal=$grand_bal+$bal_incurr;


 ?>	 
	 </td>
	 <td align="center"><a href="incurr_prepaid_expenses.php?prepaid_expenses_id=<?php echo $rows->prepaid_expenses_id;?>&amount_paid=<?php echo $inv_ttl_kshs; ?>">Incurr the expense</a></td>
	
	
	
	
	
	
	
	<!--<td align="center"><a href="edit_prepaid_expenses.php?prepaid_expenses_id=<?php echo $rows->prepaid_expenses_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_prepaid_expenses.php?prepaid_expenses_id=<?php echo $rows->prepaid_expenses_id;?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
 -->   
	
  
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
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong></strong></td>
	<td width="200"><div align="right"><font size="+1" color="#ff0000;"><?php 
	echo number_format($grand_bal,2);
	
	
	?></font></td>
	
     <td width="200" ><div align="center"><strong></strong></td>
   
   
    </tr>
  <?php
  
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="10" height="30" align="center"> 
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