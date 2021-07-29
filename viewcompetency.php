<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="11" height="30" align="center"> 
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
  <td align="center" width="200"><strong>Company Name</strong></td>
    <td align="center" width="100"><strong>Mobile Number</strong></td>
    <td align="center" width="160"><strong>Telephone Number</strong></td>
	<td width="180" align="center"><strong>Email Address</strong></td>
	<td width="100" align="center"><strong>PIN</strong></td>
	<td align="center" width="160"><strong>Website</strong></td>
	<td align="center" width="160"><strong>Street</strong></td>
	<td align="center"  width="160"><strong>Building</strong></td>
    <td align="center" width="100"><strong>Postal Address</strong></td>
	<td align="center" width="100"><strong>Town</strong></td>    
    <td align="center" width="50"><strong>Edit</strong></td>
   
    </tr>
  
  <?php 
 
$sql="SELECT * FROM company_contacts";
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
    <td><?php echo $rows->cont_person;?></td>
    <td><?php echo $rows->phone;?></td>
    <td><?php echo $rows->telephone; ?></td>
	<td><?php echo $rows->email;?></td>
	<td><?php echo $rows->pin;?></td>
	<td><?php echo $rows->fax;?></td>
	<td><?php echo $rows->street;?></td>
	<td align="center">
	<?php echo $rows->building;?>
    </td>
	<td align="center">
	<?php echo $rows->address;?>
    </td>
	
	<td><?php echo $rows->town;?></td>
	
    <td align="center"><a href="home.php?editcompetency=editcompetency&contacts_id=<?php echo $rows->contacts_id; ?>"><img src="images/edit.png"></a></td>
    
    </tr>
  <?php 
  
  }
  
  }
  
  
  ?>
</table>