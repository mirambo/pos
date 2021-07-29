<?php 
include ('includes/session.php');
include('Connections/fundmaster.php');
$date_month=$_GET['payment_month'];

?>
<title>Safaricom - Outlet Visit Dashboard Report</title>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link rel="stylesheet" href="csspr.css" type="text/css" />

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>

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
<body onLoad="window.print();">
<table width="700" border="0" class="table" align="center">

<tr height="40"> <td colspan="16" align="center"><img src="images/logolpo.png" width="300" height="80"></td></tr>
<tr height="40"> <td colspan="16" align="center"><H2><?php echo $rowscont->cont_person; ?></H2></td></tr>
<tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center">
<H2>List Of All Items</H2>
	
	</td>
	
    </tr>
<tr  style="background:url(images/description.gif);" height="30" >
  
    <td align="center" width="150"><strong>Item Name</strong></td>    
    <td align="center" width="150"><strong>Item Category</strong></td>
    <td align="center" width="150"><strong>Item Code</strong></td>
    <td align="center" width="150"><strong>Reorder Level</strong></td>
    <td align="center" width="150"><strong>Item Value (Buying Price)</strong></td>
    <td align="center" width="150"><strong>Item Selling Price</strong></td>
    <td align="center" width="150"><strong>Item Descrition</strong></td>
   

    </tr>


 <?php 
$client_id=$_GET['cat_id'];
$item_name=$_GET['item_name'];
$item_code=$_GET['item_code']; 
 
 
 
 if ( $client_id!=0 && $item_name=='' && $item_code=='')
{
$sql="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id AND items.cat_id='$client_id' order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}

elseif ( $client_id==0 && $item_name!='' && $item_code=='')
{
$sql="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id AND item_name LIKE '%$item_name%' order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ( $client_id==0 && $item_name=='' && $item_code!='')
{
$sql="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id AND item_code LIKE '%$item_code%' order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM items,items_category where items.cat_id=items_category.cat_id order by item_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
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
  
   
    <td><?php echo $rows->item_name;?></td>
    <td><?php echo $rows->cat_name;?></td>
    <td><?php echo $rows->item_code;?></td>
    <td><?php echo $rows->reorder_level;?></td>
    <td align="right"><?php echo number_format($rows->curr_bp,2);?></td>
    <td align="right"><?php echo number_format($rows->curr_sp,2);?></td>
    

    <td><?php echo $rows->description;?></td>
    
	
	
   
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
</body>


