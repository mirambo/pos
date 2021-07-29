

    <?php
     include('Connections/fundmaster.php');
     
    $parent_cat = $_GET['parent_cat'];
     
    $query = mysql_query("SELECT * FROM items WHERE cat_id = {$parent_cat} order by item_name asc");
	echo "<option value='0'>Select Item.............</option>";
    while($row = mysql_fetch_array($query)) {
	
    echo "<option value='$row[item_id]'>$row[item_name]</option>";
    }
     
    ?>