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
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo "<p align='center'><strong><font color='#FF0000'>Record Deleted!!</font></strong></p>";
?>
	
	</td>
	
    </tr>
<!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search User Group - Enter User Group Name: 
    </strong>
    
    
    <input type="text" name="sub_module" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>-->	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>VAT Name</strong></td>
    <td align="center" width="150"><strong>Percentage(%)</strong></td>
	<td align="center" width="100"><strong>Edit</strong></td>


    
    </tr>
	 <?php 
  
if (!isset($_POST['generate']))
{  
$sql="SELECT * FROM vat_settings";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sub_module=$_POST['sub_module'];
if ($sub_module!='')
{
$sql="SELECT * FROM user_group where user_group_name LIKE '%$sub_module%'order by user_group_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

else
{

$sql="SELECT * FROM user_group order by user_group_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}


}


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
  
    <td ><?php echo $rows->vat_name;?></td>
    <td align="center"><?php echo $rows->vat_setting_perc;?></td>
	<td align="center"><a href="home.php?edit_vat=edit_vat&user_group_id=<?php echo $rows->user_group_id;?>"><img src="images/edit.png"></a></td>

	
   
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


