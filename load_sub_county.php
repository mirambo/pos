
    <?php
     include('Connections/fundmaster.php');
     
    $county_id = $_GET['county_id'];
     
    $query = mysql_query("SELECT * FROM sub_county WHERE county_id = {$county_id}");
	echo "<option value=''>Select Sub-County</option>";
    while($row = mysql_fetch_array($query)) 
	{
	
    echo "<option value='$row[sub_county_id]'>$row[sub_county_name]</option>";
    }
     
    ?>