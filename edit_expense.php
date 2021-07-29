<?php $expenses_id=$_GET['expense_id'];?>
<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<form name="new_supplier" action="processeditexp.php?expenses_id=<?php echo $expenses_id;?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Expense Updated successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the recorded is existing</font></strong></p></div>';
?></td>
    </tr>
	<?php
$sql="SELECT expenses.expense_id,expenses.description,expenses.curr_id,expenses.amount,expenses.mop,expenses.date_of_transaction,expenses.curr_rate,currency.curr_initials 
FROM expenses,currency where currency.curr_id=expenses.curr_id AND expenses.expense_id='$expenses_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);



	?>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" valign="top">Enter Expenses Description<font color="#FF0000">*</font></td>
    <td width="23%"><textarea name="desc" rows="3" cols="36"><?php echo $rows->description;?></textarea></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount" value="<?php echo $rows->amount;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Currency<font color="#FF0000">*</font></td>
    <td>
	<select name="currency">
	                 
										  
                            
		
	<?php	
	
$sql="SELECT expenses.expense_id,expenses.description,expenses.curr_id,expenses.amount,expenses.mop,expenses.date_of_transaction,expenses.curr_rate,currency.curr_initials 
FROM expenses,currency where currency.curr_id=expenses.curr_id AND expenses.expense_id='$expenses_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	?>							
	<option value="<?php echo $rows->curr_id;?>"><?php echo $rows->curr_initials; ?></option>								
									
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
    <td>Select Mode of Payment<font color="#FF0000">*</font></td>
    <td>
	<select name="mop">
	                  <option value="<?php echo $rows->mop?>"><?php echo $rows->mop;?></option>
								  
										  
                                    <option value="Cash">Cash</option>
									<option value="Cheque">Cheque</option>
									<option value="Bank Transfer">Bank Transfer</option>
									
                               </select>	
							   </td>
    </tr>
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("desc","req","Please enter description");
 frmvalidator.addValidation("amount","req","Please enter amount");
 frmvalidator.addValidation("currency","dontselect=0","Please select currency");
 frmvalidator.addValidation("mop","dontselect=0","Please select mode of payment");
 
 
 
 
  </SCRIPT>