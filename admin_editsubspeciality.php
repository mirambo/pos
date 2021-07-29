<?php 
$sub_speciality_id=$_GET['sub_speciality_id'];

?>
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



<form name="new_supplier" action="processadmineditspeciality.php?sub_speciality_id=<?php echo $sub_speciality_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editsuccess']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';

$sql="SELECT * FROM sub_speciality WHERE sub_speciality_id='$sub_speciality_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Institution of Origin<font color="#FF0000">*</font></td>
    <td><select name="orig_inst">
	<?php
$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
if ($sub_speciality_id!='')
{?>
	
	<option value="<?php echo $rowssponsor->institution_id;?>"><?php echo $rowssponsor->institution_name; ?></option>
<?php
}
else
{
	?>	
	<option>Select..................................</option>
	
								  <?php
								  }
								  $query1="SELECT * FROM insitution order by institution_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_id; ?>"><?php echo $rows1->institution_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    </tr>
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="30%">Beneficiary Full Name<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="ben_fname" value="<?php echo $rows->ben_fname;?>"></td>
	<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Gender<font color="#FF0000">*</font></td>
    <td><select name="gender">
	<?php 
	if ($sub_speciality_id!='')
{?>
	
	<option value="<?php echo $rows->gender; ?>"><?php echo $rows->gender; ?></option>
<?php
}
else
{
	?>
	
	<option>Select..................................</option>
	<?php }?>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	
	
	
	</select>
	
	</td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Nationality<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="nationality" value="<?php echo $rows->nationality;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Host Institution<font color="#FF0000">*</font></td>
    <td><select name="university">
	<?php
	$rows->university_id;
	
$university_id=$rows->university_id;
$sqluni="SELECT * FROM university where university_id='$university_id'";
$resultsuni= mysql_query($sqluni) or die ("Error $sqlsuni.".mysql_error());
$rowsuni=mysql_fetch_object($resultsuni);
if ($sub_speciality_id!='')
{?>
	
	<option value="<?php echo $university_id; ?>"><?php echo $rowsuni->university_name; ?></option>
<?php
}
else
{
	?>	
	<option>Select..................................</option>
	
								  <?php
								  }
								  $query1="select * from university order by university_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->university_id; ?>"><?php echo $rows1->university_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td> Area of Speciality</td>
    <td><input type="text" size="41" name="spec" value="<?php echo $rows->subspecility_area;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Starting Date<font color="#FF0000">*</font></td>	
    <td><input type="text" name="start_date" size="41" id="start_date" readonly="readonly" value="<?php echo $rows->start_date;?>"/></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Completion Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="comp_date" size="41" id="comp_date" readonly="readonly" value="<?php echo $rows->comp_date;?>"/></td>
    </tr>
	
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Select Institution Offering<font color="#FF0000">*</font></td>
    <td><select name="institute_off"><option>Select..................................</option>
								  <?php
								  
								  $query1="select * from institution_offer order by institution_offer_name desc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->institution_offer_id; ?>"><?php echo $rows1->institution_offer_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    </tr>-->
	
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Phone Number</td>
    <td><input type="text" size="41" name="phone" value="<?php echo $rows->phone;?>" ></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 1<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="sponsor1" value="<?php echo $rows->sponsor1;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 2</td>
    <td><input type="text" size="41" name="sponsor2" value="<?php echo $rows->sponsor2;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 3</td>
    <td><input type="text" size="41" name="sponsor3" value="<?php echo $rows->sponsor3;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Remarks</td>
    <td><textarea cols="35" rows="3" name="remarks"><?php echo $rows->remarks;?></textarea></td>
    </tr>
	
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update Record">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
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
      inputField  : "start_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "start_date"       // ID of the button
    }
  );
  
   Calendar.setup(
    {
      inputField  : "comp_date",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "comp_date"       // ID of the button
    }
  );
  
 
  </script> 

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("ben_fname","req",">>Please enter beneficiary name");
 <!--frmvalidator.addValidation("gender","dontselect=0",">>Please select gender");-->
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
<!-- frmvalidator.addValidation("university","dontselect=0",">>Please select host institute");-->
 <!--frmvalidator.addValidation("start_date","req",">>Please enter start date");  -->
 <!--frmvalidator.addValidation("comp_date","req",">>Please enter completion date");-->
 <!--frmvalidator.addValidation("spec","req",">>Please enter speciality");-->
  <!--frmvalidator.addValidation("phone","req",">>Please enter phone");-->
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
 frmvalidator.addValidation("sponsor1","req",">>Please enter sponsor 1");
 
 
 
 
  </SCRIPT>