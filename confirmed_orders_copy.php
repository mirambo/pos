<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
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




<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: List of Generated and Confirmed Purchase Orders</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
	<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['cancelorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Purchase Order Canceled Successfully!!</font></strong></p></div>';

if ($_GET['activateorderconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Order Activated Successfully!!</font></strong></p></div>';
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
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
  
    <tr style="background:url(images/description.gif);" height="30" >
    <td width="400"><div align="center"><strong>Purchase Order Number</strong></td>
    <td width="300"><div align="center"><strong>Date Ordered</strong></td>
	<td width="600"><div align="center"><strong>Supplier</strong></td>
	<td width="400"><div align="center"><strong>Who Generated</strong></td>
	<td width="250"><div align="center"><strong>Order Status</strong></td>
	<td width="250"><div align="center"><strong>Cancel P.O</strong></td>
	<!--<td width="200"><div align="center"><strong>Receive</strong></td>
   <td width="100" ><div align="center"><strong>Cancel</strong></td>
     <td width="100"><div align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php
 $grnd_ttl=0;
 // $lpo_amnt=0; 
 if (!isset($_POST['generate']))
{
 
$sql="select order_code_get.lpo_no,order_code_get.date_generated,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];
if ($supplier!='0' && $date_from=='' && $date_to=='')
{
$sql="select order_code_get.lpo_no,order_code_get.date_generated,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' and order_code_get.supplier_id='$supplier' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($supplier=='0' && $date_from!='' && $date_to!='')
{
$sql="select order_code_get.lpo_no,order_code_get.date_generated,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' AND order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif($supplier!='0' && $date_from!='' && $date_to!='')
{
$sql="select order_code_get.lpo_no,order_code_get.date_generated,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0' AND order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' AND order_code_get.supplier_id='$supplier' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="select order_code_get.lpo_no,order_code_get.date_generated,order_code_get.shipper_id,order_code_get.supplier_id,order_code_get.order_code_id,order_code_get.freight_charge,order_code_get.comments,
order_code_get.currency,order_code_get.curr_rate,currency.curr_name,mop.mop_name,shippers.shipper_name,order_code_get.supplier_id,suppliers.supplier_name
FROM mop,shippers,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND shippers.shipper_id=order_code_get.shipper_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='0'";
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
 
 $order_code=$rows->order_code_id;
 ?>
  
    <td><?php echo $rows->lpo_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td><?php echo $rows->emp_firstname.' '. $rows->emp_lastname;?></td>
	
	<td align="center">
	<?php
	$status=$rows->status;
	$amount_paid=$rows->paid_amount;
	
	if ($status==2 && $amount_paid=='')
	
	{
	
	echo "<font color='#ff0000'>Canceled..</font>";
	
	}
	
	elseif ($status==1 && $amount_paid=='')
	
	{
	echo "<font color='#0000ff'>Confirmed..</font>";
	
	}
	
	elseif ($status==1 && $amount_paid!='') 
	{
	
	echo "<font color='#33CC00'>Processed..</font>";
	
	
	}
	
	
	
	?>
	
	
	
	</td>
	<td align="center">
	<?php
	$status=$rows->status;
	$amount_paid=$rows->paid_amount;
	
	
if ($status==1 && $amount_paid=='' )
	
	{ ?>
	
	<a href="cancel_order_reason.php?lpo_id=<?php echo $rows->lpo_id;?>&order_code=<?php echo $rows->order_code; ?>&lpo_no=<?php echo $rows->lpo_no;  ?>" style="color:#000099; font-weight:bold;" onClick="return confirmCancel();">Cancel</a>
	
	<?php
	}
	
	elseif ($status==1 && $amount_paid!='' )
	{?>
	
	-
	
	<?php 
	}
	
	else
	{?>
	
	<a href="activate_order.php?lpo_id=<?php echo $rows->lpo_id;?>&order_code=<?php echo $rows->order_code; ?>" style="color:#00CC33; font-weight:bold;" onClick="return confirmActivate();"></a>
	
	<?php 
	}
	
	
	
	?>
	
	
	
	</td>
  
    </tr>
  <?php 
  
  }
  
  
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