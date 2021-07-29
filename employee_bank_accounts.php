<?php
include('Connections/fundmaster.php');
$qr_confirm23v="SELECT * from user_group_submodule WHERE sub_module_id='$sub_module_id' and `view`='V' and user_group_id='$user_group_id'";
$qr_res23v=mysql_query($qr_confirm23v) or die ('Error : $qr_confirm23v.' .mysql_error());
$num_rows23v=mysql_num_rows($qr_res23v); 
if ($num_rows23v==6660) 
{ 
?>
<script type="text/javascript">
alert('Sorry!!! You have limited access to this area ');
window.location = "<?php echo $_SERVER['HTTP_REFERER']; ?>";
//window.location = "home.php?user_roles&user_group_id&user_group_id=<?php echo $ugp; ?>&sub_module_id=<?php echo $sub_module_id; ?>&addconfirm=1";
</script>

<?php
 }
else
{
	
$sql2="INSERT INTO audit_trails SET 
user_id='$user_id',
operating_system='$op_os',
browser='$browser',
mac_address='$mac',
date_of_event='$to',
action='Viewed list of employee bank accounts',
sub_module_id='$sub_module_id'";
$results2= mysql_query($sql2) or die ("Error $sql2.".mysql_error());


 ?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

function confirmReactivate()
{
    return confirm("Are you sure you want to reactivate this user?");
}



</script>




<style>
table { border-collapse: collapse; empty-cells: show; }

td { position: relative; }

tr.strikeout td:before {
  content: " ";
  position: absolute;
  top: 50%;
  left: 0;
  border-bottom: 1px solid #111;
  width: 100%;
  background:#ff0000;
}

tr.strikeout td:after {
  content: "\00B7";
  font-size: 1px;
}

/* Extra styling */
td { width: 100px; }
th { text-align: left; }
</style>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="jquery-ui.css">
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm',
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


<?php include ('top_grid_includes.php');?>
<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title"><?php $english_text9="Employee Bank Account";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                            


					   </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
			
<!--<form name="emp" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post">		
	

<table align="center"  border="0" width="100%">	
<tr >
	<td style="width:10%" align="right"><strong>Directorate: </strong></td>
	<td colspan="" style="width:15%">
	
	
	<select name="directorate" id="directorate" class="form-control"  style="width:100%;">
	<?php 
	$queryst = mysql_query("SELECT * FROM directorate order by directorate_name asc");
	?>
<option value="">Select Directorate</option>
<?php
    while($row = mysql_fetch_array($queryst)) {
	
    echo "<option value='$row[directorate_id]'>$row[directorate_name] </option>";
    } 
	?>
	</select>
</td>
	
	<td style="width:10%" align="right"> 
<strong>Department:</strong>
</td>
<td style="width:15%">
	<select name="department" id="department" class="form-control"  style="width:100%;">
	<option selected="true" disabled="disabled" >Select Department</option>
	
	
	</select>
	</td>
	
	<td style="width:10%" align="right"><strong>Section</strong></td>
	<td style="width:15%" align="right"><select id="section" name="section" class="form-control"  style="width:100%;">
	<option selected="true" disabled="disabled" >Select Section</option>
	
	
	</select></td>
	
	<td style="width:10%" align="right"><strong>Branch</strong></td>
	<td style="width:15%" align="right"><select id="branch" name="branch" class="form-control"  style="width:100%;">
	<option selected="true" disabled="disabled" >Select Branch</option>
	
	
	</select></td>

	
	</tr>
	
<tr id="period" height="50">
<td  align="right">

<strong>Employee: </strong></td>

<td><select name="employee" id="combobox" class="form-control"  style="width:100%;">
	<?php 
	$queryst = mysql_query("SELECT * FROM hs_hr_employee order by emp_number");
	?>
<option value="">Select Employee</option>
<?php
    while($row = mysql_fetch_array($queryst)) {
	
    echo "<option value='$row[emp_number]'>$row[emp_firstname] $row[emp_father_name] $row[emp_lastname] $row[emp_forth_name] </option>";
	
	
    } 
	?>
	</select></td>
	<td align="right"><strong>Phone Number:</strong></td><td><input type="text"	placeholder="Phone Number" name="phone" class="form-control"  style="width:100%;" value=""></td>

	</td>
	</tr>
	<tr height="10">
	<td colspan="10" align="center">
<button type="submit" name="generate" style="width:50%" class="btn btn-primary">
			<?php $english_text9="Search";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?>	
				</button>
	</td>
	
	
	</tr>
	
	
	</table>
</form>	-->		
			
			
<form name="emp" action="" enctype="multipart/form-data" method="post">	

<?php  
			  if (isset($_GET['success']))
				  
			  
              echo '<div class="alert alert-success alert-dismissible" style="width:100%; margin:auto;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <p align="center"><i class="icon fa fa-check"></i> 
                Record Saved Successfully
              </div></p>';

			  ?>	
	<table border="0" width="70%" align="center">
<!--<tr  bgcolor="" height="50">
<td><strong>Month: </strong>
<select name="payroll_month" class="form-control select" style="width:90%; padding:5px;">
<option value="">Select Month------------</option>
<?php for ($m=1; $m<=12; $m++) 
   {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
 ?>
 <option value="<?php echo $month ?>"><?php echo $month; ?></option>
 <?php
     } ?>
	 
</select>	 
	 </td>
<td><strong>Year: </strong> <select name="payroll_year" class="form-control select" style="width:90%; padding:5px;">
<option value="">Select Year-------------</option>
<?php 
   for($i =2017; date('Y') >= $i; $i++)
   {
      ?>

<option value="<?php echo $i;?>"><?php echo $i; ?></option>
	  
	  <?php
   }
?>

</select></td>


</tr>

<tr height="50">
	<td colspan="4" align="center">
<button type="submit" name="generate" style="width:50%" class="btn btn-primary">
			<?php $english_text9="Generate";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?>	
				</button>
	</td>
	
	
	</tr>-->

</table>

<div style="height:2800px; width:100%; overflow-y:scroll;">			

     <table width="100%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	
                <thead>
                <tr bgcolor="#1F8EE7">
                  <th width="1%"><?php $english_text9="No";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>   



<th width="1%"><?php $english_text9="Employee ID";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>               
                                    
                  <th width="20%"><?php $english_text9="Employee";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th> 

<th width="20%"><?php $english_text9="Department";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>      

<th width="20%"><?php $english_text9="Bank";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>


<th width="20%"><?php $english_text9="Account No";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>









<th width="30%"><?php $english_text9="Action";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></th>   

           
                  
				  
                </tr>
                </thead>
                <tbody>
				
	<?php 
 	$count=0; 
if (!isset($_POST['generate']))
	 
{

$queryop = "select *,hs_hr_employee.employee_id as emp_ref from hs_hr_employee LEFT JOIN 
employee_job_details ON employee_job_details.employee_id=hs_hr_employee.emp_number LEFT JOIN employee_bank_details 
ON employee_bank_details.employee_id=hs_hr_employee.emp_number  LEFT JOIN banks ON banks.bank_id=employee_bank_details.bank_id LEFT JOIN departments ON departments.DId=employee_job_details.department AND hs_hr_employee.exit_status='0' order by hs_hr_employee.emp_firstname asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());

} 

