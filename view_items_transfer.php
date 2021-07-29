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

function confirmCancel()
{
    return confirm("Are you sure you want to cancel this order?");
}

function confirmActivate()
{
    return confirm("Are you sure you want to activate this order?");
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
		
		
		
	<?php require_once('includes/items_transfer_submenu.php');  ?>
		
		<h3>::List of All Items Transfer </h3>
         
				
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

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="10" align="center"><strong>Search Purchase Order : By Supplier Name:</strong>
	<select name="supplier">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from suppliers";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->supplier_id; ?>"><?php echo $rows1->supplier_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  
								  
								  
								  </select>
	<?php
if ($incharge==1)
{

	?>
	
<strong>Or By Shop </strong>
	
	
	
	<select name="shop_id">
	<option value="0">-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from shop order by shop_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->shop_id; ?>"><?php echo $rows1->shop_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
								  
								  <?php 
								  
								 } 
								  ?>							  
								  
								  
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="20" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="20" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
<tr bgcolor="#FFFFCC">
	
   
    <td colspan="13" height="30" align="right"><font size="+1">
	
	<?php 
	if (isset($_POST['generate']))
	{
	$shop_id=$_POST['shop_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];

	}
	?>
	
<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_lpo_pending.php?shop_id=<?php echo $shop_id ?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_to ?>&supplier=<?php echo $supplier ?>">Print</a>						  

<a  style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_lpo_pending_excel.php?shop_id=<?php echo $shop_id ?>&date_from=<?php echo $date_from?>&date_to=<?php echo $date_to ?>&supplier=<?php echo $supplier ?>">Export To Excel</a>			
	
	</td>
	</tr>	
	
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="200"><div align="center"><strong>Batch Number</strong></td>
    <td width="300"><div align="center"><strong>Date Generated</strong></td>
    <td width="300"><div align="center"><strong>Transfer From</strong></td>
	<td width="20%"><div align="center"><strong>Transfer To</strong></td>
	<td width="350"><div align="center"><strong>Comments / Memo</strong></td>
	<!--<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Ordered (SSP)</strong></td>-->
	 <td width="300" ><div align="center"><strong>View Transactions</strong></td>
	 	<!--<td width="300"><div align="center"><strong>Cancel</strong></td>
	 <td width="300"><div align="center"><strong>Amount Paid (Kshs)</strong></td>
	<td width="300"><div align="center"><strong>Balance (Kshs)</strong></td>
	<td width="400"><div align="center"><strong>Clear Balance</strong></td>
   
   <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php
  //$grnd_ttl=0;
 // $lpo_amnt=0; 
  $lpo_amnt=0; 
if ($incharge==14)
{ 
 


if (!isset($_POST['generate']))
{

$sql="select * FROM transfer_items_code order by date_generated desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['supplier'];
$shop_id=$_POST['shop_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

$querydc= "SELECT * FROM currency,suppliers,order_code_get";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "order_code_get.supplier_id='$supplier'";
	
    }
	

	if($shop_id!=0) 
	{
	
    $conditions[] = " order_code_get.shop_id='$shop_id'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " order_code_get.date_generated >='$date_from' AND order_code_get.date_generated<='$date_to' ";
    }
	
	
    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
    }
	else
	{	
	
$querydc="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

}

//separate shops
else
{




if (!isset($_POST['generate']))
{

$sql="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id AND order_code_get.shop_id='$incharge' and order_code_get.status='0' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$supplier=$_POST['supplier'];
$shop_id=$_POST['shop_id'];
$date_from=$_POST['from'];
$date_to=$_POST['to'];

$querydc= "SELECT * FROM currency,suppliers,order_code_get";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "order_code_get.supplier_id='$supplier'";
	
    }
	

	if($shop_id!=0) 
	{
	
    $conditions[] = " order_code_get.shop_id='$shop_id'";
	  
    }
	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " order_code_get.date_generated >='$date_from' AND order_code_get.date_generated<='$date_to' ";
    }
	
	
    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' AND order_code_get.shop_id='$incharge' and mop_id!='dr' 
order by order_code_get.order_code_id desc";
    }
	else
	{	
	
$querydc="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and mop_id!='dr' 
AND order_code_get.shop_id='$incharge' order by order_code_get.order_code_id desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}


}











if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
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
 
$order_code=$rows->transfer_item_code_id;

 ?>
  
    <td><?php echo $rows->transfer_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
    <td align=""><?php $shop_id=$rows->shop_id;
	
	$transfer_from=$rows->transfer_from;
	
	//account from
$sqlrec1="SELECT * FROM account WHERE account_id='$transfer_from'";
$resultsrec1= mysql_query($sqlrec1) or die ("Error $sqlrec1.".mysql_error());	
$rowsrec1=mysql_fetch_object($resultsrec1);
echo $acc_name_from=$rowsrec1->account_name;

	

	
	
	?></td>
	<td><?php 
	
$transfer_to=$rows->transfer_to;
	
	
//account to
$sqlrec2="SELECT * FROM account WHERE account_id='$transfer_to'";
$resultsrec2= mysql_query($sqlrec2) or die ("Error $sqlrec2.".mysql_error());	
$rowsrec2=mysql_fetch_object($resultsrec2);
echo $acc_name_to=$rowsrec2->account_name;	
	
	
	
	
	
	
	?></td>
	<td align="right">
	<?php
	echo $rows->comments.' ';
	//include ('lpo_value.php');

	?>
	
	</td>

	<!--<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>-->
	<td align="center"><a href="transfer_items.php?order_code=<?php echo $order_code;?>">View Transactions</a></td>
	<!-- <td align="center"><a href="cancel_order_reason.php?order_code=<?php echo $rows->order_code_id; ?>" style="color:#000099; font-weight:bold;" onClick="return confirmCancel();"><!--Cancel--></a></td>
	
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
	
	
	
  
    </tr>
  <?php 
  $lpo_ttl=$rows->lpo_amount;
 $lpo_grnd_ttl_kshs=$lpo_grnd_ttl_kshs+$lpo_ttl_kshs;
 $grnd_ttl_amnt_paid_kshs=$grnd_ttl_amnt_paid_kshs+$lpo_amount_paid_kshs;
  //$grand_ttl_bal=$grand_ttl_bal+$bal;
  //$grand_ttl_rec=$grand_ttl_rec+$ttlrec;
  }
  ?>
   <tr height="30" bgcolor="#FFFFCC">

    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong><!--Grand Total--></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($lpo_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($grnd_ttl_amnt_paid_kshs,2);
	
	
	?></font></strong></td>

  <!-- <td width="100"><div align="center"><strong>Delete</strong></td>-->
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