<?php 

	
/* 	$id=$_GET['account_type_id'];
	
	
$sqlemp_det="select * from account_type where account_type_id='$id'";
$resultsemp_det= mysql_query($sqlemp_det) or die ("Error $sqlemp_det.".mysql_error());
$rowsemp_det=mysql_fetch_object($resultsemp_det); */

include ('top_grid_includes.php');

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

<!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align=""><font size="">

<strong>Account Code : </strong><?php echo $debit_account_name=$rowsemp_det->account_code;?>

<strong>Account Name : 	</strong><?php echo $rowsemp_det->account_type_name;?>
	</td>
	</tr>-->
	
	
	</table>
<table width="100%" border="0" align="center" class="display nowrap" id="example" style="margin:auto;">

<thead>	
 <tr  style="background:url(images/description.gif);" height="30" >
 <td width="5%"><strong>No</strong></td>
  <td width="5%"><strong>Customer Number</strong></td>
 <td width="15%"><strong>Customer Name</strong></td>
  <td width="10%"><strong>Invoice No</strong></td>
 <td width="10%"><strong>Amount</strong></td>
 <td width="10%"><strong>Date</strong></td>
 <td width="10%"><strong>Balance</strong></td>
  <td width="10%" align="center"><strong>0-30 days</strong></td>
 <td width="10%" align="center"><strong>31-60 days</strong></td>
 <td width="10%" align="center"><strong>61-90 days</strong></td>
 <td width="10%" align="center"><strong>91-180 days</strong></td>
 <td width="10%" align="center"><strong>Over 180 days</strong></td>


 
 
 
 </tr>
 
 </thead>
 <?php 
 
 //cost of sales income
$queryop="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id order by customer.customer_name asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());

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



$job_card_id=$rows->sales_id;
 
 ?>
 
 
 

 
 <td width=""><?php echo $count=$count+1; ?></td>
  <td><?php echo $rows->customer_code; 
  

  
  
  ?></td>
  
  
  
  
  
  
 <td width="" align=""><?php 
echo $rows->customer_name;

 ?></td>
  <td align="right"><?php echo $rows->invoice_no;?></td>
 <td align=""><?php include('invoice_value.php') ?></td>
  <td align="center">
 <?php 
echo $sale_date=$rows->sale_date;
 
 ?>

 </td>

<td>
 
 <?php 
$ttl_loan=$task_totals;
$queryopg2sr = "SELECT SUM(amount_received) as int_paid FROM invoice_payments where sales_id='$job_card_id'";
$resultsg2sr= mysql_query($queryopg2sr) or die ("Error $queryopg2s.".mysql_error());	
$rowsg2sr=mysql_fetch_object($resultsg2sr); 

number_format($ttl_repayment_paid=$rowsg2sr->int_paid,2);


echo number_format($loan_balance=$task_totals-$ttl_repayment_paid,2);


 $curr_date=date('Y-m-d', time());

$end_repayment_date=$sale_date;


 
    $date_to = strtotime($curr_date);
	$date_from = strtotime($end_repayment_date);
	
	$durationrrr2 = $date_to - $date_from;
	//echo '</br>';
number_format($progress_dur=$durationrrr2/60/60/24);
	

 $ttl_loan_balance=$ttl_loan_balance+$loan_balance;

 
 ?>


</td>
 
 
 
 
 

 
 <td align="">
 <?php 

	
	
	if ($progress_dur<=30 && $progress_dur>0)
	{
		
echo number_format($loan_balance_30=$ttl_loan-$ttl_repayment_paid,2);	
 $ttl_30=$ttl_30+$loan_balance_30;		
	}


 
 ?>
 
 
 
 </td>
 <td align="">
 
 <?php
 	if ($progress_dur<=60 && $progress_dur>30)
	{
		
echo number_format($loan_balance_60=$ttl_loan-$ttl_repayment_paid,2);	

 $ttl_60=$ttl_60+$loan_balance_60;	
		
	}

 
 ?>
 
 
 
 
 
 </td>
 <td align=""> <?php
 	if ($progress_dur<=90 && $progress_dur>60)
	{
		
echo number_format($loan_balance_90=$ttl_loan-$ttl_repayment_paid,2);	

 $ttl_90=$ttl_90+$loan_balance_90;	
		
	}

 
 ?></td>
 <td align=""><?php
 	if ($progress_dur<=180 && $progress_dur>90)
	{
		
echo number_format($loan_balance_180=$ttl_loan-$ttl_repayment_paid,2);	

$ttl_180=$ttl_180+$loan_balance_180;
		
	}

 
 ?></td>
 <td align=""><?php
 	if ($progress_dur>180)
	{
		
echo number_format($loan_balance_over=$ttl_loan-$ttl_repayment_paid,2);	

$ttl_over=$ttl_over+$loan_balance_over;
		
	}

 
 ?></td>
 


 
 
 
 </tr>
 
 <?php 
}


 ?>
 <tr>
 <td><strong>Totals</strong></td>

 <td align="right"></td>
 <td align="right"></td>
 <td align="right"></td>
 <td align="right"></td>
 <td align="right"></td>
 <td align=""><strong><font size="+1"><span style="text-decoration-line:underline ;
  text-decoration-style:double ; font-size:16px;"><?php echo number_format($ttl_loan_balance,2); ?></span></font></strong></td>
 <td align=""><strong><font size="+1"><span style="text-decoration-line:underline ;
  text-decoration-style:double; font-size:16px;"><?php echo number_format($ttl_30,2); ?></span></font></strong></td>
   <td align=""><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_60,2); ?></span></font></strong></td>
  
     <td align=""><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_90,2); ?></span></font></strong></td>
  
     <td align=""><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_180,2); ?></span></font></strong></td>
  
     <td align=""><strong><font size="+1"><span style="text-decoration-line: underline;
  text-decoration-style: double; font-size:16px;"><?php echo number_format( $ttl_over,2); ?></span></font></strong></td>

 </tr>
 
 

 </table>
 </td></tr>
 </table>
 </table>
  
  <br/>
  
</br></br>



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
  );
   */
  
  </script>


<?php 
//}

?>