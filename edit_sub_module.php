<?php include('Connections/fundmaster.php'); 
$id=$_GET['sub_module_id'];

$sqlx="select * from sub_module where sub_module_id='$id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());;
$rowsx=mysql_fetch_object($resultsx)





?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

		
<form name="new_supplier" action="processeditsubmodule.php?sub_module_id=<?php echo $id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
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
	<!--<tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="17%">Select Module<font color="#FF0000">*</font></td>
    <td width="23%"><select name="module_id">
	<option value="0">Select Staff..................................</option>
								  <?php
								  
								  $query1="select * from modules order by sort_order asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->module_id;?>"><?php echo $rows1->module_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>-->
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="17%">Enter Sub Module Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="submodule_name" value="<?php echo $rowsx->sub_module_name;?>"></td>

  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Sort Order <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="10" name="sort_order" value="<?php echo $rowsx->sort_order;?>"></td>
   
  </tr>
  
  
   <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Link<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="56" rows="6" name="link"><?php echo $rowsx->sublink;?></textarea></td>
   
  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%" valign="top">Enter Description<font color="#FF0000"></font></td>
    <td width="23%"><textarea cols="36" rows="4" name="desc"><?php echo $rowsx->description;?></textarea></td>
   
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
 frmvalidator.addValidation("module_id","dontselect=0",">>Please select module name");
 frmvalidator.addValidation("submodule_name","req",">>Please enter sub module name");
 frmvalidator.addValidation("sort_order","req",">>Please enter sort order");
 frmvalidator.addValidation("link","req",">>Please enter link");
 
 
 
  </SCRIPT>

			
	