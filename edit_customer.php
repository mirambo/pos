<?php include('Connections/fundmaster.php'); 
$id=$_GET['client_id'];
$sql="SELECT * FROM clients where client_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>

		<?php require_once('includes/customersubmenu.php');  ?>
		
		<h3>:: Update Client Details </h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processeditcustomer.php?client_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Customer Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the customer is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Customer Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="c_name" value="<?php echo $rows->c_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Contact Person</td>
    <td><input type="text" size="41" name="contact_person" value="<?php echo $rows->contact_person;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Phone Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_phone" value="<?php echo $rows->c_phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_telephone" value="<?php echo $rows->c_telephone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_email" value="<?php echo $rows->c_email;?>"></td>
    </tr>
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Delivery Address</strong></td>
	<td width="18%">&nbsp;</td>
    </tr>
  	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address</td>
    <td><input type="text" size="41" name="c_address" value="<?php echo $rows->c_address;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Physical Address/Building</td>
    <td><input type="text" size="41" name="cp_address" value="<?php echo $rows->c_paddress;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Street<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_street" value="<?php echo $rows->c_street;?>"></td>
    </tr>
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>City/Town</td>
    <td><input type="text" size="41" name="c_town" value="<?php echo $rows->c_town;?>"></td>
    </tr>
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Statement Details</strong></td>
	<td width="18%">&nbsp;</td>
    </tr>
<tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Send Monthly Statement?<font color="#FF0000"></font></td>
    <td width="23%">
	<?php 
	$allow_send=$rows->monthly_statement;
	if ($allow_send==1)
	{
	?>
	<input type="radio" name="allow_add" value="1" checked>Yes<input type="radio" name="allow_add" value="0" >No
	<?php
}
else
{?>
<input type="radio" name="allow_add" value="1">Yes<input type="radio" name="allow_add" value="0" checked>No
<?php

}
	?>
	
	</td>
    <td width="40%" valign="top"></td>
  </tr>
<tr height="20">
    <td bgcolor="" >&nbsp;</td>
    <td width="1%" valign="top">Which Date<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" name="date_sent" size="40" id="date_sent" readonly="readonly" value="<?php echo $rows->statement_date; ?>"/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
    <td width="40%" valign="top"></td>
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

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_sent",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_sent"       // ID of the button
    }
  );
  
  
  
  
  
  </script>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("c_name","req","Please enter customer name");
 frmvalidator.addValidation("cp_address","req","Please enter physical address");
 frmvalidator.addValidation("c_phone","req","Please enter phone number");
 frmvalidator.addValidation("c_town","req","Please enter town");
 frmvalidator.addValidation("c_email","req","Please enter email address");
 frmvalidator.addValidation("c_email","email","Please enter valid email address");
 
 
 
  </SCRIPT>
  
  

			
			
			
					
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