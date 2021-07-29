<?php
 $user_group_id;


if(isset($_GET['subDELETEProject']))
  { 
 $customer_id=$_GET['customer_id'];
delete_project($customer_id,$user_id);
  }
  
  
include ('top_grid_includes.php');
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>
 <form name="search" method="post" action="">  
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="13" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteprojectconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	
	
	  	<table  border="0" align="center" bgcolor="#9AD7AF" class="display nowrap" style="border-radius:5px; width:100%" id="example">	

    <thead>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="50"><strong>No</strong></td>
    <td align="center" width="50"><strong>Customer Code</strong></td>
    <td align="center" width="150"><strong>Customer/Company Name</strong></td>
    <td align="center" width="150"><strong>Region</strong></td>
    <td align="center" width="150"><strong>Contacted Person</strong></td>
    <td align="center" width="150"><strong>Postal Address</strong></td>
    <td align="center" width="150"><strong>City / Town</td>
    <td align="center" width="150"><strong>Email Address</strong></td>
    <td align="center" width="150"><strong>Phone No</strong></td>
    <td align="center" width="150"><strong>TIN</strong></td>
    <td align="center" width="150"><strong>Credit Limit</strong></td>
    <td align="center" width="150"><strong>Credit Days</strong></td>
    <td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
	
	</thead>
  
  <?php 
if ($user_group_id==15 || $user_group_id==34)
		
{
	
if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM customer order by customer_name asc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$shop_id=$_POST['shop_id'];
$project_name=$_POST['project_name'];


$querydc= "SELECT * FROM customer";
    $conditions = array();
    if($shop_id!=0) 
	
	{
	
    $conditions[] = "incharge='$shop_id'";
	
    }
	

	if($project_name!='') 
	{
	
    $conditions[] = " customer_name LIKE '%$project_name%'";
	  
    }
	

	
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." order by customer_name asc";
    }
	else
	{	
	
$querydc="SELECT * FROM customer order by customer_name asc";
$resultsdc=mysql_query($querydc) or die ("Error: $querydc.".mysql_error()); 

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}

		}
		
		else
		{

if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM customer,sales where sales.customer_id=customer.customer_id and sales.sales_rep='$user_id' 
group by sales.customer_id order by customer.customer_name asc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$shop_id=$_POST['shop_id'];
$project_name=$_POST['project_name'];


$querydc= "SELECT * FROM customer,sales";
    $conditions = array();
    if($shop_id!=0) 
	
	{
	
    $conditions[] = "incharge='$shop_id'";
	
    }
	

	if($project_name!='') 
	{
	
    $conditions[] = " customer_name LIKE '%$project_name%'";
	  
    }
	

	
	
	
	

    //$sql = $query;
    if (count($conditions) > 0) {
      $querydc .= " WHERE " . implode(' AND ', $conditions)." and sales.customer_id=customer.customer_id and sales.sales_rep='$user_id' 
group by sales.customer_id order by customer.customer_name asc";
    }
	else
	{	
	
$sql="SELECT * FROM customer,sales where sales.customer_id=customer.customer_id and sales.sales_rep='$user_id' 
group by sales.customer_id order by customer.customer_name asc";
$resultsdc= mysql_query($sql) or die ("Error $sql.".mysql_error());

	}

    $resultsdc = mysql_query($querydc) or die ("Error $querydc.".mysql_error());


}	
			
			
			
			
			
			
		}



if (mysql_num_rows( $resultsdc) > 0)
						  {
							  $RowCounter=0;
							  while ($rows=mysql_fetch_object( $resultsdc))
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
  <td><?php echo $count=$count+1; ?></td>
  <td><?php echo $rows->customer_code; ?></td>
    <td><a href="home.php?submission_period=submission_period&customer_id=<?php echo $customer_id=$rows->customer_id;?>" style="font-size:12px; font-weight:bold;"><?php echo $rows->customer_name;?></a></td>
    <td><?php $shop_id=$rows->region_id;
	
	
	
$sqlsp="select * from customer_region where region_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultsp);

echo $rowssp->region_name;
		
	?></td>
    <td><?php echo $rows->contact_person;?></td>
    <td ><?php echo $rows->address;?></td>
    <td ><?php echo $rows->town;?></td>
    <td ><?php echo $rows->email;?></td>
    <td ><?php echo $rows->phone;?></td>
    <td ><?php echo $rows->pin;?></td>
    <td ><?php echo $rows->credit_limit;?></td>
    <td ><?php echo $rows->credit_days;?></td>
	<td align="center">
		<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?editproject=editproject&customer_id=<?php echo $rows->customer_id; ?>"><img src="images/edit.png"></a>
	<?php 
	}
	else
	{ 
	echo $me;
	
	}
	
	
	?>
	</td>
    <td align="center">
	<?php if ($sess_allow_delete==1) 
	{
	
		
	$customer_id=$rows->customer_id;
	
$querysup="select * from sales where customer_id='$customer_id'";
$resultssup=mysql_query($querysup) or die ("Error: $querysup.".mysql_error());
$rowssupp=mysql_num_rows($resultssup);
	
	if ($rowssupp>0 || $customer_id==1)
	{
	
	}
	else
	{
	?>
	
	<a href="home.php?&viewproject=viewproject&subDELETEProject&customer_id=<?php echo $rows->customer_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	
	
	<?php
	}
		}
	else
	{ 
	echo $me;
	
	}?></td>
	
   
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
</form>
<?php 

	//}
?>

