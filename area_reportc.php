<?php
include('job_card_pagination_pending.php'); 
if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETEsettlement']))
  { 
$settlement_id=$_GET['settlement_id'];
 delete_settlement($settlement_id);
  }
  
 $location_id=$_POST['location_id'];
$settlement_name=$_POST['settlement_name'];
?>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>

			
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td width="50"><div align="center"><strong>User Code</strong></td>
    <td width="200"><div align="center"><strong>Sales Representative</strong></td>
    <td width="200"><div align="center"><strong>Commision Percentage</strong></td>
    <td width="100" ><div align="center"><strong>Edit</strong></td>
    <td width="100"><div align="center"><strong>Delete</strong></td>
    </tr>
  
  <?php 
  
$sql="select * from users,client_discount 
where users.user_id=client_discount.client_id ";
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
  
    <td><?php echo $rows->user_code;?></td>
    <td><?php echo $rows->f_name;?></td>
    <td align="center"><?php echo $rows->comm_perc;?>%</td>
    <td align="center"><a href="edit_assign_commision.php?commision_id=<?php echo $rows->client_discount_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center"><a href="delete_ass_comm.php?commision_id=<?php echo $rows->client_discount_id; ?>" onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
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
	
 <?php }?>