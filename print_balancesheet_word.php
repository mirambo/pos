<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['client_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Balance_Sheet.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
include('bs_net_profit.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Balance Sheet</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>style.css"/>

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
 
<table width="700" border="1" align="center" style="margin:auto">
<?php 
  
$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><?php echo $rowscont->cont_person; ?></td>
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
    <td colspan="7"><div align="right">Website : <?php echo $rowscont->fax; ?></div></td>
  </tr>
</table>
 <table width="45%" border="1" align="center" style="margin:auto;">
  <tr >
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">BALANCE SHEET</span>
	
	</td>
  </tr>

 <tr > 
 <td colspan="7"  align="center" >
<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->
<div ><strong><font size="">
  <?php
if ($date_from=='' && $date_to=='')
 
  {?>

For The Period Ending : <?php echo date('d-m-Y'); ?>
<?php 
}
else
{?>
For The Period Between : <?php echo $date_from;?> and <?php echo $date_to;?>
<?php
}
?>

</font></strong></div>

  </tr>
<td colspan="7"  align="center" >

<!--<strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong>-->

<div style="float:right;"><strong> Date Printed : <?php echo date('d F, Y')?></strong></div></td>
  </tr>	
	

	
	</td>
  </tr>


	
	<tr style="background:url(images/description.gif);" >
    <td  colspan="4"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td ><div align="center"><strong>Amount (Tshs)</strong></div></td>
    <td  colspan="2"><div align="center"><strong>Amount (Tshs)</strong></div></td>
    
	
	
  </tr>
  
  
  <tr    bgcolor="#FFFFCC">
    <td  colspan="7"><div align="left"><strong><font size="+1">ASSETS</font></strong></div></td>
  </tr>
 <tr  bgcolor="#C0D7E5">
    <td  colspan="7"><strong>Current Assets</strong></td> 
</tr>

<?php include('bl_cash.php'); ?>
<?php include('bl_bank.php'); ?>
<?php include('bl_inventory.php'); ?>
<?php include('bl_accounts_receivables.php'); ?>
<?php //include('bl_note_receivables.php'); ?>
<?php include('bl_prepaid_expenses.php'); ?>
<?php //include('bl_prepaid_salary.php'); ?>
<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Accounts Receivables</strong></td> 
	<td></td>
	<td align="right" colspan="2"><?php echo number_format($net_acc_rec=$accounts_receivables+$notes_receivables+$ledger_bal_prepaid_exp+$ledger_bal_prepaid_sal,2); ?></td>
	
</tr>


<?php include('bl_pending_purchase.php'); ?>


<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Total Current Assets</strong></td>
    
	<td width="2%"><div align="right"><strong></strong></td>
    <td width="2%" colspan="2" align="right"><strong>

	<?php 

	echo number_format($ttl_curr_assets=$ledger_bal_cash+$ledger_bal_bank+$grnt_amnt_ttl_ccostxx+$pending_po+$net_acc_rec,2);

	?>
	</strong></td>
    
</tr>
<?php include('bl_fixed_assets.php'); ?>

<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong><font size="+1">Total Assets</font></strong></td>
    <td></td>
	
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php echo number_format($ttl_assets=$grnd_curr_value+$ttl_curr_assets,2) ?></font></strong></td>
    
</tr>

<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="7"><strong></strong></td>
</tr> 
<tr    bgcolor="#FFFFCC">
    <td width="5%" colspan="7"><div align="left"><strong><font size="+1">EQUITY AND LIABILITIES</font></strong></div></td>
    

    
	
	
  </tr>
  <tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="7"><strong>Short-Term Liabilities</strong></td>
	
    
</tr>
<?php //include('short_term_loans.php'); ?>

<?php include('bl_accounts_payables.php'); ?>
<?php //include('bl_com_payables.php'); ?>
<?php include('bl_notes_payables_ledger.php'); ?>

<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Accounts Payables</strong></td> 
	<td></td>
	<td align="right" colspan="2"><?php echo number_format($net_acc_pay=$ledger_bal_ap+$ledger_bal_com+$ledger_bal_notesp,2); ?></td>
	
</tr>


<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Total Short-Term Liablities</strong></td>
    
	<td></td>
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php
	

	
	echo number_format($ttl_current_liability=$net_acc_pay,2);
	

	
	?>
	</strong></td>
    
</tr>
<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="7"><strong></strong></td>
    
	
   
    
</tr>
<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="7"><strong>Capital</strong></td>
     
</tr>
  
 <?php include('bl_share_capital.php'); ?>
 
 <?php //include('bl_share_retained_earnings.php'); ?>



<?php
if ($net_pl>0)
{
?>
<tr  bgcolor="#C0D7E5">

    <td width="10%" colspan="4">Add Net Profit</td>
    
	<td width="2%"><div align="right">
	
	<?php 
echo number_format($net_pl,2);
	
	?>
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>
<?php 
}
else
{

}
?>
<?php //include('bl_additional_investments.php'); ?>

<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="4"><strong>Total Capital</strong></td>
    
	<td width="2%"><div align="right">
	
	<strong><?php 
	
	if ($net_pl>0)
	{
	
	echo number_format($all_cap=$ledger_bal_shares+$ttl_inv+$ttlretearn+$net_pl,2);
	
	}
	else
	{
	echo number_format($all_cap=$ledger_bal_shares+$ttl_inv+$ttlretearn,2);
	
	}



	?></strong>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>

<?php //include('bl_dividends.php'); ?>

<?php //include('bl_shares_withdrawals.php'); ?>

<?php
if ($net_pl<0)
{
?>
<tr  bgcolor="#C0D7E5">

    <td width="10%" colspan="4">Less Net Loss</td>
    
	<td width="2%"><div align="right">
	
	<?php 
echo number_format($net_loss,2);
	
	?>
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>
<?php 
}
else
{

}
?>


<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Shares Capital</strong></td>
    
	<td></td>
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php 
	
	if ($net_pl>0)
	{
	echo number_format($capbal=$all_cap-$ttlwith-$ttldiv,2);
	
	}
	else
	{
	echo number_format($capbal=$all_cap-$ttlwith-$ttldiv-$net_loss,2);
	
	}
	
	?>
	
</strong>
	
	</td>
    
</tr>



<!--<tr  bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong>Long-Term Liabilities</strong></td>
	
    
</tr>-->

<?php //include('bl_long_term_loans.php'); ?>  
  




<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong><font size="+1">Total Liabilities and Owner's Equity </font></strong></td>
    
	<td></td>
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php echo number_format($ttl_liablities=$capbal+$ttl_long_term_loans+$ttl_current_liability,2) ?></font></strong></td>
    
</tr>
<tr    bgcolor="#C0D7E5">
    <td width="5%" colspan="7"><div align="left"><strong></strong></div></td>
    

    
	
	
  </tr>
    
  
  
  </table>
  





 <table width="45%" border="0" align="center" style="margin:auto;"> 
  <tr align="right" >
   <td colspan="7" ><strong><em>Printed by :
         <?php 
$sqluser="select * FROM users WHERE user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name;
	
	
	
	?>
    </em></strong></td>
  </tr>  
  
  
  </table>
 
  
</body>
</html>
