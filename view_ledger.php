<?php include('Connections/fundmaster.php'); 
$type=$_GET['type'];

if ($type==1)
{
$db_table='general_ledger';
$title='General Ledger';
$sub_menu='generalledger';
}


if ($type==2)
{
$db_table='sales_ledger';
$title='Sales Ledger';
$sub_menu='salesledger';
}

if ($type==3)
{
$db_table='inventory_ledger';
$title='Inventory Ledger';
$sub_menu='inventoryledger';
}

if ($type==4)
{
$db_table='sales_returns_ledger';
$title='Sales Return Ledger';
$sub_menu='salesreturnsledger';
}

if ($type==5)
{
$db_table='purchases_returns_ledger';
$title='Purchase Returns Ledger';
$sub_menu='purchasesreturnsledger';
}

if ($type==6)
{
$db_table='cash_ledger';
$title='Cash Ledger';
$sub_menu='cashledger';
}

if ($type==7)
{
$db_table='bank_ledger';
$title='Bank Ledger';
$sub_menu='bankledger';
}

if ($type==8)
{
$db_table='salary_expenses_ledger';
$title='Expenses Ledger';
$sub_menu='expensesledger';
}

if ($type==9)
{
$db_table='purchases_ledger';
$title='Purchases Ledger';
$sub_menu='purchasesledger';
}

if ($type==10)
{
$db_table='income_ledger';
$title='Other Income Legder';
$sub_menu='incomeledger';
}

if ($type==11)
{
$db_table='misc_expenses_ledger';
$title='Petty Cash Expenses Ledger';
$sub_menu='cashledger';
}

if ($type==12)
{
$db_table='accounts_receivables_ledger';
$title='Accounts Receivables Ledger';
$sub_menu='accountreceivableledger';
}

if ($type==13)
{
$db_table='notes_receivables_ledger';
$title='Notes Receivables Ledger';
$sub_menu='notesreceivableledger';
}

if ($type==14)
{
$db_table='notes_payables_ledger';
$title='Notes Payables Ledger';
$sub_menu='notespayablesledger';
}

if ($type==15)
{
$db_table='accounts_payables_ledger';
$title='Accounts Payables Ledger';
$sub_menu='accountspayablesledger';
}

if ($type==16)
{
$db_table='loans_ledger';
$title='Loans Ledger';
$sub_menu='loansledger';
}

if ($type==17)
{
$db_table='shares_ledger';
$title='Shares Ledger';
$sub_menu='sharesledger';
}

if ($type==18)
{
$db_table='additional_investments_ledger';
$title='Additional Investments Ledger';
$sub_menu='additionalinvestmentsledger';
}

if ($type==19)
{
$db_table='cost_of_production_ledger';
$title='Cost Of Production Ledger';
$sub_menu='doubtfuldebtsledger';
}

if ($type==20)
{
$db_table='cash_ledger';
$title='Cash Ledger';
$sub_menu='cashledger';
}

if ($type==21)
{
$db_table='petty_cash_ledger';
$title='Petty Cash Ledger';
$sub_menu='pettycashledger';
}

if ($type==22)
{
$db_table='fixed_assets_ledger';
$title='Fixed Assets Ledger';
$sub_menu='fixedassetsledger';
}

if ($type==23)
{
$db_table='prepaid_expenses_ledger';
$title='Prepaid Expenses Ledger';
$sub_menu='cashledger';
}

if ($type==24)
{
$db_table='pending_purchases_ledger';
$title='Pending Purchase Ledger';
$sub_menu='cashledger';
}

if ($type==25)
{
$db_table='cash_ledger';
$title='Cash Ledger';
$sub_menu='cashledger';
}













































?>

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

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
	<?php //require_once('includes/'.$sub_menu.'submenu.php');  ?>
		
		<h3><!--::--><?php //echo $title; ?></h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
		
