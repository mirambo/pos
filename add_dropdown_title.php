<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processadddropdowntitle.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addconfirm']==1)
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
	<!--<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="15%">Select Form Section<font color="#FF0000">*</font></td>
    <td width="40%"><select name="form_section">
	<option value="0">Select..................................</option>
								  <?php
								  
								  $query1="SELECT * FROM form_sections order by form_section_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->form_section_id;?>"><?php echo $rows1->form_section_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>-->
  <tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="10%">Drop Down Title Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="title_name"></td>
	  <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>

  </tr>
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="5%">Select form type<font color="#FF0000">*</font></td>
    <td width="23%">
	<input type="radio"  name="form_type" value="TextBox">Text
	<input type="radio"  name="form_type" value="Select">Select
	<input type="radio"  name="form_type" value="calendar">Calender
	<input type="radio"  name="form_type" value="calendar">Radio Button
	<input type="radio"  name="form_type" value="textarea">Text Area
	<input type="radio"  name="form_type" value="upload">Upload Textfield
	
	</td>

  </tr>
  <tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="5%">Sort Order <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="10" name="sort_order"></td>
   
  </tr>-->
  
  
   
  
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>

  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("title_name","req",">>Please drop down title name");


  </SCRIPT>