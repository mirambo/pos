<?php include('Connections/fundmaster.php'); 
$id=$_GET['minor_terminology_id'];

$sqlx="select accounting_terminologies.terminology_name,accounting_terminologies.terminology_id,minor_terminologies.minor_terminology_name,minor_terminologies.minor_terminology_id from accounting_terminologies,minor_terminologies
where minor_terminologies.terminology_id=accounting_terminologies.terminology_id and minor_terminologies.minor_terminology_id='$id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);


?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

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
		
		<h3>:: Updating Accounting Terminology into the System</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="new_user_group" action="processeditminorterminology.php?minor_terminology_id=<?php echo $id;?>" method="post">			
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
    <td width="19%">Select Major Terminology<font color="#FF0000">*</font></td>
    <td width="23%"><select name="major_term">
	
	
	<option value="<?php echo $rowsx->terminology_id; ?>"><?php echo $rowsx->terminology_name;?></option>
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
    <td><input type="text" name="minor_term" size="30" value="<?php echo $rowsx->minor_terminology_name;?>"></td>
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

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("new_user_group");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("major_term","dontselect='0'",">>Please select major terminology");
 frmvalidator.addValidation("minor_terminology","req",">>Please enter minor terminology");
 
 
 
  </SCRIPT>-->

			
			
			
					
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