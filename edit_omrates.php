<?php
$omjobtitle_id=$_GET['omjobtitle_id'];
$sqlx="select * from omjob_titles where omjob_title_id='$omjobtitle_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

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

<form name="new_supplier" action="processedit_omrates_perday.php?omjobtitle_id=<?php echo $omjobtitle_id; ?>" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Updated Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Record Exist</font></strong></p></div>';
?></td>
    </tr>
 
	
	<tr height="20">
    <td>&nbsp;</td>
  <td width="19%">Job Title<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="amount" value="<?php echo $rowsx->omjob_title_name; ?>" readonly="readonly"></td>
    </tr>
	
	<tr height="20">
    <td>&nbsp;</td>
    <td>Expertiate Staff Rate<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="exp_staff_rate" value="<?php 
	//$omjob_title_id=$rows->omjob_title_id;
	$queryst="select * FROM omper_day_rates WHERE omjob_title_id='$omjobtitle_id' AND job_cat_id='2'";
	$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
	$rowssst=mysql_fetch_object($resultsst);
	
	echo $rowssst->amount;
	
	
	?>"></td>
    </tr>
	<tr height="20">
    <td>&nbsp;</td>
    <td>National Staff Rate<font color="#FF0000">*</font></td>
    <td><input type="text" size="41" name="nat_staff_rate" value="<?php 
	
	$queryst="select * FROM omper_day_rates WHERE omjob_title_id='$omjobtitle_id' AND job_cat_id='1'";
	$resultsst=mysql_query($queryst) or die ("Error: $queryst.".mysql_error());
	$rowssst=mysql_fetch_object($resultsst);
	
	echo $rowssst->amount; 
	
	
	?>"></td>
    </tr>
<!--<tr height="20">
	  <td>&nbsp;</td>
	  <td>Enter the Amount(USD)<font color="#FF0000">*</font></td>
    <td><div id='emp_basic_sal_errorloc' class="error_strings"></div><input type="text" size="41" name="amount"></td>
    <td></td>
    <td></td>
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
 frmvalidator.addValidation("currency","dontselect=0",">>Please select currency");
 frmvalidator.addValidation("per_hour_charge","req",">>Please enter per hour charge");

 
  
 
 
  </SCRIPT>