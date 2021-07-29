<?php 
$post_grad_scholarship_id=$_GET['post_grad_scholarship_id'];

?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>


<form name="new_supplier" action="processeditadminpostgrad.php?post_grad_scholarship_id=<?php echo $post_grad_scholarship_id; ?>" method="post">			
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


$sql="SELECT * FROM post_grad_scholarship where post_grad_scholarship_id='$post_grad_scholarship_id' order by post_grad_scholarship_id desc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);


?></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Institution of Origin<font color="#FF0000">*</font></td>
    <td><select name="university">
	<?php
$institution_id=$rows->institution_id;
	

$sqlspons="SELECT * FROM insitution where institution_id='$institution_id'";
$resultsspons= mysql_query($sqlspons) or die ("Error $sqlspons.".mysql_error());
$rowssponsor=mysql_fetch_object($resultsspons);
if ($post_grad_scholarship_id!='')
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
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Students Full Name<font color="#FF0000">*</font></td>
    <td width="23%"><input type="text" size="41" name="stud_fname" value="<?php echo $rows->full_name; ?>"></td>
    <td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
	<tr height="20">
    <td>&nbsp;</td>
    <td>Gender<font color="#FF0000">*</font></td>
    <td>
	<select name="gender">
	<?php
if ($post_grad_scholarship_id!='')
{?>
<option value="<?php echo $rows->gender; ?>"><?php  echo $rows->gender;  ?></option>
<?php
}

else
{
	?>
	
	                  <option value="0">Select..................................</option>
							 <?php }?>  	  
										  
                                    <option value="Male">Male</option>
									<option value="Female">Female</option>
									
                                 
                                
										  
									
								  </select>	</td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Nationality<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="nationality" value="<?php echo $rows->nationality;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Year of Admission<font color="#FF0000">*</font></td>
    <td><select name="adm_year">
	
	<?php
if ($post_grad_scholarship_id!='')
{?>
<option value="<?php echo $rows->admin_year; ?>"><?php  echo $rows->admin_year;  ?></option>
<?php
}

else
{
	?>
	                  <option>Select..................................</option>
								  
									<?php }?>	  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									
                                    
                                
										  
									
								  </select></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Year of Completion<font color="#FF0000">*</font></td>
    <td><select name="comp_year">
	
	<?php
if ($post_grad_scholarship_id!='')
{?>
<option value="<?php echo $rows->comp_year; ?>"><?php  echo $rows->comp_year;  ?></option>
<?php
}

else
{
	?>
	                  <option>Select..................................</option>
								  <?php }?>	
										  
                                    <option value="2000">2000</option>
									<option value="2001">2001</option>
									<option value="2002">2002</option>
									<option value="2003">2003</option>
									<option value="2004">2004</option>
									<option value="2005">2005</option>
									<option value="2006">2006</option>
									<option value="2007">2007</option>
									<option value="2008">2008</option>
									<option value="2009">2009</option>
									<option value="2010">2010</option>
									<option value="2011">2011</option>
									<option value="2012">2012</option>
									<option value="2013">2013</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
                                    
                                
										  
									
								  </select></td>
    </tr>
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Phone Number<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="phone"value="<?php echo $rows->phone;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email" value="<?php echo $rows->email;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 1<font color="#FF0000">*</font></td>
    <td>
	<input type="text" size="41" name="sponsor1" value="<?php echo $rows->sponsor1;?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 2</td>
    <td>
	<input type="text" size="41" name="sponsor2" value="<?php echo $rows->sponsor2;?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Sponsor 3</td>
    <td>
	<input type="text" size="41" name="sponsor3" value="<?php echo $rows->sponsor3;?>">
	
	</td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Remarks</td>
    <td><textarea cols="35" rows="3" name="remarks"><?php echo $rows->remarks; ?></textarea></td>
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

<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();

 frmvalidator.addValidation("stud_fname","req",">>Please enter student full name");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality"); 
 frmvalidator.addValidation("sponsor1","req",">>Please enter sponsor1");
 frmvalidator.addValidation("phone","req",">>Please enter phone");
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email address");
 
 
 
  </SCRIPT>