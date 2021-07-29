<?php
/* $qr_confirm23a="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `add`='A' and user_group_id='$user_group_id'";
$qr_res23a=mysql_query($qr_confirm23a) or die ('Error : $qr_confirm23a.' .mysql_error());
$num_rows23a=mysql_num_rows($qr_res23a); */ 
if ($num_rows23a==6564440) 
{ 
include ('includes/restricted.php');
}
else
{
	
/* $payment_voucher_id=$_GET['payment_voucher_id'];	

$queryop = "SELECT * FROM payment_voucher where payment_voucher_id='$payment_voucher_id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
$rows=mysql_fetch_object($results); */


$id=$_GET['leave_id'];	

$queryop = "SELECT * FROM hs_hr_leavetype where leave_type_id='$id'";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
$rows=mysql_fetch_object($results);
	
$days=$rows->nature_of_days;

	
 if ($days=='working')
{

$days2='Working Days';	
}
elseif ($days=='calendar')
{
	
$days2='Calendar Days';	

}
else 
{

$days2='Select--------';	
}
	
	
	
 ?>
 <script language="javascript" type="text/javascript" src="js/widgEditor.js"></script>
<script language="javascript" src="gen_validatorv4.js" type="text/javascript"></script>

<script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
     
    $("#task_id").change(function() {
    //$(this).after('<div id="loader"><img src="loader.gif" alt="loading subcategory" /></div>');
    $.get('load_task_desc.php?parent_cat=' + $(this).val(), function(data) {
    $("#task_desc").html(data);
    $('#loader').slideUp(200, function() {
    $(this).remove();
    });
    });
    });
			
	////////////////////////////////// To select access status roles
	
	
	
	 
    
    });


    </script>
	
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<style type="text/css">


<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}

</Style>


<form name="emp" action="process_add_leave_type.php?sub_module_id=<?php echo $sub_module_id; ?>&id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">		
<!--<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">-->			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['addgroupconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Created Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the record exists</font></strong></p></div>';
?>
<span style="float:right;"><a style="width:40%; border-radius:5px; color:#fff; text-decoration:none; padding-left:40px; padding-top:5px; padding-bottom:5px; padding-right:40px; background:#ff0000;" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><< Back</a></span>

</td>
    </tr>
	
	 <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Leave Type Name <font color="#FF0000">*</font></td>
    <td width="23%"  height="50" ><div id='emp_leave_errorloc' class="error_strings"></div>
	<input type="text" style="width:300px; border:1px #000 solid;" name="leave"  required size="18"  value="<?php echo $rows->leave_type_name;?>" />
	</td>
   
  </tr>
  
  <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%"> Number Of days <font color="#FF0000">*</font></td>
    <td width="23%"  height="50" ><input  type="number" required style="width:300px; border:1px #000 solid;" name="no_of_days"  size="18" value="<?php echo $rows->no_of_days;?>" /></td>
   
  </tr>
    <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Applicable Gender <font color="#FF0000">*</font></td>
    <td width="23%"  height="50" ><select name="app_gender"  required style="width:300px; height:30px; border-radius:5px;">
	<option value="<?php echo $rows->app_gender; ?>"><?php echo $rows->app_gender; ?></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="">Both</option>
    
  </select></td>
   
  </tr>
   <tr height="20">
    <td bgcolor="" width="30%">&nbsp;</td>
    <td width="12%">Days<font color="#FF0000">*</font></td>
    <td width="23%"  height="50" ><select name="days"  required style="width:300px; height:30px; border-radius:5px;">
	<option value="<?php echo $days; ?>"><?php echo $days2; ?></option>
	<option value="calendar">Calendar Days</option>
	<option value="working">Working days</option>

    
  </select></td>
   
  </tr>
  
  
    
	
	
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	
	
    <td><input type="submit" name="submit" style="width:75%; color:#ffffff; height:40px; background:#019934; border-radius:5px; font-size:20px;" value="Save">
	<!--<input type="hidden" name="add_usergroup" id="add_usergroup" value="1">-->&nbsp;&nbsp;<!--<input type="reset" value="Cancel">--></td>
    <td><?php //echo $pend; ?></td>
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

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("emp");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
	
 frmvalidator.addValidation("leave","req",">>Please enter leave type name"); 
 frmvalidator.addValidation("no_of_days","req",">>Please leave type name"); 
 frmvalidator.addValidation("no_of_days","numeric",">>Days should be numeric"); 
  frmvalidator.addValidation("ref_no","req",">>Please enter ref no");
 frmvalidator.addValidation("client","req",">>Please enter client name");
 frmvalidator.addValidation("opening_date","req",">>Please enter opening date");
 

  

  
//]]></script>


   
<?php 
}
?>