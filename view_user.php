<?php 

include('Connections/fundmaster.php'); 



?>
<html xmlns="http://www.w3.org/1999/xhtml">

<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<body>

	<div id="page-wrap">

		<?php include ('header.php') ?>
		
		
          <?php include ('topmenu.php') ?>
	
		
		
		
		<?php require_once('includes/usersubmenu.php');  ?>
		
		<h3>:: List of All User</h3>
		
         
				
		<div id="main-content">
			<div id="feature-content">
			
			<div id="contholder">
			
			<div id="cont-left-full" class="br-5">
			
			
			
			
			
			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="8" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="200"><strong>First Name</strong></td>
    <td align="center"><strong>Middle Name</strong></td>
	<td align="center"><strong>Last Name</strong></td>
	<td align="center"><strong>User Group</strong></td>
	<td align="center"><strong>Username</strong></td>
    <!--<td width="150" align="center"><strong>Activate / Deactivate</strong></td>-->
    <td align="center"><strong>Edit</strong></td>
    <td align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
  if ($_GET['loginfirst']==1)

{

$sqlauditsav= "insert into audit_trail values('','$user_id',NOW(),'Logged into the system')";
$resultsauditsav= mysql_query($sqlauditsav) or die ("Error $sqlauditsav.".mysql_error());
$current_month=(Date("F Y"));

/*$transaction_desc="Salaries and Commission Payable for month $current_month";

$sqlsalcom="SELECT amount_paid FROM commision_payments WHERE month_paid='$current_month'";
$resultssalcom= mysql_query($sqlsalcom) or die ("Error $sqlsalcom.".mysql_error());

if (mysql_num_rows($resultssalcom) > 0)
{
 while ($rowssalcom=mysql_fetch_object($resultssalcom))
 {
 $comm_payable=$rowssalcom->amount_paid;
 $grnt_comm_payable=$grnt_comm_payable+$comm_payable;
 }
$grnt_comm_payable.' ';
}




$sqlsal="SELECT basic_sal FROM employees";
$resultssal= mysql_query($sqlsal) or die ("Error $sqlsal.".mysql_error());

if (mysql_num_rows($resultssal) > 0)
{
 while ($rowssal=mysql_fetch_object($resultssal))
 {
 $basic_sal=$rowssal->basic_sal;
 $grnt_basic_sal=$grnt_basic_sal+$basic_sal;
 }
//echo $grnt_basic_sal;
$sal_and_comm=$grnt_basic_sal+$grnt_comm_payable;
}


$queryred1="select * from  salaries_payables_ledger where transactions='$transaction_desc'";
$resultsred1=mysql_query($queryred1) or die ("Error: $queryred1.".mysql_error());

$numrowsred1=mysql_num_rows($resultsred1);

if ($numrowsred1>0)

{


}
else
{

$sqlgenled= "insert into general_ledger values('','Salaries And Commission Expense for the month of $current_month','$sal_and_comm','$sal_and_comm','','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into general_ledger values('','$transaction_desc','-$sal_and_comm','','$sal_and_comm','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into salaries_payables_ledger values('','$transaction_desc','$sal_and_comm','','$sal_and_comm','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());

$sqlgenled= "insert into accounts_payables_ledger values('','$transaction_desc','$sal_and_comm','','$sal_and_comm','6','1',NOW())";
$resultsgenled=mysql_query($sqlgenled) or die ("Error $sqlgenled.".mysql_error());
}
*/

}  
$sql="select users.user_id,employees.emp_firstname,employees.emp_lastname,employees.emp_middle_name,users.username,user_group.user_group_name from users,
user_group,employees where users.user_group_id=user_group.user_group_id and users.emp_id=employees.emp_id";
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
  
    <td><?php echo $rows->emp_firstname;?></td>
    <td><?php echo $rows->emp_middle_name;?></td>
	<td><?php echo $rows->emp_lastname;?></td>
	<td><?php echo $rows->user_group_name;?></td>
	
	<td><?php echo $rows->username;?></td>
	<!--<td align="center">
	
	<?php 
	
	$status=$rows->status;
	
	

	
	if ($status==0)
	      {
		  
		  ?>
		  
		 <img src="images/dissaprove.png" border="0" title="Deactivate">
		  
		  <?php

		  }
		  
		  else 
		  {
		   ?>
		  
		 <img src="images/publish_g.png" border="0" title="Deactivate">
		  
		  <?php
	
	
	}
	
	
	
	
	
	
	
	?>
	
	
	
	
	

	
	
	
	</td>-->
	
    <td align="center"><a href="edit_user.php?user_id=<?php echo $rows->user_id;?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_user.php?user_id=<?php echo $rows->user_id;?>"><img src="images/delete.png"></a></td>
    </tr>
  <?php 
  
  }
  
  }
  
  
  ?>
</table>
		
			

			
			
			
					
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