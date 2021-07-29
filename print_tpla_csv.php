<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Trading_Profit_And_Loss_Account.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Trading Profit And Loss Account / Income Statement</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>csspr.css"/>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
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

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();">
 <?php 
 if ($date_from=='' && $date_from=='')
{
 ?> 


<table width="700" border="0" align="center" >
<?php 
  



/*$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);*/
  
  
  ?>
<!--<tr>
    <td colspan="6" align="center"><img src="<?php echo $base_url;?>images/logoeaco.jpg" /></td>
  </tr>-->
  <tr>
    <td colspan="6"><div align="center"><strong><H2>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</H2></strong><br/>
	Plot 257, Tong Ping Area, Juba, South Sudan<br/>
	Tel No: +211 (0) 911112662 / +211(0)959 0012273<br/>
	</div>
	
	</td>
  </tr>
   

  <tr height="30">
    <td colspan="6" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">TRADING PROFIT AND LOSS ACCOUNT</span>
	
	</td>
  </tr>


    <tr height="20">
 <td colspan="6"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">Income Statement for the Period Ending <?php echo date('Y-m-d'); ?></font></strong></div>

  </tr>
<td colspan="6"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	

	
	</td>
  </tr>


</table>
<table width="700" border="0" align="center" style="margin:auto;" class="table">
 </tr>
	
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount (USD)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount (USD)</strong></div></td>
    
	
	
  </tr>
  
 <?php include('tpl_service_revenue.php'); ?>
 <?php include('tpl_service_order.php'); ?>


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Service Revenue</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php echo number_format($gross_sale=$service_revenue+$service_order,2);?>
	
	
	
	</strong></td>
    
</tr>

<!--<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Cost of Goods Sold</strong></td>
	
    
</tr>-->


<?php //include('opening_stock.php'); ?>

<?php //include('purchases.php'); ?>
 
<?php //include('purchase_returns.php'); 

//$ttl_purchases=$grss_purc-$purret;
?> 

<!--<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Goods Availlable for Sale</strong></td>
    
	
    <td width="2%"  align="right"><strong>(<?php $goods_for_sale=$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?>)</strong></td>
    <td>&nbsp;</td>
</tr>-->

<?php //include('tpl_closing_stock.php'); ?> 




<!--<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$closing_stock; 
	echo number_format($cost_of_sales,2); ?>)</strong></td>
    
</tr>-->
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong><font size="+1">
	<?php 
	
	$gross_pl=$gross_sale; 
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
 <?php include('tpl_general_expenses.php'); ?>
 
 <?php include('tpl_salary_expenses.php'); ?>
 
 

<?php include('miscelinious_expenses.php'); ?>

<?php include('depreciation.php'); ?>

<?php //include('bl_bad_debts.php'); ?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong>Total Operating Expenses</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($grnd_expense=$ttl_gen_exp+$gnd_amnt_exp+$all_salaries+$grnd_depr,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
<?php include('tpl_net_profit.php'); ?>


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
}
else
{

?>
<table width="700" border="0" align="center" >
<!--<tr>
    <td colspan="6" align="center"><img src="<?php echo $base_url;?>images/logoeaco.jpg" /></td>
  </tr>-->
  <tr>
    <td colspan="6"><div align="center"><strong><H2>SIPET ENGINEERING & CONSULTANCY SERVICES CO. LIMITED</H2></strong><br/>
	Plot 257, Tong Ping Area, Juba, South Sudan<br/>
	Tel No: +211 (0) 911112662 / +211(0)959 0012273<br/>
	</div>
	
	</td>
  </tr>
   

  <tr height="30">
    <td colspan="6" bgcolor="#67C6FE" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">TRADING PROFIT AND LOSS ACCOUNT</span>
	
	</td>
  </tr>


    <tr height="20">
 <td colspan="6"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">Ledger Balance for the Period Between <?php echo $date_from; ?>And <?php echo $date_to; ?></font></strong></div>

  </tr>
<td colspan="6"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	

	
	</td>
  </tr>


</table>
<table width="700" border="0" align="center" style="margin:auto;" class="table">
 </tr>
	
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount (USD)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount (USD)</strong></div></td>
    
	
	
  </tr>
  
 <?php include('tpl_service_revenue.php'); ?>
 <?php include('tpl_service_order.php'); ?>


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Service Revenue</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
		<?php echo number_format($gross_sale=$service_revenue+$service_order,2);?>
	
	
	
	</strong></td>
    
</tr>

<!--<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="6"><strong>Cost of Goods Sold</strong></td>
	
    
</tr>-->


<?php //include('opening_stock.php'); ?>

<?php //include('purchases.php'); ?>
 
<?php //include('purchase_returns.php'); 

//$ttl_purchases=$grss_purc-$purret;
?> 

<!--<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Goods Availlable for Sale</strong></td>
    
	
    <td width="2%"  align="right"><strong>(<?php $goods_for_sale=$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?>)</strong></td>
    <td>&nbsp;</td>
</tr>-->

<?php //include('tpl_closing_stock.php'); ?> 




<!--<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$closing_stock; 
	echo number_format($cost_of_sales,2); ?>)</strong></td>
    
</tr>-->
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong><font size="+1">
	<?php 
	
	$gross_pl=$gross_sale; 
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
 <?php include('tpl_general_expenses.php'); ?>
 
 <?php include('tpl_salary_expenses.php'); ?>
 
 

<?php include('miscelinious_expenses.php'); ?>

<?php include('depreciation.php'); ?>

<?php //include('bl_bad_debts.php'); ?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong>Total Operating Expenses</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><?php 
	//Gross loss or profit plus incomes
	echo number_format($grnd_expense=$ttl_gen_exp+$gnd_amnt_exp+$all_salaries+$grnd_depr,2);
	
	//echo number_format($grnd_ttl,2); 
	
	
	?></strong></td>
    
</tr>
<?php include('tpl_net_profit.php'); ?>


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

}
?>





<table width="700" border="0" align="right" style="margin-right:75px;"> 
  <tr align="center" height="20">
   <td colspan="6" ><strong><em>Printed by :
 <?php 
$sqluser="select employees.emp_fname,employees.emp_mname,employees.emp_lname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_fname.' '.$rowsuser->emp_mname.' '.$rowsuser->emp_lname;
	
	
	
	?>
    </em></strong></td>
  </tr>  
  
  
  </table>

</body>
</html>
