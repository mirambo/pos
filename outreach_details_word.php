<?php include ('Connections/fundmaster.php');
header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Detailed_Outreach_Report.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);

span
{
font-weight:normal;

}
td
{
font-weight:bold;

}

</style>


<form name="emp" id="emp" action="processaddoutreach.php" method="post">	
<?php 

$outreach_id=$_GET['outreach_record_id'];

$sql="SELECT outreach_record.date_from,outreach_record.outreach_record_id,outreach_record.date_to,outreach_record.location,outreach_record.fac_male,
outreach_record.fac_female,outreach_record.res_male,outreach_record.res_female,outreach_record.pat_male,outreach_record.pat_female,outreach_record.pat_child,
outreach_record.remarks,diagnosis.cat_male,diagnosis.cat_female,diagnosis.cat_child,diagnosis.glauc_male,diagnosis.glauc_female,diagnosis.glauc_child,
diagnosis.trauma_male,diagnosis.trauma_female,diagnosis.trauma_child,
diagnosis.cornea_ulcers_male,diagnosis.cornea_ulcers_female,diagnosis.cornea_ulcers_child,

diagnosis.uveitis_male,diagnosis.uveitis_female,diagnosis.uveitis_child,

diagnosis.conjuct_male,diagnosis.conjuct_female,diagnosis.conjuct_child,

diagnosis.reflective_error_male,diagnosis.reflective_error_female,diagnosis.reflective_error_child,

diagnosis.squint_male,diagnosis.squint_female,diagnosis.squint_child,

diagnosis.others_male,others_female,diagnosis.others_child,

surgery.sur_cat_male,surgery.sur_cat_female,surgery.sur_cat_child,

surgery.sur_trauma_male,surgery.sur_trauma_rep_female,surgery.sur_trauma_rep_child,

surgery.sur_other_male,surgery.sur_other_female,surgery.sur_other_child,

blindness.unilateral,
blindness.bilateral,refferal.ref_male,refferal.ref_female,
refferal.ref_child,insitution.institution_name from outreach_record,diagnosis,surgery,blindness,refferal,insitution where outreach_record.outreach_record_id=diagnosis.outreach_record_id and outreach_record.outreach_record_id=surgery.outreach_record_id 
and outreach_record.outreach_record_id=blindness.outreach_record_id and outreach_record.outreach_record_id=refferal.outreach_record_id and outreach_record.institution_id=insitution.institution_id and outreach_record.outreach_record_id='$outreach_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


?>



		
			<table width="100%" border="0">
 <tr height="20" bgcolor="#FFFFCC">
    
	<td colspan="6" height="30" align="center"><font size="+1"><strong>Detailed Outreach Report for:<?php
	
	echo $rows->institution_name;

?></font></strong></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Basic Details</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
   
    <td colspan="2" width="15%">Outreach Date From:</td>
    <td bgcolor="" width="15%" align="left"><span><?php echo $rows->date_from; ?></span></td>
    <td width="15%">Outreach Date To :</td>
    <td align="left"><span><?php echo $rows->date_to; ?></span></td>
	
	
    
  </tr>
  
  <tr height="20">
    <td colspan="2">Faculty Member Male :</td>
    <td align="left"><span><?php echo $rows->fac_male; ?></span></td>
    <td>Faculty Member Female:</td>

    <td align="left"><span><?php echo $rows->fac_female; ?></span></td>
    </tr>
  <tr height="20">
   <td  colspan="2">Resident Male :</td>
    <td align="left"><span><?php echo $rows->res_male; ?></span></td>
    <td>Resident Female</td>
	


    <td align="left"><span><?php echo $rows->res_female; ?></span></td>
    </tr>
	<tr height="20">
    <td  colspan="2">Patients Male :</td>
    <td align="left"><span><?php echo $rows->pat_male; ?></span></td>
    <td>Patients Female :</td>
    <td align="left"><span><?php echo $rows->pat_female; ?></span></td>
    </tr>
	<tr height="20">
    <td  colspan="2">Patient Children :</td>
    <td align="left"><span><?php echo $rows->pat_child; ?></span></td>
    <td>Outreach Location :</td>
    <td align="left"><span><?php echo $rows->location; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Diagnosis Records</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Cataract</h4></td>
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><span><?php echo $rows->cat_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->cat_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->cat_female;  ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Glaucoma</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><span><?php echo $rows->glauc_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->glauc_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->glauc_child; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h4>Trauma</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
	<td>Male</td>
	<td><span><?php echo $rows->trauma_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->trauma_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->trauma_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Corneal Ulcers</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->cornea_ulcers_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->cornea_ulcers_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->cornea_ulcers_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Uveitis</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->uveitis_male; ?></span></td>
	<td >Female :</td>
    <td align="left"><span><?php echo $rows->uveitis_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->uveitis_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Conjuctivis</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->conjuct_male; ?></span></td>
	<td >Female :</td>
    <td align="left"><span><?php echo $rows->conjuct_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->conjuct_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Reflactive Error</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->reflective_error_male; ?></span></td>
	<td >Female :</td>
    <td align="left"><span><?php echo $rows->reflective_error_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->reflective_error_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Squint</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->squint_male; ?></span></td>
	<td >Female :</td>
    <td align="left"><span><?php echo $rows->squint_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->squint_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Others</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->others_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->others_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->others_child; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Surgeries/ Operations</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Cataract Sergery</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->sur_cat_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->sur_cat_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->sur_cat_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Trauma Repair</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->sur_trauma_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->sur_trauma_rep_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->sur_trauma_rep_child; ?></span></td>
    </tr>
	
	<tr height="10">
	
	<td colspan="6" ><h4>Other Minor Sergery</h4></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="10">
	<td>Male</td>
	<td><span><?php echo $rows->sur_other_male; ?></span></td>
	<td>Female :</td>
    <td align="left"><span><?php echo $rows->sur_other_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->sur_other_child; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Blindness</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
	<td></td>
    <td>Unilateral :</td>
    <td><span><?php echo $rows->unilateral; ?></span></td>
    <td>Bilateral :</td>
    <td align="left"><span><?php echo $rows->bilateral; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Refferals</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td>Male</td>
	<td><span><?php echo $rows->ref_male; ?></span></td>
    <td>Female :</td>
    <td align="left"><span><?php echo $rows->ref_female; ?></span></td>
    <td>Children :</td>
    <td><span><?php echo $rows->ref_child; ?></span></td>
    </tr>
	
	<tr height="20">
	
	<td colspan="6" ><h3>Remarks</h3></td>
    
    <td>&nbsp;</td>
    </tr>
	<tr height="20">
    <td>Remarks :</td>
	<td><span><?php echo $rows->remarks; ?></span></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
	<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
