<?php include('Connections/fundmaster.php'); 

 include ('top_grid_includes.php'); 
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

function confirmDel()
{
    return confirm("Are you sure you want to delete?");
}

</script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php
	
	$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];
	
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
	<td colspan="11" align="center"><!--<strong>Search : Expenses Account:</strong>
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
								  
								  </select>-->
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											
<a target="_blank" style="float:right; margin-right:100px; font-weight:bold; font-size:13px; color:#000000" href="print_list_expenses.php?client=<?php echo $client?>&date_from=<?php echo $date_from ?>&date_to=<?php echo $date_to ?>">Print</a>						  


					
	
    </tr>
	</table>
	<table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="5%"><div align="center"><strong>Posting No</strong></td>
    <td width="10%"><div align="center"><strong>Date Received</strong></td>
	<td width="10%"><div align="center"><strong>Cheque/</br>Ref No</strong></td>
	<td width="10%"><div align="center"><strong>Comments</strong></td>
	<td width="200"><div align="centern"><strong>Currency</strong></td>
	<td width="200"><div align="centern"><strong>Rate</strong></td>	
	<td width="350"><div align="center"><strong>Account </br>Credited</strong></td>
	<td width="300" ><div align="center"><strong>Credited </br>Amount</strong></td>
	<td width="350"><div align="center"><strong>Account </br>Debited</strong></td>
	 <td width="300" ><div align="center"><strong>Recorded By</strong></td>
	<td width="50"><div align="center"><strong>Edit</strong></td>
	<!--<td width="50"><div align="center"><strong>Delete</strong></td>-->

    </tr>
	
	</thead>
  
<?php
if (!isset($_POST['generate']))
{

$queryop="select * FROM cheque_received_code,currency WHERE cheque_received_code.currency=currency.curr_id AND 
cheque_received_code.trans_type='PAID' order by cheque_received_code.cheque_received_code_id desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());



}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];


$queryop= "select * FROM cheque_received_code,currency";
    $conditions = array();
	


 if($date_from!='' && $date_to!='' ) 
 {
	
      $conditions[] = "cheque_received_code.date_recorded>='$date_from' AND cheque_received_code.date_recorded <='$date_to'";
}

 


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND 
cheque_received_code.trans_type='PAID'  AND cheque_received_code.currency=currency.curr_id 
order by cheque_received_code.cheque_received_code_id desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="select * FROM cheque_received_code,currency WHERE cheque_received_code.currency=currency.curr_id AND 
cheque_received_code.trans_type='PAID' order by cheque_received_code.cheque_received_code_id  desc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 
 }
	
	

   $results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());



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

$journal_code_id=$rows->cheque_received_code_id;
 
 
 ?>

    <td align="center">
<?php 
echo $journal_code_id;
	
	?>
	</td>

	<td><?php echo $date_recorded=$rows->date_recorded;?></td>

   
	
	<td align="right"><?php echo $ref_no=$rows->ref_no;?></td>
	<td align=""><?php $chapter_name=$rows->comments;
	
	
	
	

				  
				  
echo $newchapter_name = wordwrap($chapter_name, 15, "<br />\n");  		
	
	
	
	
	
	?></td>

	<td align="right"><strong><?php 
	echo $rows->curr_name;

	
	?></strong></td>
	 <td align="right"><?php 
	 
echo number_format($curr_rate=$rows->curr_rate,2);


$currency=$rows->currency;

	
	 
	 ?></td>
	 
	
	<td align="">
	<?php 
$account_credited=$rows->account_to_credit;
$sqlemp_det="select * from account_type where account_type_id='$account_credited'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$acc_name=$rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;


echo $newchapter_name = wordwrap($acc_name, 15, "<br />\n");




	?>
	
	</td>
	   <td align="right"><?php echo number_format($amount_received=$rows->credit_amount,2);
   
   $amnt_rec=$amnt_rec+$amount_received;
   
   ?></td>
	<td>
	
<table align="right" border="0" width="200" class="table" bgcolor="#000">
<td>Account</td>
<td>Amount</td>
<td>VAT</td>
   <?php 
 $ttl_debit_amount=0;
 $ttl_vat_amount=0;
