<?php
 $id=$_GET['contacts_id'];
if (isset($_POST['update_competency']))
{

edit_competency($cont_person,$phone,$telephone,$email,$pin,$fax,$street,$building,$address,$town,$user_id);
}
 ?>
 
 <?php 
 


$sql="SELECT * FROM company_contacts where contacts_id='$id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
{
border-collapse:collapse;
}
.table1 td, tr
{
border:1px solid black;
padding:3px;
}

.table
{
border-collapse:collapse;
}

.table td, tr
{
border:1px solid black;
font-size:12px;
</Style>

<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">		
<table width="100%" border="1" align="center">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
    </tr>
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Contact Details</strong></td>
	<td width="18%" bgcolor="#FF9933" align="center"><strong>Company Terms And Conditions</strong></td>
    </tr>
  <tr >
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Company Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="cont_person" value="<?php echo $rows->cont_person;?>"></td>
    <td width="40%" rowspan="15" valign="top"><table width="100%" class="table">
	<tr bgcolor="#FFFFCC"><td><strong>Invoice Terms And Conditon</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="invoice_terms"><?php echo $rows->invoice_terms; ?></textarea></td>
	
	
	</tr>
	
	<tr bgcolor="#FFFFCC"><td><strong>Receipt Terms And Conditon</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="receipt_terms"><?php echo $rows->receipt_terms; ?></textarea></td>
	
	
	</tr>
	
	<tr bgcolor="#FFFFCC"><td><strong>Credit Note Terms And Conditon</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="credit_note_terms"><?php echo $rows->credit_note_terms; ?></textarea></td>
	
	
	</tr>
	
	<tr bgcolor="#FFFFCC"><td><strong>Job Card Terms And Conditon</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="job_card_terms"><?php echo $rows->job_card_terms; ?></textarea></td>
	
	
	</tr>
	
	
	
	<tr bgcolor="#FFFFCC"><td><strong>Quotation Terms And Conditon</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="quotation_terms"><?php echo $rows->quotation_terms; ?></textarea></td>
	
	
	</tr>
	
	<tr bgcolor="#FFFFCC"><td><strong>Company Descrption</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="company_description"><?php echo $rows->company_description; ?></textarea></td>
	
	
	</tr>
	
	<tr bgcolor="#FFFFCC"><td><strong>LPO Terms and Conditions</strong></td>
	
	
	</tr>
	
	<tr><td><textarea rows="1" cols="100" name="lpo_terms"><?php echo $rows->lpo_terms; ?></textarea></td>
	
	
	</tr>
	
	</table></td>
  </tr>
  <tr height="20">
    <td>&nbsp;</td>
    <td>Mobile Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="phone"  value="<?php echo $rows->phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number</td>
    <td><input type="text" size="41" name="telephone"  value="<?php echo $rows->telephone;?>"></td>
    </tr>
		<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email"  value="<?php echo $rows->email;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Company PIN<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="pin"  value="<?php echo $rows->pin;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Website</td>
    <td><input type="text" size="41" name="fax"  value="<?php echo $rows->fax;?>"></td>
    </tr>
	
	<tr>
    <td width="18%">&nbsp;</td>
	<td colspan="2" height="20" bgcolor="#FF9933"><strong>Delivery Address</strong></td>

    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Street<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="street"  value="<?php echo $rows->street;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Building<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="building"  value="<?php echo $rows->building;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="address"  value="<?php echo $rows->address;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>City / Town<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="town"  value="<?php echo $rows->town;?>"></td>
    </tr>
  
  <tr>
    <td>&nbsp;</td>

    <td>
	<input type="submit" name="submit" value="Save">&nbsp;&nbsp;
	<input type="hidden" name="update_competency" value='1'>&nbsp;&nbsp;
	
	<input type="reset" value="Cancel"></td>
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
 /* var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("cc_code","req",">>Please enter Donor Code");
 frmvalidator.addValidation("cc_name","req",">>Please enter sponsor name"); */
 
 
 
 
  </SCRIPT>