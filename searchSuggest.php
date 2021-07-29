<?php
//Get our database abstraction file
require('database.php');

if (
isset($_GET['search']) && $_GET['search'] != '') 
{
	//Add slashes to any quotes to avoid SQL problems.
	$search = $_GET['search'];
	/*
	$query1="SELECT project_id,project_name as suggest FROM nrc_project WHERE project_name like '%$search%' ORDER BY project_name ";
	$results1=mysql_query($query1) or die ("Error: $query1.".mysql_error());
								  
								  if (mysql_num_rows($results1)>0)
								  
								  {
									  while ($rows1=mysql_fetch_array($results1))
									  
									  { ?>
										  
                                  <?php echo $rows1['suggest']; ?>
                                   <?php  }
									  
									  
									  }*/
	
	$suggest_query = db_query("SELECT project_name as suggest FROM nrc_project WHERE project_name like '%$search%' ORDER BY project_name ");
	while($suggest = db_fetch_array($suggest_query)) 
	{
		echo $suggest['suggest'] . "\n";
	}
}
?>