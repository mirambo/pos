
<?php 
$employee_id;
$queryjob="SELECT * FROM employee_job_details WHERE employee_id='$employee_id'" ;	
$resultsjob=mysql_query($queryjob);

$rowsjob=mysql_fetch_array($resultsjob);

$code=$rowsjob['job_title'];
$grade=$rowsjob['pay_grade'];
$directorate_id=$rowsjob['directorate_id'];
$department=$rowsjob['department'];
$section=$rowsjob['section'];
$branch_id=$rowsjob['branch_id'];
$sub_branch_id=$rowsjob['sub_branch_id'];
$group=$rowsjob['job_group'];
$dofa=$rowsjob['date_of_first_appointment'];
$doca=$rowsjob['date_of_current_appointment'];
$job_term_id=$rowsjob['terms_of_service'];

$query2j="SELECT * FROM job_terms WHERE job_term_id='$job_term_id'";
$query2resultsj=mysql_query($query2j) or die(mysql_error());
$query2rowsj=mysql_fetch_array($query2resultsj);
$job_term_name= $query2rowsj['job_term_name'];



$terms_of_service=$rowsjob['terms_of_service'];
$pay=$rowsjob['basic_pay'];
$duties=$rowsjob['job_duties'];
$exp_date=$rowsjob['exp_date'];
$decree_url=$rowsjob['decree_url'];
$decree_date=$rowsjob['decree_date'];
$decree_number=$rowsjob['decree_number'];
//query 2 job title
$query2="SELECT * FROM hs_hr_job_title WHERE job_id='$code'";
$query2results=mysql_query($query2) or die(mysql_error());
$query2rows=mysql_fetch_array($query2results);
$job_title= $query2rows['jobtit_name'];

//query 3 salary grade
$query3="SELECT * FROM hs_pr_salary_grade WHERE sal_grd_code='$grade'";
$query3results=mysql_query($query3) or die(mysql_error());
$query3rows=mysql_fetch_array($query3results);
$sal_grade= $query3rows['sal_grd_name'];

//query 4 job group
$query4="SELECT * FROM hs_hr_job_spec WHERE jobspec_id='$group'";
$query4results=mysql_query($query4) or die(mysql_error());
$query4rows=mysql_fetch_array($query4results);
$job_group= $query4rows['jobspec_name'];


$query5d="SELECT * FROM directorate WHERE directorate_id='$directorate_id'";
$query5resultsd=mysql_query($query5d) or die(mysql_error());
$query5rowsd=mysql_fetch_array($query5resultsd);
$directorate_name= $query5rowsd['directorate_name'];


$query5db="SELECT * FROM branch WHERE branch_id='$branch_id'";
$query5resultsdb=mysql_query($query5db) or die(mysql_error());
$query5rowsdb=mysql_fetch_array($query5resultsdb);
$branch_name= $query5rowsdb['branch_name'];


$query5dbs="SELECT * FROM sub_branch WHERE sub_branch_id='$sub_branch_id'";
$query5resultsdbs=mysql_query($query5dbs) or die(mysql_error());
$query5rowsdbs=mysql_fetch_array($query5resultsdbs);
$sub_branch_name= $query5rowsdbs['sub_branch_name'];


//query 5 department
$query5="SELECT * FROM departments WHERE DId='$department'";
$query5results=mysql_query($query5) or die(mysql_error());
$query5rows=mysql_fetch_array($query5results);
$dept= $query5rows['Department'];

//query 6 section
$query6="SELECT * FROM section WHERE id='$section'";
$query6results=mysql_query($query6) or die(mysql_error());
$query6rows=mysql_fetch_array($query6results);
$sec= $query6rows['Section'];

//var_dump($rowsjob); die(mysql_error());



//echo $rowsjob['job_title'];
//die();
//endwhile;
//die(); */



	
	?>	
	<script type="text/javascript">

