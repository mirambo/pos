<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript" src="suggestStaff.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to terminate staff?");
}

</script>
 <form  method="post" action="" id="suggestSearch"> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC" > 
  <td colspan="11" align="center" height="30"><font size="+1" color="#000000">
  <?php 
 $sqlttl="select * from employees";
$resultsttl= mysql_query($sqlttl) or die ("Error $sqlttl.".mysql_error());
$rowsttl=mysql_fetch_object($resultsttl);
$numrowsttl=mysql_num_rows($resultsttl);

echo "Total Of </font><font size='+1' color='#ff0000'>".$numrowsttl." Staff,";

$sqlttlnat="select * from employees where staff_type='1'";
$resultsttlnat= mysql_query($sqlttlnat) or die ("Error $sqlttlnat.".mysql_error());
$rowsttlnat=mysql_fetch_object($resultsttlnat);
$numrowsttlnat=mysql_num_rows($resultsttlnat);

echo $numrowsttlnat." National Staff <font size='+1' color='#000000'>and </font>";


$sqlttlexp="select * from employees where staff_type='2'";
$resultsttlexp= mysql_query($sqlttlexp) or die ("Error $sqlttlexp.".mysql_error());
$rowsttlexp=mysql_fetch_object($resultsttlexp);
$numrowsttlexp=mysql_num_rows($resultsttlexp);

echo $numrowsttlexp." Expertriate Staff";

?></td>
  </tr>
   
     <!--<tr bgcolor="#FFFFCC"><td colspan="11" align="right"><a href="printpostgraduate.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printpostgraduatecsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printpostgraduateword.php"><img src="images/word.png" title="Export to Word"></a></td></tr>-->

<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10"><div style="margin-left:400px;">
	<strong>Search Client - Enter Name: 
    </strong>
    
    
    <input type="text" name="PoNumber" size="40" id="PoNumber" onkeyup="searchSuggest();" autocomplete="off" />
	<div id="layer1" style="float:left;"></div>
	<input type="submit" name="generate" value="Search"></div></td>
	
    </tr>
	
    </tr>	 
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="70" align="center"><strong>Emp. No</strong></td>
    <td align="center" width="150"><strong>Employee First Name</strong></td>
    <td align="center" width="150"><strong>Employee Middle Name</strong></td>
    <td align="center" width="150"><strong>Employee Last Name</strong></td>
	<td width="120" align="center"><strong>Staff Type</strong></td>
	<td width="50" align="center"><strong>Terminate</strong></td>
    
    </tr>
  
  <?php 
$user_id;

if (!isset($_POST['generate']))
{ 
 
$sqlx="select employees.emp_id FROM users,employees WHERE users.emp_id=employees.emp_id AND users.user_id='$user_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

$emp_id=$rowsx->emp_id;
  
  if ($user_group_id==2)
 {
 $sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type and employees.emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 }
 else
 {
$sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type  order by emp_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

}
else
{
$f_name=$_POST['PoNumber'];


if ($f_name!='')
{
$sqlx="select employees.emp_id FROM users,employees WHERE users.emp_id=employees.emp_id AND users.user_id='$user_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

$emp_id=$rowsx->emp_id;
  
  if ($user_group_id==2)
 {
 $sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type and employees.emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 }
else
 {
$sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type AND employees.emp_fname LIKE '%$f_name%' order by emp_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


}
}
else
{

$sqlx="select employees.emp_id FROM users,employees WHERE users.emp_id=employees.emp_id AND users.user_id='$user_id'";
$resultsx= mysql_query($sqlx) or die ("Error $sqlx.".mysql_error());
$rowsx=mysql_fetch_object($resultsx);

$emp_id=$rowsx->emp_id;
  
  if ($user_group_id==2)
 {
 $sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type and employees.emp_id='$emp_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
 }
 else
 {
$sql="select employees.emp_id,employees.employee_no,employees.employee_no,employees.emp_fname,employees.emp_mname,
employees.emp_lname,employees.terminate,job_category.job_cat_name from employees,job_category WHERE job_category.job_cat_id=employees.staff_type order by emp_id asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}


}



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
 
 
 ?>
  
    <td><?php echo $rows->employee_no;?></td>
    <td ><a href="home.php?staffdet=staffdet&emp_id=<?php echo $rows->emp_id;?>" style="font-size:12px;"><?php echo $rows->emp_fname;?></a></td>
    <td ><a href="home.php?staffdet=staffdet&emp_id=<?php echo $rows->emp_id;?>" style="font-size:12px;"><?php echo $rows->emp_mname;?></a></td>
    <td ><a href="home.php?staffdet=staffdet&emp_id=<?php echo $rows->emp_id;?>" style="font-size:12px;"><?php echo $rows->emp_lname;?></a></td>
   
	

	
	
	
	
	<td ><?php 
	echo $rows->job_cat_name;
	
	?></td>

	<td align="center">
	
	<!--<a href="home.php?terminatestaff=terminatestaff&emp_id=<?php echo $rows->emp_id;?>" onClick="return confirmDelete();">Terminate</a>-->
	
	<?php 
$suspend=$rows->terminate;
 
 if ($suspend==0)
 {
?>
<a href="home.php?terminatestaff=terminatestaff&emp_id=<?php echo $rows->emp_id;?>"  onClick="return confirmDelete();" style="color:#ff0000; font-weight:bold;">Terminate</a>
<?php 
}
elseif ($suspend==1)
{
?>
<a href="reinstate.php?&emp_id=<?php echo $rows->emp_id;?>"  onClick="confirmReactivate();" style="color:#00CC33; font-weight:bold;">Reinstate</a>
<?php


}

?>	
	
	</td>

   
    </tr>
  <?php 
  
  }
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="8" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
</table>


