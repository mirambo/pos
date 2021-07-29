<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

$product_id=$_GET['product_id'];
$shop_id=$_GET['shop_id'];
$invoice_id=$_GET['invoice_id'];
//$convert=$_GET['convert'];



?>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to adjust?");
}

</script>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<!--<script language="JavaScript" type="text/javascript">
function CloseAndRefresh()
{
opener.location.reload(true);
self.close();
}
</script>-->
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="new_user" action="processadjust_product.php?product_id=<?php echo $product_id; ?>&shop_id=<?php echo $shop_id ?>" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">
<tr bgcolor="#FF9900">
  
	<input type="hidden" size="41" name="invoice_id" value="<?php echo $invoice_id;?>">
	<input type="hidden" size="41" name="booking_id" value="<?php echo $booking_id;?>">
	<input type="hidden" size="41" name="convert" value="<?php echo $convert;?>">


	<td colspan="4" height="30" align="center"><strong><font size="+1">Adjust Item : <?php

$sql2="select * FROM items WHERE item_id='$product_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());	
$rows2=mysql_fetch_object($results2);

echo $rows2->item_name.' ('.$rows2->item_code.')';
	
	
	

?></font></strong></td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Enter Adjustment Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="exit_date" size="40" id="exit_date" readonly /></td>
	<td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>

<tr height="20" >
    <td>&nbsp;</td>
    <td width="15%">Enter Quantity<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount"></td>
	
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Reduce / Increase<font color="#FF0000">*</font></td>
    <td><select name="account">				  
										  
                                    
	<option value="0">-------------------Select-----------------------</option>
	<option value="2">Reduce Balance</option>
	<option value="1">Increase Balance</option>
								  
									
                               </select></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>
	
  
   <tr height="20">
    <td>&nbsp;</td>
    <td>Reason for adjustment<font color="#FF0000">*</font></td>
    <td><textarea name="desc" rows="3" cols="36"></textarea></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="CloseAndRefresh();" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
   
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("exit_date","req",">>Please enter adjustment date");
 frmvalidator.addValidation("amount","req",">>Please enter the quantity");
 frmvalidator.addValidation("account","dontselect=0",">>Please select either to increase or reduce balance");
 frmvalidator.addValidation("desc","req",">>Please enter reason for adjustments");

 
 
  </SCRIPT>	
  
  <script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "exit_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "exit_date"       // ID of the button
    }
  );
    
  
  </script>
	


</form>



			
			
			
			