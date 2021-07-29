<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Trading Profit and Loss Account</title>
<link rel="stylesheet" type="text/css" href="http://localhost/brisk_sys/style.css"/>

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
 
<table width="700" border="0" align="center" style="margin:auto;">
<?php 
  



$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="7"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr><!-- <tr>
    <td colspan="7"><div align="right">Website : <?php echo $rowscont->website; ?></div></td>
  </tr> -->
<tr>
    <td colspan="7"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>

  <tr height="30">
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">TRADING PROFIT AND LOSS STATEMENT</span>
	
	</td>
  </tr>

<?php
if ($date_from=='' && $date_to=='')
{
 ?>
 
 <tr height="20">
 <td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="+1">For the Period Ending <?php echo date('d F, Y') ?></font></strong></div>

  </tr>
<td colspan="7"  align="center" ><hr/>

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	
	<hr/>
	
	</td>
  </tr>


</table>

 <form name="search" method="post" action="">   
 
<table width="700" border="0" align="center" style="margin:auto;" class="table">


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



<?php //include('tp_cost_of_sales.php'); ?> 
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
    
	
    <td width="2%"  align="right"><strong><?php $goods_for_sale=$grnt_amnt_ttl_cost+$grss_purc-$ttl_purret;
												//$goods_for_sale=$grss_purc-$ttl_purret;
	echo number_format($goods_for_sale,2); ?></strong></td>
    <td>&nbsp;</td>
</tr>

<?php include('bl_inventory.php'); ?> 




<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Cost of Goods Sold</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>(<?php $cost_of_sales=$goods_for_sale-$grnt_amnt_ttl_ccostxx; 
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


?>
 <table width="700" border="0" align="right" style="margin-right:75px;"> 
  <tr align="center" height="20">
   <td colspan="4" ><strong><em>Printed by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;?>
    </em></strong></td>
  </tr>  
  
  
  </table>
  
</body>
</html>
