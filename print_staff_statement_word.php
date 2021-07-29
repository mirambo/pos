<?php 
include('includes/session.php');
include('Connections/fundmaster.php');
$id=$_GET['emp_id'];
$date_from=$_GET['date_from'];
$date_to=$_GET['date_to'];

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Staff_Statement.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Statement Of Account</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css"/>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
</style>

<!-- Table goes in the document BODY -->


</head>

<body onload="window.print();">
<table width="700" border="0" align="center" style="margin:auto;">
   
	
	 <?php 
  
$querysup="select * from employees where emp_id ='$id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);


$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
     <td  align="right" colspan="4" rowspan="6" valign="top">
	<table width="100%" border="0">
	<tr><td colspan="2"><font size="+1"><strong>To:</strong></font></td></tr>
	<tr><td><strong>Staff Name</strong></td><td><?php echo $rowssupp->emp_firstname.' '.$rowssupp->emp_middle_name.' '.$rowssupp->emp_lastname; ?></td></tr>
	<tr><td><strong>Town</strong></td><td><?php echo $rowssupp->c_town; ?></td></tr>
	<tr><td><strong>Mobile Phone</strong></td><td><?php echo $rowssupp->emp_phone; ?></td></tr>
	<tr><td><strong>Email Address</strong></td><td><?php echo $rowssupp->emp_email; ?></td></tr>
	
	
	</table>
	
	
	</td>
 
    <td colspan="3" align="right" valign="top"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
   <tr>
    <td colspan="6"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  <tr>
    <td colspan="6"><div align="right">Website : www.briskdiagnostics.com</div></td>
  </tr>
  <tr height="30">
    <td colspan="10" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">STATEMENT OF ACCOUNT</span>
	
	</td>
  </tr>
  
  
   <tr height="30">
    <td colspan="7"  align="right" >Date Printed : <?php echo (Date("l F d, Y")); 
	
	$date_generated=date('Y-m-d')?>
	<hr/>
	
	</td>
  </tr>
  
 
  
</table>



<?php 
if ($date_from=='' && $date_to=='')

{
?>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>

	
<?php 
 $bal==0; 
$sql="select * from staff_transactions where emp_id='$id' and amount!='0' and amount!='-0' and amount!='-' order by date_recorded asc";
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
     <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php echo number_format($rows->amount,2);?></td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

	?>
	
	</td>
    </tr>
  <?php 
  
  }
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
<?php
}
else
{

?>

<table width="700" border="0" align="center" class="table" style="margin:auto;">
<tr bgcolor="#FFFFCC" height="30">
    <td width="5%" colspan="6"><div align="center"><strong>Period From : <font color="#ff0000"><?php echo $date_from; ?></font> To :  <font color="#ff0000"><?php echo $date_to; ?></font> </strong></div></td>
</tr>

  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="200"><div align="center"><strong>Transaction Date</strong></td>
    <td width="500"><div align="center"><strong>Transaction Details</strong></td>
    <td width="200" ><div align="center"><strong>Amount (Kshs)</strong></td>
    <td width="200"><div align="center"><strong>Balance (Kshs)</strong></td>
    </tr>
	<tr bgcolor="#C0D7E5" height="25">
	<td><?php echo $date_from; ?></td>
	<td><strong>Balance Brought forward (Bal b/f)</strong></td>
	<td></td>
	<td align="right"><strong>
	<?php 
  
$sqlbd="select * from client_transactions where client_id='$id' AND date_recorded <'$date_from' and amount!='0'and amount!='-0'";
$resultsbd= mysql_query($sqlbd) or die ("Error $sqlbd.".mysql_error());




?>

<?php 

if (mysql_num_rows($resultsbd) > 0)
						  {
							  $RowCounter=0;
							  while ($rowsbd=mysql_fetch_object($resultsbd))
							  { 
							  
					

 
 
 ?>
 
  


	
	<?php number_format($amount=$rowsbd->amount,2);
	
	if ($amount>0)
	{
		number_format($amount=$rowsbd->amount,2);
	//echo "bigger";
	}
	else
	{
//echo "smaller";
	number_format($str2=substr($amount,1),2);
	}
	$bal=$bal+$rowsbd->amount;
	}
	
	
	?>
	
	
<?php
echo number_format($bal,2);
}
	?>
	
	</strong></td>

	</tr>	
<?php 
 $bal==0; 
$sql="select * from client_transactions where client_id='$id' AND date_recorded BETWEEN '$date_from' AND '$date_to' and amount!='0'and amount!='-0'";
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
     <td><?php echo $rows->date_recorded;?></td>
    <td><?php echo $rows->transaction;?></td>
    <td align="right"><?php echo number_format($rows->amount,2);?></td>
    <td align="right"><?php
echo number_format($bal=$bal+$rows->amount,2);

	?>
	
	</td>
    </tr>
  <?php 
  
  }
  
  
  }
  
  else
  {
  
  ?>
  
  
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<font color="#ff0000">No Results found!!</font>
	
	</td>
	
    </tr>
	
	<?
  
  }
  ?>
</table>
<?php





}




 ?>
 
 
  <br/>  <br/>


<table width="700" border="0" align="center" style="margin:auto;"> 
  <tr align="center" height="20">
   <td colspan="4" ><strong><em>Printed by :
         <?php 
$sqluser="select employees.emp_firstname,employees.emp_middle_name,employees.emp_lastname from employees,users where 
employees.emp_id=users.emp_id and users.user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->emp_firstname.' '.$rowsuser->emp_middle_name.' '.$rowsuser->emp_lastname;
	
	
	
	?>
    </em></strong></td>
  </tr>  
  
  
  </table>





</body>
</html>
