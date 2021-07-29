<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<form name="emp" action="process_assign_more_location.php" method="post">			
<table width="100%" border="0" class="table1" id="tbl1">
  <tr>
    
	<td colspan="4" height="30"><?php

if ($_GET['addbenefitsconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Benefit Type Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?>

<span ><div id='emp_errorloc' class='error_strings'></div></span>

</td>
    </tr>

	
	<tr  align="center">	
	

	<td colspan="4"><strong>Choose Project And location </strong></td>  
  </tr>
  <tr height="30" bgcolor="#FFFFCC">
   

    <td width="23%" colspan="4" align="center">  <strong>Select Project<font color="#FF0000">* </font></strong>
	<select name="project_id"><option value="0">Select..........................................................</option>
								  <?php
								  
								  $query1="select * from nrc_project WHERE status='1' order by project_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->project_id;?>"><?php echo $rows1->project_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  <strong>Select Location<font color="#FF0000">* </font></strong>
	<select name="location_id"><option>Select..........................................................</option>
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
									  
									  
								  
								  
								  
								  
								  
								  ?></select>
								  
								  
								  
								  
								  
								  </td>
    
  </tr>
 
  <tr height="40">

    <td align="center" colspan="4">
	<input type="submit" name="submit" value="Save">
	&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    
  </tr>
 
</table>


</form>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("project_id","dontselect=0",">>Please select project");
 frmvalidator.addValidation("country_id","dontselect=0",">>Please select country");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>




			
			
			
			