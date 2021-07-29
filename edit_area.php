<?php 
 $costing_item_id=$_GET['costing_item_id'];

$sql="SELECT * FROM costing_item where costing_item_id='$costing_item_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$unit_id=$rows->costing_unit_id;

$sql2="SELECT * FROM units where unit_id='$unit_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

$unit_name=$rows2->unit_name;

if (isset($_POST['edit_area']))
{
editarea($cat_name,$unit_id,$cat_desc,$user_id);
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



<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record Exist</font></strong></p></div>';
?></td>
    </tr>
  
  
	<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter costing Item Name :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="29" name="cat_name" value="<?php echo $rows->costing_item_name; ?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   
   <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Select Standard Units</td>
    <td><select name="unit_id"><option value="<?php echo $unit_id;?>"><?php echo $unit_name;?></option>
								  <?php
								  
								  $query1="select * from units order by unit_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->unit_id; ?>"><?php echo $rows1->unit_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select></td>
    </tr>

   
   
   
  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Description</td>
    <td><textarea name="cat_desc" cols="30" rows="5"><?php echo $rows->costing_item_desc;?></textarea></td>
    </tr>
	
	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
	<input type="submit" name="submit" value="Save">
	<input type="hidden" name="edit_area" id="edit_area" value="Update!!">
	
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 /*frmvalidator.addValidation("country","dontselect=0",">>Please select country");
 frmvalidator.addValidation("area_code","req",">>Please enter area code");
 frmvalidator.addValidation("area_name","req",">>Please enter area name");*/


 
  
 
 
  </SCRIPT>