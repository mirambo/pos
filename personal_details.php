<script type="text/javascript">

function validateform()
{  

var payroll_no=document.emp.payroll_no.value;  
 var emp_surname=document.emp.emp_surname.value;
var dob=document.emp.dob.value;
var emp_f_name=document.emp.emp_f_name.value;
var emp_o_name=document.emp.emp_o_name.value;

if (payroll_no=='' || payroll_no==null)
{  
  alert("Enter Payroll Number");  
  return false;  
}

else if (emp_surname=='' || emp_surname==null)
{
	alert("Must enter surname");  
  return false; 
	
}


<?php $eight_back=date('Y-m-d', strtotime('-18 years')); ?>
<?php $eight_back2=date('Y-m-d', strtotime('-60 years')); ?>


else if (dob >='<?php echo $eight_back; ?>')

{
	alert("Employee Must be 18 years and above");  
  return false; 
	
}

else if (dob <='<?php echo $eight_back2; ?>')

{
	alert("Employee Must be 60 years and below");  
  return false; 
	
}

else if (emp_f_name=='' || emp_f_name==null)
{
	alert("Must enter Firstname");  
  return false; 
	
} 
else if (emp_o_name=='' || emp_o_name==null)
{
	alert("Must enter Firstname");  
  return false; 
	
} 
 function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
}  


</script> 
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".spouseeee").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".spouseeee").hide();
            }
        });
    }).change();
});

</script>
<style>

.errormsg{

color:#FF0000;

font-size:9px;

font-weight:bold;

}

#errmsgbox{

border:dotted #FFCC66 1px;

background-color:#FFFFCC;

width:300px;

height:20px;

color:#FF0000;

font-size:15px;

font-weight:bold;

}



<style>



</style>
<script type="text/javascript">
$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();
$('#fromdate').datepicker({
maxDate: new Date(currentYear, currentMonth, currentDate)
});
});




</script>

