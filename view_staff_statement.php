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
		
		
		
		<?php require_once('includes/employeessubmenu.php');  ?>
		
		<h3>:: List Of All Employees</h3>
		
         
				
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


if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';


if ($_GET['notselected']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sorry!! Nothing Selected</font></strong></p></div>';

?><span  style="float:right; margin:auto;">
   
    <input name="delete" type="submit" id="delete" value="Delete" onClick="return confirmDelete();">

<?php 
 if (!empty($_POST['delete'])) {
                    foreach ($_POST['need_delete'] as $id => $value) {
                        $sql = 'DELETE FROM `employees` WHERE `emp_id`='.(int)$id;
                        mysql_query($sql);
                    }
                    header('Location: view_employees.php?delconfirm=1');
                }

?> </span>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="50"><strong>#</strong></td>
    <td align="center" width="100"><strong>Employee No.</strong></td>
    <td align="center"><strong>Employee Name</strong></td>
	<td align="center"><strong>Job Title</strong></td>
    <td align="center"><strong>Email Address</strong></td>
	<td align="center"><strong>Phone Number</strong></td>
    <td width="150" align="center"><strong>Employee Status</strong></td>
    <!--<td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>-->
    </tr>
  
  <?php   
$sql="select * from employees order by emp_id asc";
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
              onmouseout="ChangeColor(this, false);">';
}
else 
{
echo '<tr bgcolor="#FFFFCC" height="25"  onmouseover="ChangeColor(this, true);" 
              onmouseout="ChangeColor(this, false);" 
              >';
}
 
 
 ?>
    
	<td align="center" bgcolor="#FFFFFF"><input name="need_delete[<? echo $rows->emp_id;?>]" type="checkbox" id="checkbox[<? echo $rows->emp_id; ?>]" value="<? echo $rows->emp_id;?>"></td>

    <td align="center" onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'" ><?php echo $rows->employee_no;?></td>
    <td onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'"><?php echo $rows->emp_firstname.' '.$rows->emp_middle_name.' '.$rows->emp_lastname;?></td>
	<td onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'"><?php echo $rows->job_title_id;?></td>
	<td onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'"><?php echo $rows->emp_email;?></td>
	<td align="center" onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'"><?php echo $rows->emp_phone;?></td>
	<td align="center" onClick="document.location.href='employee_trans.php?emp_id=<?php echo $rows->emp_id;?>'">
	
	<?php 
	
	echo $status=$rows->emp_status;
  ?>
</td>
	
    
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