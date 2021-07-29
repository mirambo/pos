<?php 
$client_id=$_GET['client_id'];
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



<form name="new_supplier" action="processeditspeciality.php?client_id=<?php echo $client_id; ?>" method="post">			
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

$sql="SELECT clients.c_name,clients.client_id,clients.block_id,clients.c_address,clients.c_town,clients.c_paddress,clients.c_phone,
clients.contact_person,clients.c_email,blocks.block_name FROM clients,blocks where clients.block_id=blocks.block_id and clients.client_id='$client_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);

?></td>
    </tr>
 
  
	
	
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Client Name<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_name" value="<?php echo $rows->c_name;?>"></td>
	<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Select Block<font color="#FF0000">*</font></td>
    <td><select name="block">
	<?php
if ($client_id=='')
{
	?>
	<option>Select..................................</option>
								  <?php
								  
								  $query1="select * from blocks order by block_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->block_id; ?>"><?php echo $rows1->block_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
							}
else
{?>
<option value="<?php echo $rows->block_id;?>"><?php echo $rows->block_name;?></option>

<?php
								  
								  $query1="select * from blocks order by block_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->block_id; ?>"><?php echo $rows1->block_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }





}							
								  ?>
								  
								  
								  
								  
								  
								  
								  </select></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_address" value="<?php echo $rows->c_address;?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Town<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_town" value="<?php echo $rows->c_town;?>"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Physical Address</td>
    <td><input type="text" size="41" name="cp_address" value="<?php echo $rows->c_paddress;?>" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number<font color="#FF0000">*</font></td>
    <td><input type="text" name="telephone" size="41" value="<?php echo $rows->c_phone;?>" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email" value="<?php echo $rows->c_email;?>" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Contact Person<font color="#FF0000">*</font></td>
    <td><input type="text" name="contact_person" size="41" value="<?php echo $rows->contact_person;?>"  /></td>
    </tr>
	
	
	
	
  
  <tr>
	
	
	
  
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
 frmvalidator.addValidation("ben_fname","req",">>Please enter beneficiary name");
 frmvalidator.addValidation("gender","dontselect=0",">>Please select gender");
 frmvalidator.addValidation("nationality","req",">>Please enter nationality");
 frmvalidator.addValidation("university","dontselect=0",">>Please select host institute");
 frmvalidator.addValidation("start_date","req",">>Please enter start date");  
 frmvalidator.addValidation("comp_date","req",">>Please enter completion date");
 <!--frmvalidator.addValidation("spec","req",">>Please enter speciality");-->
  <!--frmvalidator.addValidation("phone","req",">>Please enter phone");-->
 frmvalidator.addValidation("email","req",">>Please enter email address");
 frmvalidator.addValidation("email","email",">>Please enter valid email");
 frmvalidator.addValidation("sponsor1","req",">>Please enter sponsor 1");
 
 
 
 
  </SCRIPT>