else
{

$payroll_month=$_POST['payroll_month'];
$payroll_year=$_POST['payroll_year'];
$search_emp_id=$_POST['employee'];



$queryop= "SELECT *,hs_hr_employee.employee_id as emp_ref  FROM payroll_code,payroll,hs_hr_employee,employee_job_details";
    $conditions = array();

	
 if($payroll_month!='' ) 
 {
	
      $conditions[] = "payroll_code.payroll_month='$payroll_month'";
} 

if($payroll_year!='') 
 {
	
       $conditions[] = "payroll_code.payroll_year='$payroll_year'";
} 

if($search_emp_id!='') 
 {
	
      $conditions[] = "payroll.employee_id='$search_emp_id'";
}


	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND employee_job_details.employee_id=hs_hr_employee.emp_number 
AND hs_hr_employee.emp_number=payroll.employee_id AND payroll_code.payroll_code_id=payroll.payroll_code_id 
order by payroll.payroll_id desc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop = "select *,hs_hr_employee.employee_id as emp_ref from hs_hr_employee LEFT JOIN 
employee_job_details ON employee_job_details.employee_id=hs_hr_employee.emp_number LEFT JOIN departments ON departments.DId=employee_job_details.department AND hs_hr_employee.exit_status='0' order by hs_hr_employee.emp_firstname asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());
 
 }
	
	

    $results = mysql_query($queryop) or die ("Error $queryop.".mysql_error());

}
 
if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" >';
}
 $payroll_id=$rows->payroll_id;
 
 ?>
                  <td><?php echo $count=$count+1; ?></td>
				   
                  <td><?php echo $rows->emp_ref; ?></td>
				  
				  <td >
	
<?php echo $rows->emp_firstname.' '.$rows->emp_father_name.' '.$rows->emp_lastname.' '.$rows->emp_fourth_name;
	
	
	
	?>
				  
				  </td>
				  
				  <td>
				  
				  <?php
	

	
	echo $rows->Department;
	
	?>
				  
				  
				  
				  
				  </td>
				  
				  				  <td>
				  
				  <?php
	

	
	echo $bank_name=$rows->Bank_Name;
	
	?>
				  
				  
				  
				  
				  </td>
	  
	<td><?php
	

    
	
	
	
	
	
	
	
	
	echo $account_no=$rows->account_no;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 ?></td>

	 
	  
		  
				  
				  
				  
				  
				  
				  
				  
				  
				  
	 
	                   <td >
					   
	<?php if ($bank_name=='' || $account_no=='')

	{


		?>				   
					   
					   
					   
					   
					   
					   
					   
					   
					   
					   <a class="btn btn-success"  href="home.php?add_employee&sub_module_id=216&qt=10&employee_id=<?php echo $rows->emp_number; ?>"><i class='fa fa-edit'></i><?php $english_text9="Edit";

if ($lang=='en' || $lang=='')
{
echo $english_text9;
}
else
{

$sqltr="SELECT somali_text FROM php_translate where english_text='$english_text9'";
$resultstr= mysql_query($sqltr) or die ("Error $sqltr.".mysql_error());
$rowstr=mysql_fetch_object($resultstr);
$num_rowstr=mysql_num_rows($resultstr);	
if ($num_rowstr>0)
{
echo $rowstr->somali_text;	
}
else
{
	
echo $english_text9;
}
}
?></a>



<?php 
	}



?>







</td>
	 
	 
			
                  		
                  
                  
                </tr>
				
  <?php 
							  }
						  }
  
?>      









       
</tbody> 
                </tfoot>
              </table>
			  
	</br>		  
	</br>		  
			  
	</form>		  
			  
			  
			  
			  
			  
            </div>
            <!-- /.box-body -->
          </div>
            </div>
        </div>
    </div>
	   
<?php 

}
?>


</body>
</html>
