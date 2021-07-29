<?php
//Get our database abstraction file
require('database.php');

if (
isset($_GET['search']) && $_GET['search'] != '') 
{
	//Add slashes to any quotes to avoid SQL problems.
	$search = $_GET['search'];
	$suggest_query = db_query("SELECT sub_project_name as suggest FROM nrc_sub_project WHERE sub_project_name like '%$search%' ORDER BY sub_project_name");
	while($suggest = db_fetch_array($suggest_query)) 
	{
		echo $suggest['suggest']. "\n";
		
	}
}
?>