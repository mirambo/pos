<?php
$booking_id=$_GET['booking_id'];
$job_card_id=$_GET['job_card_id'];
 
if (isset($_POST['assign_job_card']))
{

assign_sub_project_area($job_card_id,$booking_id,$job_card_task_id,$technician,$date_from,$date_to,$time_from,$time_to,$user_id);


}



 ?><?php //echo $sub_project_id=$_GET['sub_project_id'];?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
 <meta name="description" content="A javascript plugin for intelligently selecting date and time ranges inspired by Google Calendar." />
    <script src="jquery.min.js"></script>

    <script src="jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery.timepicker.css" />

    <script src="lib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css" />
    <script src="lib/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/pikaday.css" />
    <script src="lib/jquery.ptTimeSelect.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/jquery.ptTimeSelect.css" />
    <link rel="stylesheet" href="jquery-ui.css" type="text/css" media="all" />
    <script src="dist/datepair.js"></script>
    <script src="dist/jquery.datepair.js"></script>
<script>
    // initialize input widgets first
    $('#basicExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'g:ia'
    });

    $('#basicExample .date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });

    // initialize datepair
    var basicExampleEl = document.getElementById('basicExample');
    var datepair = new Datepair(basicExampleEl);
</script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
table1
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
</Style>


<form name="emp" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

<?php 



?>		

<table align="center" width="90%" border="0" class="table1" >
<tr bgcolor="#FFFFCC">

	<td colspan="3" height="30" align="center"><?php

if ($_GET['add_success']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:400px; border:#ff0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#ff0000" >Record Added Successfully!!</font></strong></p></div>';
?>

<?php

if ($_GET['passwordmissmatchconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry Password do not match!!</font></strong></p></div>';
?>

<?php

if ($_GET['recordexist']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:600px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Some Areas have been allocated to this projects</font></strong></p></div>';
?></td>
    </tr>

<tr  align="center" bgcolor="#fff">	

<td colspan="3"><!--<img src="images/step2.png" height="25">-->
<?php 

$estimates_id=$_GET['estimates_id'];
$sqlrec="SELECT * FROM bookings,customer WHERE bookings.customer_id=customer.customer_id AND booking_id='$booking_id'";
$resultsrec= mysql_query($sqlrec) or die ("Error $sqlrec.".mysql_error());	
$rowsrec=mysql_fetch_object($resultsrec);


?>
<p><strong>Job Card No : <i><font color="#ff0000"><?php echo $job_card_id;  ?></font></i></strong></p>
<strong>Customer Name : <i><font color="#ff0000"><?php echo ' - '.$supplier_name=$rowsrec->customer_name.' ';  ?></font></i>
	
	Contact Person: <i><font color="#ff0000"><?php echo $rowsrec->contact_person;  ?></i></font>
	
	Email Address: <font color="#ff0000"><i><?php echo $curr_name=$rowsrec->email;  ?></i></font>
	
Phone Number :<font color="#ff0000"><i><?php echo $terms=$rowsrec->phone;  ?></i></font></strong>
	<!--<strong>Term Of Payments :<i><?php echo $mop_name=$rowsrec->mop_name;  ?></i>
	
	
	<br/>
	<br/>
	<strong>Freight Charges : </strong><i><?php echo $freight_charge=$rowsrec->freight_charge;  ?></i>
	
	<strong>Comments : </strong><i><?php echo $rowsrec->comments;  ?></i> 
	<a rel="facebox" href="edit_sales_code.php?sales_code_id=<?php echo $rowsrec->sales_code_id;?>&sales_type=<?php echo $sales_type; ?>"><img src="images/edit.png"> </a>-->
		<br/>
	<br/>
	
	<strong>Vehicle Registration No :   <i><font color="#ff0000"><?php echo $reg_no=$rowsrec->reg_no.' ';  ?></i></font>
	
	Vehicle Make And Model: <i><font color="#ff0000"><?php echo $rowsrec->vehicle_make.' - '.$rowsrec->vehicle_model;  ?></i></font>
	
Engine: <i><font color="#ff0000"><?php echo $curr_name=$rowsrec->engine;  ?></i></font>
	
Chasis No :<i><font color="#ff0000"><?php echo $terms=$rowsrec->chasis_no;  ?></i></font></strong>
</td>  
  </tr>
  
  <tr><td align="center"><table>
  
  <tr align="center"><td ><strong>Task</strong></td><td><strong>Technician</strong></td><td><strong>Period</strong></td></tr>
  
  <?php 
$sqltask="SELECT * FROM job_card_task where job_card_id='$job_card_id'";
$resultstask= mysql_query($sqltask) or die ("Error $sqltask.".mysql_error());	
//$rowstask=mysql_fetch_object($resultstask);
 
if (mysql_num_rows($resultstask) > 0)
						  {
							  
							  while ($rowslpdet=mysql_fetch_object($resultstask))
							  { 
  
  ?>
  
  
  <tr><td width="5%"><strong></strong>
  <input readonly=readonly type="text"  size="30" value="<?php echo $rowslpdet->task_name;?>">
  <input  type="hidden" name="job_card_task_id[]" size="30" value="<?php echo $rowslpdet->job_card_task_id;?>">
  </td>
  <td width="5%">
  <select name="technician[]"><option>-------------------Select-----------------</option>
								  <?php
								  
								  $query1="select * from users where user_group_id='30' order by f_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->user_id; ?>"><?php echo $rows1->f_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  }
								  
								  
								  
								  
								  
								  ?>
								  
								  </select>
  
  
  </td>
  
  <td width="30%">
   <p id="jqueryExample"> <strong>Start Date :</strong>
                    <input type="text" class="date start" size="10" name="date_from[]"/> <strong> Start Time:</strong>
                 
                    <input type="text" class="time end" size="10" name="time_to[]"/>
                   <strong>End Date</strong> <input type="text" class="date end" size="10" name="date_to[]"/><strong>End Time : </strong>
				      <input type="text" class="time start" size="10" name="time_from[]"/>
                </p>
  
  
  </td></tr>
  
  
  
  <?php 
  }
  
  }
  
  
  
  
  ?>
  
  </table></td></tr>


	
	<tr height="30" bgcolor="#FFFFCC"><td colspan="10" align="center"><input type="submit" name="submit" value="Assign Job Card" style="background:#2E3192; font-size:14px; color:#ffffff; font-weight:bold; width:300px; height:30px; border-radius:5px;">
	<input type="hidden" name="assign_job_card" id="assign_job_card" value="1">&nbsp;&nbsp;</td></tr>
	</table>
	

</form>

  
  
  
  </script>
  
  <script>
                $('#jqueryExample .time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'g:ia'
                });

                $('#jqueryExample .date').datepicker({
                    'format': 'yyyy/m/d',
                    'autoclose': true
                });

                $('#jqueryExample').datepair();
            </script>

<!--<SCRIPT language="JavaScript">
 var frmvalidator  = new Validator("emp");
 frmvalidator.EnableOnPageErrorDisplaySingleBox();
 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("sub_project_id","dontselect=0",">>Please select project");
 //frmvalidator.addValidation("project_name","req",">>Please enter sponsor name");
 
 
 
 
  </SCRIPT>-->
  
