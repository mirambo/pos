<?php include('Connections/fundmaster.php'); 
$id=$_GET['commision_id'];
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
		
		
		
		<?php require_once('includes/commision_submenu.php');  ?>
		
		<h3>:: Update Commision Percentage to the Sales Personel</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
<form name="assign_comm" action="process_edit_ass_comm.php?ass_comm_id=<?php echo $id;?>" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['updateconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Commision Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Sales Rep Already Assigned</font></strong></p></div>';


$querycomm="select * from users,client_discount 
where users.user_id=client_discount.client_id AND client_discount.client_discount_id='$id'";
$resultscomm=mysql_query($querycomm) or die ("Error: $querycomm.".mysql_error());
								  
$rowscomm=mysql_fetch_object($resultscomm);
//$cat_id=$rowsprod->cat_id;




?></td>
    </tr>
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Sales Represenative<font color="#FF0000">*</font></td>
    <td width="23%">
	<select name="sales_rep">
	<?php 
	if ($id)
	{?>
	<option value="<?php echo $rowscomm->client_id;?>"><?php echo $rowscomm->f_name;?> </option>
	<?php

	}
	
	
	?>
	
								  <?php
								  
								  $query1="select * from users,user_group where users.user_group_id=user_group.user_group_id 
								  and users.user_group_id='35'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->emp_firstname.' '.$rows1->emp_middle_name.''.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select></td>
    <td width="40%" rowspan="3" valign="top"><div id='assign_comm_errorloc' class='error_strings'></div></td>
  </tr>
  
  
  <tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr>
  <tr>
    <td>&nbsp;</td>
    <td>Enter Percentage (%)<font color="#FF0000">*</font></td>
    <td><input type="text" name="comm_perc" size="41" value="<?php echo $rowscomm->comm_perc; ?>"></td>
    </tr>
	
	
	<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
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
 var frmvalidator  = new Validator("assign_comm");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("comm_perc","req","Please enter commision percentage");
  
 
 
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