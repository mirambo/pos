<?php 

include('Connections/fundmaster.php'); 

$need_del=$_POST['need_delete'];

// Check if delete button active, start this

?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>



<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure want to delete?");
}

</script>

<script type="text/javascript">
    function ChangeColor(tableRow, highLight)
    {
    if (highLight)
    {
      tableRow.style.backgroundColor = '#dcfac9';
    }
    else
    {
      tableRow.style.backgroundColor = '';
    }
  }
  
  $(document).ready(function() {

    $('#example tr').click(function() {
        var href = $(this).find("a").attr("href");
        if(href) {
            window.location = href;
        }
    });

});


 
  </script>


<body>
<form name="form1" method="post" action="">	
	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		<div id="zone-bar" class="br-5">
          <?php include ('topmenu.php') ?>
		</div>
		
		
		
		<?php require_once('includes/benefits_submenu.php');  ?>
		
		<h3>:: List Of All Benefits</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
		
<table width="100%" border="0" id="example">
  <tr bgcolor="#FFFFCC" >
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';


if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';


if ($_GET['notselected']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Nothing Selected</font></strong></p></div>';

?><span  style="float:right; margin:auto;">
   
    <input name="delete" type="submit" id="delete" value="Delete" onClick="return confirmDelete();">

<?php 
 if (!empty($_POST['delete'])) {
                    foreach ($_POST['need_delete'] as $id => $value) {
                        $sql = 'DELETE FROM `benefits` WHERE `benefit_id`='.(int)$id;
                        mysql_query($sql);
                    }
                    header('Location: view_benefits.php?delconfirm=1');
                }

?> </span>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td  width="50"><strong>#</strong></td>
    <td  width="300" align="center"><strong>Benefit Name.</strong></td>
    <td width="200" align="center"><strong>Benefits Type</strong></td>
	<td align="center" width="200"><strong>Benefit Amount</strong></td>
    <td align="center"><strong>Taxable</strong></td>
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php   
$sql="select * from benefits order by benefit_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());


if (mysql_num_rows($results) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object($results))
							  { 
							  
							  $RowCounter++;
							  if($RowCounter % 2==0)
{
echo '<tr bgcolor="#C0D7E5" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
 
 
 ?>
    
	<td align="center"><input name="need_delete[<? echo $rows->benefit_id;?>]" type="checkbox" id="checkbox[<? echo $rows->benefit_id; ?>]" value="<? echo $rows->benefit_id;?>"></td>

    <td ><?php echo $rows->benefit_name;?></td>
    <td ><?php echo $rows->benefit_type; ?></td>
	<td align="right"><?php echo number_format($rows->benefit_amount,2);?></td>
	<td align="center"><?php echo $rows->taxable;?></td>
	<td align="center"><a href="edit_benefits.php?benefit_id=<?php echo $rows->benefit_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_benefits.php?benefit_id=<?php echo $rows->benefit_id;?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  }
  
 ?>
  
  
  
  <?php 
  
  
  
  
  
  
  ?>
	

	
	<?php
                // Check if delete button active, start this
               
               
          

	
	
	
	
	
  
  }
  
  
  ?>
</table>

<?php


?>
		
</form>			

			
			
			
					
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