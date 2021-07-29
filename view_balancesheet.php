<?php include('bs_net_profit.php'); ?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

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
	<tr style="background:url(images/description.gif);" height="30">
    <td width="5%" colspan="3"><div align="center"><strong>Details Or Particulars</strong></div></td>
    
	<td width="2%"><div align="center"><strong>Amount (USD)</strong></div></td>
    <td width="2%" colspan="2"><div align="center"><strong>Amount (USD)</strong></div></td>
    
	
	
  </tr>
  
  
  <tr  height="30"  bgcolor="#FFFFCC">
    <td width="5%" colspan="6"><div align="left"><strong><font size="+1">ASSETS</font></strong></div></td>
  </tr>
 <tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong>Current Assets</strong></td> 
</tr>

<?php include('bl_cash.php'); ?>

<?php //include('bl_inventory.php'); ?>
<?php include('bl_accounts_receivables.php'); ?>





<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="3"><strong>Total Current Assets</strong></td>
    
	<td width="2%"><div align="right"><strong></strong></td>
    <td width="2%" colspan="2" align="right"><strong>

	<?php 

	echo number_format($ttl_curr_assets=$ledger_bal_cash+$grnt_amnt_invent+$ledger_bal_ar,2);

	?>
	</strong></td>
    
</tr>
<?php include('bl_fixed_assets.php'); ?>

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong><font size="+1">Total Assets</font></strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php echo number_format($ttl_assets=$grnd_curr_value+$ttl_curr_assets,2) ?></font></strong><hr/><hr/></td>
    
</tr>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
</tr> 
<tr  height="30"  bgcolor="#FFFFCC">
    <td width="5%" colspan="6"><div align="left"><strong><font size="+1">EQUITY AND LIABILITIES</font></strong></div></td>
    

    
	
	
  </tr>
  <tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong>Short-Term Liabilities</strong></td>
	
    
</tr>
<?php //include('short_term_loans.php'); ?>

<?php include('bl_accounts_payables.php'); ?>

<?php //include('tp_doubtful_debts.php'); ?>


<tr  bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Total Short-Term Liablities</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php
	

	
	echo number_format($ttl_current_liability=$ledger_bal_ap+$ledger_bal_dd,2);
	

	
	?>
	</strong></td>
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong></strong></td>
    
	
   
    
</tr>
<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong>Capital</strong></td>
     
</tr>
  
 <?php include('bl_share_capital.php');?>
 
 <?php //include('bl_share_retained_earnings.php'); ?>



<?php
if ($net_pl>0)
{
?>
<tr height="30" bgcolor="#C0D7E5">

    <td width="10%" colspan="3">Add Net Profit</td>
    
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
<?php include('bl_additional_investments.php'); ?>

<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="3"><strong>Total Capital</strong></td>
    
	<td width="2%"><div align="right">
	
	<strong><?php 
	
	if ($net_pl>0)
	{
	
	echo number_format($all_cap=$ttlcapt+$ttl_inv+$ttlretearn+$net_pl,2);
	
	}
	else
	{
	echo number_format($all_cap=$ttlcapt+$ttl_inv+$ttlretearn,2);
	
	}



	?></strong>
	
	
	</td>
    <td width="2%" colspan="2"></td>
    
</tr>

<?php include('bl_dividends.php'); ?>

<?php //include('bl_shares_withdrawals.php'); ?>

<?php
if ($net_pl<0)
{
?>
<tr height="30" bgcolor="#C0D7E5">

    <td width="10%" colspan="3">Less Net Loss</td>
    
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


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Net Shares Capital</strong></td>
    
	
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



<tr height="30" bgcolor="#C0D7E5">
    <td width="10%" colspan="6"><strong>Long-Term Liabilities</strong></td>
	
    
</tr>

<?php include('bl_long_term_loans.php'); ?>  
  

<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong>Total Long-Term Loans</strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong>
	
	<?php echo number_format($ttl_long_term_loans=$ledger_bal_ltm,2);?>
	
	
	
	</strong></td>
    
</tr>


<tr height="30" bgcolor="#FFFFCC">
    <td width="10%" colspan="4"><strong><font size="+1">Total Liabilities and Owner's Equity </font></strong></td>
    
	
    <td width="2%" colspan="2" align="right"><strong><font size="+1"><?php echo number_format($ttl_liablities=$capbal+$ttl_long_term_loans+$ttl_current_liability,2) ?></font></strong><hr/><hr/></td>
    
</tr>
<tr  height="30"  bgcolor="#C0D7E5">
    <td width="5%" colspan="6"><div align="left"><strong></strong></div></td>
    

    
	
	
  </tr>
   
    
  
  
  </table>
  
  <br/>
  




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
			
			