$sqlemp_det2="select * from cheque_received,account_type where cheque_received.account_to_debit=account_type.account_type_id AND 
cheque_received.cheque_received_code_id='$journal_code_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
   
   ?>
   
   <tr>
   <td width="70%"><?php $acc_name2=$rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name;
   
   
   
   echo $newchapter_name = wordwrap($acc_name2, 15, "<br />\n");
   
   
   
   
   
   
   ?></td>
   <td width="30%"><?php echo number_format($debit_amount=$rowsemp_det2->debit_amount,2);
   
   $ttl_debit_amount=$ttl_debit_amount+$debit_amount;
   
   //echo '-';
   
   $prod=$rowsemp_det2->account_to_debit;
   
   //echo '-';
   
    $cheque_received_id=$rowsemp_det2->cheque_received_id;
   
   //echo '-';

   $dr_transaction_code="drccpaid".$cheque_received_id;

//debit selected account

$sql34c2="select * FROM account_type where account_type_id='$prod'";
$results34c2= mysql_query($sql34c2) or die ("Error $sql34c2.".mysql_error());
$rows34c2=mysql_fetch_object($results34c2);
$bal_type=$rows34c2->balance_type;


if ($bal_type=='D')
{
	
	$amountx2=$debit_amount;
}
else
{
	
	$amountx2=-$debit_amount;
	
}


$sql34c3="select * FROM chart_transactions where transaction_code='$dr_transaction_code'";
$results34c3= mysql_query($sql34c3) or die ("Error $sql34c3.".mysql_error());
$rows34c3=mysql_num_rows($results34c3);

if ($rows34c3>0)
{
	
	
}

else
{
	
	$memo2='Cash or Cheque paid, reference no '.$ref_no.' ('.$chapter_name.')';
	
$orderdate = explode('-', $date_recorded);
$year  = $orderdate[0];
$month = $orderdate[1];
$day   = $orderdate[2];

/* $sqltrans="INSERT INTO chart_transactions SET 
account_type_id='$prod',
transaction_section='CCPAID',
memo='$memo2',
amount='$amountx2',
debit='$debit_amount',
currency='$currency',
curr_rate='$curr_rate',
transaction_date='$date_recorded',
transaction_datetime_recorded='$todate',
transaction_code='$dr_transaction_code',
transaction_user_id='$user_id',
l_day='$day',
l_month='$month',
l_year='$year'";
$resultstrans=mysql_query($sqltrans) or die ("Error $sqltrans.".mysql_error());  */
   
} 
   
   
   
   
   
   ?></td>
   
   <td><?php echo number_format($vat_amount=$rowsemp_det2->vat_value,2);
   
   $ttl_vat_amount=$ttl_vat_amount+$vat_amount;
   
   
   
   
   ?></td>

   </tr>
   
   <?php 
							  }
							  
							  ?>
<tr>
<td><strong>Totals</strong></td>
<td><strong><?php echo number_format($ttl_debit_amount,2); ?></strong></td>
<td><strong><?php echo number_format($ttl_vat_amount,2); ?></strong></td>

</tr>							  
							  
							  <?php
   
   ?>
   
   </table>	
	
	
	
	
	
	
	
	
	
	</td>
	
	
	
	<td align="center">
	<?php 
	$recorded_by=$rows->recorded_by;
$sqlemp_det2="select * from users where user_id='$recorded_by'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

echo $rowsemp_det2->f_name;
	?>
	
	</td>
    <td align="center">

	<?php if ($sess_allow_edit==1) 
	{
	?>
	
	
	
	
	
	<a href="pay_cheque_payment.php?id=<?php echo $rows->cheque_received_code_id;?>"><img src="images/edit.png"></a>
	
	<?php 
	}
	else
	{ 
	echo '<font color="#ff0000" size="-1"><i>restricted</i></font>';
	
	}
	
	
	?>

	
	
	
	
	</td>
    
	
	<!--<td align="center">
		
<?php if ($sess_allow_delete==1) 
	{
	?>
	
	<a onClick="return confirmDel()" href="delete_cheque_payment.php?id=<?php echo $rows->cheque_received_code_id;?>"><img src="images/delete.png"></a>
	
		<?php 
	}
	else
	{ 
	echo '<font color="#ff0000" size="-1"><i>restricted</i></font>';
	
	}
	
	
	?>
	
	</td>-->

    
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
  
  </table>
    <table>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"> </font></strong></td>
		<td width="200"><div align="right"></td>
			<td width="200"><div align="center"><strong></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php echo number_format($amnt_rec,2); ?></font></strong></td>


   <td width="200" ><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>
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
		
			

			
			
			
		