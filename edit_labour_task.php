<?php
$service_item_id=$_GET['service_item_id'];

$sql="SELECT * FROM customer_region where region_id='$service_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$unit_id=$rows->unit_id;

$sql2="SELECT * FROM units where unit_id='$unit_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

$unit_name=$rows2->unit_name;





if (isset($_POST['add_subproject']))
{
edit_labour_task($cat_name,$unit_id,$cat_desc,$user_id);
}
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to save changes?");
}


</script>
<form name="new_supplier" action="process_edit_region.php?region_id=<?php echo $service_item_id; ?>" method="post">			
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Department Code :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="29" required name="cat_code" value="<?php echo $rows->region_code; ?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Department Name :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="29" required name="cat_name" value="<?php echo $rows->region_name; ?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   
   

   
   
   
  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Description</td>
    <td><textarea name="cat_desc" cols="30" rows="5"><?php echo $rows->region_desc;?></textarea></td>
    </tr>

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" onClick="return confirmDeletes();" value="Save">
	<input type="hidden" name="add_subproject" id="add_subproject" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("cat_name","req",">>Please enter labour task name");

 
 
 
 
  </SCRIPT>
