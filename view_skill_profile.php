
<?php $emp_id=$_GET['emp_id']; ?>
<script language="javaScript" src="gen_validatorv4.js"  type="text/javascript" xml:space="preserve"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">

@import url(calender/calendar-win2k-1.css);



.table td, tr
{
border:1px solid black;
padding:3px;
}

.table td, tr a
{
color:#ff0000;
text-decoration:none;

}

.table td, tr a:hover
{
color:#ffffff;
text-decoration:none;

}

.table td, tr a:current
{
background:#ff0000;
text-decoration:none;

}

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<form name="emp" id="emp" action="processeditskills.php?emp_id=<?php echo $emp_id; ?>" method="post">			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php



if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
	<td rowspan="18" width="25%" valign="top">
	<?php include ('includes/emp_submenu_view.php');
$sql="SELECT * FROM skills_profile WHERE emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	
	?>
	
	
	
	</td>
	<td colspan="4" ><h3>Employee Skill Profile - Skill Profile Details for (<?php 
$querylatelpo="select * from employees where emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
echo $rowslatelpo->emp_fname.' '.$rowslatelpo->emp_mname.' '.$rowslatelpo->emp_lname;

	?>
	
	)</h3></td></tr>
	<tr>
	<td colspan="4"><h5>::Languages</h5></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="15%">English<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%" colspan="3">
	<?php 
	$english=$rows->english; 
	if ($english=='Fluent')
	{
	?>
	<input type="radio" name="english" value="Fluent" checked>Fluent &nbsp;&nbsp;<input type="radio" name="english" value="Good">Good
	<input type="radio" name="english" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="english" value="Poor">Poor
	<?php 
	}
	elseif ($english=='Good')
	{
	?>
	<input type="radio" name="english" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="english" value="Good" checked>Good
	<input type="radio" name="english" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="english" value="Poor">Poor
	<?php
	}
	elseif ($english=='Middle')
	{
	?>
	<input type="radio" name="english" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="english" value="Good">Good
	<input type="radio" name="english" value="Middle" checked>Middle &nbsp;&nbsp;<input type="radio" name="english" value="Poor">Poor
	<?php
	}
	elseif ($english=='Poor')
	{
	?>
	<input type="radio" name="english" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="english" value="Good">Good
	<input type="radio" name="english" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="english" value="Poor" checked>Poor
	<?php 
	}
	else
	{
	?>
	<input type="radio" name="english" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="english" value="Good">Good
	<input type="radio" name="english" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="english" value="Poor" >Poor
	<?php 
	}
	?>
	
	
	
  </tr>
  <tr height="20">
    
    <td width="10%">Arabic</td>
    <td bgcolor="" width="40%" colspan="3">
	<?php 
	$arabic=$rows->arabic; 
	if ($arabic=='Fluent')
	{
	?>
	<input type="radio" name="arabic" value="Fluent" checked>Fluent &nbsp;&nbsp;<input type="radio" name="arabic" value="Good">Good
	<input type="radio" name="arabic" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="arabic" value="Poor">Poor
	<?php 
	}
	elseif ($arabic=='Good')
	{
	?>
	<input type="radio" name="arabic" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="arabic" value="Good" checked>Good
	<input type="radio" name="arabic" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="arabic" value="Poor">Poor
	<?php
	}
	elseif ($arabic=='Middle')
	{
	?>
	<input type="radio" name="arabic" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="arabic" value="Good">Good
	<input type="radio" name="arabic" value="Middle" checked>Middle &nbsp;&nbsp;<input type="radio" name="arabic" value="Poor">Poor
	<?php
	}
	elseif ($arabic=='Poor')
	{
	?>
	<input type="radio" name="arabic" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="arabic" value="Good">Good
	<input type="radio" name="arabic" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="arabic" value="Poor" checked>Poor
	<?php 
	}
	else
	{
	?>
	<input type="radio" name="arabic" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="arabic" value="Good">Good
	<input type="radio" name="arabic" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="arabic" value="Poor" >Poor
	<?php 
	}
	?>
	</td>
    
    <td width="100%" rowspan="10" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="20">
    
    <td width="10%">Chinese</td>
    <td bgcolor="" width="20%" colspan="3">
	
	
	<?php 
	$chinese=$rows->chinese; 
	if ($chinese=='Fluent')
	{
	?>
	<input type="radio" name="chinese" value="Fluent" checked>Fluent &nbsp;&nbsp;<input type="radio" name="chinese" value="Good">Good
	<input type="radio" name="chinese" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="chinese" value="Poor">Poor
	<?php 
	}
	elseif ($chinese=='Good')
	{
	?>
	<input type="radio" name="chinese" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="chinese" value="Good" checked>Good
	<input type="radio" name="chinese" value="Middle">Middle &nbsp;&nbsp;<input type="radio" name="chinese" value="Poor">Poor
	<?php
	}
	elseif ($chinese=='Middle')
	{
	?>
	<input type="radio" name="chinese" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="chinese" value="Good">Good
	<input type="radio" name="chinese" value="Middle" checked>Middle &nbsp;&nbsp;<input type="radio" name="chinese" value="Poor">Poor
	<?php
	}
	elseif ($chinese=='Poor')
	{
	?>
	<input type="radio" name="chinese" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="chinese" value="Good">Good
	<input type="radio" name="chinese" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="chinese" value="Poor" checked>Poor
	<?php 
	}
	else
	{
	?>
	<input type="radio" name="chinese" value="Fluent">Fluent &nbsp;&nbsp;<input type="radio" name="chinese" value="Good">Good
	<input type="radio" name="chinese" value="Middle" >Middle &nbsp;&nbsp;<input type="radio" name="chinese" value="Poor" >Poor
	<?php 
	}
	?>
	
	
	</td>
    
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr height="20">
    
    <td width="10%" valign="top">Others Describe</td>
    <td bgcolor="" width="20%" colspan="3"><textarea name="other_language" rows="3" cols="40"><?php echo $rows->other_languages;?></textarea>
	</td>
    
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  
  <tr>
	<td colspan="4"><h5>::Computer</h5></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="15%">Word<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%" colspan="3">
	<?php 
	$word=$rows->word; 
	if ($word=='Practised')
	{
	?>
	<input type="radio" name="word" value="Practised" checked>Practised &nbsp;&nbsp;<input type="radio" name="word" value="Middle">Middle
	<input type="radio" name="word" value="Poor">Poor &nbsp;&nbsp;<input type="radio" name="word" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($word=='Middle')
	{
	?>
	<input type="radio" name="word" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="word" value="Middle" checked>Middle
	<input type="radio" name="word" value="Poor">Poor &nbsp;&nbsp;<input type="radio" name="word" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($word=='Poor')
	{
	?>
	<input type="radio" name="word" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="word" value="Middle">Middle
	<input type="radio" name="word" value="Poor" checked>Poor &nbsp;&nbsp;<input type="radio" name="word" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($word=='Ignorance')
	{
	?>
	<input type="radio" name="word" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="word" value="Middle">Middle
	<input type="radio" name="word" value="Poor" >Poor &nbsp;&nbsp;<input type="radio" name="word" value="Ignorance" checked>Ignorance
	<?php 
	}
	else
	{
	?>
	<input type="radio" name="word" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="word" value="Middle">Middle
	<input type="radio" name="word" value="Poor" >Poor &nbsp;&nbsp;<input type="radio" name="word" value="Ignorance">Ignorance
	<?php 
	}
	?>

	
	
	
	
	</td>
    
    
  </tr>
  <tr height="20">
    
    <td width="10%">Excel</td>
    <td bgcolor="" width="40%" colspan="3">
	
	<?php 
	$excel=$rows->excel; 
	if ($excel=='Practised')
	{
	?>
	<input type="radio" name="excel" value="Practised" checked>Practised &nbsp;&nbsp;<input type="radio" name="excel" value="Middle">Middle
	<input type="radio" name="excel" value="Poor">Poor &nbsp;&nbsp;<input type="radio" name="excel" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($excel=='Middle')
	{
	?>
	<input type="radio" name="excel" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="excel" value="Middle" checked>Middle
	<input type="radio" name="excel" value="Poor">Poor &nbsp;&nbsp;<input type="radio" name="excel" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($excel=='Poor')
	{
	?>
	<input type="radio" name="excel" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="excel" value="Middle">Middle
	<input type="radio" name="excel" value="Poor" checked>Poor &nbsp;&nbsp;<input type="radio" name="excel" value="Ignorance">Ignorance
	<?php 
	}
	elseif ($excel=='Ignorance')
	{
	?>
	<input type="radio" name="excel" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="excel" value="Middle">Middle
	<input type="radio" name="excel" value="Poor" >Poor &nbsp;&nbsp;<input type="radio" name="excel" value="Ignorance" checked>Ignorance
	<?php 
	}
	else
	{
	?>
	<input type="radio" name="excel" value="Practised" >Practised &nbsp;&nbsp;<input type="radio" name="excel" value="Middle">Middle
	<input type="radio" name="excel" value="Poor" >Poor &nbsp;&nbsp;<input type="radio" name="excel" value="Ignorance">Ignorance
	<?php 
	}
	?>
	
	
</td>
    
   
  </tr>
  
  <tr height="20">
    
    <td width="10%" valign="top">Others Describe</td>
    <td bgcolor="" width="22%" colspan="3"><textarea name="other_comp_skills" rows="3" cols="40"><?php echo $rows->other_comp_skills;?></textarea>
	</td>
    
  
  </tr>
  
  

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  
</table>

</form>

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether(); 
 frmvalidator.addValidation("english","selone_radio",">>Please rate your english language");
 frmvalidator.addValidation("word","selone_radio",">>Please rate your computer skills");


 
 
 
  </SCRIPT>



