<?php include('Connections/fundmaster.php');
$id=$_GET['deduction_type_id'];
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/station_submenu.php');  ?>
		
		<h3>:: Update Deduction Type Details</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_machine_category" action="processedit_ded_type.php?deduction_type_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';

$queryprodcat="select * from  deduction_logs where deduction_log_id='$id'";
$resultsprodcat=mysql_query($queryprodcat) or die ("Error: $queryprodcat.".mysql_error());
								  
$rowsprodcat=mysql_fetch_object($resultsprodcat);

?></td>
    </tr>
 <tr>
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Deduction Type Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="station_name" value="<?php echo $rowsprodcat->deduction_log_name;?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='pack_size_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td>Default Deduction Amount<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="default_ded_amount" value="<?php echo $rowsprodcat->default_deduction_amount;?>"></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("mach_cat_name","req","Please enter category name");
 /*frmvalidator.addValidation("group_desc","req","Please enter Lastname");
 frmvalidator.addValidation("phone_no","req","Please enter Phone Number");
  frmvalidator.addValidation("email_addr","req","Please enter  email address");
  frmvalidator.addValidation("email_addr","email","Please enter Valid email address");*/
 
 
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