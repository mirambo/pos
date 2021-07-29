<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

header("Content-Type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Clients_List.doc");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$cat_id=$_GET['cat_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>style.css" />

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

<body>
<table width="100%" border="0" align="center" >
  
	
	 <?php 
  
$querysup="select * from clients where client_id ='$sess_client_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_fetch_object($resultssup);

$querycont="select * from company_contacts order by contacts_id desc limit 1";
$resultscont=mysql_query($querycont) or die ("Error: $querycont.".mysql_error());
$rowscont=mysql_fetch_object($resultscont);
  
  
  ?>
  <tr>
    <td colspan="7" align="right"><img src="<?php echo $base_url;?>images/logolpo.png" /></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right"><?php echo $rowscont->building.' '.$rowscont->street; ?><!--Kigali Road, Jamia Plaza, 2nd Floor --></div></td>
  </tr>
    <tr>
    <td colspan="7"><div align="right">
    Mobile: <?php echo $rowscont->phone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">
    Telephone: <?php echo $rowscont->telephone; ?></div></td>
  </tr>
  <tr>
    <td colspan="7"><div align="right">Email : <?php echo $rowscont->email; ?></div></td>
  </tr>
  
  
  <tr height="30" >
    <td colspan="7" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">CLIENTS LIST <?php echo date('Y')?></span></td>
  </tr>
  
  
 <!-- <tr height="20">
    <td colspan="6"  align="right">DATE : <?php //echo (Date("l F d, Y")); ?></td>
  </tr>
  
   <tr height="20">
    <td colspan="6"  align="right"><strong>INVOICE NO :  <?php 
	//echo $get_invoice_no;
	
	?>
	
	</strong></td>
  </tr>-->
 
  
  
</table>

<?php 
if ($cat_id=='')
{
?>
<table width="100%" border="0" align="center">
  
  
<tr  style="background:url(images/description.gif);" height="30" >
  <td align="center" width="100"><strong>Customer No.</strong></td>
    <td align="center" width="200"><strong>Customer Name</strong></td>
    <td align="center" width="160"><strong>Postal Address</strong></td>
    <td align="center" width="150"><strong>Physical Address</strong></td>
	<td align="center" width="100"><strong>Town</strong></td>
	<td align="center" width="150"><strong>Phone Number</strong></td>
    <td width="180" align="center"><strong>Email Address</strong></td>
    </tr>
  
   <?php 
 
$sql="SELECT * FROM clients order by client_id asc";
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
    <td><?php echo $rows->client_id;?></td>
    <td><a href="client_statement.php?client_id=<?php echo $rows->client_id; ?>"><?php echo $rows->c_name;?></a></td>
    <td><?php echo $rows->c_address;?></td>
	<td><?php echo $rows->c_paddress;?></td>
	<td><?php echo $rows->c_town;?></td>
	
	<td align="center"><?php echo $rows->c_phone;?></td>
	
	<td><?php echo $rows->c_email;?></td>
	
    
    </tr>
  <?php 
  
  }
  
  }
  
  
  ?>
</table>

<?php 
}
else
{

}

?>



</body>
</html>
