<?php include('Connections/fundmaster.php'); 


?>

<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}


</script>

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#99CC33';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
</script>



<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/banks_submenu.php');  ?>
		
		<h3>:: List of All Our Banks</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="12" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
	
	<tr bgcolor="#FFFFCC"><td colspan="12" align="right"><!--<a href="printcpd.php" target="_blank"><img src="images/print_icon.gif" title="Print"></a> &nbsp; <a href="printcpdcsv.php"><img src="images/excel.png" title="Export to Excell"></a> &nbsp; <a href="printcpdword.php"><img src="images/word.png" title="Export to Word"></a>--></td></tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Bank Name</strong></td>
    <td align="center" width="150"><strong>Branch Name</strong></td>
    <td align="center" width="150"><strong>Account Name</strong></td>
    <td align="center" width="100"><strong>Account Number</strong></td>    
	<td width="50" align="center"><strong>Edit</strong></td>
	<td width="50" align="center"><strong>Delete</strong></td>
    
    </tr>
  
  <?php 
 
$sql="select * from banks";
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
  
    <td ><?php echo $rows->bank_name;?></td>
    <td ><?php echo $rows->branch_name;?></td>
    <td ><?php echo $rows->account_name;?></td>
    <td ><?php echo $rows->account_number;?></td>
	
	<td align="center">
	<?php 
	
	$sess_allow_edit=1;
if ($sess_allow_edit==1)
{
	?>
	
	<a href="edit_bank.php?bank_id=<?php echo $rows->bank_id; ?>"><img src="images/edit.png"></a>
	<?php
}
else
{
echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
}

	?>
	
	
	</td>
	<td align="center">
	<?php
$sess_allow_delete=1;
if ($sess_allow_delete==1)
{
	?>
	
	<a href="delete_bank.php?bank_id=<?php echo $rows->bank_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png">
	<?php 
	}
	else
	{
	echo "<i><font color='#ff0000' size='-2'>Not allowed...</font></i>";
	
	}
	
	
	?>
	</td>

   
    </tr>
  <?php 
  
  $ttl_part=$ttl_part+$rows->total_part;
  $ttl_male_part=$ttl_male_part+$rows->male_part;
  $ttl_female_part=$ttl_female_part+$rows->female_part;
  }
  ?>
  
   
  
  <?php
  
  }
  
  else 
  
  {
  ?>
  
  <tr><td colspan="5" align="center"><font color="#ff0000"><strong>No Results</strong></font></td></tr>
  
  <?php 
  
  
  }
  
  
  ?>
</table>
		
			

			
			
			
					
			  </div>
				
				<div id="cont-right" class="br-5">
					
				</div>
			
			
			</div>
			
			
				
				
				
				
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="footer">
			
			
			<?php include ('footer.php'); ?>
		</div>
		</div>
		
		
		
	</div>
	
	

	
</body>

</html>