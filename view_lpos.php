<?php include('Connections/fundmaster.php'); ?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
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
		
		<h3>::List of All LPO's Generated</h3>
         
				
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
<strong>Or By Date</strong>
						<strong>From : </strong><input type="text" name="from" size="30" id="from" readonly="readonly" /><strong>To:</strong>
		<input type="text" name="to" size="25" id="to" readonly="readonly" />
			<input type="submit" name="generate" value="Generate">
											

					
	
    </tr>
<tr bgcolor="#FFFFCC">
	
   
    <td colspan="13" height="30" align="right"><font size="+1">
	
	<?php 
	if (isset($_POST['generate']))
	{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];
	}
	?>
	
	<a href="print_lpos.php?supplier=<?php echo $supplier;?>&date_from=<?php echo $date_from;  ?>&date_to=<?php echo $date_to ?>" target="_blank" title="Export To Word"><strong>Print</strong></a>
	
	
	
	</td>
	</tr>	
	
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="5%"><div align="center"><strong>LPO No.</strong></td>
    <td width="5%"><div align="center"><strong>Ref No.</strong></td>
    <td width="10%"><div align="center"><strong>Date Generated</strong></td>
    <td width="14%"><div align="center"><strong>Generated By</strong></td>
	<td width="15%"><div align="center"><strong>Supplier Name</strong></td>
	<td width="350"><div align="center"><strong>Amount Ordered (Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Ordered (Tshs)</strong></td>
	<td width="300" ><div align="center"><strong>View Transactions</strong></td>
	<td width="300" ><div align="center"><strong>Status</strong></td>
	 
	 <?php 
if ($user_group_id==15)
{
?>
	 	<td width="300"><div align="center"><strong>Cancel</strong></td>
<?php 
}

?>	
    </tr>
  
  <?php
  $grnd_ttl=0;
 // $lpo_amnt=0; 
 if (!isset($_POST['generate']))
{
 
$sql="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id  AND suppliers.sup_type='S'
order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];
if ($supplier!='0' && $date_from=='' && $date_to=='')
{
$sql="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' 
and order_code_get.supplier_id='$supplier' AND suppliers.sup_type='S' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif($supplier=='0' && $date_from!='' && $date_to!='')
{
$sql="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' AND 
order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' AND suppliers.sup_type='S' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif($supplier!='0' && $date_from!='' && $date_to!='')
{
$sql="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id and order_code_get.status='2' AND order_code_get.date_generated BETWEEN '$date_from' AND '$date_to' AND order_code_get.supplier_id='$supplier' AND suppliers.sup_type='S' order by order_code_get.order_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{
$sql="select * FROM mop,currency,suppliers,order_code_get WHERE order_code_get.mop_id=mop.mop_id AND 
order_code_get.currency=currency.curr_id AND order_code_get.supplier_id=suppliers.supplier_id AND suppliers.sup_type='S' tatus='2' 
order by order_code_get.order_code_id desc";
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
    <td><?php echo $rows->ref_no;?></td>
    <td align="center"><?php echo $rows->date_generated;?></td>
    <td align="center"><?php $gen_by=$rows->user_id;
	$sqlst="SELECT * FROM  users where user_id='$gen_by'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	
	
	?></td>
	<td><?php echo $rows->supplier_name;?></td>
	<td align="right">
	<?php
	echo $rows->curr_name; 
	include ('lpo_value.php');

	?>
	
	</td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);
	//echo number_format($rows->curr_rate,2);
	
	?></strong></td>
	<td align="center"><a href="begin_order.php?order_code=<?php echo $rows->order_code_id;?>">View Transactions</a></td>
	<td align="center"><?php $status=$rows->status;
	
	
	if($status==0)
	{
		echo "<strong><font color='#000080'>Pending Approval..</font></strong>";
	}
	elseif($status==2)
	{
		
		echo "<strong><font color='#228B22'>Approved</font></strong>";
	}
	elseif($status==1)
	{
		
		echo "<strong><font color='#ff0000'>Rejected</font></strong>";
		
	}
	
		elseif($status==3)
	{
		
		echo "<strong><font color='#ff0000'>Invoice Received</font></strong>";
		
	}
	
	?></a></td>
	
		 <?php 
if ($user_group_id==15)
{
?>
	
	
	 <td align="center"><a href="cancel_order_reason.php?order_code=<?php echo $rows->order_code_id; ?>" style="color:#000099; font-weight:bold;" onClick="return confirmCancel();">Cancel</a></td>
<?php
}

 ?>	
  
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
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="300"><div align="center"><strong>Grand Total</strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_inv,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1"><?php 
	//echo number_format($grand_ttl_rec,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="right"><strong><font size="+1" color="#ff0000;"><?php 
	echo number_format($lpo_grnd_ttl_kshs,2);
	
	
	?></font></strong></td>
	<td width="200"><div align="center"><strong><font size="+1" color="#ff0000;"><?php 
	//echo number_format($grnd_ttl_amnt_paid_kshs,2);
	
	
	?></font></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
     <td width="200" ><div align="center"><strong></strong></td>
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