function checkform6()
{  
var dofa=document.empf6.dofa.value;
var doca=document.empf6.doca.value;
var exp_date=document.empf6.exp_date.value;
var terms_and_service=document.empf6.terms_and_service.value;
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


if (dofa=='' || dofa==null)
{  
  alert("Date of first appointment can not be blank");  
  return false;  
}

 else if (dofa >'<?php echo date('Y-m-d'); ?>')
{
	alert("Date of first appointment can not be in future");  
  return false; 
	
} 

else if (doca >'<?php echo date('Y-m-d'); ?>')
{
	alert("Date of current appointment can not be in future");  
  return false; 
	
}
else if (doca < dofa)
{
	alert("Date of first appointment can not greater then date of current appointment");  
  return false; 
	
}

else if (terms_and_service=='')
{
	alert("Select term of service");  
  return false; 
	
}

else if (exp_date=='' && terms_and_service=='Contract')
{
	alert("Enter contract expiry date");  
  return false; 
	
}

else if (exp_date <'<?php echo date('Y-m-d'); ?>' && exp_date!='' && terms_and_service=='Contract')
{
	alert("Contract expiry date cannot be in the past");  
  return false; 
	
}



if(isNaN(phone)||phone.indexOf(" ")!=-1)
           {
              alert("Mobile number should be numerical")
              return false; 
           }
  /*          if (phone.length < 10 || phone.length > 10)
           {
                alert("Mobile number should have 10 characters and above");
                return false;
           } */
           /* if (phone.charAt(0)!="0" || phone.charAt(1)!="7")
           {
                alert("Mobile number should start with 07");
                return false
           } */
           if(isNaN(phone2)||phone2.indexOf(" ")!=-1)
           {
              alert("Alternative mobile number should be numerical")
              return false; 
           } 
           /* if (phone2.length < 10 || phone2.length > 10 && phone2=='')
           {
                alert("enter 10 characters for Alternative mobile number");
                return false;
           } */
           /* if (phone2.charAt(0)!="0" || phone2.charAt(1)!="7")
           {
                alert("Alternative phone numbber should start with 07 ");
                return false
           } */
/* else if (address=='' || address==null)
{
	alert(" Permanent Address can not be blank");  
  return false; 
	
} */
/* else if (address2=='' || address2==null)
{
	alert(" Postal Address can not be blank");  
  return false; 
	
}
else if (code=='' || code==null)
{
	alert(" Postal Code can not be blank");  
  return false; 
	
}
else if (city=='' || city==null)
{
	alert(" City can not be blank");  
  return false; 
	
} */
else if (email=='' || email==null)
{
	alert(" Office Email can not be blank");  
  return false; 
	
}
/* else if (email2=='' || email2==null)
{
	alert(" Personal Email can not be blank");  
  return false; 
	
}
 */

		   
		   
if (mailformat.test(email)==false)  
  {  
    alert("You have entered an invalid email address!")  
    return (false)
  } 
  if (mailformat.test(email2)==false && email2=='')  
  {  
    alert("You have entered an invalid email address!")  
    return (false)
  } 

    
if (county=='' || county==null)
{  
  alert(" County can not be blank");  
  return false;  
}


 

} 
</script> 
<form name="empf6" action="process_add_job_details.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>" onsubmit="return checkform6()" enctype="multipart/form-data" method="post">		
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">  


