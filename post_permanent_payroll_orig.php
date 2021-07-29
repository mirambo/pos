<?php 
 include ('top_grid_includes.php'); 
?>	
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#dcfac9';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
  
  $(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});


 
  </script>
		
	<table width="99%" border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px;" id="example">	

    <thead>


  <tr  style="background:url(images/description.gif);" height="30">
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
                  <th width="10%"><?php $english_text9="Employee No";

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
                  <th width="30%"><?php $english_text9="Employee Name";

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
                  <th width="5%"><?php $english_text9="Job Title";

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
				  <th width="15%"><?php $english_text9="Term Of Service";

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

<th width="15%">Actions</th>                
                  
				  
                </tr>
                </thead>
                <tbody>
				
	<?php 
  $sess_emp_id;
  
$user_group_id;
$sess_jobtitle_id;

  
	 
if (!isset($_POST['generate']))
	 
{

$queryop = "SELECT *,hs_hr_employee.employee_id as employee_number FROM 
hs_hr_employee,employee_job_details,job_terms WHERE employee_job_details.terms_of_service=job_terms.job_term_id and 
hs_hr_employee.emp_number=employee_job_details.employee_id and hs_hr_employee.employee_id!='' order by hs_hr_employee.emp_firstname asc";
$results= mysql_query($queryop) or die ("Error $queryop.".mysql_error());

} 

else
{

$directorate=$_POST['directorate'];
$department=$_POST['department'];
$section=$_POST['section'];
$branch=$_POST['branch'];
$search_emp_id=$_POST['employee'];
$phone=$_POST['phone'];


$queryop= "SELECT *,hs_hr_employee.employee_id as employee_number  FROM hs_hr_employee,employee_job_details";
    $conditions = array();

	
 if($directorate!='' ) 
 {
	
      $conditions[] = "employee_job_details.directorate_id='$directorate'";
} 

if($department!='') 
 {
	
      $conditions[] = "employee_job_details.department='$department'";
} 

if($section!='') 
 {
	
      $conditions[] = "employee_job_details.section='$section'";
}

if($branch!='') 
 {
	
      $conditions[] = "employee_job_details.branch_id='$branch'";
}


if($search_emp_id!='') 
 {
	
      $conditions[] = "hs_hr_employee.emp_number='$search_emp_id'";
}


 
	
if (count($conditions) > 0) 
	
    
 {


$queryop .= " WHERE " . implode(' AND ', $conditions)." AND hs_hr_employee.emp_number=employee_job_details.employee_id order by hs_hr_employee.emp_firstname asc";
//$queryop .= " order by task_name asc";
 
 
 }
 
 else
 {

$queryop = "SELECT * FROM hs_hr_employee order by emp_firstname asc";
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
 $id=$rows->emp_number;
 
 ?>
                  <td><?php echo $count=$count+1; ?></td>
				  <td ><?php echo $rows->employee_number; ?></td>
				  <td><?php echo $rows->emp_firstname.' '.$rows->emp_father_name.' '.$rows->emp_lastname.' '.$rows->emp_fourth_name;
	
	
	
	?></a></td>
				  <td><?php 
	
	$jobs="SELECT * FROM employee_job_details WHERE employee_id='$id'";
	$resj=mysql_query($jobs) or die(mysql_error());
	$rowjob=mysql_fetch_object($resj);
	$job_id=$rowjob->job_title;
	
	$jobtitle="SELECT * FROM hs_hr_job_title WHERE job_id='$job_id'";
	$rest=mysql_query($jobtitle) or die(mysql_error());
	$rowtitle=mysql_fetch_object($rest);
  
	echo $rowtitle->jobtit_name;
	?></td>
                 
                  <td><?php

	
$job_term_id=$rowjob->terms_of_service;
	
$query2j="SELECT * FROM job_terms WHERE job_term_id='$job_term_id'";
$query2resultsj=mysql_query($query2j) or die(mysql_error());
$query2rowsj=mysql_fetch_array($query2resultsj);
echo $job_term_name= $query2rowsj['job_term_name'];
	
	
	
	
	 ?></td>
	 
	 <td><a class="link_button" href="home.php?post_permanent_payroll2&sub_module_id=<?php echo $sub_module_id ?>&employee_id=<?php echo $rows->emp_number; ?>">Process Payroll>></a></td>
				  
                  
                  
                </tr>
				
  <?php 
							  }
						  }
  
?>             
</tbody> 
                </tfoot>
              </table>			

			
			

</html>