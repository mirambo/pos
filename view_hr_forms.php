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
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >User Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['delconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >File Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="10" align="center">
	<strong>Search File To Download - Enter file Name: 
    </strong>
    
    
    <input type="text" name="form_title" size="40" />
	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>	
	
  
  <tr  style="background:url(images/description.gif);" height="30" >
    <td align="center" width="150"><strong>Form Name</strong></td>
	<td align="center" width="150"><strong>Form Type</strong></td>
    <td align="center" width="100"><strong>Download</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
  
  <?php 
if (!isset($_POST['generate']))
{   
$sql="SELECT * FROM upload";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$form_title=$_POST['form_title'];
if ($form_title!='')
{

$sql="SELECT * FROM upload where form_title LIKE '%$form_title%'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
else
{
$sql="SELECT * FROM upload";
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
  
    <td><?php echo $rows->form_title;?></td>
	<td ><?php echo $rows->type;?></td>
	<td align="center"><a href="download.php?id=<?php echo $rows->id;?>"><img src="images/download.png"></a></td>
    <td align="center"><a href="delete_hr_forms.php?hr_form_id=<?php echo $rows->id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
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


