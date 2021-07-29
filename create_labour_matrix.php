<?php
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>
 <?php
if (isset($_POST['add_item']))
{
add_labour_matrix($task_id,$engine_range_id,$flat_rate_hrs,$flat_rate_cost,$user_id);
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


<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
   
	<td colspan="6" height="30" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>
<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>
<?php
if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the labour cost matrix exist</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
    <td bgcolor="" width="10%">&nbsp;</td>
    <td width="19%" align="right">Select Service Item<font color="#FF0000">*</font></td>
    <td width="23%"><select name="task_id"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from service_item order by service_item_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->service_item_id; ?>"><?php echo $rows1->service_item_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select>	</td>
    <td width="20%" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
    
   
   <tr>
    <td>&nbsp;</td>
    <td colspan="2">
	<table align="right" width="100%" border="1" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td><input type="checkbox" name=""></td>
	<td><strong>Cost Item Name</strong></td>  
	<td><strong>Unit Quantity</strong></td>  
	<td><strong>Unit Cost</strong></td> 
	<td><strong>Currency</strong></td>  
	<td><strong>Current Exchange Rate</strong></td>  
	 
  </tr>
	<?php
								  
								  $queryst="select * FROM costing_item order by costing_item_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="module_id[]" value="<?php echo $rowsst->costing_item_id;?>"></td>
						
	   <td><?php echo $rowsst->costing_item_name;?></td>
	   <td><input type="textbox" name="unit_quantity[]"></td>
	   <td><input type="textbox" name="unit_cost[]"></td>
	   <td><input type="textbox" name="unit_cost[]"></td>
	   <td><input type="textbox" name="unit_cost[]"></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All National Staffs Are Currently Occupied</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
</table>
	
	</td>
 

	<td>&nbsp;</td>

	
	</tr>

  
  <tr>
    <td>&nbsp;</td>

    <td colspan="2" align="center"><input type="submit" name="submit" value="Save">
	<input type="hidden" name="add_item" id="add_item" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
 frmvalidator.addValidation("task_id","dontselect=0",">>Please select task name");
 frmvalidator.addValidation("engine_range_id","dontselect=0",">>Please select engine capacity range");
 frmvalidator.addValidation("flat_rate_hrs","req",">>Please enter flat rate hrs");
 frmvalidator.addValidation("flat_rate_cost","req",">>Please enter flat rate cost");

  </SCRIPT>
  <?php 
}
?>
  