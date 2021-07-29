<?php 
$booking_id=$_GET['booking_id'];
$id=$_GET['cat'];
if (isset($_POST['add_settlement']))
{
add_settlement ($area,$location,$set_code,$set_name,$set_desc);
}

?>
<SCRIPT language="javascript">
function reload(form)
{
var val=form.area.options[form.area.options.selectedIndex].value;
self.location='home.php?initiateproject=initiateproject&cat=' + val ;

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



<form name="new_supplier" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">			
			<table width="80%" border="0" align="center">
  <tr bgcolor="#00CC00">
   
	<td colspan="6" height="40" align="center"><?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFffff; height:25px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Booking Done Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';


if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr bgcolor="#FFFFCC">
   
	<td colspan="3" height="40" align="center">
	
	<strong><a style="font-weight:bold; text-decoration:none;" href="home.php?submit_biweekly=submit_biweekly&booking_id=<?php echo $booking_id;?>&quote=gq">Proceed To Generate Quotation.... </a></strong></strong>
	</td>
	<td colspan="3" height="40" align="center">
	
	<strong><a style="font-weight:bold; text-decoration:none;" href="home.php?locationreportc=locationreportc&booking_id=<?php echo $booking_id;?>">Proceed To Generate Job Card.... >>> </a></strong>
	</td>
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