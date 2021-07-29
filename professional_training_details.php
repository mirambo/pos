<?php

$prof_id= $_GET['prof_id'];
$querypd=mysql_query("SELECT * FROM employee_professional_details WHERE employee_id='$employee_id' AND prof_id='$prof_id'") or die("Query failed: ".mysql_error());
$rowpd=mysql_fetch_array($querypd);	
	
?>	

<script type="text/javascript">

function checkform10()
{  
var sdate=document.empf10.sdate.value;
var edate=document.empf10.edate.value;
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



 if (sdate >'<?php echo date('Y-m-d'); ?>')
{
	alert("Start date cannot be in the future");  
  return false; 
	
} 

 if (edate >'<?php echo date('Y-m-d'); ?>')
{
	alert("End date cannot be in the future");  
  return false; 
	
} 

 else if (edate < sdate)
{
	alert("Start date cannot be greater than end date");  
  return false; 
	
} 



 

} 
</script>
<form name="empf10" action="process_add_professional_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>&prof_id=<?php echo $prof_id; ?>" enctype="multipart/form-data" onsubmit="return checkform10()" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table width="99%" border="0" align="center" frame="box">
<tr align=""><td colspan="5"><h1>Professional Training  </h1></td></tr>


	<tr height="40">
    <td width="10%" align="right">Certification Name<font color="#FF0000">*</font></td>
    <td width="10%"><div id='skill' class="error_strings"></div><select name="certification" required class="form-control" style="width:60%; padding:5px;">
	<option value="<?php echo $rowpd['certification_name']; ?>"><?php echo $rowpd['certification_name']; ?></option>
	<?php 
	$ss= "SELECT * FROM hs_hr_profession_qualification";
	$ress=mysql_query($ss);
	while($ross=mysql_fetch_array($ress)):
	?>
	<option value="<?php echo $ross['qualification'] ?>"><?php echo $ross['qualification'] ?></option>
	<?php
	endwhile;
	?>
	</select>
	</td>
	</tr>
	<tr height="40">
    <td width="10%" align="right">Location/Venue<font color="#FF0000">*</font></td>
    <td width="10%"><div id='skill' class="error_strings"></div><input type="text"  required name="venue" value="<?php echo $rowpd['venue']; ?>" required="required" class="form-control" style="width:60%; padding:5px;">
	</td>
	</tr>
	<tr height="40">
	<td width="10%" align="right">Start Date<font color="#FF0000">*</font></td>
    <td width="10%"><div id='datepicker' class="error_strings"></div><input type="date"  placeholder="yyyy-mm-dd" required name="sdate" value="<?php echo $rowpd['sdate']; ?>" class="form-control" style="width:60%; padding:5px;"/></td>
	</tr>
	
	<tr>
	<tr height="40">
    <td width="10%" align="right">End Date<font color="#FF0000">*</font></td>
    <td width="10%"><div id='datepicker' class="error_strings"></div><input type="date"  placeholder="yyyy-mm-dd" required name="edate"  value="<?php echo $rowpd['edate']; ?>" class="form-control" style="width:60%; padding:5px;"/></td>
	
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Attach copy of certificate<font color="#FF0000"></font></td>
        <td width="10%"><input type="file" style="border: none;"  name="attachlisence"  value="<?php echo $rowpd['attachment']; ?>" style="width: 200px; height:30px; border-radius:5px"></td>
	</tr>
	
	<tr height="10" bgcolor="">
   
    <td width="12%" align="right">Files Attached : <font color="#FF0000"></font></td>
    <td width="23%"   height="30" > <?php
	
	
	$file_name=$rowpd['attachment'];
	
	if ($file_name=='')
	{
		echo "<font color='#ff0000' size='-2'>No attachemnt</font>";
	}
else
{
	?>
	<a href="<?php echo $file_name; ?>"><img src="images/download.png" title="download file"></a>
	<?php
}	
		

	?>
	
	</td>

  </tr>
	
  			
<tr height="40">
<td align="right">
</td>
<td align="left" ><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save Details"><input type="submit" name="reset" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Reset Details">
</td>
</tr>			
</table>
</form>	
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "sdate",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "sdate"       // ID of the button
    }
  ); */

 </script> 
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "edate",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "edate"       // ID of the button
    }
  ); */

</script>
<?php
$queryprof="SELECT * FROM employee_professional_details WHERE employee_id='$employee_id' ";
$resultprof=mysql_query($queryprof) or die(mysql_error());
$nums=mysql_num_rows($resultprof);

	?>
<table id="example" height="30" class="table table-bordered table-striped hover" width="100%">
                <thead>
				<tr bgcolor="#1F8EE7" height="30">
  <td>ID</h1></td>
  <td>Certification</h1></td>
  <td>Venue</h1></td>
  <td>Start Date</h1></td>
  <td>End Date</h1></td>
  <td>Cerficate copy</h1></td>
   <td>Edit</h1></td>
  <td>Remove</h1></td>
</tr>
   
  <?php
  
  
if($nums > 0)
{
	
while($rowprof=mysql_fetch_array($resultprof))
{
//var_dump($resultswork);
$id=$rowprof['prof_id'];
$cert_name=$rowprof['certification_name'];
$venue=$rowprof['venue'];
$sdate=$rowprof['sdate'];
$edate=$rowprof['edate'];
$attachment=$rowprof['attachment'];
  ?>
  <tr height="20">
  <td width="2%"><?php echo $count=$count+1; ?></td>
  <td width="15%"><?php echo $cert_name; ?></td>
  <td width="15%"><?php echo $venue; ?></td>
  <td width="10%"><?php echo $sdate; ?></td>
  <td width="10%"><?php echo $edate; ?></td>
   <td width="15%" align="center">
  <?php
$attachment=$rowprof['attachment'];
	?>
	<span style=";">
	
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
   <td width="10%" align="center"><a  href="home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=12&form_id=&employee_id=<?php echo $employee_id; ?>&prof_id=<?php echo $id; ?>"><img src="images/edit.png"></a></td>
  <td width="10%" align="center"><a onclick="return confirmDel()"  href="delete_prof.php?sub_module_id=<?php echo $sub_module_id; ?>&prof_id=<?php echo $id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></td>
   </tr>
  <?php
  
  }
}
else{
	
}
 

  ?>
 
    </table>			
	
	
<?php
