<?php 
$date_month=$_GET['date_month']; 

?>

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
 <script src="jquery.js"></script>
    <script type="text/javascript" src="jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});
</script>
<style>
.ui-datepicker-calendar {
    display: none;
    }
</style>
<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>
<link href="css/superTables.css" rel="stylesheet" type="text/css" />
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
<SCRIPT language="JavaScript">
    function validation() 
{ 
        var chks = document.getElementsByName('rr[]');//here rr[] is the name of the textbox 
        var flag=0;                     
        for (var i = 0; i < chks.length; i++) 
        {         
            if (chks[i].value!="") 
                { 
                flag=1;
               } 
 
 
 
        } 
 
        if (flag==0)
            {
                alert("Please fillup atleast one textbox");
                return false;
            }
        else return true;
 
} 


</SCRIPT>



<form name="emp" id="emp" action="process_cancel_exp_payroll.php" method="post">			
			<table width="100%" border="0">
 <tr height="20">
    <td width="15%">&nbsp;</td>
	<td colspan="6" height="30" align="center"><?php

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:500px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Payroll For '.$date_month. ' Cancelled Successfuly</div>';
?>

<?

if ($_GET['staffonsite']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Current staff are on site. New Staff should report from'.$period_to.'</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! the user is existing</font></strong></p></div>';
?></td>
    </tr>
	
	<tr height="20">
    <td bgcolor="" width="20%">&nbsp;</td>
    <td width="20%" align="right"><strong>Select Month And Year </strong><font color="#FF0000">*</font></td>
    <td width="15%"><input name="date_month" id="date_month" class="date-picker" size="40" /></td>
    <td width="20%" rowspan="3" align="left" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
	<td></td>
  </tr>
  
<tr height="50">
    <td>&nbsp;</td>
    <td></td>
    <td><input type="submit" name="submit" Value="Cancel Payroll">&nbsp;&nbsp;&nbsp;<input type="reset"  Value="Cancel"></td>
    </tr>
	
	
	
  
   <tr>
    
    <td colspan="4" valign="top" align="center">

	
    <td>&nbsp;</td>
	
 
	<td>&nbsp;</td>
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
 frmvalidator.addValidation("date_month","req",">>Please enter date and month");
 frmvalidator.addValidation("project","req",">>Please select projects");
</script>


 
  
 
 