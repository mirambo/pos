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
		
		
		
		<?php require_once('includes/banks_submenu.php');  ?>
		
		<h3>:: List of All Our Bank Branches</h3>
         
				
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

if ($_GET['deletemachcatconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
<span  style="float:right; margin:auto;">
   
    <input name="delete" type="submit" id="delete" value="Delete" onClick="return confirmDelete();">

<?php 
 if (!empty($_POST['delete'])) {
                    foreach ($_POST['need_delete'] as $id => $value) {
                        $sql = 'DELETE FROM `bank_branches` WHERE `branch_id`='.(int)$id;
                        mysql_query($sql);
                    }
                    header('Location: view_bank_branches.php?delconfirm=1');
                }

?> </span>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="50"><strong>#</strong></td>
    <td><div align="center"><strong>Branch Name</strong></td>
    <td width="400"><div align="center"><strong>Bank Name</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
$sql="select banks.bank_name,bank_branches.branch_name,bank_branches.branch_id  from banks,bank_branches where banks.bank_id=bank_branches.bank_id order by banks.bank_name asc";
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
    <td align="center"><input name="need_delete[<? echo $rows->branch_id;?>]" type="checkbox" id="checkbox[<? echo $rows->branch_id; ?>]" value="<? echo $rows->branch_id;?>"></td>
    <td><?php echo $rows->bank_name.'--'.$rows->branch_name.' Branch';?></td>
    <td><?php echo $rows->bank_name;?></td>
    <td align="center"><a href="edibank.php?bank_id=<?php echo $rows->bank_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_bank.php?bank_id=<?php echo $rows->bank_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
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