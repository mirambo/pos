<?php
$per_hour_charge_id=$_GET['per_hour_charge_id'];
 ?>
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

<form name="new_supplier" action="processeditcdp.php?per_hour_charge_id=<?php echo $per_hour_charge_id; ?>" method="post">			
<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30">
<?php
if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	<?php 
$sql="SELECT per_hour_charge.per_hour_charge_value,per_hour_charge.per_hour_charge_id,per_hour_charge.curr_rate,per_hour_charge.curr_id,currency.curr_name,currency.curr_initials FROM per_hour_charge,currency
 where per_hour_charge.curr_id=currency.curr_id AND per_hour_charge_id='$per_hour_charge_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

	?>	
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Currency<font color="#FF0000">*</font></td>
    <td width="23%">
<select name="currency">
<?php
if ($per_hour_charge_id!='')
{?>	
	
<option value="<?php echo $rows->curr_id; ?>"><?php echo $rows->curr_initials; ?></option>
	
<?php
}
else
{								
								  $queryinst="SELECT * FROM currency order by curr_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->curr_id; ?>"><?php echo $rowsinst->curr_initials; ?> </option>
                                    
                                
										  
										<?php  
										
										}
									  
									  
									  }
								  
								  
								  }
								  
								  
								  ?>
								  
								  </select>
	</td>
    <td width="40%" rowspan="8" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Enter Amount (Per Hour Charges)<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="per_hour_charge" value="<?php echo $rows->per_hour_charge_value;?>" ></td>
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
 frmvalidator.addValidation("country","dontselect=0",">>Please select country");
 frmvalidator.addValidation("date","req",">>Please enter date");
frmvalidator.addValidation("venue","req",">>Please enter venue");
frmvalidator.addValidation("topic","req",">>Please enter topic");
frmvalidator.addValidation("total_part","req",">>Please enter total participants"); 
frmvalidator.addValidation("total_part","numeric",">>Total participants must be a number");
frmvalidator.addValidation("male_part","numeric",">>Male participants must be a number");
frmvalidator.addValidation("female_part","numeric",">>Female participants must be a number");
frmvalidator.addValidation("facillitator","req",">>Please enter attleast a facilitator");
frmvalidator.addValidation("sponsor1","req",">>Please enter sponsor 1");
 
 
 
 
  </SCRIPT>