<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
?>
<?php 

$id=$_GET['sub_cat_id'];

$sql="SELECT * FROM items_sub_category where sub_cat_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

$sub_cat_name=$rows->sub_cat_name;

$cat_id=$rows->cat_id;

$sql2="SELECT * FROM items_category where cat_id='$cat_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());
$rows2=mysql_fetch_object($results2);

$cat_name=$rows2->cat_name;

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

<form name="new_supplier" action="process_edit_sub_category.php?sub_cat_id=<?php echo $cat_id; ?>" method="post">			
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
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Category Name :<font color="#FF0000">*</font></td>
    <td width="23%"><select name="cat_id" style="width:200px;"><option value="<?php echo $id?>"><?php echo $cat_name; ?></option>
								  <?php
								  
								  $query1="select * from items_category order by cat_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->cat_id; ?>"><?php echo $rows1->cat_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
    <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Sub-Category Name :<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="29" value="<?php echo $sub_cat_name; ?>" name="sub_cat_name"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
   
  <tr height="20">
    <td>&nbsp;</td>
    <td valign="top">Description</td>
    <td><textarea name="cat_desc" cols="30" rows="5"></textarea></td>
    </tr>

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">
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
/*  frmvalidator.addValidation("cat_id","dontselect=0",">>Please select category name");
 frmvalidator.addValidation("sub_cat_name","req",">>Please enter sub category name"); */

 
 
 
 
  </SCRIPT>
    <?php 
}
?>