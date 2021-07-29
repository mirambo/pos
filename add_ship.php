<?php 
include('Connections/fundmaster.php'); 
$id=$_GET[''];
$newsup=$_GET['newsup'];
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
		
		
		
		<?php require_once('includes/shipsubmenu.php');  ?>
		
		<h3>:: Adding New Shipping Agent</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_ship" action="processaddship.php?newsup=<?php echo $newsup ?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addshipconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Shipper Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Shipping Agent Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="agent_name">
   </td>
    <td width="40%" rowspan="5" valign="top"><div id='new_ship_errorloc' class='error_strings'></div></td>
  </tr>
	
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Postal Address </td>
    <td width="23%"><input type="text" size="41" name="address"></td>
    <td width="50%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Town<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="town"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Phone No.<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="phone"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
  
  <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Email Address<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="email"></td>
    <td width="40%" rowspan="2" valign="top"></td>
  </tr>
 <!--<tr height="30">
    <td>&nbsp;</td>
    <td>Enter Description</td>
    <td><textarea rows="5" cols="30" name="mach_cat_desc"></textarea></td>
    </tr>-->
  
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
 var frmvalidator  = new Validator("new_ship");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 /*frmvalidator.addValidation("prod_cat","dontselect=0","Please select product category");*/
 frmvalidator.addValidation("agent_name","req","Please enter shippers name");
 /*frmvalidator.addValidation("town","req","Please enter town");
 frmvalidator.addValidation("phone","req","Please enter phone");
 frmvalidator.addValidation("email","req","Please enter  email address");
 frmvalidator.addValidation("email","email","Please enter valid email address");*/
 
 
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