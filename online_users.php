<?php 
include('Connections/fundmaster.php'); 
$loan_id=$_GET['loan_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brisk Diagnostics - Online Users <?php echo $slip_no; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
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
border:0px solid black;

}
</style>

<table width="100%" border="0" class="table1">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="6" height="30" align="center"> 
	<font size="+1" color="#ff0000"><strong>Users Currently Logged In...</strong></font>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>First Name</strong></td>
    <td align="center" width="100"><strong>Middle Name</strong></td>
    <td align="center" width="100"><strong>Last Name</strong></td>
	<td align="center" width="150"><strong>User Group</strong></td>
    <td align="center" width="150"><strong>When Loggein In</strong></td>

	


    </tr>
  
  <?php 
 
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,users.username,user_group.user_group_name from users,
user_group,employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id and users.islogged_in='1'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

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

    <td><?php echo $rows->emp_firstname;?></td>
    <td align="center"><?php echo $rows->emp_middle_name;?></td>
    <td align="center"><?php echo $rows->emp_lastname;?></td>
	<td align="left"><?php echo $rows->user_group_name;?></td>
	<td align="center">
	<?php 
	$user=$rows->user_id;
$sqllog="SELECT * FROM audit_trail where user_id='$user' AND action LIKE '%Logged into%' order by date_of_event desc limit 1";
$resultslog= mysql_query($sqllog) or die ("Error $sqllog.".mysql_error());
$rowslog=mysql_fetch_object($resultslog);
echo $rowslog->date_of_event;	
	?>
	
	
	</td>
	
	

    </tr>
<?php 
}
}
?>
</table>