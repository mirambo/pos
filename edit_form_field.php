<?php
$id=$_GET['form_field_id'];

$sql="SELECT form_sections.form_section_name,form_fields.form_field_name,form_fields.form_section_id,form_fields.form_field_id,form_fields.form_field_type,form_fields.form_field_type,
form_fields.sort_order FROM form_sections,form_fields WHERE form_fields.form_section_id=form_sections.form_section_id and form_fields.form_field_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

 ?>

<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processeditfield.php?form_field_id=<?php echo $id ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
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
	<tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Select Form Section<font color="#FF0000">*</font></td>
    <td width="23%"><select name="form_section">
	<?php 
	if ($id!='')
	{?>
	<option value="<?php echo $rows->form_section_id;?>"><?php echo $rows->form_section_name; ?></option>
	<?php	
	
$query1="SELECT * FROM form_sections";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->form_section_id;?>"><?php echo $rows1->form_section_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }	
	
								  
								  
								  
				}				  
								  
							  
								  ?>
								  
</select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Enter Form Field Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="field_name" value="<?php echo $rows->form_field_name; ?>"></td>

  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select form type<font color="#FF0000">*</font></td>
    <td width="23%">
	<?php
$form_field_type=$rows->form_field_type;
if ($form_field_type=='TextBox')
{
?>
	<input type="radio"  name="form_type" value="TextBox" checked>Text
	<input type="radio"  name="form_type" value="Select">Select
	<input type="radio"  name="form_type" value="calendar">Calender
	<input type="radio"  name="form_type" value="textarea">Text Area
<?php 
}
elseif ($form_field_type=='Select')
{
?>	
	
		<input type="radio"  name="form_type" value="TextBox" >Text
	<input type="radio"  name="form_type" value="Select" checked>Select
	<input type="radio"  name="form_type" value="calendar">Calender
	<input type="radio"  name="form_type" value="textarea">Text Area
	<?php 
	}
	elseif ($form_field_type=='calendar')
{
	?>
		<input type="radio"  name="form_type" value="TextBox" >Text
	<input type="radio"  name="form_type" value="Select" >Select
	<input type="radio"  name="form_type" value="calendar" checked>Calender
	<input type="radio"  name="form_type" value="textarea">Text Area
	<?php
}
elseif ($form_field_type=='textarea')
{
	?>
		<input type="radio"  name="form_type" value="TextBox" >Text
	<input type="radio"  name="form_type" value="Select" >Select
	<input type="radio"  name="form_type" value="calendar">Calender
	<input type="radio"  name="form_type" value="textarea" checked>Text Area
<?php 
}

?>	
	</td>

  </tr>
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Sort Order <font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="10" name="sort_order" value="<?php echo $rows->sort_order; ?>"></td>
   
  </tr>
  
  
   
  
	
	
  
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
 frmvalidator.addValidation("form_section","dontselect=0",">>Please select form section name");
 frmvalidator.addValidation("field_name","req",">>Please enter field name");
 frmvalidator.addValidation("form_type","selone_radio",">>Please select field type");
 frmvalidator.addValidation("sort_order","req",">>Please enter sort order");

  </SCRIPT>