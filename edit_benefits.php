<?php include('Connections/fundmaster.php'); 
$id=$_GET['benefit_id'];

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
		
		
		
		<?php require_once('includes/benefits_submenu.php');  ?>
		
		<h3>:: Update Benefits Type</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_machine_category" action="processeditbenefits.php?benefit_id=<?php echo $id;?>" method="post">			
<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Updated Successfully!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';

$sql="select * from benefits where benefit_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
?></td>
    </tr>
 <!-- <tr height="30">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Choose Benefit Type<font color="#FF0000">*</font></td>
    <td width="23%"><input type="radio" name="benefit_type" value="Cash">Cash  <input type="radio" name="benefit_type" value="Non-Cash">Non-Cash</td>
    <td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  </tr>-->
  <tr height="30">
    <td>&nbsp;</td>
    <td>Benefit Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="benefit_name" value="<?php echo $rows->benefit_name;?>"></td>
	<td width="40%" rowspan="2" valign="top"><div id='new_machine_category_errorloc' class='error_strings'></div></td>
  
  <tr>
  
  <tr height="30">
    <td>&nbsp;</td>
    <td>Benefit Amount<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="benefit_amount" value="<?php echo $rows->benefit_amount;?>"></td>
	</tr>
	
	<!--<tr height="30">
    <td>&nbsp;</td>
    <td>Taxable<font color="#FF0000">*</font></td>
    <td width="23%"><input type="radio" name="taxable" value="Yes">Yes <input type="radio" name="taxable" value="No">No</td>
  
  <tr>-->
  
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
 var frmvalidator  = new Validator("new_machine_category");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("benefit_type","selone_radio",">>Please choose benefit type");
 frmvalidator.addValidation("benefit_name","req",">>Please enter benefit name");
 frmvalidator.addValidation("benefit_amount","req",">>Please enter benefit amount");
 frmvalidator.addValidation("taxable","selone_radio",">>Please Specify whether taxable or not");
   /*frmvalidator.addValidation("email_addr","req","Please enter  email address");
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