<form name="search" method="post" action=""> 				
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="+1"><strong>
	<?php echo $title;?></strong></font>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="right"><font size="+1">
	<a style="float:right; margin-right:200px; font-weight:bold; font-size:13px; color:#000000" href="print_ledger.php?type=<?php echo $type?>&date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>" target="_blank">Direct Print</a>	
	<a style="float:right; margin-right:30px; font-weight:bold; font-size:13px; color:#000000" href="print_ledger_word.php?type=<?php echo $type?>&date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>">Export To Word</a>
	<a style="float:right; margin-right:20px; font-weight:bold; font-size:13px; color:#000000" href="print_ledger_excel.php?type=<?php echo $type?>&date_from=<?php echo $date_from;?>&date_to=<?php echo $date_to;?>">Export To Excel</a>
	
	</td>
	
    </tr>
	 <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
	<td width="200" ><div align="center"><strong>Amount(Foreign Currency)</strong></td>
	<td width="200"><div align="center"><strong>Exchange Rate</strong></td>
	 <td width="200" ><div align="center"><strong>Debit</strong></td>	
	<td width="200" ><div align="center"><strong>Credit</strong></td>
	<td width="200" ><div align="center"><strong>Balance</strong></td>
  
    </tr>
  
  <?php
$amount_in_kshs=0;  
$amount_out_kshs=0;
 $grnd_amount_in_kshs=0;
$grnd_amount_out_kshs=0; 
		
if (!isset($_POST['generate']))
{
$sql="select * from ".$db_table.",currency where ".$db_table.".currency_code=currency.curr_id AND ".$db_table.".amount!='' 
and ".$db_table.".amount!='0'  order by ".$db_table.".transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{

$date_from=$_POST['date_from'];
$date_to=$_POST['date_to'];
if ($date_from!='' && $date_to!='')
{

$sql="select * from ".$db_table.",currency where ".$db_table.".currency_code=currency.curr_id AND ".$db_table.".amount!='' 
and ".$db_table.".amount!='0' AND ".$db_table.".date_recorded>='$date_from' and date_recorded<='$date_to' order by ".$db_table.".transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{

$sql="select * from ".$db_table.",currency where ".$db_table.".currency_code=currency.curr_id AND ".$db_table.".amount!='' and ".$db_table.".amount!='0'  order by ".$db_table.".transaction_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


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
 
 
 ?>
 
  
    <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transactions;?></td>
	<td align="right"><?php
	$amount=$rows->amount;
	
	if ($amount>0)
	{
	echo $curr_name=$rows->curr_name.' '.number_format($amount,2);
	}
	else	
	{
	echo $curr_name=$rows->curr_name.' '.number_format($str2=substr($amount,1),2);
	
	//echo $curr_name=$rows->curr_name.' '.number_format($rows->amount,2);
	}
	?></td>
	<td align="right"><?php echo number_format($curr_rate=$rows->curr_rate,2);?></td>
	
   
	<td align="right"><?php
	$amount_in=$rows->debit;
	if ($amount_in=='')
         {
		 
		 } 
else
{
	echo number_format($amount_in_kshs=$curr_rate*$amount_in,2);
	}
	?></td>
	
	<td align="right"><?php
	$amount_out=$rows->credit;
	if ($amount_out=='')
         {
		 
		 } 
else
{
	echo number_format($amount_out_kshs=$curr_rate*$amount_out,2);
	}
	//$grnd_amount_out_kshs=$grnd_amount_out_kshs+$amount_out_kshs;
	?></td>
	
	<td align="right"><?php 
	
	$amount_kshs=$curr_rate*$amount;
	$ledger_bal=$ledger_bal+$amount_kshs; 
	echo number_format($ledger_bal,2);
	
	?></td>
   
    </tr>
  <?php 
  //$grnd_amount_in_kshs=$grnd_amount_in_kshs+$amount_in_kshs;
  
  }
  ?>
  
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