<?php include('Connections/fundmaster.php'); ?>


<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
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

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/financials_submenu.php');  ?>
		
		<h3>:: Income Statement / Trading Profit and Loss Account</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
  
   
 <form name="search" method="post" action="">
<table width="50%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	
	
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="20" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="20" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a target="_blank" style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_list_tpla.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>">Print</a>						  

<a style="float:right; margin-right:50px; font-weight:bold; font-size:13px; color:#000000" href="print_list_tpla_excel.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>">Export To Excel</a>						  
	
	
	</td>
	</tr>
	</table>
	
	
<table width="50%" border="0" align="center" style="margin:auto;" bgcolor="#fff" class="table">	
	<tr>
 <td colspan="9"> 
 <table border="1" width="100%">
 <tr height="40"><td colspan="2">INCOME</td></tr>
 <?php 
 
 //sales income
$queryop="select * FROM account_type where account_cat_id='7'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$ttl_amount=$rows2->ttl_amount;

if ($ttl_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ttl_amount,2);
 $ttl_sales=$ttl_sales+$ttl_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Sales  Income</strong></td><td align="right"><strong><?php echo number_format($ttl_sales,2); ?></strong></td></tr>
 
 
 <tr height="40"><td colspan="2">COST OF SALES</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='5' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$ttl_cos_amount=$rows2->ttl_amount;

if ($ttl_cos_amount==0)
{
	
	
}

else
	
{
 
 ?>
 
 
 
 <tr onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($ttl_cos_amount,2);
 $ttl_cost_sales=$ttl_cost_sales+$ttl_cos_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Cost Of Sales</strong></td><td align="right"><strong><?php echo number_format( $ttl_cost_sales,2); ?></strong></td></tr>
 
 
 
  <tr height="30"><td><strong>GROSS MARGIN</strong></td><td align="right"><strong><?php echo number_format($gross_margin=$ttl_sales-$ttl_cost_sales,2); ?></strong></td></tr>
 
 
 
 
 
 <tr height="40"><td colspan="2">OPERATING EXPENSES</td></tr>
 <?php 
 
 //cost of sales income
$queryop="select * FROM account_type where account_cat_id='6' ";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
while ($rows=mysql_fetch_object($results))
{
	
	$account_type_id=$rows->account_type_id;
	
$queryop2="select SUM(amount*curr_rate) AS ttl_amount FROM chart_transactions where account_type_id='$account_type_id' ";
$results2= mysql_query($queryop2) or die ("Error $queryop.".mysql_error());
$rows2=mysql_fetch_object($results2);
$op_amount=$rows2->ttl_amount;

if ($op_amount==0)
{
	
	
}else
{
 
 ?>
 
 
 
 <tr onClick="document.location.href='home.php?chart_details=chart_details&account_type_id=<?php echo $rows->account_type_id; ?>&sub_module_id=<?php echo $sub_module_id ?>'"><td width="70%"><?php echo $rows->account_code.' '. $rows->account_type_name; ?></td>
 <td width="30%" align="right"><?php 

echo number_format($op_amount,2);
 $ttl_op_amount=$ttl_op_amount+$op_amount;
 ?></td></tr>
 
 <?php 
}

}
 
 ?>
 <tr><td><strong>Totals Operating Expenses</strong></td><td align="right"><strong><?php echo number_format($ttl_op_amount,2); ?></strong></td></tr>
 
 
 <tr height="40"><td><strong>PROFIT(LOSS)</strong></td><td align="right"><strong><font size=""><?php echo number_format($gross_margin-$ttl_op_amount,2); ?></font></strong></td></tr>
 
 </table>


</td>
</tr>
</table>
</form>
</br></br>
<script type="text/javascript">
  Calendar.setup(
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
  
  
  </script>


<?php 


?>
	
			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
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