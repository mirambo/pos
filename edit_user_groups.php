<?php include('Connections/fundmaster.php'); 

$id=$_GET['user_group_id']

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
		
		
		
		<?php require_once('includes/groupsubmenu.php');  ?>
		
		<h3>:: Adding New User Group into the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processeditgroup.php?user_group_id=<?php echo $id; ?>" method="post">		
<?php 
$sql="select * from user_group where user_group_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());;
$rows=mysql_fetch_object($results)



?>


	
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editgroupconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >User Group Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td width="19%">User Group Name <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="group_name" value="<?php echo $rows->user_group_name; ?>"></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Enter Description</td>
    <td><textarea rows="5" cols="30" name="group_desc"><?php echo $rows->description; ?></textarea></td>
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
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("group_name","req","Please enter group name");
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