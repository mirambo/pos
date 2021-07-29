<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

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
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>Income Statement / Profit and Loss Account</H2>
<h3>
<?php 
if ($date_from=='' && $date_to=='')
 {
 ?>
 For the period ending : <?php echo $date=date('Y-m-d'); ?>
 <?php 
 }
 else
 {?>
 For the period from : <?php echo $date_from ?> To <?php echo $date_to;?>
 <?php
 
 
 }

?>



</h3>
	
	</td>
	
    </tr>

	
	<tr>
 <td colspan="9"> 
  
  
 <p style="background:#ffffff; margin-bottom:0px;"><?php include('sales.php'); ?></p>
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('tpl_sales_return.php'); ?></p>

 <?php //include('tp_doubtful_debts.php'); ?>


    
	
    <strong>
	
<p style="background:#ffffff; margin-bottom:0px;">Net Sales Revenue  :	<span style="float:right; margin-right:100px;"><?php echo number_format($gross_sale=$grnd_ttl_sales_ksh-$ttl_salesret,2);?></span></p>
	
	
	
	</strong>


<?php //include('tp_cost_of_sales.php'); ?> 

	
    





 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('tl_cost_of_production.php'); ?></p>



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

 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('other_income.php'); ?></p>
 

    
	
    <strong><?php 
	//Gross loss or profit plus incomes
	$prof_inc=$gross_pl+$grnd_ttl_inc;
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong>
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('other_expenses.php'); ?></p>
 <?php //include('tl_salaries.php'); ?>
 <?php //include('tl_custom.php'); ?>
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('miscelinious_expenses.php'); ?></p>
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('depreciation.php'); ?></p>
<?php //include('bl_bad_debts.php'); ?>
 <p style="background:#ffffff; margin-bottom:0px;" ><strong>Total Expenses : <?php 
	
	echo '<span style="float:right; margin-right:100px;">'.number_format($grnd_expense=$gnd_amnt_me+$ledger_bal_exp+$ledger_bal_sal+$ledger_bal_cust+$grnd_depr+$ledger_bal_bd,2).'</span>';

	?></strong></p>
	
 <p style="background:#ffffff; margin-bottom:0px;" ><?php include('tpl_net_profit.php'); ?></p>


</td>
</tr>
</table>
  
    
</table>
</body>


