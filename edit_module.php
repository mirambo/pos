<?php include('Connections/fundmaster.php'); 
$id=$_GET['module_id'];

$sqlx="select * from modules where module_id='$id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());;
$rowsx=mysql_fetch_object($resultsx)





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
		
		
		
		<?php require_once('includes/module_submenu.php');  ?>
		
		<h3>:: Update Module</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_supplier" action="processeditmodule.php?module_id=<?php echo $id;?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addgroupconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Module Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="module_name" value="<?php echo $rowsx->module_name;?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Sort Order <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="10" name="sort_order" value="<?php echo $rowsx->sort_order;?>"></td>
   
  </tr>
  
  
   <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Link<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="36" rows="4" name="link"><?php echo $rowsx->link;?></textarea></td>
   
  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Enter Description<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="36" rows="4" name="desc"><?php echo $rowsx->description;?></textarea></td>
   
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
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("module_name","req",">>Please enter module name");
 frmvalidator.addValidation("sort_order","req",">>Please enter sort order");
 frmvalidator.addValidation("link","req",">>Please enter link");
 
 
 
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