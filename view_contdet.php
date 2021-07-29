
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
<form name="emp" id="emp" action="processeditcontacts.php?emp_id=<?php echo $emp_id; ?>" method="post">			
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
$sql="SELECT * FROM staff_contacts WHERE emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
	
	?>
	
	
	
	</td>
	<td colspan="4" ><h3>Employee Contacts - Contact Details for (<?php 
$querylatelpo="select * from employees where emp_id='$emp_id'";
$resultslatelpo=mysql_query($querylatelpo) or die ("Error: $querylatelpo.".mysql_error());
$rowslatelpo=mysql_fetch_object($resultslatelpo);
echo $rowslatelpo->emp_fname.' '.$rowslatelpo->emp_mname.' '.$rowslatelpo->emp_lname;

	?>
	
	)</h3></td></tr>
	<tr>
	<td colspan="4"><h5>::Mobile Number</h5></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="12%">Southern Sudan 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="ssmob1" value="<?php echo $rows->ssmob1;?>"></td>
    <td width="15%">Southern Sudan 2.</td>
    <td width="5%"><input type="text" name="ssmob2" size="41" value="<?php echo $rows->ssmob2;?>"/></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
   <tr height="20">
    
    <td width="10%">Country Of Origin 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="comob1" value="<?php echo $rows->comob1;?>" ></td>
    <td width="15%">Country Of Origin 2.</td>
    <td width="5%"><input type="text" name="comob2" size="41" value="<?php echo $rows->comob2;?>" /></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  <tr>
	<td colspan="4"><h5>::Fixed Telephone Number</h5></td>
    
    <td>&nbsp;</td>
    </tr>
   <tr height="20">
    
    <td width="10%">Southern Sudan 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="sstel1" value="<?php echo $rows->sstel1;?>"></td>
    <td width="15%">Southern Sudan 2.</td>
    <td width="5%"><input type="text" name="sstel2" size="41" value="<?php echo $rows->sstel2;?>"/></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  
   <tr height="20">
    
    <td width="10%">Country Of Origin 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="cotel1" value="<?php echo $rows->cotel1;?>"></td>
    <td width="15%">Country Of Origin 2.</td>
    <td width="5%"><input type="text" name="cotel2" size="41" value="<?php echo $rows->cotel2;?>" /></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr> <tr>
	<td colspan="4"><h5>::E-mail Address</h5></td>
    
    <td>&nbsp;</td>
    </tr>
  <tr height="20">
    
    <td width="10%">Office 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="office_email1" value="<?php echo $rows->office_email1;?>"></td>
    <td width="15%">Office 2.</td>
    <td width="5%"><input type="text" name="office_email2" size="41" value="<?php echo $rows->office_email2;?>"/></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  
   <tr height="20">
    
    <td width="10%">Private 1.<font color="#FF0000">*</font></td>
    <td bgcolor="" width="20%"><input type="text" size="41" name="private_email1" value="<?php echo $rows->private_email1;?>"></td>
    <td width="15%">Private 2.</td>
    <td width="5%"><input type="text" name="private_email2" size="41" value="<?php echo $rows->private_email2;?>" /></td>
    <td width="100%" rowspan="10" valign="top"></td>
  </tr>
  

  <tr>
    
    <td rowspan="4" valign="top" colspan="2" ><div id='emp_errorloc' class='error_strings'></div></td>
    <td><input type="submit" name="submit" value="Save">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether(); 
 frmvalidator.addValidation("ssmob1","req",">>Please enter south sudan mobile number 1");
 frmvalidator.addValidation("comob1","req",">>Please enter country of origin mobile number 1");
 frmvalidator.addValidation("sstel1","req",">>Please enter south sudan tel number 1");
 frmvalidator.addValidation("cotel1","req",">>Please enter country of origin tel number 1");
 frmvalidator.addValidation("office_email1","req",">>Please enter office email 1");
 frmvalidator.addValidation("office_email1","email",">>Please enter valid office email 1");
 frmvalidator.addValidation("private_email1","req",">>Please enter private email 1");
 frmvalidator.addValidation("private_email1","email",">>Please enter valid private email 1");

 
  </SCRIPT>





