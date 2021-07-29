<?php
/* $qr_confirm23a="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$num_rows23a=mysql_num_rows($qr_res23a); 
if ($num_rows23a==0) 
{ 
include ('includes/restricted.php');
//include ('includes/restricted.php');
}
else
{ */
	
	$employee_id=$_GET['employee_id'];	
	$qt=$_GET['qt'];
	$par_id=$_GET['par_id'];

	
$queryopv = "SELECT * FROM hs_hr_employee where emp_number='$employee_id'";
$resultsv= mysql_query($queryopv) or die ("Error $queryopv.".mysql_error());
$rowsv=mysql_fetch_object($resultsv);
	
 ?>


<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script><style type="text/css">



@import url(calender/calendar-win2k-1.css);

</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
<?php 
if ($sess_department_id!=1 && $user_group_id!=56)
{
?>
input, button,select,textarea, { 
pointer-events: none; 

}
<?php 
}
else
{}
	

?>

</Style>

<script type="text/javascript" src="jquery-1.3.2.min.js"></script>

	<script src="js/jquery-1.8.2.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css"/>


<script src="jquery.min.js"></script>
<script type="text/javascript">
 
 $(document).ready(function(){ 
    var counter = 2; 
    $("#addButton").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 	newTextBoxDiv.after().html('<table width="100%" border="0"><tr><td>Name of Spouse '+ counter + ' : ' +'</td><td><input style="margin-bottom:5px;" type="textbox" name="sname[]" id="sname[]" size="40"></td><td width="10%" align="center">Attach: </td><td width="30%"><input type="file" type="file" style="border-left:0px; width:80px; border-right:0px; border-top: 0px; border-bottom:0px; border-radius:0px;"size="20"  name="sattach[]"></td></tr></table>');
 	newTextBoxDiv.appendTo("#TextBoxesGroup");
 	counter++;
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
  
  
  ////////////////proffesional
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addQual").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv3= $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv3' + counter);
 	newTextBoxDiv3.after().html('Qualifications '+ counter + ' : ' +
	      '<input type="textbox" style="margin-bottom:5px;" name="qualif[]" id="qualif[]" size="80">Sort Order : <input type="text" name="qualif_score[]" value="'+counter+'"></span>');
 	newTextBoxDiv3.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeQual").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv3" + counter).remove();
 
     });
 
     
  });
  
  
  
    $(document).ready(function(){ 
    var counter = 2; 
    $("#addProf").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv2 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv2' + counter);
 	newTextBoxDiv2.after().html('Professional '+ counter + ' : ' +
	      '<input style="margin-bottom:5px;" type="textbox" name="prof_name[]" id="prof_name[]" size="80"> Sort Order : <input type="text" name="prof_score[]" value="'+counter+'"></span>');
 	newTextBoxDiv2.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeProf").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv2" + counter).remove();
 
     });
 
     
  });
  
  
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addExp").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv4 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv4' + counter);
 	newTextBoxDiv4.after().html('Experience '+ counter + ' : ' +
	      '<input style="margin-bottom:5px;" type="textbox" name="exp[]" id="exp[]" size="80"> Sort Order : <input type="text" name="exp_score[]" value="'+counter+'"></span>');
 	newTextBoxDiv4.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeExp").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv4" + counter).remove();
 
     });
 
     
  });
  
  
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addTr").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv5 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv5' + counter);
 	newTextBoxDiv5.after().html('Academic Qualification  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="acad[]" id="acad[]" size="20"> Institution Attended <input type="textbox" name="inst[]" id="inst[]" size="20"> Period From : <input type="textbox" class="datepicker" name="from[]" id="from[]" size="10"> Period To : <input type="textbox" name="to[]" id="to[]" size="10">Sort Order : <input type="text" size="5" name="edu_score[]" value="'+counter+'"></span></span>');
 	newTextBoxDiv5.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeTr").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv5" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  
  
  
   $(document).ready(function(){ 
    var counter = 2; 
    $("#addEmp").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv7 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv7' + counter);
 	newTextBoxDiv7.after().html('Employer  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="employer[]" id="employer[]" size="10"> 		Description Of Duties		<textarea cols="10"  rows="2" name="duties[]"></textarea>  Position Held		<input type="textbox" name="position[]" id="position[]" size="20">				Period From : 		<input type="textbox" name="emp_from[]" id="emp_from[]" size="10"> 				Period To : 		<input type="textbox" name="emp_to[]" id="emp_to[]" size="10">Sort Order : <input type="text" size="5" name="emp_score[]" value="'+counter+'"></span></span>');
 	newTextBoxDiv7.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeEmp").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv7" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  
  
  
   $(document).ready(function(){ 
    var counter = 2; 
    $("#addComp").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv8 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv8' + counter);
 	newTextBoxDiv8.after().html('Other Competency  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="other_comp[]"  size="50">Sort Order : <input type="text" size="5" name="comp_score[]" value="'+counter+'"></span></span>');
 	newTextBoxDiv8.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeComp").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv7" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addScie").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv9 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv9' + counter);
 	newTextBoxDiv9.after().html('Author(s)  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="author[]" id="author[]" size="20"> Title :<textarea cols="50"  rows="2" name="title[]"></textarea>  Volume : <input type="textbox" name="volume[]" id="volume[]" size="10">				Period : 		<input type="textbox" name="period[]" id="period[]" size="10"> 				Sort Order : <input type="text" size="5" name="scie_score[]" value="'+counter+'"></span></span>');
 	newTextBoxDiv9.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeScie").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv9" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addCountry").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv10 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv10' + counter);
 	newTextBoxDiv10.after().html('Country  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="country[]" id="country[]" size="50"> Sort Order : <input type="text" size="5" name="country_score[]" value="'+counter+'"></span></span>');
 	newTextBoxDiv10.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeCountry").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv10" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  
  $(document).ready(function(){ 
    var counter = 2; 
    $("#addLang").click(function () { 
	if(counter>100){
            alert("Only 100 textboxes allow");
            return false;
	}   
 	var newTextBoxDiv11 = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv11' + counter);
 	newTextBoxDiv11.after().html('Language  '+ counter + ' : ' +
	      '<span style="line-height:30px;"><input type="textbox" name="language[]" id="language[]" size="20"><span style="background:#ff0000; padding:5px; margin:5px;"><strong>Speaking :</strong>( Excellent<input type="radio" name="speaking['+counter+']" value="Excellent"> Basic <input type="radio" name="speaking['+counter+']" value="Basic">)</span>    <span style="background:#019934; padding:5px; margin:5px;"><strong>Reading : </strong>(Excellent<input type="radio" name="reading['+counter+']" value="Excellent"> Basic <input type="radio" name="reading['+counter+']" value="Basic">)</span> <span style="background:#FFFFCC; padding:5px; margin:5px;"><strong>Writing : </strong>(Excellent<input type="radio" name="writing['+counter+']" value="Excellent"> Basic <input type="radio" name="writing['+counter+']" value="Basic">) </span>Sort Order : <input type="text" size="5" name="lang_score[]" value="'+counter+'"></span>');
 	newTextBoxDiv11.appendTo("#TextBoxesGroup");
 	counter++;
     });
     $("#removeLang").click(function () {
	if(counter==2){
          alert("No more textbox to remove");
          return false;
       }   
	counter--;
 
        $("#TextBoxDiv11" + counter).remove();
 
     });
	 


 
     
  });
  
  
  
  
	
  



</script>


<script type="text/javascript">
 
 function confirmDelete()
{
    return confirm("Are you sure want remove spouse?");
}

 function confirmDel()
{
    return confirm("Are you sure want to delete?");
}
  
  
  /////for client properties
   
  
  
 
 
</script>


<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     $("#region").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_district.php?region_id=' + $(this).val(), function(data) {
    $("#county").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 $("#county").change(function() {
  $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_sub_county.php?county_id=' + $(this).val(), function(data2) {
    $("#subcounty").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
		
/* 	 */
	
	
	$("#subcountyeee").change(function() {
   $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_section.php?sub_county_id=' + $(this).val(), function(data2) {
    $("#section_id").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	$("#section_id").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('loadsubcat5.php?section_id=' + $(this).val(), function(data2) {
    $("#neigh").html(data2);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
    
    });
	
		////////////////////////////////// load brabches
	
	$(document).ready(function() {
     
    $("#bank_name").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_branches.php?bank_name=' + $(this).val(), function(data) {
    $("#branches").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 
    
    });

	
//////////////////////////////////////////////////////load departments, section etc

$(document).ready(function() {
     
    $("#directorate").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_departments.php?directorate_id=' + $(this).val(), function(data) {
    $("#department").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 
    
    });	
	
	
	$(document).ready(function() {
     
    $("#department").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_job_section.php?department_id=' + $(this).val(), function(data) {
    $("#section").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 
    
    });	
	
	
	
	$(document).ready(function() {
     
    $("#sectionff").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_branch.php?section_id=' + $(this).val(), function(data) {
    $("#branch").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
	
	 
    
    });
	
	
		$(document).ready(function() {
     
    $("#branchddd").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_sub_branch.php?branch_id=' + $(this).val(), function(data) {
    $("#sub_branch").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });

    });
	
	
	$(document).ready(function() {
     
    $("#training").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_training2.php?training=' + $(this).val(), function(data) {
    $("#training2").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });

    });
	
	
$(document).ready(function() {
     
    $("#marital_status").change(function() {
    $(this).after('<div id="loader"><img src="images/loading_bar.gif" alt="loading...." /></div>');
    $.get('load_spouse_details.php?marital=' + $(this).val(), function(data) {
    $("#spouse_details").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });

    });
	
	
	
	
	
	
	

	
	
	
	
	
	
	$(function(){
$( "#sdate" ).datepicker();
//Pass the user selected date format
$( "#format" ).change(function() {
$( "#sdate" ).datepicker( "option", "dateFormat", $(this).val() );
});
});

$(function(){
$( "#edate" ).datepicker();
//Pass the user selected date format
$( "#format" ).change(function() {
$( "#edate" ).datepicker( "option", "dateFormat", $(this).val() );
});
});
	
//////calendar-en

 

    </script>



<script type="text/javascript">
  
  $(document).ready(function(){

    //alert("test");

    $("#cleared").change(function(){
     
       var cleared= $("#cleared").val();

       if(cleared == 1)
       {

        $("#clearance").show();
       } else{

           $("#clearance").hide();

       }

    });

        $('.datepicker').live('click', function() {
        $(this).datepicker('destroy').datepicker({changeMonth: true,changeYear: true,dateFormat: "yy-mm-dd",showOn:'focus',maxDate:'0'}).focus();
    });



  });

</script>





<style>

h1{
font-size:15px;	
background:#FFBE2C;
padding:10px;
	
}

th
{
color : #000;
padding:5px;	
	
}



th:hover {
	background-color:#1F8EE7; 
	color : #ffffff;
	
}

[type="checkbox"]
{
    vertical-align:middle;
}
[type="radio"]
{
    vertical-align:middle;
}
</style>

<?php  
			  if (isset($_GET['success']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:100%; margin:auto;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successfully
              </div></p>';

			  ?>

<table width="100%" border="0" align="center" class="tablecc" frame="box">

<?php
if ($employee_id=='')
{
	
}
else
{

 ?>
<tr height="10" bgcolor="#FFFFCC">
<td colspan="10" align="center">
<?php 

    $name4=$rowsv->emp_firstname;
    $name1=$rowsv->emp_lastname;
	$name2=$rowsv->emp_fourth_name;
	$name3=$rowsv->emp_father_name;
	$emp_no=$rowsv->employee_id;
	$full_name=$name4.' '.$name3.' '.$name1.' '.$name2;
	
	?>
<strong><font size='+1'> <?php $english_text9="Employee Name";

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
?> : <font color='#ff0000'><?php echo $full_name; ?></font></strong>

<strong><font size='+1'><?php $english_text9="Employee Number";

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
?> :<font color='#ff0000'><?php echo $emp_no; ?></font></strong>

</td></tr>
<?php 
}


?>
</table>
</style>
<div style="width:15%; float:left; min-height:300px; background:#ffcccc; border:1px;">

<table width="100%" border="0" align="center" bgcolor="#9AD7AF" style="">

<tr  style="background:url(images/description.gif) repeat-x;" height="10" >

    <th bgcolor="<?php echo $bg; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=1&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>&bg1=ffcccc'" height="30"><strong><?php $english_text9="Personal Details";

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
?><font color="#ff0000"><?php
?></font></strong></th></tr>


	    <!--<tr  style="background:url(images/description.gif) repeat-x;" height="10" >



<th bgcolor="<?php echo $bg; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=22&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>&bg1=ffcccc'" height="30"><strong><?php $english_text9="Login Credentials";

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
?><font color="#ff0000"><?php

	?></font></strong></th></tr>-->
	
		<!--<tr  style="background:url(images/description.gif) repeat-x;" height="10" >



    <th bgcolor="<?php echo $bg; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=23&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>&bg1=ffcccc'" height="30"><strong><?php $english_text9="Finger Print";

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
?><font color="#ff0000"><?php

	?></font></strong></th></tr>-->
	

	<tr  style="background:url(images/description.gif) repeat-x;" height="10">



    <th bgcolor="<?php echo $bg; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=14&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>&bg1=ffcccc'" height="30"><strong><?php $english_text9="Photo";

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
?><font color="#ff0000"><?php

	?></font></strong></th></tr>
	
	
	<tr  style="background:url(images/description.gif) repeat-x;" height="30" >
    <th style="<?php echo $bg2; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=2&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>&bg2=ff0000'" height="30"><strong>
	<?php $english_text9="Contact Details";

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
?><font color="#ff0000"><?php
	
	?></font></strong></th>
	
	
</tr>	
	<!--<tr  style="background:url(images/description.gif) repeat-x;" height="30" >
    <th bgcolor="<?php echo $bg1; ?>" align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=3&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>Emergency Contacts<font color="#ff0000"><?php

	?></font></strong></th>
	
</tr>-->	


<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=9&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong><?php $english_text9="Education Background";

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
?><font color="#ff0000"><?php

	?></font></strong></th>

</tr>

<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
	
<th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=7&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>
<?php $english_text9="Job";

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

<font color="#ff0000"><?php

	?></font></strong></th>
	
</tr>
	 <tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=11&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>  <?php $english_text9="Skills and Talents";

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
?><font color="#ff0000"><?php

	?></font></strong></th>
     </tr> 
<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=8&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong> <?php $english_text9="Work Experience";

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
?><font color="#ff0000"><?php

	?></font></strong></th>

</tr>
	 	 <tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=12&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>
					
					
<?php $english_text9="Proffessional Training";

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
					
					
					
					
					<font color="#ff0000"><?php

	?></font></strong></th>
     </tr> 



<!--<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
	
<th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=17&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>Training<font color="#ff0000"><?php

	?></font></strong></th>
	
</tr>	-->


	
	<tr  style="background:url(images/description.gif) repeat-x;" height="30" >
			    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=4&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong><?php $english_text9="Dependants";

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
?><font color="#ff0000"><?php

	?></font></strong></th>
	
</tr>	
	<!--<tr  style="background:url(images/description.gif) repeat-x;" height="30" >
		
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=5&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>Next of Kin<font color="#ff0000"><?php

	?></font></strong></th>
</tr>-->	




<!--<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=10&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>Bank Details<font color="#ff0000"><?php

	?></font></strong></th>
     </tr> -->
	 

	 

	 
	 
	 	 <!--<tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=13&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong>Languages<font color="#ff0000"><?php

	?></font></strong></th>
     </tr>-->
	 
	 	 	 <tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=24&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong><?php $english_text9="Payslips";

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
?><font color="#ff0000"><?php

	?></font></strong></th>
     </tr>
	 
	 
	 <tr  style="background:url(images/description.gif) repeat-x;" height="30" >	
				    <th align="right" width="10%" style="cursor:pointer; font-weight:bold; "  onclick="location.href='home.php?add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=10&form_id=<?php echo $form_id; ?>&employee_id=<?php echo $employee_id; ?>'" height="30"><strong><?php $english_text9="Bank Details";

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
?><font color="#ff0000"><?php

	?></font></strong></th>
     </tr>
        
	 
	 

	 


    </table>	

</div>











<div style="width:80%; float:right; min-height:440px; background:#fff; border:1px solid #ccc;  margin-right:50px;">


	
<?php 
if ($qt==1)
{
include ('personal_details.php');
}

elseif ($qt==2)
{

include ('contact_details.php');	
	
	
}

elseif ($qt==17)
{

include ('training_details.php');	
	
	
}


		
elseif ($qt==3)
{
	
include ('emergency_contact_details.php');	

}

 elseif ($qt==4)
 
{
	

include ('dependant_details.php');
	
	
	
}


elseif ($qt==5)
{


include ('next_of_kin_details.php');	
	
	
}



elseif ($qt==7)
{
	
include ('job_details.php');
		
}
elseif ($qt==8)
{

include ('work_experience_details.php');
}
elseif ($qt==9)
{
include ('education_details.php');	
	
	
}
elseif ($qt==10)
{


include ('bank_details.php');	
	
}
elseif ($qt==11)
{

include ('skills_and_talent_details.php');	
	
}
 elseif ($qt==12)
{
	
	
include ('professional_training_details.php');		
	
}

 elseif ($qt==13)
{
include ('language_details.php');		
}

 elseif ($qt==14)
{
	
include ('photo_details.php');	
}

 elseif ($qt==22)
{
	
include ('login_details.php');	
}

 elseif ($qt==23)
{
	
include ('employee_finger_print.php');	
}

 elseif ($qt==24)
{
	
include ('employee_payslips.php');	
}





 ?>




<!--<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("question","req",">>Please enter question name"); 
  frmvalidator.addValidation("q_nature","selone=0",">>Please choose question nature");
  frmvalidator.addValidation("parameter","req",">>Please enter parameter name");
  frmvalidator.addValidation("par_desc","req",">>Please enter parameter description");

 

  

  
//]]></script>
    --> 

</div>

  
<?php 
//}
?>