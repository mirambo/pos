<?php


error_reporting(E_ALL ^ E_NOTICE);
$con=mysql_connect("localhost","root","");
$table=mysql_select_db("nrc") or die (mysql_error());
if(isset($_POST['submit']))
{
$count2 = $_POST["hidden"];

 for($i=1;$i<=$count2;$i++)
 {
 $save = mysql_query("INSERT into indicators (sub_project_id, core_competency, sub_description, indicator,trans_date,target) VALUES ('".$_POST["name$i"]."', '".$_POST["core_competency$i"]."', '".$_POST["sub_description$i"]."', '".$_POST["indicator$i"]."','".$_POST["trans_date$i"]."','".$_POST["target$i"]."')");
 }
if($save)
{
echo '<script type="text/javascript">alert("Record Saved Successfully !");</script>';
}
else
{
echo '<script type="text/javascript">alert("Failed");</script>';
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Autofine Payoll</title>
</head>

<body bgcolor="#C0D7E5">
<center>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="get"> <!-- Form for generate no of times -->
<table align="center">
<tr>
	<th colspan="3" align="center">Enter Number of Indicators for this Sub Project</th>
</tr>
<tr>
	<td width="1">&nbsp;</td>
	<td width="161"><input type="text" name="no" /><input type="hidden" name="emp" value="<?php echo $_GET['sub_project_id']; ?>" /></td>
	<td width="204"><input type="submit" name="order" value="Generate" /></td>
</tr>
</table>
</form><!-- End generate Form -->


<?php //create multiple form?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<table align="center" bgcolor="#FFA500" class="br-5">
<tr>
	<th colspan="3" align="left">Casual Staff Biweekly Job Details:<?php 
	$employee= $_GET['sub_project_id'];
	$s=@mysql_query("Select * from hs_hr_employee_casual where emp_number='$employee'");
while($r=mysql_fetch_array($s))
{
 $pNo=($r['sub_project_id']);
 $emp_lastname=($r['emp_lastname']);
 $emp_middle_name=($r['emp_middle_name']);
 $emp_firstname=($r['emp_firstname']);
 $emp_nick_name=($r['emp_nick_name']);
 $emp_other_id=($r['emp_other_id']);
 echo $emp_firstname; echo "&nbsp;"; echo $emp_middle_name; echo "&nbsp;"; echo $emp_lastname;} ?><?php 
	$employee= $_GET['emp'];
	$s=@mysql_query("Select * from hs_hr_employee_casual where emp_number='$employee'");
while($r=mysql_fetch_array($s))
{
 $pNo=($r['sub_project_id']);
 $emp_lastname=($r['emp_lastname']);
 $emp_middle_name=($r['emp_middle_name']);
 $emp_firstname=($r['emp_firstname']);
 $emp_nick_name=($r['emp_nick_name']);
 $emp_other_id=($r['emp_other_id']);
 echo $emp_firstname; echo "&nbsp;"; echo $emp_middle_name; echo "&nbsp;"; echo $emp_lastname; } ?></th>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Core Competency</td>
	<td>Sub Description</td>
	<td>Indicator</td>
    <td>Target</td>
    <td>&nbsp;</td>
</tr>
<?php
if(isset($_GET['order']))
{
	$sub_project_id=$_GET['sub_project_id'];
$count = $_GET['no']-1; //get the num of times as numeric
while($i <= $count)// loop by using while(),NOTE the looping dynamic textbox must be under the for loop othet must be outside 																																																																 																													of while()
{
$i++;
?>
<tr>
	<td><input type="hidden" name="name<?php echo $i; ?>"  value="<?php echo $_GET['emp']; ?>"/> </td>
	<td><input type="text" name="core_competency<?php echo $i; ?>" /></td>
	<td><input type="text" name="sub_description<?php echo $i; ?>" /></td>
	<td><input type="text" name="indicator<?php echo $i; ?>" /></td>
    <td><input type="text" name="target<?php echo $i; ?>"  value=""/></td>
    <td>&nbsp;</td>
    <td><input type="hidden" name="trans_date<?php echo $i; ?>"  value="<?php print date('Y-m-d');?>"/></td>
</tr>
<?php
}}
?>
<tr>
	<td colspan="3" align="center">
	<input type="hidden" name="hidden" value="<?php echo $i; ?>" />
    
    <!-- Get max count of loop -->
	<input type="submit" name="submit" value="Save Indicators" /></td>
</tr>
</table>
</form>
</center>
</body>
</html>
