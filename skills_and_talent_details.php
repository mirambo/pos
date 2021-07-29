<?php 

$skill_id= $_GET['skill_id'];
$querysk=mysql_query("SELECT * FROM emplloyee_skills_details,hs_hr_skills 
WHERE emplloyee_skills_details.skill_id=hs_hr_skills.id and  emplloyee_skills_details.id='$skill_id'") or die("Query failed: ".mysql_error());
$rowssk=mysql_fetch_array($querysk);	


include('top_grid_includes.php');
	
?>	
<script type="text/javascript">

function checkform9()
{  
var yoe=document.empf9.yoe.value;
//var enddate=document.empf8.enddate.value;
//var exp_date=document.empf7.exp_date.value;
//var county=document.empf2.county.value;
/* var constituency=document.empf2.subcounty.value;
var ward=document.empf2.ward.value;
var phone2=document.empf2.alternative_mobile.value;
var address=document.empf2.per_address.value;
var address2=document.empf2.po_address.value;
var code=document.empf2.po_code.value;
var city=document.empf2.city.value;
var email=document.empf2.oemail.value;
var email2=document.empf2.pemail .value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;   */



if(isNaN(yoe)||yoe.indexOf(" ")!=-1)
           {
              alert("Year of experience should be numerical")
              return false; 
           } 


 

} 
</script>
<form name="empf9" action="process_add_skills_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>&skill_id=<?php echo $skill_id; ?>" onsubmit="return checkform9()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table width="99%" border="0" align="center" frame="box" class="table_new" >
<tr><td colspan="5"><h1>Skills and Talents</h1></td></tr>


	<tr height="40">
    <td width="10%" align="right">Skill/Talent<font color="#FF0000">*</font></td>
    <td width="10%"><div id='skill' class="error_strings"></div><select  name="skill" required="required" class="form-control" style="width:60%; padding:5px;"/>
	<option value="<?php echo $rowssk['id']; ?>"><?php echo $rowssk['skill_name']; ?></option>
	<?php 
	$query_skk = mysql_query("SELECT * FROM hs_hr_skills order by id asc") or die("Query failed: ".mysql_error());
	while($rowss = mysql_fetch_array($query_skk)): ?>
    <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['skill_name']; ?></option>
    <?php endwhile;  ?>
	</select></td>
	</tr>
	<tr height="50">
	<td width="10%" align="right">Years of Experience<font color="#FF0000">*</font></td>
    <td width="10%"><div id='yoe' class="error_strings"></div><input type="text" name="yoe" required="required" value="<?php echo $rowssk['years_of_experience']; ?>" class="form-control" style="width:60%; padding:5px;"/></td>
	</tr>
	<tr height="50">
    <td width="10%" align="right">Comments<font color="#FF0000">*</font></td>
    <td width="10%" colspan="3"><div id='comments' class="error_strings"></div><textarea rows="4" name="comments" required="required" class="form-control" style="width:60%; padding:5px;"><?php echo $rowssk['comments']; ?></textarea></td>
	
	</tr>
	<tr height="50">
	    <td width="1%" align="right">Attach copy of certificate<font color="#FF0000"></font></td>
        <td width="10%">
		
		<input type="file" style="border: none;"  name="attachcert" style="width: 200px; height:30px; border-radius:5px"></td>
	</tr>
	
	<tr height="10" bgcolor="">
   
    <td width="12%" align="right">Files Attached : <font color="#FF0000"></font></td>
    <td width="23%"   height="30" > <?php
	
	
	$file_name=$rowssk['attachment'];
	
	if ($file_name=='')
	{
		echo "<font color='#ff0000' size='-2'>No attachemnt</font>";
	}
else
{
	?>
	<a href="<?php echo $file_name; ?>"><img src="images/download.png" title="download file">Download copy</a>
	<?php
}	
		

	?>
	
	</td>

  </tr>
	
  			
<tr height="40">
<td align="right" ><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save Details">
</td>
<td ><input type="submit" name="reset" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Reset Details">
</td>
</tr>			
</table>	
	
</form>	
	
<table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
<tr bgcolor="#1F8EE7" height="10">
  <td>ID</h1></td>
  <td>Skill</h1></td>
  <td>Years of Experience</h1></td>
  <td>Comments</h1></td>
  <td>Certificate copy</h1></td>
   <td>Edit</h1></td>
  <td>Remove</h1></td>
</tr>
</thead>
  
 <?php
$queryskill="SELECT * FROM emplloyee_skills_details WHERE employee_id='$employee_id' ";
$resultskill=mysql_query($queryskill) or die(mysql_error());
$nums=mysql_num_rows($resultskill);

if($nums > 0)

{

while($rowskill=mysql_fetch_array($resultskill))
{
$id=$rowskill['id'];
$skill=$rowskill['skill_id'];
$yoe=$rowskill['years_of_experience'];
$comments=$rowskill['comments'];
$attachment=$rowskill['attachment'];
  ?>
  <tr height="20">
  <td width="10%"><?php echo $id; ?></td>
  <td width="10%"><?php $skill; 
  
 $query2s="SELECT * FROM hs_hr_skills WHERE id='$skill'";
$query2resultss=mysql_query($query2s) or die(mysql_error());
$query2rowss=mysql_fetch_array($query2resultss);
echo $skill_name= $query2rowss['skill_name']; 
  
  
  
  
  
  
  ?></td>
  <td width="10%"><?php echo $yoe; ?></td>
  <td width="10%"><?php echo $comments; ?></td>
   <td width="10%" align="center">
  <?php
$attachment=$rowskill['attachment'];
	?>
	<span style="">
	
	<?php 
	if ($attachment=='')
	{
	echo "<font size='-2' color='#ff0000'><i>Certificate Copy not attached</i></font>";	
		
	}
	else
	{
	
	?>
	
	<a href="<?php echo $attachment; ?>"><img src="images/download.png" title="download file"></a>
	
	<?php 
	
	}
	
	?>
  
  </td>
   <td width="10%" align="center"><a  href="home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=11&form_id=&employee_id=<?php echo $employee_id; ?>&skill_id=<?php echo $id; ?>"><img src="images/edit.png"></a></td>
  <td width="10%" align="center"><a onclick="return confirmDel()"  href="delete_employee_skills.php?sub_module_id=<?php echo $sub_module_id; ?>&skill_id=<?php echo $id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></td>
   </tr>
  <?php
 
}

}
else{
	
}
  ?>
 
    </table>		
