

    <?php
     include('Connections/fundmaster.php');
     
   $sub_cat12 = $_GET['parent_cat12'];
     
   $query12 = mysql_query("select * from currency WHERE curr_id = {$sub_cat12}");
   $rows12=mysql_fetch_object($query12);
	
    
    ?>
	 Rate:<input type="text" name="curr_rate" required value="<?php echo $rows12->exchange_rate;?>" size="10">