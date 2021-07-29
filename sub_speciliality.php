<?php 
$id=$_GET['cat'];
?>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.region.options[form.region.options.selectedIndex].value;
self.location='home.php?subspeciality=subspeciality&cat=' + val ;

}

</script>
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



<form name="new_supplier" action="processaddspeciality.php" method="post">			
			<table width="80%" border="0" align="center">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addsubconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Recorded Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="15%">Select Region<font color="#FF0000">*</font></td>
    <td width="15%"><select name="region" id="region" onChange="reload(this.form)">
<?php 
								  
								  $queryreg="select * from regions where region_id='$id' order by region_name asc";
								  $resultsreg=mysql_query($queryreg) or die ("Error: $queryreg.".mysql_error());
								  $rowsreg=mysql_fetch_object($resultsreg);

?>	
	
	
	<?php if ($id=='')
	{

	?>
<option value="0">Select..........................................................</option>
								  <?php								  
     }
	 
	 else 
	 
	 { ?>
	 <option value="<?php echo $rowsreg->region_id;?>"><?php echo  $rowsreg->region_name;?></option>
	 <?php 
	 
	 }
								 
								  
								  $query1="select * from regions order by region_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->region_id; ?>"><?php echo $rows1->region_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
									  
									  
								  
								  
								  
								  
								  
								  ?></select></td>

	<td width="40%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Select Territory<font color="#FF0000">*</font></td>
    <td>
<select name="territory">	
	<?php
if ($id!='')
{
	?>
	
	
	<option value="0">Select..........................................................</option>
								  <?php
								  
								  
								  $query1="select * from territory where region_id='$id' order by territory_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->territory_id; ?>"><?php echo $rows1->territory_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								}
else
{

?>
	
	
	<option value="0">Select..........................................................</option>
								  <?php
								  
								  
								  $query1="select * from territory order by territory_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->territory_id; ?>"><?php echo $rows1->territory_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }






}								
								  
								  ?>
								  
								  </select></td>
	
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td width="15%">Enter Area Name<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="area_name" ></td>
	
    </tr>

	
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td>Postal Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_address" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Town<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="c_town" ></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Physical Address</td>
    <td><input type="text" size="41" name="cp_address" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Telephone Number<font color="#FF0000">*</font></td>
    <td><input type="text" name="telephone" size="41" /></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Email Address<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="email" ></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>Contact Person<font color="#FF0000">*</font></td>
    <td><input type="text" name="contact_person" size="41"  /></td>
    </tr>-->
	
	
	
	
  
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



<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_supplier");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 /*frmvalidator.addValidation("region","dontselect=0",">>Please select region");*/
 frmvalidator.addValidation("area_name","req",">>Please enter area name");

 
 
 
 
  </SCRIPT>