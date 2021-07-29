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
          <?php include ('topmenu.php');

$date_from=$_POST['from'];
$date_to=$_POST['to'];
$client=$_POST['client'];		  
		  
		  
		  
		  
		  ?>
		</div>
		
		
		
		<?php require_once('includes/post_accounts_submenu.php'); ?>
		<h3>::View Posted Received Items To Accounts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
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
    <td width="5%"><div align="center"><strong>No</strong></td>
    <td width="10%"><div align="center"><strong>Date Posted</strong></td>
	<td width="10%"><div align="center"><strong>Ref No</strong></td>
	<td width="10%"><div align="center"><strong>Order No</strong></td>
	<td width="200"><div align="centern"><strong>Currency</strong></td>
	<td width="200"><div align="centern"><strong>Exchange Rate</strong></td>	
	<td width="350"><div align="center"><strong>Account Credited</strong></td>
		<td width="300" ><div align="center"><strong>Amount</strong></td>
	<td width="350"><div align="center"><strong>Account Debited</strong></td>

	 <td width="300" ><div align="center"><strong>Recorded By</strong></td>
	<td width="300"><div align="center"><strong>Edit</strong></td>

    </tr>
	
	</thead>
  
<?php
if (!isset($_POST['generate']))
{

$sql="select * FROM account_received_stock_code,account_type,order_code_get,currency WHERE currency.curr_id=order_code_get.currency and account_received_stock_code.order_code_id=order_code_get.order_code_id and account_received_stock_code.account_to_credit=account_type.account_type_id 
 order by account_stock_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());



}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];


$queryop= "select * FROM expenses_code,currency";
    $conditions = array();
	


 if($date_from!='' && $date_to!='' ) 
 {
	
      $conditions[] = "expenses_code.expense_date>='$date_from' AND expenses_code.expense_date <='$date_to'";
}

 


 	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND expenses_code.currency=currency.curr_id order by expense_code_id desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop="select * FROM expenses_code,currency WHERE expenses_code.currency=currency.curr_id order by expense_code_id desc";
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

$journal_code_id=$rows->account_stock_code_id;
 
 
 ?>

    <td align="center">
<?php 
echo $count=$count+1;
	
	?>
	</td>

	<td><?php echo $rows->posted_date;?></td>

   
	
	<td align="right"><?php echo $rows->ref_no;?></td>
	<td align="right"><?php echo $rows->lpo_no;?></td>

	<td align="right"><strong><?php 
	echo $rows->curr_name;
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	 <td align="right"><?php 
	 
echo number_format($curr_rate=$rows->curr_rate,2);
	
	
	 
	 ?></td>
	 
	
	<td align="">
	<?php 
$account_credited=$rows->account_to_credit;
$sqlemp_det="select * from account_type where account_type_id='$account_credited'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

$sup_name2=$rowsemp_det->account_code.' '.$rowsemp_det->account_type_name;


echo wordwrap($sup_name2, 15, "<br />\n");

	?>
	
	</td>
		<td>
	
	
<?php 	

	echo number_format($rows->amount_credited,2);
	
	
	?>
	
	</td>
	<td>
	
<table align="right">
   <?php 
   $amnt_rec=0;
$sqlemp_det2="select * from account_received_stock,account_type where account_received_stock.account_to_debit=account_type.account_type_id 
AND 
account_received_stock.	account_stock_code_id='$journal_code_id'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
//$rowsemp_det2=mysql_fetch_object($resultsemp_det);

while ($rowsemp_det2=mysql_fetch_object($resultsemp_det2))
							  {
   
   ?>
   
   <tr>
   <td><?php $sup_name3=$rowsemp_det2->account_code.' '.$rowsemp_det2->account_type_name;
   
   
   
   echo wordwrap($sup_name3, 15, "<br />\n");
   
   
   
   
   ?></td>
   <td align="right"><?php echo number_format($amount_received=$rowsemp_det2->amount_debited,2);
   
   $amnt_rec=$amnt_rec+$amount_received;
   
   ?></td>
   </tr>
   
   <?php 
							  }
							  
							  ?>
<tr>
<td><strong>Totals</strong></td>
<td><strong><?php echo number_format($amnt_rec,2); ?></strong></td>
</tr>							  
							  
							  <?php
   
   ?>
   
   </table>	
	
	
	
	
	
	
	
	
	
	</td>
	

	
	<td align="center">
	<?php 
	$recorded_by=$rows->posted_by;
$sqlemp_det2="select * from users where user_id='$recorded_by'";
$resultsemp_det2= mysql_query($sqlemp_det2) or die ("Error $sqlemp_det2.".mysql_error());
$rowsemp_det2=mysql_fetch_object($resultsemp_det2);

echo $rowsemp_det2->f_name;
	?>
	
	</td>
    <td align="center"><a href="account_receive_stock_to_warehouse.php?stock_code_id=<?php echo $stock_code_id=$rows->stock_code_id; ?>&id=<?php echo $journal_code_id; ?>"><img src="images/edit.png"></a></td>
    
	
  
    </tr>
  <?php 
  $invoice_ttl=$rows->invoice_ttl;
 $inv_grnd_ttl_kshs=$inv_grnd_ttl_kshs+$inv_ttl_kshs;
  $grand_ttl_bal=$grand_ttl_bal+$bal;
  $grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <!--<tr height="30" bgcolor="#FFFFCC">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300" colspan="2"><div align="center"><strong>Grand Total</strong></td>
	
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($inv_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"></td>
	<td width="200"><div align="center"><strong></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
   <td width="100"><div align="center"><strong></strong></td>

   
    </tr>-->
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