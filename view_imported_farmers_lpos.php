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
		
		<h3>::List of All Imported Farmers GRNs</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
<?php 

 include ('top_grid_includes.php'); 
?>			
			
			
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

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	<tr bgcolor="#FFFFCC">
	<td colspan="11" align="center"><strong>Search Purchase Order : By Supplier Name:</strong>
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
	</table>

<table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>
	
   <tr style="background:url(images/description.gif);" height="30" >
    <td width="5%"><div align="center"><strong>No.</strong></td>
    <td width="5%"><div align="center"><strong>GRN No.</strong></td>
    <td width="10%"><div align="center"><strong>Date Imported</strong></td>
    <td width="14%"><div align="center"><strong>Imported By</strong></td>

	<td width="300" ><div align="center"><strong>Farmers</strong></td>
	<td width="300" ><div align="center"><strong>Total Amount</strong></td>
		<td width="300" ><div align="center"><strong>View Transactions</strong></td>
	 
	 <?php 
if ($user_group_id==15)
{
?>
	 	<td width="300"><div align="center"><strong>Cancel</strong></td>
<?php 
}

?>	
    </tr>
	
</thead>
  
  <?php
  $grnd_ttl=0;
 // $lpo_amnt=0; 
 if (!isset($_POST['generate']))
{
 
$sql="SELECT * FROM imported_farmers_grn_code order by imported_farmers_grn_code_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{


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
 
$order_code=$rows->imported_farmers_grn_code_id;
 ?>
  
    <td><?php echo $count=$count+1;?></td>
    <td><?php echo $rows->lpo_no;?></td>
    <td><?php echo $rows->date_imported;?></td>
 
    <td align="center"><?php $gen_by=$rows->imported_by;
	$sqlst="SELECT * FROM  users where user_id='$gen_by'";
$resultst= mysql_query($sqlst) or die ("Error $sqlst.".mysql_error());	
$rowst=mysql_fetch_object($resultst);	
echo $rowst->f_name;
	
	
	?></td>
	   <td align="center"><?php 
	   
	   
$sql_cn="SELECT COUNT(*) as ttl_cnt FROM order_code_get WHERE imported_farmers_grn_code_id='$order_code'";
$results_cn= mysql_query($sql_cn) or die ("Error $sql_cn.".mysql_error());	
$rows_cn=mysql_fetch_object($results_cn);

echo $rows_cn->ttl_cnt;
	   
	   
	   
	   
	   ?></td>
	
	
	<td align="center"><?php 
	
	$sql_cnt="SELECT SUM(quantity*vendor_prc) as ttl_order_value FROM order_code_get,purchase_order WHERE 
	order_code_get.order_code_id=purchase_order.order_code AND order_code_get.imported_farmers_grn_code_id='$order_code'";
$results_cnt= mysql_query($sql_cnt) or die ("Error $sql_cnt.".mysql_error());	
$rows_cnt=mysql_fetch_object($results_cnt);

echo number_format($rows_cnt->ttl_order_value,2);
	
	?></a></td>
	<td align="center"><!--<a href="begin_order.php?order_code=<?php echo $rows->order_code_id;?>">View Transactions</a>--></td>
	
		 <?php 
if ($user_group_id==15)
{
?>
	
	
	 <td align="center"><!--<a href="cancel_order_reason.php?order_code=<?php echo $rows->order_code_id; ?>" style="color:#000099; font-weight:bold;" onClick="return confirmCancel();">Cancel</a>--></td>
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
  
  </table>
  <table>
   <tr height="30" bgcolor="#FFFFCC">
    <td width="200" colspan="2"><div align="center"><strong></strong></td>
    
    <td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
    <td width="300"><div align="center"><strong></strong></td>
	

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