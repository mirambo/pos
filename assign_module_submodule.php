<?php include('Connections/fundmaster.php'); 
$id=$_GET['user_group_id'];
?>

<SCRIPT language="javascript">
function reload(form)
{
var val=form.user_group_id.options[form.user_group_id.options.selectedIndex].value;
self.location='unassign_module_usergroup.php?user_group_id=' + val ;

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);
.table1
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


}


</style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/usergroup_module_submenu.php');  ?>
		
		<h3>:: View / Deassociate Modules from User groups</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">



<form name="emp" id="emp" action="process_assign_module_submodule.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="5" height="30"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:23px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Submodules Associated successfuly to Module!!</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Submodules already allocataded</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="2%">&nbsp;</td>
    <td width="15%" colspan="2" align="center">Select Module<font color="#FF0000">*</font>
    <select name="module_id">
	<option value="0">Select..................................................................</option>
								  <?php
								  
								  $query1="select * from modules order by sort_order asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->module_id; ?>"><?php echo $rows1->module_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
</select>
	
	</td>
    <td width="15%" rowspan="" align="left" height="30" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>

  </tr>
 <tr>
    
    <td colspan="3" valign="top" align="center">

	<table align="right" width="80%" border="1" class="table1" >
	
	<tr style="background:url(images/description.gif);" height="20" align="center">
	<td></td>
	<td><strong>Sub Module Name</strong></td>  
  </tr>
	<?php
								  
								  $queryst="select * FROM sub_module where status='0' order by sub_module_name asc";
								  $resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
								  
								  if (mysql_num_rows($resultsst)>0)
								  
								  {
									  while ($rowsst=mysql_fetch_object($resultsst))
									  {
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="10">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="10" >';
}
									  
									   ?>
									  
									  
									  
								
	    <td align="center"><input type="checkbox" name="sub_module_id[]" value="<?php echo $rowsst->sub_module_id;?>"></td>
						
	   <td><?php echo $rowsst->sub_module_name; ?></td>
	
	   
   
    

  </tr>
									  
									  
									  <?php 
									  }
									  
									  }
									  else
									  {
									  ?>
								<tr bgcolor="#FFFFCC"><td colspan='5' align="center" height="40"><font color="#ff0000"><strong>Sorry!! All Modules are assigned</strong></td></tr> 	  
									  
								<?php 	  
								}
									  
									  
									  ?>
									  
	
									  
									  
									  
									  
								
	
	
	

	<tr height="40">
    <td></td>
   
    <td align="center" colspan="2"><input type="submit" name="submit" value="Associate">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
  
	
  </tr>
	
	
	</table>

	
 
	<td></td>
  </tr>
  
  
	
	
</table>

</form>




<?php
/*
if($original_bunch_id!='')
{?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>
<?php

}
else
{ 

*/?>
<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("module_id","dontselect=0",">>Please select module");
 frmvalidator.addValidation("project_manager","dontselect=0",">>Please select project manager");

 frmvalidator.addValidation("period_from","req",">>Please enter period from");
 frmvalidator.addValidation("period_to","req",">>Please enter period to");
</script>


 
			
			
			
					
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