<?php 
include('includes/session.php');
include('Connections/fundmaster.php');

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Our_Price_List.xlsx");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style.css" />

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
<table width="800" border="0" align="center" >
  <tr>
    <td colspan="6" rowspan="5"><img src="http://localhost/brisk_sys/images/logolpo.png" /></td>
    
  </tr>
  
  <tr>
   
  </tr>
  <tr>
    
  </tr>
  <tr>
    
  </tr>
  <tr>
   
  </tr>
  <tr height="30">
    <td colspan="6"  align="center"><strong><br/><hr/><br/>Kigali Road, Jamia Plaza, 2nd Floor, P.O. BOX 71O89- 00622 Nairobi. <br/>Tel : +254 (0) 538004579 Cell : +254 702 358 399 / + 254 721 662 103. <br/>Email : info@briskdiagnostics.com. Website: www.briskdiagnostics.com <br/></strong></td>
  </tr>
  <tr height="30">
    <td colspan="6" bgcolor="#000033" align="center"><span style="font-size:17px; font-weight:bold; color: #FFFFFF;">OUR PRICE LIST</span></td>
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

<table width="800" border="0">
  
  
    <tr style="background:url(images/description.gif);" height="30" >
    <td ><div align="center"><strong>Product Name</strong></td>
  	<td ><div align="center"><strong>Pack Size</strong></td>
	<td ><div align="center"><strong>Weight(Kgs)</strong></td>	
	<td colspan="3"><div align="center"><strong>Price (Kshs)</strong></td>
	
    </tr>
  
  <?php 
  
$sql="select products.product_name,products.pack_size,products.weight,products.reorder_level,products.curr_sp,products.curr_bp,product_categories.cat_name from products,product_categories where products.cat_id=product_categories.cat_id order by product_categories.cat_name desc";
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
  
    <td><?php echo $rows->product_name;?></td>
	<td><?php echo $rows->pack_size;?></td>
	<td><?php echo $rows->weight;?></td>	
	<td align="right" colspan="3"><strong><?php echo number_format($rows->curr_sp,2);?></strong></td>
    </tr>
	
	
	
  <?php 
  
  }
  
?>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6" align="right"><strong><em>Generated by :
          <?php 
$sqluser="select * from users where user_id='$user_id'";
$resultsuser= mysql_query($sqluser) or die ("Error $sqluser.".mysql_error());
	
$rowsuser=mysql_fetch_object($resultsuser);	

echo $rowsuser->f_name.''.$rowsuser->l_name;
	
	
	
	?>
    </em></strong></td>
  </tr>

<?php 
  
  
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








</body>
</html>
