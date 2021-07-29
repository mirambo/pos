<?php 
$edu_id=$_GET['edu_id'];
//var_dump($edu_id); 
include('top_grid_includes.php');
?>

<script type="text/javascript">

function checkform8()
{  
var sdate=document.empf8.sdate.value;
var enddate=document.empf8.enddate.value;




 if (sdate >'<?php echo date('Y-m-d'); ?>')
{
	alert("Start date cannot be in the future");  
  return false; 
	
} 

 else if (enddate < sdate)
{
	alert("Start date cannot be greater than to date");  
  return false; 
	
} 



 

} 
</script>


<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">



@import url(calender/calendar-win2k-1.css);

</style>




<form name="empf8" action="process_add_education_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id;?>&edu_id=<?php echo $edu_id; ?>" onsubmit="return checkform8()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>"> 

<?php  
			  if (isset($_GET['successee']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:97%; margin:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successful</p>
              </div>';

			  ?>    
<?php

$queryedu=mysql_query("SELECT * FROM employee_education_details WHERE employee_id='$employee_id' 
AND education_details_id='$edu_id'") or die("Query failed: ".mysql_error());
$rowsedu=mysql_fetch_array($queryedu);	
$qualification=$rowsedu['qualification'];
?>  
<table width="98%" border="0" align="center" class="table_new">
<tr><td colspan="5"><h1><?php $english_text9="Education Background";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></h1></td></tr>


	<tr height="40">
    <td width="10%" align="right"><?php $english_text9="Qualification";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><div id='qualification' class="error_strings"></div><select  name="qualification" required class="form-control" style="width:60%; padding:5px;">
	
	 <option value="<?php echo $qualification; ?>"><?php echo $qualification;?></option>
	 <?php 
	$query_qualif = mysql_query("SELECT * FROM hs_hr_education_qualification order by id asc") or die("Query failed: ".mysql_error());
	while($rows = mysql_fetch_array($query_qualif)): ?>
    <option value="<?php echo $rows['qualification']; ?>"><?php echo $rows['qualification']; ?></option>
    <?php endwhile;  ?>
	</select></td>
	</tr>
	<tr height="40">
    <td width="10%" align="right"><?php $english_text9="Institution";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><div id='institution' class="error_strings"></div><input type="text" required name="institution" value="<?php echo $rowsedu['institution']; ?>" class="form-control" style="width:60%; padding:5px;"/>
	
	</td>
	</tr>
	<tr height="40">
    <td width="10%" align="right"><?php $english_text9="Area Of Specialization";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><div id='major' class="error_strings"></div><input type="text" required name="major" value="<?php echo $rowsedu['specialization']; ?>" class="form-control" style="width:60%; padding:5px;"></td>
	
	</tr>
	
	<tr height="40">
    <td width="1%" align="right"><?php $english_text9="Grade";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><div id='grade' class="error_strings"></div><input type="text"  name="grade" value="<?php echo $rowsedu['score']; ?>" class="form-control" style="width:60%; padding:5px;"></td>
	<td width="5%"></td>
	</tr>
	<tr height="40">
    <td width="1%" align="right"><?php $english_text9="Start Date";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><input type="date"  required placeholder="yyyy-mm-dd" id="sdatedd"  name="sdate" value="<?php echo $rowsedu['start_date']; ?>" class="form-control" style="width:60%; padding:5px;"></td>
	</tr>
	<tr height="40">
    <td width="1%" align="right"><?php $english_text9="End Date";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?><font color="#FF0000">*</font></td>
    <td width="10%"><div id='datepicker' class="error_strings"></div><input type="date" id="enddatedd" required placeholder="yyyy-mm-dd" name="enddate" value="<?php echo $rowsedu['to_date']; ?>" class="form-control" style="width:60%; padding:5px;"></td>
	</tr>
	<tr height="40">
    <td width="1%" align="right">Attach Certificate<font color="#FF0000">*</font></td>
    <td width="10%"><div id='edate' class="error_strings"></div>
	
	
	<?php
   

$attachment=$rowsedu['attachment'];

  if ($attachment!='')
  {
	echo $rowsn->$appointment_letter_url.'<span style="float:left;"><a title="Download" target="_blank" href="'.$attachment.'"><img src="images/download.png"></a></span></br></br>';
	
		
		
}
		
else
{
	
	//echo "<i><font color='#ff0000'>No Document</font></i>";
}
	?>
	
	
	<input type="file" class="form-control" style="width:60%; padding:5px;" name="certfile"/></td>
	</tr>
	<tr>
	
	
  			
<tr height="40">
<td align="center" colspan="2"><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="<?php $english_text9="Save Details";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?>">
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
      inputField  : "enddate",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "enddate"       // ID of the button
    }
  ); */


</script>
<?php
$queryedc="SELECT * FROM employee_education_details WHERE employee_id='$employee_id' ";
$resultsedc=mysql_query($queryedc) or die(mysql_error());
$nums=mysql_num_rows($resultsedc);

if($nums > 0){
	?>
<table width="100%">
	<tr>
	<td width="100%">
 <table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
<tr bgcolor="#1F8EE7" height="10">
  <td width="5%"><strong>ID</td>
  <td width="10%"><strong>Qualification</strong></td>
  <td><strong>Institution</strong></td>
  <td><strong>Major</strong></td>
  <td><strong>Score</strong></td>
  <td><strong>Start Date</strong></td>
  <td width="15%"><strong>To Date</strong></td>
  <td><strong>Certificate</strong></td>
  <td><strong>Action</strong></td>
 
</tr>

</thead>
   
  <?php

while($rowedc=mysql_fetch_array($resultsedc)):
$id=$rowedc['education_details_id'];
$qualification=$rowedc['qualification'];
$institution=$rowedc['institution'];
$specialization=$rowedc['specialization'];
$score=$rowedc['score'];
$start_date=$rowedc['start_date'];
$to_date=$rowedc['to_date'];

  ?>
  <tr height="20">
  <td width="10%"><?php echo $id; ?></td>
  <td width="10%"><?php echo $qualification; ?></td>
  <td width="10%"><?php echo $institution; ?></td>
  <td width="10%"><?php echo $specialization; ?></td>
  <td width="10%"><?php echo $score; ?></td>
  <td width="10%"><?php echo $start_date; ?></td>
  <td width="10%"><?php echo $to_date; ?></td>
  <td width="10%" align="center">
  <?php
$attachment=$rowedc['attachment'];
	?>
	<span style="float:;">
	
	<?php 
	if ($attachment=='')
	{
	echo "<font size='-2' color='#ff0000'><i>Copy not attached</i></font>";	
		
	}
	else
	{
	
	?>
	
	<a href="<?php echo $attachment; ?>"><img src="images/download.png" title="download file"></a>
	
	<?php 
	
	}
	
	?>
  
  </td>
  <td width="10%"><a  href="home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=9&form_id=&employee_id=<?php echo $employee_id; ?>&edu_id=<?php echo $id; ?>"><img src="images/edit.png"></a>
  
  
  <a onclick="return confirmDel()"  href="delete_education.php?sub_module_id=<?php echo $sub_module_id; ?>&edu_id=<?php echo $id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a>
  
  </td>
 
   </tr>
  <?php
 
  endwhile;
  ?>
 
    </table>
    </table>

<?php	
}
else{
	
}