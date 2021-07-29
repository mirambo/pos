<?php 
include('Connections/fundmaster.php');
?>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<!--<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>-->
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="new_supplier" action="processaddemptest.php" method="post">	
<table width="60%" border="0" align="center">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Created Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteuniversityconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
 
  
  <?php 
  
$sqlsec="SELECT * FROM form_sections order by sort_order asc";
$resultssec= mysql_query($sqlsec) or die ("Error $sqlsec.".mysql_error());
  
 if (mysql_num_rows($resultssec) > 0)
						  {
						
							  while ($rowssec=mysql_fetch_object($resultssec))
							  { ?>
  
  <tr><td>
  <table width="100%" border="0">
  <tr  style="background:url(images/description.gif);" height="30" > <td width="100"></td><td colspan="2"><h4><?php echo $rowssec->form_section_name; ?></h4></td><td width="100"></td></tr>
 <?php 
$id=$rowssec->form_section_id;
$sql="SELECT * FROM form_fields where form_section_id='$id' order by sort_order asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if ($numrows=mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 
 
 ?>
 <td width="100"></td>
    <td width="150"><strong><?php echo $form_field_name=$rows->form_field_name;?></strong></td>
	<td align="left"><?php 
	
	$form_type=$rows->form_field_type;
	
	if ($form_type=="TextBox")
	{?>
<input type="text" name="form_id[]" size="40">
<input type="hidden" name="form_no[]" size="40" value="<?php echo $form_field_id=$rows->form_field_id; ?>">

	<?php
	}
elseif ($form_type=="Select")
	{
	$form_field_id=$rows->form_field_id;
	?>
<select name="form_id[]"><option value="0">------------------Select--------------------</option>
<?php 
$sqld="SELECT * FROM drop_down where form_field_id='$form_field_id' order by dropdown_name asc";
$resultsd= mysql_query($sqld) or die ("Error $sql.".mysql_error());

if (mysql_num_rows($resultsd) > 0)
						  {
							
							  while ($rowsd=mysql_fetch_object($resultsd))
							  { ?>
							  
		<option value="<?php echo $rowsd->dropdown_name; ?>"><?php echo $rowsd->dropdown_name;  ?></option>					  
							  
							  <?php
}

}
?>



<input type="hidden" name="form_no[]" size="40" value="<?php echo $form_field_id=$rows->form_field_id; ?>">

<option value=""></option></select>
	<?php
}
elseif ($form_type=="calendar")
{
?>
<input type="text" name="form_id[]" size="40" id="<?php echo $form_field_id=$rows->form_field_id;?>" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
<input type="hidden" name="form_no[]" size="30" value="<?php echo $form_field_id=$rows->form_field_id; ?>">

<?php
}

elseif ($form_type=="textarea")
{
?>
<textarea name="form_id[]" cols="35" rows="5"></textarea>
<input type="hidden" name="form_no[]" size="30" value="<?php echo $form_field_id=$rows->form_field_id; ?>">
<?php
}
elseif ($form_type=="upload")
{
?>
<input type="file" name="form_id[]"  size="28">
<input type="hidden" name="form_no[]" size="30" value="<?php echo $form_field_id=$rows->form_field_id; ?>">
<?php
}
	?>
	</td>
	<td>
	<div id='new_supplier_errorloc' class='error_strings'></div>
<?php
$form_field_name;
$form_field_id;

 ?>	

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 
 <?php 
$sqlval="SELECT * FROM form_fields";
$resultsval= mysql_query($sqlval) or die ("Error $sqlval.".mysql_error());
if ($numrowsval=mysql_num_rows($resultsval) > 0)
						  {
							  
							  while ($rowsval=mysql_fetch_object($resultsval))
							  { 
							  
							 
 ?>
 
 frmvalidator.addValidation("<?php echo $rowsval->form_field_id;?>","req",">>Please enter <?php echo $rowsval->form_field_name; ?>");
 <?php 
 }
 
 }
 
 ?>
 
 
  
 </SCRIPT>
	
	
	
	</td>
	
   
    </tr>
  <?php 
  
  }
  
  }
  
  ?>
  <tr>

  
  </table>
  <?php 
  }}
  
  ?>
  </td></tr>
  
 

  
  
  <td align="center"><input type="submit" name="submit" value="Save"></td>
  <td align="center"></td>

  </tr>
  

</table>
</form>
<?php
$sqlcal="SELECT * FROM form_fields where form_field_type='calendar'";
$resultscal= mysql_query($sqlcal) or die ("Error $sqlcal.".mysql_error());
if (mysql_num_rows($resultscal) > 0)
						  {
						  
						  while ($rowscal=mysql_fetch_object($resultscal))
							  { 
						  
						  

 ?>

<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "<?php echo $rowscal->form_field_id;?>",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "<?php echo $rowscal->form_field_id;?>"       // ID of the button
    }
  );
 
  </script>
  <?php
}
}

  ?>
  