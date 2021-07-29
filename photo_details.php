<form name="emp" action="process_staff_photo.php?sub_module_id=<?php echo $sub_module_id; ?>&employee_id=<?php echo $employee_id; ?>" enctype="multipart/form-data" method="post">
  <input type="hidden" name="form_id" value="<?php echo $form_id;?>">      
  <input type="hidden" name="question_type_id" value="<?php echo $qt;?>">      
  <input type="hidden" name="question_no" value="<?php echo $next_question_no;?>">    	
<table width="98%" border="0" class="table_new" align="center" frame="box">
<tr><td colspan="5"><h1>Employee Photo </h1></td></tr>

<tr height="200">
   
	<td colspan="6" height="30" align="center">
	
	<?php
 $photo=$rowsv->photo;

	?>
<img style="width:190px; height:190px; border-radius:155px; padding:5px; margin-top:10px; border:1px solid #ccc" src="staff_photo/
<?php 

if ($photo=='')
{
echo "holder.png";	
	
}
else
{
echo $photo; 

}
?>">	
	
<br/>	
<br/>
	
	
</td>
    </tr>
	
	
	
	
  			
<tr height="40">
<td colspan="4" align="center"><input type="file" style="width:200px;" name="file[]" multiple="multiple" size="18" />	
</td>

</tr>	
<tr height="40">
<td colspan="4" align="center"><input type="submit" name="submit" style="width:250px; height:30px; padding-right:5px; padding-left:5px; border-radius:5px; font-size:12px; font-weight:bold; color:#fff; background:#003399" value="Save Details">
</td>

</tr>		
</table>	
	
</form>