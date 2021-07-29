<?php
if (isset($_POST['add_project']))
{
add_project($country_id,$project_code,$project_name,$start_date,$end_date,$donor_id,$project_desc,$status);
}
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<SCRIPT language="javascript">
function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}

</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script src="jquery.min.js"></script>
 

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

<script>
 $(document).ready(function(){
 
  
 var cnt = 1;
 $("#anc_add").click(function(){
 $('#tbl1 tr').last().after('<tr><td><input type="text" size="20" name="project_code[]"></td><td><input type="text" name="project_name[]"></td><td><input type="text" name="start_date[]" size="20" style="font-size:11px;" title="Quantity" style="color:#888;" value="yyyy-mm-dd" onfocus="inputFocus(this)" onblur="inputBlur(this)"></td><td><input type="text" name="end_date[]" size="20" style="font-size:11px;" title="Quantity" style="color:#888;" value="yyyy-mm-dd" onfocus="inputFocus(this)" onblur="inputBlur(this)"></td><td><select name="donor_id[]"><option>Select....................</option><?php $query1="select * from nrc_donor order by donor_name asc"; $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error()); if (mysql_num_rows($results1)>0){while ($rows1=mysql_fetch_object($results1)) { ?><option value="<?php echo $rows1->donor_id;?>"><?php echo '('.$rows1->donor_code.') '. $rows1->donor_name; ?> </option><?php  }}?></select></td><td> <select name="status[]"><option value="0">Select....................</option><option value="1">Active</option><option value="2">Completed</option><option value="3">Not Started</option></select></td><td><input type="text" name="project_desc[]"></td></tr>');
 cnt++;
 });

$("#anc_rem").click(function(){
 $('#tbl1 tr:last-child').remove();
 });

}


);

 </script>

	
			<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
    
	<td colspan="5" height="30" align="center">
	<div id='new_supplier_errorloc' class='error_strings'></div>
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<?php 

	$queryinst="SELECT nrc_project.project_id,nrc_project.start_date,nrc_project.end_date,nrc_project.project_code,
	nrc_project.project_name,nrc_sub_project.sub_project_id,nrc_sub_project.project_id,nrc_sub_project.sub_project_code,nrc_sub_project.sub_project_name,
nrc_sub_project.start_date as sdate,nrc_sub_project.end_date as edate FROM nrc_project,nrc_sub_project 
	WHERE nrc_project.project_id=nrc_sub_project.project_id AND nrc_sub_project.sub_project_id='$sub_project_id'";
	$resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
	$rowsinst=mysql_fetch_object($resultsinst);

?>	
<!--<tr height="50" bgcolor="#FFFFCC">
    
    <td colspan="7" align="center">
	<strong>Main Project Name : </strong><i><?php echo $rowsinst->project_name;?></i>
	
	<input type="hidden" name="project_id" value="<?php echo $rowsinst->project_id;?>">
	
	<strong>Project Code : </strong><i><?php echo $rowsinst->project_code;?></i>
	
	<strong>Project Start Date: </strong><i><?php echo $rowsinst->start_date;  ?></i>
	
	<strong>Project End Date: </strong><i><?php echo $rowsinst->end_date;;  ?></i>
	</br>
		</br>
	
	<strong>Sub Project Name : </strong><i><?php echo $rowsinst->sub_project_name;  ?></i>
	
	<strong>Code : </strong><i><?php echo $rowsinst->sub_project_code;  ?></i>
	
	<strong>Start Date: </strong><i><?php echo $rowsinst->sdate;  ?></i>
	
	<strong>End Date: </strong><i><?php echo $rowsinst->edate;  ?></i>
	</br>

	</tr>-->
	
	<!--<tr height="50">
    <td bgcolor="">&nbsp;</td>
    <td width="19%" align="right">Select Implementation Location<font color="#FF0000">*</font></td>
    <td width="23%">
	
	
	<select name="location_id">

	<option value="0">Select Implementation Location-----------------------------------</option>
	
	
	
								  <?php								  
								  $query1="SELECT * from nrc_location,nrc_subprojectvslocation where 
								  nrc_location.location_id=nrc_subprojectvslocation.location_id AND 
								  nrc_subprojectvslocation.sub_project_id='$sub_project_id'  
								  group by nrc_location.location_id order by nrc_location.location_name asc ";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { 
									  
									  
									  ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_code.' - '.$rows1->location_name.' ';?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
								  
								  
								  
								  									  

								  
								  ?></select>
	
	</td>
	<td width="24%" rowspan="2"><div id='new_supplier_errorloc' class='error_strings'></div></td>
   
  </tr>-->
  
<tr height="50" bgcolor="#FFFFCC">
   
    <td  align="center" colspan="5">Select Country<font color="#FF0000">*</font>
 
	<select name="country_id">	<option value="0">................Select Country.............</option>	
								  <?php
								  
								  $query1="select * from nrc_country order by country_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->country_id;?>"><?php echo $rows1->country_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?>
								  
						  
								  </select>
	</td>
  </tr>
  
   
    <td colspan="4" valign="top" align="center">

	<table align="center" width="110%" border="1" class="table1" id="tbl1">
	
	<tr  align="center">	
	

	<td colspan="6"><strong>Panel To Enter Project Details </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100">Project Code</td>
	<td width="100">Project Name</td>
	<td width="100">Start Date</td>
	<td width="100">End Date</td>
	<td width="100">Select Donor</td>  
	<td width="100">Select Status</td>  
	<td width="100">Description</td>  
  </tr>
  
	
	
	</table>

	

	
<td width="10%"  valign="top"><a href="javascript:void(0);" id='anc_add'>Add Row</a>
 <a href="javascript:void(0);" id='anc_rem'>Remove Row</a></td>

	
 
	
  </tr>	
	
	
  
  
  
  <tr height="40">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="add_project" id="add_project" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
 
</table>

</form>

<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "end_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "end_date"       // ID of the button
    }
  );
  
  
  
  </script>-->
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("country_id","dontselect=0",">>Please select country!!");
 frmvalidator.addValidation("cc_id","dontselect=0",">>Please select competency to proceed!!");
 frmvalidator.addValidation("sub_project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>