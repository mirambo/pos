<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<script type="text/javascript"> 

function confirmDelete()
{
    return confirm("Are you sure you want to delete?");
}

</script>


<style type="text/css">

@import url(calender/calendar-win2k-1.css);

</style>
<form name="search" method="post" action=""> 
<table width="100%" border="0">
  <tr bgcolor="#FFFFCC">
   
    <td colspan="9" height="30" align="center"> 
	<?php

if ($_GET['updateuserconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Sponsor Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deletesponsorconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Currency deleted successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
	<!--<tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="9" align="center">
	<strong>Filter By Date
    From</strong>
    
    <input type="text" name="date_from" size="40" id="date_from" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
    <strong>To</strong>
    <input type="text" name="date_to" size="40" id="date_to" readonly="readonly" /><input name="DateFormats" id="DateFormats" disabled value="dd/mm/yyyy" type="hidden">
	
	<input type="submit" name="generate" value="Generate"></td>
	
    </tr>-->
	
	<tr  style="background:url(images/description.gif);" height="20" >
    <td align="center" width="150"><strong>Account Title Name</strong></td>
	<td align="center" width="150"><strong>Account Title Code</strong></td>
	<td align="center" width="100"><strong>Edit</strong></td>
	<td align="center" width="150"><strong>Delete</strong></td>

    
    </tr>
	
	
	<?php 
  
$sqlsec="SELECT * FROM accounts_category";
$resultssec= mysql_query($sqlsec) or die ("Error $sqlsec.".mysql_error());
  
 if (mysql_num_rows($resultssec) > 0)
						  {
						
							  while ($rowssec=mysql_fetch_object($resultssec))
							  { ?>
							<tr><td colspan="4">
							
<table width="100%" border="0">
<tr height="30" >
<td colspan="4"><strong><h4><?php echo $rowssec->accounts_category_name; ?></h4></strong></td></tr>



<?php 
$acc_cat=$rowssec->accounts_category_id;

$sql="SELECT * FROM accounts_titles where accounts_category_id='$acc_cat'";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
if ($numrows=mysql_num_rows($results) > 0)
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
 

  
    
	<td align="" width="150"><?php echo $rows->accounts_title_name;?></td>
	<td align="" width="150"><?php echo $rows->accounts_title_code;?></td>


	<td align="center" width="150"><a href="home.php?editchart=editchart&accounts_category_id=<?php echo $rows->accounts_category_id; ?>"><img src="images/edit.png"></a></td>
    <td align="center" width="150"><a href="deletesponsor.php?curr_id=<?php echo $rows->curr_id; ?>"  onClick="return confirmDelete();"><img src="images/delete.png"></a></td>
	
   
    </tr>
 <?php 
 }}
 ?>

						
							
							
							
							</table>
							
							
							</td></tr> 
							  
							 <?php 
							 }
							 
							 }
							 
							 ?> 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  
</table>
<!--
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_from",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_from"       // ID of the button
    }
  );
  
  
   Calendar.setup(
    {
      inputField  : "date_to",         // ID of the input field
      ifFormat    : " %Y-%m-%d  ",    // the date format
      button      : "date_to"       // ID of the button
    }
  );
  
  
  </script>-->
</form>
