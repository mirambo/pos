<?php 
$id=$_GET['wid'];
$employee_id=$_GET['employee_id'];
$queryework="SELECT * FROM employee_work_experience_details WHERE  work_experience_id='$id' AND employee_id= '$employee_id'";
$resultsework=mysql_query($queryework) or die(mysql_error());
$rowework=mysql_fetch_array($resultsework);
//var_dump($id) ; die();
//die();
$employer=$rowework['employer_name'];
//var_dump($resultswork);
$address=$rowework['employer_address'];
$post_held=$rowework['post_held'];
$duration_years=$rowework['duration_years'];
$duration_months=$rowework['duration_months'];
$period_from=$rowework['period_from'];
$period_to=$rowework['period_to'];
$todate_nature=$rowework['todate_nature'];
$terms=$rowework['terms'];


	
?>	

<script type="text/javascript">

function checkform7()
{  
var employer_name=document.empf7.employer_name.value;
var employer_address=document.empf7.employer_address.value;
var post_held=document.empf7.post_held.value;
var period_from=document.empf7.period_from.value;
var period_to=document.empf7.period_to.value;
var todate_nature=document.empf7.todate_nature.value;
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
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



 if (employer_name=='' || employer_name==null)
{
	alert("Enter employer name");  
  return false; 
	
} 

 if (employer_address=='' || employer_address==null)
{
	alert("Enter employer address");  
  return false; 
	
} 

/* if (mailformat.test(employer_address)==false)  
  {  
    alert("Enter a valid email address!"); 
    return (false)
  } */


 if (post_held=='' || post_held==null)
{
	alert("Enter position held");  
  return false; 
	
}

if (period_from=='' || period_from==null)
{
	alert("Enter period from");  
  return false; 
	
} 

if (period_from >'<?php echo date('Y-m-d'); ?>')
{
	alert("Period from cannot be in the future");  
  return false; 
	
} 

 if (todate_nature=='' || todate_nature==null)
{
	alert("Please select period to");  
  return false; 
	
}

 if (todate_nature=='Period To' && period_to=='')
{
	alert("Please enter date to");  
  return false; 
	
}

 else if (period_to < period_from && period_to!='')
{
	alert("Period from cannot be greater than period to");  
  return false; 
	
} 



 

} 
</script> 
	
<form name="empf7" action="process_add_work_experience.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>&work_id=<?php echo $id; ?>" onsubmit="return checkform7rere()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table width="99%" border="0" align="center" frame="box" class="table_new" >
<tr><td colspan="5"><h1>Work Experience </h1></td></tr>
	<tr height="40">
    <td width="1%" align="right">Employer Name<font color="#FF0000">*</font></td>
	<td width="10%"><div id='employer_name' class="error_strings"></div><input type="text"   name="employer_name"  id="employer_name" value="<?php echo $employer; ?>"  class="form-control" style="width:100%; padding:5px;" required/>
	<td width="1%" align="right">Employer Address</td>
	<td width="10%"><div id='employer_address' class="error_strings"></div><input type="text"   name="employer_address"  id="employer_address" value="<?php echo $address; ?>" class="form-control" style="width:100%; padding:5px;"  />
	
    </tr>
	<tr height="40">
      <td width="10%" align="right">Position Held<font color="#FF0000"></font></td>
      <td width="10%"><div id='post_held' class="error_strings"></div><input type="text"  size="30"  name="post_held" value="<?php echo $post_held; ?>" class="form-control" style="width:100%; padding:5px;" ></td>
    
	   <td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  <tr height="40">

    <td width="10%" align="right">Period From<font color="#FF0000">*</font></td>
    <td width="10%"><div id='datepicker' class="error_strings"></div><input type="date" placeholder="yyyy-mm-dd"  name="period_from" value="<?php echo $period_from; ?>" class="form-control" style="width:100%; padding:5px;"></td>
    <td width="10%" align="right">Period To<font color="#FF0000">*</font></td>
    <td width="10%" ><select  onchange="java_script_:show(this.options[this.selectedIndex].value)" name="todate_nature" class="form-control" style="width:100%; padding:5px;" required>
	<option value="<?php echo $todate_nature;?>"><?php echo $todate_nature; ?></option>

	<option value="To Date">To Date</option>
	<option value="Period To">Period To</option>
	</select></td>

    <td width="10%">
	
	<div id="hiddenDiv2" 
	
	
	<?php 
	if ($todate_nature=='To Date')
	{
		?>
	style="display:none;"
	
	<?php
	}
	else
	{
		
		
	}

	?>
	>
	<input type="date" placeholder="yyyy-mm-dd"  name="period_to" value="<?php echo $period_to; ?>"  class="form-control" style="width:100%; padding:5px;"></td>
    </div>
  </tr>
  <!--<tr >

    <td width="10%" align="right">Terms Of Service<font color="#FF0000">*</font></td>
    <td width="10%" colspan="3"><div id='method' class="error_strings"></div>
	
	
	<?php 
	
