<?php
$bunch_id=$_GET['bunch_id'];
$original_bunch_id=$_GET['original_bunch_id'];
 ?>

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="diag" id="diag" action="processadminaddoutreach2.php?bunch_id=<?php echo $bunch_id ?>&original_bunch_id=<?php echo $original_bunch_id; ?>" method="post">			
			<table width="100%" border="0">
 
	<tr height="20">
	
	<td colspan="7" ><h3>Project Details</h3></td>
    
   
    </tr>
	<?php 
	
	$querydet="select blocks.block_name,clients.c_name,employees.emp_fname,employees.emp_mname,employees.emp_lname,bunch.period_from,bunch.period_to from bunch,blocks,clients,employees
	where bunch.block_id=blocks.block_id AND bunch.project_manager_id=employees.emp_id AND bunch.client_id=clients.client_id AND bunch.bunch_id='$bunch_id'";
	$resultsdet=mysql_query($querydet) or die ("Error: $querydet.".mysql_error());
	$rowsdet=mysql_fetch_object($resultsdet);
	
	?>
	<tr bgcolor="#C0D7E5" height="25"><td></td><td width="20%"><strong>Block Name : <?php echo $rowsdet->block_name; ?></strong></td><td><strong>Period from: <?php echo $rowsdet->period_from; ?></strong></td><td></td></tr>
	<tr bgcolor="#FFFFCC" height="25"><td></td><td><strong>Client : <?php echo $rowsdet->c_name; ?></strong></td><td><strong>Period to: <?php echo $rowsdet->period_to; ?></strong></td><td></td></tr>
	<tr bgcolor="#C0D7E5" height="25"><td></td><td><strong>Project Manager : <?php echo $rowsdet->emp_fname.' '.$rowsdet->emp_mname.' '.$rowsdet->emp_lname; ?></td>
	<td><strong>
	Office Local Based Staff: <font color="#ff0000"><?php 
	$queryolb="SELECT  assigned_staff.emp_id FROM assigned_staff,employees where assigned_staff.emp_id=employees.
	emp_id and employees.department_id='Office' and assigned_staff.bunch_id='$bunch_id'";
	$resultsolb=mysql_query($queryolb) or die ("Error: $queryolb.".mysql_error());
	echo $rowsolb=mysql_num_rows($resultsolb);
	
 ?></font>  &nbsp;&nbsp; 
	Office Expertriate Staff: <font color="#ff0000"><?php 
    $queryole="SELECT  assigned_staff.emp_id  FROM assigned_staff,employees where assigned_staff.emp_id=employees.
	emp_id  AND employees.department_id='Office' and assigned_staff.bunch_id='$bunch_id'";
	$resultsole=mysql_query($queryole) or die ("Error: $queryole.".mysql_error());
	echo $rowsole=mysql_num_rows($resultsole);
	
	?> </font>&nbsp;&nbsp;
	Field Local Based Staff: <font color="#ff0000"><?php 
	$queryflb="SELECT  assigned_staff.emp_id FROM assigned_staff,employees where assigned_staff.emp_id=employees.
	emp_id AND employees.department_id='Field' and assigned_staff.bunch_id='$bunch_id'";
	$resultsflb=mysql_query($queryflb) or die ("Error: $queryflb.".mysql_error());
	echo $rowsflb=mysql_num_rows($resultsflb);
	
	?> </font>&nbsp;&nbsp;
	Field Expertriate Staff: <font color="#ff0000"><?php 
	$queryfeb="SELECT  assigned_staff.emp_id FROM assigned_staff,employees where assigned_staff.emp_id=employees.
	emp_id AND employees.department_id='Field' and assigned_staff.bunch_id='$bunch_id'";
	$resultsfeb=mysql_query($queryfeb) or die ("Error: $queryfeb.".mysql_error());
	echo $rowsfeb=mysql_num_rows($resultsfeb);
	
	?></font></strong>
	</td>
	<td></td></tr>
	
	<tr height="20">
	
	<td colspan="7" ><h3>Assign Staff to the project</h3></td>
    
   
    </tr>
	<tr height="20">
 
	<td colspan="7" height="20" align="center"><?php

if ($_GET['addoutreachconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Saved Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['abnormal']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Same staff cannot be assigned both office and field duties</font></strong></p></div>';
?>

<?php

if ($_GET['exist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record exists</font></strong></p></div>';
?></td>
    </tr>
	<tr height="25"><td></td><td colspan="2" bgcolor="#000033"><font color="#ffffff"><strong>Select Office Staff</strong></font>><td></td></tr>
	
 <tr height="20">
 <td width="200"></td><td>Local based Staff*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="local_based_office">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from employees  order by emp_fname asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id; ?>"><?php echo $rows1->emp_fname.' '.$rows1->emp_mname.' '.$rows1->emp_lname; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								<option value="6000">None....</option>  
								  </select></td>
 <td width="200"></td>
 </tr> 
 <tr height="20">
 <td width="200"></td><td>Expertriate Staff*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="expertriate_office">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query2="select * from employees order by emp_fname asc";
								  $results2=mysql_query($query2) or die ("Error: $query2.".mysql_error());
								  
								  if (mysql_num_rows($results2)>0)
								  
								  {
									  while ($rows2=mysql_fetch_object($results2))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows2->emp_id; ?>"><?php echo $rows2->emp_fname.' '.$rows2->emp_mname.' '.$rows2->emp_lname; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  <option value="6000">None....</option>
								  
								  </select></td>
 <td width="200"></td>
 </tr>  
 <tr height="25"><td></td><td colspan="2" bgcolor="#000033"><font color="#ffffff"><strong>Select Field Staff</strong></font><td></td></tr>
	
 <tr height="20">
 <td width="200"></td><td>Local based Staff*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="local_based_field">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query3="select * from employees order by emp_fname asc";
								  $results3=mysql_query($query3) or die ("Error: $query3.".mysql_error());
								  
								  if (mysql_num_rows($results3)>0)
								  
								  {
									  while ($rows3=mysql_fetch_object($results3))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows3->emp_id; ?>"><?php echo $rows3->emp_fname.' '.$rows3->emp_mname.' '.$rows3->emp_lname; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  <option value="6000">None....</option>
								  
								  </select></td>
 <td width="200"></td>
 </tr> 
 <tr height="20">
 <td width="200"></td><td>Expertriate Staff*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div>
 <select name="expertriate_field">
	

	<option value="0">-------------------Select-----------------------</option>
								  <?php
								  
								  $query4="select * from employees order by emp_fname asc";
								  $results4=mysql_query($query4) or die ("Error: $query4.".mysql_error());
								  
								  if (mysql_num_rows($results4)>0)
								  
								  {
									  while ($rows4=mysql_fetch_object($results4))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows4->emp_id; ?>"><?php echo $rows4->emp_fname.' '.$rows4->emp_mname.' '.$rows4->emp_lname; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  <option value="6000">None....</option>
								  
								  </select></td>
 <td width="200"></td>
 </tr> 
 
 <tr height="30">
 <td width="200"></td>
 <td></td>
 <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
 <td width="200"></td>
 </tr> 
	
	
	
</table>

</form>
<!--<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  
  </script> -->

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("diag");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("disease","dontselect=0",">>Please Select disease");
 frmvalidator.addValidation("total_pat","numeric",">>Must be a number");
 frmvalidator.addValidation("male_pat","numeric",">> Must be a number");
 frmvalidator.addValidation("female_pat","numeric",">>Must be a number");
 frmvalidator.addValidation("child_pat","numeric",">>Must be a number");
 
 
 

  
//]]></script>