<?php
if ($sess_allow_view==0)
{
include ('includes/restricted.php');
}
else
{
 ?><?php
if(isset($_GET['subDELETESubProject']))
  { 
$engine_range_id=$_GET['engine_range_id'];
delete_engine_range($engine_range_id);
  }
  
  $task_id=$_POST['task_id'];
$engine_range_id=$_POST['engine_range_id'];
?>
<script language="javascript" src="gen_validatorv31.js" type="text/javascript"></script>
<script type="text/javascript" src="calender/calendar.js"></script>
<script type="text/javascript" src="calender/lang/calendar-en.js"></script>
<script type="text/javascript" src="calender/calendar-setup.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>

<Style>
.error_strings{ font-family:Verdana; font-size:10px; color: #FF0000;}
</Style>

<style type="text/css">
.table
{
border-collapse:collapse;
}
.table td, tr
{
border:1px solid black;
padding:3px;
}
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

if ($_GET['editconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Updated Successfully!!</font></strong></p></div>';
?> 

<?php 

if ($_GET['deleteconfirm']==1)
echo '<div align="center" style="background: #FFCC33; height:20px; width:550px; border:#FF0000 solid 1px; font-size:11px;" class="br-5"> <p align="center"><font color="#FF0000" >Record Deleted Successfully!!</font></strong></p></div>';
?>
	
	</td>
	
    </tr>
  <tr bgcolor="#FFFFCC">
   
    <td  height="30"  colspan="12" align="center">
	<strong>Search By Labour Task:  <select name="task_id"><option>-------------------select-----------------</option>
								  <?php
								  
								  /* $query1="select * from task order by task_name asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->task_id; ?>"><?php echo $rows1->task_name; ?> </option>
                                    
                                
										  
										<?php  }
									  
									  
									  } */
								  
								  
								  
								  
								  
								  ?>
								  </select>
	
	Or By Engine Capacity Range : 
	
	<select name="engine_range_id"><option>-------------------select-----------------</option>
								  <?php
								  
								  /* $query1="select * from engine_range order by engine_range_id asc";
								  $results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_object($results1))
									  
									  { ?>
										  
                                    <option value="<?php echo $rows1->engine_range_id; ?>"><?php echo $rows1->min_capacity; ?> To  <?php echo $rows1->max_capacity; ?></option>
                                    
                                
										  
										<?php  }
									  
									  
									  } */
								  
								  
								  
								  
								  
								  ?>
								  </select>	
	<input type="submit" name="generate" value="Search"></td>
	
    </tr>
  <tr  style="background:url(images/description.gif);" height="30" >
 
    <td align="center" width="20%"><strong>Labour Task Name/ Engine Capacity Range</strong></td>

<?php 
 if (!isset($_POST['generate']))
{ 

$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}
else
{

if ($task_id!=0 && $engine_range_id==0)
{
$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}
elseif ($task_id==0 && $engine_range_id!=0)
{
$sqlrg="SELECT * FROM engine_range where engine_range_id='$engine_range_id' order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());

}

elseif ($task_id!=0 && $engine_range_id!=0)
{

$sqlrg="SELECT * FROM engine_range where engine_range_id='$engine_range_id' order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}
else
{

$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}


}



if (mysql_num_rows($resultsrg) > 0)
						  {
						  while ($rowsrg=mysql_fetch_object($resultsrg))
							  { ?>
						  <td align="center" width="20%"><strong><?php echo $rowsrg->min_capacity.' To '.$rowsrg->max_capacity;?></strong></td>
						  <?php
						  
						  }
						  
						  }

?>

    
    </tr>
  
  <?php 

 if (!isset($_POST['generate']))
{ 

$sql="SELECT * FROM task order by task_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{


if ($task_id!=0 && $engine_range_id==0)
{
$sql="SELECT * FROM task where task_id='$task_id' order by task_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());
}
elseif ($task_id==0 && $engine_range_id!=0)
{
$sql="SELECT * FROM task order by task_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}

elseif ($task_id!=0 && $engine_range_id!=0)
{
$sql="SELECT * FROM task where task_id='$task_id' order by task_name asc";
$results= mysql_query($sql) or die ("Error $sql.".mysql_error());

}
else
{
$sql="SELECT * FROM task order by task_name asc";
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
  

    <td><?php echo $rows->task_name;?></td>
	
	<?php 
 if (!isset($_POST['generate']))
{ 
$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());

}
else
{	
if ($task_id!=0 && $engine_range_id==0)
{ 	
	
$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}
elseif ($task_id==0 && $engine_range_id!=0)
{
$sqlrg="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());

}

elseif ($task_id!=0 && $engine_range_id!=0)
{

$sqlrg="SELECT * FROM engine_range where engine_range_id='$engine_range_id'";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());
}
else
{
$sqlrg="SELECT * FROM engine_range order by engine_range_id asc";
$resultsrg= mysql_query($sqlrg) or die ("Error $sqlrg.".mysql_error());

}

}
if (mysql_num_rows($resultsrg) > 0)
						  {
						  while ($rowsrg=mysql_fetch_object($resultsrg))
							  { ?>
						  <td align="center">
						  <?php 
						  
						   $task_id=$rows->task_id; 
						   $engine_range_id=$rowsrg->engine_range_id; 
						   
						   //get the labour cost
						  $sqlcs="SELECT * FROM labour_cost_matrix where task_id='$task_id' AND engine_range_id='$engine_range_id'";
						  $resultscs= mysql_query($sqlcs) or die ("Error $sqlcs.".mysql_error());
						  $rowscs=mysql_fetch_object($resultscs);
						  $num_rowscs=mysql_num_rows($resultscs);
						  
						  ?>
						   <table class="table">
						   <tr>
						   <td align="center" width="30%">Rate (Hrs)</td>
						   <td align="center" width="30%">Cost (Per Hrs)</td>
						   <td align="center" width="30%">Amount</td>
						   <td rowspan="2" width="10%" align="center"><?php if ($sess_allow_edit==1) 
	{
	
	if ($num_rowscs!=0)
	{
	?>
	
	<a rel="facebox" href="edit_labour_matrix.php?task_id=<?php echo $task_id; ?>&engine_range_id=<?php echo $engine_range_id; ?>"><?php
	echo $redit;
}else
{

}
	?></a>
	
	<?php
		}
	else
	{ 
	echo $med;
	
	}?></td>
	<td rowspan="2" width="10%" align="center"><?php if ($sess_allow_delete==1) 
	{
	

if ($num_rowscs==0)
	{
	
	}
	else
	{
	
	?>
	<a href="delete_labour_matrix.php?task_id=<?php echo $task_id; ?>&engine_range_id=<?php echo $engine_range_id; ?>"  onClick="return confirmDelete();"><?php
	echo $rdelete;

	?></a>
	<?php
		}}
	else
	{ 
	echo $me;
	
	}?></td>
						   
						   </tr>
						   
						      <tr>
							  
							  <?php if ($num_rowscs!=0) 
							  {?>
						   <td align="center"><?php echo $flat_rate_hrs=$rowscs->flat_rate_hrs; ?></td>
						   <td align="center"><?php 
						   
						  
$sqllbc="SELECT * FROM  flat_rate_cost order by flat_rate_cost_id desc limit 1";
$resultslbc= mysql_query($sqllbc) or die ("Error $sqllbc.".mysql_error());
$rowslbc=mysql_fetch_object($resultslbc);

echo number_format($flat_rate_cost=$rowslbc->flat_rate_cost_amount,1); 
						   
						   ?></td>
						   <td align="center"><?php echo number_format($amount=$flat_rate_hrs*$flat_rate_cost,1); ?></td>
						   <?php
						   }
						   else
						   {?>
						   <td colspan="3" align="center"><font color="#ff0000"><i>Not yet Set</i></font></td>
						   <?php
						   }

						   ?>
						   </tr>
						   
						   </table>
						  
						  
						  
						  </td>
						  <?php
						  
						  }
						  
						  }

?>
	
   
    
	
   
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
}
?>

