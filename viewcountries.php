<?php
$get_job_card_id=$_GET['job_card_id'];
if ($sess_allow_add==0)
{
include ('includes/restricted.php');
}
else
{
 ?>

  <?php
if (isset($_POST['add_job_card']))
{

assign_projectdonor($job_card_id,$customer_id,$start_date,$end_date,
$start_from,$technician_id,$service_item_id,$service_item_name,$service_desc,
$unit_cost,$currency,$quantity,$amount_paid,$user_id);
}
 ?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>




<script type="text/javascript">
        

function confirmDelete()
{
    return confirm("Are you sure you want to save?");
}

</script>



 <form name="assign_comm" action="process_assign_commission.php" method="post">			
			<table width="100%" border="0">
  <tr>
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['asign_comm_confirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Commision Assinged Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Sales Rep Already Assigned</font></strong></p></div>';
?></td>
    </tr>
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Sales Represenative<font color="#FF0000">*</font></td>
    <td width="23%"><select name="sales_rep"><option>-------------------Select-----------------------</option>
								  <?php
								  
								  $query1="select * from users,user_group where users.user_group_id=user_group.user_group_id 
								  and users.user_group_id='35'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
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
    <td><input type="text" name="comm_perc" size="41"></td>
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
 frmvalidator.addValidation("sales_rep","dontselect=0","Please select sales representative");
frmvalidator.addValidation("comm_perc","req","Please enter commision percentage");
  /*frmvalidator.addValidation("phone_no","req","Please enter Phone Number");
  frmvalidator.addValidation("email_addr","req","Please enter  email address");
  frmvalidator.addValidation("email_addr","email","Please enter Valid email address");*/
 
 
  </SCRIPT>




   <?php }?>

