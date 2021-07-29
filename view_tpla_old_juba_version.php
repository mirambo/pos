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
<table width="55%" border="0" align="center" style="margin:auto;" class="table">

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
	
	<tr>
 <td colspan="9"> 
  
  
 <p style="background:#ffffff; margin-bottom:0px;"><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=2"><?php include('sales.php'); ?></a></p>
 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=4"><?php include('tpl_sales_return.php'); ?></a></p>

 <?php //include('tp_doubtful_debts.php'); ?>


    
	
    <strong>
	
<p style="background:#ffffff; margin-bottom:0px;">Net Sales Revenue  :	<span style="float:right; margin-right:100px;"><?php echo number_format($gross_sale=$grnd_ttl_sales_ksh-$ttl_salesret,2);?></span></p>
	
	
	
	</strong>


<?php //include('tp_cost_of_sales.php'); ?> 

	
    





 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=19"><?php include('tl_cost_of_production.php'); ?></a></p>



<p style="background:#ffffff; margin-bottom:0px;" ><strong>
	<?php 
	
	$gross_pl=$gross_sale-$grss_cop; 
	?>
	
	Gross <?php 
	if ($gross_pl>0)
	{
	
	echo "Profit";
	}
	
	else
	{
	echo "Loss";
	}
	

	?>
	
	
	
	
	</font></strong><span style="float:right; margin-right:100px;">
	<?php $gross_pl=$gross_sale-$grss_cop; 
	echo number_format($gross_pl,2);
	
	?>
	</span></strong>

</p>

 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=10"><?php include('other_income.php'); ?></a></p>
 

    
	
    <strong><?php 
	//Gross loss or profit plus incomes
	$prof_inc=$gross_pl+$grnd_ttl_inc;
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong>
 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=8"><?php include('other_expenses.php'); ?></a></p>
 <?php //include('tl_salaries.php'); ?>
 <?php //include('tl_custom.php'); ?>
 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_ledger.php?type=11"><?php include('miscelinious_expenses.php'); ?></a></p>
 <p style="background:#ffffff; margin-bottom:0px;" ><a style="text-decoration:none; font-size:12px; font-weight:50; color:#000000;" href="view_fixed_assets.php"><?php include('depreciation.php'); ?></a></p>
<?php //include('bl_bad_debts.php'); ?>
 <p style="background:#ffffff; margin-bottom:0px;" ><strong>Total Expenses : <?php 
	
	echo '<span style="float:right; margin-right:100px;">'.number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$ledger_bal_sal+$ledger_bal_cust+$grnd_depr+$ledger_bal_bd,2).'</span>';

	?></strong></p>
	
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('tpl_net_profit.php'); ?></p>


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