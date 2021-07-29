
    <?php
    include('Connections/fundmaster.php');
     
    $sub_cat = $_GET['department_id'];
     
    $query = mysql_query("SELECT * FROM section WHERE department_id = {$sub_cat}");
	echo "<option value=''>Select Section</option>";
    while($row = mysql_fetch_array($query)) 
	{
	
    echo "<option value='$row[id]'>$row[Section]</option>";
    }
     
    ?>