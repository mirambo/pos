<?php 
include('Connections/fundmaster.php'); 
$customer_name=$_POST['sales_rep']; 
$tab=$_GET['tab'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

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
</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
 <link rel="stylesheet" href="css/style_tab.css">
<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/sales_rep_debtors_aging_submenu.php');  ?>
		
		<h3>:: Debtors Aging Report</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">

    	<form name="search" action="" method="post">
	<p align="center">Sales Rep Name : 
	<select name="sales_rep"><option value="">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from users,user_group where users.user_group_id=user_group.user_group_id 
								  and users.user_group_id='35'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
	<input type="submit" name="generate" value="Search">
	
	<span style="float:lefrt; margin-left:100px;"><a target="_blank" href="print_list_sales_rep_debtors_aging_report.php?tab=<?php echo $tab; ?>&customer_name=<?php echo $customer_name; ?>">Print</a></span>
	</p>
	
	
 <div class="tabs">
  

  
  <?php 
  if ($_GET['tab']==1)
  {
  
  ?>

  <input class="input" name="tabs" type="radio" id="tab-1" checked="checked"/>
  <label class="label" style="display:none; for="tab-1"></label>
  <div class="panel">
    <h1>0 - 30 days</h1>

	
	<table width="80%" border="1" class="table" align="center">
					<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
			
			
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}




if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days<=30 )
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>
<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>
			

	
	
</div>

<?php 

}

?>















  <?php 
  if ($_GET['tab']==2)
  {
  
  ?>

  <input class="input" name="tabs" type="radio" id="tab-2" checked="checked"/>
  <label class="label" style="display:none; for="tab-2">31-45 days</label>
  <div class="panel">
    <h1>31-45 days</h1>
<table width="80%" border="1" class="table" align="center">
					<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$count=0;
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}		
if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days>=31 && $due_days<=45 )
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>

<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>
	
	
	</div>
	
	
	<?php 
	
  }
	
	?> 	
	
	
	  <?php 
  if ($_GET['tab']==3)
  {
  
  ?>
	
	
	
	
  <input class="input" name="tabs" type="radio" id="tab-3" checked="checked"/>
  <label class="label" style="display:none; for="tab-3">46-60 days</label>
  <div class="panel">
    <h1>46-60 days</h1>
	
<table width="80%" border="1" class="table" align="center">
					<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$count=0;
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}	
if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days>=46 && $due_days<=60 )
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>

<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>	
	
	
	
	
     </div>
	 
		<?php 
	
  }
	
	?>  
	 
	  <?php 
  if ($_GET['tab']==4)
  {
  
  ?> 
	 <input class="input" name="tabs" type="radio" id="tab-4" checked="checked"/>
  <label class="label" style="display:none; for="tab-4">61 - 90 days</label>
  <div class="panel">
    <h1>61 - 90 days</h1>
	
<table width="80%" border="1" class="table" align="center">
					<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$count=0;
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}		
if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days>=61 && $due_days<=90 )
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>

<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>	
	
	
	
	
     </div>
	 
	 	<?php 
	
  }
	
	?> 
	 
	 
  <?php 
  if ($_GET['tab']==5)
  {
  
  ?>	 
	 
	 
	  <input class="input" name="tabs" type="radio" id="tab-5" checked="checked"/>
  <label class="label" style="display:none; for="tab-5">91 - 120 days</label>
  <div class="panel">
    <h1>91 - 120 days</h1>
	
<table width="80%" border="1" class="table" align="center">
<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$count=0;
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}		
if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days>=91 && $due_days<=120 )
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>

