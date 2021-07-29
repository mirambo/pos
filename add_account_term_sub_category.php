<?php include('Connections/fundmaster.php'); 

$id=$_GET['major_term'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.major_term.options[form.major_term.options.selectedIndex].value;
self.location='add_account_term_sub_category.php?major_term=' + val ;

}

</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/chart_submenu.php');  ?>
		
		<h3>:: Adding New Accounting Terminology into the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processaaddsubcatterminology.php" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addtermconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Terminology Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exist</font></strong></p></div>';
?></td>
  </tr>
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td width="22%">Select Major Terminology<font color="#FF0000">*</font></td>
    <td width="23%"><select name="major_term" id="major_term" onChange="reload(this.form)">
	<?php 
	$querycat="select * from accounting_terminologies where terminology_id='$id'";
	$resultscat=mysql_query($querycat) or die ("Error: $querycat.".mysql_error());
	$rowscat=mysql_fetch_object($resultscat);
	
	if ($id=='')
	{
	?>
	<option>-------------------Select-----------------------</option>
								  <?php
								  
     }
	 
	 else 
	 { ?>
	 <option value="<?php echo $id; ?>"><?php echo $rowscat->terminology_name; ?></option>
	 <?php 
	 
	 }
	?>
	
								  <?php
								  
								  $query1="select * from accounting_terminologies";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->terminology_id; ?>"><?php echo $rows1->terminology_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="2" valign="top"><div id='new_user_group_errorloc' class='error_strings'></div></td>
  </tr>
  <tr height="40">
    <td>&nbsp;</td>
    <td>Enter Minor Terminology<font color="#FF0000">*</font></td>
    <td><select name="minor_term" id="minor_term"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from minor_terminologies where terminology_id='$id'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->minor_terminology_id; ?>"><?php echo $rows1->minor_terminology_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    </tr>
	<tr height="40">
    <td>&nbsp;</td>
    <td>Enter Sub-Category Terminology<font color="#FF0000">*</font></td>
    <td><input type="text" name="sub_cat_term" size="30"></td>
    </tr>
  
  <tr>
  
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
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 <!--frmvalidator.addValidation("major_term","dontselect='0'",">>Please select major terminology");-->
 frmvalidator.addValidation("minor_term","dontselect='0'",">>Please enter minor terminology");
 frmvalidator.addValidation("sub_cat_term","req",">>Please enter sub category terminology");
 
 
 
  </SCRIPT>

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
</body>

</html>