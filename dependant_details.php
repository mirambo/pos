<?php 
$emp_no=$rowsv->emp_number;
		
$id=$_GET['id'];
$employee_id=$_GET['employee_id'];
$queryeworkd="select * from employee_dependant_details where dependant_id='$id'";
$resultseworkd=mysql_query($queryeworkd) or die(mysql_error());
$roweworkd=mysql_fetch_array($resultseworkd);	
	
	
	?>	
	
	
	
	
	
<form name="emp" action="process_dependantspart1.php?sub_module_id=<?php echo $sub_module_id;?>&employee_id=<?php echo $emp_no; ?>&dep_id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table width="45%" border="0" align="left">
<tr><td colspan="5"><h1>Dependants(Not Employee's Children) </h1></td></tr>

	<tr height="40">
		<td width="5%" align="right">Name<font color="#FF0000"></font></td>
        <td width="10%" ><input type="text"  value="<?php echo $roweworkd['dependant_name']; ?>" required size="41" name="dependant_name"class="form-control" style="width:90%; padding:5px;"></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Relationship<font color="#FF0000"></font></td>
        <td width="10%"><input type="text"  value="<?php echo $roweworkd['relationship']; ?>" required size="41" name="relationship" class="form-control" style="width:90%; padding:5px;"></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Attachment type<font color="#FF0000"></font></td>
        <td width="10%"><Select name="attach_type" class="form-control" style="width:90%; padding:5px;" >
		
		
		<?php
$attach_type=$roweworkd['attachment_type']; 

if ($attach_type=='id')
{
	
$type_name='ID Card';		
}

elseif ($attach_type=='birthcert')
{

$type_name='Birth Certificate';	
	
}

elseif ($attach_type=='letter')
{
	
$type_name='Institution Certificate/letter';	
}

elseif ($attach_type=='birthnotf')
{
	$type_name='Birth Notification';
	
}

else
{

$type_name='Select Attachment Type............';	
	
}

		?>
		
		
		
		
		<option value="<?php echo $attach_type;  ?>"><?php echo $type_name; ?></option>
		<option value="id">ID Card</option>
		<option value="birthcert">Birth Certificate</option>
		<option value="birthnotf">Birth Notification</option>
		<option value="letter">Institution Certificate/letter</option>
		</select></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Attach copies<font color="#FF0000"></font></td>
        <td width="10%">
		
		
		
		<input type="file" name="myfile">

	</td>
	</tr>
	
	<tr height="40">
	    <td width="1%" align="right">Files Attached<font color="#FF0000"></font></td>
        <td width="10%">
		
		
<?php
$attachment=$roweworkd['attach_copy'];
	?>

	
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
	</tr>
	
	
	
        <tr height="40">
		<td width="1%"> </td>
		<td colspan="2"><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save" ></td>
		
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
      
   
			
</table>
	
</form>






<?php
$id2=$_GET['id2'];
$employee_id=$_GET['employee_id'];
$queryeworkd2="select * from employee_dependant_details where dependant_id='$id2'";
$resultseworkd2=mysql_query($queryeworkd2) or die(mysql_error());
$roweworkd2=mysql_fetch_array($resultseworkd2);



 ?>
 
 <script type="text/javascript">

function checkform99()
{  
var dob=document.empf99.dob.value;
/* var doca=document.empf99.doca.value;
var exp_date=document.empf99.exp_date.value;
var terms_and_service=document.empf99.terms_and_service.value; */


if (dob >'<?php echo date('Y-m-d'); ?>')
{
	alert("Date of birth can not be in future");  
  return false; 
	
} 



} 
</script> 

<form name="empf99" action="process_dependantspart2.php?sub_module_id=<?php echo $sub_module_id;?>&employee_id=<?php echo $employee_id; ?>&dep_id2=<?php echo $id2; ?>" onsubmit="return checkform99()"  enctype="multipart/form-data" method="post">		
  	
<table width="45%" border="0" align="center" style="margin-top:-12px;">
<tr><td colspan="5"><h1>Children </h1></td></tr>


   	<tr height="40">
		<td width="10%" align="right">Name<font color="#FF0000"></font></td>
        <td width="10%"><input type="text" value="<?php echo $roweworkd2['dependant_name']; ?>" required size="41" name="child_name" class="form-control" style="width:90%; padding:5px;"></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Date of birth<font color="#FF0000"></font></td>
        <td width="10%"><input type="date"  value="<?php echo $roweworkd2['date_of_birth']; ?>" size="41" name="dob" placeholder="yyyy-mm-dd" class="form-control" style="width:90%; padding:5px;"></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Attachment Type<font color="#FF0000"></font></td>
        <td width="10%">
	<select name="attach_type" class="form-control" style="width:90%; padding:5px;" >		
<?php
$attach_type2=$roweworkd2['attachment_type']; 

if ($attach_type2=='id')
{
	
$type_name2='ID Card';		
}

elseif ($attach_type2=='birthcert')
{

$type_name2='Birth Certificate';	
	
}

elseif ($attach_type2=='letter')
{
	
$type_name2='Institution Certificate/letter';	
}

elseif ($attach_type2=='birthnotf')
{
	$type_name2='Birth Notification';
	
}

else
{

$type_name2='Select Attachment Type............';	
	
}

		?>
		
		
		
		
		<option value="<?php echo $attach_type2;  ?>"><?php echo $type_name2; ?></option>		
		
		
		
		
		
		

		<option value="id">ID Card</option>
		<option value="birthcert">Birth Certificate</option>
		<option value="birthnotf">Birth Notification</option>
		<option value="letter">Institution Certificate/Letter</option>
		</select></td>
	</tr>
	<tr height="40">
	    <td width="1%" align="right">Attach copy<font color="#FF0000"></font></td>
        <td width="10%"><input type="file"  name="attach">
		

		
		
		
		</td>
	</tr>
		<tr height="40">
	    <td width="1%" align="right">Files Attached<font color="#FF0000"></font></td>
        <td width="10%">
		
		
<?php

$attachment2=$roweworkd2['attach_copy'];
	?>

	
	<?php 
	if ($attachment2=='')
	{
	echo "<font size='-2' color='#ff0000'><i>Copy not attached</i></font>";	
		
	}
	else
	{
	
	?>
	
	<a href="<?php echo $attachment2; ?>"><img src="images/download.png" title="download file"></a>
	
	<?php 
	
	}
	
	?>	

		</td>
	</tr>
	
	<tr height="40">
		<td></td>
		<td><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px;  border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Add"></td>
		
		

     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
    
			
</table>	
</form>

<script type="text/javascript">

/* Calendar.setup(
    {
      inputField  : "dob",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "dob"       // ID of the button
    }
  );
 */







    $(document).ready(function() {
    $('#marital_status').on('change.spouse', function() {
    $("#spouse").toggle($(this).val() ==1);
  }).trigger('change.spouse');
});
		</script>



<table width="100%">
	<tr>
	<td width="50%">
<table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
				<tr bgcolor="#1F8EE7" height="30">
  <td>Name</h1></td>
  <td>Relation</h1></td>
   <td>File</h1></td>
  <td>Edit</h1></td>
  <td>Remove</h1></td>
  </tr>
   
  <?php
   //var_dump($emp_no); die();	
   $querydependants="select * from employee_dependant_details where employee_id='$emp_no' AND dependance_type='dependants' ";
	$dependantresult=mysql_query($querydependants)or die(mysql_error);
	 
	while($dependantrow=mysql_fetch_array($dependantresult)):
	//var_dump($dependantrow); die();
  ?>
  <tr height="30">
  
  <td width="10%"><?php echo $dependantrow['dependant_name'] ?></td>
  <td width="10%"><?php echo $dependantrow['relationship'] ?></td>
  <td width="10%" align="center">
  <?php
$attachment=$dependantrow['attach_copy'];
	?>

	
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

  <td width="10%" align="center"><a href="home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $dependantrow['dependant_id']; ?>&employee_id=<?php echo $employee_id; ?>&qt=4"><img src="images/edit.png"></a></td>
  <td width="10%" align="center"><a onclick="return confirmDel()"  href="delete_dependant.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $dependantrow['dependant_id']; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></td>
   </tr>
  <?php
 
  endwhile;
  ?>
 
    </table>
		</td>
		<td width="50%">
<table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
				<tr bgcolor="#ccc" height="30">
  <td>Name</h1></td>
  <td>Birth</h1></td>
  <td>File</h1></td>

  <td>Edit</h1></td>
  <td>Remove</h1></td>
  </tr>
  <?php
  $querydependants1="select * from employee_dependant_details where employee_id='$emp_no' AND dependance_type='children'";
  $dependantresult1=mysql_query($querydependants1);
  while($dependantrow1=mysql_fetch_array($dependantresult1)):
   ?>
   <tr height="30">
  <td width="10%"><?php echo $dependantrow1['dependant_name']; ?> </td>
  <td width="10%"><?php echo $dependantrow1['date_of_birth']; ?></td>
  <td width="10%" align="center">
  <?php
 $attachment=$dependantrow1['attach_copy'];
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
  </span>
  </td>

  <td width="10%" align="center"><a href="home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id; ?>&id2=<?php echo $dependantrow1['dependant_id']; ?>&employee_id=<?php echo $employee_id; ?>&qt=4"><img src="images/edit.png"></a></td>
  
  <td width="10%" align="center"><a onclick="return confirmDel()"   href="delete_dependant.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $dependantrow1['dependant_id']; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></button></td>
   </tr>
  <?php
  endwhile;
  
  ?>
 
    </table>
	</td>
</tr>
</table>