<?php include('Connections/fundmaster.php'); 
$next_emp_id=$_GET['emp_id'];
$next=$_GET['next'];
?>


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

<form name="start_invoice" action="process_multiple_slips.php" method="post">			
			<table width="100%" border="0">
  <tr >
    <td width="18%">&nbsp;</td>
	<td colspan="3" height="30"><?php

if ($_GET['missss']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#339900 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#339900" >Sorry No Payslip Availlable!!</font></strong></p></div>';
?>

<?php

if ($_GET['miss']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry No Payslip Availlable!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Payroll For This Month for This Sraff Has been proccesed</font></strong></p></div>';
?></td>
    </tr>
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Select Staff<font color="#FF0000">*</font></td>
    <td width="23%"><select name="emp_id">
	                  <option>------------------Select--------------------</option>
								  <?php
								  
								  $query1="select * from employees where status='0'";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->emp_id;?>"><?php echo $rows1->emp_firstname.' '.$rows1->emp_middle_name.''.$rows1->emp_lastname; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  </select></td>
    <td width="40%" rowspan="6" valign="top"><div id='start_invoice_errorloc' class='error_strings'></div></td>
  </tr>-->
  
    <tr height="20">
    <td width="5%">&nbsp;</td>
    <td width="20%">Select Month<font color="#FF0000">*</font></td>
    <td bgcolor>
	<input name="current_month" id="current_month" class="date-picker" size="40" />
	
	
	</td>
	<td width="500" rowspan="3" valign="top"><div id='emp_errorloc' class='error_strings'></div></td>
    <!--<td width="30%">Middle Name</td>
    <td width="5%"><input type="text" size="41" name="m_name" value="<?php echo $rowsemp_det->emp_middle_name;?> "></td>
    <td width="100%" rowspan="10" valign="top"><div id='new_userq_errorloc' class='error_strings'></div></td>-->
  </tr>
	
	<!--<tr height="20">
    <td>&nbsp;</td>
    <td width="20%">Enter Exit Date<font color="#FF0000">*</font></td>
    <td><input type="text" name="exit_date" size="40" id="exit_date" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden"></td>
							    <td width="40%" rowspan="6" valign="top"><div id='new_user_errorloc' class='error_strings'></div></td>
    </tr>-->
  
	
	
  <tr height="60">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" style="width:300px; height:30px; border-radius:5px; font-size:15px; font-weight:bold; color:#fff; background:#003399" value="Preview">&nbsp;&nbsp;</td>
    <td></td>
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



