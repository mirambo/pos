
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
<form name="emp" id="emp" action="processaddvisa.php?emp_id=<?php echo $emp_id; ?>" method="post">			
<table width="100%" border="0">
  <tr align="center" >
  
	<td colspan="6" height="30">
<?php



if ($_GET['addempconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';


if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
  <tr height="20">
	<td rowspan="18" width="25%" valign="top">
	<?php include ('includes/emp_submenu.php')?>
	
	
	
	</td>
	<td colspan="4" ><h3>Personal Certification - Visa Details for (<?php 
$querylatelpo="select * from employees where emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
echo $rowslatelpo->emp_fname.' '.$rowslatelpo->emp_mname.' '.$rowslatelpo->emp_lname;

	?>
	
	)</h3></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Visa Type<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="radio" name="visa_type" value="Single">Single &nbsp;&nbsp;<input type="radio" name="visa_type" value="Multiple">Multple</td>
    <td width="15%">Date Of Issue<font color="#FF0000">*</font></td>
    <td width="5%"><input type="text" name="issue_date" size="41" id="issue_date" readonly="readonly" /></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr height="20">
 
    <td>Expiry Date <font color="#FF0000">*</font></td>
    <td><input type="text" name="exp_date" size="41" id="exp_date" readonly="readonly" /></td>
    <td>Place of Issue<font color="#FF0000">*</font></td>
     <td><input type="text" size="41" name="issue_place"></td>
    </tr>
	<tr height="20">
    
    <td valign="top">Remarks</td>
    <td><textarea name="visa_remarks" rows="5" cols="35"></textarea>
	
	
	
	
	
	
	
	
	
	</td>
    <td colspan="2"> <div id='emp_errorloc' class='error_strings'></div></td>
    </tr>
	
	
	
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
  
  <SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether(); 
 frmvalidator.addValidation("visa_type","selone_radio",">>Please select visa type");
 frmvalidator.addValidation("issue_date","req",">>Please enter issue date");
 frmvalidator.addValidation("exp_date","req",">>Please enter expiry date");

 
 
 
  </SCRIPT>


