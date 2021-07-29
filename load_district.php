
    <?php
     include('Connections/fundmaster.php');
     
    $parent_cat = $_GET['region_id'];
     
    $query = mysql_query("SELECT * FROM county WHERE region_id = {$parent_cat}");
	echo "<option value=''>Select County</option>";
    while($row = mysql_fetch_array($query)) {
	
    echo "<option value='$row[county_id]'>$row[county_name]</option>";
    }
     
    ?>