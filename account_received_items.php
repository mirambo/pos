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

function confirmReceive()
{
    return confirm("Are you sure you want to receive stock before paying for them?");
}


</script>


<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/post_accounts_submenu.php'); ?>
<?php //require_once('includes/lposubmenu.php');  ?>
		
		<h3>:: Post Received Items To Accounts</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
<form name="filter" method="post" action=""> 			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
	<?php

if ($_GET['addrecprodconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Product added successfully to the inventory!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";


?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="8" align="center"><strong>Search Purchase Order : By Supplier Name:</strong>
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
    <td width="50"><div align="center"><strong>No.</strong></td>
    <td width="200"><div align="center"><strong>LPO No.</strong></td>
    <td width="200"><div align="center"><strong>GRN No.</strong></td>
   <td width="300"><div align="center"><strong>Date Received</strong></td>
	<td width="300"><div align="center"><strong>Supplier</strong></td>
		<!--<td width="350"><div align="center"><strong>Amount Ordered (Other Currencies)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	<td width="300"><div align="center"><strong>Amount Ordered</strong></td>-->
	<td width="300"><div align="center"><strong>Received By</strong></td>
	<td width="300"><div align="center"><strong>Post To Accounts</strong></td>
   <td width="150" style="display:none;"><div align="center"><strong>Return</strong></td>

    </tr>
  
  <?php 
  
if (!isset($_POST['generate']))
{
  
$sql="select * FROM received_stock_code,order_code_get,suppliers WHERE 
order_code_get.supplier_id=Suppliers.supplier_id AND received_stock_code.order_code_id=order_code_get.order_code_id 
order by received_stock_code.stock_code_id desc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$date_from=$_POST['from'];
$date_to=$_POST['to'];
$supplier=$_POST['supplier'];

$querydc= "SELECT * FROM currency,suppliers,order_code_get";
    $conditions = array();
    if($supplier!=0) 
	
	{
	
    $conditions[] = "order_code_get.supplier_id='$supplier'";
	
    }
	

	

	if($date_from!='' && $date_to!='' ) {
	
      $conditions[] = " order_code_get.date_generated >='$date_from' AND order_code_get.date_generated<='$date_to' ";
    }
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." AND order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id order by order_code_get.order_code_id desc";
    }
	else
	{	
	
$querydc="select * FROM currency,suppliers,order_code_get WHERE order_code_get.currency=currency.curr_id 
AND order_code_get.supplier_id=suppliers.supplier_id order by order_code_get.order_code_id desc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

if (mysql_num_rows($resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($resultsdc))
							  { 

	
	$stock_code_id=$rows->stock_code_id;
	
	//Quantity Received
	$sqlrec="select * from account_received_stock_code where stock_code_id='$stock_code_id'";
	$resultsrec=mysql_query($sqlrec) or die ("Error : $sqlrec.".mysql_error());
	$rowsrec=mysql_num_rows($resultsrec);
	
				  
						  
if ($rowsrec>0)	
{
	
	
}	
else
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
 
$stock_code_id=$rows->stock_code_id;
 ?>
  
    <td align="center"><?php echo $count=$count+1;?></td>
    <td align="center"><?php echo $lpo_no=$rows->lpo_no;?></td>
    <td align="center"><?php echo $grn_no=$rows->delivery_note_no;?></td>
    <td align="center"><?php echo $rows->delivery_date;?></td>
	<td><a href="supplier_statement.php?supplier_id=<?php echo $rows->supplier_id; ?>"><?php echo $rows->supplier_name;?></a></td>
	<!--<td align="right">
	<?php
	
	echo $stock_code_id;
	//echo $rows->curr_name; 
	//include ('delivery_value.php');

	?>
	
	</td>

	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	<td align="right"><strong><?php 
	echo number_format($lpo_ttl_kshs=$curr_rate*$lpo_ttl,2);

	
	?></strong></td>-->
	
	
	
	
	<td align="center"><?php $received_by=$rows->user_id;
	
	$sqlsp="select * from users where user_id='$received_by'";
$resultssp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultssp);

echo $rowssp->f_name;
	
	
	
	
	?></a></td>
	<td align="center">
	
	
	
	<?php 
	
	
	
	

	
	if ($quant_ordered==$quant_rec)
	{
	//echo "Received All";
	?>
	
	<a href="account_receive_stock_to_warehouse.php?stock_code_id=<?php echo $stock_code_id; ?>"><font color="#000000">Post To Accounts</font></a>
	<?php
	}
	elseif($quant_ordered > $quant_rec && $quant_rec!='')
	{
	?>
	<a href="receive_stock_to_warehouse.php?lpo_no=<?php echo $lpo_no; ?>&supplier_id=<?php echo $rows->supplier_id; ?>&order_code_id=<?php echo $rows->order_code_id; ?>&qnty_ordered=<?php echo  $quant_ordered; ?>&purchase_order_id=<?php  echo $rows->purchase_order_id; ?>"><font color="#0066CC">Receive Remaining Stock</font></a>
	<?php 
	
	}
	
	else
	{
	
	?>
	
	<!--<a href="receive_stock_to_warehouse.php?lpo_no=<?php echo $lpo_no; ?>&supplier_id=<?php echo $rows->supplier_id; ?>&order_code=<?php echo $rows->order_code; ?>&qnty_ordered=<?php echo $quant_ordered; ?>&purchase_order_id=<?php  echo $rows->purchase_order_id; ?>"><font color="#ff0000">Receive Stock</font></a>-->
	<a href="receive_stock_to_warehouse.php?lpo_no=<?php echo $lpo_no; ?>&supplier_id=<?php echo $rows->supplier_id; ?>&order_code_id=<?php echo $rows->order_code_id; ?>&qnty_ordered=<?php echo $quant_ordered; ?>"><font color="#ff0000">Receive Stock</font></a>
	<?php
	
	}

	
	?>
	
	
	</td>
	
 
    </tr>
  <?php

$grnt_cost_kshs=$grnt_cost_kshs+$cost_kshs; 
$grnd_lpo_amount_paid_kshs=$grnd_lpo_amount_paid_kshs+$lpo_amount_paid_kshs;
$grnd_stock_bal=$grnd_stock_bal+$stock_bal;
  
  }
							  }
  
  ?>
  
  <!--<tr bgcolor="#FFFFCC" height="40">
    <td width="200"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	<td width="600"><div align="center"><strong>Grand Totals (Kshs.)</strong></td>
		<td width="250"><div align="right"><strong><?php echo number_format($ttl_lpo_amnt,2);  ?></strong></td>

	<td width="250"><div align="right"><strong><?php //echo number_format($grnd_lpo_amount_paid_kshs,2);  ?></strong></td>



    </tr>-->
  
  <?php 
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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