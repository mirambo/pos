<?php 

	
$id=$_GET['account_type_id'];
	
	
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det);

//include ('top_grid_includes.php');

$date_from=$_POST['date_from']; 
$date_to=$_POST['date_to']; 

$get_date_from=$_GET['date_from']; 
$get_date_to=$_GET['date_to'];

?>

<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}


p {


}
</style>

<form name="search" method="post" action="">  
  


<table width="60%" border="0" align="center" style="margin:auto;" class="table">

	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="">


<span style="float:rig;"><a target="_blank" href="print_chart_details.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>"><img src="images/print_icon.gif"></a></span>
<span style="float:rig;" style="margin-right:x;"><a href="print_chart_details_excel.php?date_from=<?php echo $date_from; ?>&id=<?php echo $id; ?>&date_to=<?php echo $date_to; ?>"><img src="images/excel.png"></a></span>
	</td>
	</tr>

<!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>-->
	
	
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align=""><font size="">

	
<strong>Account Code : </strong><?php echo $debit_account_name=$rowsemp_det->account_code;?>

<strong>Account Name : 	</strong><?php echo $rowsemp_det->account_type_name;?>



</td>
	</tr>
	
	
	</table>
	
	
	<table width="60%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
	<tr>
 

  <tr  style="background:url(images/description.gif);" height="30" >
 <td width="10%"><strong>No</strong></td>
 <td width="20%"><strong>Farmer</strong></td>
 <td width="10%"><strong>Phone No</strong></td>
 <td width="15%" align="center"><strong>1st GRN Date</strong></td>
 <td width="15%" align="center"><strong>GRN No</strong></td>
 <td width="15%" align="center"><strong>Grnd Amount</strong></td>
 <td width="20%" align="center"><strong>Advance Payment</strong></td>
 <td width="20%" align="center"><strong>GRN Payment</strong></td>
 <td width="20%" align="center"><strong>Balance</strong></td>
 
 
 
 </tr>
 
 </thead>
 
<?php
 
 
 
 if (!isset($_POST['generate']))
 {
	 

		 
$queryop="select *,order_code_get.date_generated as grn_date FROM farmers,order_code_get,purchase_order 
WHERE order_code_get.farmer_id=farmers.farmer_id GROUP BY farmers.farmer_id ORDER BY farmers.farmer_name asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error()); 
		 
}

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


$curr_rate=$rows->curr_rate;
 
 ?>
 
 
 

 
 <td align="center"><?php echo $count=$count+1; ?></td>
  <td><?php echo $rows->farmer_name; 
  
  
  $farmer_id=$rows->farmer_id; 
  
   
  
  
  ?></td>
  
    <td><?php 
	
	echo $rows->phone; 
  
   
  
  
  ?></td>
  
      <td><?php 
	  echo $rows->grn_date;
$grn_amount=0;	  
$sql_lpo="select *,order_code_get.date_generated as grn_date FROM farmers,order_code_get,purchase_order WHERE purchase_order.order_code=order_code_get.order_code_id AND 
order_code_get.farmer_id=farmers.farmer_id AND 
order_code_get.farmer_id='$farmer_id'";
$results_lpo= mysql_query($sql_lpo) or die ("Error $sql_lpo.".mysql_error());	 
while ($rows_lpo=mysql_fetch_object($results_lpo))
{
	//echo $rows_lpo->ref_no;
	 $rows_lpo->grn_date;
	
$price=$rows_lpo->vendor_prc;
	
	//echo ' - ';
	$quantity=$rows_lpo->quantity;
	
	//echo ' - ';
	
	$amount=$price*$quantity;
	
	//echo '</br>';
	
	$grn_amount=$grn_amount+$amount;
	
}
  
  
  ?></td>
  
  <td align="center"><?php 
	
	echo $rows->ref_no; 
  
   
  
  
  ?></td>
  
    <td align="right"><?php echo number_format($grn_amount,2);
  
   //$bal_type=$rows->balance_type;
  
  
  ?></td>
  
  
  
  
  
  
 <td width="" align="right"><?php 


$sql_adv="select SUM(amount_received) AS ttl_adv FROM farmers_advance_payments WHERE farmer_id='$farmer_id'";
$results_adv= mysql_query($sql_adv) or die ("Error $sql_adv.".mysql_error());	 
$rows_adv=mysql_fetch_object($results_adv);

echo number_format($adv_payment=$rows_adv->ttl_adv,2);
 

 
 ?></td>

 <td width="" align="right"><?php 


$sql_py="select SUM(order_amount_received) AS ttl_paymnt FROM 
supplier_payments_code,supplier_payments WHERE 
supplier_payments_code.supplier_payment_code_id=supplier_payments.supplier_payment_code_id
AND supplier_payments_code.farmer_id='$farmer_id'";
$results_py= mysql_query($sql_py) or die ("Error $sql_py.".mysql_error());	 
$rows_py=mysql_fetch_object($results_py);

echo number_format($sup_payment=$rows_py->ttl_paymnt,2);
 

 ?></td>
 
 <td align="right"><strong>
 <?php 
 echo number_format($bal=$grn_amount-$adv_payment-$sup_payment,2);
 
 
 $grnd_bal=$grnd_bal+$bal;
 
 
 ?>
 
 </strong>
 </td>
 
 
 </tr>
 
 <?php 
}


 
 ?>

 <tr bgcolor="#ccc" height="30">
 <td><strong>Totals</strong></td>
 <td></td>


 <td><?php //echo  number_format($ttl_dr,2);?></td>
 <td><?php //echo  number_format($ttl_cr,2);?></td>
 <td><?php //echo  number_format($bal,2);?></td>
 <td><?php //echo  number_format($bal,2);?></td>
 <td><?php //echo  number_format($bal,2);?></td>
 <td><?php //echo  number_format($bal,2);?></td>
 <td><?php //echo  number_format($bal,2);?></td>
 
 
 </tr>

 </table>

  




<script type="text/javascript">
/*   Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  ); */
  
  
  </script>


