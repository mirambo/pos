<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$set_template_id=$_GET['set_template_id'];
$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$sub_project_id=$_GET['sub_project_id'];
$project_id=$_GET['project_id'];

?>
<form name="new_machine_category" action="process_add_more_set_template.php" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">
  <tr>
    <td width="18%">
	<input type="hidden" size="41" name="set_template_id" value="<?php echo $set_template_id?>">
	<input type="hidden" size="41" name="location_id" value="<?php echo $location_id?>">
	<input type="hidden" size="41" name="cc_id" value="<?php echo $cc_id?>">
	<input type="hidden" size="41" name="sub_project_id" value="<?php echo $sub_project_id?>"></td>
	<input type="hidden" size="41" name="project_id" value="<?php echo $project_id?>"></td>
	<td colspan="3" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>

	
	<tr  align="center">	
	

	<td colspan="4"><strong>Choose Output Activity Description </strong></td>  
  </tr>
  <tr style="background:url(images/description.gif);" height="20" align="center">
	<td width="100"><strong>Output Activity Description (as per Proposal Log Frame</strong></td>
	<td width="100"><strong>Target Deliverable Output</strong></td>
	<td width="100"><strong>Total Target Beneficiaries (Male)</strong></td>
	<td width="100"><strong>Total Target Beneficiaries (Female)</strong></td> 
  </tr>
  
	
	


	 <tr bgcolor="#FFFFCC" height="20" align="center">
	<td width="100"><input type="text" name="activity" size="50" ></td>
	<td width="100"><input type="text" name="target" size="20" ></td>
	<td width="100"><input type="text" name="target_male" size="20" ></td>
	<td width="100"><input type="text" name="target_female" size="20"></td>
	 
  </tr>
 
  <tr height="40">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="submit" value="Save">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
 
</table>


</form>



			
			
			
			