<?php  
			  if (isset($_GET['successgg']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:97%; margin:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successful</p>
              </div>';
			  
			  
	

			  ?>    



  
<table width="98%" border="0" align="center"frame="box" class="table_new" >
<tr><td colspan="5"><h1> Job Details</h1></td></tr>

 
    <tr height="40">
	<td width="20%" align="right">Position/Job Title</td>
	<td width="10%"><div id='title' class="error_strings"></div>
	<select  name="job_title"  id="job_title" required class="form-control" style="width:100%; padding:5px;" onchange="showSelected(this.value)">
	
	
	
	
	
	<option value="<?php echo $code; ?>"  ><?php echo $job_title?></option>
	
	
	
	 <?php 
	$query_jobtitle = mysql_query("SELECT * FROM hs_hr_job_title order by jobtit_name asc") or die("Query failed: ".mysql_error());
	while($rows = mysql_fetch_array($query_jobtitle)): ?>
    <option value="<?php echo $rows['job_id']; ?>"><?php echo $rows['jobtit_name']; ?></option>
    <?php endwhile;  ?>
	</select></td>
	<td width="20%" align="right"><!--Job Grade--></td>
	<td width="10%">
	
	</td>
	<td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  
  <tr height="40">
	<td width="1%" align="right">Department<input type="hidden" name="orig_dep" value="<?php echo $department; ?>"></td>
	
	<td width="10%">
	<div id="showdiv55" 

<?php if ($code==55)
{ 
?> 
style="display:none;"

<?php 

}else 

{ 

?>
style="display:block;" 
<?php 
} 
?>
>
	<select  required name="department"  id="department" class="form-control" style="width:100%; padding:5px;" >
	
	
	
	<option value=" <?php echo $department; ?>"><?php echo $dept; ?></option>
	 <?php 
	$query_jobspec = mysql_query("SELECT * FROM departments order by Department asc") or die("Query failed: ".mysql_error());
	while($rows = mysql_fetch_array($query_jobspec)): ?>
    <option value="<?php echo $rows['DId']; ?>"><?php echo $rows['Department']; ?></option>
    <?php endwhile;  ?>
	</select>
	</div>

	
	
	
	</td>
	
	<td width="1%" align="right">Section</td>
	<td width="10%">
<div id="showdiv56" <?php if ($code==56 || $code==55)
{ 

?> 
style="display:none;"

<?php 

}
else 

{ 

?>  style="display:block;" 
<?php 
} ?>><select  name="section"  id="section" class="form-control" style="width:100%; padding:5px;">
	<option value="<?php echo $section; ?>"><?php echo $sec; ?></option>
	
	</select></div>
	</td>
	<td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  
  
  
    <tr height="40">
  <td width="1%" align="right">Monthly Basic Pay</td>
	<td width="20%"><div id='basic_pay' class="error_strings"></div><input type="text" name="basic_pay"  id="basic_pay" value="<?php echo $pay; ?>" class="form-control" style="width:100%; padding:5px;"></td>
	<td width="10%" align="right">First Appoint. Date</td>
	<td width="20%"><div id='datepicker' class="error_strings"></div><input type="date" name="dofa"  id="dofaaaa"  value="<?php echo $dofa; ?>" class="form-control" style="width:100%; padding:5px;">
	
	<td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
  
  
  
  
  <tr height="40">
    <td width="15%" align="right">Current Appoint. Date</td>
	<td width="10%"><div id='datepicker' class="error_strings"></div><input type="date"  name="doca"  id="docaaa" value="<?php echo $doca; ?>" class="form-control" style="width:100%; padding:5px;">
	<td width="1%" align="right">Terms of Service</td>
	<td width="10%"><div id='ts' class="error_strings"></div>
	<select  onchange="java_script_:show(this.options[this.selectedIndex].value)" name="terms_and_service"  id="terms_and_service" class="form-control" style="width:100%; padding:5px;">
	<option value="<?php echo $job_term_id;?>"><?php echo $job_term_name; ?></option>
	<?php 
	$query_salgrade = mysql_query("SELECT * FROM job_terms order by job_term_name asc") or die("Query failed: ".mysql_error());
	while($rows11 = mysql_fetch_array($query_salgrade)): ?>
    <option value="<?php echo $rows11['job_term_id']; ?>"><?php echo $rows11['job_term_name']; ?></option>
    <?php endwhile;  ?>
	
	</select>

	
	</td>
	<td width="30%">

	</td>
     
  </tr>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  
  
  <tr height="40">
	<td width="10%" align="right">Job Duties</td>
	<td width="10%" colspan="5" ><div id='duties' class="error_strings"></div><textarea  rows="10" style=" width:75%; border-radius:0px;"  name="duties"  class="form-control" id="duties"><?php echo $duties; ?></textarea>
	
	<td width="10%"></td>
     <!--<td width="40%" rowspan="7" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>-->
  </tr>
   
  <tr>
  
  </tr>
  <tr>
  <td width="10%"></td>
  <td align="right" ><input type="submit" name="submit" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save  Details"></td>
  <td ><input type="reset" style="width:100px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Reset"></td>
  
  
  </tr>
			
</table>
	
</form>
<script>
 function show(aval) {
    if (aval == "Contract") {
    hiddenDiv.style.display='inline-block';
    Form.fileURL.focus();
    } 
    else{
    hiddenDiv.style.display='none';
    }

	
	
  }
  
   
</script>
<script type="text/javascript">
    var myDivs = new Array(6, 8, 9, 10);

    function showSelected(sapna) {
        var t = 'showdiv' + sapna,
            r, dv;
        for (var i = 0; i < myDivs.length; i++) 
{
            r = 'showdiv' + myDivs[i];
            dv = document.getElementById(r);
            if (dv) {
                if (t === r) 
				{
                    dv.style.display = 'none';
                } else {
                    dv.style.display = 'block';
                }
            }
        }
        return false;
    }
</script>
<script type="text/javascript">	
function run(sel) {

    var i = sel.selectedIndex;
    if (i != -1) {
        //document.getElementById("car").value = sel.options[i].text;

        $.ajax({
            type: "POST",
            url: "selector.php",
            data: { car: sel.options[i].text}

        }).done(function( msg ) {});
    }

}

 </script> 
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "dofa",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
	      max     : new Date(),    // the max date
      button      : "dofa"       // ID of the button
    }
	
    
	
	
	
  ); */

 </script> 
<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "doca",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "doca"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "dod",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "dod"       // ID of the button
    }
  );
 */

</script>

<script type="text/javascript">	
/* Calendar.setup(
    {
      inputField  : "exp_date",         // ID of the input field
      ifFormat    : "%Y-%m-%d",    // the date format
      button      : "exp_date"       // ID of the button
    }
  ); */


</script>