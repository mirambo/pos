<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processaddtaxblock.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Income from cant be greater than income to!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record</font></strong></p></div>';
?></td>
    </tr>
<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Core Competency<font color="#FF0000">*</font></td>
    <td width="23%"><select name="core_comp">	
	<option>Select..................................</option>
	
								  <?php
								
								  $queryinst="SELECT * FROM core_competence order by core_competence_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->core_competence_id; ?>"><?php echo $rowsinst->core_competence_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Key Indicator Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="indicator"></td>
    <td width="40%"  valign="top"></td>
  </tr>
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Description<font color="#FF0000">*</font></td>
    <td width="15%"><input type="text" size="41" name="desc"></td>
 <td width="22%" rowspan="3" valign="top" align="left"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
    <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Deliverable Target<font color="#FF0000">*</font></td>
    <td width="15%"><input type="text" size="41" name="target"></td>
 <td width="22%" rowspan="3" valign="top" align="left"><div id='new_supplier_errorloc' class='error_strings'></div></td>
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
  frmvalidator.addValidation("income_from","req",">>Please enter minimum amount range");
  frmvalidator.addValidation("income_to","req",">>Please enter maximum amount range");
  frmvalidator.addValidation("rate","req",">>Please enter rate in %");
 
 
 
  </SCRIPT>