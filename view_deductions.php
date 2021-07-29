<?php include('Connections/fundmaster.php'); ?>

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
<form name="form1" method="post" action="">	
	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/benefits_submenu.php');  ?>
		
		<h3>:: List of All Deductions Types</h3>
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<font color='#FF0000'>Record Deleted!!</font>";
?>

<span  style="float:right; margin:auto;">
   
    <input name="delete" type="submit" id="delete" value="Delete" onClick="return confirmDelete();">

<?php 
 if (!empty($_POST['delete'])) {
                    foreach ($_POST['need_delete'] as $id => $value) {
                        $sql = 'DELETE FROM `deductions` WHERE `deduction_id`='.(int)$id;
                        mysql_query($sql);
                    }
                    header('Location: view_deductions.php?deleteconfirm=1');
                }

?> </span>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="50"><strong>#</strong></td>
    <td width="200"><div align="center"><strong>Deductions Type</strong></td>
    <td width="200"><div align="center"><strong>Default Amount</strong></td>
	<td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
$sql="select * from deductions order by deduction_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25" onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);">';
}
 
 
 ?>
    <td align="center"><input name="need_delete[<? echo $rows->deduction_id;?>]" type="checkbox" id="checkbox[<? echo $rows->deduction_id; ?>]" value="<? echo $rows->deduction_id;?>"></td>
    <td><?php echo $rows->deduction_name;?></td>
	<td align="right"><?php echo number_format($rows->deduction_amount,2); ?></td>
    <td align="center"><a href="edit_deductions.php?deduction_id=<?php echo $rows->deduction_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_deductions.php?deduction_id=<?php echo $rows->deduction_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
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
	
	

	</form>
</body>

</html>