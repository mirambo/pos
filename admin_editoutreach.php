<?php
$outreach_record_id=$_GET['outreach_record_id'];
$diagnosis_id=$_GET['diagnosis_id'];

//echo $diagnosis_id;
//echo $outreach_record_id;


 ?>

<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>


<form name="diag" id="diag" action="processeditadminoutreach.php?outreach_record_id=<?php echo $outreach_record_id ?>&diagnosis_id=<?php echo $diagnosis_id; ?>" method="post">			
			<table width="100%" border="0">
 <tr height="20">
 
	<td colspan="7" height="20" align="center"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['exist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record for this disease exists</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
	
	<td colspan="7" ><h3>Update Staff Personal Details</h3></td>
    
   
    </tr>
	
	<?php 
	$query1="select * from outreach_record where outreach_record_id='$outreach_record_id'";
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
	$rows1=mysql_fetch_object($results1);
	
	
	
	?>
	
	<tr height="20">
   
    <td >Institution Of Origin</td>
    <td bgcolor=""><select name="university">
	<?php
$institution_id=$rows1->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
if ($outreach_record_id!='')
{?>
	
	<option value="<?php echo $rowssponsor->institution_id;?>"><?php echo $rowssponsor->institution_name; ?></option>
<?php
}
else
{
	?>	
	<option>Select..................................</option>
	
								  <?php
								  }
								  $queryinst="SELECT * FROM insitution order by institution_name asc";
								  $resultsinst=mysql_query($queryinst) or die ("Error: $queryinst.".mysql_error());
								  
								  if (mysql_num_rows($resultsinst)>0)
								  
								  {
									  while ($rowsinst=mysql_fetch_object($resultsinst))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsinst->institution_id; ?>"><?php echo $rowsinst->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td ></td>
    <td ></td>
	

  </tr>
  
  <tr height="20">
   
    <td >Outreach Date From<font color="#FF0000">*</font></td>
    <td bgcolor=""><input type="text" name="date_from" size="20" id="date_from" readonly="readonly" value="<?php echo $rows1->date_from; ?>" /></td>
    <td >Outreach Date To<font color="#FF0000">*</font></td>
    <td ><input type="text" name="date_to" size="20" id="date_to" readonly="readonly" value="<?php echo $rows1->date_to; ?>"/></td>
	

  </tr>
  
  <tr height="20">
    <td >Faculty Member Male<font color="#FF0000">*</font></td>
    <td><div id='emp_fuc_male_errorloc' class="error_strings"></div><input type="text" size="20" name="fuc_male" value="<?php echo $rows1->fac_male; ?>"></td>
    <td>Faculty Member Female<font color="#FF0000">*</font></td>

    <td><input type="text" size="20" name="fuc_female" value="<?php echo $rows1->fac_female; ?>"></td>
    </tr>
  <tr height="20">
   <td>Resident Male<font color="#FF0000">*</font></td>
    <td><input type="text" size="20" name="res_male" value="<?php echo $rows1->res_male;?>"></td>
    <td>Resident Female<font color="#FF0000">*</font></td>
	


    <td><input type="text" size="20" name="res_female" value="<?php echo $rows1->res_female;?>"></td>
    </tr>
	<tr height="20">
    <td>Patients Male<font color="#FF0000">*</font></td>
    <td><input type="text" size="20" name="pat_male" value="<?php echo $rows1->pat_male;?>"></td>
    <td>Patients Female<font color="#FF0000">*</font></td>
    <td><input type="text" size="20" name="pat_female" value="<?php echo $rows1->pat_female;?>"></td>
    </tr>
	<tr height="20">
    <td  >Patient Children<font color="#FF0000">*</font></td>
    <td><input type="text" size="20" name="pat_child" value="<?php echo $rows1->pat_child;?>"></td>
    <td>Outreach Location<font color="#FF0000">*</font></td>
    <td><input type="text" size="20" name="outreach_loc" value="<?php echo $rows1->location;?>"></td>
    </tr> 
	
	<tr height="20">
	
	<td colspan="7" ><h3>Update Disease Diagnostics Details</h3></td>
    
   
    </tr>
<?php
$sql="SELECT outreach_record.outreach_record_id,outreach_record.date_from,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,diagnosis.total_pat,diagnosis.male_pat,diagnosis.female_pat,
diagnosis.child_pat,diagnosis.remarks,diseases.disease_name,diagnosis.disease_id FROM outreach_record,diagnosis,diseases WHERE outreach_record.outreach_record_id=diagnosis.outreach_record_id AND diseases.disease_id=diagnosis.disease_id AND diagnosis.diagnosis_id='$diagnosis_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
 ?>		
 <tr >
 <td width="200"></td>
 <td>Select Disease<font color="#FF0000">*</font></td>
 <td><div id='diag_disease_errorloc' class="error_strings"></div><select name="disease">
	<?php
if ($outreach_record_id!='')
{?>
<option value="<?php echo $rows->disease_id; ?>"><?php  echo $rows->disease_name;  ?></option>
<?php
}

else
{
	?>

	<option value="0">-------------------Select-----------------------</option>
	
								  <?php
								 } 
								  $queryd="select * from diseases order by disease_name asc";
								  $resultsd=mysql_query($queryd) or die ("Error: $queryd.".mysql_error());
								  
								  if (mysql_num_rows($resultsd)>0)
								  
								  {
									  while ($rowsd=mysql_fetch_object($resultsd))
									  
									  { ?>
										  
                                    <option value="<?php echo $rowsd->disease_id; ?>"><?php echo $rowsd->disease_name; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
 <td width="200"></td>
 </tr> 
 <tr >
 <td width="200"></td>
 <td>Total Patients</td>
 <td><input type="text" size="40" name="total_pat" value="<?php echo $rows->total_pat;?>"></td>
 <td width="200"></td>
 </tr> 
 <tr >
 <td width="200"></td>
 <td>Male</td>
 <td><input type="text" size="40" name="male_pat" value="<?php echo $rows->male_pat;?>"></td>
 <td width="200"></td>
 </tr>
 <tr >
 <td width="200"></td>
 <td>Female</td>
 <td><input type="text" size="40" name="female_pat" value="<?php echo $rows->female_pat;?>"></td>
 <td width="200"></td>
 </tr>
 <tr >
 <td width="200"></td>
 <td>Children</td>
 <td><input type="text" size="40" name="child_pat" value="<?php echo $rows->child_pat;?>"></td>
 <td width="200"></td>
 </tr>
 <tr >
 <td width="200"></td>
 <td>Remarks</td>
 <td><textarea name="remarks" rows="5" cols="35"><?php echo $rows->remarks; ?></textarea></td>
 <td width="200"></td>
 </tr>
 
 <tr >
 <td width="200"></td>
 <td></td>
 <td><input type="submit" name="submit" value="Update Record">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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