<?php include('Connections/fundmaster.php'); 
$id=$_GET['cash_deposit_id'];
$sql="SELECT cash_deposits.comments,cash_deposits.cash_deposit_id,cash_deposits.person_dep,cash_deposits.curr_id,
cash_deposits.amount,cash_deposits.phone_no,cash_deposits.date_recorded,cash_deposits.date_deposited,banks.bank_name,
banks.account_name,cash_deposits.curr_rate,cash_deposits.deposit_slip_no,cash_deposits.bank_deposited,currency.curr_name
FROM banks,cash_deposits,currency where cash_deposits.bank_deposited=banks.bank_id AND 
currency.curr_id=cash_deposits.curr_id AND cash_deposits.cash_deposit_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
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
    return confirm("Are you sure you want to save changes?");
}

</script>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

	<?php require_once('includes/banking_submenu.php');  ?>
		
		<h3>:: Update Cash Deposits Details </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processeditcashdeposit.php?cash_deposit_id=<?php echo $id; ?>" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Cash Deposit Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record is existing</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Deposit Slip Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="slip_no" value="<?php echo $rows->deposit_slip_no; ?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount Deposited<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount" value="<?php echo $rows->amount;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td>
	<select name="currency">
	                 <option value="<?php echo $rows->curr_id;?>"><?php echo $rows->curr_name;?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM currency order by curr_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->curr_id;?>"><?php echo $rowscurr->curr_name;?></option>
									<?php
									}
									}
									

									?>
									
                               </select>	
							   </td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td>Exchange Rate (To Kshs)<font color="#FF0000">*</font></td>
    <td><input type="text" name="curr_rate" size="40" value="<?php echo $rows->curr_rate; ?>"/></td>
    </tr>	
	
	
	
	<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Select Bank Deposited To<font color="#FF0000">*</font></td>
    <td width="23%"><select name="dep_bank">
<option value="<?php echo $rows->bank_deposited;?>"><?php echo $rows->bank_name.' ('.$rows->account_name.')';?></option>
								  
										  
                                    <?php 
$sqlcurr="SELECT * FROM banks order by bank_name asc";
$resultscurr= mysql_query($sqlcurr) or die ("Error $sqlcurr.".mysql_error()); 
if (mysql_num_rows($resultscurr) > 0)
{
						while ($rowscurr=mysql_fetch_object($resultscurr))
							{						
								?>  
										  
                                    <option value="<?php echo $rowscurr->bank_id;?>"><?php echo $rowscurr->bank_name.' ('.$rowscurr->account_name.')';?></option>
									<?php
									}
									}
									

									?>
									
                               </select></td>
    
  </tr> 
   <tr height="20">
    <td>&nbsp;</td>
    <td>Person Deposited (Full Name)<font color="#FF0000">*</font></td>
    <td><input type="text" name="person_dep" size="40" value="<?php echo $rows->person_dep;?>"/></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Person Phone No<font color="#FF0000">*</font></td>
    <td><input type="text" name="phone_no" size="40" value="<?php echo $rows->phone_no;?>"/></td>
    </tr>
	
	
	
  
  <tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Date Deposited<font color="#FF0000">*</font></td>
    <td><input type="text" name="date_deposited" size="40" id="date_deposited" value="<?php echo $rows->date_deposited;?>" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Comments<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36"><?php echo $rows->comments;?></textarea></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	
	
  
  <tr>
 <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmDelete();" value="Update!!">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<script type="text/javascript">
  /*Calendar.setup(
    {
      inputField  : "cheque_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "cheque_date"       // ID of the button
    }
  );*/
  
   Calendar.setup(
    {
      inputField  : "date_deposited",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_deposited"       // ID of the button
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