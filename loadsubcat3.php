

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat2 = $_GET['parent_cat2'];
     
   $query3 = mysql_query("SELECT * FROM mop WHERE mop_id = {$sub_cat2}");
	
    while($row3 = mysql_fetch_array($query3)) {
	
    echo $get_mop_id=$row3['mop_id'];
    }
     
    ?>