<?php 

include('Connections/fundmaster.php'); 
$loan_id=$_GET['loan_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brisk Diagnostics - Loan Received Details <?php echo $slip_no; ?></title>
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
	<?php

if ($_GET['addconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Loan Repaid Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesupconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="200"><strong>Lender's Name</strong></td>
    <td align="center" width="100"><strong>Lender's Postal Address</strong></td>
    <td align="center" width="160"><strong>Phone Number</strong></td>
    <td align="center" width="150"><strong>Email Address</strong></td>
	<td align="center" width="150"><strong>Lender's Town</strong></td>
	<td align="center" width="150"><strong>Repayment Period</strong></td>


    </tr>
  
  <?php 
 
$sql="SELECT * FROM loan_received where loan_received_id='$loan_id'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
$rows=mysql_fetch_object($results);
 ?>
    <td><?php echo $rows->lenders_name;?></td>
    <td align="center"><?php echo $rows->lenders_address;?></td>
    <td align="center"><?php echo $rows->lenders_phone;?></td>
	<td align="left"><?php echo $rows->lenders_email;?></td>
	<td align="left"><?php echo $rows->lenders_town;?></td>
	
	<td align="center">
	<strong><?php echo $rows->period_years;?></strong> Years  And <strong><?php echo $rows->period_months;?></strong> Months
	
	
	</td>

    </tr>

</table>