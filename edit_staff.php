<?php 
include('Connections/fundmaster.php');
$emp_id=$_GET['emp_id'];
?>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="new_supplier" action="processeditstaff.php?emp_id=<?php echo $emp_id; ?>" method="post">	
<table width="60%" border="0" align="center">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteuniversityconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  
 
  
  <?php 
  
$sqlsec="SELECT * FROM form_sections";
$resultssec= mysql_query($sqlsec) or die ("Error $sqlsec.".mysql_error());
  
 if (mysql_num_rows($resultssec) > 0)
						  {
						
							  while ($rowssec=mysql_fetch_object($resultssec))
							  { ?>
  
  <tr><td>
  <table width="100%" border="0">
  <tr  style="background:url(images/description.gif);" height="30" > <td width="100"></td><td colspan="2"><h4><?php echo $rowssec->form_section_name; ?></h4></td></tr>
 <?php 
 $id=$rowssec->form_section_id;
 $sql="SELECT * FROM form_fields where form_section_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());




if (mysql_num_rows($results) > 0)
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
    <td width="150"><?php echo $rows->form_field_name;?></td>
	<td align="left"><?php 
	
	$form_type=$rows->form_field_type;
	
	if ($form_type=="TextBox")
	{
$idx=$rows->form_field_id;
$sql2="SELECT * FROM hr_form_logs where form_id='$idx' and data_id='$emp_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);	

	?>
<input type="text" name="form_id[]" size="40" value="<?php echo $rows2->response;?>">
<input type="hidden" name="form_no[]" size="40" value="<?php echo $rows->form_field_id; ?>">

	<?php
	}
	elseif ($form_type=="Select")
{

$idz=$rows->form_field_id;
$sql2="SELECT * FROM hr_form_logs where form_id='$idz' and data_id='$emp_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);
	?>
<select name="form_id[]">
<option value="<?php echo $rows2->response;?>"><?php echo $rows2->response; ?></option>
<?php 
$sqld="SELECT * FROM drop_down where form_field_id='$idz'";
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



<input type="hidden" name="form_no[]" size="40" value="<?php echo $rows->form_field_id; ?>">

<option value=""></option></select>
	<?php
}
elseif ($form_type=="calendar")
{
$idy=$rows->form_field_id;
$sql2="SELECT * FROM hr_form_logs where form_id='$idy' and data_id='$emp_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

?>
<input type="text" name="form_id[]" size="40" id="<?php echo $rows->form_field_id;?>" readonly="readonly" value="<?php echo $rows2->response; ?>"/><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
<input type="hidden" name="form_no[]" size="30" value="<?php echo $rows->form_field_id; ?>">

<?php
}

elseif ($form_type=="textarea")
{

$idy=$rows->form_field_id;
$sql2="SELECT * FROM hr_form_logs where form_id='$idy' and data_id='$emp_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

?>
<textarea name="form_id[]" colspan="10" rowspan="10"></textarea>
<input type="hidden" name="form_no[]" size="30" value="<?php echo $rows->form_field_id; ?>">
<?php
}
	?>
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
  