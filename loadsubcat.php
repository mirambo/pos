

    <?php
     include('Connections/fundmaster.php');
     
    $parent_cat = $_GET['parent_cat'];
     
    $query = mysql_query("SELECT * FROM account_type WHERE account_cat_id = {$parent_cat}");
	echo "<option value='0'>Select Account Type.............</option>";
    while($row = mysql_fetch_array($query)) {
	
    echo "<option value='$row[account_type_id]'>$row[account_type_name]</option>";
    }
     
    ?>