<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>	
	
	
	
	
     </div>
	 
		<?php 
	
  }
	
	?>  
	 
  <?php 
  if ($_GET['tab']==6)
  {
  
  ?>	 
<input class="input" name="tabs" type="radio" id="tab-6" checked="checked"/>
  <label class="label" style="display:none; style="display:none;" for="tab-6">Above 120 days</label>
  <div class="panel">
    <h1>Above 120 days</h1>
	
<table width="80%" border="1" class="table" align="center">
<tr bgcolor="#ffffcc" height="30">

					<td width="5%" align="center"><strong>No.</strong></td>
					<td width="30%" align="center"><strong>Customer Name</strong> </td>
					<td width="30%" align="center"><strong>Sales Rep</strong> </td>
					<td width="15%" align="center"><strong>Sale Date</strong> </td>
					<td width="10%" align="center"><strong>Due Days</strong> </td>
					<td width="10%" align="center"><strong>Invoice No</strong></td>
					<td width="15%" align="center"><strong>Invoice</strong> </td>
					<td width="15%" align="center"><strong>Paid</strong> </td>
					<td width="20%" align="center"><strong>Balance</strong></td>

					
				
	
					
					</tr>

			<?php 
			$count=0;
			$region_ttl=0;
			$ttl_rec=0;
			$ttl_bal=0;
if (!isset($_POST['generate']))		
{			

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());		
}
else
{
 

 if ($customer_name!='')
 {

$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' and sales.sales_rep='$customer_name' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	 
	 
 }	
else
{
	
$sqlrec="SELECT * FROM sales,customer where sales.customer_id=customer.customer_id 
and sales.canceled_status='0' and sales.sale_type='cr' order by sales.sale_date ASC";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
	
}	
	
	
	
}		
if (mysql_num_rows($resultsrec)>0)
{
	 $RowCounter=0;
	while ($rowsqt=mysql_fetch_object($resultsrec))
	{
		
		                     

		
$job_card_id=$rowsqt->sales_id;	

?>
<span style="display:none;"><?php include ('invoice_value.php'); ?></span>
<?php

$task_totals;

//echo " - ";		
$sql2cc="SELECT * from invoice_payments where sales_id='$job_card_id'";
$results2cc= mysql_query($sql2cc) or die ("Error $sql2cc.".mysql_error());		
$rows2cc=mysql_fetch_object($results2cc);	

$amount_receivedx=$rows2cc->amount_received;

//echo " - ";	
$balx=number_format($task_totals-$amount_receivedx,2);


//echo "</br>";		

$sale_date=$rowsqt->sale_date;

$leo_date=date('Y-m-d', time());

$date1 = date_create($sale_date);
$date2 = date_create($leo_date);

//difference between two dates
$diff = date_diff($date1,$date2);

//count days
$due_days=$diff->format("%a");

if ($balx>0 && $due_days>=120)
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

<td><?php echo $count=$count+1; ?></td>
<td><?php $c_id=$rowsqt->customer_id; 



$sql2cc1="SELECT * from customer where customer_id='$c_id'";
$results2cc1= mysql_query($sql2cc1) or die ("Error $sql2cc1.".mysql_error());		
$rows2cc1=mysql_fetch_object($results2cc1);




?>
<a href="home.php?submission_period=submission_period&customer_id=<?php echo $c_id;?>" style="font-size:11px; font-weight:bold;"><?php echo $rows2cc1->customer_name;?></a>
</td>
<td><?php $sales_rep_id=$rowsqt->sales_rep; 



$sql2cc1x="SELECT * from users where user_id='$sales_rep_id'";
$results2cc1x= mysql_query($sql2cc1x) or die ("Error $sql2cc1x.".mysql_error());		
$rows2cc1x=mysql_fetch_object($results2cc1x);




?>
<?php echo $rows2cc1x->f_name;?>
</td>

<td align="center"><?php echo $rowsqt->sale_date;?></td>
<td><?php echo $due_days;?> days</td>
<td align="center"><?php //echo $rowsqt->invoice_no;?>

<a style="font-weight:bold; color:#000; text-decoration:none;" href="generate_invoice.php?sales_id=<?php echo $rowsqt->sales_id;?>">
	
	<?php echo $rowsqt->invoice_no;?></a>

</td>
<td align="right"><?php 

		
$curr_id=$rowsqt->currency;
$curr_rate=$rowsqt->curr_rate;
$vat=$rowsqt->vat; 
$job_card_id=$rowsqt->sales_id;	


// Task value
$task_totals=0;
$consumable=0;
$task_totals2=0;
$disc=0;
$disc_value=0;
$sqlts="SELECT * from sales_item where sales_id='$job_card_id'";
$resultsts= mysql_query($sqlts) or die ("Error $sqlts.".mysql_error());
if (mysql_num_rows($resultsts) > 0)
						  {
						  while ($rowsts=mysql_fetch_object($resultsts))
						  {
						$service_item_id=$rowsts->sales_id;
						  
$sqlx="SELECT * from sales_item where sales_item_id='$service_item_id'";
$resultsx=mysql_query($sqlx);
$rowsx=mysql_fetch_object($resultsx);
//echo "<i>".$rowsx->service_item_name .' - ';

						  
						  $quant=$rowsts->item_quantity;
						  $task_cost=$rowsts->item_cost*$quant;
						 $task_ttl_kshs=$task_cost;
						  
						  //cho "</i></br>";
						  $task_totals2=$task_totals2+$task_ttl_kshs;
						  
						  
						  $item_disc=$rowsts->shop_id;


$item_disc_value=$item_disc*$task_cost/100;


$disc_value=$disc_value+$item_disc_value;
						  
						  
						  
						  }
						  //echo $task_totals;
			
						  }
						  

//$disc_value=$discount_perc/100*$task_totals2;

$sub_ttl1=$task_totals2-$disc_value; 

if ($vat==1)
{


$vat_value=0.16*$sub_ttl1;
}

if ($vat==0)
{


$vat_value=0*$sub_ttl1;

} 

 number_format($vat_value,2);




//$sub_ttl_vat;



echo number_format($task_totals1=$sub_ttl1+$vat_value,2);

//echo "<span style='float:right; font-weight:bold;'>"; 
 
//echo number_format($task_totals,2); 

$region_ttl=$region_ttl+$task_totals1;

//echo "</span></br>";

//echo number_format($region_ttl,2); 








 ?></td>
 <td align="right"><?php 
 
 
 
		
		
	//$ttl_inv_paid=$rows->amount_received;	 
 
 echo number_format($amount_received=$rows2cc->amount_received,2); 
 
 
 $ttl_rec=$ttl_rec+$amount_received;
 ?>
 
 </td>
 <td align="right"><strong><?php echo number_format($bal=$task_totals1-$amount_received,2);  
 
 
 $ttl_bal=$ttl_bal+$bal;
 ?></strong></td>
</tr>
<?php 
}
else
{
	
	
}

	}
	
	?>
	
<tr>

<td colspan="6"><strong>Totals</strong></td>

<td align="right"><strong><?php echo number_format($region_ttl,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_rec,2); ?></strong></td>
<td align="right"><strong><?php echo  number_format($ttl_bal,2); ?></strong></td>



</tr>	
	
	<?php 
	
	
	
	
	
}			
			?>		
		
	
		
		
			</table>	
	
	
	
	
     </div>	 
	 
	 
	 
	<?php 
	
  }
	
	?> 
	 
	 
</form>	 
	 
	 
</div>
			
			
			
					
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