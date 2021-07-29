<?php 

	
$id=$_GET['employee_id'];
	
	
$queryopv = "SELECT * FROM hs_hr_employee where emp_number='$id'";
$resultsv= mysql_query($queryopv) or die ("Error $queryopv.".mysql_error());
$rowsv=mysql_fetch_object($resultsv);

$queryjob="SELECT * FROM employee_job_details WHERE employee_id='$id'" ;	
$resultsjob=mysql_query($queryjob);

$rowsjob=mysql_fetch_object($resultsjob);

$basic_pay=$rowsjob->basic_pay;

$nhif_amount=$basic_pay*3/100;






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

<form name="search" method="post" action="">  
  


<table width="60%" border="0" align="center" style="margin:auto;" class="table">

	<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="">
<h3>Process Pay Details</h3>
</td>
	</tr>
		<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"><font size="">

	
<strong>Employee Number : </strong><?php echo $rowsv->employee_id; ?>

<strong>Employee Name : </strong><?php echo $rowsv->emp_firstname.' '.$rowsv->emp_father_name.' '.$rowsv->emp_lastname.' '.$rowsv->emp_fourth_name;?>

</td>
	</tr>

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
<strong>Select Month <input name="current_month" required id="current_month" class="date-picker" size="40" /></strong></td>
	
    </tr>
	
	
	

	
	
	</table>
	
	
	<table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5">Basic Details</td></tr>

	<tr>
 

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><strong>Basic Salary</strong></td>
 <td width="25%" align=""><input size="40" type="text" readonly value="<?php echo $basic_pay; ?>" name="basic_salary"></td>


 
 
 
 </tr>
 
  <tr  height="30" bgcolor="#ccc">
 <td ><strong></strong></td>
 <td ><strong>Days Absent</strong></td>
 <td  align=""><input size="40" type="number" name="days_absent"></td>


 
 
 
 </tr>
 
   <tr  height="30" bgcolor="#ccc">
 <td ><strong></strong></td>
 <td ><strong>Overtime (Hrs)</strong></td>
 <td  align="">Normal<input size="10" type="number" name="normal_ot">Holidays<input size="10" type="number" name="holiday_ot"></td>


 
 
 
 </tr>
 

 </table>
 
 
 <table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5">Allowances and Bonus</td></tr>

	<tr>
 
 
 <?php 

  
$sql="select * from benefit_logs order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><strong><?php echo $rows->benefit_log_name; ?></strong>
 <input type="hidden" value="<?php echo $rows->benefit_log_id;?>" name="benefit_log_id[<?php echo $rows->benefit_log_id ?>]">
 
 </td>
 <td width="25%" align=""><input size="40" type="text" name="allowance[<?php echo $rows->benefit_log_id; ?>]"></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 

 </table>


<table width="60%" border="0" align="center" bgcolor="#fff" class="display nowrap" style="border-radius:5px;" id="example">	
<tr><td colspan="5">Deductions</td></tr>



	
	<!-- <tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>N.H.I.F</strong></td>
 <td><input size="40" type="text" name="nhif_amount" value="<?php echo $nhif_amount; ?>"></td>
 
 </tr>-->
 
  <tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>N.S.S.F</strong></td>
 <td><input size="40" type="text" name="nssf_amount"></td>
 
 </tr>

 <?php
$sql="select * from deduction_logs order by sort_order";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  
							  while ($rows=mysql_fetch_object($results))
							  {
 
 
 
 ?>

 <tr  height="30" bgcolor="#ccc">
 <td width="10%"><strong></strong></td>
 <td width="10%"><strong><?php echo $rows->deduction_log_name; ?></strong>
 <input type="hidden" value="<?php echo $rows->deduction_log_id;?>" name="benefit_log_id[<?php echo $rows->deduction_log_id; ?>]">
 
 </td>
 <td width="25%" align=""><input size="40" type="text" value="<?php echo $rows->default_deduction_amount ?>" name="allowance[<?php echo $rows->benefit_log_id; ?>]"></td>
 </tr>
 <?php 
 
						  }
						  
						  }
 ?>
 
 <!--<tr bgcolor="#ccc" height="30">
 <td></td>
 <td><strong>P.A.Y.E</strong></td>
 <td></td>
 
 </tr>-->

 </table>
  




<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>


<?php 
//}

?>