$terms;
if ($terms=='C')
{
	?>
	Permanent and Pensionable: <input type="radio"name="terms" value="P">
	Contract: <input type="radio" name="terms" checked value="C"> 
	Temporary: <input type="radio" name="terms" value="T">
	
	<?php 
	
}
else if ($terms=='P')
{
?>

	Permanent and Pensionable: <input type="radio"name="terms" checked value="P">
	Contract: <input type="radio" name="terms"  value="C"> 
	Temporary: <input type="radio" name="terms" value="T">

<?php	
}
else if ($terms=='T')
{
?>
    Permanent and Pensionable: <input type="radio"name="terms"  value="P">
	Contract: <input type="radio" name="terms"  value="C"> 
	Temporary: <input type="radio" name="terms" checked value="T">
	
	<?php
}
else 
{
?>
    Permanent and Pensionable: <input type="radio"name="terms"  value="P">
	Contract: <input type="radio" name="terms"  value="C"> 
	Temporary: <input type="radio" name="terms" checked value="T">
	<?php
}
	?>
	
	
	</td>
    <td width="10%"></td>
    <!-- <td width="40%" rowspan="7" valign="top"></td>-->
 <!-- </tr>-->
  <tr height="40">
  
  <td>Letter Of Approintment</td>
  <td >
  
   <?php
   

$appointment_letter_url=$rowework['appointment_letter_url'];

  if ($appointment_letter_url!='')
  {
	echo $rowsn->$appointment_letter_url.'<span style="float:left;"><a title="Download" target="_blank" href="'.$appointment_letter_url.'"><img src="images/download.png"></a></span></br></br>';
	
		
		
}
	
	
else
{
	
	//echo "<i><font color='#ff0000'>No Document</font></i>";
}
	?>
  
  <input type="file" style="border: none;" name="appointment_letter[]">
  
  </td>
  
  
  </tr>
			
			
<tr height="40"><td align="center" colspan="5"><input type="submit" name="submit" style="width:250px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save Details">
</td></tr>			
</table>	
</form>
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "period_from",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
	  maxdate     : new Date(),
      button      : "period_from"       // ID of the button
    }
  ); */

 </script> 
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "period_to",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "period_to"       // ID of the button
    }
  );
 */

</script>

<script>
 function show(aval) {
    if (aval == "Period To") {
    hiddenDiv2.style.display='inline-block';
    Form.fileURL.focus();
    } 
    else{
    hiddenDiv2.style.display='none';
    }
  }
</script>
<?php
$querywork="SELECT * FROM employee_work_experience_details WHERE employee_id='$employee_id' ";
$resultswork=mysql_query($querywork) or die(mysql_error());
$nums=mysql_num_rows($resultswork);


	?>

<table id="example" class="table table-bordered table-striped hover" width="100%">
                <thead>
				<tr bgcolor="#1F8EE7" height="10">
  <td>ID</h1></td>
  <td>Employer Name</h1></td>
  <td>Address</h1></td>
  <td>Position</h1></td>
  <td>Duration(Years)</h1></td>
  <td>Months</h1></td>
  <td>From</h1></td>
  <td>To</h1></td>
  <td>Approintment Letter</h1></td>
  <td>Edit</h1></td>
  <td>Remove</h1></td>
</tr>
   
  <?php
 if($nums > 0)
 {

	while($rowwork=mysql_fetch_array($resultswork))
	{
	$employer=$rowwork['employer_name'];
//var_dump($resultswork);
$id=$rowwork['work_experience_id'];
$address=$rowwork['employer_address'];
$post_held=$rowwork['post_held'];
$duration_years=$rowwork['duration_years'];
$duration_months=$rowwork['duration_months'];
$period_from=$rowwork['period_from'];
$period_to=$rowwork['period_to'];
$todate_nature=$rowwork['todate_nature'];

if ($todate_nature=='To Date')
{
$period_to=date( 'Y-m-d', time());	
}
else
{
$period_to=$period_to;	
	
}



$terms=$rowwork['terms'];
$appointment_letter_url=$rowwork['appointment_letter_url'];



	
		
  ?>
  <tr height="20">
  <td width="10%"><?php echo $count=$count+1; ?></td>
  <td width="10%"><?php echo $employer; ?></td>
  <td width="10%"><?php echo $address; ?></td>
  <td width="10%"><?php echo $post_held; ?></td>
  <td width="10%"><?php 
  

  
  
  
  
  echo $duration_years = date_diff(date_create($period_from), date_create($period_to))->y;		
echo ' Years ';	?></td>
  <td width="10%"><?php echo $duration_months= date_diff(date_create($period_from), date_create($period_to))->m;	

echo ' Months';	; ?></td>
  <td width="10%"><?php echo $period_from; ?></td>
  <td width="10%">
  
  
  
  <?php 
if ($todate_nature=='To Date')
{
	
	echo $todate_nature;
	
}
else
{

 echo $period_to;
}


  ?></td>

  <td width="10%" align="center">
  
  <?php

  if ($appointment_letter_url!='')
  {
	echo $rowsn->$appointment_letter_url.'<span style=""><a title="Download" target="_blank" href="'.$appointment_letter_url.'"><img src="images/download.png"></a></span></br></br>';
	
		
		
}
	
	
else
{
	
	echo "<i><font color='#ff0000'>No Document</font></i>";
}
	?>
  
  
  </td>
  <td width="10%" align="center"><a  href="home.php?add_employee=add_employee&sub_module_id=<?php echo $sub_module_id; ?>&qt=8&employee_id=<?php echo $employee_id; ?>&wid=<?php echo $id; ?>"><img src="images/edit.png"></a></td>
  <td width="10%" align="center"><a onclick="return confirmDel()"  href="delete_work.php?sub_module_id=<?php echo $sub_module_id; ?>&wid=<?php echo $id; ?>&employee_id=<?php echo $employee_id; ?>"><img src="images/delete.png"></a></td>
   </tr>
  <?php
}
 }
else{
	
}
  ?>
 
    </table>

	<?php
