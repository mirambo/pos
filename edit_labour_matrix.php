<?php include ('includes/session.php'); ?>
<?php include ('Connections/fundmaster.php'); ?>

<?php 
$task_id=$_GET['task_id'];
$engine_range_id=$_GET['engine_range_id'];

$sql1="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$results1= mysql_query($sql1) or die ("Error $sql1.".mysql_error());
$rows1=mysql_fetch_object($results1);

$range_name=$rows1->min_capacity.' To '.$rows1->max_capacity;

$sql12="SELECT * FROM task where task_id='$task_id'";
$results12= mysql_query($sql12) or die ("Error $sql12.".mysql_error());
$rows12=mysql_fetch_object($results12);

 $task_name=$rows12->task_name;

$sql123="SELECT * FROM labour_cost_matrix where task_id='$task_id' AND engine_range_id='$engine_range_id'";
$results123= mysql_query($sql123) or die ("Error $sql123.".mysql_error());
$rows123=mysql_fetch_object($results123);

 $hrs=$rows123->flat_rate_hrs;
 $cost=$rows123->flat_rate_cost;

?>


<form name="new_supplier" action="process_edit_labour_matrix.php" method="post">	

<input type="hidden" size="30" name="task_id" value="<?php echo $task_id; ?>">
<input type="hidden" size="30" name="engine_range_id" value="<?php echo $engine_range_id; ?>">
		
			<table width="100%" border="0">
  
  <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="30%">Labour Task<font color="#FF0000"> :</font></td>
    <td width="23%"><?php echo $task_name;?></td>
    <td width="10%" rowspan="6" valign="top"><div id='new_supplier_errorloc' class='error_strings'></div></td>
  </tr>
  
    <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Engine Capacity Range (cc)<font color="#FF0000"> : </font></td>
    <td width="23%"><?php echo $range_name;?>	</td>
   
  </tr>
   
   <tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Flat Rate Hrs (Hrs)<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="30" name="flat_rate_hrs" value="<?php echo $hrs; ?>"></td>
  
  </tr> 
  
  <!--<tr height="20">
    <td bgcolor="">&nbsp;</td>
    <td width="19%">Enter Flat Rate Cost (Per Hr)<font color="#FF0000"></font></td>
    <td width="23%"><input type="text" size="30" name="flat_rate_cost" value="<?php echo $cost; ?>"></td>
  
  </tr> -->

  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Update">
	<input type="hidden" name="add_item" id="add_item" value="1">&nbsp;&nbsp;<input type="reset" value="Cancel"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


  