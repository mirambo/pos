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
			
  
  
 <?php
 if (!isset($_POST['generate']))
{

?>
 <form name="search" method="post" action="">   
 
<table width="85%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_tpla.php" target="_blank">Print</a>|<a href="print_tpla_word.php">Export to word </a>
	
	</td>
	</tr>
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    
	
	
  </tr>
  
 <?php include('sales.php'); ?>
 <?php include('tpl_sales_return.php'); ?>
 <?php //include('bl_bad_debts.php'); ?>
 <?php include('tp_doubtful_debts.php'); ?>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Sales</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php echo number_format($gross_sale=$grnd_ttl_sales_ksh-$ledger_bal_dd-$ttl_salesret,2);?>
	
	
	
	</strong></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Cost of Goods Sold</strong></td>
	
    
</tr>


<?php include('opening_stock.php'); ?>

<?php //include('purchases.php'); ?>
<?php include('tl_purchases.php'); ?>
 
<?php include('purchase_returns.php'); 

//$ttl_purchases=$grss_purc-$purret;
?> 

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Goods Availlable for Sale</strong></td>
    
	
    <td width="2%"  align="right"><strong>(<?php $goods_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?>)</strong></td>
    <td>&nbsp;</td>
</tr>

<?php include('tpl_closing_stock.php'); ?> 




<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$grnt_amnt_ttl_ccost; 
	echo number_format($cost_of_sales,2); ?>)</strong></td>
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong><font size="+1">
	<?php 
	
	$gross_pl=$gross_sale-$cost_of_sales; 
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
	
	
	
	
	</font></strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1">
	<?php $gross_pl=$gross_sale-$cost_of_sales; 
	echo number_format($gross_pl,2);
	
	?>
	</font></strong></td>  
</tr>



 <?php include('other_income.php'); ?>
 
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($prof_inc=$gross_pl+$grnd_ttl,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
 <?php include('other_expenses.php'); ?>
 <?php include('tl_salaries.php'); ?>
 <?php include('tl_custom.php'); ?>

<?php include('miscelinious_expenses.php'); ?>
<?php include('depreciation.php'); ?>
<?php include('bl_bad_debts.php'); ?>


<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$ledger_bal_sal+$ledger_bal_cust+$grnd_depr+$ledger_bal_bd,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
<?php include('tpl_net_profit.php'); ?>


</table>
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
}
else
{
$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
if ($date_from!='' && $date_to!=='')
{
//echo "date selected";
?>	

 <form name="search" method="post" action="">   
 
<table width="85%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_tpla.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to; ?>" target="_blank">Print</a> | <a href="print_tpla_word.php?date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to; ?>">Export to word </a>
	
	</td>
	</tr>
	
	<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="6"><div align="center"><strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong></div></td>
	
  </tr>
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    
	
	
  </tr>
  
  
  
 <?php include('sales.php'); ?>
 <?php include('tpl_sales_return.php'); ?>


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Sales</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php echo number_format($gross_sale= $grnd_ttl_sales_ksh-$ttl_salesret,2);?>
	
	
	
	</strong></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Cost of Goods Sold</strong></td>
	
    
</tr>


<?php include('opening_stock.php'); ?>

<?php //include('purchases.php'); ?>
<?php include('tl_purchases.php'); ?>
 
<?php include('purchase_returns.php'); 

//$ttl_purchases=$grss_purc-$purret;
?> 

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Goods Availlable for Sale</strong></td>
    
	
    <td width="2%"  align="right"><strong>(<?php $goods_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?>)</strong></td>
    <td>&nbsp;</td>
</tr>

<?php include('tpl_closing_stock.php'); ?> 




<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$grnt_amnt_ttl_ccost; 
	echo number_format($cost_of_sales,2); ?>)</strong></td>
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong><font size="+1">
	<?php 
	
	$gross_pl=$gross_sale-$cost_of_sales; 
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
	
	
	
	
	</font></strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1">
	<?php $gross_pl=$gross_sale-$cost_of_sales; 
	echo number_format($gross_pl,2);
	
	?>
	</font></strong></td>  
</tr>



 <?php include('other_income.php'); ?>
 
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($prof_inc=$gross_pl+$grnd_ttl,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
 <?php include('other_expenses.php'); ?>
  <?php include('tl_salaries.php'); ?>
 <?php include('tl_custom.php'); ?>

<?php include('miscelinious_expenses.php'); ?>

<?php include('depreciation.php'); ?>

<?php include('bl_bad_debts.php'); ?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$grnd_depr+$ledger_bal_bd,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
<?php include('tpl_net_profit.php'); ?>


</table>
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
}	
else
{

?>
 <form name="search" method="post" action="">   
 
<table width="85%" border="0" align="center" style="margin:auto;" class="table">

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a href="print_tpla.php" target="_blank">Print</a>|<a href="print_tpla_word.php">Export to word </a>
	
	</td>
	</tr>
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount(Kshs)</strong></div></td>
    
	
	
  </tr>
  
 <?php include('sales.php'); ?>
 <?php include('tpl_sales_return.php'); ?>


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Sales</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php echo number_format($gross_sale= $grnd_ttl_sales_ksh-$ttl_salesret,2);?>
	
	
	
	</strong></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Cost of Goods Sold</strong></td>
	
    
</tr>


<?php include('opening_stock.php'); ?>

<?php //include('purchases.php'); ?>
<?php include('tl_purchases.php'); ?>
 
<?php include('purchase_returns.php'); 

//$ttl_purchases=$grss_purc-$purret;
?> 

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Goods Availlable for Sale</strong></td>
    
	
    <td width="2%"  align="right"><strong>(<?php $goods_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?>)</strong></td>
    <td>&nbsp;</td>
</tr>

<?php include('tpl_closing_stock.php'); ?> 




<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$grnt_amnt_ttl_ccost; 
	echo number_format($cost_of_sales,2); ?>)</strong></td>
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong><font size="+1">
	<?php 
	
	$gross_pl=$gross_sale-$cost_of_sales; 
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
	
	
	
	
	</font></strong></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1">
	<?php $gross_pl=$gross_sale-$cost_of_sales; 
	echo number_format($gross_pl,2);
	
	?>
	</font></strong></td>  
</tr>



 <?php include('other_income.php'); ?>
 
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($prof_inc=$gross_pl+$grnd_ttl,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
 <?php include('other_expenses.php'); ?>
  <?php include('tl_salaries.php'); ?>
 <?php include('tl_custom.php'); ?>

<?php include('miscelinious_expenses.php'); ?>

<?php include('depreciation.php'); ?>

<?php include('bl_bad_debts.php'); ?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$grnd_depr+$ledger_bal_bd,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
<?php include('tpl_net_profit.php'); ?>


</table>
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





}		

}		
			
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