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
<form name="emp" id="emp" action="processeditpassport.php?emp_id=<?php echo $emp_id;?>" method="post">			
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
	
$sql="SELECT * FROM staff_passports WHERE emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	
	
	
	?>
	
	
	
	</td>
	<td colspan="4" ><h3>Personal Certification - Passport Details for (<?php 
$querylatelpo="select * from employees where emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
echo $rowslatelpo->emp_fname.' '.$rowslatelpo->emp_mname.' '.$rowslatelpo->emp_lname;

	?>
	
	)</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Passport Number<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="passport_no" value="<?php echo $rows->passport_no; ?>"></td>
    <td width="15%">Date Of Issue<font color="#FF0000">*</font></td>
    <td width="5%"><input type="text" name="issue_date" size="41" id="issue_date" readonly="readonly" value="<?php echo $rows->issue_date; ?>"/></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr height="20">
 
    <td>Expiry Date <font color="#FF0000">*</font></td>
    <td><input type="text" name="exp_date" size="41" id="exp_date" readonly="readonly" value="<?php echo $rows->exp_date; ?>"/></td>
    <td>Place of Issue<font color="#FF0000">*</font></td>
     <td><input type="text" size="41" name="issue_place" value="<?php echo $rows->issue_place; ?>"></td>
    </tr>
	<tr height="20">
    
    <td valign="top">Remarks</td>
    <td><textarea name="passport_remarks" rows="5" cols="35"><?php echo $rows->passport_remarks; ?></textarea>
	
	
	
	
	
	
	
	
	
	</td>
    <td></td>
    <td>
	
	
	</td>
    </tr>
	
	
	
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
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
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "issue_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "issue_date"       // ID of the button
    }
  );
  
  Calendar.setup(
    {
      inputField  : "exp_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "exp_date"       // ID of the button
    }
  );
  
  
  
  </script> 

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("f_name","req",">>Please enter first name");
 frmvalidator.addValidation("l_name","req",">>Please enter lastname");
 frmvalidator.addValidation("emp_no","req",">>Please enter employee number");
 frmvalidator.addValidation("phone","req",">>Please enter phone number");
 frmvalidator.addValidation("nat_id","req",">>Please enter national ID number");
 frmvalidator.addValidation("pin_no","req",">>Please enter PIN No.");
 frmvalidator.addValidation("town","req",">>Please enter town");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
 frmvalidator.addValidation("dob","req",">>Please enter date of birth");
 frmvalidator.addValidation("gender","selone_radio",">>Please enter gender");
 frmvalidator.addValidation("marital_status","dontselect=0",">>Please select marital status");
 frmvalidator.addValidation("job_title","req",">>Please enter job title");
 frmvalidator.addValidation("em_status","dontselect=0",">>Select employment status");
 frmvalidator.addValidation("dept","dontselect=0",">>Please enter department");
 frmvalidator.addValidation("date_joined","req",">>Please enter date joined");
 frmvalidator.addValidation("job_email","req",">>Please enter  job email address");
 frmvalidator.addValidation("job_email","email",">>Please enter valid job email address");
 frmvalidator.addValidation("email","req",">>Please enter personal email address");
  frmvalidator.addValidation("email","email",">>Enter valid personal email address");
  frmvalidator.addValidation("job_cat","req",">>Enter job category");
  frmvalidator.addValidation("basic_sal","req",">>Enter basic Salary");

  
//]]></script>