<form name="emp" action="process_add_personal_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>" onsubmit="return validateform()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<?php  
			  if (isset($_GET['succesrrrrrrrsrrr']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:97%; margin:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successful</p>
              </div>';

			  ?>
<table width="97%" border="0" align="center" class="table_new" frame="box">
<tr><td colspan="5"><h1 style="border-radius:5px;"><?php $english_text9="Personal Details";

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
	<tr height="40" width="100">

    <td width="15%" align="right">
	
<?php $english_text9="Title";

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
?>
:	
	</td>
	<td width="30%">
	<div id='emp_surname' class="error_strings"></div>
	 <select name="title" class="form-control" style="width:90%; padding:5px;" required>
 <?php
echo $title=$rowsv->title;

if ($title=='')
{
 ?>
 <option value="">Select</option>
 <?php 
}
else
{
 ?>
 <option value="<?php echo $title;?>"><?php echo $title;?></option>
 <?php 	
	
}
 ?>
 
    <?php 
	$query_parent = mysql_query("SELECT * FROM hs_hr_title order by title_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['title_name']; ?>"><?php echo $row['title_name']; ?></option>
    <?php endwhile;  ?></select>
	
	</td>
    <td width="10%" align="right"><?php $english_text9="First Name ";

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
?> : </td>
    <td width="30%" >
	
<div id='emp_f_name' class="error_strings"></div><input style="width:90%; padding:5px;" class="form-control" type="text" size="20"  value="<?php echo $rowsv->emp_firstname; ?>" name="emp_f_name" required>
	
	</td>

    
  </tr>
  <tr height="40">
     
    <td width="10%" align="right">
	
	<?php $english_text9="Last Name : ";

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
?>
	

	
	
	</td>
    <td width="1%"><input type="text" size="20" class="form-control" style="width:90%; padding:5px;"  value="<?php echo $rowsv->emp_father_name; ?>" 
	name="emp_father_name" required></td>
 <td width="10%" align="right"><?php $english_text9="Surname ";

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
?> : </td>
 
 <td width="10%">
 <input type="text" size="20" class="form-control" style="width:90%; padding:5px;" value="<?php echo $rowsv->emp_lastname; ?>" name="emp_surname" required>
 </td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  
   


  <tr height="40">

    <td width="1%" align="right"><?php $english_text9="Date Of Birth ";

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
?> : <font color="#FF0000"></font></td>
    <td width="10%"><input class="form-control" style="width:90%; padding:5px;" type="date" id="dob" value="<?php echo $rowsv->emp_birthday; ?>" size="20" name="dob"></td>
        <td width="10%" align="right"><?php $english_text9="Place Of Birth";

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
?> : </td>
    <td width="10%">
	
	<div id='emp_o_name' class="error_strings"></div><input class="form-control" style="width:90%; padding:5px;" type="text" value="<?php echo $rowsv->place_of_birth; ?>" size="20" name="place_of_birth">
	</td>
   
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
    <tr height="40">

    <td width="1%" align="right">
		<?php $english_text9="Health Condition : ";

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
?> 
	</td>
    <td width="10%">
	<select name="health_condition"  id="health_condition" class="form-control" style="width:90%; padding:5px;">
	
	<?php
echo $health_condition=$rowsv->health_condition;

$query_m = mysql_query("SELECT * FROM health_condition WHERE 
health_condition_id='$health_condition'") or die("Query failed: ".mysql_error());
$rowsm=mysql_fetch_array($query_m);
$health_condition_name=$rowsm['health_condition_name'];

if ($health_condition==0)
{
 ?>
 <option value="0">Select</option>
 <?php 
}
else
{
 ?>
 <option value="<?php echo $health_condition;?>"><?php echo $health_condition_name;?></option>
 <?php 	
	
}
 ?>
	

    <?php 
	$query_parent = mysql_query("SELECT * FROM health_condition order by health_condition_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['health_condition_id']; ?>"><?php echo $row['health_condition_name']; ?></option>
    <?php endwhile;  ?>
  </select>
	
	</td>
	<td width="10%" align="right">
	<!--Nationality : -->
	<?php $english_text9="Gender";

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
?> : 
	</td>
    <td width="10%">
<?php
	$gender=$rowsv->emp_gender;
if ($gender=="M")
{
?>
<?php $english_text9="Male ";

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
?><input type="radio"  name="gender" value="M" checked><?php 
$english_text9="Female";

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
?><input type="radio" name="gender" value="F" >
<?php 
}

	
elseif($gender=="F")
{
?>
<?php $english_text9="Male";

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
?><input type="radio" name="gender" value="M" ><?php $english_text9="Female";

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
?><input type="radio" name="gender" value="F" checked>
<?php 
}
else
{?>
<?php $english_text9="Male";

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
?><input type="radio" name="gender" value="M" required><?php $english_text9="Female";

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
?><input type="radio" name="gender" value="F" required>
<?php
}

?>
	</td>
    
  
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
      


    <tr height="40">
    <td width="1%" align="right">
	
	Employee Number : 

	</td>
    <td width="10%">
	<input class="form-control" style="width:90%; padding:5px;" type="text" value="<?php echo $rowsv->employee_id; ?>" size="20" 
	name="employee_number">

	</td>
    
    <td width="1%" align="right"><?php $english_text9="Marital Status";

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
?> : <font color="#FF0000"></font></td>
    <td width="10%"><select name="marital_status" class="form-control" id="marital_statuscccccccc" style="width:90%; padding:5px;">
	
	<?php
echo $marital_status=$rowsv->emp_marital_status;

$query_m = mysql_query("SELECT * FROM marital_status WHERE marital_status_name_id='$marital_status'") or die("Query failed: ".mysql_error());
$rowsm=mysql_fetch_array($query_m);
$marit_name=$rowsm['marital_status_name'];

if ($marital_status==0)
{
 ?>
 <option value="0">Select</option>
 <?php 
}
else
{
 ?>
 <option value="<?php echo $marital_status;?>"><?php echo $marit_name;?></option>
 <?php 	
	
}
 ?>
	
	<option value="0" >Select</option>
    <?php 
	$query_parent = mysql_query("SELECT * FROM marital_status order by marital_status_name asc") or die("Query failed: ".mysql_error());
	while($row = mysql_fetch_array($query_parent)): ?>
    <option value="<?php echo $row['marital_status_name_id']; ?>"><?php echo $row['marital_status_name']; ?></option>
    <?php endwhile;  ?>
  </select></td>
    
  </tr>
  <tr>
  <tr height="20" >
<td width="100%" colspan="5" align="center" id="spouse_details">
<?php 
if ($marital_status==1)
{
	?>
<script type="text/javascript">
 
 $(document).ready(function(){ 
    var counter = 2; 
    $("#addButton").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	/* var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 	newTextBoxDiv.after().html('<table><tr><td>Name of xzxSpouse  '+ counter + ' : ' +
	      '</td><td><input style="margin-bottom:5px;" type="textbox" name="sname[]" id="sname[]" size="20"></td><td>ID/Passport No<font color="#FF0000"></font></td><td><input type="text" name="sid[]" size="20"></td><td>Attach: <input type="file" type="file" style="border-left:0px; width:80px; border-right:0px; border-top: 0px; border-bottom:0px; border-radius:0px;"size="20"  name="sattach[]"></td></tr>');
 	newTextBoxDiv.appendTo("#TextBoxesGroup");
 	counter++; */
     });
     $("#removeButton").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     
  });
  </script>
   

    
	<div id="spouse" style="background:#C2E0FA; border-radius:5px;">
	<table  width="100%" border="1">
	<tr bgcolor="#ffffcc" height="10">
	<td align="center"><strong><?php $english_text9="No";

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
?></strong></td>
	<td align="center "><strong><?php $english_text9="Spouce Name";

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
?></strong></td>
	<td align="center"><strong><?php $english_text9="Attachment";

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
?></strong></td>
	<td align="center"><strong><?php $english_text9="Edit";

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
?></strong></td>
	<td align="center"><strong><?php $english_text9="Delete";

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
?></strong></td>
	
	</tr>
	<?php
$queryp="SELECT * FROM employee_spouses where employee_id='$employee_id'";
$resultsp= mysql_query($queryp) or die ("Error $queryp.".mysql_error());
 if (mysql_num_rows($resultsp) > 0)
 {
	 while ($rp=mysql_fetch_object($resultsp))
	 {

							 
		 ?>

	<tr>
	
	<td align="center"><?php echo $count=$count+1;?></td>
	<td><?php echo $rp->spouse_name;?></td>

	<td align="center">
	<?php
 $attachment=$rp->spouse_id_url;
	?>
	
	
	<?php 
	
	//var_dump($attachment); die();
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
	<!--<td><?php echo $rp->medical_covered;?></td>-->
	<td align="center"><a rel="facebox"  href="edit_spouce.php?spouce_id=<?php echo $rp->spouse_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/edit.png"></a></td>
	<td align="center"><a onclick="return confirmDelete()"  href="delete_spouce.php?spouce_id=<?php echo $rp->spouse_id; ?>&sub_module_id=<?php echo $sub_module_id; ?>"><img src="images/delete.png"></a></td>
	
	
	
	</tr>
	
		 
		 <?php
		 
		 
	 }
	 
	 
 }

 ?>
	
	
</table>	
	
	

	
	<?php
	
	
}
else
{
	
	
}

?>






</td>
  </tr>

		
<tr height="40"><td align="center" colspan="4"><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="<?php 
$english_text9="Save Details";

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
<input type="reset" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Reset Details">
</td>
</tr>			
</table>	
<script type="text/javascript">

 /* Calendar.setup(
    {
      inputField  : "dob",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "dob"       // ID of the button
    }
  );  */


    $(document).ready(function() {
    $('#marital_status').on('change.spouse', function() {
    $("#spouse").toggle($(this).val() ==1);
  }).trigger('change.spouse');
});
		</script>
</form>