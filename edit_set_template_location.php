<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
include ('functions.php'); 
include ('edit_form.php'); 
$set_template_id=$_GET['set_template_id'];
$location_id=$_GET['location_id'];
$cc_id=$_GET['cc_id'];
$sub_project_id=$_GET['sub_project_id'];

$sql="select * from nrc_location where location_id='$location_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


?>
<form name="new_machine_category" action="process_edit_set_template_location.php" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">
  <tr>

	<input type="text" size="41" name="set_template_id" value="<?php echo $set_template_id?>">
	<input type="hidden" size="41" name="location_id" value="<?php echo $location_id?>">
	<input type="hidden" size="41" name="cc_id" value="<?php echo $cc_id?>">
	<input type="hidden" size="41" name="sub_project_id" value="<?php echo $sub_project_id?>"></td>
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
	<td width="100">Select Location</td>
	 
  </tr>
  
	
	


	 <tr bgcolor="#FFFFCC" height="20" align="center">
	<td width="100">
	
	
	<select name="location_id"><option value="<?php echo $location_id?>"><?php echo $rows->location_name;?></option>	
								  <?php
								  
								  $query1="select * from nrc_location order by location_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->location_id;?>"><?php echo $rows1->location_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?>
								  
						  
								  </select></td>
	
	 
  </tr>

	


	
 
	

	
	
  
  
  
  <tr height="40">
    
    <td align="center"><input type="submit" name="submit" value="Update">
	<input type="hidden" name="edit_set_template" id="edit_set_template" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 
  </tr>
 
</table>


</form>



			
			
			
			