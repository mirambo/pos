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
    <td align="center" width="150"><strong>Farmer Name</strong></td>
    <td align="center" width="150"><strong>Farmer Code</strong></td>
    <td align="center" width="150"><strong>Area</strong></td>
    <td align="center" width="150"><strong>Email Address</strong></td>
    <td align="center" width="150"><strong>Phone No</strong></td>
    <td align="center" width="150"><strong>Balance</strong></td>
      <td align="center" width="100"><strong>Edit</strong></td>
	<!--<td align="center" width="150"><strong>Delete</strong></td>-->

    
    </tr>
	
	</thead>
  
  <?php 


if (!isset($_POST['generate']))
{ 
$sql="SELECT * FROM farmers order by farmer_name asc";
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

    <td><a href="farmer_statement.php?farmer_id=<?php echo $farmer_id=$rows->farmer_id;?>" style="font-size:12px; font-weight:bold;"><?php echo $rows->farmer_name;?></a></td>
        <td ><?php echo $rows->farmer_code;?></td>
	<td><?php $shop_id=$rows->farmer_region_id;
	
	
	
$sqlsp="select * from farmers_region where farmer_region_id='$shop_id'";
$resultsp= mysql_query($sqlsp) or die ("Error $sqlsp.".mysql_error());
$rowssp=mysql_fetch_object($resultsp);

echo $rowssp->farmer_region_name;
		
	?></td>
    
    <td ><?php echo $rows->email;?></td>
    <td ><?php echo $rows->phone;?></td>
    <td ><?php $rows->phone;
	
	
$querydc2="SELECT SUM(amount) as ttl_bal FROM supplier_transactions where farmer_id='$farmer_id'";
$resultsdc2= mysql_query($querydc2) or die ("Error $querydc2.".mysql_error());
$rowsdc2=mysql_fetch_object($resultsdc2);


echo number_format($ttl_bal=$rowsdc2->ttl_bal,2);
	
	
$grand_bal=$grand_bal+$ttl_bal;	
	
	?></td>

	<td align="center">
		<?php if ($sess_allow_delete==1) 
	{
	?>
	<a href="home.php?add_farmers&farmer_id=<?php echo $rows->farmer_id; ?>"><img src="images/edit.png"></a>
	<?php 
	}
	else
	{ 
	echo $me;
	
	}
	
	
	?>
	</td>
    
	
   
    </tr>
  <?php 
  
  }
  
  ?>
 
<tr>
<td><strong><font color="#ff0000" size="+1">Totals</font></strong><td>
<td><td>
<td><td>
<td ><strong><font color="#ff0000" size="+1"><?php echo number_format($grand_bal,2); ?></font></strong><td>





</tr> 
  
  
  <?php
  
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

